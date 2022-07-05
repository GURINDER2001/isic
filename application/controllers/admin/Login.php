<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin_model'); 
	}

	public function index()
	{
		$data['active']='login';
		$admin_id = $this->session->userdata('admin_id');
		if(!empty($admin_id))
		{
			redirect('admin/dashboard','refresh');
		}
		else
		{   
			$login_arr = $this->input->post();
			//print_r($login_arr);
			if(!empty($login_arr))
			{
				$admindata= $this->admin_model->AdminLogin();
				if($admindata==1)
				{
					$brand_id = getBrandId();
					if(!empty($brand_id))
					{
						$this->session->set_userdata('brand_id',$brand_id);
					}
					redirect('admin/dashboard','refresh');
				}
				else
				{
					$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Please enter the correct username or password'));
					redirect('admin/login','refresh');
				}
			}
		}
		$this->load->view('admin/login');
	}

}