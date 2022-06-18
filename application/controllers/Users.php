 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {



	public $usertable = 'users';

    public $client_id;
	public $client_secret;

	function __construct() {

        parent::__construct();

        $this->load->model('users_model');

        $this->load->model('master_model');

        $this->load->model('sectionsettings_model');
        $this->client_id = getSetting('client_id');
        $this->client_secret = getSetting('client_secret');

    }



    public function index()

    {

    	//$this->send_email('rajan@markupdesigns.info','Registration welcome','Testing','webmaster@markupdesigns.info','Care Healthfully');

    }

    public function dashboard()
    {

    	CheckFrontLoginSession();

    	$data = array();

    	$this->load->view('front/include/header');		

		$this->load->view('front/users/dashboard',$data);		

		$this->load->view('front/include/footer');

	}



	public function purchase_history()
    {

    	CheckFrontLoginSession();

    	$userData = $this->session->userdata('login_data');

    	$data = array();

    	$data['records'] = $this->payments_model->getDataCollectionByUserId($userData['user_id']);

    	$this->load->view('front/include/header');		

		$this->load->view('front/users/purchase-history',$data);		

		$this->load->view('front/include/footer');

	}



	public function editprofile()
	{ 

		CheckFrontLoginSession();

		if(!empty($this->session->userdata('login_data')))

		{    	

			$userData = $this->session->userdata('login_data');	

			$user_id = $userData['user_id'];

			$post_data=$this->input->post();

			if(!empty($post_data))

			{        

			    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

			    $this->form_validation->set_rules('username', 'title', 'required');

			    

			    if($this->form_validation->run() != FALSE)

			    {

			    

				    $dataArr = array(			    

				    'name' => $this->input->post('username'),

				    'email' => $this->input->post('useremail'),			    

				    'mobile' => $this->input->post('usermobile'),

				    'address' => $this->input->post('useraddress'),

				    'zip' => $this->input->post('userzipcode'),

				    'country' => $this->input->post('usercountry'),

				    'state' => $this->input->post('userstate'),

				    'city' => $this->input->post('usercity'),

				    

				    'dob' => date('Y-m-d',strtotime($this->input->post('userdob'))),

				    'gender' => $this->input->post('gender'),			    			    

				    );			     

				 	$user_id= setUpdateData($table, $dataArr, $userData['user_id']);



				    if($_FILES["profilephoto"]["name"] != "")

				    {

				     	$profilephoto=do_upload('company_logo');				     

				     	setUpdateData($table,$data_profile_img,$user_id);

				    }



				    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been updated successfully !!'));

        			redirect('admin/dashboard', 'refresh');

			 }			 

			}	

			$this->load->view('front/include/header');	

			$this->load->view('front/users/edit-profile',$data);		

			$this->load->view('front/include/footer');	

		}	

	}



	public function login22()
	{ 

		$post_data = $this->input->post();
		$return = $this->input->get('return');
		$redirectOnSuceess = !empty($return)?$return:'my-account';
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('users');



		/* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('users','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('users','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('users','meta_key');
        /* SEO : Meta data : End */



		$data['response'] = '';

		 if(!empty($post_data)) {

		 	

		    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		    $this->form_validation->set_rules('useremail', 'email ID', 'trim|required|valid_email',array('is_unique' => 'Applicant email ID already exist.'));		    

		    $this->form_validation->set_rules('password', 'Password', 'trim|required');		    

		    

		    if($this->form_validation->run() != FALSE)

		    {

		    	$response = $this->users_model->frontLogin();

	        	if($response > 0){

	        		redirect($redirectOnSuceess);

	        	}else{

		    		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Incorrect login details or user may deactivated.'));

	        	}

			}

		}

		$this->load->view('front/include/header',$data);		

		$this->load->view('front/users/login',$data);

		$this->load->view('front/include/footer');

	}


    public function login()
	{ 

		$post_data = $this->input->post();
		$return = $this->input->get('return');
		$redirectOnSuceess = !empty($return)?$return:'my-account';
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('users');



		/* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('users','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('users','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('users','meta_key');
        /* SEO : Meta data : End */



		 $data['response'] = '';

		 if(!empty($post_data))
		 {
		    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		    $this->form_validation->set_rules('email', 'email ID', 'trim|required|valid_email');
		    $this->form_validation->set_rules('password', 'Password', 'trim|required');	

		    if($this->form_validation->run() != FALSE)
		    {
		        $postArr = $this->input->post();
                $email = !empty($postArr['email'])?$postArr['email']:'';
                $password = !empty($postArr['password'])?$postArr['password']:'';
                
                $postPkt = '{
                            	"client_id":"'.$this->client_id.'",
                            	"client_secret" : "'.$this->client_secret.'",
                            	"grant_type" : "password",
                            	"username": "'.$email.'",
                            	"password" : "'.$password.'"
                            }';
                $responseByApi = callAPI('/user/login',$postPkt);
                //pre($responseByApi);die;
                $responseObj = !empty($responseByApi)?json_decode($responseByApi):array();
                if(!empty($responseObj))
                {
                    if(empty($responseObj->error))
                    {
                        if($responseObj->code == 200)
                        {
                            //pre($responseObj);
                            //$this->session->set_flashdata('notification',array('error'=>0,'message'=>$responseObj->message));
                            $login_data = array('user_id'=>$responseObj->data->user_id,'email'=>$email,'access_token'=>$responseObj->data->access_token);
                            $this->session->set_userdata('login_data',$login_data);
                            
                            $aftoken = $this->session->userdata('aftoken');
                            
                            if(!empty($aftoken))
                            {
                                redirect('cards/selection?aftoken='.$aftoken);
                            }
                            else
                            {
                                redirect('cards/selection');
                            }
                            
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata('notification',array('error'=>1,'message'=>$responseObj->error->message));
                    }
                }
                else
                {
                    $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Something going wrong, please try again.'));
                }
			}
		}
		$this->load->view('front/include/header',$data);
		$this->load->view('front/users/login',$data);
		$this->load->view('front/include/footer');
	}


	public function register()
	{

		$post_data = $this->input->post();
		$data = array();
		$return = $this->input->get('return');
		$redirectOnSuceess = !empty($return)?$return:'my-account';

	    if(!empty($post_data))
	    { 
		    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		    $this->form_validation->set_rules('title', 'title', 'required');
		    $this->form_validation->set_rules('first_name', 'first name', 'required');
		    $this->form_validation->set_rules('last_name', 'last name', 'required');
		    $this->form_validation->set_rules('mobile_number', 'mobile number', 'required|regex_match[/^[0-9]{10}$/]');
		    $this->form_validation->set_rules('email', 'email address', 'trim|required|valid_email');
		    $this->form_validation->set_rules('password', 'password', 'trim|required');
			$this->form_validation->set_rules('confirm_password', 'confirm password ', 'trim|required|matches[password]');
		    if($this->form_validation->run() != FALSE)
		    {		    	
                $postArr = $this->input->post();
                
                $title = !empty($postArr['title'])?$postArr['title']:'';
                $first_name = !empty($postArr['first_name'])?$postArr['first_name']:'';
                $last_name = !empty($postArr['last_name'])?$postArr['last_name']:'';
                $mobile_number = !empty($postArr['mobile_number'])?$postArr['mobile_number']:'';
                $email = !empty($postArr['email'])?$postArr['email']:'';
                $password = !empty($postArr['password'])?$postArr['password']:'';
                $confirm_password = !empty($postArr['confirm_password'])?$postArr['confirm_password']:'';
                
                $postPkt = '{
                                "title" : "'.$title.'",
                                "first_name" : "'.$first_name.'",
                                "last_name" : "'.$last_name.'",
                                "mobile_number" : "'.$mobile_number.'",
                                "email": "'.$email.'",
                                "password" : "'.$password.'",
                                "confirm_password" : "'.$confirm_password.'",
                                "country_code" : "91"
                            }';
                            
                            
                $header = array(
                    "Content-Type:application/json",
                    "Client-id: ".$this->client_id,
                    "Client-secret: ".$this->client_secret
                );
                
                $responseByApi = callAPI('/user/register',$postPkt,$header);
                
                $responseObj = !empty($responseByApi)?json_decode($responseByApi):array();
                
                if(!empty($responseObj))
                {
                    if(empty($responseObj->error))
                    {
                        if($responseObj->code == 200)
                        {
                            $data = array(
                                'salutation' => $title,
            		            'first_name' => $first_name,
            		            'last_name' => $last_name,
            		            'email' => $email,
            		            'password' => md5($password),
            		            'mobile' => $mobile_number,
            		            'status' => 1,
            		            'role' => 2,
            		            'user_id_api' => $responseObj->data->user_id,
            		            'access_token' => $responseObj->data->access_token,
            		            'token_type' => $responseObj->data->token_type,
            		            'refresh_token' => $responseObj->data->refresh_token,
            		            'firebase_access_token' => $responseObj->data->firebase_access_token
            	        	);
            	        	$response = $this->master_model->setInsertData($this->usertable,$data);
                            $this->session->set_flashdata('notification',array('error'=>0,'message'=>$responseObj->message));
                            $this->session->set_userdata('otpTokenData',$responseObj->data);
                            $this->session->set_userdata('registered_userId',$responseObj->data->user_id);
                            redirect('otp-verify');
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata('notification',array('error'=>1,'message'=>$responseObj->error->message));
                    }
                }
                else
                {
                    $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Something going wrong, please try again.'));
                }

		  	}

		}



		/* SEO : Meta data : Start */

        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('users','meta_title');

        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('users','meta_description');

        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('users','meta_key');

        /* SEO : Meta data : End */



		$this->load->view('front/include/header',$data);		

		$this->load->view('front/users/register',$data);

		$this->load->view('front/include/footer');

	}

    public function otpVerify()
    {
        $data = array();

	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	    $this->form_validation->set_rules('otp', 'otp', 'required');
	    if($this->form_validation->run() != FALSE)
	    {		    	
            $postArr = $this->input->post();
            $otpTokenData = $this->session->userdata('otpTokenData');
            $user_id = $otpTokenData->user_id;
            $access_token = $otpTokenData->access_token;
            $otp = !empty($postArr['otp'])?$postArr['otp']:'';
            $postPkt = '{
                            "otp" : "'.$otp.'",
                            "verification_type" : "account"
                        }';
                        
            $header = array(
                "Content-Type:application/json",
                "Authorization: Bearer ".$access_token
            );
            
            $responseByApi = callAPI('/otp/verify',$postPkt,$header);
            
            $responseObj = !empty($responseByApi)?json_decode($responseByApi):array();
            
            //pre($responseObj);
            
            if(!empty($responseObj))
            {
                if(empty($responseObj->error))
                {
                    if($responseObj->code == 200)
                    {
                        setUpdateDataByCons($this->usertable,array('verify_otp'=>1),array('user_id_api'=>$user_id));
                        $this->session->set_flashdata('notification',array('error'=>0,'message'=>$responseObj->message));
                        
                        //$this->output->set_header('refresh:5; url='.base_url('login'));
                        redirect('login');
                    }
                }
                else
                {
                    $this->session->set_flashdata('notification',array('error'=>1,'message'=>$responseObj->error->message));
                }
            }
            else
            {
                $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Something going wrong, please try again.'));
            }
	  	}
        $this->load->view('front/include/header',$data);
		$this->load->view('front/users/otp-verify',$data);
		$this->load->view('front/include/footer');
    }



	public function activation()
	{		
		$token=$this->input->get('token');

		$email = base64_decode($token);

		 if(!empty($email))

		 { 

		    	$userdata = $this->users_model->getDataCollectionByField($this->usertable,'email',$email);

		    	if(!empty($userdata))

		    	{

		    		if($this->users_model->setUpdateData($this->usertable,array('verify_email'=>1),$userdata['id']))

			    	{

			    			$email_template  = 'welcome.html';

					        $templateTags =  array(

					        '{{site_logo}}' => base_url().'assets/front/images/logo.png',

					        '{{site_name}}'=>'Care Healthfully',

					        '{{site_url}}'=> base_url(),

					        '{{name}}'=>$userdata['name'],

					        '{{email}}'=>$userdata['email'],

					        '{{team_name}}'=>'carehealthfully',

					        '{{company_name}}' => 'Care Healthfully',

					        '{{company_email}}' => 'info@carehealthfully.com',

					        );

					        $message = $this->email_compose($email_template,$templateTags);

					        $this->send_email($userdata['email'],'Registration welcome',$message,'development.markupdesigns@gmail.com','Care Healthfully');

					        $this->session->set_flashdata('notification',array('error'=>0,'message'=>'Thanks to verify your email address.'));

				    }

				    else

				    {

				    	$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Due to some technical issue, activation has failed.'));

				    }

		    	}

		    	else

		    	{

		    		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Invalid request.'));

		    	}

		}

		$this->load->view('front/include/header');

		$this->load->view('front/users/activation');

		$this->load->view('front/include/footer');

	}





	public function forgotpassword()

	{		

			$post_data=$this->input->post();

			 if(!empty($post_data)) {

			 	

			    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

			    $this->form_validation->set_rules('useremail', 'email ID', 'trim|required|valid_email');    

			    

			    if($this->form_validation->run() != FALSE)

			    {

			    	$userdata = $this->users_model->getDataCollectionByField($this->usertable,'email',$post_data['useremail']);

			    	$token = md5(rand(11111,99999));

			    	if(!empty($userdata))

			    	{

			    		if($this->users_model->setUpdateData($this->usertable,array('token'=>$token),$userdata['id']))

			    		{

			    			$resetUrl = base_url('reset-password')."/?email=".$userdata['email']."&token=".$token;

			    			$email_template  = 'forgot-pass.html';

					        $templateTags =  array(

					        '{{site_logo}}' => base_url().'assets/front/images/logo.png',

					        '{{site_name}}'=>'Care Healthfully',

					        '{{site_url}}'=> base_url(),

					        '{{name}}'=>$userdata['name'],

					        '{{email}}'=>$userdata['email'],

					        '{{resetUrl}}'=>$resetUrl,

					        '{{team_name}}'=>'carehealthfully',

					        '{{company_name}}' => 'Care Healthfully',

					        '{{company_email}}' => 'info@carehealthfully.com',

					        );

					        $message = $this->email_compose($email_template,$templateTags);

					        $this->send_email($userdata['email'],'Forgot Password',$message,'webmaster@markupdesigns.info','Care Healthfully');

					        $this->session->set_flashdata('notification',array('error'=>0,'message'=>'Email with reset url has sent to your inbox.'));

				    	}

				    	else

				    	{

				    		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Due to some technical issue, its failed.'));

				    	}

			    		

			    	}

			    	else

			    	{

			    		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Email address does not exist.'));

			    	}

				}

			}

			$this->load->view('front/include/header');		

			$this->load->view('front/users/forgot-password');

			$this->load->view('front/include/footer');

	}



	public function resetpassword()

	{

			$get_data=$this->input->get();

			$userdata = $this->users_model->getDataCollectionByField($this->usertable,'email',$get_data['email']);

			if(!empty($userdata))

			{

				if($userdata['token'] == $get_data['token'])

				{

					$post_data=$this->input->post();

					if(!empty($post_data)) {

			 	

					    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

					    $this->form_validation->set_rules('password', 'Password', 'trim|required');

						$this->form_validation->set_rules('repassword', 'Confirm Password ', 'trim|required|matches[password]');	    

					    

					    if($this->form_validation->run() != FALSE)

					    {

					    	$newPassword = md5($post_data['password']);

				        	if($this->users_model->setUpdateData($this->usertable,array('password'=>$newPassword),$userdata['id']))

				        	{

				        		$this->session->set_flashdata('notification',array('error'=>0,'message'=>'Your password has Successfully changed.'));

				        	}

				        	else

				        	{

					    		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Invalid email or password.'));

				        	}

						}

					}

				}

				else

				{

					$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Token has been expired, Please try again.'));

				}

			}

			else

			{

				$this->session->set_flashdata('notification',array('error'=>1,'message'=>'User with this email are not exist.'));

			}



			$this->load->view('front/include/header');		

			$this->load->view('front/users/reset-password');

			$this->load->view('front/include/footer');

	}



	public function changepassword()

	{

		CheckFrontLoginSession();

		$data = array();

        $login_data=$this->session->userdata('login_data');

        $user_id = $login_data['user_id'];

        $post_data=$this->input->post();

		if(!empty($post_data)) {        

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			$this->form_validation->set_rules('password', 'password', 'required');	

			$this->form_validation->set_rules('repassword', 'confirm password', "trim|required|matches[password]");							

			if($this->form_validation->run() != FALSE)

			{				

				$newPassword = md5($post_data['password']);

				$update_id = $this->users_model->setUpdateData($this->usertable,array('password'=>$newPassword),$user_id);

				if($update_id>0)

				{

					$this->session->set_flashdata('notification',array('error'=>0,'message'=>'Your password has been update successfully'));

		        	redirect('change-password','refresh');

			    }

			    else

	        	{

	        		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Oops: Something going wrong, please try again!'));

	        	}

			}

		}

		$this->load->view('front/include/header');		

		$this->load->view('front/users/change-password',$data);

		$this->load->view('front/include/footer');

	}



    public function send_email($to_email,$subject,$message='',$from_email,$from_name)

    { 

    	$this->load->model('smtp_model');

    	$this->load->library('email');

        $smtp_host=$this->smtp_model->getSmtp('smtp_host');

        $smtp_port=$this->smtp_model->getSmtp('smtp_port');

        $smtp_user=$this->smtp_model->getSmtp('smtp_user');

        $smtp_pass=$this->smtp_model->getSmtp('smtp_pass');

        $config = array(

        'mailtype' => 'html',

        'charset' => 'utf-8',

        'priority' => '1',

        'newline' => '\r\n'

        );



        $config['protocol'] = 'smtp';

        $config['smtp_host'] = $smtp_host;

        $config['smtp_port'] = $smtp_port;

        $config['smtp_timeout'] = '7';

        $config['smtp_user'] = $smtp_user;

        $config['smtp_pass'] = $smtp_pass;

        $config['charset'] = 'utf-8';

        $config['newline'] = "\r\n";



        //echo "<pre>"; print_r($config); echo "</pre>"; die;



        $this->email->initialize($config);

        $this->email->from($smtp_user, $from_name);

        $this->email->to($to_email);

        $this->email->subject($subject);

        $this->email->message($message);

        if(!$this->email->send()) {

        	$msg = '';

            $from = $from_name."<".$from_email.">";

            $headers = "From: $from\r\n";

            $headers .= "MIME-Version: 1.0\r\n"

            ."Content-Type: multipart/mixed; boundary=\"1a2a3a\""; 

            $msg .= "If you can see this MIME than your client doesn't accept MIME types!\r\n" ."--1a2a3a\r\n"; 

            $msg .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n"

              ."Content-Transfer-Encoding: 7bit\r\n\r\n";

            $msg .= $message."\r\n";

            $msg .= "--1a2a3a\r\n";

            $success = mail($to_email,$subject,$msg,$headers);

        }

    }



	public function email_compose($email_template,$templateTags)

	{

        $templateContents = file_get_contents( APPPATH . '/email-templates/'.$email_template);

        return $message =  strtr($templateContents, $templateTags);

    }



	public function logout()
	{
	   $this->session->unset_userdata('login_data');
	   $this->session->sess_destroy();
	   $this->session->set_flashdata('success', 'Logout sucessfully');
	   redirect(base_url('login'));
	}



	public function updateMyAccount(){

		//if(!empty($this->session->userdata('login_data'))){    	









		//}		

	}

}