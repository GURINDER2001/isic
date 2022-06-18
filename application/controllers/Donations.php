<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Donations extends CI_Controller {
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
        $this->load->model('donations_model');
        $this->load->model('sectionsettings_model');
    }


    public $tbl_name ='true_donations';

    public function index()
    {
    	$amount = 0;
		$data = array();
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('donations');
		
		/* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('donations','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('donations','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('donations','meta_key');
        /* SEO : Meta data : End */

		$post_data = $this->input->post();
	    if(!empty($post_data))
	    { 
	    	$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
	    	$this->form_validation->set_rules('fixamount', 'donation amount', 'trim|required');
	    	
	    	if(!empty($post_data['fixamount']) && $post_data['fixamount']=='other')
	    	{
	    		$this->form_validation->set_rules('amount', 'amount amount', 'trim|required');
	    	}
	    	if($this->form_validation->run() != FALSE)
		    {
		    	if(!empty($post_data['fixamount']) && $post_data['fixamount']=='other')
	    		{
	    			$amount = !empty($post_data['amount'])?$post_data['amount']:10;
	    		}
	    		elseif(!empty($post_data['fixamount']))
	    		{
	    			$amount = $post_data['fixamount'];
	    		}
	    		else
	    		{
	    			$amount = 10;
	    		}
	    		$support = !empty($post_data['support'])?base64_encode($post_data['support']):'';
	    		redirect(base_url('donation/donor').'?amt='.$amount.'&s='.$support);
		    }	    	
	    }

    	$this->load->view('front/include/header',$data);		
		$this->load->view('front/donate/index',$data);		
		$this->load->view('front/include/footer');	
    }

    public function donor()
    {   
    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('donations');
		$data['amt'] = $this->input->get('amt');
		$data['s'] = $this->input->get('s');
    	$post_data = $this->input->post();    			
	    if(!empty($post_data))
	    { 
		    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		    $this->form_validation->set_rules('support', 'support', 'trim|required');
		    $this->form_validation->set_rules('donor_fname', 'first name', 'required');
		    $this->form_validation->set_rules('donor_lname', 'last name', 'required');
		    $this->form_validation->set_rules('donor_email', 'email-Id', 'trim|required|valid_email');
		    $this->form_validation->set_rules('donor_country', 'country', 'required');
		    $this->form_validation->set_rules('donor_contact', 'contact', 'required|regex_match[/^[0-9]{10}$/]');
		    $this->form_validation->set_rules('donor_state', 'state', 'required');
		    $this->form_validation->set_rules('donor_address', 'address', 'required');
		    $this->form_validation->set_rules('amount', 'amount', 'trim|required');

		    if($this->form_validation->run() != FALSE)
		    { 
		    	$data = array(
		    		'support' => $this->input->post("support"),
		            'first_name' => $this->input->post("donor_fname"),
		            'last_name' => $this->input->post("donor_lname"),
		            'email' => $this->input->post("donor_email"),
		            'contact' => $this->input->post("donor_contact"),
		            'country' => $this->input->post("donor_country"),
		            'state' => $this->input->post("donor_state"),
		            'address' => $this->input->post("donor_address"),          
		            'amount' => $this->input->post("amount"),
		            'status' => 'Pending',
		            'payment_mode'=>'paypal'
	        	);
	        	$don_id = $this->donations_model->setInsertData($this->tbl_name,$data);			        	
	        	if($don_id > 0)
	        	{
	        		redirect(base_url('donation/payment').'?id='.$don_id);
	        	}
	        	else
	        	{
		    		$data['response'] = '<span class="text-danger">Oops: Something going wrong !!</span>';
	        	}
		  	}
		}
		$data['countries'] = getCountries();
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/donate/donor',$data);		
		$this->load->view('front/include/footer');		
	}

	public function payment()
    {
		$data = array();
		$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('donations');
		$id =$this->input->get('id');
		$record = $this->donations_model->getDataCollectionByID($this->tbl_name,$id);
		$data['credentials'] = $this->sectionsettings_model->getSectionDataCollection('credentials');
		// Set variables for paypal form
		$returnURL = base_url().'donations/success';
		$cancelURL = base_url().'donations/cancel';
		$notifyURL = base_url().'donations/ipn';

		if(!empty($record))
		{
			// Add fields to paypal form
	        $this->paypal_lib->add_field('return', $returnURL);
	        $this->paypal_lib->add_field('cancel_return', $cancelURL);
	        $this->paypal_lib->add_field('notify_url', $notifyURL);
	        $this->paypal_lib->add_field('item_number',  $record['id']);
	        $this->paypal_lib->add_field('item_name', 'Donation to GetHelthier');			        
	        $this->paypal_lib->add_field('amount',  $record['amount']);
	        $this->paypal_lib->add_field('custom', $record['id']);

	        // Render paypal form
	        $this->paypal_lib->paypal_auto_form();
		}
		$this->load->view('front/include/header');		
		$this->load->view('front/donate/payment',$data);		
		$this->load->view('front/include/footer');		
	}

	function success(){
        // Get the transaction data
        $paypalInfo = $this->input->post();
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
        $this->donations_model->setUpdateData($this->tbl_name,$data,$paypalInfo['custom']);
        $donationData = $this->donations_model->getDataCollectionByID($this->tbl_name,$paypalInfo['custom']);

        $support = !empty($donationData['support'])?$donationData['support']:'';
        $first_name = !empty($donationData['first_name'])?$donationData['first_name']:'';
        $last_name = !empty($donationData['last_name'])?$donationData['last_name']:'';
        $username = $first_name.' '.$last_name;
        $useremail = !empty($donationData['email'])?$donationData['email']:'';
        $amount = !empty($donationData['amount'])?$donationData['amount']:'';
        $country = !empty($donationData['country'])?$donationData['country']:'';
        $state = !empty($donationData['state'])?$donationData['state']:'';
        $address = !empty($donationData['address'])?$donationData['address']:'';
        $contact = !empty($donationData['contact'])?$donationData['contact']:'';
        
        $email_template  = 'donation_reciept.html';
        $email_template2  = 'new_donation.html';

        $templateTags =  array(
        '{{site_logo}}' => base_url().'assets/front/images/logo.png',
        '{{site_name}}'=>'Care Healthfully',
        '{{site_url}}'=> base_url(),
        '{{name}}'=>$username,
        '{{email}}'=>$useremail,
        '{{contact}}'=>$contact,
        '{{amount}}'=>$amount.'$',
        '{{country}}'=>getCountryName($country),
        '{{state}}'=>$state,
        '{{address}}'=>$address,
        '{{support}}'=>$support,
        '{{year}}'=>date('Y'),
        '{{team_name}}'=>'carehealthfully',
        '{{company_name}}' => 'Care Healthfully',
        '{{company_email}}' => 'info@carehealthfully.com',
        );

        $message = email_compose($email_template,$templateTags);
        send_email($useremail,'Donation Confirmation & Reciept !!',$message,'webmaster@markupdesigns.info','Care Healthfully');
        $message2 = email_compose($email_template2,$templateTags);
        $admin_email = getAdminEmail();
        send_email($admin_email,'New Donation Recieved !!',$message2,'webmaster@markupdesigns.info','Care Healthfully');

        // Pass the transaction data to view        
        $this->load->view('front/include/header');      
        $this->load->view('front/donate/success', $data);     
        $this->load->view('front/include/footer');
    }

    public function receipt() {
            $this->load->library('pdf');
            $data['page_title']='Donation Receipt';
            //$data['userDetails']=$this->front_model->getUserDetails($id);
           // $data['businessDetails']=$this->front_model->getServiesProviderBusinessDetailsByUserId($id);
            //$data['businessSettings']=getServiceProviderSettings($data['businessDetails']->id);
            $this->pdf->load_view('front/donate/receipt', $data);
    }
     
    function cancel(){
        // Load payment failed view        
        $this->load->view('front/include/header');      
        $this->load->view('front/donate/cancel');        
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
        		$this->donations_model->setUpdateData($this->tbl_name,$data,$paypalInfo['item_number']);    			

            }

        }
    }
}