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
	public $tbl_blogs  = "blogs";
	public $tbl_concern_type  = "concern_type";
	public $tbl_discounts  = "discounts";
	public $tbl_gallery  = "gallery";
	
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
        $data['blogs'] = get_recordsWithLimit($this->tbl_blogs,array('status'=>1),3);
		//pre($latest_news);

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('home','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('home','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('home','meta_key');
		/* SEO : Meta data : End */
		
		$data['countries'] = getCountriesFromDiscounts();
		
		$data['india_discounts'] = $this->master_model->get_records($this->tbl_discounts,array('country_id' => 101,'status'=>1,'FIND_IN_SET("home", `display_section`) <>' => 0));
		$data['abroad_discounts'] = $this->master_model->get_records($this->tbl_discounts,array('country_id <> '=> 101,'status'=>1,'FIND_IN_SET("home", `display_section`) <>' => 0));
		
		/*$providerXML = callBMDiscountAPI('search/providers?limit=10&cardTypes=isic&seed=1&offset=0&status=ACTIVE');
        $xml2 = simplexml_load_string($providerXML, "SimpleXMLElement", LIBXML_NOCDATA);
        $json2 = json_encode($xml2);
        $data['abroad_discounts'] = json_decode($json2,TRUE);
            
        $data['india_discounts'] = callDMDiscountAPI('providers?availableOnline=true&limit=10');  */  
            

		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/home',$data);
		$this->load->view('front/include/footer');			
	}

	public function faq(){
		$data = array();
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('faqs');
		
		
		$whereConArr = array('status'=>1);
        $totalRows = getRowCount($this->tbl_faqs,$whereConArr);
        $perpage = 10;
        $limit = 5;
        $url = base_url('faq');
        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
        $offset  = $page * $perpage;
        
	   	$data['records'] = get_recordsWithLimit($this->tbl_faqs,$whereConArr,$perpage,$offset,'custom_order','ASC');
	   	$data['paginations'] = frontPagination($totalRows,$perpage,$limit,$url);
	   	
		//$data['pageContent']['faqs'] = $this->master_model->get_recordsArr($this->tbl_faqs,array('status'=>1));

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('faqs','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('faqs','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('faqs','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/faq',$data);	
		$this->load->view('front/include/footer',$data);
	}

	public function jetbrains(){
		$data = array();
		//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		//$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		//$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		//$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/jetbrains',$data);	
		$this->load->view('front/include/footer',$data);
	}
	
	
	
	public function gallery(){
		$data = array();
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('gallery');
		
		$imageGalleries = get_recordsArr($this->tbl_gallery,array('status'=>1,'type'=>0));
		$imageGalleries = array_chunk($imageGalleries,4);
		$videoGalleries = get_recordsArr($this->tbl_gallery,array('status'=>1,'type'=>1));
		
		$data['imageGalleries'] = $imageGalleries;
		$data['videoGalleries'] = $videoGalleries;

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('gallery','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('gallery','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('gallery','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/gallery',$data);	
		$this->load->view('front/include/footer',$data);
	}
	
	public function endorsement(){
		$data = array();
		
		//echo getBrandId(); die;
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('endorsement');

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('endorsement','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('endorsement','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('endorsement','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/endorsement',$data);	
		$this->load->view('front/include/footer',$data);
	}
	
	public function goingAbroad(){
		$data = array();
		
		//echo getBrandId(); die;
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('goingabroad');
		$data['testimonials'] = $this->master_model->get_records($this->tbl_testimonials,array('status'=>1));

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('goingabroad','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('goingabroad','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('goingabroad','meta_key');
		/* SEO : Meta data : End */
		
        /*$providerXML = callBMDiscountAPI('search/providers?limit=10&cardTypes=isic&seed=1&offset=0&status=ACTIVE');
        $xml2 = simplexml_load_string($providerXML, "SimpleXMLElement", LIBXML_NOCDATA);
        $json2 = json_encode($xml2);
        $data['abroad_discounts'] = json_decode($json2,TRUE);
            
        $data['india_discounts'] = callDMDiscountAPI('providers?availableOnline=true&limit=10'); */
        
        $countries = getCountriesFromDiscounts();
        $abroadCountries = array();
        if(!empty($countries))
        {
            foreach($countries as $country)
            {
                $country_id = $country['id'];
                $country_name = $country['name'];
                if($country_id != 101)
                {
                    $abroadCountries[$country_id] = $country_name;
                }
            }
        }
        $data['countries'] = $abroadCountries;
        
        $data['firstCountryId'] = $firstCountryId = array_key_first($abroadCountries);
        
        $data['india_discounts'] = $this->master_model->get_records($this->tbl_discounts,array('country_id'=>101,'status'=>1,'FIND_IN_SET("going-abroad", `display_section`) <>' => 0));
		$data['abroad_discounts'] = $this->master_model->get_records($this->tbl_discounts,array('country_id <>'=>101,'status'=>1,'FIND_IN_SET("going-abroad", `display_section`) <>' => 0));

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/pages/going-abroad',$data);	
		$this->load->view('front/include/footer',$data);
	}
	
	public function termpage($slug = ''){
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
		$this->load->view('front/pages/termpage',$data);
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
    
    public function aboutus()
    {
        $data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		//$data['testimonials'] = $this->master_model->get_records($this->tbl_testimonials,array('status'=>1));

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/aboutus',$data);
		$this->load->view('front/include/footer',$data);
    }
    
    public function whyisic()
    {
        $data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('whyisic');

		//$data['testimonials'] = $this->master_model->get_records($this->tbl_testimonials,array('status'=>1));

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('whyisic','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('whyisic','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('whyisic','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/whyisic',$data);
		$this->load->view('front/include/footer',$data);
    }
    
    
    public function referFriend()
    {
        $data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('referfriend');

		//$data['testimonials'] = $this->master_model->get_records($this->tbl_testimonials,array('status'=>1));

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('referfriend','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('referfriend','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('referfriend','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/refer-friend',$data);
		$this->load->view('front/include/footer',$data);
    }

	public function contactus()
	{
		$post_data = $this->input->post();
		$data = array();
	    if(!empty($post_data))
	    { 
	        //pre($post_data);
		    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		    $this->form_validation->set_rules('name', 'name', 'required');
		    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		    $this->form_validation->set_rules('phone', 'phone', 'trim|required');
		    $this->form_validation->set_rules('concern', 'concern', 'trim|required');
		    $this->form_validation->set_rules('concern_specification', 'concern_specification', 'trim|required');
		    $this->form_validation->set_rules('comment', 'comment', 'trim|required');
		    if($this->form_validation->run() == TRUE)
		    {	
				$subject 	= $post_data['subject'] = !empty($post_data['concern'])?get_columData($this->tbl_concern_type,'name',array('id'=>$post_data['concern'])):'';
			    $reletedTo 	= $post_data['reletedTo'] = !empty($post_data['concern_specification'])?get_columData($this->tbl_concern_type,'name',array('id'=>$post_data['concern_specification'])):'';

				$name 	 = !empty($post_data['name'])?$post_data['name']:'';
    			$email 	 = !empty($post_data['email'])?$post_data['email']:'';
    			$phone 	 = !empty($post_data['phone'])?$post_data['phone']:'';
    			$comment = !empty($post_data['comment'])?$post_data['comment']:'';
    
    			$email_template  = 'contact-notification.html';
    	        $templateTags =  array(
    	            '{{name}}'=>$name,
    	            '{{email}}'=>$email,
    	            '{{phone}}'=>$phone,
    	            '{{signature}}' => getEmailSignature(),
    	            '{{disclaimer}}' => getEmailDisclaimer()
    	        );
    	        $message_content = email_compose($email_template,$templateTags);
    	        send_email($email,'Enquiery notification',$message_content);
    
    	        $email_template_admin  = 'contact-admin-notification.html';
    	        $templateTags_admin =  array(
    	            '{{name}}'=>$name,
    	            '{{email}}'=>$email,
    	            '{{phone}}'=>$phone,
    	            '{{subject}}'=>$subject,
    	            '{{relatedTo}}'=>$reletedTo,
    	            '{{message}}'=>$comment,
    	            '{{signature}}' => getEmailSignature(),
    	            '{{disclaimer}}' => getEmailDisclaimer()
    	        );
    	        $message_content2 = email_compose($email_template_admin,$templateTags_admin);
    	        $admin_email = getSiteAdminEmail();
    	        send_email($admin_email,'New Enquiery',$message_content2);
    	        
			    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Enquiery has submitted Successfully !!'));
		  	}
		}


		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('contactus');

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('contactus','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('contactus','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('contactus','meta_key');
		/* SEO : Meta data : End */
		
		$data['conernOptions'] = getOptions($this->tbl_concern_type,'Please Select',array('parent'=>0,'status'=>1));

		// print_r($data['pageContent']);
		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/contact',$data);
		$this->load->view('front/include/footer',$data);	
	}

	public function student_chatter()
	{
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('testimonials');

		//$data['testimonials'] = $this->master_model->get_records($this->tbl_testimonials,array('status'=>1));
		
		$whereConArr = array('status'=>1);
        $totalRows = getRowCount($this->tbl_testimonials,$whereConArr);
        $perpage = 10;
        $limit = 5;
        $url = base_url('student-chatter');
        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
        $offset  = $page * $perpage;
        
	   	$data['records'] = get_recordsWithLimit($this->tbl_testimonials,$whereConArr,$perpage,$offset);
	   	$data['paginations'] = frontPagination($totalRows,$perpage,$limit,$url);
	   	

		/* SEO : Meta data : Start */
		$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('testimonials','meta_title');
		$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('testimonials','meta_description');
		$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('testimonials','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);
		$this->load->view('front/pages/student-chatter',$data);
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
	                    '{{email}}'=>$email,
	                    '{{signature}}' => getEmailSignature(),
	                    '{{disclaimer}}' => getEmailDisclaimer()
	                );
	                $message_content2 = email_compose($email_template_admin,$templateTags_admin);
	                $admin_email = getSiteAdminEmail();
	                send_email($admin_email,'New Subscription recieved',$message_content2,$email);

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

			$msg = '';
            if(!empty($childArr))
            {
            	foreach ($childArr as $key => $value) {
            		$msg.= '<option value="'.$key.'">'.$value.'</option>';
            	}
            }

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
	
	public function ajaxReferFriendByWhatsapp()
	{
	    $friend_mobile_number = $this->input->post('mobile_number');
	    $responseArr = array();
	    if(!empty($friend_mobile_number))
	    {
	        $responseArr['status'] = 'success';
	        $responseArr['message'] = 'Redirecting you to on whatsapp panel for sharing.';
	        
	        $templateTags = array("{{myserialno}}" => getSerialNo());
	        $whatsapp_message = getSetting('whatsapp_message');
            $whatsappMessage = strtr($whatsapp_message,$templateTags);
	        $responseArr['text'] = $whatsappMessage;
	    }
	    else
	    {
	        $responseArr['status'] = 'error';
	        $responseArr['message'] = 'Please enter your friend mobile number with country code.';
	    }
	    
	    echo json_encode($responseArr);
	    
	}
	
	public function ajaxReferFriendByEmail()
	{
	    $email_id = $this->input->post('email_id');
	    $responseArr = array();
	    $user = getCurrentUser();
	    if(!empty($email_id))
	    {
	        $responseArr['status'] = 'success';
	        $responseArr['message'] = 'Your reffer request has been sent to your friend inbox successfully.';
	        
	        $email_template  = 'referfriend-notification.html';
	        $templateTags =  array(
	            '{{url}}'=>base_url('cards/selection'),
	            '{{name}}'=>$user->first_name.' '.$user->last_name,
	            '{{serial_no}}'=>getSerialNo(),
	        );
	        $message_content = email_compose($email_template,$templateTags);
	        send_email($email_id,'Refer A Friend : ISIC',$message_content);
	    }
	    else
	    {
	        $responseArr['status'] = 'error';
	        $responseArr['message'] = 'Please enter your friend valid Email Id.';
	    }
	    
	    echo json_encode($responseArr);
	    
	}
	
	

}