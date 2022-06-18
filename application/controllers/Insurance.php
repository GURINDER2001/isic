<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {
	
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
        $this->load->library('paypal_lib');
        //$this->load->model('services_model');
        $this->load->model('sectionsettings_model');
    }


    public $tbl_name ='true_services';
    public $tbl_payment ='true_payments';

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
		$this->load->view('front/insurance/index',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function detail($slug){
	    
	    $data = array();
	    
	    if(!empty($_POST))
	    {
	        $postDataArr = '{
                "Userid": "varun.sharma@isic.co.in",
                "Password": "123456",
                "TravelType": "Domestic",
                "GeoLocation": "Delhi",
                "DOB": "16/08/1989",
                "TravelStartDate": "02/08/2021",
                "TravelEndDate": "05/08/2021"
            }';
    		$resultResponse = callTravelsAPI('/GetPlan',$postDataArr);
    		$resultResponse = json_decode($resultResponse);
    		//pre($resultResponse);
    		$data['ResponseCode'] = $resultResponse->ResponseCode;
    		$data['ResponseMsg'] = $resultResponse->ResponseMsg;
    		if(!empty($resultResponse->ResponseCode) && $resultResponse->ResponseCode == 200)
    		{
    		    if(!empty($resultResponse->ResponseData))
    		    {
    		        $data['ResponseData'] = $resultResponse->ResponseData;
    		    }
    		}
	    }
		$dataCollection = $this->master_model->get_recordArr('tbl_insurances',array('slug'=>$slug));
		//pre($dataCollection);
		$data['pageContent']	=	$dataCollection;
		if(!empty($dataCollection))
		{
			/* SEO : Meta data : Start */
			$data['meta_title'] = !empty($dataCollection['meta_title'])?$dataCollection['meta_title']:$dataCollection['name'];
			$data['meta_description'] = !empty($dataCollection['meta_description'])?$dataCollection['meta_description']:'';
			$data['meta_key'] = !empty($dataCollection['meta_key'])?$dataCollection['meta_key']:'';
			/* SEO : Meta data : End */			
		}
		
		$this->load->view('front/include/header',$data);
		if(!empty($dataCollection['layout']))
		{
		    $this->load->view('front/insurance/stripe-layout',$data);	
		}
		else
		{
		    $this->load->view('front/insurance/standard-layout',$data);	
		}
			
		$this->load->view('front/include/footer');	
	}
	
	public function medical12()
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
		$this->load->view('front/insurance/medical',$data);		
		$this->load->view('front/include/footer');		
	}
	
	
	public function travel12()
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
		$this->load->view('front/insurance/travel',$data);		
		$this->load->view('front/include/footer');		
	}

}