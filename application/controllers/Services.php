<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller {
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
        $this->load->model('services_model');
        $this->load->model('sectionsettings_model');
    }


    public $tbl_name ='true_services';
    public $tbl_payment ='true_payments';

    public function index()
    {
    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('services');

        /* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_key');
        /* SEO : Meta data : End */

    	$data['records'] = getDataCollection($this->tbl_name);    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/services/index',$data);		
		$this->load->view('front/include/footer');		
	}

	public function detail($slug)
    {
    	$data = array();
        $data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('services');
    	$dataCollection = $this->services_model->getSinglePageDataCollection($slug);
        $data['record'] = $dataCollection;

        /* SEO : Meta data : Start */
        $data['meta_title'] = !empty($dataCollection->meta_title)?$dataCollection->meta_title:$dataCollection->name;
        $data['meta_description'] = $dataCollection->meta_description;
        $data['meta_key'] = $dataCollection->meta_key;
        /* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/services/detail',$data);		
		$this->load->view('front/include/footer');		
	}

	public function pay($slug)
    {
    	$record	= $this->services_model->getSinglePageDataCollection($slug);
    	if(!empty($this->session->userdata('login_data')) && !empty($record))
    	{
    		$login_data = $this->session->userdata('login_data');
    		$user_id = $login_data['user_id'];
    		$data = array(
		            'item_type' => 'services',
		            'user_id' => $login_data['user_id'],
                    'user_name' => $login_data['user_name'],
                    'user_email' => $login_data['user_email'],
		            'item_id' => $record->id,
                    'item_name' => $record->name,
		            'amount' => $record->charges,
		            'currency'=>'USD',
		            'status' => 'Pending',
		            'payment_mode'=>'paypal'
	        	);
	        $payment_id = $this->services_model->setInsertData($this->tbl_payment,$data);
	        if($payment_id > 0)
        	{
        		// Set variables for paypal form
    			$returnURL = base_url().'care-healthfully-pro/success';
   				$cancelURL = base_url().'care-healthfully-pro/cancel';
    			$notifyURL = base_url().'care-healthfully-pro/ipn';

	    		// Add fields to paypal form
		        $this->paypal_lib->add_field('return', $returnURL);
		        $this->paypal_lib->add_field('cancel_return', $cancelURL);
		        $this->paypal_lib->add_field('notify_url', $notifyURL);
		        $this->paypal_lib->add_field('item_number',  $payment_id);
		        $this->paypal_lib->add_field('item_name', 'Care Healthfully Pro : '.$record->name);
		        $this->paypal_lib->add_field('amount',  $record->charges);
		        $this->paypal_lib->add_field('custom', 'chp_'.$payment_id.'_'.$user_id);

		        // Render paypal form
		        $this->paypal_lib->paypal_auto_form();
        	}
    	}
	}

	function success(){
        // Get the transaction data
        $paypalInfo = $this->input->post();
        //echo "<pre>"; print_r($paypalInfo); echo "</pre>";
        $data['item_number']    = $paypalInfo['item_number'];
        $data['item_name']      = $paypalInfo['item_name'];        
        $data['txn_id']         = $paypalInfo["txn_id"];
        $data['payment_amt']    = $paypalInfo["payment_gross"];
        $data['status']         = $paypalInfo["payment_status"];
        
        $data = array(
		            'txn_id' => $paypalInfo["txn_id"],
		            'payer_email' => $paypalInfo["payer_email"],
		            'status' => $paypalInfo["payment_status"]
	        	);
        $this->services_model->setUpdateData($this->tbl_payment,$data,$paypalInfo['item_number']);

        // Pass the transaction data to view        
        $this->load->view('front/include/header');      
        $this->load->view('front/services/success', $data);     
        $this->load->view('front/include/footer');
    }
     
    function cancel(){
        // Load payment failed view        
        $this->load->view('front/include/header');      
        $this->load->view('front/services/cancel');        
        $this->load->view('front/include/footer');
    }

    function ipn(){
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck)
            {
                $data = array(
		            'txn_id' => $paypalInfo["txn_id"],
		            'payer_email' => $paypalInfo["payer_email"],
		            'status' => $paypalInfo["payment_status"]
	        	);
        		$this->services_model->setUpdateData($this->tbl_payment,$data,$paypalInfo['item_number']);
            }
        }
    }
}