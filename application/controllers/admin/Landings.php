<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class landings extends CI_Controller
{  
    public $tbl_landings = "landings";
	public $tbl_landingsmeta = "landings_meta";
    
    function __construct()
    {
        parent::__construct();
        //$this->load->model('landings_model');
    }

    public function index()
    {
        CheckLoginSession();
        $data['records'] = getDataRecords($this->tbl_landings, array(), 0, '', "DESC");

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/landings/lists', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function add()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);

        if (!empty($post_data))
        { 
            //pre($post_data); die;
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'title', 'required');

            if ($this->form_validation->run() != FALSE)
            {
                $insertArr['name'] = $post_data['page_title'];
                
                $config = array(
                    'table' => $this->tbl_landings,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $this->input->post('page_title'),
                );
                $slug = $this->slug->create_uri($data);
                $insertArr['slug'] = $slug;
                $updateArr['layout'] = !empty($post_data['layout'])?$post_data['layout']:0;
                $insertArr['meta_title'] = $post_data['meta_title'];
                $insertArr['meta_description'] = $post_data['meta_description'];
                $insertArr['meta_key'] = $post_data['meta_key'];
                $insertArr['status'] = 1;
                
                
                //pre($post_data); die;
                
                
                $insert_id = setInsertData($this->tbl_landings, $insertArr);
                
                if(!empty($insert_id))
                {
                    if (!empty($_FILES["feature_img"]["name"]))
                    {
                        $featured_img      = do_upload('landings','feature_img');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_landings, $data_featured_img, $insert_id);
                    }
                    
                    if (!empty($_FILES["banner_img"]["name"]))
                    {
                        $banner_img      = do_upload('landings','banner_img');
                        $data_banner_img = array('banner_img' => $banner_img);
                        setUpdateData($this->tbl_landings, $data_banner_img, $insert_id);
                    }
                    
                    unset($post_data['page_title']);
                    unset($post_data['meta_title']);
                    unset($post_data['meta_description']);
                    unset($post_data['meta_key']);
                    unset($_FILES["feature_img"]);
                    unset($_FILES["banner_img"]);
                    
        			
        			$flipbox_heading   = !empty($post_data['flipbox_heading'])?$post_data['flipbox_heading']:array();
        			$flipbox_content   = !empty($post_data['flipbox_content'])?$post_data['flipbox_content']:array();
                    $flipbox_old_logo    = !empty($post_data['flipbox_old_logo'])?$post_data['flipbox_old_logo']:array();
                    $flipbox_old_image    = !empty($post_data['flipbox_old_image'])?$post_data['flipbox_old_image']:array();
                    
        			$flipboxElements = array();
                    if(!empty($flipbox_heading) && count($flipbox_heading) > 0)
                    {
                        $countS = count($flipbox_heading);
                        for ($n =0; $n<$countS; $n++)
                        {
                            $rawFBArray = array();
                            $rawFBArray['heading']   = !empty($flipbox_heading[$n])?$flipbox_heading[$n]:'';
                            $rawFBArray['content']   = !empty($flipbox_content[$n])?$flipbox_content[$n]:'';
                            $rawFBArray['logo']    = !empty($flipbox_old_logo[$n])?$flipbox_old_logo[$n]:'';
                            $rawFBArray['image']    = !empty($flipbox_old_image[$n])?$flipbox_old_image[$n]:'';
                            array_push($flipboxElements, $rawFBArray);
                        }
                    }
                    
                    unset($post_data['flipbox_heading']);
                    unset($post_data['flipbox_content']);
                    unset($post_data['flipbox_old_logo']);
                    unset($post_data['flipbox_old_image']);
                    
                    
        			$carousal_item_title   = !empty($post_data['carousal_item_title'])?$post_data['carousal_item_title']:array();
                    $carousal_item_old_image   = !empty($post_data['carousal_item_old_image'])?$post_data['carousal_item_old_image']:array();
                    
        			$carousalItems = array();
                    if(!empty($carousal_item_title) && count($carousal_item_title) > 0)
                    {
                        $countT = count($carousal_item_title);
                        for ($i =0; $i<$countT; $i++)
                        {
                            $rawCIArray = array();
                            $rawCIArray['title']   = !empty($carousal_item_title[$i])?$carousal_item_title[$i]:'';
                            $rawCIArray['image']   = !empty($carousal_item_old_image[$i])?$carousal_item_old_image[$i]:'';
                            array_push($carousalItems, $rawCIArray);
                        }
                    }
                    
                    unset($post_data['carousal_item_title']);
                    unset($post_data['carousal_item_old_image']);
    
                    
                    //pre($_FILES["offer_image"]); die;
                    $flipBoxesLogo = array();
                    $cntK = count($_FILES["flipbox_logo"]["name"]);
                    for($x=0; $x<$cntK; $x++)
                    {
                        $flipboxLogoArr = array();
                        if(!empty($_FILES["flipbox_logo"]["name"]) && !empty($_FILES["flipbox_logo"]["name"][$x]))
                        {
                            $flipboxLogoArr['name']     = $_FILES["flipbox_logo"]["name"][$x];
                            $flipboxLogoArr['type']     = $_FILES["flipbox_logo"]["type"][$x];
                            $flipboxLogoArr['tmp_name'] = $_FILES["flipbox_logo"]["tmp_name"][$x];
                            $flipboxLogoArr['error']    = $_FILES["flipbox_logo"]["error"][$x];
                            $flipboxLogoArr['size']     = $_FILES["flipbox_logo"]["size"][$x];
                            $_FILES['flipbox_logo_'.$x] = $flipboxLogoArr;
                            $flipBoxesLogo[$x] = 'flipbox_logo_'.$x;
                        }
                    }
        
                    unset($_FILES["flipbox_logo"]);
                    
                    $flipBoxesImg = array();
                    $cntFT = count($_FILES["flipbox_image"]["name"]);
                    for($x=0; $x<$cntFT; $x++)
                    {
                        $flipboxImgArr = array();
                        if(!empty($_FILES["flipbox_image"]["name"]) && !empty($_FILES["flipbox_image"]["name"][$x]))
                        {
                            $flipboxImgArr['name']     = $_FILES["flipbox_image"]["name"][$x];
                            $flipboxImgArr['type']     = $_FILES["flipbox_image"]["type"][$x];
                            $flipboxImgArr['tmp_name'] = $_FILES["flipbox_image"]["tmp_name"][$x];
                            $flipboxImgArr['error']    = $_FILES["flipbox_image"]["error"][$x];
                            $flipboxImgArr['size']     = $_FILES["flipbox_image"]["size"][$x];
                            $_FILES['flipbox_image_'.$x] = $flipboxImgArr;
                            $flipBoxesImg[$x] = 'flipbox_image_'.$x;
                        }
                    }
                    
                    //pre($infoboxImg);
                    unset($_FILES["flipbox_image"]);
                    
                    $carousalItemImg = array();
                    $cntCII = count($_FILES["carousal_item_image"]["name"]);
                    for($x=0; $x<$cntCII; $x++)
                    {
                        $flipboxImgArr = array();
                        if(!empty($_FILES["carousal_item_image"]["name"]) && !empty($_FILES["carousal_item_image"]["name"][$x]))
                        {
                            $carousalItemImgArr['name']     = $_FILES["carousal_item_image"]["name"][$x];
                            $carousalItemImgArr['type']     = $_FILES["carousal_item_image"]["type"][$x];
                            $carousalItemImgArr['tmp_name'] = $_FILES["carousal_item_image"]["tmp_name"][$x];
                            $carousalItemImgArr['error']    = $_FILES["carousal_item_image"]["error"][$x];
                            $carousalItemImgArr['size']     = $_FILES["carousal_item_image"]["size"][$x];
                            $_FILES['carousal_item_image_'.$x] = $carousalItemImgArr;
                            $carousalItemImg[$x] = 'carousal_item_image_'.$x;
                        }
                    }
                    
                    //pre($infoboxImg);
                    unset($_FILES["carousal_item_image"]);
                    
                    if(!empty($_FILES))
                    {
                        foreach ($_FILES as $key => $file)
                        {
                            if(!empty($file['name']))
                            {
                                if(!in_array($key, $flipBoxesLogo) && !in_array($key, $flipBoxesImg) && !in_array($key, $carousalItemImg))
                                {
                                   $landing_image      = do_upload('landings',$key);
                                   $post_data[$key] = $landing_image;
                                }
                            }
                        }
                    }
                    
                    foreach ($flipBoxesLogo as $index => $fblogo_field)
                    {
                        if(!empty($_FILES[$fblogo_field]['name']))
                        {
                            $flipbox_logo  = do_upload('landings',$fblogo_field);
        
                            if(!empty($flipbox_logo) && !empty($flipboxElements[$index]))
                            {
                                $flipboxElements[$index]['logo']  = $flipbox_logo;
                            }
                        }
                    }
                    
                    //pre($offerElements); die;
                    foreach ($flipBoxesImg as $index => $fbimg_field)
                    {
                        if(!empty($_FILES[$fbimg_field]['name']))
                        {
                            $flipbox_img  = do_upload('landings',$fbimg_field);
        
                            if(!empty($flipbox_img) && !empty($flipboxElements[$index]))
                            {
                                $flipboxElements[$index]['image']  = $flipbox_img;
                            }
                        }
                    }
                    
                    foreach ($carousalItemImg as $index => $carousal_item_field)
                    {
                        if(!empty($_FILES[$carousal_item_field]['name']))
                        {
                            $carousal_item_img  = do_upload('landings',$carousal_item_field);
        
                            if(!empty($carousal_item_img) && !empty($carousalItems[$index]))
                            {
                                $carousalItems[$index]['image']  = $carousal_item_img;
                            }
                        }
                    }
                    
                    $post_data['flipboxes_elements'] = !empty($flipboxElements)?serialize($flipboxElements):'';
                    $post_data['carousals_items'] = !empty($carousalItems)?serialize($carousalItems):'';
                    
                    //pre($post_data); die;
                    if(!empty($post_data))
                    {
                        foreach($post_data as $key => $value)
                        {
                            setInsertOrUpdate($this->tbl_landingsmeta,array('page_id'=>$insert_id,'name'=>$key,'value'=>$value),array('page_id'=>$insert_id,'name'=>$key));
                        }
                    }
                }
                
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect('admin/landings', 'refresh');
            }
        }
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/landings/add', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function edit()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);

        if (!empty($post_data))
        { 
            //pre($post_data); die;
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'title', 'required');

            if ($this->form_validation->run() != FALSE)
            {
                $updateArr = array();
                $slug_str=$this->input->post('slug');
                $config = array(
                    'table' => $this->tbl_landings,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $slug_str,
                );
                $slug = $this->slug->create_uri($data,$edit_id);
                
                $updateArr['name'] = $post_data['page_title'];
                $updateArr['slug'] = $slug;
                $updateArr['layout'] = !empty($post_data['layout'])?$post_data['layout']:0;
                $updateArr['meta_title'] = $post_data['meta_title'];
                $updateArr['meta_description'] = $post_data['meta_description'];
                $updateArr['meta_key'] = $post_data['meta_key'];
                setUpdateData($this->tbl_landings, $updateArr, $edit_id);
                
                
                if (!empty($_FILES["feature_img"]["name"]))
                {
                    $featured_img      = do_upload('landings','feature_img');
                    $data_featured_img = array('featured_img' => $featured_img);
                    setUpdateData($this->tbl_landings, $data_featured_img, $edit_id);
                }
                
                if (!empty($_FILES["banner_img"]["name"]))
                {
                    $banner_img      = do_upload('landings','banner_img');
                    $data_banner_img = array('banner_img' => $banner_img);
                    setUpdateData($this->tbl_landings, $data_banner_img, $edit_id);
                }
                
                unset($post_data['page_title']);
                unset($post_data['slug']);
                unset($post_data['meta_title']);
                unset($post_data['meta_description']);
                unset($post_data['meta_key']);
                unset($_FILES["feature_img"]);
                unset($_FILES["banner_img"]);
                
    			
    			$flipbox_heading   = !empty($post_data['flipbox_heading'])?$post_data['flipbox_heading']:array();
    			$flipbox_content   = !empty($post_data['flipbox_content'])?$post_data['flipbox_content']:array();
                $flipbox_old_logo    = !empty($post_data['flipbox_old_logo'])?$post_data['flipbox_old_logo']:array();
                $flipbox_old_image    = !empty($post_data['flipbox_old_image'])?$post_data['flipbox_old_image']:array();
                
    			$flipboxElements = array();
                if(!empty($flipbox_heading) && count($flipbox_heading) > 0)
                {
                    $countS = count($flipbox_heading);
                    for ($n =0; $n<$countS; $n++)
                    {
                        $rawFBArray = array();
                        $rawFBArray['heading']   = !empty($flipbox_heading[$n])?$flipbox_heading[$n]:'';
                        $rawFBArray['content']   = !empty($flipbox_content[$n])?$flipbox_content[$n]:'';
                        $rawFBArray['logo']    = !empty($flipbox_old_logo[$n])?$flipbox_old_logo[$n]:'';
                        $rawFBArray['image']    = !empty($flipbox_old_image[$n])?$flipbox_old_image[$n]:'';
                        array_push($flipboxElements, $rawFBArray);
                    }
                }
                
                unset($post_data['flipbox_heading']);
                unset($post_data['flipbox_content']);
                unset($post_data['flipbox_old_logo']);
                unset($post_data['flipbox_old_image']);
                
                
    			$carousal_item_title   = !empty($post_data['carousal_item_title'])?$post_data['carousal_item_title']:array();
                $carousal_item_old_image   = !empty($post_data['carousal_item_old_image'])?$post_data['carousal_item_old_image']:array();
                
    			$carousalItems = array();
                if(!empty($carousal_item_title) && count($carousal_item_title) > 0)
                {
                    $countT = count($carousal_item_title);
                    for ($i =0; $i<$countT; $i++)
                    {
                        $rawCIArray = array();
                        $rawCIArray['title']   = !empty($carousal_item_title[$i])?$carousal_item_title[$i]:'';
                        $rawCIArray['image']   = !empty($carousal_item_old_image[$i])?$carousal_item_old_image[$i]:'';
                        array_push($carousalItems, $rawCIArray);
                    }
                }
                
                unset($post_data['carousal_item_title']);
                unset($post_data['carousal_item_old_image']);

                
                //pre($_FILES["offer_image"]); die;
                $flipBoxesLogo = array();
                $cntK = count($_FILES["flipbox_logo"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    $flipboxLogoArr = array();
                    if(!empty($_FILES["flipbox_logo"]["name"]) && !empty($_FILES["flipbox_logo"]["name"][$x]))
                    {
                        $flipboxLogoArr['name']     = $_FILES["flipbox_logo"]["name"][$x];
                        $flipboxLogoArr['type']     = $_FILES["flipbox_logo"]["type"][$x];
                        $flipboxLogoArr['tmp_name'] = $_FILES["flipbox_logo"]["tmp_name"][$x];
                        $flipboxLogoArr['error']    = $_FILES["flipbox_logo"]["error"][$x];
                        $flipboxLogoArr['size']     = $_FILES["flipbox_logo"]["size"][$x];
                        $_FILES['flipbox_logo_'.$x] = $flipboxLogoArr;
                        $flipBoxesLogo[$x] = 'flipbox_logo_'.$x;
                    }
                }
    
                unset($_FILES["flipbox_logo"]);
                
                $flipBoxesImg = array();
                $cntFT = count($_FILES["flipbox_image"]["name"]);
                for($x=0; $x<$cntFT; $x++)
                {
                    $flipboxImgArr = array();
                    if(!empty($_FILES["flipbox_image"]["name"]) && !empty($_FILES["flipbox_image"]["name"][$x]))
                    {
                        $flipboxImgArr['name']     = $_FILES["flipbox_image"]["name"][$x];
                        $flipboxImgArr['type']     = $_FILES["flipbox_image"]["type"][$x];
                        $flipboxImgArr['tmp_name'] = $_FILES["flipbox_image"]["tmp_name"][$x];
                        $flipboxImgArr['error']    = $_FILES["flipbox_image"]["error"][$x];
                        $flipboxImgArr['size']     = $_FILES["flipbox_image"]["size"][$x];
                        $_FILES['flipbox_image_'.$x] = $flipboxImgArr;
                        $flipBoxesImg[$x] = 'flipbox_image_'.$x;
                    }
                }
                
                //pre($infoboxImg);
                unset($_FILES["flipbox_image"]);
                
                $carousalItemImg = array();
                $cntCII = count($_FILES["carousal_item_image"]["name"]);
                for($x=0; $x<$cntCII; $x++)
                {
                    $flipboxImgArr = array();
                    if(!empty($_FILES["carousal_item_image"]["name"]) && !empty($_FILES["carousal_item_image"]["name"][$x]))
                    {
                        $carousalItemImgArr['name']     = $_FILES["carousal_item_image"]["name"][$x];
                        $carousalItemImgArr['type']     = $_FILES["carousal_item_image"]["type"][$x];
                        $carousalItemImgArr['tmp_name'] = $_FILES["carousal_item_image"]["tmp_name"][$x];
                        $carousalItemImgArr['error']    = $_FILES["carousal_item_image"]["error"][$x];
                        $carousalItemImgArr['size']     = $_FILES["carousal_item_image"]["size"][$x];
                        $_FILES['carousal_item_image_'.$x] = $carousalItemImgArr;
                        $carousalItemImg[$x] = 'carousal_item_image_'.$x;
                    }
                }
                
                //pre($infoboxImg);
                unset($_FILES["carousal_item_image"]);
                
                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                            if(!in_array($key, $flipBoxesLogo) && !in_array($key, $flipBoxesImg) && !in_array($key, $carousalItemImg))
                            {
                               $landing_image      = do_upload('landings',$key);
                               $post_data[$key] = $landing_image;
                            }
                        }
                    }
                }
                
                foreach ($flipBoxesLogo as $index => $fblogo_field)
                {
                    if(!empty($_FILES[$fblogo_field]['name']))
                    {
                        $flipbox_logo  = do_upload('landings',$fblogo_field);
    
                        if(!empty($flipbox_logo) && !empty($flipboxElements[$index]))
                        {
                            $flipboxElements[$index]['logo']  = $flipbox_logo;
                        }
                    }
                }
                
                //pre($offerElements); die;
                foreach ($flipBoxesImg as $index => $fbimg_field)
                {
                    if(!empty($_FILES[$fbimg_field]['name']))
                    {
                        $flipbox_img  = do_upload('landings',$fbimg_field);
    
                        if(!empty($flipbox_img) && !empty($flipboxElements[$index]))
                        {
                            $flipboxElements[$index]['image']  = $flipbox_img;
                        }
                    }
                }
                
                foreach ($carousalItemImg as $index => $carousal_item_field)
                {
                    if(!empty($_FILES[$carousal_item_field]['name']))
                    {
                        $carousal_item_img  = do_upload('landings',$carousal_item_field);
    
                        if(!empty($carousal_item_img) && !empty($carousalItems[$index]))
                        {
                            $carousalItems[$index]['image']  = $carousal_item_img;
                        }
                    }
                }
                
                $post_data['flipboxes_elements'] = !empty($flipboxElements)?serialize($flipboxElements):'';
                $post_data['carousals_items'] = !empty($carousalItems)?serialize($carousalItems):'';
                
                //pre($post_data); die;
                if(!empty($post_data))
                {
                    foreach($post_data as $key => $value)
                    {
                        setInsertOrUpdate($this->tbl_landingsmeta,array('page_id'=>$edit_id,'name'=>$key,'value'=>$value),array('page_id'=>$edit_id,'name'=>$key));
                    }
                }
                
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }
        
        //$data['categoryOptions'] = getMultiOptions($this->tbl_cat, array('status'=>1));    
        $data['editdata'] = getDataRecord($this->tbl_landings, array('id' => $edit_id));
        $data['collection'] = getDataRecords($this->tbl_landingsmeta, array('page_id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/landings/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_landings, $id);
        deleteRecords($this->tbl_landingsmeta,array('page_id'=>$id));
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/landings', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_landings, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        //pre($data);
        $rec_id         = setUpdateData($this->tbl_landings, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/landings', 'refresh');
    }
}