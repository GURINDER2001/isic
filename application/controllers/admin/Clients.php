<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {


/**
* Index slider for this controller.
*
* Maps to the following URL
* 		http://example.com/index.php/welcome
*	- or -
* 		http://example.com/index.php/welcome/index
*	- or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see https://codeigniter.com/user_guide/general/urls.html
*/
	
	public $tbl_name = "true_clients";

	function __construct() {
		parent::__construct();		
		$this->load->model('clients_model');       
	}


	public function index(){
		CheckLoginSession();
		$data['active']= $this->uri->segment(2);
		$data['records']=getDataCollection($this->tbl_name);
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/clients/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add() {
		CheckLoginSession();
		$data['active']= $this->uri->segment(2);
		$admin_id = $this->session->userdata('admin_id');
		$post_data=$this->input->post();
		if(!empty($post_data))
		{ 
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$this->form_validation->set_rules('name', 'title', 'required');
		if(empty($_FILES["logo"]["name"]))
		{
			$this->form_validation->set_rules('logo', 'logo image', 'required');
		}

		if($this->form_validation->run() != FALSE) 
		{
			$data = array(
			'name' => $this->input->post('name')
			);          

			$insert_id= setInsertData($this->tbl_name, $data);
			if($insert_id>0)
			{
				if($_FILES["logo"]["name"] != "")
				{
			 	$featured_img=do_upload('clients','logo');
		 		$data_logo_img = array('logo' => $featured_img );
		 		setUpdateData($this->tbl_name,$data_logo_img,$insert_id);
				}
			$this->session->set_flashdata('message','Record has been added successfully');
			redirect('admin/clients','refresh');
			}
		}
	}          
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/clients/add',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function edit() {
		CheckLoginSession();
		$data['active']= $this->uri->segment(2);
		$post_data=$this->input->post();
		$edit_id=$this->input->get('id');

		if(!empty($post_data))
		{        
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE) 
			{
				$data = array(
				'name' => $this->input->post('name')
				);          

				$insert_id= setUpdateData($this->tbl_name, $data, $edit_id);
				if($insert_id>0)
				{
					if($_FILES["logo"]["name"] != "")
					{
				 	$featured_img=do_upload('clients','logo');
			 		$data_logo_img = array('logo' => $featured_img );
			 		setUpdateData($this->tbl_name,$data_logo_img,$insert_id);
					}
				$this->session->set_flashdata('message','Record has been added successfully');
				redirect('admin/clients','refresh');
				}
			}
		}

		$data['editdata'] = getDataCollectionByID($this->tbl_name,$edit_id);           
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/clients/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete() {
		CheckLoginSession();
		$id=$this->input->get('id');
		setDeleteData($table,$id);
		$this->session->set_flashdata('message','Record has been delete successfully');
		redirect('admin/clients','refresh');
	}

	public function status()
	{
		CheckLoginSession();
		$id=$this->input->get('id');
		$type=$this->input->get('type');
		$data = array('status' => $type);          
		$rec_id= setUpdateData($this->tbl_name, $data, $id);
		if($rec_id>0)
		{
		$this->session->set_flashdata('message','Record status has been update successfully');
		redirect('admin/clients','refresh');             
		}
	}	
}