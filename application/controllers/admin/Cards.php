<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cards extends CI_Controller {

	public $tbl_name = "cards";

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
		$this->load->view('admin/cards/list',$data);
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
				$data = array(
    				'name' => $this->input->post('name'),
    				'description' => $this->input->post('description'),
    				'slug' => $slug,
    				'status'=>1,
    				'meta_title' => $this->input->post('meta_title'),
    				'meta_description' => $this->input->post('meta_description'),
    				'meta_key' => $this->input->post('meta_key')	        	             
				);			
				$insert_id=setInsertData($this->tbl_name, $data);
				if ($insert_id > 0)
                {
                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('cards');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_name, $data_featured_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/cards', 'refresh');
                }
			}
		}   
		$data['options_cards'] = getOptions('cards', 'Select cards',array('status'=>1));         
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/cards/add',$data);
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
                    'table' => $this->tbl_name,
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
				$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'slug' => $slug,
				'meta_title' => $this->input->post('meta_title'),
				'meta_description' => $this->input->post('meta_description'),
				'meta_key' => $this->input->post('meta_key')	        	             
				); 
				$record_id= setUpdateData($this->tbl_name, $data, $edit_id);
				if($record_id>0)
				{
					if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('cards');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_name, $data_featured_img, $record_id);
                    }
					$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
					redirect('admin/cards','refresh');             
				}
			}
		}
		$data['options_cards'] = getOptions('cards', 'Select cards', array('status'=>1)); 
		$data['editdata'] 		  = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/cards/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/cards', 'refresh');
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
            redirect('admin/cards', 'refresh');
        }
    }
}