<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Studentshub extends CI_Controller {

	public $tbl_students = "students";
	public $tbl_programs = "programs";
	public $tbl_programs_category = "programs_category";

	public $tbl_pages  = "pages";
	public $tbl_events  = "events";

	public $tbl_news  = "news";
	public $tbl_news_cat = "news_cat";

	public $tbl_articles  = "articles";
	public $tbl_articles_cat = "articles_cat";

	public $tbl_testimonials  = "testimonials";
	public $tbl_subscribers  = "subscribers";
	public $tbl_concern_type  = "concern_type";

	public $tbl_country  = "country";

	public $tbl_enquiries  = "enquiries";
	public $tbl_responses  = "enquiries_responses";

	function __construct() {
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('studenthub_model');
    }

    public function index()
    {
		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($brandData->meta_title)?$brandData->meta_title:'';
		$data['meta_description'] = !empty($brandData->meta_description)?$brandData->meta_description:'';
		$data['meta_key'] = !empty($brandData->meta_key)?$brandData->meta_key:'';
		/* SEO : Meta data : End */

		$this->load->view('studentshub/include/header',$data);
		$this->load->view('studentshub/landing',$data);
		$this->load->view('studentshub/include/footer');			
	}

	public function login()
    {
    	IsStudentLoggedIn();
		$post_data = $this->input->post();
		if(!empty($post_data))
		{
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('useremail', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('userpass', 'password', 'trim|required');
            if($this->form_validation->run() != FALSE)
            {
            	$response = $this->studenthub_model->studentLogin();
	        	if($response > 0)
	        	{
	        		redirect('conversations', 'refresh');
	        	}
	        	else
	        	{
		    		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Invalid login details.'));
	        	}             
            }
		}

		/* SEO : Meta data : Start */
		$data['meta_title'] = '';
		$data['meta_description'] = '';
		$data['meta_key'] = '';
		/* SEO : Meta data : End */

		$this->load->view('studentshub/include/header',$data);
		$this->load->view('studentshub/login',$data);
		$this->load->view('studentshub/include/footer');			
	}

	public function register()
	{
       	$post_data = $this->input->post();
		if(!empty($post_data))
		{
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('email', 'email ID', 'trim|required|valid_email|is_unique[students.email]',array('is_unique' => 'Applicant email ID already exist.'));
            $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
            if($this->form_validation->run() != FALSE)
            {
                //echo "<pre>"; print_r($post_data); echo "</pre>"; die;            
                $first_name = $this->input->post("first_name");
                $last_name = $this->input->post("last_name");
                $email = $this->input->post("email"); 
                $password = rand_string(10);

                $post_data['password'] = md5($password);
                $post_data['status'] = 1;

                //pre($post_data); die;
                $insert_id = setInsertData($this->tbl_students, $post_data);

                if(!empty($insert_id))
                {
                	$email_template  = 'student-registration-notification.html';
			        $templateTags =  array(
			            '{{first_name}}'=>$first_name,
			            '{{last_name}}'=>$last_name,
			            '{{login_url}}'	=>	base_url(),
			            '{{email}}'	=>	$email,
			            '{{password}}'	=>	$password,
			            '{{signature}}' => getEmailSignature(),
			            '{{disclaimer}}' => getEmailDisclaimer()
			        );
			        $message_content = email_compose($email_template,$templateTags);
			        send_email($email,'Student registration notification',$message_content);

			        $email_template_admin  = 'student-registration-admin-notification.html';
			        $templateTags_admin =  array(
			            '{{first_name}}'=>$first_name,
			            '{{last_name}}'=>$last_name,
			            '{{email}}'	=>	$email,
			            '{{signature}}' => getEmailSignature(),
			            '{{disclaimer}}' => getEmailDisclaimer()
			        );
			        $message_content2 = email_compose($email_template_admin,$templateTags_admin);
			        $admin_email = getSiteAdminEmail();
			        send_email($admin_email,'New student registration notification',$message_content2);

			        $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Thanks for registering with us !!'));
          			redirect(current_url(), 'refresh');
                }
               // pre($post_data); die;
            }
		}
		/* SEO : Meta data : Start */
		$data['meta_title'] = '';
		$data['meta_description'] = '';
		$data['meta_key'] = '';
		/* SEO : Meta data : End */

		$this->load->view('studentshub/include/header',$data);
		$this->load->view('studentshub/register',$data);
		$this->load->view('studentshub/include/footer');		
	}
	
	public function myaccount()
	{
		CheckStudentLoginSession();
		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($landingCat->meta_title)?$landingCat->meta_title:'';
		$data['meta_description'] = !empty($landingCat->meta_description)?$landingCat->meta_description:'';
		$data['meta_key'] = !empty($landingCat->meta_key)?$landingCat->meta_key:'';
		/* SEO : Meta data : End */

		$this->load->view('studentshub/include/header-inner',$data);
		$this->load->view('studentshub/profile',$data);
		$this->load->view('studentshub/include/footer');		
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

		$this->load->view('studentshub/include/header-inner',$data);
		$this->load->view('studentshub/activation',$data);
		$this->load->view('studentshub/include/footer');
	}

	public function forgotpassword()
	{	
		$data = array();	
		$post_data=$this->input->post();
		 if(!empty($post_data))
		 {		 	
		    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		    $this->form_validation->set_rules('useremail', 'email ID', 'trim|required|valid_email');
		    if($this->form_validation->run() != FALSE)
		    {
		    	$userdata = get_recordArr($this->tbl_students,array('email'=>$post_data['useremail']));
		    	$token = md5(rand(11111,99999));
		    	if(!empty($userdata))
		    	{
		    		if(setUpdateData($this->tbl_students,array('token'=>$token),$userdata['id']))
		    		{
		    			$resetUrl = base_url('reset-password')."/?email=".$userdata['email']."&token=".$token;

		    			$email_template  = 'forgot-password-notification.html';
				        $templateTags =  array(
				            '{{first_name}}'=>$userdata['first_name'],
				            '{{last_name}}'=>$userdata['last_name'],
				            '{{email}}'=>$userdata['email'],
					        '{{resetUrl}}'=>$resetUrl,
				            '{{signature}}' => getEmailSignature(),
				            '{{disclaimer}}' => getEmailDisclaimer()
				        );
				        $message_content = email_compose($email_template,$templateTags);
				        send_email($userdata['email'],'StudentHub : Forgot Password',$message_content);

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
		$this->load->view('studentshub/include/header-inner',$data);
		$this->load->view('studentshub/forgot-password',$data);
		$this->load->view('studentshub/include/footer');
	}

	public function resetpassword()
	{
		$data = array();
		$get_data=$this->input->get();

		if(empty($get_data['email']) || empty($get_data['token']))
		{
			redirect('forgot-password', 'refresh');
		}

		$userdata = get_recordArr($this->tbl_students,array('email'=>$get_data['email']));
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
			        	if(setUpdateData($this->tbl_students,array('password'=>$newPassword),$userdata['id']))
			        	{
			        		$this->session->set_flashdata('notification',array('error'=>0,'message'=>'Your password has changed successfully.'));
			        		redirect('login', 'refresh');
			        	}
			        	else
			        	{
				    		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Technical error found, Try again !!.'));
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
		$this->load->view('studentshub/include/header-inner',$data);
		$this->load->view('studentshub/reset-password',$data);
		$this->load->view('studentshub/include/footer');
	}

	public function logout()
	{
	   $this->session->unset_userdata('student_login_data');
	   $this->session->sess_destroy();
	   $this->session->set_flashdata('notification',array('error'=>0,'message'=>'Logout sucessfully !!'));
	   redirect('login', 'refresh');
	}

	public function ajax_states()
    {
        $country_id=$this->input->post('country_id');
        $options = '';
        if(!empty($country_id))
        {
            $records = getStatesOptions($country_id, 'Choose State/Province');
            if(!empty($records))
            {
                foreach($records as $key=>$val)
                {
                   $options.= '<option value="'.$key.'">'.$val.'</option>';
                }
            }
            else
            {
                $options.= '<option value="">Choose State/Province</option>';
            }
        }
        echo $options;
    }

    public function ajax_cities()
    {
        $state_id=$this->input->post('state_id');
        $options = '';
        if(!empty($state_id))
        {
            $records = getCitiesOptions($state_id, 'Choose City');
            if(!empty($records))
            {
                foreach($records as $key=>$val)
                {
                   $options.= '<option value="'.$key.'">'.$val.'</option>';
                }
            }
            else
            {
                $options.= '<option value="">Choose City</option>';
            }
        }
        echo $options;
    }

	public function profile()
	{
		CheckStudentLoginSession();
		$student_id = loggedInStudentId();

		$post_data=$this->input->post();		
		if(!empty($post_data))
		{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('first_name', 'first name', 'trim|required');	
			$this->form_validation->set_rules('last_name', 'last name', "trim|required");				
			if($this->form_validation->run() != FALSE)
			{
				unset($post_data['phone_number']);
				$update_id = setUpdateData($this->tbl_students,$post_data,$student_id);
				$this->session->set_flashdata('notification',array('error'=>0,'message'=>'Your password has been update successfully'));
		        redirect(current_url(),'refresh');
			}
		}


		$data['profile'] = $profile = get_recordArr($this->tbl_students, array('id'=>$student_id));
		$data['options_nationalities'] = getOptions($this->tbl_country, 'Choose Nationality', array('is_active'=>1));
		$data['options_countries'] = getOptions($this->tbl_country, 'Choose Country', array('is_active'=>1));
		$data['options_studiesplaces'] = getOptions($this->tbl_country, 'Choose Last Studyplace', array('is_active'=>1));
		$data['options_preferredlocation'] = getOptions($this->tbl_country, 'Choose Preferred Location', array('is_active'=>1));
		$data['options_preferredprogram'] = getMultilevelOptions($this->tbl_programs_category, array('status'=>1), 'Choose Preferred Program');
		

		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($landingCat->meta_title)?$landingCat->meta_title:'';
		$data['meta_description'] = !empty($landingCat->meta_description)?$landingCat->meta_description:'';
		$data['meta_key'] = !empty($landingCat->meta_key)?$landingCat->meta_key:'';
		/* SEO : Meta data : End */

		$this->load->view('studentshub/include/header-inner',$data);
		$this->load->view('studentshub/profile',$data);
		$this->load->view('studentshub/include/footer');		
	}

	public function preferences()
	{
		CheckStudentLoginSession();
		$student_id = loggedInStudentId();

		$post_data=$this->input->post();
		if(!empty($post_data))
		{
			if(!empty($post_data['submit']))
			{
				$dataArr['is_subscribed_programs'] = !empty($post_data['is_subscribed_programs'])?$post_data['is_subscribed_programs']:0;
				$dataArr['is_subscribed_newsletter'] = !empty($post_data['is_subscribed_newsletter'])?$post_data['is_subscribed_newsletter']:0;
				$update_id = setUpdateData($this->tbl_students,$dataArr,$student_id);
				$this->session->set_flashdata('notification',array('error'=>0,'message'=>'Preferences has been updated successfully'));
		        redirect(current_url(),'refresh');
			}
			if(!empty($post_data['changepass']))
			{
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$this->form_validation->set_rules('current_pass', 'current password', 'trim|required');	
				$this->form_validation->set_rules('new_pass', 'new password', 'trim|required');	
				$this->form_validation->set_rules('repeat_pass', 'confirm password', "trim|required|matches[new_pass]");
				if($this->form_validation->run() != FALSE)
				{
					if(isExist($this->tbl_students,array('password'=>md5($post_data['current_pass']))))
					{
						$newPassword = md5($post_data['new_pass']);
						if(setUpdateData($this->tbl_students,array('password'=>$newPassword),$student_id))
						{
							$this->session->set_flashdata('notification',array('error'=>0,'message'=>'Your password has been update successfully'));
				        	redirect(current_url(),'refresh');
					    }
					    else
			        	{
			        		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Oops: Something going wrong, please try again!'));
			        	}
					}
					else
		        	{
		        		$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Oops: Current password is not valid/correct !'));
		        	}
				}
			}
		}

		$data['profile'] = $profile = get_recordArr($this->tbl_students, array('id'=>$student_id));
		$data['is_subscribed_programs'] = $profile['is_subscribed_programs'];
		$data['is_subscribed_newsletter'] = $profile['is_subscribed_newsletter'];

		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($landingCat->meta_title)?$landingCat->meta_title:'';
		$data['meta_description'] = !empty($landingCat->meta_description)?$landingCat->meta_description:'';
		$data['meta_key'] = !empty($landingCat->meta_key)?$landingCat->meta_key:'';
		/* SEO : Meta data : End */

		$this->load->view('studentshub/include/header-inner',$data);
		$this->load->view('studentshub/preferences',$data);
		$this->load->view('studentshub/include/footer');		
	}

	public function conversations()
	{
		CheckStudentLoginSession();
		$student_id = loggedInStudentId();

		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($landingCat->meta_title)?$landingCat->meta_title:'';
		$data['meta_description'] = !empty($landingCat->meta_description)?$landingCat->meta_description:'';
		$data['meta_key'] = !empty($landingCat->meta_key)?$landingCat->meta_key:'';
		/* SEO : Meta data : End */
		$data['records'] = $records = get_records($this->tbl_enquiries, array('student_id'=>$student_id));
		$this->load->view('studentshub/include/header-inner',$data);
		$this->load->view('studentshub/conversations',$data);
		$this->load->view('studentshub/include/footer');		
	}

	public function conversation_details($enqId)
	{
		CheckStudentLoginSession();
		$student_id = loggedInStudentId();
		$data['enquiry'] = $enquiry = get_record($this->tbl_enquiries,array('id'=>$enqId));
		$post_data = $this->input->post();
		if(!empty($post_data))
		{
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('response_content', 'reply', 'trim|required');
            if($this->form_validation->run() != FALSE)
            {
            	//pre($enquiry); 
                $post_data['inquiry_id'] = $enqId;
                $post_data['program_id'] = $enquiry->program_id;
                $post_data['sender_id'] = $student_id;
                $post_data['sender_type'] = 'student';
                $post_data['reciver_id'] = $enquiry->college_id;
                $post_data['reciver_type'] = 'college';
                $post_data['question_id'] = $enquiry->question_id;
                $post_data['status'] = 1;
                //pre($post_data); die;
                $insert_id = setInsertData($this->tbl_responses, $post_data);

                if(!empty($insert_id))
                {
                	$email_template  = 'enquiry-chat-by-student.php';
			        $templateTags =  array(
			            '{{first_name}}'=>!empty($enquiry->first_name)?$enquiry->first_name:'',
			            '{{last_name}}'=>!empty($enquiry->last_name)?$enquiry->last_name:'',
			            '{{response_content}}'	=>	$post_data['response_content'],
			            '{{signature}}' => getEmailSignature(),
			            '{{disclaimer}}' => getEmailDisclaimer()
			        );
			        $message_content = email_compose($email_template,$templateTags);
			        
			        $email = getCollegeStaffEmailById($enquiry->college_id);
			        if(!empty($email))
			        {
			        	send_email($email,'Student reply on enquiry',$message_content);
			        }			        
          			redirect(current_url(), 'refresh');
                }
               // pre($post_data); die;
            }
		}

		
		$data['responses'] = get_records($this->tbl_responses,array('inquiry_id'=>$enqId),'createdOn','ASC');

		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($landingCat->meta_title)?$landingCat->meta_title:'';
		$data['meta_description'] = !empty($landingCat->meta_description)?$landingCat->meta_description:'';
		$data['meta_key'] = !empty($landingCat->meta_key)?$landingCat->meta_key:'';
		/* SEO : Meta data : End */
		$data['records'] = $records = get_records($this->tbl_enquiries, array('student_id'=>$student_id));
		$this->load->view('studentshub/include/header-inner',$data);
		$this->load->view('studentshub/chat',$data);
		$this->load->view('studentshub/include/footer');		
	}

	public function reportanissue()
	{
		CheckStudentLoginSession();
		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($landingCat->meta_title)?$landingCat->meta_title:'';
		$data['meta_description'] = !empty($landingCat->meta_description)?$landingCat->meta_description:'';
		$data['meta_key'] = !empty($landingCat->meta_key)?$landingCat->meta_key:'';
		/* SEO : Meta data : End */

		$this->load->view('studentshub/include/header-inner',$data);
		$this->load->view('studentshub/reportanissue',$data);
		$this->load->view('studentshub/include/footer');		
	}
}