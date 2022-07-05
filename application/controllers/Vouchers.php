<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouchers extends CI_Controller {
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
    }


    public $tbl_name ='tbl_vouchers';

    public function index()
    {
		
	}
	
	public function details($slug)
    {
    	$data = array();
    	
    	$data['slug'] = $slug;
    	
    	$data['record'] = $dataCollection = get_record($this->tbl_name,array('slug'=>$slug));
    	$voucherCodes = !empty($dataCollection->voucher)?explode(",",$dataCollection->voucher):array();
    	shuffle($voucherCodes);
        if(isLoggedIn())
        {
            $currentLoggedInUser = getCurrentUser();
            if(!empty(getSerialNo()))
            {
                $currentVoucherCode = !empty($voucherCodes[0])?$voucherCodes[0]:'';
                
                $data['info']['error'] = 0;
                $data['info']['voucher'] = $currentVoucherCode;
                $data['info']['title'] = $dataCollection->name;
                $data['info']['description'] = $dataCollection->description;
                
                $whereConsArr = array('voucher_id'=>$dataCollection->id,'voucher'=>$currentVoucherCode,'viewer_id'=>$currentLoggedInUser->user_id_api);
                
                if(isExist('vouchers_logs',$whereConsArr))
                {
                    $voucherLog = get_record('vouchers_logs',$whereConsArr);
                    
                    $voucherLogId = $voucherLog->id;
                    $voucherCount = !empty($voucherLog->viewCount)?$voucherLog->viewCount:0;
                    
                    $newVoucherCount = $voucherCount + 1;
                    
                    setUpdateData('vouchers_logs',array('viewCount'=>$newVoucherCount),$voucherLogId);
                }
                else
                {
                    $dataArr = array('voucher_id'=>$dataCollection->id,'voucher'=>$currentVoucherCode,'viewer_id'=>$currentLoggedInUser->user_id_api,'viewCount'=>1);
                    setInsertData('vouchers_logs',$dataArr);
                }
            }
            else
            {
                 $data['info']['error'] = 1;
                 $data['info']['message'] = 'Voucher is only available for authorized card holder.';
            }
        }
        else
        {
            $data['info']['error'] = 1;
            $data['info']['message'] = 'You need to login first to see the voucher code.';
        }
        
        /* SEO : Meta data : Start */
        $data['meta_title'] = !empty($dataCollection->meta_title)?$dataCollection->meta_title:$dataCollection->name;
        $data['meta_description'] = $dataCollection->meta_description;
        $data['meta_key'] = $dataCollection->meta_key;
        /* SEO : Meta data : End */
        //pre($data);
    	//die;
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/vouchers/details',$data);		
		$this->load->view('front/include/footer');		
	}

}