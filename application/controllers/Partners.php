<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends CI_Controller {
	/**
	 * Index Page for this controller.
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
	function __construct() {
        parent::__construct();
        //$this->load->model('services_model');
        $this->load->model('sectionsettings_model');
    }

    public $tbl_partners ='tbl_partners';
    public $tbl_partners_pages ='tbl_partners_pages';
    public $tbl_partners_pagemeta ='tbl_partners_pagemeta';

    public function index()
    {
    	$data = array();
    	//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('services');

        /* SEO : Meta data : Start */
        //$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_title');
        //$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_description');
        //$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_key');
        /* SEO : Meta data : End */

    	//$data['records'] = getDataCollection($this->tbl_name);    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/index',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function details($slug)
	{
		$data = array();
		$dataCollection = $this->master_model->get_recordArr($this->tbl_partners_pages,array('slug'=>$slug));
		//pre($dataCollection);
		
		$page_id = !empty($dataCollection['id'])?$dataCollection['id']:0;
		
		$data['partners_logos'] = $this->master_model->get_records($this->tbl_partners, array('find_in_set("'.$page_id.'", associated_pages) <>'=>0,'status' => 1));
		
		if(!empty($dataCollection))
		{
		    $data['pageContent']	=	$dataCollection;
		    $data['pageMeta'] = $this->master_model->get_records($this->tbl_partners_pagemeta, array('page_id' => $page_id));
			/* SEO : Meta data : Start */
			$data['meta_title'] = !empty($dataCollection['meta_title'])?$dataCollection['meta_title']:$dataCollection['name'];
			$data['meta_description'] = !empty($dataCollection['meta_description'])?$dataCollection['meta_description']:'';
			$data['meta_key'] = !empty($dataCollection['meta_key'])?$dataCollection['meta_key']:'';
			/* SEO : Meta data : End */			
		}
		
		$layout = !empty($dataCollection['layout'])?$dataCollection['layout']:0;
		$this->load->view('front/include/header',$data);
		if(!empty($layout) && $layout == 2)
        {
            $this->load->view('front/partners/layout3',$data);
        }
        else if(!empty($layout) && $layout == 1)
        {
            $this->load->view('front/partners/layout2',$data);
        }
        else
        {
            $this->load->view('front/partners/layout1',$data);
        }
        
		$this->load->view('front/include/footer',$data);		
	}
	public function academy2()	{
		$data = array();
		//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		//$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		//$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		//$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/partners/academy',$data);	
		$this->load->view('front/include/footer',$data);		
	}
	
	public function commercial2()	{
		$data = array();
		//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		//$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		//$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		//$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/partners/commercial',$data);	
		$this->load->view('front/include/footer',$data);		
	}
	
	public function benefit2()	{
		$data = array();
		//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('aboutus');

		/* SEO : Meta data : Start */
		//$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_title');
		//$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_description');
		//$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('aboutus','meta_key');
		/* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/partners/benefit',$data);	
		$this->load->view('front/include/footer',$data);		
	}
	
	public function ajaxContact(){
	    $responseArr = array();
	    
	    $post_data = $this->input->post();
		if(!empty($post_data))
		{
			$business_name 	 = !empty($post_data['business_name'])?$post_data['business_name']:'';
			$type_of_business 	 = !empty($post_data['type_of_business'])?$post_data['type_of_business']:'';
			$contact_person 	 = !empty($post_data['contact_person'])?$post_data['contact_person']:'';
			$mobile_number 	 = !empty($post_data['mobile_number'])?$post_data['mobile_number']:'';
			$email 	 = !empty($post_data['email_id'])?$post_data['email_id']:'';
			$message = !empty($post_data['message'])?$post_data['message']:'';

			$email_template  = 'partner-contact-notification.html';
	        $templateTags =  array(
	            '{{name}}'=>$name,
	            '{{email}}'=>$email,
	            '{{signature}}' => getEmailSignature(),
	            '{{disclaimer}}' => getEmailDisclaimer()
	        );
	        $message_content = email_compose($email_template,$templateTags);
	        send_email($email,'Partner Enquiery notification',$message_content);

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

	        $responseArr = array('type'=>'success','message'=>'Message has been sent successfully !!');
		}
		else
		{
			$responseArr = array('type'=>'error','message'=>'Data missing !!');
		}
	    
	    
	    echo json_encode($responseArr); die;
	}
}