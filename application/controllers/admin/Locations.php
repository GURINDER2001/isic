<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends CI_Controller {

	public $tbl_name = "locations";

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
		$this->load->view('admin/locations/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		CheckLoginSession();
		$post_data=$this->input->post();
		if(!empty($post_data))
		{        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('country_id', 'country', 'required');
			if($this->form_validation->run() != FALSE)
			{
				//pre($post_data); die;
				$post_data['status'] = 1;
				$insert_id=setInsertData($this->tbl_name, $post_data);
				if ($insert_id > 0)
                {
                    if (!empty($_FILES["cover_image"]["name"]))
                    {
                        $cover_image      = do_upload('locations','cover_image');
                        $data_cover_image = array('cover_image' => $cover_image);
                        setUpdateData($this->tbl_name, $data_cover_image, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
                    redirect('admin/locations', 'refresh');
                }
			}
		}
		$data['options_countries'] = getCountriesOptions();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/locations/add',$data);
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
			$this->form_validation->set_rules('country_id', 'country', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$record_id= setUpdateData($this->tbl_name, $post_data, $edit_id);
				if (!empty($_FILES["cover_image"]["name"]))
                {
                    $cover_image      = do_upload('locations','cover_image');
                    $data_cover_image = array('cover_image' => $cover_image);
                    setUpdateData($this->tbl_name, $data_cover_image, $edit_id);
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
				redirect(current_url(),'refresh');
			}
		}
		
		$data['editdata'] 		   = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$data['options_countries'] = getCountriesOptions();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/locations/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/locations', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/locations', 'refresh');
    }
}