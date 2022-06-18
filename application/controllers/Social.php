<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {
	
	function __construct() {
    	parent::__construct();
    	$this->load->model('login_model'); 
    	$this->load->model('smtp_model');
	}

	public $tbl_name='students';

	public function facebook_login(){
	    $user_email=$this->input->post('email');
		$userDetail=get_record($this->tbl_name,array('email'=>$user_email));
		if(!empty($userDetail))
		{
        	$userdata = array(
				'student_id'    =>$userDetail->id,
				'student_name'    =>$userDetail->first_name.' '.$userDetail->last_name,
				'student_email' =>$userDetail->email
			);
		}
		else
		{
			$post_data = $this->input->post();
			pre($post_data);
			
	        $dataArr['first_name'] 	= $this->input->post('first_name');
			$dataArr['last_name']  	= $this->input->post('last_name');			
			$dataArr['email'] 		= $user_email;
			$dataArr['gender']  	= $this->input->post('gender');
			$dataArr['password'] 	= md5('fb1234');
			$dataArr['status'] 		= 1;		
			
			$insert_id = setInsertData($this->tbl_name, $dataArr);
			$userDetail = get_record($this->tbl_name,array('email'=>$user_email));
	     	$userdata = array(
				'student_id'    =>$userDetail->id,
				'student_name'    =>$userDetail->first_name.' '.$userDetail->last_name,
				'student_email' =>$userDetail->email
			);	
			//$this->send_email_to_complete_registeration($userDetails->id);	
		}

		$this->session->set_userdata('student_login_data',$userdata);
		return 1;
	}

	public function gplus_login(){
	    $user_email=$this->input->post('email');
		$userDetail=getCustomerDetailsByEmail($user_email);
		if(!empty($userDetail)){
        	$userdata = array(
				'userID'    =>$userDetail->id,
				'user_name'    =>$userDetail->username,
				'user_email' =>$userDetail->email
			);
		} else {
	        $dataArr['role'] = 2;
			$dataArr['email'] = $user_email;
			$dataArr['created'] = date('Y-m-d h:i:sa');
			$dataArr['password'] = md5('fb1234');
			$dataArr['status'] = '2';	
			$dataArr['username']              = $this->input->post('name');
			$dataArr['fname']                 = $this->input->post('first_name');
			$dataArr['lname']                 = $this->input->post('last_name');
			$insert_id= $this->login_model->setInsertData($this->table, $dataArr);
			$userDetails=getCustomerDetailsByEmail($user_email);
	     	$userdata = array(
				'userID'    =>$userDetails->id,
				'user_name'    =>$userDetails->username,
				'user_email' =>$userDetails->email
			);	
			//$this->send_email_to_complete_registeration($userDetails->id);	
		}
		$this->session->set_userdata($userdata); 
		return 1;
	}

	public function send_email_to_complete_registeration($user_id)	{

		$username =getCustomerName($user_id);       
		$email =getCustomerEmail($user_id); 	    
		$email_template  = 'complete_registration.html';
		$templateTags =  array(
		'{{site_logo}}' => base_url().'skin/front/images/logo.png',
		'{{site_name}}'=>'Lapsmile.com',
		'{{site_url}}'=> base_url(),
		'{{team_name}}'=>'Lapsmile',
		'{{user_name}}'=>$username,
		'{{year}}'=>date('Y'),
		'{{company_name}}' => 'Lapsmile.com',
		'{{company_email}}' => 'info@Lapsmile.com'
		); 
		$message = email_compose($email_template,$templateTags);
        send_email($email,'Complete Profile',$message);
	}
}