<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public $tbl_name = "category";

	function __construct() {
		parent::__construct();
		$this->load->model('master_model');   
	}

	public function index()
	{
		CheckLoginSession();
		$brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):0;
		$data['records'] = getDataRecords($this->tbl_name, array('brand_id'=>$brand_id), 0, '', "DESC");
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/category/list',$data);
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
				$config = array(
                    'table' => $this->tbl_cat,
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
                $post_data['status'] = 1;
                $brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):0;
                $post_data['brand_id'] = $brand_id;

				$insert_id = setInsertData($this->tbl_name, $post_data);
				if($insert_id>0)
				{
					$this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
					redirect('admin/category','refresh');
				}
			}
		}   
		$data['options_category'] = getOptions('category', 'Select category',array('status'=>1));         
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/category/add',$data);
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
				$slug_str=$this->input->post('slug');
                $config = array(
                    'table' => $this->tbl_cat,
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
				$rec_id= setUpdateData($this->tbl_name, $post_data, $edit_id);
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
				redirect(current_url(),'refresh');             
			}
		}
		$data['options_category'] = getOptions('category', 'Select category', array('status'=>1)); 
		$data['editdata'] 		  = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/category/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/category', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/category', 'refresh');
    }
}