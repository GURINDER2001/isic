<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discounts extends CI_Controller {

	public $tbl_name = "discounts";

	function __construct() {
		parent::__construct();
		$this->load->model('master_model');   
	}

	public function index()
	{
		CheckLoginSession();
		$data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/discounts/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		CheckLoginSession();
		$data = array();
		$post_data=$this->input->post();
		if(!empty($post_data)) {        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$data = array(
    				'name' => $this->input->post('name'),
    				'summary' => $this->input->post('summary'),
    				'description' => $this->input->post('description'),
    				'providerId_api' => $this->input->post('providerId_api'),
    				'country_id' => $this->input->post('country_id'),
    				'display_section' => !empty($post_data['display_section'])?implode(",",$post_data['display_section']):'',
    				'blog_cat_id' => !empty($post_data['blog_cats'])?implode(",",$post_data['blog_cats']):'',
    				'status'=>1,
    				//'meta_title' => $this->input->post('meta_title'),
    				//'meta_description' => $this->input->post('meta_description'),
    				//'meta_key' => $this->input->post('meta_key')	        	             
				);			
				$insert_id=setInsertData($this->tbl_name, $data);
				if ($insert_id > 0)
                {
                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('discounts');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_name, $data_featured_img, $insert_id);
                    }
                    
                    if (!empty($_FILES["banner_img"]["name"]))
                    {
                        $banner_img      = do_upload('discounts','banner_img');
                        $data_banner_img = array('banner_img' => $banner_img);
                        setUpdateData($this->tbl_name, $data_banner_img, $insert_id);
                    }
                    
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/discounts', 'refresh');
                }
			}
		}
		$data['categoryOptions'] = getMultiOptions('tbl_blogs_cat', array('status'=>1));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/discounts/add',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function edit()
	{
		CheckLoginSession();
		$post_data = $this->input->post();
		$edit_id   = $this->uri->segment(4);

		if(!empty($post_data))
		{
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$data = array(
    				'name' => $this->input->post('name'),
    				'summary' => $this->input->post('summary'),
    				'description' => $this->input->post('description'),
    				'providerId_api' => $this->input->post('providerId_api'),
        			'country_id' => $this->input->post('country_id'),
        			'display_section' => !empty($post_data['display_section'])?implode(",",$post_data['display_section']):'',
        			'blog_cat_id' => !empty($post_data['blog_cats'])?implode(",",$post_data['blog_cats']):'',
    				//'meta_title' => $this->input->post('meta_title'),
    				//'meta_description' => $this->input->post('meta_description'),
    				//'meta_key' => $this->input->post('meta_key')	        	             
				); 
				
				//pre($data); die;
				$record_id= setUpdateData($this->tbl_name, $data, $edit_id);
				if($record_id>0)
				{
					if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('discounts');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_name, $data_featured_img, $record_id);
                    }
                    
                    if (!empty($_FILES["banner_img"]["name"]))
                    {
                        $banner_img      = do_upload('discounts','banner_img');
                        //echo $banner_img; die;
                        $data_banner_img = array('banner_img' => $banner_img);
                        setUpdateData($this->tbl_name, $data_banner_img, $record_id);
                    }
                    
					$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
					redirect(current_url(),'refresh');             
				}
			}
		}
		
		$data['categoryOptions'] = getMultiOptions('tbl_blogs_cat', array('status'=>1));
		$data['editdata'] 		  = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/discounts/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/discounts', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        if ($rec_id > 0)
        {
            $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
            redirect('admin/discounts', 'refresh');
        }
    }
}