<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Projects extends CI_Controller {
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
        $this->load->model('projects_model');
        $this->load->model('sectionsettings_model');
    }


    public $tbl_name ='true_projects';
    public $tbl_payment ='true_payments';

    public function index()
    {
    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('projects');

        /* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('projects','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('projects','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('projects','meta_key');
        /* SEO : Meta data : End */

    	$data['records'] = getDataRecords($this->tbl_name,array('status'=>1));

        //echo "<pre>"; print_r($data['records']); echo "</pre>";
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/projects/index',$data);		
		$this->load->view('front/include/footer');		
	}

	public function detail($slug)
    {
    	$data = array();
        $dataCollection = $this->projects_model->getSinglePageDataCollection($slug); 
    	$data['record']	= $dataCollection;

        /* SEO : Meta data : Start */
        $project_title = !empty($dataCollection->name)?$dataCollection->name:'';
        $data['meta_title'] = !empty($dataCollection->meta_title)?$dataCollection->meta_title:$project_title;
        $data['meta_description'] = !empty($dataCollection->meta_description)?$dataCollection->meta_description:'';
        $data['meta_key'] = !empty($dataCollection->meta_key)?$dataCollection->meta_key:'';
        /* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/projects/detail',$data);		
		$this->load->view('front/include/footer');		
	}

	public function pay($slug)
    {
    	$record	= $this->projects_model->getSinglePageDataCollection($slug);
    	if(!empty($this->session->userdata('login_data')) && !empty($record))
    	{
    		$login_data = $this->session->userdata('login_data');
    		$user_id = $login_data['user_id'];
    		$data = array(
		            'item_type' => 'projects',
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
	        $payment_id = $this->projects_model->setInsertData($this->tbl_payment,$data);
	        if($payment_id > 0)
        	{
        		// Set variables for paypal form
    			$returnURL = base_url().'projects/success';
   				$cancelURL = base_url().'projects/cancel';
    			$notifyURL = base_url().'projects/ipn';

	    		// Add fields to paypal form
		        $this->paypal_lib->add_field('return', $returnURL);
		        $this->paypal_lib->add_field('cancel_return', $cancelURL);
		        $this->paypal_lib->add_field('notify_url', $notifyURL);
		        $this->paypal_lib->add_field('item_number',  $payment_id);
		        $this->paypal_lib->add_field('item_name', 'Project : '.$record->name);
		        $this->paypal_lib->add_field('amount',  $record->charges);
		        $this->paypal_lib->add_field('custom', 'project_'.$payment_id.'_'.$user_id);

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
        $this->projects_model->setUpdateData($this->tbl_payment,$data,$paypalInfo['item_number']);

        // Pass the transaction data to view        
        $this->load->view('front/include/header');      
        $this->load->view('front/projects/success', $data);     
        $this->load->view('front/include/footer');
    }
     
    function cancel(){
        // Load payment failed view        
        $this->load->view('front/include/header');      
        $this->load->view('front/projects/cancel');        
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
        		$this->projects_model->setUpdateData($this->tbl_payment,$data,$paypalInfo['item_number']);
            }
        }
    }
}