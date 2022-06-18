<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller {

	public $tbl_name = "questions";
	public $tbl_cat  = "questions_cat";

	function __construct() {
		parent::__construct(); 
	}

	public function index()
	{
		CheckLoginSession();
		$data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/questions/list',$data);
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
			$this->form_validation->set_rules('question', 'question', 'required');
			if($this->form_validation->run() != FALSE)
			{
				//pre($post_data); die;
				$post_data['status'] = 1;		
				$insert_id = setInsertData($this->tbl_name, $post_data);
				if ($insert_id > 0)
                {
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
					redirect('admin/questions','refresh');
                }
			}
		}   
		$data['options_categories'] = getMultilevelOptions($this->tbl_cat, array(), '----Choose Category----');
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/questions/add',$data);
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
			$this->form_validation->set_rules('question', 'question', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$record_id= setUpdateData($this->tbl_name, $post_data, $edit_id);				
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
				redirect(current_url(),'refresh'); 
			}
		}
		$data['options_categories'] = getMultilevelOptions($this->tbl_cat, array(), '----Choose Category----');
		$data['editdata'] 		  = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/questions/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/questions', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);

        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/questions', 'refresh');
    }

    public function category()
	{
		CheckLoginSession();
		//$records = getDataRecords($this->tbl_cat, array(), 0, '', "DESC");

		$records = $this->master_model->get_recordsArr($this->tbl_cat);
		//pre($records); die;
        $data['records'] = getOptionsTree($records); 

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/questions/categories',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function addcategory()
	{
		CheckLoginSession();
		$data = array();
		$post_data=$this->input->post();
		if(!empty($post_data)) {        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
			{

				$post_data['status'] = 1;
				$insert_id = setInsertData($this->tbl_cat, $post_data);
				if ($insert_id > 0)
                {
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
					redirect('admin/questions/category','refresh');
                }
			}
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/questions/add-category',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function editcategory()
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
				$record_id= setUpdateData($this->tbl_cat, $post_data, $edit_id);
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
				redirect(current_url(),'refresh'); 
			}
		}
		$data['editdata'] 	   = getDataRecord($this->tbl_cat, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/questions/edit-category',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function deletecategory()
    {
        CheckLoginSession();
        $id = $this->uri->segment(5);
        setDeleteData($this->tbl_cat, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/questions/category', 'refresh');
    }
    
    public function statuscategory()
    {
        $id             = $this->uri->segment(5);
        $statusId       = getStatusById($this->tbl_cat, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_cat, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/questions/category', 'refresh');
    }

    public function markpopularcat()
    {
        $id             = $this->uri->segment(5);
        $is_popular     = get_columData($this->tbl_cat,'is_popular', array('id'=>$id));
        $data['is_popular'] = (empty($is_popular) || $is_popular == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_cat, $data, $id);
		$this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Popularity status has been updated successfully !!'));
        redirect('admin/questions/category', 'refresh');
    }
}