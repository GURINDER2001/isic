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

if (!function_exists('getDomain'))
{
    function getDomain()
    {
        $basehost = CI()->config->item('base_host');
        return $basehost;
    }
}

if (!function_exists('getBrandIdByDomain'))
{
    function getBrandIdByDomain($domain='')
    {
        if (empty($domain))
            $domain = getDomain();

        $record = get_record('brands',array('domain'=>$domain));
        $brandId = !empty($record)?$record->id:'';
        return $brandId;
    }
}


if (!function_exists('getBrandId'))
{
    function getBrandId()
    {
        $brand_id = (CI()->uri->segment(1)=='admin')?CI()->session->userdata('brand_id'):'';
		if(empty($brand_id))
			$brand_id = getBrandIdByDomain();

        return !empty($brand_id)?$brand_id:0;
    }
}

if (!function_exists('getBrandIdByDomain'))
{
    function getBrandData($id='')
    {
        if (empty($id))
            $id = getBrandId();

        $record = get_record('brands',array('id'=>$id));
        return $record;
    }
}

if (!function_exists('getBrandName'))
{
    function getBrandName($id='')
    {
    	if (empty($id))
            $id = getBrandId();
        
        $record = get_record('brands',array('id'=>$id));
        $brandName = !empty($record->name)?$record->name:'Main Site';
        return $brandName;
    }
}

if (!function_exists('getPageSlug'))
{
    function getPageSlug($id)
    {
        $record = get_record('pages',array('id'=>$id));
        $slug = !empty($record->parent)?getPageSlug($record->parent).'/'.$record->slug:$record->slug;
        return $slug;
    }
}

if (!function_exists('getBrandLogo'))
{
    function getBrandLogo($id='')
    {
        if (empty($id))
            $id = getBrandId();

        $record = get_record('brands',array('id'=>$id));
        $brandLogo = !empty($record->featured_img)?base_url($record->featured_img):base_url("assets/front/images/no_image.gif");
        return $brandLogo;
    }
}


if (!function_exists('getBrandUrl'))
{
    function getBrandUrl($brand_id=0, $slug='')
    {
        $http = CI()->config->item('HTTP');
        if (empty($brand_id))
            $brand_id = getBrandId();

        if (!empty($brand_id))
        {
            $record = get_record('brands',array('id'=>$brand_id));
            $domain = !empty($record->domain)?$record->domain:'';  
        }
        else
        {
            $domain = CI()->config->item('default_host');
        }
        $brandUrl = !empty($slug)?$http.$domain.'/'.$slug:$http.$domain;        
        return $brandUrl;
        
    }
}



if (!function_exists('getBrandNameById'))
{
    function getBrandNameById($id=0)
    {
        if (!empty($id))
        {
        	$record = get_record('brands',array('id'=>$id));
        	$brandName = !empty($record->name)?$record->name:'';
        	return $brandName;
        }
        else
        {
        	return 'Main Site';
        }
        
    }
}

if (!function_exists('getBrands'))
{
    function getBrands()
    {
        $records = get_records('brands',array('status'=>1),'id','ASC');
        return $records;        
    }
}

if (!function_exists('getCategoryName'))
{
    function getCategoryName($id=0,$table='category')
    {
        if (!empty($id))
        {
            $record = get_record($table,array('id'=>$id));
            $name = !empty($record->name)?$record->name:'';
            return $name;
        }
        else
        {
            return '';
        }
        
    }
}

if (!function_exists('getCardPrice'))
{
    function getCardPrice($id)
    {
        $record = get_record('tbl_products',array('id'=>$id));
        $price = !empty($record->price)?$record->price:0;
        return $price;
    }
}

if (!function_exists('getProgramCategoryName'))
{
    function getProgramCategoryName($id=0,$table='true_programs_category')
    {
        if (!empty($id))
        {
            $record = get_record($table,array('id'=>$id));
            $name = !empty($record->name)?$record->name:'';
            return $name;
        }
        else
        {
            return '';
        }
        
    }
}

if (!function_exists('getProgram'))
{
    function getProgram($id)
    {
        if (!empty($id))
        {
            $record = get_record('programs',array('id'=>$id));
            return $record;
        }
        else
        {
            return '';
        }
        
    }
}

if (!function_exists('getProgramName'))
{
    function getProgramName($id=0)
    {
        if (!empty($id))
        {
            $record = get_record('programs',array('id'=>$id));
            $name = !empty($record->name)?$record->name:'';
            return $name;
        }
        else
        {
            return '';
        }
        
    }
}

if (!function_exists('getReportName'))
{
    function getReportName($id=0)
    {
        if (!empty($id))
        {
            $record = get_record('matrix_reports',array('id'=>$id));
            $name = !empty($record->name)?$record->name:'';
            return $name;
        }
        else
        {
            return '';
        }
        
    }
}

if (!function_exists('getCategoriesName'))
{
    function getCategoriesName($table='category',$ids='')
    {
        if (!empty($ids))
        {
            $idsArr = explode(",", $ids);
            $category_names = array();
            if(!empty($idsArr))
            {
                foreach ($idsArr as $key => $id)
                {
                   $category_names[] = getCategoryName($id,$table);
                }
                $category_names = !empty($category_names)?implode(",", $category_names):'';
            }
            return $category_names;
        }
        else
        {
            return $category_names;
        }
        
    }
}


if (!function_exists('getName'))
{
    function getName($id=0,$table='category')
    {
        if (!empty($id))
        {
            $record = get_record($table,array('id'=>$id));
            $name = !empty($record->name)?$record->name:'';
            return $name;
        }
        else
        {
            return '';
        }
        
    }
}

if (!function_exists('getJobTitle'))
{
    function getJobTitle($id=0)
    {
        if (!empty($id))
        {
            $record = get_record('jobs',array('id'=>$id));
            $name = !empty($record->name)?$record->name:'';
            return $name;
        }
        else
        {
            return '';
        }
        
    }
}

if (!function_exists('getQuestionById'))
{
    function getQuestionById($id=0)
    {
        if (!empty($id))
        {
            $record = get_record('questions',array('id'=>$id));
            $question = !empty($record->question)?$record->question:'';
            return $question;
        }
        else
        {
            return '';
        }
        
    }
}


if (!function_exists('getBrandData'))
{
    function getBrandData($domain='')
    {
        if (empty($domain))
            $domain = getDomain();

        $record = get_record('brands',array('domain'=>$domain));
        return $record;
    }
}



if (!function_exists('getNotificationHtml')) {
    function getNotificationHtml()
    {
        if (CI()->session->flashdata('notification'))
        {
            $notificationData = CI()->session->flashdata('notification');            
            if ($notificationData['error'] == 0)
            {
              ?>
                <div class="alert alert-success">
                  <a href="#" data-dismiss="alert" aria-label="close" title="close" class="close">×</a>
                  <?=$notificationData['message'];?>
                </div>
              <?php
            }
            elseif ($notificationData['error'] == 1)
            {
                ?>
                <div class="alert alert-danger">
                  <a href="#" data-dismiss="alert" aria-label="close" title="close" class="close">×</a>
                  <?=$notificationData['message']; ?>
                </div>
                <?php
            }
            elseif (validation_errors())
            {
                echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
            }
        }
    }
}

if (!function_exists('setUpdateData')) {
    function setUpdateData($table, $data, $id)
    {
        $array = array(
            'id' => $id
        );
        CI()->db->where($array);
        CI()->db->update($table, $data);
        return $id;
    }
}

if (!function_exists('setUpdateDataByCons')) {
    function setUpdateDataByCons($table, $data, $whereArr)
    {
        CI()->db->where($whereArr);
        CI()->db->update($table, $data);
    }
}

if (!function_exists('setInsertData')) {
    function setInsertData($table, $data)
    {
        CI()->db->insert($table, $data);
        return CI()->db->insert_id();
    }
}

if (!function_exists('setDeleteData')) {
    function setDeleteData($table, $id)
    {
        $array = array(
            'id' => $id
        );
        CI()->db->where($array);
        CI()->db->delete($table);
        return $id;
    }
}

if (!function_exists('deleteRecords')) {
    function deleteRecords($table, $whereArr)
    {
        CI()->db->where($whereArr);
        CI()->db->delete($table);
    }
}

if (!function_exists('isExist'))
{
    function isExist($table, $whereArr = array())
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);
        
        CI()->db->from($table);
        $query    = CI()->db->get();
        $rowCount = $query->num_rows();
        return (!empty($rowCount) && $rowCount > 0) ? 1 : 0;
    }
}

if (!function_exists('setInsertOrUpdate')) {
    function setInsertOrUpdate($table, $data, $checkArr)
    {
        $query = CI()->db->get_where($table, $checkArr);
        if ($query->num_rows() > 0)
        {
           CI()->db->where($checkArr);
           $key = CI()->db->update($table, $data);
        }
        else
        {
            $key = CI()->db->insert($table, $data);
        }
        return $key;
    }
}


if (!function_exists('getDataRecords')) {
    function getDataRecords($table, $whereArr = array(), $start=0, $limit="",  $order="DESC")
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($limit))
            CI()->db->limit($limit, $start);
        
        CI()->db->order_by('id',$order);
        $query = CI()->db->get($table);
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result();
        } else {
            $result = array();
        }
        return $result;
    }
}

if (!function_exists('getDataRecordsArr')) {
    function getDataRecordsArr($table, $whereArr = array(), $start=0, $limit="",  $order="DESC")
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);
        
        CI()->db->order_by('id',$order);
        $query = CI()->db->get($table);
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result_array();
        } else {
            $result = array();
        }
        return $result;
    }
}

if (!function_exists('getDataFilteredRecordsArr')) {
    function getDataFilteredRecordsArr($table, $whereArr = array(), $start=0, $limit="",  $order="DESC",$select = '')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);
        
        CI()->db->order_by('id',$order);
        
        if(!empty($select))
        {
           CI()->db->select($select); 
        }
        $query = CI()->db->get($table);
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result_array();
        } else {
            $result = array();
        }
        return $result;
    }
}

if (!function_exists('getRowCount')) {
    function getRowCount($table,$whereArr = array(),$like='',$likeQuery='')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);
        
        if(!empty($like) && !empty($likeQuery))
            CI()->db->like($like, $likeQuery,'both');
            
        $query = CI()->db->get($table);
        $count = $query->num_rows();
        if ($count > 0) {
            return $count;
        } else {
            return 0;
        }
    }
}

if (!function_exists('getDataRecord')) {
    function getDataRecord($table, $whereArr = array())
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        $query = CI()->db->get($table);
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->row_array();
        } else {
            return array();
        }
    }
}

if (!function_exists('getOptions')) {
    function getOptions($table, $type, $whereArr = array())
    {
        $outputArr = array(
            '' => $type
        );
        if ($table) {
            
            if (!empty($whereArr))
                CI()->db->where($whereArr);

            $query  = CI()->db->get($table);
            $records = $query->result();
            foreach ($records as $option)
            {
                $outputArr[$option->id] = $option->name;
            }
        }
        return $outputArr;
    }
}

if (!function_exists('getSubscribersOptions')) {
    function getSubscribersOptions($table, $whereArr = array())
    {
		$outputArr = array();
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        $query  = CI()->db->get($table);
        $records = $query->result();
        foreach ($records as $option)
        {
            $outputArr[$option->subscriber_email] = $option->subscriber_name .' - '.$option->subscriber_email;
        }
        return $outputArr;
    }
}

if (!function_exists('getCollegesOptions')) {
    function getCollegesOptions($table, $type, $whereArr = array())
    {
        $outputArr = array(
            '' => $type
        );
        if ($table) {
            
            if (!empty($whereArr))
                CI()->db->where($whereArr);

            $query  = CI()->db->get($table);
            $records = $query->result();
            foreach ($records as $option)
            {
                $outputArr[$option->id] = $option->college_name;
            }
        }
        return $outputArr;
    }
}

if (!function_exists('getMultiOptions')) {
    function getMultiOptions($table, $whereArr = array())
    {
        if ($table)
        {
            if (!empty($whereArr))
                CI()->db->where($whereArr);

            $query  = CI()->db->get($table);
            $records = $query->result();
            foreach ($records as $option)
            {
                $outputArr[$option->id] = $option->name;
            }
        }
        return !empty($outputArr)?$outputArr:array();
    }
}

if (!function_exists('getBrands')) {
    function getBrands()
    {
        CI()->db->where('status',1);
        $query  = CI()->db->get('brands');
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result();
            return $result;
        }
        else
        {
            return array();
        }
    }
}

if (!function_exists('getSectionDataCollection')) {
    function getSectionDataCollection($table, $section, $order = "", $start = 0, $limit = "")
    {
        if ($limit != "")
            CI()->db->limit($limit, $start);
        if ($order != "")
            CI()->db->order_by("id", $order);
        CI()->db->where('section', $section);
        $query  = CI()->db->get($table);
        $result = $query->result();
        return $result;
    }
}

if (!function_exists('getPaymentDataCollection')) {
    function getPaymentDataCollection($table, $type, $order = "", $start = 0, $limit = "")
    {
        if ($limit != "")
            CI()->db->limit($limit, $start);
        if ($order != "")
            CI()->db->order_by("id", $order);
        CI()->db->where('item_type', $type);
        $query  = CI()->db->get($table);
        $result = $query->result();
        return $result;
    }
}

if (!function_exists('setUpdateSetting')) {
    function setUpdateSetting($table, $data, $key)
    {

        $whereArr = array('name' => $key);
        $query = CI()->db->get_where($table, $whereArr);

        if ($query->num_rows() > 0)
        {
            CI()->db->where($whereArr);
            CI()->db->update($table, $data);
            return $key;
        }
        else
        {
            $data['name'] = $key;
            CI()->db->insert($table, $data);
            return $key;
        }
    }
}

if (!function_exists('setUpdateSectionSetting')) {
    function setUpdateSectionSetting($table, $section, $key, $value)
    {
        $array = array(
            'section' => $section,
            'name' => $key
        );
        $query = CI()->db->get_where($table, $array);
        if ($query->num_rows() > 0) {
            CI()->db->where($array);
            CI()->db->update($table, array(
                'value' => $value
            ));
        } else {
            CI()->db->insert($table, array(
                'section' => $section,
                'name' => $key,
                'value' => $value
            ));
        }
    }
}

if (!function_exists('setUpdateSectionSetting')) {
    function setUpdateSectionSetting($table, $section, $key, $value)
    {
        $array = array(
            'section' => $section,
            'name' => $key
        );
        $query = CI()->db->get_where($table, $array);
        if ($query->num_rows() > 0) {
            CI()->db->where($array);
            CI()->db->update($table, array(
                'value' => $value
            ));
            return $id;
        } else {
            CI()->db->insert($table, array(
                'section' => $section,
                'name' => $key,
                'value' => $value
            ));
            return CI()->db->insert_id();
        }
    }
}

if (!function_exists('getUserName')) {
    function getUserName($id)
    {
        CI()->db->select('name');
        CI()->db->where('id', $id);
        $query    = CI()->db->get('users');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $result = $query->row();
            return $result->name;
        } else {
            return "Guest";
        }
    }
}

if (!function_exists('getUserRole')) {
    function getUserRole($id)
    {
        CI()->db->select('role');
        CI()->db->where('id', $id);
        $query    = CI()->db->get('users');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $result = $query->row();
            return $result->role;
        } else {
            return 0;
        }
    }
}

if (!function_exists('getRoleName')) {
    function getRoleName($id)
    {
        CI()->db->select('name');
        CI()->db->where('id', $id);
        $query    = CI()->db->get('role');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $result = $query->row();
            return $result->name;
        } else {
            return "Guest";
        }
    }
}

if (!function_exists('getUserAvatar')) {
    function getUserAvatar($id)
    {
        CI()->db->select('featured_img');
        CI()->db->where('id', $id);
        $query    = CI()->db->get('users');
        $rowCount = $query->num_rows();
        if ($rowCount > 0)
        {
            $result = $query->row();
            if(!empty($result->featured_img))
            {
                return base_url($result->featured_img);
            }
            else
            {
                return base_url("assets/admin/images/no_image.gif");
            }            
        }
        else
        {
            return base_url("assets/front/images/no_image.gif");
        }
    }
}

if(!function_exists('getStatusById')){
    function getStatusById($table,$id){
      CI()->db->select('status');
      CI()->db->where('id', $id);
      $query = CI()->db->get($table); 
      $rowCount=$query->num_rows();
      if($rowCount>0){
          $result = $query->row();
          return $result->status;
      }
      else{
        return false;
      }
    }
}

if (!function_exists('getCountries')) {
    function getCountries()
    {
        CI()->db->select('*');
        CI()->db->where('is_active', 1);
        $query    = CI()->db->get('country');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $results = $query->result();
            return $results;
        } else {
            return false;
        }
    }
}

if (!function_exists('getCountryName')) {
    function getCountryName($id = 0)
    {
        CI()->db->select('*');
        CI()->db->where('is_active', 1);
        CI()->db->where('id', $id);
        $query    = CI()->db->get('country');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $row = $query->row();
            return $row->name;
        } else {
            return false;
        }
    }
}

if (!function_exists('getCountryCode')) {
    function getCountryCode($id = 0)
    {
        CI()->db->select('*');
        CI()->db->where('is_active', 1);
        CI()->db->where('id', $id);
        $query    = CI()->db->get('country');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $row = $query->row();
            return $row->code;
        } else {
            return '';
        }
    }
}

if (!function_exists('getStateName')) {
    function getStateName($id)
    {
        CI()->db->select('name');
        CI()->db->where('id', $id);
        $query    = CI()->db->get('state');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $result = $query->row();
            return $result->name;
        } else {
            return false;
        }
    }
}

if (!function_exists('getCityName')) {
    function getCityName($id)
    {
        CI()->db->select('name');
        CI()->db->where('id', $id);
        $query    = CI()->db->get('city');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $result = $query->row();
            return $result->name;
        } else {
            return false;
        }
    }
}

if (!function_exists('get_total_records')) {
    function get_total_records($table, $whereArr = array())
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        return $count = $query->num_rows();
    }
}

if (!function_exists('get_record')) {
    function get_record($table, $whereArr = array(), $order_by='id', $order='DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->row();
            return $result;
        } else {
            return array();
        }
        
    }
}

if (!function_exists('get_records')) {
    function get_records($table, $whereArr = array(), $order_by='id', $order='DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result();
            return $result;
        } else {
            return array();
        }
        
    }
}

if (!function_exists('get_recordsWithLimit')) {
    function get_recordsWithLimit($table, $whereArr = array(),$limit = 0, $offset=0, $order_by='id', $order='DESC',$like ='',$likeQuery='')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);
            
        if(!empty($like) && !empty($likeQuery))
            CI()->db->like($like, $likeQuery,'both');
            
        if(!empty($limit))
            CI()->db->limit($limit,$offset);
            
        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result();
            return $result;
        } else {
            return array();
        }
        
    }
}


if (!function_exists('get_cols')) {
    function get_cols($table, $columns = '*', $whereArr = array(), $order_by='id', $order='DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select($columns);
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result();
            return $result;
        } else {
            return array();
        }
        
    }
}

if (!function_exists('get_cols')) {
    function get_colsArr($table, $columns = '*', $whereArr = array(), $order_by='id', $order='DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select($columns);
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
        
    }
}

if (!function_exists('get_recordArr')) {
    function get_recordArr($table, $whereArr = array(), $order_by='id', $order='DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return array();
        }
        
    }
}

if (!function_exists('get_recordsArr')) {
    function get_recordsArr($table, $whereArr = array(), $order_by='id', $order='DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
        
    }
}

if (!function_exists('get_columData')) {
    function get_columData($table, $column, $whereArr = array())
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);
        
        CI()->db->select($column);
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->row();
            return $result->$column;
        } else {
            return '';
        }
        
    }
}

if (!function_exists('getCollegeName')) {
    function getCollegeName($id)
    {
        $returned_data = get_columData('colleges','college_name', array('id'=>$id));  
        return $returned_data;       
    }
}

if (!function_exists('getInsuranceFeatureName')) {
    function getInsuranceFeatureName($id)
    {
        $returned_data = get_columData('insurance_features','name', array('id'=>$id));  
        return $returned_data;       
    }
}

if (!function_exists('getInsuranceFeature')) {
    function getInsuranceFeature($id)
    {
        $returned_data = get_record('insurance_features',array('id'=>$id));  
        return $returned_data;       
    }
}

if (!function_exists('getCollegeLogo')) {
    function getCollegeLogo($id)
    {        
        $returned_data = get_columData('colleges','logo', array('id'=>$id));  
        return $returned_data;       
    }
}

if (!function_exists('getCollegeLogoUrl')) {
    function getCollegeLogoUrl($id)
    {        
        $returned_data = get_columData('colleges','logo', array('id'=>$id));  
        return base_url($returned_data);       
    }
}

if (!function_exists('getCollegeCoverImage')) {
    function getCollegeCoverImage($id)
    {        
        $returned_data = get_columData('colleges','cover_image', array('id'=>$id));  
        return $returned_data;       
    }
}

if (!function_exists('getCollegeSlug')) {
    function getCollegeSlug($id)
    {        
        $returned_data = get_columData('colleges','slug', array('id'=>$id));  
        return $returned_data;       
    }
}

if (!function_exists('getCollegeUrl')) {
    function getCollegeUrl($id)
    {        
        $slug = getCollegeSlug($id);
        return base_url(!empty($slug)?'university/'.$slug:'');       
    }
}

if (!function_exists('get_current_page_records')) {
    function get_current_page_records($table, $limit, $start, $whereArr = array(), $orderBy = '', $order = 'DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);
        
        if (!empty($orderBy))
            CI()->db->order_by($orderBy, $order);
        
        if (!empty($limit))
            CI()->db->limit($limit, $start);
        
        CI()->db->from($table);
        $query = CI()->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}

if (!function_exists('getUserID')) {
    function getUserID($email)
    {
        CI()->db->select('id');
        CI()->db->where('email', $email);
        $query    = CI()->db->get('users');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $result = $query->row();
            return $result->id;
        } else {
            return false;
        }
    }
}


if (!function_exists('Jpagination')) {
    function Jpagination($total_rows, $per_page = 10, $limit = 10, $url = '')
    {
        $config['use_page_numbers']   = TRUE;
        $config['num_links']          = 3;
        $config['full_tag_open']      = '<ul class="pagination">';
        $config['full_tag_close']     = '</ul>';
        $config['first_link']         = 'First';
        $config['first_tag_open']     = '<li>';
        $config['first_tag_close']    = '</li>';
        $config['last_link']          = 'Last';
        $config['last_tag_open']      = '<li>';
        $config['last_tag_close']     = '</li>';
        $config['num_tag_open']       = '<li>';
        $config['num_tag_close']      = '</li>';
        $config['next_link']          = '<i class="fa fa-angle-double-right"></i>';
        $config['next_tag_open']      = '<li>';
        $config['next_tag_close']     = '</li>';
        $config['prev_link']          = '<i class="fa fa-angle-double-left"></i>';
        $config['prev_tag_open']      = '<li>';
        $config['prev_tag_close']     = '</li>';
        $config['cur_tag_open']       = '<li class="active"><a href="javascript:void(0)">';
        $config['cur_tag_close']      = '</a></li>';
        $config['reuse_query_string'] = true;
        CI()->pagination->initialize($config);
        $config               = array();
        if(!empty($url))
        {
            $config["base_url"]   = $url;
        }
        else
        {
            $config["base_url"]   = base_url() . 'admin/' . CI()->uri->segment(2);
        }
        
        $config["total_rows"] = $total_rows;
        $config["per_page"]   = $per_page;
        CI()->pagination->initialize($config);
        return CI()->pagination->create_links();
    }
}

if (!function_exists('do_upload')) {
    function do_upload($folder, $file = "featured_img")
    {
        // Codeigniter upload for single files only.
        // Uploads folder must be in main directory.
        $config['upload_path']   = './upload/' . $folder . '/'; // Added forward slash 
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx'; // Not sure docx will work?
        //$config['max_size'] = '1000';
        // $config['max_width'] = '1024';
        //$config['max_height'] = '768';
        $uploaddir               = 'upload/' . $folder . '/';
        if (!is_dir($uploaddir)) {
            mkdir($uploaddir);
        }
        $config['overwrite'] = TRUE;
        CI()->load->library('upload', $config);
        CI()->upload->initialize($config);
        // on view the name <input type="file" name="userfile" size="20"/>
        if (!CI()->upload->do_upload($file)) {
            CI()->form_validation->set_message('do_upload', 'Post update should have something written or a photo or attach a file.');
        } else {
            $upload_data = CI()->upload->data();
            $file_name   = $upload_data['file_name'];
            $file_path   = $uploaddir . $file_name;
            return $file_path;
        }
        
    }
}

if(!function_exists('do_uploadFiles'))
{
    function do_uploadFiles($folder, $filename) {
            
            $config['upload_path'] = './upload/'.$folder.'/'; // Added forward slash 
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlxs|ppt'; // Not sure docx will work?

            //$config['max_size']   = '1000';
            //$config['max_width']  = '1024';
            //$config['max_height'] = '768';

            $uploaddir = 'upload/'.$folder.'/';

            if(!is_dir($uploaddir))
            {
                mkdir($uploaddir);
            }

            $config['overwrite'] = TRUE;
            CI()->load->library('upload', $config);
            CI()->upload->initialize($config);
            $input = $filename;

            if (!CI()->upload->do_upload($filename))
            {
                CI()->form_validation->set_message('do_upload', 'Post update should have something written or a photo or attach a file.');
            }
            else
            {
                $upload_data = CI()->upload->data();
                $file_name = $upload_data['file_name'];
                $file_path=$uploaddir.$file_name;
                return $file_path;
            }
    }
}

if(!function_exists('upload_attachments'))
{
    function upload_attachments($folder, $filename) {
            
            $config['upload_path'] = './upload/'.$folder.'/'; // Added forward slash 
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlxs|ppt'; // Not sure docx will work?

            //$config['max_size']   = '1000';
            //$config['max_width']  = '1024';
            //$config['max_height'] = '768';

            //$new_filename = $_FILES[$filename]['name'].'_'.time();
            //$config['file_name'] = $new_filename;

            $uploaddir = 'upload/'.$folder.'/';

            if(!is_dir($uploaddir))
            {
                mkdir($uploaddir);
            }

            $config['overwrite'] = TRUE;
            CI()->load->library('upload', $config);
            CI()->upload->initialize($config);

            if (!CI()->upload->do_upload($filename))
            {
                CI()->session->set_flashdata('notification', array('error' => 1,'message' => 'Post update should have something written or a photo or attach a file.'));
            }
            else
            {
                $upload_data = CI()->upload->data();
                $upload_data['filepath'] = $uploaddir.$upload_data['file_name'];
                return $upload_data;
            }
    }
}

if (!function_exists('do_cover')) {
    function do_cover($folder)
    {
        // Codeigniter upload for single files only.
        // Uploads folder must be in main directory.
        $config['upload_path']   = './upload/' . $folder . '/'; // Added forward slash 
        $config['allowed_types'] = 'gif|jpg|jpeg|png|docx'; // Not sure docx will work?
        //$config['max_size'] = '1000';
        // $config['max_width'] = '1024';
        //$config['max_height'] = '768';
        $uploaddir               = 'upload/' . $folder . '/';
        if (!is_dir($uploaddir)) {
            mkdir($uploaddir);
        }
        $config['overwrite'] = TRUE;
        CI()->load->library('upload', $config);
        CI()->upload->initialize($config);
        $input = "banner_img"; // on view the name <input type="file" name="userfile" size="20"/>
        if (!CI()->upload->do_upload('banner_img')) {
            CI()->form_validation->set_message('do_upload', 'Post update should have something written or a photo or attach a file.');
        } else {
            $upload_data = CI()->upload->data();
            $file_name   = $upload_data['file_name'];
            $file_path   = $uploaddir . $file_name;
            return $file_path;
        }
        
    }
}

if (!function_exists('time_elapsed')) {
    function time_elapsed($datetime, $full = false)
    {
        $now  = new DateTime;
        $ago  = new DateTime($datetime);
        $diff = $now->diff($ago);
        
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second'
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        $string = array_values($string);
        
        return isset($string[0]) ? $string[0] . ' ago' : 'Just Now';
        
    }
}

if (!function_exists('pre')) {
    function pre($var)
    {
        echo "<pre>";
        print_R($var);
        echo "</pre>";
    }
}

if (!function_exists('fatch_youtube_key')) {
    function fatch_youtube_key($url)
    {
        $url_part = explode('?', $url);
        if (count($url_part) > 1) {
            parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
            return $my_array_of_vars['v'];
        } else {
            $url_part   = explode('/', $url);
            $part_count = count($url_part);
            $url_key    = $url_part[$part_count - 1];
            return $url_key;
        }
        
    }
}

if (!function_exists('socialShare')) {
    function socialShare($postLink = "", $postImageUrl = "", $postDesc = "", $postTitle = "", $type = "")
    {
        if ($type == 'button')
        {
    ?>         
         <ul class="shareLinks">   
      <li><a data-tooltip="tooltip" title="Click to share this post on facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?= $postLink ?>&amp;p[images][0]=<?= $postImageUrl ?>&amp;p[title]=<?=$postTitle; ?>&amp;p[summary]=<?= strip_tags($postDesc); ?>" ><i class="fa fa-facebook" aria-hidden="true"></i> Share</a></li>
        <li><a data-tooltip="tooltip" title="Click to share this post on Twitter" href="http://twitter.com/home?status=<?= $postTitle; ?> <?= $postLink ?>" rel="nofollow" title="Click to share this post on Twitter""><i class="fa fa-twitter" aria-hidden="true"></i> Tweet</a></li>       
    </ul>

    <?php
        }
        else
        {
    ?> 
      <a data-tooltip="tooltip" title="Click to share this post on facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?= $postLink ?>&amp;p[images][0]=<?= $postImageUrl ?>&amp;p[title]=<?=$postTitle; ?>&amp;p[summary]=<?= strip_tags($postDesc); ?>" ><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="http://twitter.com/home?status=<?= $postTitle; ?> <?= $postLink ?>" rel="nofollow" data-tooltip="tooltip" title="Click to share this post on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    <?php
        }
    }
}

if (!function_exists('getFooterInfo')) {
    function getFooterInfo($name)
    {
        CI()->db->select('value');
        CI()->db->where('name', $name);
        $query  = CI()->db->get('settings');
        $result = $query->row();
        return $result->value;
        
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key)
    {
        CI()->db->select('value');
        CI()->db->where('name', $key);
        $query    = CI()->db->get('settings');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $results = $query->row();
            return $results->value;
        } else {
            return false;
        }
    }
}

if (!function_exists('getAdminEmail')) {
    function getAdminEmail()
    {
        CI()->db->select('value');
        CI()->db->where('name', 'admin_email');
        $query    = CI()->db->get('settings');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $results = $query->row();
            return $results->value;
        } else {
            return false;
        }
    }
}

if (!function_exists('send_email')) {
    function send_email($to_email, $subject, $message = '', $from_email = '', $from_name = '')
    {
        CI()->load->library('email');

        $from_name = !empty($from_name) ? $from_name : (!empty(getEmailFromName())?getEmailFromName():getSetting('smtp_from'));
        $from_email  = !empty($from_email) ? $from_email : (!empty(getEmailFromEmail())?getEmailFromEmail():getSetting('smtp_user'));
        
        $smtp_host              = getSetting('smtp_host');
        $smtp_port              = getSetting('smtp_port');
        $smtp_user              = getSetting('smtp_user');
        $smtp_pass              = getSetting('smtp_pass');
        $config                 = array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'priority' => '1',
            'newline' => '\r\n'
        );
        $config['protocol']     = 'smtp';
        $config['smtp_host']    = $smtp_host;
        $config['smtp_port']    = $smtp_port;
        //$config['smtp_timeout'] = '7';
        $config['smtp_user']    = $smtp_user;
        $config['smtp_pass']    = $smtp_pass;
        $config['charset']      = 'utf-8';
        #$config['newline']      = "\r\n";
        
        CI()->email->initialize($config);
        CI()->email->from($smtp_user, $from_name);
        CI()->email->to($to_email);
        CI()->email->subject($subject);
        CI()->email->message($message);

        if (!CI()->email->send()) {
            $from    = $from_name . "<" . $from_email . ">";
            $headers = "From: $from\r\n";
            $headers .= "MIME-Version: 1.0\r\n" . "Content-Type: text/html;";
            $success = @mail($to_email, $subject, $message, $headers);
        }
        //echo CI()->email->print_debugger();

    }
}

if(!function_exists('send_email_with_attachment')){
    function send_email_with_attachment($to_email,$subject,$message='',$attachments = array(), $from_email='',$from_name='')
    { 
        $from_name = !empty($from_name) ? $from_name : (!empty(getEmailFromName())?getEmailFromName():getSetting('smtp_from'));
        $from_email  = !empty($from_email) ? $from_email : (!empty(getEmailFromEmail())?getEmailFromEmail():getSetting('smtp_user'));
        
        $smtp_host              = getSetting('smtp_host');
        $smtp_port              = getSetting('smtp_port');
        $smtp_user              = getSetting('smtp_user');
        $smtp_pass              = getSetting('smtp_pass');
        
        $config                 = array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'priority' => '1',
            'newline' => '\r\n'
        );
        $config['protocol']     = 'smtp';
        $config['smtp_host']    = $smtp_host;
        $config['smtp_port']    = $smtp_port;
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = $smtp_user;
        $config['smtp_pass']    = $smtp_pass;
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";

        //echo "<pre>"; print_r($config); echo "</pre>"; die;

        CI()->email->initialize($config);
        CI()->email->from($smtp_user, $from_name);
        CI()->email->to($to_email);
        CI()->email->subject($subject);
        CI()->email->message($message);

        if(!empty($attachments))
        {
            foreach ($attachments as $attachment)
            {
                CI()->email->attach($attachment);
            }
        }

        if(!CI()->email->send()) {          
            
            $from = $from_name."<".$from_email.">";
            $headers = "From: $from\r\n";
            $headers .= "MIME-Version: 1.0\r\n"."Content-Type: text/html;";
            $success = @mail($to_email,$subject,$message,$headers);
        }
    }
}


if (!function_exists('email_compose')) {
    function email_compose($email_template, $templateTags)
    {
        $templateContents = file_get_contents(APPPATH . '/email-templates/' . $email_template);
        return $message = strtr($templateContents, $templateTags);
    }
}

if (!function_exists('shortcodeData')) {
    function shortcodeData($textContent, $tags)
    {
        return $result = strtr($textContent, $tags);
    }
}

if(!function_exists('getMultilevelOptions'))
{

    function getMultilevelOptions($table, $whereArr = array(), $blankOption = '------Select Option-----' , $isBlankOpt = true)
    {
        if(!empty($isBlankOpt) && $isBlankOpt == true)
        {
            $options = array('' => $blankOption);
        }
        else
        {
            $options = array();
        }
        

        if(!empty($whereArr))
            CI()->db->where($whereArr);

        CI()->db->from($table);        
        $query   = CI()->db->get();
        $records = $query->result_array();
        if(!empty($records))
        {
           $records = getOptionsTree($records);
            foreach ($records as $rec) {
                $options[$rec['id']] = $rec['name'];
            }
        }               
        return $options;
    }
}

if(!function_exists('getOptionsTree'))
{
    function getOptionsTree($records, $parent = 0, $indent = "")
    {
        $results = array();
        if ($records)
        {           
            foreach ($records as $key => $val)
            {
                if ($val['parent'] == $parent)
                {
                    $val['name'] = $indent . $val['name'];
                    $results[$val['id']] = $val;
                    $results = $results + (getOptionsTree($records, $val['id'], $indent . "&nbsp;&nbsp;--&nbsp;&nbsp;"));
                }
            }
        }
        return $results;
    }
}


if(!function_exists('getCountriesFromDiscounts')){
    function getCountriesFromDiscounts(){
        
        CI()->db->distinct();
        CI()->db->select('C.id,C.name');
        CI()->db->from('tbl_discounts as D');
        CI()->db->join('tbl_country as C', 'C.id = D.country_id');
        CI()->db->where('D.country_id <>', 101);
        CI()->db->order_by('C.name', 'ASC');
        
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        
        $results = array();
        if ($count > 0)
        {
            $results = $query->result_array();
            
        }
        return !empty($results)?$results:array();
    }
}

if(!function_exists('getCountries')){
    function getCountries()
    {
        CI()->db->select('*');
        CI()->db->from('country');
        CI()->db->where('status', 1);
        $query = CI()->db->get();
        $rowCount=$query->num_rows();
        if($rowCount>0)
        {
            return $query->result(); 
        }
        else
        {
            return array();
        }
    }
}

if(!function_exists('getCountry')){
    function getCountry($id){
        CI()->db->select('*');
        CI()->db->from('country');
        CI()->db->where('id', $id);
        $query = CI()->db->get();
        $rowCount=$query->num_rows();
        if($rowCount>0) {
            return $query->row();
        } else {
            return array();
        }
    }
}

if(!function_exists('getCountryName')){
    function getCountryName($id)
    {
        CI()->db->select('*');
        CI()->db->from('country');
        CI()->db->where('id', $id);
        $query = CI()->db->get();
        $rowCount=$query->num_rows();
        if($rowCount>0)
        {
            $row = $query->row();
            return $row->name;
        }
        else
        {
            return '';
        }
    }
}

if(!function_exists('getCountryNameByCode')){
    function getCountryNameByCode($code)
    {
        CI()->db->select('*');
        CI()->db->from('country');
        CI()->db->where('code', $code);
        $query = CI()->db->get();
        $rowCount=$query->num_rows();
        if($rowCount>0)
        {
            $row = $query->row();
            return $row->name;
        }
        else
        {
            return '';
        }
    }
}

if(!function_exists('getCountriesOptions')){
    function getCountriesOptions($blankOption = true){
        CI()->db->select('*');
        CI()->db->from('country');
        CI()->db->where('is_active', 1);
        $query = CI()->db->get();
        $rowCount=$query->num_rows();
        if(!empty($blankOption))
        {
            $options = array(''=>'----Country----');
        }
        else
        {
            $options = array();
        }
        
        if($rowCount>0) {
            $records = $query->result();
            foreach ($records as $rec) {
                $options[$rec->id] = $rec->name;
            }
        }
        return $options;
    }
}

if(!function_exists('getCountriesOptionsValue')){
    function getCountriesOptionsValue($countries){
        $countriesArr = !empty($countries)?explode(",",$countries):array();
        
        $countrynameArr = array();
        if(!empty($countriesArr))
        {
            foreach($countriesArr as $country_id)
            {
                $countryName = getCountryName($country_id);
                array_push($countrynameArr,$countryName);
            }
        }
        
        return !empty($countrynameArr)?implode(',',$countrynameArr):'';
    }
}

if(!function_exists('getStatesOptions')){
    function getStatesOptions($country_id, $blankVal = '----State----' ){
        CI()->db->select('*');
        CI()->db->from('state');
        CI()->db->where('status', 1);
        CI()->db->where('country_id', $country_id);
        $query = CI()->db->get();
        $rowCount=$query->num_rows();
        $options = array(''=>$blankVal);
        if($rowCount>0) {
            $records = $query->result();
            foreach ($records as $rec) {
                $options[$rec->id] = $rec->name;
            }
        }
        return $options;
    }
}

if(!function_exists('getStateName')){
    function getStateName($id)
    {
        CI()->db->select('*');
        CI()->db->from('state');
        CI()->db->where('id', $id);
        $query = CI()->db->get();
        $rowCount=$query->num_rows();
        if($rowCount>0)
        {
            $row = $query->row();
            return $row->name;
        }
        else
        {
            return '';
        }
    }
}

if(!function_exists('getCitiesOptions')){
    function getCitiesOptions($state_id, $blankVal = '----City----'){
        CI()->db->select('*');
        CI()->db->from('city');
        CI()->db->where('status', 1);
        CI()->db->where('state_id', $state_id);
        $query = CI()->db->get();
        $rowCount=$query->num_rows();
        $options = array(''=>$blankVal);
        if($rowCount>0) {
            $records = $query->result();
            foreach ($records as $rec) {
                $options[$rec->id] = $rec->name;
            }
        }
        return $options;
    }
}

if(!function_exists('getCityName')){
    function getCityName($id)
    {
        CI()->db->select('*');
        CI()->db->from('city');
        CI()->db->where('id', $id);
        $query = CI()->db->get();
        $rowCount=$query->num_rows();
        if($rowCount>0)
        {
            $row = $query->row();
            return $row->name;
        }
        else
        {
            return '';
        }
    }
}

if(!function_exists('getSetting')){
    function getSetting($key)
    {
        $settings = get_record('settings',array('name'=>$key));
        return !empty($settings->value)?$settings->value:'';
    }
}

if(!function_exists('getSiteTitle')){
    function getSiteTitle()
    {
        $settings = get_record('settings',array('name'=>'sitename'));
        return !empty($settings->value)?$settings->value:'';
    }
}

if(!function_exists('getSiteAdminEmail')){
    function getSiteAdminEmail()
    {
        $settings = get_record('settings',array('name'=>'admin_email'));
        return !empty($settings->value)?$settings->value:'';
    }
}

if(!function_exists('getEmailFromName')){
    function getEmailFromName()
    {
        $settings = get_record('settings',array('name'=>'email_fromname'));
        return !empty($settings->value)?$settings->value:'';
    }
}

if(!function_exists('getEmailFromEmail')){
    function getEmailFromEmail()
    {
        $settings = get_record('settings',array('name'=>'email_fromemail'));
        return !empty($settings->value)?$settings->value:'';
    }
}

if(!function_exists('getSiteTitle')){
    function getSiteTitle()
    {
        $settings = get_record('settings',array('name'=>'sitename'));
        return !empty($settings->value)?$settings->value:'';
    }
}

if(!function_exists('getEmailLogo')){
    function getEmailLogo()
    {
        $settings = get_record('settings',array('name'=>'email_logo'));
        return !empty($settings->value)?$settings->value:'';
    }
}

if(!function_exists('getEmailSignature')){
    function getEmailSignature()
    {
        $settings = get_record('settings',array('name'=>'email_signature'));
        return !empty($settings->value)?$settings->value:'';
    }
}

if(!function_exists('getEmailDisclaimer')){
    function getEmailDisclaimer()
    {
        $settings = get_record('settings',array('name'=>'email_disclaimer'));
        return !empty($settings->value)?$settings->value:'';
    }
}

if(!function_exists('getProgramsCats')){
    function getProgramsCats($table="programs_category")
    {
        $brand_id = getBrandId();
        CI()->db->select('name,slug');
        CI()->db->where(array('status'=>1,'FIND_IN_SET('.$brand_id.', associted_brands) <>'=>0)); 
        $query = CI()->db->get($table); 
        $records =  $query->result();

        $outputArr = array();
        if(!empty($records))
        {
            foreach ($records as $key => $rec)
            {
               $rArr = array();
               $rArr['slug'] = getCategorySlug($rec->slug);
               $rArr['name'] = $rec->name;
               array_push($outputArr, $rArr);
            }
        }
        
        return $outputArr;
    }
}

if(!function_exists('getProgramsCatsCollections'))
{
    function getProgramsCatsCollections($catIds, $table="programs_category")
    {
        $catNameArr = array();
        if(!empty($catIds))
        {
            $catArr = explode(",", $catIds);        
            foreach ($catArr as $key => $cat_id)
            {
                $catNameArr[$cat_id] = getProgramCategoryName($cat_id);
            }
        }        
        return !empty($catNameArr)?implode(",", $catNameArr):''; 
    }
}

if(!function_exists('getCollegesList')){
    function getCollegesList($table="colleges")
    {
        $brand_id = getBrandId();
        CI()->db->select('college_name as name,slug');
        CI()->db->where(array('status'=>1)); 
        $query = CI()->db->get($table); 
        $records =  $query->result();

        $outputArr = array();
        if(!empty($records))
        {
            foreach ($records as $key => $rec)
            {
               $rArr = array();
               $rArr['slug'] = getCategorySlug($rec->slug);
               $rArr['name'] = $rec->name;
               array_push($outputArr, $rArr);
            }
        }
        
        return $outputArr;
    }
}

if(!function_exists('getProgramsCategory')){
    function getProgramsCategory($id)
    {
        if (!empty($id))
        {
            $record = get_record("programs_category",array('id'=>$id));
            $name = !empty($record->name)?$record->name:'';
            return $name;
        }
        else
        {
            return '';
        }
    }
}

if(!function_exists('genarateSlug')){
    function genarateSlug($name)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        return $slug;
    }
}

if(!function_exists('validateSlugAndRegenarate')){
    function validateSlugAndRegenarate($table,$slug)
    {
        $brand_id = getBrandId();
        CI()->db->select('slug');
        CI()->db->where(array('slug'=>$slug));
        $query = CI()->db->get($table);
        $rowCount=$query->num_rows();
        if($rowCount>0)
        {
            $row = $query->row();
            echo $slug_int = $matches;
            echo $slug_int = (int)$slug;

            die;
            if(!empty($slug_int))
            {
                $slug_increment = $slug_int + 1;
                $final_slug = str_replace($slug_int, $slug_increment, $slug);
            }
            else
            {
                $final_slug = $slug.'2';
            }
        }
        else
        {
            $final_slug = $slug;
        }        
        return $final_slug;
    }
}


if(!function_exists('rand_string')){
    function rand_string( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }
}

if (!function_exists('isLoggedIn')) {

    function isLoggedIn()
    {
        $login_data = CI()->session->userdata('login_data');
        if (!empty($login_data))
        {
           return true;
        }
        else
        {
            return false;
        }
    }
}

if (!function_exists('getSerialNo')) {

    function getSerialNo($userId = 0)
    {
        if(empty($userId))
        {
            $login_data = CI()->session->userdata('login_data');
            $userId = $login_data['user_id'];
        }
        
        $user = get_record('tbl_users',array('user_id_api'=>$userId));
        $serial_no = !empty($user->serial_no)?$user->serial_no:'';
        return $serial_no;
    }
}

if (!function_exists('getCurrentUser')) {

    function getCurrentUser()
    {
        $login_data = CI()->session->userdata('login_data');
        $userId = $login_data['user_id'];
        
        $user = get_record('tbl_users',array('user_id_api'=>$userId));
        return !empty($user)?$user:array();
    }
}


if (!function_exists('CheckStudentLoginSession')) {

    function CheckStudentLoginSession()
    {
        $student_login_data = CI()->session->userdata('student_login_data');
        if (empty($student_login_data)) {
            redirect('login', 'refresh');
        }
    }
}

if (!function_exists('IsStudentLoggedIn')) {    

    function IsStudentLoggedIn()
    {
        $student_login_data = CI()->session->userdata('student_login_data');
        if (!empty($student_login_data)) {
            redirect('my-account', 'refresh');
        }
    }
}

if (!function_exists('loggedInStudentId')) {

    function loggedInStudentId()
    {
        $student_login_data = CI()->session->userdata('student_login_data');

        return $student_login_data['student_id'];
    }
}

if (!function_exists('CheckSmartLoginSession')) {

    function CheckSmartLoginSession()
    {
        $college_login_data = CI()->session->userdata('college_login_data');
        if (empty($college_login_data)) {
            redirect('login', 'refresh');
        }
    }
}

if (!function_exists('getCurrentLoggedInCollegeId')) {

    function getCurrentLoggedInCollegeId()
    {
        $college_login_data = CI()->session->userdata('college_login_data');
        if (!empty($college_login_data))
        {
            return $college_login_data['college_id'];
        }
        else
        {
            return 0;
        }
    }
}

if (!function_exists('getCurrentLoggedInCollegeStaffId')) {

    function getCurrentLoggedInCollegeStaffId()
    {
        $college_login_data = CI()->session->userdata('college_login_data');
        if (!empty($college_login_data))
        {
            return $college_login_data['college_staff_id'];
        }
        else
        {
            return 0;
        }
    }
}


if (!function_exists('IsCollegeLoggedIn')) {    

    function IsCollegeLoggedIn()
    {
        $college_login_data = CI()->session->userdata('college_login_data');
        if (!empty($college_login_data)) {
            redirect('dashboard', 'refresh');
        }
    }
}


if (!function_exists('getQuestionName'))
{
    function getQuestionName($id)
    {
        if (!empty($id))
        {
            $record = get_record('questions',array('id'=>$id));
            $question = !empty($record->question)?$record->question:'';
            return $question;
        }
        else
        {
            return '';
        }        
    }
}

if (!function_exists('getAffiliateName'))
{
    function getAffiliateName($id)
    {
        if (!empty($id))
        {
            $record = get_record('affiliates',array('id'=>$id));
            $name = !empty($record->name)?$record->name:'';
            return $name;
        }
        else
        {
            return '';
        }        
    }
}
if (!function_exists('optionsTimezones'))
{
    function optionsTimezones($campus, $selected = '')
    {
        $OptionsArray = timezone_identifiers_list();
        $select= '<select name="campus['.$campus.'][timezone]" class="form-control select2" style="width: 100%;">';
        foreach ($OptionsArray as $key => $value)
        {
            $select .='<option value="'.$value.'"';
            $select .= ($value == $selected ? ' selected' : '');
            $select .= '>'.$value.'</option>';
        }
        $select.='</select>';
        return $select;
    }
}

if (!function_exists('timezoneOptions'))
{
    function timezoneOptions()
    {
        $OptionsArray = timezone_identifiers_list();
        $timezones = array();
        foreach ($OptionsArray as $key => $value)
        {
            $timezones[$value] = $value;
        }
        return $timezones;
    }
}

if (!function_exists('options_Timezones'))
{
    function options_Timezones()
    {
        $OptionsArray = timezone_identifiers_list();

        $timezoneOptions = array(''=>'---- Choose Timezone ----');
        foreach ($OptionsArray as $key => $value)
        {
           $timezoneOptions[$value] = $value;
        }

        return $timezoneOptions;
    }
}

if (!function_exists('designTitle'))
{
    function designTitle($name='')
    {
        $title = '';
        if(!empty($name))
        {
            $nameArr = !empty($name)?explode(' ',$name):array();
            $firstWord = !empty($nameArr)?array_shift($nameArr):'';
            $remainWords = !empty($nameArr)?implode(" ", $nameArr):'';
            $title = $firstWord.' <span>'.$remainWords.'</span>';
        }
        return $title;
    }
}

if (!function_exists('getSocialMediaLists'))
{
    function getSocialMediaLists()
    {
        $socialArr = array(
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'google' => 'Google',
            'linkedin' => 'Linkedin',
            'youtube' => 'Youtube',
            'instagram' => 'Instagram',
            'pinterest' => 'Pinterest',
            'snapchat-ghost' => 'Snapchat',
            'skype' => 'Skype',
            'android' => 'Android',
            'dribbble' => 'Dribbble',
            'vimeo' => 'Vimeo',
            'tumblr' => 'Tumblr',
            'vine' => 'Vine',
            'foursquare' => 'Foursquare',
            'stumbleupon' => 'Stumbleupon',
            'flickr' => 'Flickr',
            'yahoo' => 'Yahoo',
            'reddit' => 'Reddit',
            'rss' => 'Rss',
        );
        return $socialArr;
    }
}

if (!function_exists('fileSizeUnits'))
{
    function fileSizeUnits($size)
    {
        if ($size >= 1024)
        {
            $size = number_format($size / 1024, 1) . ' MB';
        }
        else
        {
            $size = number_format($size, 1) . ' KB';
        }
        return $size;
    }
}

if (!function_exists('download_file'))
{
    function download_file($file,$is_full=0)
    {
        $filepath = !empty($is_full)?$file:$_SERVER['DOCUMENT_ROOT'].'/'.$file;
        if(!empty($filepath) && file_exists($filepath))
        {

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            exit;
        }
    }
}

if (!function_exists('genderOptions')) {
    function genderOptions($type = 'Choose Gender')
    {
        $outputArr = array(
            '' => $type
        );
        $outputArr['male'] = 'Male';
        $outputArr['female'] = 'Female';
        return $outputArr;
    }
}

if (!function_exists('birthyearOptions')) {
    function birthyearOptions($type = 'Choose Year of Birth')
    {
        $outputArr = array(
            '' => $type
        );
        $start =  date("Y",strtotime("-15 years"));
        $end =  date("Y",strtotime("-80 years"));

        for ($i=$start; $i >= $end; $i--) { 
           $outputArr[$i] = $i;
        }

        return $outputArr;
    }
}

if (!function_exists('workExperienceOptions')) {
    function yearsOptions($type = 'Choose Work Experience')
    {
        $outputArr = array(
            '' => $type
        );
        
        for ($i=0; $i <= 25 ; $i++)
        { 
           $label = '';
           if($i==25)
           {
                $label = $i.' Years or more';
           }
           elseif($i < 2)
           {
                $label = $i.' Year';
           }
           else
           {
             $label = $i.' Years';
           }

           $outputArr[$i] = $label;
        }

        return $outputArr;
    }
}

if (!function_exists('educationsOptions')) {
    function educationsOptions($type = '--None--')
    {
        $outputArr = array(
            '' => $type
        );
        $outputArr['Pre School'] = 'Pre School';
        $outputArr['Elemantry'] = 'Elemantry';
        $outputArr['High School'] = 'High School';
        $outputArr['Bachlor'] = 'Bachlor';
        $outputArr['Master'] = 'Master';
        return $outputArr;
    }
}

if (!function_exists('startPeriodOptions')) {
    function startPeriodOptions($type = 'Please Select')
    {
        $outputArr = array(
            '' => $type
        );
        $outputArr['0 to 6 Months'] = '0 to 6 Months';
        $outputArr['7 to 12 Months'] = '7 to 12 Months';
        $outputArr['13 to 24 Months'] = '13 to 24 Months';
        return $outputArr;
    }
}

if (!function_exists('fundingOptions')) {
    function fundingOptions($type = 'Choose Funding')
    {
        $outputArr = array(
            '' => $type
        );
        $outputArr['Self Funding'] = 'Self Funding';
        $outputArr['Business or Goverment Funding'] = 'Business or Goverment Funding';
        $outputArr['I need Scholarship'] = 'I need Scholarship';
        return $outputArr;
    }
}

if (!function_exists('getStudentName')) {
    function getStudentName($id)
    {
        $name = '';
        $rec = get_record('students',array('id'=>$id));
        if(!empty($rec))
        {
            $name = $rec->first_name.' '.$rec->last_name;
        }

        return $name;
    }
}

if (!function_exists('getStudentEmail')) {
    function getStudentEmail($id)
    {
        $email = '';
        $rec = get_record('students',array('id'=>$id));
        if(!empty($rec))
        {
            $email = $rec->email;
        }

        return $email;
    }
}

if (!function_exists('getStudentProfilePic')) {
    function getStudentProfilePic($id)
    {
        $rec = get_record('students',array('id'=>$id));
        return base_url(!empty($rec->profile_pic)?$rec->profile_pic:'assets/studentshub/images/dummy-user-img-1.png');
    }
}

if (!function_exists('getQuestionById'))
{
    function getQuestionById($id)
    {
        $rec = get_record('questions',array('id'=>$id));
        return !empty($rec->question)?$rec->question:'';
    }
}

if (!function_exists('getProgramNameById'))
{
    function getProgramNameById($id)
    {
        $rec = get_record('programs',array('id'=>$id));
        return !empty($rec->name)?$rec->name:'';
    }
}

if (!function_exists('getCollegeNameByProgramId'))
{
    function getCollegeNameByProgramId($id)
    {
        $rec = get_record('programs',array('id'=>$id));
        $college_id = !empty($rec->college_id)?$rec->college_id:0;

        if(!empty($college_id))
        {
            $college = get_record('colleges',array('id'=>$college_id));
            return !empty($college->college_name)?$college->college_name:'';
        }
        else
        {
            return '';
        }
         
    }
}

if (!function_exists('getCollegeLogoUrlByProgramId'))
{
    function getCollegeLogoUrlByProgramId($id)
    {
        $rec = get_record('programs',array('id'=>$id));
        $college_id = !empty($rec->college_id)?$rec->college_id:0;

        if(!empty($college_id))
        {
            $college = get_record('colleges',array('id'=>$college_id));
            return !empty($college->logo)?base_url($college->logo):'';
        }
        else
        {
            return '';
        }
         
    }
}


if (!function_exists('getCollegeStaffNameById'))
{
    function getCollegeStaffNameById($id)
    {
        $staff = get_record('colleges_staffs',array('id'=>$id));
        $staffname = !empty($staff->name)?$staff->name:'';
        if(empty($staffname) && !empty($staff->college_id))
        {
            $college = get_record('colleges',array('id'=>$staff->college_id));
            $staffname = !empty($college->college_name)?$college->college_name:'';
        }

        return $staffname;
    }
}

if (!function_exists('getCollegeEmailById'))
{
    function getCollegeEmailById($id)
    {
        $college = get_record('colleges',array('id'=>$id));
        $college_email = !empty($college->college_email)?$college->college_email:'';
        return $college_email;
    }
}

if (!function_exists('getCollegeStaffByEmail'))
{
    function getCollegeStaffIdByEmail($email)
    {
        $staff = get_record('colleges_staffs',array('email'=>$email));
        $staff_id = !empty($staff->email)?$staff->email:0;
        return $staff_id;
    }
}

if (!function_exists('getCollegeStaffEmailById'))
{
    function getCollegeStaffEmailById($id)
    {
        $staff = get_record('colleges_staffs',array('id'=>$id));
        $staffemail = !empty($staff->email)?$staff->email:'';
        if(empty($staffemail) && !empty($staff->college_id))
        {
            $college = get_record('colleges',array('id'=>$staff->college_id));
            $staffemail = !empty($college->college_email)?$college->college_email:'';
        }

        return $staffemail;
    }
}

if (!function_exists('getCollegeStaffPicById'))
{
    function getCollegeStaffPicById($id)
    {
        $staff = get_record('colleges_staffs',array('id'=>$id));
        $profile_pic = !empty($staff->profile_pic)?$staff->profile_pic:'';
        if(empty($profile_pic) && !empty($staff->college_id))
        {
            $college = get_record('colleges',array('id'=>$staff->college_id));
            $profile_pic = !empty($college->logo)?$college->logo:'';
        }
        return base_url(!empty($profile_pic)?$profile_pic:'assets/studentshub/images/dummy-user-img-1.png');
    }
}


if (!function_exists('calculate_percentage'))
{
    function calculate_percentage($total,$agreegate , $symbol = 0)
    {
        $percentage = ($agreegate*100)/$total;
        if(!empty($symbol))
        {
            $percentage = $percentage.'%';
        }
        return $percentage;
    }
}

if (!function_exists('getMonthsList'))
{
    function getMonthsList()
    {
        return array('January','February','March','April','May','June','July','August','September','October','November','December');
    }
}

if (!function_exists('getDaysList'))
{
    function getDaysList()
    {
        return array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    }
}

if (!function_exists('durationTerms_options'))
{
    function durationTerms_options()
    {
        return array('Years'=>'Years','Semesters'=>'Semesters','Months'=>'Months', 'Weeks'=>'Weeks', 'Days'=>'Days', 'Hours'=>'Hours');
    }
}

if (!function_exists('currency_options'))
{
    function currency_options()
    {
        return array('USD'=>'USD','INR'=>'INR','AUD'=>'AUD', 'CAD'=>'CAD');
    }
}

if (!function_exists('getStudyTypes'))
{
    function getStudyTypes()
    {
        return get_recordsArr('studytype',array('status'=>1));
    }
}

if (!function_exists('getPaces'))
{
    function getPaces()
    {
        return get_recordsArr('pace',array('status'=>1));
    }
}

if (!function_exists('getTimesList'))
{
    function getTimesList($interval = '+30 minutes' )
    {
        $output = '';
        $current = strtotime( '00:00' );
        $end = strtotime( '23:59' );
        $timeArr = array();
        while( $current <= $end )
        {
            $timeValue = date( 'H:i:s', $current );
            $timeLabel = date( 'H:i', $current );
            $timeArr[$timeValue] = $timeLabel;
            $current = strtotime( $interval, $current );
        }
        return $timeArr;
    }
}

if (!function_exists('getProgramTemplate'))
{
    function getProgramTemplate($program_id)
    {
        $template = get_record('email_templates',array("find_in_set(".$program_id.",programs) <> "=>0,'status'=>1));
        return !empty($template->name)?$template->name:'';
    }
}

if (!function_exists('getStaffRoleName'))
{
    function getStaffRoleName($id)
    {
        if($id==1)
        {
            return 'Administrator';
        }
        else
        {
            $record = get_record('colleges_staffs_roles',array("id"=>$id));
            return !empty($record->name)?$record->name:'';
        }
    }
}

if (!function_exists('getSignatureById'))
{
    function getSignatureById($signature_id)
    {
        $signature = get_record('colleges_staff_signatures',array('id'=>$signature_id));
        return !empty($signature->signature_content)?$signature->signature_content:'';
    }
}

if (!function_exists('getJobsPortalUrl'))
{
    function getJobsPortalUrl($path ='')
    {
        //$studenthubBaseUrl = 'http://studentshub.markupdesigns'.EXT.'/';
        $job_portal_url = getSetting('job_portal_url');
        return !empty($path)?$job_portal_url.$path:$job_portal_url;
    }
}

if (!function_exists('getStudentHubUrl'))
{
    function getStudentHubUrl($path ='')
    {
        //$studenthubBaseUrl = 'http://studentshub.markupdesigns'.EXT.'/';
        $student_panel_url = getSetting('student_panel_url');
        return !empty($path)?$student_panel_url.$path:$student_panel_url;
    }
}

if (!function_exists('getSchoolHubUrl'))
{
    function getSchoolHubUrl($path ='')
    {
        //$studenthubBaseUrl = 'http://studentshub.markupdesigns'.EXT.'/';
        $school_panel_url = getSetting('school_panel_url');
        return !empty($path)?$school_panel_url.$path:$school_panel_url;
    }
}

if (!function_exists('getMainSiteUrl'))
{
    function getMainSiteUrl($path ='')
    {
        $master_site_url = getSetting('master_site_url');
        return !empty($master_site_url)?$master_site_url:CI()->config->item('main_site');
    }
}


if (!function_exists('getReportDocsOptions'))
{
    function getReportDocsOptions()
    {
        //$documentLists['performance_excel'] = 'Performance as Excel';
        $documentLists['performance_pdf'] = 'Performance as PDF';
        //$documentLists['demographics_excel'] = 'Demographics as Excel';
        $documentLists['demographics_pdf'] = 'Demographics as PDF';
        $documentLists['both_pdf'] = 'Combined Performance and Demographics as PDF';
        //$documentLists['studentlead_excel'] = 'Student Leads as Excel';
        //$documentLists['studentlead_csv'] = 'Student Leads as CSV';

        return $documentLists;
    }
}

if (!function_exists('getFrequencyOptions'))
{
    function getFrequencyOptions()
    {
        $frequencyOption['daily'] = 'Daily';
        $frequencyOption['weekly'] = 'Weekly';
        $frequencyOption['monthly'] = 'Monthly';
        $frequencyOption['quaterly'] = 'Quaterly';
        $frequencyOption['yearly'] = 'Yearly';
        return $frequencyOption;
    }
}


function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}


if (!function_exists('setProgramImpression'))
{
    function setProgramImpression($college_id,$program_id)
    {
        $ip = CI()->input->ip_address();
        if (CI()->input->valid_ip($ip))
        {
           $countrycode = ip_info($ip, "countrycode");
           if(isExist('matrix_counters',array('college_id'=>$college_id, 'program_id'=>$program_id, 'ipaddress'=>$ip)))
           {
                $counter = get_record('matrix_counters',array('college_id'=>$college_id, 'program_id'=>$program_id, 'ipaddress'=>$ip));
                $id = !empty($counter->id)?$counter->id:0;
                $impression = !empty($counter->impression)?$counter->impression + 1 : $counter->impression;
                $dataArr['impression'] = $impression;
                
                setUpdateData('matrix_counters', $dataArr, $id);
           }
           else
           {
                $dataArr['college_id'] = $college_id;
                $dataArr['program_id'] = $program_id;
                $dataArr['impression'] = 1;
                $dataArr['click'] = 0;
                $dataArr['ipaddress'] = $ip;
                $dataArr['country'] = !empty($countrycode)?strtolower($countrycode):'';
                
                setInsertData('matrix_counters', $dataArr);
           }
        }
    }
}

if (!function_exists('setProgramClicks'))
{
    function setProgramClicks($college_id,$program_id)
    {
        $ip = CI()->input->ip_address();
        if (CI()->input->valid_ip($ip))
        {
           $countrycode = ip_info($ip, "countrycode");
           if(isExist('matrix_counters',array('college_id'=>$college_id, 'program_id'=>$program_id, 'ipaddress'=>$ip)))
           {
                $counter = get_record('matrix_counters',array('college_id'=>$college_id, 'program_id'=>$program_id, 'ipaddress'=>$ip));
                $id = !empty($counter->id)?$counter->id:0;
                $click = !empty($counter->click)?$counter->click + 1 : 1;
                $dataArr['click'] = $click;                
                setUpdateData('matrix_counters', $dataArr, $id);
           }
           else
           {
                $dataArr['college_id'] = $college_id;
                $dataArr['program_id'] = $program_id;
                $dataArr['impression'] = 1;
                $dataArr['click'] = 1;
                $dataArr['ipaddress'] = $ip;
                $dataArr['country'] = !empty($countrycode)?$countrycode:'';
                
                setInsertData('matrix_counters', $dataArr);
           }
        }
    }
}

if (!function_exists('setProgramLeads'))
{
    function setProgramLeads($college_id,$program_id)
    {
        $ip = CI()->input->ip_address();
        if (CI()->input->valid_ip($ip))
        {
           $countrycode = ip_info($ip, "countrycode");
           if(isExist('matrix_counters',array('college_id'=>$college_id, 'program_id'=>$program_id, 'ipaddress'=>$ip)))
           {
                $counter = get_record('matrix_counters',array('college_id'=>$college_id, 'program_id'=>$program_id, 'ipaddress'=>$ip));
                $id = !empty($counter->id)?$counter->id:0;
                $lead = !empty($counter->lead)?$counter->lead + 1 : 1;
                $dataArr['lead'] = $lead;                
                setUpdateData('matrix_counters', $dataArr, $id);
           }
           else
           {
                $dataArr['college_id'] = $college_id;
                $dataArr['program_id'] = $program_id;
                $dataArr['impression'] = 1;
                $dataArr['click'] = 1;
                $dataArr['lead'] = 1;
                $dataArr['ipaddress'] = $ip;
                $dataArr['country'] = !empty($countrycode)?$countrycode:'';
                
                setInsertData('matrix_counters', $dataArr);
           }
        }
    }
}

if (!function_exists('getCounters'))
{
    function getCounters($college_id,$program_id = '')
    {
        CI()->db->select('SUM(impression) as impressions, SUM(click) as clicks, SUM(lead) as leads');
        $whereArr['college_id'] = $college_id;
        if(!empty($program_id))
        {
            $whereArr['program_id'] = $program_id;
        }
        CI()->db->where($whereArr);
        CI()->db->group_by('program_id');
        CI()->db->from('matrix_counters');

        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->row();
            return $result;
        } else {
            return 0;
        }
    }
}

if (!function_exists('getImpressions'))
{
    function getImpressions($college_id,$program_id = '')
    {
        $counter = getCounters($college_id,$program_id);
        $impressions = !empty($counter->impressions)?$counter->impressions:0;
        return $impressions;
    }
}


if (!function_exists('getClicks'))
{
    function getClicks($college_id,$program_id = '')
    {
        $counter = getCounters($college_id,$program_id);
        $clicks = !empty($counter->clicks)?$counter->clicks:0;
        return $clicks;
    }
}


if (!function_exists('getLeads'))
{
    function getLeads($college_id,$program_id = '')
    {
        $counter = getCounters($college_id,$program_id);
        $leads = !empty($counter->leads)?$counter->leads:0;
        return $leads;
    }
}

if (!function_exists('getCTR'))
{
    function getCTR($college_id,$program_id = '')
    {
        $impressions = getImpressions($college_id,$program_id);
        $clicks = getClicks($college_id,$program_id);
        $percent = !empty($clicks)?($clicks/$impressions) * 100:0;
        return number_format( $percent, 1 );
    }
}

if (!function_exists('getCR'))
{
    function getCR($college_id,$program_id = '')
    {
        
        $clicks = getClicks($college_id,$program_id);
        $leads = getLeads($college_id,$program_id);

        $percent = !empty($leads)?($leads/$clicks) * 100:0;
        return number_format( $percent, 1 );
    }
}

if (!function_exists('getCampusLocationName'))
{
    function getCampusLocationName($id)
    {
        $rec = get_record('colleges_campus',array('id'=>$id));
        return !empty($rec->location)?$rec->location:'';
    }
}

if (!function_exists('getQuestionAnswer'))
{
    function getQuestionAnswer($question_id, $college_id)
    {
        $answer = get_columData('questions_answer','answer_content', array('college_id'=>$college_id, 'question_id' => $question_id));
        return !empty($answer)?$answer:'';
    }
}

if (!function_exists('getEngageSettings'))
{
    function getEngageSettings($college_id, $key = '')
    {
        $settings = get_recordArr('engage_settings',array('college_id'=>$college_id));
        if(!empty($key))
        {
            return !empty($settings[$key])?$settings[$key]:'';
        }
        else
        {
            return !empty($settings)?$settings:'';
        }
        
    }
}

if (!function_exists('getCollegeHeaderImage'))
{
    function getCollegeHeaderImage($college_id)
    {
        $header = get_record('colleges_header',array('college_id'=>$college_id));
        $colleges = get_record('colleges',array('id'=>$college_id));
        $headerImg = '';

        $cover_image = !empty($colleges->cover_image)?$colleges->cover_image:'';
        $logo = !empty($colleges->logo)?$colleges->logo:'';

        if(!empty($header->headerimage_source))
        {
            if($header->headerimage_source == 'custom')
            {
                $headerImg = base_url(!empty($header->headerimage)?$header->headerimage:$cover_image);
            }
            elseif($header->headerimage_source == 'coverimg')
            {
                $headerImg = base_url($cover_image);
            }
            elseif($header->headerimage_source == 'logo')
            {
                $headerImg = base_url($logo);
            }
            else
            {
                $headerImg = base_url('assets/smarthub/img/default.jpg');
            }
        }
        else
        {
            $headerImg = base_url('assets/smarthub/img/default.jpg');
        }

        return !empty($headerImg)?$headerImg:base_url('assets/smarthub/img/default.jpg');      
    }
}

if (!function_exists('getSmartEngageGreeting'))
{
    function getSmartEngageGreeting($college_id, $name = '')
    {
        $eSettings = getEngageSettings($college_id);
        $name = !empty($name)?$name:'Student';
        $greeting_type = !empty($eSettings['greeting'])?$eSettings['greeting']:'Dear';
        
        $greeting_text = '';
        if($greeting_type == 'Custom')
        {
            $custom_greet = !empty($eSettings['custom_greeting'])?$eSettings['custom_greeting']:'Dear '.$name;
            $greeting_text = $custom_greet;
        }
        elseif($greeting_type == 'Good_Time')
        {
            $hour = date('H');
            if($hour < 12)
            {
                $greeting_text = 'Good Morning, '.$name;
            }
            elseif($hour > 12 && $hour < 17)
            {
                $greeting_text = 'Good Afternoon, '.$name;
            }
            elseif($hour > 17)
            {
                $greeting_text = 'Good Evening, '.$name;
            }
        }
        elseif($greeting_type == 'Hello')
        {
            $greeting_text = 'Hello '.$name;
        }
        elseif($greeting_type == 'Hi')
        {
            $greeting_text = 'Hi '.$name;
        }
        else
        {
            $greeting_text = 'Dear '.$name;
        }

        return $greeting_text;
    }
}

if (!function_exists('getSmartHubLogo'))
{
    function getSmartHubLogo()
    {
        return base_url('assets/smarthub/img/Hub.jpg');  
    }
}

if (!function_exists('getFilterOptions'))
{
    function getFilterOptions()
    {
        return array(
            'custom'=>'Custom', 
            //'7days'=>'Last 7 Days', 
            //'30days' => 'Last 30 Days', 
            //'365days' => 'Last 365 Days', 
            'week' => 'Last Week', 
            'month' => 'Last Month', 
            'year' => 'Last Year'
        );  
    }
}

if (!function_exists('getSmartHubStaffAccess'))
{
    function getSmartHubStaffAccess($role_id)
    {
         $colData = get_columData('colleges_staffs_roles', 'permission', array('id'=>$role_id));
         return !empty($colData)?unserialize($colData):'';
    }
}


if(!function_exists('getParentCats'))
{
    function getParentCats($id)
    {
        $catString[0] = '-- None --';
        if(!empty($id))
        {
            $cats = getParentCategory($id);
            pre($cats);
        }
        return $catString;       
    }
}

if(!function_exists('getParentCategory'))
{
    function getParentCategory($id)
    {
        $catsNames = array();
        $cat = get_record('programs_category', array('id'=>$id));
        if(!empty($cat))
        {
            $catsNames[] = $cat->name;
            getParentCategory($cat->id);
        }
        return $catsNames;
    }
}

if(!function_exists('getRootParentCats'))
{
    function getRootParentCats($id)
    {
        $catString[0] = '-- None --';
        if(!empty($id))
        {
            $cats = getParentCategory($id);
            pre($cats);
        }
        return $catString;       
    }
}

if(!function_exists('getSchoolsByCategoryId'))
{
    function getSchoolsByCategoryId($catIdsArr,$whereArr=array())
    {
        CI()->db->distinct();
        CI()->db->select('C.*');
        CI()->db->from('true_colleges as C');
        CI()->db->join('true_programs as P', 'P.college_id = C.id');
        CI()->db->join('true_programs_relations as R', 'R.program_id = P.id');
        //CI()->db->join('true_programs_category as PC', 'FIND_IN_SET(PC.id, P.category)');
        CI()->db->join('true_programs_category as PC', 'PC.id = R.cat_id');
        CI()->db->join('true_colleges_campus as CC', 'CC.college_id = C.id');
        CI()->db->where_in('PC.id',$catIdsArr);
        CI()->db->where($whereArr);
        CI()->db->order_by('C.college_name', 'ASC');

        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }
}


if(!function_exists('getSchoolsByCountryCode'))
{
    function getSchoolsByCountryCode($countryCode = 'us')
    {
        CI()->db->distinct();
        CI()->db->select('C.*');
        CI()->db->from('true_colleges as C');
        CI()->db->join('true_colleges_campus as B', 'C.id = B.college_id', 'left');
        CI()->db->where('B.country_short',$countryCode);
        CI()->db->order_by('C.college_name', 'ASC');

        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }
}




if(!function_exists('getCategoryBySegments'))
{
    function getCategoryBySegments($segments = array(),$brand_id = '')
    {
        if(!empty($segments))
        {
            krsort($segments);
            $count = count($segments);
            $query = "SELECT * FROM `true_programs_category` where slug = '".$segments[$count]."' AND `associted_brands` = '".$brand_id."'";

            unset($segments[$count]);
            if(!empty($segments))
            {
                $query.= " AND parent IN (".getRecursiveParent($segments,$brand_id).")";
            }

            $query = CI()->db->query($query);
            $result = $query->row();
            return $result;
        }
    }
}

if(!function_exists('getRecursiveParent'))
{
    function getRecursiveParent($segments,$brand_id)
    {
        $count = count($segments);
        $query = "SELECT id FROM `true_programs_category` where slug = '".$segments[$count]."' AND `associted_brands` = '".$brand_id."'";
        unset($segments[$count]);
        if(!empty($segments))
        {
            $query.= " AND parent = (".getRecursiveParent($segments,$brand_id).")";
        }

        return $query;
    }
}

if(!function_exists('answer_composer'))
{
    function answer_composer($college_id, $program_id, $question_id, $answer_content)
    {
        preg_match_all('#\[(.*?)\]#', $answer_content, $output);
        $answer_shortcodes_array = !empty($output[0])?$output[0]:array();
        $answer_keyword_array = !empty($output[1])?$output[1]:array();
        if(!empty($answer_keyword_array))
        {
            $extracted_data = extract_shortcode($program_id, $answer_keyword_array);
        } 
        
        return $message = !empty($extracted_data)?strtr($answer_content, $extracted_data):$answer_content;
    }
}

if(!function_exists('getProgramInfoCampusBased'))
{
    function getProgramInfoCampusBased($program_id)
    {
        $informations = get_records('programs_campus_info', array('program_id' => $program_id));
        //pre($informations);
        return $informations;
    }
}

if(!function_exists('extract_shortcode'))
{
    function extract_shortcode($program_id, $keywords)
    {
        $keyword_responses = array();
        $program = getProgram($program_id);
        $programCambus = getProgramInfoCampusBased($program_id);
        $pace = getPaces();
        $studytype = getStudyTypes();
        $paces = array();
        if(!empty($pace))
        {
            foreach ($pace as $key => $rec) {

                $paces[$rec['id']] = $rec['name'];
            }
        }

        $studytypes = array();
        if(!empty($studytype))
        {
            foreach ($studytype as $key => $rec) {

                $studytypes[$rec['id']] = $rec['name'];
            }
        }

        if(!empty($keywords))
        {
            foreach ($keywords as $key => $keyword)
            {
                switch ($keyword)
                {
                    case "program_name":
                        $shortcode_response = !empty($program->name)?$program->name:'';
                        break;
                    case "program_duration":
                        $shortcode_response = '';
                        if(!empty($program->duration_start) && !empty($program->duration_end) && $program->duration_start == $program->duration_end)
                        {
                          $shortcode_response = $program->duration_start.' '.$program->duration_term;
                        }
                        else
                        {
                          $shortcode_response = $program->duration_start.' To '.$program->duration_start.' '.$program->duration_term;
                        }
                        break;
                    case "program_location":
                        $shortcode_response = '';
                        if(!empty($programCambus))
                        {
                            $shortcode_response.= '<ul>';
                            foreach ($programCambus as $key => $campus)
                            {
                                if(!empty($campus->campus_id))
                                {
                                    $shortcode_response.= '<li>'.getCampusLocationName($campus->campus_id).'</li>';
                                }
                            }
                            $shortcode_response.= '</ul>';                            
                        }
                        break;
                    case "program_startdate":
                        $shortcode_response = '';
                        if(!empty($programCambus[0]))
                        {
                            if(!empty($programCambus[0]->date_type) && $programCambus[0]->date_type == 'specific')
                            {
                                $shortcode_response = !empty($programCambus[0]->start_date)?date('M Y', strtotime($programCambus[0]->start_date)):date('M Y');
                            }
                            else if(!empty($programCambus[0]->date_type) && $programCambus[0]->date_type == 'automatic')
                            {
                                $shortcode_response = !empty($programCambus[0]->start_date)?date('M Y', strtotime($programCambus[0]->start_date)):date('M Y');
                            }
                        }
                        break;
                    case "program_enddate":
                        $shortcode_response = '';
                        if(!empty($programCambus[0]))
                        {
                            if(!empty($programCambus[0]->date_type) && $programCambus[0]->date_type == 'specific')
                            {
                                $shortcode_response = !empty($programCambus[0]->end_date)?date('M Y', strtotime($programCambus[0]->end_date)):date('M Y');
                            }
                            else if(!empty($programCambus[0]->date_type) && $programCambus[0]->date_type == 'automatic')
                            {
                                $shortcode_response = !empty($programCambus[0]->end_date)?date('M Y', strtotime($programCambus[0]->end_date)):date('M Y');
                            }
                        }
                        break;
                    case "application_deadline":
                        $shortcode_response = '';
                        if(!empty($programCambus[0]))
                        {
                            if(!empty($programCambus[0]->application_deadline))
                            {
                                $shortcode_response = $programCambus[0]->application_deadline;
                            }
                        }
                        break;
                    case "program_pace":
                        $shortcode_response = '';
                        if(!empty($program->pace))
                        {
                            $paceArr = explode(",", $program->pace);
                            if(!empty($paceArr))
                            {
                                $paceDataArr = array();
                                foreach ($paceArr as $key => $paceId)
                                {
                                    if(array_key_exists($paceId, $paceArr))
                                    {
                                        array_push($paceDataArr, $paces[$paceId]);
                                    }
                                }
                            }
                            $shortcode_response = !empty($paceDataArr)?implode(",", $paceDataArr):'';
                        }
                        break;
                    case "program_studytype":
                        $shortcode_response = '';
                        if(!empty($program->study_type))
                        {
                            $studyTypeArr = explode(",", $program->study_type);

                            if(!empty($studyTypeArr))
                            {
                                $studyTypeDataArr = array();
                                foreach ($studyTypeArr as $key => $study_type_id)
                                {
                                    if(array_key_exists($study_type_id, $studyTypeArr))
                                    {
                                        array_push($studyTypeDataArr, $studytypes[$study_type_id]);
                                    }
                                }
                            }
                            $shortcode_response = !empty($studyTypeDataArr)?implode(",", $studyTypeDataArr):'';
                        }
                        break;
                    case "program_price":
                        $shortcode_response = '';
                        if(!empty($program->program_price))
                        {
                            $shortcode_response.= $program->program_price;
                            if(!empty($program->program_price_currency))
                            {
                                $shortcode_response.= ' '.$program->program_price_currency;
                            }
                        }
                        break;
                    case "school_location":
                        $shortcode_response = '';
                        if(!empty($programCambus[0]))
                        {
                            if(!empty($programCambus[0]->campus_id))
                            {
                                $shortcode_response = getCampusLocationName($programCambus[0]->campus_id);
                            }
                        }
                        break;
                    default:
                        $shortcode_response = "";
                }
                $keyIndex = '['.$keyword.']';

                $keyword_responses[$keyIndex] = !empty($shortcode_response)?$shortcode_response:'';
            }
        }
        return $keyword_responses;
    }
}


if(!function_exists('getMessageCounts'))
{
    function getMessageCounts()
    {
        $college_id = getCurrentLoggedInCollegeId();
        $whereArr['R.sender_type'] = 'student';
        $whereArr['E.college_id'] = $college_id;
        $whereArr['R.is_read'] = 0;
        if(!empty($whereArr))
        {
            CI()->db->where($whereArr);
        }       
        CI()->db->select('R.*');
        CI()->db->from('true_enquiries_responses as R');
        CI()->db->join('true_enquiries as E','R.inquiry_id = E.id', 'LEFT');
        $query = CI()->db->get();
        $rowCount = $query->num_rows();
        return (!empty($rowCount) && $rowCount > 0) ? $rowCount : 0;
    }
}


if(!function_exists('getInsuranceLayouts'))
{
    function getInsuranceLayouts()
    {
        $layouts = array('Basic','Info Stripe');
        return $layouts;
    }
}

if(!function_exists('getStudentEnquiries'))
{
    function getStudentEnquiries($college_id)
    {
        //get_records('true_enquiries', array('college_id'=>$college_id), 'last_update', 'DESC')
        $whereArr['E.college_id'] = $college_id;
        if(!empty($whereArr))
        {
            CI()->db->where($whereArr);
        }       
        CI()->db->select('E.*, COUNT(R.is_read) as unread');
        CI()->db->from('true_enquiries as E');
        CI()->db->join('true_enquiries_responses as R','E.id = R.inquiry_id', 'LEFT');       
        CI()->db->group_by(array("E.student_id", "E.program_id", "E.question_id"));
        $query = CI()->db->get();
        $rowCount = $query->num_rows();
        if(!empty($rowCount))
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }
}

if (!function_exists('callAPI'))
{
    function callAPI($endpoint,$postDataArr = '',$headerArr = array())
    {
        /* API URL */
        $url = 'https://isicstaging.cloudzmall.com/api';
        
        $endpointUrl = $url.$endpoint;
             
        /* Init cURL resource */
        $ch = curl_init($endpointUrl);
        
        if(!empty($postDataArr))
        {
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataArr);
        }
        
        $headers = !empty($headerArr)?$headerArr:array('Content-Type:application/json');
        
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $agent = 'Mozilla/5.0 (X11; UISIC; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4';
        curl_setopt($ch,CURLOPT_USERAGENT,$agent);
            
        /* execute request */
        $result = curl_exec($ch);
           
        /* close cURL resource */
        curl_close($ch);
        
        return $result;
    }
}


if (!function_exists('callBMDiscountAPI'))
{
    function callBMDiscountAPI($endpoint,$postDataArr = '',$headerArr = array())
    {
        /* API URL */
        
        $url = 'https://api.isic.org/bm2/rest/2.0';
        $username = 'ws-website-in';
        $password = 't2Wr-m97d';
        $headers = !empty($headerArr)?$headerArr:array('Content-Type:application/xml');
        
        $endpointUrl = $url.'/'.$endpoint;
             
        /* Init cURL resource */
        $ch = curl_init($endpointUrl);
        
        if(!empty($postDataArr))
        {
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataArr);
        }
        
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        /* execute request */
        $result = curl_exec($ch);
           
        /* close cURL resource */
        curl_close($ch);
        
        return $result;
    }
}

if (!function_exists('callBMDiscountAPI1'))
{
    function callBMDiscountAPI1($endpoint,$postDataArr = '',$headerArr = array())
    {
        /* API URL */
        
        $url = 'https://api.isic.org/geo/rest/1.0';
        $username = 'ws-website-in';
        $password = 't2Wr-m97d';
        $headers = !empty($headerArr)?$headerArr:array('Content-Type:application/xml');
        
        $endpointUrl = $url.'/'.$endpoint;
             
        /* Init cURL resource */
        $ch = curl_init($endpointUrl);
        
        if(!empty($postDataArr))
        {
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataArr);
        }
        
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        /* execute request */
        $result = curl_exec($ch);
           
        /* close cURL resource */
        curl_close($ch);
        
        return $result;
    }
}

if (!function_exists('callDMDiscountAPI'))
{
    function callDMDiscountAPI($endpoint,$postDataArr = '',$headerArr = array())
    {
        /* API URL */
        
        $url = 'https://dm.aliveplatform.com/api';
        $username = 'wordpress_in_2';
        $password = '6m2a4h';
        $headers = !empty($headerArr)?$headerArr:array('Content-Type:application/json');
        
        $endpointUrl = $url.'/'.$endpoint;
             
        /* Init cURL resource */
        $ch = curl_init($endpointUrl);
        
        if(!empty($postDataArr))
        {
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataArr);
        }
        
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        /* execute request */
        $result = curl_exec($ch);
           
        /* close cURL resource */
        curl_close($ch);
        
        return json_decode($result);
    }
}

if (!function_exists('callTravelsAPI'))
{
    function callTravelsAPI($endpoint,$postDataArr = '',$headerArr = array())
    {
        /* API URL */
        $isTestMode = true;
        if($isTestMode)
        {
            $url = 'https://traveluat.awpassistance.in/TravelAPI/api';
        }
        else
        {
            $url = 'http://allianztravel.in/TravelAPI/api';
        }
        
        
        $endpointUrl = $url.$endpoint;
             
        /* Init cURL resource */
        $ch = curl_init($endpointUrl);
        
        if(!empty($postDataArr))
        {
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataArr);
        }
        
        $headers = !empty($headerArr)?$headerArr:array('Content-Type:application/json');
        
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $agent = 'Mozilla/5.0 (X11; UISIC; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4';
        curl_setopt($ch,CURLOPT_USERAGENT,$agent);
            
        /* execute request */
        $result = curl_exec($ch);
           
        /* close cURL resource */
        curl_close($ch);
        
        return $result;
    }
}


if (!function_exists('urlWithQueryString'))
{
    function urlWithQueryString($key,$value = '')
    {
        $queryString = ''; //$_SERVER['QUERY_STRING'];
    	
    	$parameters = CI()->input->get();
    	//pre($parameters);

	    if(!empty($value))
	    {
	        $parameters[$key] = $value;
	    }
    	$newParameterArr = array();
	    foreach($parameters as $key => $val)
	    {
	        array_push($newParameterArr, $key.'='.$val);
	    }
	    //pre($newParameterArr);
	    if(!empty($newParameterArr))
	    {
	        $queryString = implode('&',$newParameterArr);
	    }
    	
    	return base_url('discounts?'.$queryString);
    }
}

if (!function_exists('discountDisplaySectionOptions'))
{
    function discountDisplaySectionOptions()
    {
        $options = array('home'=>'Home Page','blog'=>'Blogs','going-abroad'=>'Going Abroad');
    	
    	return $options;
    }
}