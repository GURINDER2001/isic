<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller {

	public $tbl_slider = "slider";
	public $tbl_pages  = "pages";
	public $tbl_events  = "events";
	public $tbl_news  = "news";
	public $tbl_faqs = "faqs";
	public $tbl_testimonials  = "testimonials";
	public $tbl_subscribers  = "subscribers";
	public $tbl_concern_type  = "concern_type";
	public $tbl_jobs  = "jobs";
	public $tbl_booked_demo  = "booked_demo";
	
	public $client_id  = '';
	public $client_secret  = '';

	function __construct() {
        parent::__construct();
        $this->load->model('front_model');
        $this->load->model('sectionsettings_model');
    }

    public function index()
    {
    	//echo getBrandId(); die;
		$data['sliders']  = getDataRecords($this->tbl_slider, array('status'=>1), 0, '', "DESC");
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('home');
		$data['testimonials'] = $this->master_model->get_records($this->tbl_testimonials,array('status'=>1));
		$data['upcoming_event'] = $this->master_model->get_record($this->tbl_events,array('status'=>1,"event_date >= now()="=>1),'event_date','ASC');
		$data['latest_news'] = $this->master_model->get_records($this->tbl_news,array('status'=>1,'brand_id'=>0));

		//pre($latest_news);

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('home','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('home','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('home','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/home',$data);
		$this->load->view('front/include/footer');			
	}

	public function aboutus(){
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/about',$data);	
		$this->load->view('front/include/footer',$data);		
	}
	
	public function whyIsic(){
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/why-isic',$data);	
		$this->load->view('front/include/footer',$data);		
	}

	
	public function endorsement(){
		$data = array();
		//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		//$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		//$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		//$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/endorsement',$data);	
		$this->load->view('front/include/footer',$data);
	}
	
	public function faq(){
		$data = array();
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('faqs');
		$data['pageContent']['faqs'] = $this->master_model->get_recordsArr($this->tbl_faqs,array('status'=>1));

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('faqs','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('faqs','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('faqs','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/faq',$data);	
		$this->load->view('front/include/footer',$data);
	}
	
	public function gallery(){
		$data = array();
		//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		//$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		//$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		//$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/gallery',$data);	
		$this->load->view('front/include/footer',$data);
	}
	
	public function terms_of_use(){
		$data = array();
		//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		//$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		//$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		//$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/terms-of-use',$data);	
		$this->load->view('front/include/footer',$data);
	}
	
	public function referral_program(){
		$data = array();
		//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		//$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		//$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		//$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/referral-program',$data);	
		$this->load->view('front/include/footer',$data);
	}
	
	
	
	
	
	public function ajax_states()
    {
        $country_id=$this->input->post('country_id');
        $options = '';
        if(!empty($country_id))
        {
            $records = getStatesOptions($country_id);
            if(!empty($records))
            {
                foreach($records as $key=>$val)
                {
                   $options.= '<option value="'.$key.'">'.$val.'</option>';
                }
            }
            else
            {
                $options.= '<option value="">----Choose State/Province----</option>';
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
            $records = getCitiesOptions($state_id);
            if(!empty($records))
            {
                foreach($records as $key=>$val)
                {
                   $options.= '<option value="'.$key.'">'.$val.'</option>';
                }
            }
            else
            {
                $options.= '<option value="">--------State-------</option>';
            }
        }
        echo $options;
    }

	public function jobs()
	{
		$data = array();

		$data['job'] = $job = $this->master_model->get_recordArr($this->tbl_jobs,array('status'=>1));

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('contactus','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('contactus','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('contactus','meta_key');
		/* SEO : Meta data : End */

		// print_r($data['pageContent']);
		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/jobs',$data);
		$this->load->view('front/include/footer',$data);	
	}

	public function book_demo()	{
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('bookdemo');

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('bookdemo','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('bookdemo','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('bookdemo','meta_key');
		/* SEO : Meta data : End */


		$data['conernOptions'] = getOptions($this->tbl_concern_type,'Please Select',array('parent'=>0,'status'=>1));

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/bookdemo',$data);	
		$this->load->view('front/include/footer',$data);		
	}

	public function contactus()
	{
		$post_data = $this->input->post();
		$data = array();
	    if(!empty($post_data))
	    { 
		    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		    $this->form_validation->set_rules('user_name', 'name', 'required');
		    $this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email');
		    $this->form_validation->set_rules('subject', 'subject', 'trim|required');
		    $this->form_validation->set_rules('message', 'message', 'trim|required');
		    if($this->form_validation->run() != FALSE)
		    {	
		    	//echo "<pre>"; print_r($post_data); echo "</pre>"; die;	    	
		    	$name = $this->input->post("user_name");				
				$email = $this->input->post("user_email");
				$subject = $this->input->post("subject");
				$message = $this->input->post("message");			
		    	
    			$email_template  = 'contact.html';
		        $templateTags =  array(
		        '{{site_logo}}' => base_url().'assets/front/images/logo.png',
		        '{{site_name}}'=>'Get Healthier',
		        '{{site_url}}'=> base_url(),
		        '{{name}}'=>$name,
		        '{{email}}'=>$email,
		        '{{year}}'=>date('Y'),
		        '{{team_name}}'=>'Get Healthier',
		        '{{company_name}}' => 'Get Healthier',
		        '{{company_email}}' => 'info@carehealthfully.com',
		        );
			    $message_content = email_compose($email_template,$templateTags);
			    send_email($email,'Get Healthier: Enquiery notification',$message_content,'webmaster@markupdesigns.info','Care Healthfully');

			    $email_template_admin  = 'contact-admin.html';
		        $templateTags_admin =  array(
		        '{{site_logo}}' => base_url().'assets/front/images/logo.png',
		        '{{site_name}}'=>'Get Healthier',
		        '{{site_url}}'=> base_url(),
		        '{{name}}'=>$name,
		        '{{email}}'=>$email,
		        '{{subject}}'=>$subject,
		        '{{message}}'=>$message,
		        '{{year}}'=>date('Y'),
		        '{{team_name}}'=>'Get Healthier',
		        '{{company_name}}' => 'Get Healthier',
		        '{{company_email}}' => 'info@carehealthfully.com',
		        );
			    $message_content2 = email_compose($email_template_admin,$templateTags_admin);
			    $admin_email = get_setting('admin_email');
			    send_email($admin_email,'Get Healthier: New Enquiery',$message_content2,'webmaster@markupdesigns.info','Get Healthier');

			    $data['response'] = '<span class="text-success">Enquiery has submitted Successfully</span>';	        	
		  	}
		}


		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('contactus');

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('contactus','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('contactus','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('contactus','meta_key');
		/* SEO : Meta data : End */

		// print_r($data['pageContent']);
		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/contact',$data);
		$this->load->view('front/include/footer',$data);	
	}

	public function student_chatter()
	{
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('testimonials');

		$data['testimonials'] = $this->master_model->get_records($this->tbl_testimonials,array('status'=>1));

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('testimonials','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('testimonials','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('testimonials','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/student-chatter',$data);
		$this->load->view('front/include/footer',$data);	
	}

	public function package()
	{
		$data['pageContent'] = $dataCollection = $this->sectionsettings_model->getSectionDataCollection('customizedpackages');
		if(!empty($dataCollection))
		{
			/* SEO : Meta data : Start */
			$data['meta_title'] = !empty($dataCollection['meta_title'])?$dataCollection['meta_title']:$dataCollection['heading'];
			$data['meta_description'] = !empty($dataCollection['meta_description'])?$dataCollection['meta_description']:'';
			$data['meta_key'] = !empty($dataCollection['meta_key'])?$dataCollection['meta_key']:'';
			/* SEO : Meta data : End */			
		}

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/package',$data);	
		$this->load->view('front/include/footer',$data);		
	}

	public function ourbrands()
	{
		$data = array();
		$dataCollection = get_record($this->tbl_pages,array('slug'=>'our-brands'));

		$data['description']	=	!empty($dataCollection->description)?$dataCollection->description:'';
		$brands = getBrands();

		$brandsArr = array();
		if(!empty($brands))
		{
			foreach ($brands as $key => $brand)
			{
				$bRow = array();
				if(!empty($brand))
				{
					$url = getBrandUrl($brand->id);
					$bRow = array('name'=>$brand->name,'logo'=>base_url($brand->logo),'url'=>$url);
				}
				array_push($brandsArr, $bRow);
			}
		}

		$data['brands']	= $brandsArr;

		if(!empty($dataCollection))
		{
			/* SEO : Meta data : Start */
			$data['meta_title'] = !empty($dataCollection->meta_title)?$dataCollection->meta_title:$dataCollection->name;
			$data['meta_description'] = $dataCollection->meta_description;
			$data['meta_key'] = $dataCollection->meta_key;
			/* SEO : Meta data : End */			
		}

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/our-brands',$data);	
		$this->load->view('front/include/footer',$data);		
	}



	public function pageDetails($slug)
	{
		$data = array();
		$dataCollection = $this->master_model->get_record($this->tbl_pages,array('slug'=>$slug));
		//pre($dataCollection);
		$data['pageContent']	=	$dataCollection;
		if(!empty($dataCollection))
		{
			/* SEO : Meta data : Start */
			$data['meta_title'] = !empty($dataCollection->meta_title)?$dataCollection->meta_title:$dataCollection->name;
			$data['meta_description'] = $dataCollection->meta_description;
			$data['meta_key'] = $dataCollection->meta_key;
			/* SEO : Meta data : End */			
		}
		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/page',$data);
		$this->load->view('front/include/footer',$data);		
	}

	public function subscription()
	{
		$post_data = $this->input->post();
		if(!empty($post_data))
		{
			$post_data['subscription_status'] = 1;
			$post_data['status'] = 1;

			if(empty($post_data['subscriber_email']))
			{
				echo 'required';
			}
			else
			{
				if($this->master_model->isExist($this->tbl_subscribers,array('subscriber_email'=>$post_data['subscriber_email'])))
				{
					echo 'exist';
				}
				else
				{
					$this->master_model->setInsertData($this->tbl_subscribers,$post_data);
					$email = $post_data['subscriber_email'];

					$email_template  = 'subscriber-notification.html';
	                $templateTags =  array(
	                    '{{email}}'=>$email,
	                    '{{signature}}' => getEmailSignature(),
	                    '{{disclaimer}}' => getEmailDisclaimer()
	                );
	                $message_content = email_compose($email_template,$templateTags);
	                send_email($email,'Subscription notification',$message_content);

	                $email_template_admin  = 'subscriber-admin-notification.html';
	                $templateTags_admin =  array(
	                    '{{name}}'=>$name,
	                    '{{email}}'=>$email,
	                    '{{signature}}' => getEmailSignature(),
	                    '{{disclaimer}}' => getEmailDisclaimer()
	                );
	                $message_content2 = email_compose($email_template_admin,$templateTags_admin);
	                $admin_email = getSiteAdminEmail();
	                send_email($admin_email,'New Subscription recieved',$message_content2,$email,$name);

	                echo 'success';

				}
			}
		}
		else
		{
			echo 'empty';
		}
	}

	public function contact()
	{
		$post_data = $this->input->post();
		if(!empty($post_data))
		{
			$name 	 = !empty($post_data['name'])?$post_data['name']:'';
			$email 	 = !empty($post_data['email'])?$post_data['email']:'';
			$subject = !empty($post_data['subject'])?$post_data['subject']:'';
			$comment = !empty($post_data['comment'])?$post_data['comment']:'';

			$email_template  = 'contact-notification.html';
	        $templateTags =  array(
	            '{{name}}'=>$name,
	            '{{email}}'=>$email,
	            '{{signature}}' => getEmailSignature(),
	            '{{disclaimer}}' => getEmailDisclaimer()
	        );
	        $message_content = email_compose($email_template,$templateTags);
	        send_email($email,'Enquiery notification',$message_content);

	        $email_template_admin  = 'contact-admin-notification.html';
	        $templateTags_admin =  array(
	            '{{name}}'=>$name,
	            '{{email}}'=>$email,
	            '{{subject}}'=>$subject,
	            '{{message}}'=>$comment,
	            '{{signature}}' => getEmailSignature(),
	            '{{disclaimer}}' => getEmailDisclaimer()
	        );
	        $message_content2 = email_compose($email_template_admin,$templateTags_admin);
	        $admin_email = getSiteAdminEmail();
	        send_email($admin_email,'New Enquiery',$message_content2);

	        echo 'success';
		}
		else
		{
			echo 'empty';
		}
	}

	public function specification()
	{
		$parent = $this->input->post('parent');
		if(!empty($parent))
		{

			$recData = getDataRecord($this->tbl_concern_type, array('id'=>$parent));
			$label = !empty($recData['label'])?$recData['label']:$recData['name'];

			$childArr = getOptions($this->tbl_concern_type,'Please Select',array('parent'=>$parent,'status'=>1));

			$msg = '<label id="concern_specification_label">'.$label.'*</label>';
            $msg.= '<select id="concern_specification" name="concern_specification" class="form-control">';
            if(!empty($childArr))
            {
            	foreach ($childArr as $key => $value) {
            		$msg.= '<option value="'.$key.'">'.$value.'</option>';
            	}
            }
            $msg.= '</select>';

            echo $msg;
		}
		else
		{
			echo '';
		}
		die;
	}

	public function ajaxbookdemo()
	{
		$post_data = $this->input->post();
		if(!empty($post_data))
		{
			$concern 	 = !empty($post_data['concern'])?get_columData($this->tbl_concern_type,'name',array('id'=>$post_data['concern'])):'';
			$specification_label	 = !empty($post_data['concern'])?get_columData($this->tbl_concern_type,'label',array('id'=>$post_data['concern'])):'Specification';
			$concern_specification 	 = !empty($post_data['concern_specification'])?get_columData($this->tbl_concern_type,'name',array('id'=>$post_data['concern_specification'])):'';
			$first_name = !empty($post_data['first_name'])?$post_data['first_name']:'';
			$last_name = !empty($post_data['last_name'])?$post_data['last_name']:'';
			$phone = !empty($post_data['phone'])?$post_data['phone']:'';
			$email = !empty($post_data['email'])?$post_data['email']:'';
			$comment = !empty($post_data['comment'])?$post_data['comment']:'';

			$this->master_model->setInsertData($this->tbl_booked_demo,$post_data);
			
			$name = $first_name.' '.$last_name;

			$email_template  = 'bookdemo-notification.html';
	        $templateTags =  array(
	            '{{name}}'=>$name,
	            '{{email}}'=>$email,
	            '{{signature}}' => getEmailSignature(),
	            '{{disclaimer}}' => getEmailDisclaimer()
	        );
	        $message_content = email_compose($email_template,$templateTags);
	        send_email($email,'BookDemo : Enquiery notification',$message_content);

	        $email_template_admin  = 'bookdemo-admin-notification.html';
	        $templateTags_admin =  array(
	        	'{{concern}}'=>$concern,
	            '{{specification_label}}'=>$specification_label,
	            '{{concern_specification}}'=>$concern_specification,
	        	'{{name}}'=>$name,
	            '{{phone}}'=>$phone,
	            '{{email}}'=>$email,
	            '{{comment}}'=>$comment,
	            '{{signature}}' => getEmailSignature(),
	            '{{disclaimer}}' => getEmailDisclaimer()
	        );
	        $message_content2 = email_compose($email_template_admin,$templateTags_admin);
	        $admin_email = getSiteAdminEmail();
	        send_email($admin_email,'BookDemo : New Enquiery',$message_content2);

	        echo 'success';
		}
		else
		{
			echo 'empty';
		}
	}

}