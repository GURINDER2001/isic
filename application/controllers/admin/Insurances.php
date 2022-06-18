<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurances extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    public $tbl_name = "insurances";
    public $tbl_features  = "insurance_features";
    
    public function index()
    {
        CheckLoginSession();
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/insurances/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function add()
    {
        CheckLoginSession();
        $admin_id       = $this->session->userdata('admin_id');
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();

        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;
                $config = array(
                    'table' => $this->tbl_name,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $this->input->post('name'),
                );
                $slug = $this->slug->create_uri($data);
                
                $post_data['slug'] = $slug;
                $post_data['features'] = !empty($post_data['features'])?implode(",",$post_data['features']):'';
                $post_data['status'] = 1;
                $post_data['post_by'] = $admin_id;
                
                $post_data['layout'] = $layout = !empty($post_data['layout'])?$post_data['layout']:'';
                
                if(!empty($layout))
                {
                    $key_elements_titles   = $post_data['key_elements_title'];
                    $key_elements_contents = $post_data['key_elements_content'];
                    $key_elements_image    = $post_data['key_elements_image'];
                    $key_elements_url      = $post_data['key_elements_url'];
                    
                    $keyElements = array();
                    if(!empty($key_elements_titles) && !empty($key_elements_titles[0]))
                    {
                        $countS = count($key_elements_titles);
                        for ($n =0; $n<$countS; $n++)
                        {
                            $rawSArray = array();
                            $rawSArray['title']   = !empty($key_elements_titles[$n])?$key_elements_titles[$n]:'';
                            $rawSArray['content'] = !empty($key_elements_contents[$n])?$key_elements_contents[$n]:'';
                            $rawSArray['icon']    = !empty($key_elements_image[$n])?$key_elements_image[$n]:'';
                            $rawSArray['url']    = !empty($key_elements_url[$n])?$key_elements_url[$n]:'';   
                            array_push($keyElements, $rawSArray);
                        }
                    }
                    
                    
                    $keyIcons = array();
                    $cntK = count($_FILES["key_elements_icons"]["name"]);
                    for($x=0; $x<$cntK; $x++)
                    {
                        $keyIconsArr = array();
                        if(!empty($_FILES["key_elements_icons"]["name"]) && !empty($_FILES["key_elements_icons"]["name"][0]))
                        {
                            $keyIconsArr['name']     = $_FILES["key_elements_icons"]["name"][$x];
                            $keyIconsArr['type']     = $_FILES["key_elements_icons"]["type"][$x];
                            $keyIconsArr['tmp_name'] = $_FILES["key_elements_icons"]["tmp_name"][$x];
                            $keyIconsArr['error']    = $_FILES["key_elements_icons"]["error"][$x];
                            $keyIconsArr['size']     = $_FILES["key_elements_icons"]["size"][$x];
                            $_FILES['keyinfo_icons_'.$x] = $keyIconsArr;
                            $keyIcons[$x] = 'keyinfo_icons_'.$x;
                        }
                    }
                    
                    foreach ($keyIcons as $index => $icon_field)
                    {
                        if(!empty($_FILES[$icon_field]['name']))
                        {
                            $keyinfo_icons  = do_upload('insurances',$icon_field);
        
                            if(!empty($keyElements) && !empty($keyElements[$index]))
                            {
                                $keyElements[$index]['icon']  = $keyinfo_icons;
                            }
                        }
                    }
                    
                    $post_data['keyinfo_content'] = !empty($keyElements)?serialize($keyElements):'';
                    unset($post_data['key_elements_title']);
                    unset($post_data['key_elements_content']);
                    unset($post_data['key_elements_image']);
                    unset($post_data['key_elements_url']);
                    unset($_FILES["key_elements_icons"]);
                }
                
				//pre($post_data); //die;
                
                $insert_id = setInsertData($this->tbl_name, $post_data);

                if ($insert_id > 0)
                {
                    if ($_FILES["featured_img"]["name"] != "")
                    {
                        $featured_img      = do_upload('insurances');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_name, $data_featured_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/insurances', 'refresh');
                }
            }
        }

        $data['layoutOptions'] = getInsuranceLayouts();
        $data['featureOptions'] = getMultiOptions($this->tbl_features, array('status'=>1));
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/insurances/add', $data);
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
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');

            if ($this->form_validation->run() != FALSE)
            {
                $slug_str=$this->input->post('slug');
                $config = array(
                    'table' => $this->tbl_features,
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
                $post_data['slug'] = $slug;
                $post_data['features'] = !empty($post_data['features'])?implode(",",$post_data['features']):'';
                
                
                $post_data['layout'] = $layout = !empty($post_data['layout'])?$post_data['layout']:'';
                
                if(!empty($layout))
                {
                    $key_elements_titles   = $post_data['key_elements_title'];
                    $key_elements_contents = $post_data['key_elements_content'];
                    $key_elements_image    = $post_data['key_elements_image'];
                    
                    $keyElements = array();
                    if(!empty($key_elements_titles) && !empty($key_elements_titles[0]))
                    {
                        $countS = count($key_elements_titles);
                        for ($n =0; $n<$countS; $n++)
                        {
                            $rawSArray = array();
                            $rawSArray['title']   = !empty($key_elements_titles[$n])?$key_elements_titles[$n]:'';
                            $rawSArray['content'] = !empty($key_elements_contents[$n])?$key_elements_contents[$n]:'';
                            $rawSArray['icon']    = !empty($key_elements_image[$n])?$key_elements_image[$n]:'';
                            array_push($keyElements, $rawSArray);
                        }
                    }
                    
                    
                    $keyIcons = array();
                    $cntK = count($_FILES["key_elements_icons"]["name"]);
                    for($x=0; $x<$cntK; $x++)
                    {
                        $keyIconsArr = array();
                        if(!empty($_FILES["key_elements_icons"]["name"]) && !empty($_FILES["key_elements_icons"]["name"][$x]))
                        {
                            $keyIconsArr['name']     = $_FILES["key_elements_icons"]["name"][$x];
                            $keyIconsArr['type']     = $_FILES["key_elements_icons"]["type"][$x];
                            $keyIconsArr['tmp_name'] = $_FILES["key_elements_icons"]["tmp_name"][$x];
                            $keyIconsArr['error']    = $_FILES["key_elements_icons"]["error"][$x];
                            $keyIconsArr['size']     = $_FILES["key_elements_icons"]["size"][$x];
                            $_FILES['keyinfo_icons_'.$x] = $keyIconsArr;
                            $keyIcons[$x] = 'keyinfo_icons_'.$x;
                        }
                    }
                    
                    foreach ($keyIcons as $index => $icon_field)
                    {
                        if(!empty($_FILES[$icon_field]['name']))
                        {
                            $keyinfo_icons  = do_upload('insurances',$icon_field);
        
                            if(!empty($keyElements) && !empty($keyElements[$index]))
                            {
                                $keyElements[$index]['icon']  = $keyinfo_icons;
                            }
                        }
                    }
                    
                    $post_data['keyinfo_content'] = !empty($keyElements)?serialize($keyElements):'';
                    
                }
                
                unset($post_data['key_elements_title']);
                unset($post_data['key_elements_content']);
                unset($post_data['key_elements_image']);
                unset($_FILES["key_elements_icons"]);
                
                
                //pre($post_data); die;
                
                $insert_id = setUpdateData($this->tbl_name, $post_data, $edit_id);
                if ($_FILES["featured_img"]["name"] != "")
                {
                    $featured_img      = do_upload('insurances');
                    $data_featured_img = array('featured_img' => $featured_img);
                    setUpdateData($this->tbl_name, $data_featured_img, $edit_id);
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }
        
        $data['layoutOptions'] = getInsuranceLayouts();
        $data['featureOptions'] = getMultiOptions($this->tbl_features, array('status'=>1));    
        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/insurances/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/insurances', 'refresh');
    }

    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/insurances', 'refresh');
    }

    public function features()
    {
        CheckLoginSession();
        $data['records'] = $this->master_model->get_records($this->tbl_features);
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/insurances/features',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function addfeature()
    {
        CheckLoginSession();
        $data = array();
        $post_data=$this->input->post();
        if(!empty($post_data)) {        
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            if($this->form_validation->run() != FALSE)
            {
                $slug_str=$this->input->post('name');
                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_str)));
                $post_data['slug'] = $slug;
                $post_data['status'] = 1;
                $insert_id = setInsertData($this->tbl_features, $post_data);
                if ($insert_id > 0)
                {
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
                    redirect('admin/insurances/features','refresh');
                }
            }
        }
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/insurances/add-feature',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function editfeature()
    {
        CheckLoginSession();
        $post_data = $this->input->post();
        $edit_id   = $this->uri->segment(5);

        if(!empty($post_data))
        {        
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            if($this->form_validation->run() != FALSE)
            {
                $slug_str=$this->input->post('name');
                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_str)));
                $post_data['slug'] = $slug;
                
                $record_id= setUpdateData($this->tbl_features, $post_data, $edit_id);
                if($record_id>0)
                {
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect(current_url(),'refresh');
                }
            }
        }

        $data['editdata'] = getDataRecord($this->tbl_features, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/insurances/edit-feature',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function deletefeature()
    {
        CheckLoginSession();
        $id = $this->uri->segment(5);
        setDeleteData($this->tbl_features, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/insurances/features', 'refresh');
    }
    
    public function statusfeature()
    {
        $id             = $this->uri->segment(5);
        $statusId       = getStatusById($this->tbl_features, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_features, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/insurances/features', 'refresh');
    }
}