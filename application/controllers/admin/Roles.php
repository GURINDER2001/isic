<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	public $tbl_name = "role";

	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->load->model('role_model');
	}

	public function index(){
		CheckLoginSession();
		$data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/role/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		CheckLoginSession();
		$data 			=	array();
		$post_data		=	$this->input->post();
		if(!empty($post_data)){        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')        	             
				);          

				$user_id= setInsertData($this->tbl_name, $data);
				if($user_id>0){
					$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
					redirect('admin/roles','refresh');
				}
			}
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/role/add',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function edit()
	{
		CheckLoginSession();
		$post_data	=	$this->input->post();
		$edit_id	=	$this->uri->segment(4);
		if(!empty($post_data))
		{        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')        	             
				);          
				$user_id= setUpdateData($this->tbl_name, $data, $edit_id);
				if($user_id>0)
				{
					$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
					redirect('admin/roles','refresh');             
				}
			}
		}
		$data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));            
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/role/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
	{
		CheckLoginSession();
		$id = $this->uri->segment(4);
		setDeleteData($this->tbl_name,$id);
		$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been deleted successfully !!'));
		redirect('admin/roles','refresh');
	}

	public function status()
	{
      $id             = $this->uri->segment(4);
      $statusId       = getStatusById($this->tbl_name, $id);
      $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
      $rec_id         = setUpdateData($this->tbl_name, $data, $id);
      if($rec_id > 0)
      {
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/roles', 'refresh');
      }
	}
}