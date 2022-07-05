<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jobs extends CI_Controller {

	public $tbl_jobs = "jobs";
	public $tbl_jobs_application  = "jobs_application";

	function __construct() {
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('sectionsettings_model');
    }

    public function index()
    {
    	$section = 'jobsite_home';

		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection($section);
		$data['jobs']  = getDataRecords($this->tbl_jobs, array('status'=>1), 0, '', "DESC");

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey($section,'meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey($section,'meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey($section,'meta_key');
		/* SEO : Meta data : End */

		$this->load->view('jobs/include/header',$data);
		$this->load->view('jobs/landing',$data);
		$this->load->view('jobs/include/footer');
	}

	public function jobdetails($slug)
	{
		$data['pageContent'] = $dataCollection = get_recordArr($this->tbl_jobs,array('slug'=>$slug));

		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($dataCollection['meta_title'])?$dataCollection['meta_title']:$dataCollection['name'];
		$data['meta_description'] = !empty($dataCollection['meta_description'])?$dataCollection['meta_description']:'';
		$data['meta_key'] = !empty($dataCollection['meta_key'])?$dataCollection['meta_key']:'';
		/* SEO : Meta data : End */

		$this->load->view('jobs/include/header',$data);
		$this->load->view('jobs/jobdetails',$data);
		$this->load->view('jobs/include/footer');	
	}

	public function applyjob($slug)
	{
		$post_data = $this->input->post();
		$data = array();
	    if(!empty($post_data))
	    {
	    	//pre($post_data); die;
		    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		    $this->form_validation->set_rules('firstname', 'first name', 'required');
		    $this->form_validation->set_rules('lastname', 'last name', 'required');
		    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		    /*$this->form_validation->set_rules('phoneno', 'phone no', 'trim|required');
		    $this->form_validation->set_rules('worked_in_sales', 'worked in sales', 'trim|required');
		    $this->form_validation->set_rules('have_you_degree', 'have you degree', 'trim|required');
		    $this->form_validation->set_rules('live_in_oslo', 'live in oslo', 'trim|required');
		    $this->form_validation->set_rules('ready to relocate', 'ready to relocate', 'trim|required');*/

		    if($this->form_validation->run() != FALSE)
		    {

		    	$post_data['phonenumber'] = $post_data['phonecode'].$post_data['phoneno'];

		    	unset($post_data['phonecode']);
		    	unset($post_data['phoneno']);

		    	$post_data['status'] = 1;
		    	$application_id = setInsertData($this->tbl_jobs_application, $post_data);

		    	if(!empty($application_id))
		    	{
					if(!empty($_FILES["resume"]["name"]))
					{
						$resume_file = do_upload('resume','resume');
						$data_resume_file = array('resume' => $resume_file );
						setUpdateData($this->tbl_jobs_application,$data_resume_file,$application_id);
					}

		    		$jobRecord = get_record($this->tbl_jobs,array('id'=>$post_data['job_id']));
		    		$jobAppRecord = get_record($this->tbl_jobs_application,array('id'=>$application_id));
		    		$email_template  = 'job-application-user-notification.html';
			        $templateTags =  array(
			            '{{job_title}}'	 =>	!empty($jobRecord->name)?$jobRecord->name:'',
			            '{{firstname}}'=>!empty($jobAppRecord->firstname)?$jobAppRecord->firstname:'',
			            '{{lastname}}'=>!empty($jobAppRecord->lastname)?$jobAppRecord->lastname:'',
			            '{{email}}'	=>	!empty($jobAppRecord->email)?$jobAppRecord->email:'',
			            '{{signature}}'  => getEmailSignature(),
			            '{{disclaimer}}' => getEmailDisclaimer()
			        );
			        $message_content = email_compose($email_template,$templateTags);
			        send_email($jobAppRecord->email,'Job application notification',$message_content);

			        $email_template_admin  = 'job-application-admin-notification.html';
			        $templateTags_admin =  array(
			        	'{{job_title}}'	 =>	!empty($jobRecord->name)?$jobRecord->name:'',
			            '{{firstname}}'=>!empty($jobAppRecord->firstname)?$jobAppRecord->firstname:'',
			            '{{lastname}}'=>!empty($jobAppRecord->lastname)?$jobAppRecord->lastname:'',
			            '{{email}}'	=>	!empty($jobAppRecord->email)?$jobAppRecord->email:'',
			            '{{phonenumber}}'	=>	!empty($jobAppRecord->phonenumber)?$jobAppRecord->phonenumber:'',
			            '{{cover_letter}}'	=>	!empty($jobAppRecord->cover_letter)?$jobAppRecord->cover_letter:'',
			            '{{worked_in_sales}}'	=>	!empty($jobAppRecord->worked_in_sales)?$jobAppRecord->worked_in_sales:'',
			            '{{have_you_degree}}'	=>	!empty($jobAppRecord->have_you_degree)?$jobAppRecord->have_you_degree:'',
			            '{{live_in_oslo}}'	=>	!empty($jobAppRecord->live_in_oslo)?$jobAppRecord->live_in_oslo:'',
			            '{{ready_to_relocate}}'	=>	!empty($jobAppRecord->ready_to_relocate)?$jobAppRecord->ready_to_relocate:'',
			            '{{signature}}' => getEmailSignature(),
			            '{{disclaimer}}' => getEmailDisclaimer()
			        );
			        $message_content2 = email_compose($email_template_admin,$templateTags_admin);
			        $admin_email = getSiteAdminEmail();

		            $filePath = '';
		            if(!empty($jobAppRecord->resume))
		            {
		                $base_path = $this->config->item('base_path');
		                $filePath = $base_path.'upload/resume/'.$jobAppRecord->resume;
		            }
		            send_email_with_attachment($jobAppRecord->email,'Job application',$message_content2,array($filePath));	        

			        $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Thanks for submitting job application !!'));
          			redirect(current_url(), 'refresh');
		    	}	    	
    			      	
		  	}
		}

		$data['pageContent'] = $dataCollection = get_recordArr($this->tbl_jobs,array('slug'=>$slug));
		//pre($dataCollection); die;

		/* SEO : Meta data : Start */
		$data['meta_title'] = !empty($dataCollection['meta_title'])?$dataCollection['meta_title']:$dataCollection['name'];
		$data['meta_description'] = !empty($dataCollection['meta_description'])?$dataCollection['meta_description']:'';
		$data['meta_key'] = !empty($dataCollection['meta_key'])?$dataCollection['meta_key']:'';
		/* SEO : Meta data : End */

		// print_r($data['pageContent']);
		$this->load->view('jobs/include/header',$data);
		$this->load->view('jobs/applyjob',$data);
		$this->load->view('jobs/include/footer');	
	}

}