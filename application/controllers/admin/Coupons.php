<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons extends CI_Controller {

	public $tbl_name = "coupons";

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
		$this->load->view('admin/coupons/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		CheckLoginSession();
		$data = array();
		$post_data = $this->input->post();
		if(!empty($post_data)) {        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('coupon', 'coupon', 'required');
			if($this->form_validation->run() != FALSE)
			{
			    //pre($post_data); die;
				$data = array(
    				'coupon' => $post_data['coupon'],
    				'discount_type' => $post_data['discount_type'],
    				'discount_value' => $post_data['discount_value'],
    				'members_only' => $post_data['members_only'],
    				'valid_upto' => $post_data['valid_upto'],
    				'status'=>1        	             
				);			
				setInsertData($this->tbl_name, $data);
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
                redirect('admin/coupons', 'refresh');
            }
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/coupons/add',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}
	
	public function bulkadd()
	{
		CheckLoginSession();
		$data = array();
		$post_data = $this->input->post();
		if(!empty($post_data)) {        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('coupon', 'coupon', 'required');
			if($this->form_validation->run() != FALSE)
			{
			    //pre($post_data); die;
				$data = array(
    				'coupon' => $post_data['coupon'],
    				'discount_type' => $post_data['discount_type'],
    				'discount_value' => $post_data['discount_value'],
    				'members_only' => $post_data['members_only'],
    				'valid_upto' => $post_data['valid_upto'],
    				'status'=>1        	             
				);			
				setInsertData($this->tbl_name, $data);
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
                redirect('admin/coupons', 'refresh');
            }
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/coupons/add',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}
	
	public function bulkimport()
	{
		CheckLoginSession();
		$data = array();
		$post_data = $this->input->post();
		if(!empty($post_data)) {        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('coupon', 'coupon', 'required');
			if($this->form_validation->run() != FALSE)
			{
			    //pre($post_data); die;
				$data = array(
    				'coupon' => $post_data['coupon'],
    				'discount_type' => $post_data['discount_type'],
    				'discount_value' => $post_data['discount_value'],
    				'members_only' => $post_data['members_only'],
    				'valid_upto' => $post_data['valid_upto'],
    				'status'=>1        	             
				);			
				setInsertData($this->tbl_name, $data);
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
                redirect('admin/coupons', 'refresh');
            }
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/coupons/bulkimport',$data);
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
			$this->form_validation->set_rules('coupon', 'coupon', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$data = array(
    				'coupon' => $post_data['coupon'],
    				'discount_type' => $post_data['discount_type'],
    				'discount_value' => $post_data['discount_value'],
    				'members_only' => $post_data['members_only'],
    				'valid_upto' => $post_data['valid_upto']
				);
				
				//pre($data); die;
				setUpdateData($this->tbl_name, $data, $edit_id);
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
				redirect(current_url(),'refresh'); 
			}
		}
		
		$data['editdata'] 		  = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/coupons/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/coupons', 'refresh');
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
            redirect('admin/coupons', 'refresh');
        }
    }
}