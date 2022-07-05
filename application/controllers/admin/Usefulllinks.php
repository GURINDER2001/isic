<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usefulllinks extends CI_Controller {

	public $tbl_name = "programs";
	public $tbl_links  = "usefull_links";


	function __construct() {
		parent::__construct();
		$this->load->model('master_model');
	}

	public function index()
	{
		CheckLoginSession();
		//$records = getDataRecords($this->tbl_links, array(), 0, '', "DESC");
		$brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):'';
		$records = $this->master_model->get_recordsArr($this->tbl_links,array('brand_id'=>$brand_id));
		//pre($records); die;
        $data['records'] = getOptionsTree($records);

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/usefulllinks/lists',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		CheckLoginSession();
		$data = array();
		$post_data=$this->input->post();

		$brand_id = getBrandId();

		if(!empty($post_data)) {        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
			{
				/*$config = array(
                    'table' => $this->tbl_links,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $this->input->post('name'),
                );
                $slug = $this->slug->create_uri($data);*/

                $slug_str=$this->input->post('name');
				$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_str)));

				$post_data['slug'] = $slug;
				$post_data['brand_id'] = $brand_id;
				$post_data['status'] = 1;
				$insert_id = setInsertData($this->tbl_links, $post_data);
				if ($insert_id > 0)
                {
                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('programs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_links, $data_featured_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
					redirect('admin/usefulllinks','refresh');
                }
			}
		}
		$data['parentOptions'] = getMultilevelOptions($this->tbl_links, array('brand_id'=>$brand_id), '---Self---');
		$data['options_colleges'] = getCollegesOptions('colleges', '----Choose One----', array('status'=>1));
		$data['brands'] = get_records('brands',array('status'=>1));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/usefulllinks/add',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function edit()
	{
		CheckLoginSession();
		$post_data = $this->input->post();
		$edit_id   = $this->uri->segment(4);

		$brand_id = getBrandId();

		if(!empty($post_data))
		{        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
			{
				/*$slug_str=$this->input->post('slug');
                $config = array(
                    'table' => $this->tbl_links,
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
				$post_data['slug'] = $slug;*/

				$record_id= setUpdateData($this->tbl_links, $post_data, $edit_id);

				if($record_id>0)
				{
					if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('programs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_links, $data_featured_img, $edit_id);
                    }
					$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
					redirect(current_url(),'refresh');             
				}

			}
		}

		$data['parentOptions'] 		= getMultilevelOptions($this->tbl_links, array('brand_id'=>$brand_id), '---Self---');
		$data['options_colleges'] 	= getCollegesOptions('colleges', '----Choose One----', array('status'=>1));
		$data['brands'] 			= get_records('brands',array('status'=>1));
		$data['editdata'] 			= getDataRecord($this->tbl_links, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/usefulllinks/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_links, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/usefulllinks', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_links, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_links, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/usefulllinks', 'refresh');
    }

    public function markpopularcat()
    {
        $id             = $this->uri->segment(4);
        $is_popular     = get_columData($this->tbl_links,'is_popular', array('id'=>$id));
        $data['is_popular'] = (empty($is_popular) || $is_popular == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_links, $data, $id);
		$this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Popularity status has been updated successfully !!'));
        redirect('admin/usefulllinks', 'refresh');
    }
}