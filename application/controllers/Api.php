<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Api extends REST_Controller
{
	public $usertbl = 'true_users';

	public function __construct() {
		parent::__construct();		
		$this->load->model('api_model');
		$this->load->model('smtp_model');
		$this->load->helper('front_helper');
	}

	public function login_post()
	{
		$data=array(); 
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');
		if($this->form_validation->run() == FALSE) {   
			$this->response(array('msg' => validation_errors(),'status'=>'Failure'), 200);
		} else {
			$email = $this->post('email');
			$password  = $this->post('password');
			$return_value = $this->api_model->login($email,$password);
			if(!empty($return_value)){
				$returnData = array('msg'=>'Login Successfully.','status'=>'Success','data'=>$return_value);
				$this->response($returnData, 200); // 200 being the HTTP response code
			}else{
				$this->response(array('msg' => 'User Name or Password not valid.Try again.','status'=>'Failure'), 200);
			}
	    }
	} 

	public function forgot_password_post(){
		$data=array();  
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		if($this->form_validation->run() == FALSE)
		{   
			$this->response(array('msg' => validation_errors(),'status'=>'Failure'), 200);
		}
		else
		{           
			$email = $this->post('email');
			$userDetails =   $this->api_model->getUserDetails($email);            
			if(!empty($userDetails))
			{
				$sentOPT = $this->sendOTP($userDetails);
				if($sentOPT)
				{
				$returnData = array('msg'=>'Sent OTP Successfully.Please Check Your Registered Email','status'=>'Success');
				$this->response($returnData, 200); // 200 being the HTTP response code    
				}
				else
				{
				$this->response(array('msg' => 'Something wrong.Try again.','status'=>'Failure'), 400);  
				}
			}
			else
			{
				$this->response(array('msg' => 'Invalid User.Try another.','status'=>'Failure'), 400);
			}
		}
	}

	public function sendOTP($userDetails){
		$otp = mt_rand(100000, 999999);;
		$data= array('otp' =>$otp);
		$this->api_model->setUpdateData($this->usertbl,$data,$userDetails['id']);
		$email_template  = 'otp.html';

		$email = $userDetails['email'];

        $templateTags =  array(
        '{{site_logo}}' => base_url().'assets/front/images/logo.png',
        '{{site_name}}'=>'gethealthier.com',
        '{{site_url}}'=> base_url(),
        '{{username}}'=>$userDetails['name'],
        '{{otp}}'=>$otp,
        '{{team_name}}'=>'GetHealthier',
        '{{year}}'=>date('Y'),
        '{{company_name}}' => 'gethealthier.com',
        '{{company_email}}' => 'info@gethealthier.com',
        );
        $message = email_compose($email_template,$templateTags);
        send_email($email,'OTP For Reset Password',$message,'support@gethealthier.com','Get Healthier');
		return true;
	}

	public function validate_otp_post(){
		$data=array();  
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('user_id', 'user id', 'required');
		$this->form_validation->set_rules('otp', 'otp', 'required');
		if($this->form_validation->run() == FALSE) {   
			$this->response(array('msg' => 'Invalid OTP , Try again.','status'=>'Failure'), 401);
		} else {          
			$userID             = $this->post('user_id');
			$userOTP            = $this->post('otp');
			$userDetails        =   $this->api_model->getUserDetails($userID);            
			if(!empty($userDetails)){
				$chkOPT = $this->api_model->validateOTP($userDetails,$userOTP);
				if($chkOPT){
					$returnData = array('msg'=>'Valid OTP','status'=>'Success');
					$this->response($returnData, 200); // 200 being the HTTP response code    
				} else {
					$this->response(array('msg' => 'Something wrong.Try again.','status'=>'Failure'), 400);  
				} 
		    }else{
				$this->response(array('msg' => 'Invalid User.Try another.','status'=>'Failure'), 401);
			}
		}
	}

	public function reset_password_post(){
		
		$data=array();
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$this->form_validation->set_rules('user_id', 'user id', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run() == FALSE)
		{   
			$this->response(array('msg' => 'Something wrong.Try again.','status'=>'Failure'), 400);
		}
		else
		{ 
			$user_id  = $this->post('user_id');
			$password = $this->post('password');
			$user_details = $this->api_model->getUserDetails($user_id);
			if(!empty($user_details))
			{
				$reset_flag = $this->api_model->resetPassword($user_id,$password);
				if($reset_flag)
				{
					$returnData = array('msg'=>'Password Reset Successfully.','status'=>'Success');
					$this->response($returnData, 200); // 200 being the HTTP response code    
				}
				else
				{
					$this->response(array('msg' => 'Something wrong2.Try again.','status'=>'Failure'), 400);  
				}
			}
			else
			{
				$this->response(array('msg' => 'Invalid User.Try another.','status'=>'Failure'), 401);
			}
		}
	}

	public function registration_post(){
		     
		$this->form_validation->set_error_delimiters('', '');        
		$this->form_validation->set_rules('email', 'email ID', 'trim|required|valid_email|is_unique['.$this->usertbl.'.email]',array('is_unique' => 'Applicant email ID already exist.')); 	
		$this->form_validation->set_rules('fname', 'first name', 'required');
		$this->form_validation->set_rules('lname', 'last name', 'required');    
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password ', 'trim|required|matches[password]');
		if($this->form_validation->run() == FALSE) {  
			$this->response(array('msg' => validation_errors(),'status'=>'Failure'), 200);
		}
		else
		{
			$data = array(				
				'role' => 5,
				'name' => $this->input->post('fname').' '.$this->input->post('lname'),
				'email' => $this->input->post('email'),
				'status' => 1,
				'password' => MD5($this->input->post('password'))	        	             
			);
			$userID= $this->api_model->setInsertData($this->usertbl, $data);
			if($userID>0) {
				$userDetails =$this->api_model->getUserDetails($userID);
				$returnData = array('msg'=>'Congratulations your account has been successfully created.','status'=>'Success','data'=>$userDetails);
				$this->response($returnData, 200);
			}
		}
	}

	public function update_profile_post(){
		$this->form_validation->set_error_delimiters('', ''); 
		$this->form_validation->set_rules('user_id', 'user id', 'required');
		$this->form_validation->set_rules('fname', 'first name', 'required');
		$this->form_validation->set_rules('lname', 'last name', 'required');        
		$this->form_validation->set_rules('email', 'email id', 'trim|required|valid_email');        
		$this->form_validation->set_rules('mobile', 'mobile', 'required');
		   
		if($this->form_validation->run() == FALSE) {  
			$this->response(array('msg' => validation_errors(),'status'=>'Failure'), 400);
		} else {
			$userID=$this->input->post('user_id');
			$email=$this->input->post('email');
			$userOk=$this->api_model->ValidateUsers($this->usertbl,$email,$userID);
			if($userOk) {
				$data = array(
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'site_location' => $this->input->post('site_location'),
					'country' => $this->input->post('country'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'postal_code' => $this->input->post('postal_code'),
					'fax' => $this->input->post('fax')
				);
				$userID= $this->api_model->setUpdateData($this->usertbl, $data,$userID);
				if($userID>0) {
					$userDetails =$this->api_model->getUserDetails($userID);
					$returnData = array('msg'=>'Yourour account has been successfully update.','status'=>'Success','data'=>$userDetails);
					$this->response($returnData, 200);
				}
			} else {
				$this->response(array('msg' => 'Invalid user.Try again','status'=>'Failure'), 401);
			}
		}
	}

}