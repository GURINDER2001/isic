<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * site instance
 * Added By Rajan Singh
 */
if (!function_exists('CI')) {
    function CI()
    {
        $CI =& get_instance(); // making instance of CI
        return $CI; // Its returning an object for CI class
    }
}

if (!function_exists('CheckLoginSession')) {
    function CheckLoginSession()
    {
        $admin_id = CI()->session->userdata('admin_id');
        if (empty($admin_id)) {
            redirect('admin', 'refresh');
        } else {
            return 1;
        }
    }
}

if (!function_exists('is_follow')) {
    function is_follow($followingID = "")
    {
        $user_id = CI()->session->userdata('userID');
        CI()->db->where(array(
            'follower_id' => $user_id,
            'following_id' => $followingID
        ));
        $followquery = CI()->db->get('follow');
        
        $count = $followquery->num_rows();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
        
    }
}

if (!function_exists('most_follow_user')) {
    function most_follow_user()
    {
        $user_id = CI()->session->userdata('userID');
        CI()->db->select('*,COUNT(*) as followercount');
        CI()->db->group_by('following_id');
        CI()->db->order_by('COUNT(*)', 'DESC');
        CI()->db->join('users as u', 'u.id=follow.following_id', 'left');
        CI()->db->from('follow');
        if (!empty($user_id)) {
            CI()->db->where('follow.following_id!=', $user_id);
        }
        $followquery = CI()->db->get();
        $count = $followquery->num_rows();
        if ($count > 0) {
            return $followquery->result_array();
        } else {
            return false;
        }
        
    }
}

if(!function_exists('AddButton')){
    function AddButton($action)
    {
        $html='';
        $base_action= CI()->uri->segment(2);
        $user_id = CI()->session->userdata('admin_id');
        $role = getUserRole($user_id);

        if($role==1)
        {
            $allowadd=1;
        }
        else
        {
            $allowadd=0; //getActionAttribute($base_action,$add);
        }

        if($allowadd==1)
        {
            $html.='<a  href="'.base_url('admin/'.$base_action.'/'.$action).'" class="btn btn-s-md btn-info"><i class="fa fa-plus-circle"></i> &nbsp; Add New </a>';
        }
        else
        {    $confirm="confirm('Access denied')";
            $html.='<a onclick="return '.$confirm.'"  disabled href="#" class="btn btn-s-md btn-info"><i class="fa fa-plus-circle"></i> &nbsp; Add New </a>';
        }   

        return $html;
    }
}

if(!function_exists('AllowedAction'))
{
    function AllowedAction($module, $edit="", $delete="", $msg="", $id=0)
    {
        $html='';
        $action= CI()->uri->segment(2);
        $user_id = CI()->session->userdata('admin_id');
        $role = getUserRole($user_id);

        $url = 'admin/'.$module;

        if($role == 1)
        {
            $allowedit = 1;
            $allowdelete = 1;
        }
        else
        {
            $allowedit = 1; //getActionAttribute($action,$edit);
            $allowdelete = 1; //getActionAttribute($action,$delete);
        }

        if(($edit=='view') && ($allowedit==1))
        {
            $html.='<a href="'.base_url(''.$url.'/'.$edit.'/'.$id).'" class="btn btn-xs btn-primary"> <i class="fa fa-eye"></i> </a>';
        }

        if(($edit=='edit') && ($allowedit==1))
        {
            $html.='<a href="'.base_url(''.$url.'/'.$edit.'/'.$id).'" class="btn btn-xs btn-success"> <i class="fa fa-pencil"></i> </a>';
        }
        else
        {
            //$confirm="confirm('Access denied')";
            //$html.=' <a onclick="return '.$confirm.'" disabled class="btn btn-xs btn-success"> <i class="fa fa-pencil"></i> </a>';
            $html.='<a href="'.base_url(''.$url.'/'.$edit.'/'.$id).'" class="btn btn-xs btn-success"> <i class="fa fa-pencil"></i> </a>';
        }

        if((!empty($delete)) && ($allowdelete==1))
        {   $confirm="confirm('".$msg."')";
            $html.=' <a onclick="return '.$confirm.'" href="'.base_url(''.$url.'/'.$delete.'/'.$id).'"  class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> </a>';
        }
        else
        {
            $confirm="confirm('Access denied')";
            $html.=' <a onclick="return '.$confirm.'" disabled class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> </a>';
        }

        return $html;
    }
}

if(!function_exists('statusButton'))
{
    function statusButton($module,$action,$status,$id)
    {
        $html='';
        $user_id = CI()->session->userdata('admin_id');
        $role = getUserRole($user_id);
        $url = 'admin/'.$module.'/'.$action.'/'.$id;

        if($role == 1)
        {
            $allowedit = 1;
            $allowdelete = 1;
        }
        else
        {
            $allowedit = 0; //getActionAttribute($action,$edit);
            $allowdelete = 0; //getActionAttribute($action,$delete);
        }

        $label = (!empty($status) && $status==1) ? 'Active':'Deactive';
        $class = (!empty($status) && $status==1) ? 'label bg-green':'label bg-red';
        $html = '<a title="Change record status" href="'.base_url($url).'"><small class="'.$class.'">'.$label.'</small></a>';
        return $html;
    }
}

if(!function_exists('orderStatusButton'))
{
    function orderStatusButton($status)
    {
        $html='';
        $label = (!empty($status) && $status==1) ? 'Processed':'Pending';
        $class = (!empty($status) && $status==1) ? 'label bg-green':'label bg-red';
        $html = '<small class="'.$class.'">'.$label.'</small>';
        return $html;
    }
}

if(!function_exists('extract_tags'))
{
    function extract_tags( $html, $tag, $selfclosing = null, $return_the_entire_tag = false, $charset = 'ISO-8859-1' )
    {
         
        if ( is_array($tag) ){
            $tag = implode('|', $tag);
        }
         
        //If the user didn't specify if $tag is a self-closing tag we try to auto-detect it
        //by checking against a list of known self-closing tags.
        $selfclosing_tags = array( 'area', 'base', 'basefont', 'br', 'hr', 'input', 'img', 'link', 'meta', 'col', 'param' );
        if ( is_null($selfclosing) ){
            $selfclosing = in_array( $tag, $selfclosing_tags );
        }
         
        //The regexp is different for normal and self-closing tags because I can't figure out 
        //how to make a sufficiently robust unified one.
        if ( $selfclosing ){
            $tag_pattern = 
                '@<(?P<tag>'.$tag.')           # <tag
                (?P<attributes>\s[^>]+)?       # attributes, if any
                \s*/?>                   # /> or just >, being lenient here 
                @xsi';
        } else {
            $tag_pattern = 
                '@<(?P<tag>'.$tag.')           # <tag
                (?P<attributes>\s[^>]+)?       # attributes, if any
                \s*>                 # >
                (?P<contents>.*?)         # tag contents
                </(?P=tag)>               # the closing </tag>
                @xsi';
        }
         
        $attribute_pattern = 
            '@
            (?P<name>\w+)                         # attribute name
            \s*=\s*
            (
                (?P<quote>[\"\'])(?P<value_quoted>.*?)(?P=quote)    # a quoted value
                |                           # or
                (?P<value_unquoted>[^\s"\']+?)(?:\s+|$)           # an unquoted value (terminated by whitespace or EOF) 
            )
            @xsi';
     
        //Find all tags 
        if ( !preg_match_all($tag_pattern, $html, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE ) ){
            //Return an empty array if we didn't find anything
            return array();
        }
         
        $tags = array();
        foreach ($matches as $match){
             
            //Parse tag attributes, if any
            $attributes = array();
            if ( !empty($match['attributes'][0]) ){ 
                 
                if ( preg_match_all( $attribute_pattern, $match['attributes'][0], $attribute_data, PREG_SET_ORDER ) ){
                    //Turn the attribute data into a name->value array
                    foreach($attribute_data as $attr){
                        if( !empty($attr['value_quoted']) ){
                            $value = $attr['value_quoted'];
                        } else if( !empty($attr['value_unquoted']) ){
                            $value = $attr['value_unquoted'];
                        } else {
                            $value = '';
                        }
                         
                        //Passing the value through html_entity_decode is handy when you want
                        //to extract link URLs or something like that. You might want to remove
                        //or modify this call if it doesn't fit your situation.
                        $value = html_entity_decode( $value, ENT_QUOTES, $charset );
                         
                        $attributes[$attr['name']] = $value;
                    }
                }
                 
            }
             
            $tag = array(
                'tag_name' => $match['tag'][0],
                'offset' => $match[0][1], 
                'contents' => !empty($match['contents'])?$match['contents'][0]:'', //empty for self-closing tags
                'attributes' => $attributes, 
            );
            if ( $return_the_entire_tag ){
                $tag['full_tag'] = $match[0][0];            
            }
              
            $tags[] = $tag;
        }
         
        return $tags;
    }
}