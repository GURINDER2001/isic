<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Services extends CI_Controller {





/**

* Index news for this controller.

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

	public $tbl_name = "true_services";



	function __construct()

	{

		parent::__construct();

		$this->load->model('services_model');	        

	}



	public function index() {

		$data['records']=getDataCollection($this->tbl_name);

		$data['active']= $this->uri->segment(2);

		$this->load->view('admin/include/header');

		$this->load->view('admin/include/main-header');

		$this->load->view('admin/include/main-sidebar',$data);

		$this->load->view('admin/services/list',$data);

		$this->load->view('admin/include/main-footer');

		$this->load->view('admin/include/footer');

	}



	public function add()

	{

	$data['active']= 'services';

	$admin_id = $this->session->userdata('admin_id');

	$post_data=$this->input->post();



		if(!empty($post_data))

		{ 

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$this->form_validation->set_rules('name', 'title', 'required');

		$this->form_validation->set_rules('description', 'content', 'required');

		$this->form_validation->set_rules('duration', 'durations', 'required');

		$this->form_validation->set_rules('charges', 'charges', 'required');



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

			'slug' => $slug,

			'description' => $this->input->post('description'),			

			'duration' => $this->input->post('duration'),

			'charges' => $this->input->post('charges'),

			'status' => 1,

			'meta_title' => $this->input->post('meta_title'),

			'meta_description' => $this->input->post('meta_description'),

			'meta_key' => $this->input->post('meta_key'),	        	             

			'created' => date('Y-m-d H:i:s')	        	             

			);          



			$insert_id= setInsertData($this->tbl_name, $data);

			if($insert_id>0)

			{

				if($_FILES["featured_img"]["name"] != "")

				{

			 	$featured_img=do_upload('services');

		 		$data_featured_img = array('featured_img' => $featured_img );

		 		setUpdateData($this->tbl_name,$data_featured_img,$insert_id);

				}

			$this->session->set_flashdata('message','Your service has been added successfully');

			redirect('admin/services','refresh');

			}

		}

	}

	//$data['options_news_category']=getOptions('true_category', 'Select news category');

	$this->load->view('admin/include/header');

	$this->load->view('admin/include/main-header');

	$this->load->view('admin/include/main-sidebar',$data);

	$this->load->view('admin/services/add',$data);

	$this->load->view('admin/include/main-footer');

	$this->load->view('admin/include/footer');



	}



	public function edit()

	{

		$data['active']= 'services';

		$post_data=$this->input->post();

		$edit_id=$this->input->get('id');

		if(!empty($post_data)) {        

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$this->form_validation->set_rules('name', 'title', 'required');

		$this->form_validation->set_rules('description', 'content', 'required');

		$this->form_validation->set_rules('duration', 'durations', 'required');

		$this->form_validation->set_rules('charges', 'charges', 'required');

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

			'slug' => $slug,

			'description' => $this->input->post('description'),			

			'duration' => $this->input->post('duration'),

			'charges' => $this->input->post('charges'),

			'meta_title' => $this->input->post('meta_title'),

			'meta_description' => $this->input->post('meta_description'),

			'meta_key' => $this->input->post('meta_key')	             

			);           



			$insert_id= setUpdateData($this->tbl_name, $data, $edit_id);

			if($insert_id>0)

			{

				if($_FILES["featured_img"]["name"] != "")

				{

				 $featured_img=do_upload('services');

				 $data_featured_img = array('featured_img' => $featured_img );

				 setUpdateData($this->tbl_name,$data_featured_img,$insert_id);

				}

			$this->session->set_flashdata('message','Your service has been update successfully');

			redirect('admin/services','refresh');

			}

		}

	}

	$data['editdata'] = getDataCollectionByID($this->tbl_name,$edit_id);

	$this->load->view('admin/include/header');

	$this->load->view('admin/include/main-header');

	$this->load->view('admin/include/main-sidebar',$data);

	$this->load->view('admin/services/edit',$data);

	$this->load->view('admin/include/main-footer');

	$this->load->view('admin/include/footer');

	}



	public function delete()

	{

		CheckLoginSession();

		$id=$this->input->get('id');

		setDeleteData($this->tbl_name,$id);

		$this->session->set_flashdata('message','Your service has been delete successfully');

		redirect('admin/services','refresh');

	}



	public function status()

	{

		$id=$this->input->get('id');

		$type=$this->input->get('type');

		$data = array('status' => $type);          

		$rec_id= setUpdateData($this->tbl_name, $data, $id);

		if($rec_id>0)

		{

		$this->session->set_flashdata('message','Your service has been update successfully');

		redirect('admin/services','refresh');             

		}

	}

}