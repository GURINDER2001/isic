<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller {

	public $tbl_name = "faqs";

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
		$this->load->view('admin/faqs/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		CheckLoginSession();
		$data = array();
		$post_data=$this->input->post();
		if(!empty($post_data))
		{        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('question', 'question', 'required');
			$this->form_validation->set_rules('answer', 'answer', 'required');
			if($this->form_validation->run() != FALSE)
			{
			    $this->db->select_max('custom_order');
                $this->db->from($this->tbl_name);
                $query=$this->db->get();
                $row = $query->row_array();
                
                $custom_order = !empty($row['custom_order'])?$row['custom_order']+1:1;
                
                $post_data['custom_order'] = $custom_order;
				$post_data['status'] = 1;
				$insert_id=setInsertData($this->tbl_name, $post_data);
				if ($insert_id > 0)
                {
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/faqs', 'refresh');
                }
			}
		}

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/faqs/add',$data);
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
			$this->form_validation->set_rules('answer', 'answer', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$record_id= setUpdateData($this->tbl_name, $post_data, $edit_id);
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
				redirect(current_url(),'refresh');
			}
		}
		
		$data['editdata'] 		  = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/faqs/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/faqs', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/faqs', 'refresh');
    }
}