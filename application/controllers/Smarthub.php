<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Smarthub extends CI_Controller {

	public $tbl_brand = "smarthub";
	public $tbl_colleges = "colleges";
	public $tbl_colleges_staffs = "colleges_staffs";
	public $tbl_colleges_staffs_roles = "colleges_staffs_roles";
	public $tbl_supports = "supports";

	function __construct()
	{
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('sectionsettings_model');
        $this->load->model('smarthub_model');
    }

    public function index()
    {
    	IsCollegeLoggedIn();
		$post_data = $this->input->post();
		if(!empty($post_data))
		{
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('useremail', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('userpass', 'password', 'trim|required');
            if($this->form_validation->run() != FALSE)
            {
            	$response = $this->smarthub_model->collegeLogin();
	        	if($response > 0)
	        	{
	        		redirect('dashboard', 'refresh');
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

		$this->load->view('smarthub/login',$data);		
	}

	public function login()
    {
    	IsCollegeLoggedIn();
		$post_data = $this->input->post();
		if(!empty($post_data))
		{
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('useremail', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('userpass', 'password', 'trim|required');
            if($this->form_validation->run() != FALSE)
            {
            	$response = $this->smarthub_model->collegeLogin();
	        	if($response > 0)
	        	{
	        		redirect('dashboard', 'refresh');
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

		$this->load->view('smarthub/login',$data);		
	}

  	public function logout()
	{
	   $this->session->unset_userdata('college_login_data');
	   $this->session->sess_destroy();
	   $this->session->set_flashdata('success', 'Logout sucessfully');
	   redirect(base_url('login'));
	}  

    public function dashboard()
    {
    	CheckSmartLoginSession();
    	$data = array();
		$this->load->view('smarthub/include/header',$data);
		$this->load->view('smarthub/include/sidebar',$data);
		$this->load->view('smarthub/dashboard',$data);
		$this->load->view('smarthub/include/footer',$data);			
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
		    	$userdata = get_recordArr($this->tbl_colleges_staffs,array('email'=>$post_data['useremail']));
		    	$token = md5(rand(11111,99999));
		    	if(!empty($userdata))
		    	{
		    		if(setUpdateData($this->tbl_colleges_staffs,array('token'=>$token),$userdata['id']))
		    		{
		    			$resetUrl = base_url('reset-password')."/?email=".$userdata['email']."&token=".$token;

		    			$email_template  = 'smarthub-forgot-password-notification.html';
				        $templateTags =  array(
				            '{{name}}'=>$userdata['name'],
				            '{{email}}'=>$userdata['email'],
					        '{{resetUrl}}'=>$resetUrl,
				            '{{signature}}' => getEmailSignature(),
				            '{{disclaimer}}' => getEmailDisclaimer()
				        );
				        $message_content = email_compose($email_template,$templateTags);
				        send_email($userdata['email'],'SmartHub : Forgot Password',$message_content);

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
		$this->load->view('smarthub/forgot-password',$data);
	}

	public function resetpassword()
	{
		$data = array();
		$get_data=$this->input->get();
		if(empty($get_data['email']) || empty($get_data['token']))
		{
			$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Email or Token are missing or invalid !!.'));
			redirect('forgot-password', 'refresh');
		}

		$userdata = get_recordArr($this->tbl_colleges_staffs,array('email'=>$get_data['email']));		
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
			        	if(setUpdateData($this->tbl_colleges_staffs,array('password'=>$newPassword,'token'=>''),$userdata['id']))
			        	{
			        		$this->session->set_flashdata('notification',array('error'=>0,'message'=>'Your password has changed successfully.'));
			        		redirect('login','refresh');
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
		$this->load->view('smarthub/reset-password',$data);
	}

	public function changepassword()
	{
		CheckSmartLoginSession();
		$data = array();
        $college_login_data=$this->session->userdata('college_login_data');
        $college_id = $college_login_data['college_id'];
        $college_email = $college_login_data['college_email'];
        $post_data=$this->input->post();
		
		if(!empty($post_data))
		{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('oldpassword', 'old password', 'required');
			$this->form_validation->set_rules('newpassword', 'new password', 'required');	
			$this->form_validation->set_rules('confirmpassword', 'confirm password', "trim|required|matches[newpassword]");				
			if($this->form_validation->run() != FALSE)
			{

				$collegedata = get_recordArr($this->tbl_colleges_staffs,array('email'=>$college_email, 'password' => md5($post_data['oldpassword'])));

				if(!empty($collegedata))
				{
					$newPassword = md5($post_data['newpassword']);
					$update_id = setUpdateData($this->tbl_colleges_staffs,array('password'=>$newPassword),$college_id);
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
				else
				{
					$this->session->set_flashdata('notification',array('error'=>1,'message'=>'Old Password is invalid, Please try again!'));
				}
			}
		}

		$this->load->view('smarthub/include/header',$data);
		$this->load->view('smarthub/include/sidebar',$data);
		$this->load->view('smarthub/change-password',$data);
		$this->load->view('smarthub/include/footer');
	}

	public function myprofile()
	{
		CheckSmartLoginSession();
		$college_id = getCurrentLoggedInCollegeId();
        $staff_id = getCurrentLoggedInCollegeStaffId();

		$post_data=$this->input->post();
		if(!empty($post_data))
		{
		    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		    $this->form_validation->set_rules('name', 'name', 'trim|required');
		    if($this->form_validation->run() != FALSE)
		    {
		    	//pre($post_data); die;
		    	if(setUpdateData($this->tbl_colleges_staffs,$post_data,$staff_id))
		    	{
		    		if(!empty($_FILES["profile_pic"]["name"]))
			        {
			            $profile_pic_img=do_upload('staffs','profile_pic');
			            $data_profile_pic_img = array('profile_pic' => $profile_pic_img );
			            setUpdateData($this->tbl_colleges_staffs,$data_profile_pic_img,$staff_id);
			        }

					$this->session->set_flashdata('notification',array('error'=>0,'message'=>'Profile has been updated successfully !!'));
					redirect(current_url(), 'refresh');
		    	}
			}
		}

		$data['rec'] = $rec = get_recordArr($this->tbl_colleges_staffs, array('id'=>$staff_id));
		$this->load->view('smarthub/include/header',$data);
		$this->load->view('smarthub/include/sidebar',$data);
		$this->load->view('smarthub/profile',$data);
		$this->load->view('smarthub/include/footer');		
	}

	public function support()
	{
		CheckSmartLoginSession();
		$college_id = getCurrentLoggedInCollegeId();
        $staff_id = getCurrentLoggedInCollegeStaffId();

		$post_data=$this->input->post();
		if(!empty($post_data))
		{
			$post_data['college_id'] = $college_id;
			$post_data['staff_id'] = $staff_id;
	    	$insert_id = setInsertData($this->tbl_supports,$post_data);
	    	if(!empty($insert_id))
	    	{
	    		if(!empty($_FILES["file_upload"]["name"]))
		        {
		            $attachment=do_uploadFiles('support_files','file_upload');
		            $data_attachment = array('attachment' => $attachment );
		            setUpdateData($this->tbl_supports,$data_attachment,$insert_id);
		        }

		        $supportRec = get_recordArr($this->tbl_supports, array('id'=>$insert_id));

		        $email_template  = 'smarthub-support-request.html';
		        $templateTags =  array(
		            '{{name}}'=>$supportRec['first_name'].' '.$supportRec['last_name'],
		            '{{first_name}}'=>$supportRec['first_name'],
		            '{{last_name}}'=>$supportRec['last_name'],
		            '{{email}}'=>$supportRec['email'],
			        '{{contact}}'=>$supportRec['contact'],
			        '{{concern}}'=>$supportRec['concern'],
			        '{{subject}}'=>$supportRec['subject'],
			        '{{details}}'=>$supportRec['details'],
		            '{{signature}}' => getEmailSignature(),
		            '{{disclaimer}}' => getEmailDisclaimer()
		        );
		        $message_content = email_compose($email_template,$templateTags);
		        $admin_email = getAdminEmail();
		        send_email($admin_email,'SmartHub : Support Ticket raised',$message_content);

		        $email_template2  = 'smarthub-support-request-notification.html';
		        $message_content2 = email_compose($email_template2,$templateTags);
		        send_email($supportRec['email'],'SmartHub : Support Ticket notification',$message_content2);

				$this->session->set_flashdata('notification',array('error'=>0,'message'=>'Support request has submitted !!'));
				//redirect(current_url(), 'refresh');
	    	}
		}

		$data['staff'] = $staff = get_recordArr($this->tbl_colleges_staffs, array('id'=>$staff_id));

		$this->load->view('smarthub/include/header',$data);
		$this->load->view('smarthub/include/sidebar',$data);
		$this->load->view('smarthub/support',$data);
		$this->load->view('smarthub/include/footer');		
	}

	public function conversations()
	{
		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($landingCat->meta_title)?$landingCat->meta_title:'';
		$data['meta_description'] = !empty($landingCat->meta_description)?$landingCat->meta_description:'';
		$data['meta_key'] = !empty($landingCat->meta_key)?$landingCat->meta_key:'';
		/* SEO : Meta data : End */

		$this->load->view('smarthub/include/header-inner',$data);
		$this->load->view('smarthub/conversations',$data);
		$this->load->view('smarthub/include/footer');		
	}

	public function reportanissue()
	{
		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($landingCat->meta_title)?$landingCat->meta_title:'';
		$data['meta_description'] = !empty($landingCat->meta_description)?$landingCat->meta_description:'';
		$data['meta_key'] = !empty($landingCat->meta_key)?$landingCat->meta_key:'';
		/* SEO : Meta data : End */

		$this->load->view('smarthub/include/header-inner',$data);
		$this->load->view('smarthub/reportanissue',$data);
		$this->load->view('smarthub/include/footer');		
	}
}