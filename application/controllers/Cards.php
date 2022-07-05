 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cards extends CI_Controller {
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
        $this->load->library('ccavenue');
        //$this->load->model('cards_model');
        $this->load->model('sectionsettings_model');
    }


    public $tbl_name ='products';
    public $tbl_payment ='true_payments';
    public $tbl_order = 'tbl_orders';

    public function index()
    {
    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('product');

        /* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('product','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('product','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('product','meta_key');
        /* SEO : Meta data : End */

    	$data['records'] = get_records($this->tbl_name,array('status'=>1),'id','ASC');    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/index',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function selection()
    { 
        $aftoken = $this->input->get('aftoken');
        if(!empty($aftoken))
        {
            $this->session->set_userdata('aftoken',$aftoken);
        }
        
        CheckFrontLoginSession();
        $data=array();
        $userData = $this->session->userdata('login_data');
        $user_id = $userData['user_id'];
        $user = get_record('users',array('user_id_api'=>$user_id));
       //pre($userData);
        $access_token = !empty($userData['access_token'])?$userData['access_token']:$user->access_token;
        
        $aftoken = $this->session->userdata('aftoken');
        
        $affiliate_partner_id = 0;
        if(!empty($aftoken))
        {
           $token_string =  base64_decode($aftoken);
           list($affiliate_partner_id,$affiliate_partner_identity) = explode('-',$token_string);
           
        }
        $data['affiliate_id'] = !empty($affiliate_partner_id)?$affiliate_partner_id:'';
        $affiliateCardsArr = array();
        if(!empty($affiliate_partner_id))
        {
           $affiliateRec = get_record('tbl_affiliates',array('id'=>$affiliate_partner_id)); 
           $affiliatesCards = get_records('tbl_affiliates_cards',array('affiliate_id'=>$affiliate_partner_id));
           if(!empty($affiliatesCards))
           {
               foreach($affiliatesCards as $card)
               {
                   $affiliateCardsArr[$card->card_id] = $card->offer_price;
               }
           }
        }
        $data['affiliate_rec'] = !empty($affiliateRec)?$affiliateRec:array();
        $data['affiliate_cards'] = !empty($affiliateCardsArr)?$affiliateCardsArr:array();
        $header = array(
                    "Content-Type:application/json",
                    "Authorization: Bearer ".$access_token
                );
        $responseByApi = callAPI('/order/card','',$header);
        $responseObj = !empty($responseByApi)?json_decode($responseByApi):array();

        if(!empty($responseObj))
        {
            if(empty($responseObj->error))
            {
                if($responseObj->code == 200)
                {
                    $data['error'] = 0;
                    $data['delivery_charge'] = $responseObj->delivery_charge;
                    $data['records'] = $responseObj->data;
                    $this->session->set_userdata('delivery_charge',$responseObj->delivery_charge);
                    if(!empty($responseObj->data))
                    {
                        $cards = array();
                        foreach($responseObj->data as $index => $record)
                        {
                            $cards[$record->id] = $record;
                        }
                        $this->session->set_userdata('cards',$cards);
                    }
                }
            }
            else
            {
                $data['error'] = 1;
                $this->session->set_flashdata('notification',array('error'=>1,'message'=>$responseObj->error->message));
            }
        }
        else
        {
            $data['error'] = 1;
            $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Something going wrong, please try again.'));
        }
        //pre($responseByApi);
                
    	
    	//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('cards');

        /* SEO : Meta data : Start */
        //$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_title');
        //$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_description');
        //$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_key');
        /* SEO : Meta data : End */

    	//$data['records'] = getDataCollection($this->tbl_name);    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/selection',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function order_personal_details($id)
    {
        CheckFrontLoginSession();
        $data = array();
        $userData = $this->session->userdata('login_data');
        $user_id = $userData['user_id'];
        
        $user = get_recordArr('users',array('user_id_api'=>$user_id));
        $data['user'] = !empty($user)?$user:array();
        
        $aftoken = $this->session->userdata('aftoken');
        
        $affiliate_partner_id = 0;
        if(!empty($aftoken))
        {
           $token_string =  base64_decode($aftoken);
           list($affiliate_partner_id,$affiliate_partner_identity) = explode('-',$token_string);
           
        }
        $data['affiliate_id'] = !empty($affiliate_partner_id)?$affiliate_partner_id:'';
        if(!empty($affiliate_partner_id))
        {
           $affiliateRec = get_record('tbl_affiliates',array('id'=>$affiliate_partner_id));
        }
        $data['affiliate_rec'] = !empty($affiliateRec)?$affiliateRec:array();
        
        //pre($data);
        $postData = $this->input->post();
        if(!empty($postData))
        {
            $this->session->set_userdata('card_id',$id);
            $this->session->set_userdata('personal_data_img',$_FILES);
            $this->session->set_userdata('personal_data',$postData);
            
            redirect('cards/order/delivery');
        }
        
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/profile',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function order_services()
    {
        CheckFrontLoginSession();
        
        $userData = $this->session->userdata('login_data');
        $user_id = $userData['user_id'];
        $user = get_record('users',array('user_id_api'=>$user_id));
        $data=array();
        $postData = $this->input->post();
        //pre($postData);
        if(!empty($postData))
        {
            if(!empty($postData['plastic_card_charge']))
            {
                
                $this->session->set_userdata('plastic_card_charge',$postData['plastic_card_charge']);
            }
            else
            {
                $this->session->set_userdata('plastic_card_charge',0);
            }
            $this->session->set_userdata('delivery_option','Courier');
            redirect('cards/order/delivery');
        }
        
            	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/services',$data);		
		$this->load->view('front/include/footer');		
	}

	public function order_delivery()
    {
        CheckFrontLoginSession();
        $data=array();
        $userData = $this->session->userdata('login_data');
        $user_id = $userData['user_id'];
        $card_id = $this->session->userdata('card_id');
        $cards = $this->session->userdata('cards');
        $aftoken = $this->session->userdata('aftoken');
        
        $data['card_id'] = !empty($card_id)?$card_id:'';
        
        $affiliate_partner_id = 0;
        if(!empty($aftoken))
        {
           $token_string =  base64_decode($aftoken);
           list($affiliate_partner_id,$affiliate_partner_identity) = explode('-',$token_string);
        }
        $data['affiliate_id'] = $affiliate_id = !empty($affiliate_partner_id)?$affiliate_partner_id:'';
        
        $affiliateShippingArr = array();
        if(!empty($affiliate_partner_id))
        {
           $affiliateRec = get_record('tbl_affiliates',array('id'=>$affiliate_partner_id));
           $affiliatesShipping = get_records('tbl_affiliates_shippings',array('affiliate_id'=>$affiliate_partner_id));
           if(!empty($affiliatesShipping))
           {
               foreach($affiliatesShipping as $shipping)
               {
                   $affiliateShippingArr[$shipping->shipping_type] = $shipping->price;
               }
           }
        }
        $data['affiliate_rec'] = !empty($affiliateRec)?$affiliateRec:array();
        $data['affiliate_shipping'] = !empty($affiliateShippingArr)?$affiliateShippingArr:'';
        
        $affiliateCardsArr = array();
        if(!empty($affiliate_partner_id))
        {
           $affiliatesCards = get_records('tbl_affiliates_cards',array('affiliate_id'=>$affiliate_partner_id));
           if(!empty($affiliatesCards))
           {
               foreach($affiliatesCards as $card)
               {
                   $affiliateCardsArr[$card->card_id] = $card->offer_price;
               }
           }
        }
        $data['affiliate_cards'] = $affiliate_cards = !empty($affiliateCardsArr)?$affiliateCardsArr:'';
        
        if(!empty($affiliate_id) && !empty($affiliate_cards))
        {
            $price = $affiliate_cards[$card_id];
        }
        else
        {
            $price = $cards[$card_id]->price;
        }
        $user = get_record('users',array('user_id_api'=>$user_id));
        $postData = $this->input->post();
        //pre($postData);
        if(!empty($postData))
        {
            if(!empty($postData['delivery_option']))
            {
                
                $this->session->set_userdata('delivery_option',$postData['delivery_option']);
            }
            else
            {
                $this->session->set_userdata('delivery_option',0);
            }
            
            if(!empty($postData['promocode']))
            {
                $this->session->set_userdata('discount_promocode',$postData['promocode']);
                $userRow = get_record('users',array('status'=>1,'serial_no'=>$postData['promocode']));
                if(!empty($userRow))
                {
                    $this->session->set_userdata('discount_type','referral');
                    $percentage = 10;
                    if(!empty($userRow))
                    {
                        $discount = ($percentage / 100) * $price;
                    }
                    $this->session->set_userdata('discount_amount',$discount);
                }
                else
                {
                    $this->session->set_userdata('discount_type','coupon');
                    $couponRow = get_record('coupons',array('status'=>1,'coupon'=>$postData['promocode']));
                    if(!empty($couponRow))
                    {
                        if($couponRow->discount_type == 'percent')
                        {
                            $percentage = !empty($couponRow->discount_value)?$couponRow->discount_value:0;
                            $discount = ($percentage / 100) * $price;
                        }
                        else
                        {
                            $discount = !empty($couponRow->discount_value)?$couponRow->discount_value:0;
                        }
                    }
                    $this->session->set_userdata('discount_amount',$discount);
                }
                
            }
            else
            {
                $this->session->set_userdata('promocode','');
            }
        
            
            redirect('cards/order/payment');
        }
        
            	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/delivery',$data);		
		$this->load->view('front/include/footer');		
	}
	
	
	public function getAjaxSummary()
	{
	    $delivery_option = $this->input->post('delivery_option');
	    
	    if(!empty($delivery_option))
        {
            
            $this->session->set_userdata('delivery_option',$delivery_option);
        }
        else
        {
            $this->session->set_userdata('delivery_option',0);
        }
        
        $card_id = $this->session->userdata('card_id');
        $cards = $this->session->userdata('cards');
        $aftoken = $this->session->userdata('aftoken');
        
        $affiliate_partner_id = 0;
        if(!empty($aftoken))
        {
           $token_string =  base64_decode($aftoken);
           list($affiliate_partner_id,$affiliate_partner_identity) = explode('-',$token_string);
        }
        $affiliate_id = !empty($affiliate_partner_id)?$affiliate_partner_id:'';
        
        $affiliateShippingArr = array();
        if(!empty($affiliate_partner_id))
        {
           $affiliatesShipping = get_records('tbl_affiliates_shippings',array('affiliate_id'=>$affiliate_partner_id));
           if(!empty($affiliatesShipping))
           {
               foreach($affiliatesShipping as $shipping)
               {
                   $affiliateShippingArr[$shipping->shipping_type] = $shipping->price;
               }
           }
        }
        $affiliate_shipping = !empty($affiliateShippingArr)?$affiliateShippingArr:array();
        
        $affiliateCardsArr = array();
        if(!empty($affiliate_partner_id))
        {
           $affiliatesCards = get_records('tbl_affiliates_cards',array('affiliate_id'=>$affiliate_partner_id));
           if(!empty($affiliatesCards))
           {
               foreach($affiliatesCards as $card)
               {
                   $affiliateCardsArr[$card->card_id] = $card->offer_price;
               }
           }
        }
        $affiliate_cards = !empty($affiliateCardsArr)?$affiliateCardsArr:array();
        
        
        if(!empty($affiliate_id) && !empty($affiliate_cards))
        {
            $price = $affiliate_cards[$card_id];
        }
        else
        {
            $price = $cards[$card_id]->price;
        }
        $responseHtml = '<table class="table">
                            <tbody>
                                <tr>
                                    <td>ISIC Card</td>
                                    <td>₹ '.$price.'</td>
                                </tr>';
                                $plastic_card_charge = $this->session->userdata('plastic_card_charge');
                                if(!empty($plastic_card_charge))
                                {
                                    $responseHtml .= '<tr>
                                        <td>Plastic Card</td>
                                        <td>₹ '.$plastic_card_charge.'</td>
                                    </tr>';
                                }
                                
                                $deliveryCharge = !empty($delivery_option)?'₹'.$delivery_option:'for free';
                                $responseHtml .= '<tr>
                                    <td>Postage/Delivery Fee</td>
                                    <td>'.$deliveryCharge.'</td>
                                </tr>';
                                $total = $price + $delivery_option + $plastic_card_charge;
                                $responseHtml .= '<tr class="tab-c1">
                                    <td>Total Price Including VAT</td>
                                    <td>₹ '.$total.'</td>
                                </tr>
                            </tbody>
                    </table>';
	    echo $responseHtml;
	}
	
	public function ajaxApplyCoupon()
	{
	    $responseArr = array();
	    $delivery_option = $this->input->post('delivery_option');
	    $promocode = $this->input->post('promocode');
	    if(!empty($delivery_option))
        {
            
            $this->session->set_userdata('delivery_option',$delivery_option);
        }
        else
        {
            $this->session->set_userdata('delivery_option',0);
        }
        
        $card_id = $this->session->userdata('card_id');
        $cards = $this->session->userdata('cards');
        $aftoken = $this->session->userdata('aftoken');
        
        $affiliate_partner_id = 0;
        if(!empty($aftoken))
        {
           $token_string =  base64_decode($aftoken);
           list($affiliate_partner_id,$affiliate_partner_identity) = explode('-',$token_string);
        }
        $affiliate_id = !empty($affiliate_partner_id)?$affiliate_partner_id:'';
        
        $affiliateShippingArr = array();
        if(!empty($affiliate_partner_id))
        {
           $affiliatesShipping = get_records('tbl_affiliates_shippings',array('affiliate_id'=>$affiliate_partner_id));
           if(!empty($affiliatesShipping))
           {
               foreach($affiliatesShipping as $shipping)
               {
                   $affiliateShippingArr[$shipping->shipping_type] = $shipping->price;
               }
           }
        }
        $affiliate_shipping = !empty($affiliateShippingArr)?$affiliateShippingArr:array();
        
        $affiliateCardsArr = array();
        if(!empty($affiliate_partner_id))
        {
           $affiliatesCards = get_records('tbl_affiliates_cards',array('affiliate_id'=>$affiliate_partner_id));
           if(!empty($affiliatesCards))
           {
               foreach($affiliatesCards as $card)
               {
                   $affiliateCardsArr[$card->card_id] = $card->offer_price;
               }
           }
        }
        $affiliate_cards = !empty($affiliateCardsArr)?$affiliateCardsArr:array();
        
        
        if(!empty($affiliate_id) && !empty($affiliate_cards))
        {
            $price = $affiliate_cards[$card_id];
        }
        else
        {
            $price = $cards[$card_id]->price;
        }
        $responseHtml = '<table class="table">
                            <tbody>
                                <tr>
                                    <td>Virtual ISIC card</td>
                                    <td>₹ '.$price.'</td>
                                </tr>';
                                $plastic_card_charge = $this->session->userdata('plastic_card_charge');
                                if(!empty($plastic_card_charge))
                                {
                                    $responseHtml .= '<tr>
                                        <td>Plastic card to virtual card</td>
                                        <td>₹ '.$plastic_card_charge.'</td>
                                    </tr>';
                                }
                                
                                $deliveryCharge = !empty($delivery_option)?'₹'.$delivery_option:'for free';
                                $responseHtml .= '<tr>
                                    <td>Postage/Delivery Fee</td>
                                    <td>'.$deliveryCharge.'</td>
                                </tr>';
        if(!empty($promocode))
        {
            $userRow = get_record('users',array('status'=>1,'serial_no'=>$promocode));
            $percentage = 10;
            if(!empty($userRow))
            {
                $discount = ($percentage / 100) * $price;
            }
            $responseArr = array('error'=>0,'message'=>'Discount applied successfully !!');
        }
        else
        {
            $responseArr = array('error'=>1,'message'=>'Invalid Promocode / Referral Code');
        }
        
        if(!empty($discount))
        {
            $responseHtml .= '<tr>
                <td>Discount</td>
                <td>₹ '.$discount.'</td>
            </tr>';
        }
        
        $total = ($price - $discount) + $delivery_option + $plastic_card_charge;
        $responseHtml .= '<tr class="tab-c1">
                        <td>Total Price Including VAT</td>
                        <td>₹ '.$total.'</td>
                    </tr>
                </tbody>
        </table>';
        $responseArr['summaryHtml'] = $responseHtml;
	    echo json_encode($responseArr);
	}
	
	public function order_review()
    {
        CheckFrontLoginSession();
        
        $userData = $this->session->userdata('login_data');
        $user_id = $userData['user_id'];
        $user = get_record('users',array('user_id_api'=>$user_id));
        $data=array();
        $postData = $this->input->post();
        //pre($postData);
        if(!empty($postData))
        {
            /*if(!empty($postData['plastic_card_charge']))
            {
                
                $this->session->set_userdata('plastic_card_charge',$postData['plastic_card_charge']);
            }
            else
            {
                $this->session->set_userdata('plastic_card_charge',0);
            }*/
            
            redirect('cards/order/pay');
        }
        
            	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/review',$data);		
		$this->load->view('front/include/footer');		
	}
		
	
	public function order_payment()
    {
        CheckFrontLoginSession();
        $data = array();
        $card_id = $this->session->userdata('card_id');
        $cards = $this->session->userdata('cards');
        $aftoken = $this->session->userdata('aftoken');
        $affiliate_partner_id = 0;
        if(!empty($aftoken))
        {
           $token_string =  base64_decode($aftoken);
           list($affiliate_partner_id,$affiliate_partner_identity) = explode('-',$token_string);
        }
        $affiliate_id = !empty($affiliate_partner_id)?$affiliate_partner_id:'';
        $data['affiliate_id'] = $affiliate_id = !empty($affiliate_partner_id)?$affiliate_partner_id:'';
        $affiliateShippingArr = array();
        if(!empty($affiliate_partner_id))
        {
           $affiliatesShipping = get_records('tbl_affiliates_shippings',array('affiliate_id'=>$affiliate_partner_id));
           if(!empty($affiliatesShipping))
           {
               foreach($affiliatesShipping as $shipping)
               {
                   $affiliateShippingArr[$shipping->shipping_type] = $shipping->price;
               }
           }
        }
        $affiliate_shipping = !empty($affiliateShippingArr)?$affiliateShippingArr:'';
        
        $affiliateCardsArr = array();
        if(!empty($affiliate_partner_id))
        {
           $affiliateRec = get_record('tbl_affiliates',array('id'=>$affiliate_partner_id));
           $affiliatesCards = get_records('tbl_affiliates_cards',array('affiliate_id'=>$affiliate_partner_id));
           if(!empty($affiliatesCards))
           {
               foreach($affiliatesCards as $card)
               {
                   $affiliateCardsArr[$card->card_id] = $card->offer_price;
               }
           }
        }
        $affiliate_cards = !empty($affiliateCardsArr)?$affiliateCardsArr:'';
        $data['affiliate_rec'] = !empty($affiliateRec)?$affiliateRec:array();
        $data['affiliate_cards'] = $affiliate_cards = !empty($affiliateCardsArr)?$affiliateCardsArr:'';
        
        if(!empty($affiliate_id) && !empty($affiliate_cards))
        {
            $price = $affiliate_cards[$card_id];
        }
        else
        {
            $price = $cards[$card_id]->price;
        }
        $sessionData = $this->session->userdata();
        //pre($sessionData); 
        $postData = $this->input->post();
        if(!empty($postData))
        {
            $dob = !empty($sessionData['personal_data']['dob'])?$sessionData['personal_data']['dob']['date'].'-'.$sessionData['personal_data']['dob']['month'].'-'.$sessionData['personal_data']['dob']['year']:'';
            $first_name = !empty($sessionData['personal_data']['fname'])?$sessionData['personal_data']['fname']:'';
            $last_name = !empty($sessionData['personal_data']['lname'])?$sessionData['personal_data']['lname']:'';
            $email = !empty($sessionData['personal_data']['email'])?$sessionData['personal_data']['email']:'';
            $mobile_number = !empty($sessionData['personal_data']['phone'])?$sessionData['personal_data']['phone']:'';
            $gender = !empty($sessionData['personal_data']['gender'])?$sessionData['personal_data']['gender']:'';
            $institution_name = !empty($sessionData['personal_data']['institution'])?$sessionData['personal_data']['institution']:'';
            
            $data2db['user_id'] = !empty($sessionData['login_data']['user_id'])?$sessionData['login_data']['user_id']:0;
            $data2db['api_user_id'] = !empty($sessionData['login_data']['user_id'])?$sessionData['login_data']['user_id']:0;
            
            $data2db['user_fname'] = $first_name;
            $data2db['user_lname'] = $last_name;
            $data2db['user_dob'] = $dob;
            $data2db['user_photo'] = '';
            if(!empty($sessionData['personal_data_img']['photo']))
            {
                $photo = $sessionData['personal_data_img']['photo'];
                if (!empty($photo["name"]))
                {
                    $profile_img = do_upload('profilepic','photo');
                    $data2db['user_photo'] = $profile_img;
                }
            }        
            
            $data2db['user_gender'] = $gender;
            $data2db['user_institution'] = $institution_name;
            $data2db['user_email'] = $email;
            $data2db['user_phone'] = $mobile_number;
            
            $cardId = !empty($sessionData['card_id'])?$sessionData['card_id']:0;
            
            $data2db['card_id'] = $cardId;
            $data2db['card_name'] = !empty($sessionData['cards'][$cardId]->card_title)?$sessionData['cards'][$cardId]->card_title:'';
            $data2db['card_type'] = !empty($sessionData['cards'][$cardId]->card_type)?$sessionData['cards'][$cardId]->card_type:'';
            $data2db['card_image_url'] = !empty($sessionData['cards'][$cardId]->image_url)?$sessionData['cards'][$cardId]->image_url:'';
          
            if(!empty($affiliate_id) && !empty($affiliate_cards))
            {
                $card_price = $affiliate_cards[$cardId];
            }
            else
            {
                $card_price = !empty($sessionData['cards'][$cardId]->price)?$sessionData['cards'][$cardId]->price:'';
            }
            
            $data2db['card_price'] = $card_price;
            $data2db['card_currency'] = !empty($sessionData['cards'][$cardId]->currency)?$sessionData['cards'][$cardId]->currency:'';
            $data2db['card_min_age'] = !empty($sessionData['cards'][$cardId]->min_age)?$sessionData['cards'][$cardId]->min_age:'';
            $data2db['card_max_age'] = !empty($sessionData['cards'][$cardId]->max_age)?$sessionData['cards'][$cardId]->max_age:'';
            $data2db['card_valid_from'] = !empty($sessionData['cards'][$cardId]->valid_from)?$sessionData['cards'][$cardId]->valid_from:'';
            $data2db['card_valid_to'] = !empty($sessionData['cards'][$cardId]->valid_to)?$sessionData['cards'][$cardId]->valid_to:'';
            
            $data2db['card_delivery_type'] = !empty($sessionData['delivery_option'])?'courier':'pickup';
            $data2db['card_delivery_fee'] = $delivery_option = !empty($sessionData['delivery_option'])?$sessionData['delivery_option']:0;
            $data2db['card_plastic'] = !empty($sessionData['plastic_card_charge'])?1:0;
            $data2db['card_plastic_charge'] = $plastic_card_charge = !empty($sessionData['plastic_card_charge'])?$sessionData['plastic_card_charge']:0;
            
            $discount_amount = 0;
            if(!empty($sessionData['discount_amount']))
            {
                $data2db['discount_type'] = $discount_type = !empty($sessionData['discount_type'])?$sessionData['discount_type']:'';
                $data2db['discount_promocode'] = $discount_promocode = !empty($sessionData['discount_promocode'])?$sessionData['discount_promocode']:'';
                $data2db['discount_amount'] = $discount_amount = !empty($sessionData['discount_amount'])?$sessionData['discount_amount']:0; 
            }
            
            $total_price = ($card_price - $discount_amount) + $delivery_option;// + $plastic_card_charge;
            
            $data2db['total_order_amount'] = !empty($total_price)?$total_price:0;
            $data2db['affiliate'] = !empty($affiliate_id)?$affiliate_id:0;
            $data2db['payment_status'] = 'Pending';
            $data2db['order_status'] = 'Pending';
            
            
            //pre($data2db); die;
            $db_order_id = setInsertData($this->tbl_order, $data2db);
            if ($db_order_id > 0)
            {
                $address1 = 'A - 0';
                $address2 = 'Sector 63';
                $city = 'Noida';
                $state = 'Uttar Pradesh';
                $zip_code = '201301';
                $country = 'IN';
                
                $postPkt = '{
                    "delivery_method":"PICK_UP",
                	"request_type" : "NEW_CARD",
                	"first_name" : "'.$first_name.'",
                	"last_name": "'.$last_name.'",
                	"email" : "'.$email.'",
                	"mobile_number":"'.$mobile_number.'",
                	"card_type":"ISIC",
                	"type" : "physical",
                	"date_of_birth": "'.$dob.'",
                	"gender" : "'.$gender.'",
                	"institution_name": "'.$institution_name.'",
                	"address1":"'.$address1.'",
                	"address2":"'.$address2.'",
                	"city" : "'.$city.'",
                	"state" : "'.$state.'",
                	"zip_code": "'.$zip_code.'",
                	"country" : "'.$country.'"
             }';
                
                $access_token = !empty($sessionData['login_data']['access_token'])?$sessionData['login_data']['access_token']:'';
                $header = array(
                            "Content-Type:application/json",
                            "Authorization: Bearer ".$access_token
                        );
                 
                 
                //pre($postPkt); 
                //pre($header); 
                
                $responseByApi = callAPI('/order/create',$postPkt,$header);
                $responseObj = !empty($responseByApi)?json_decode($responseByApi):array();
                //pre($responseObj); die;
                $data = array();
                if(!empty($responseObj))
                {
                    if(empty($responseObj->error))
                    {
                        if($responseObj->code == 200)
                        {
                            $data['error'] = 0;
                            //pre($responseObj->data); die;
                            $this->session->set_userdata('order_response',$responseObj->data);
                            $order_id = $responseObj->data->order_id;
                            setUpdateData($this->tbl_order, array('api_order_id_enc'=>$order_id), $db_order_id);
                            $encCodeResponse = $this->getEncCode($order_id,$access_token);
                            //pre($encCodeResponse); die;
                            if(empty($encCodeResponse->error) && $encCodeResponse->code == 200)
                            {
                        		/*$this->load->library('ccavenue');
                        		$merchant_data='2';
                        		$encrypted_data = $encCodeResponse->key;
                        		$working_key='6165264D423D942805965ADE31184BB2';
                        		$access_code = 'AVMN85GE59CE88NMEC';
                        		$postdata['tid'] = time();
                        		$postdata['merchant_id'] = '220241';
                        		$postdata['order_id'] = $db_order_id;
                        		$postdata['amount'] = $total_price;
                        		$postdata['currency'] = 'INR';
                        		$postdata['redirect_url'] = base_url('cards/paymentResponse');//'https://isicstaging.cloudzmall.com/payment/responseHandler';
                        		$postdata['cancel_url'] = base_url('cards/paymentResponse'); //'https://isicstaging.cloudzmall.com/payment/responseHandler';
                        		$postdata['language'] = 'EN';
                        		
                        		foreach ($postdata as $key => $value){
                            		$merchant_data.=$key.'='.$value.'&';
                            	}
                            	
                            	$encrypted_data=$this->ccavenue->encrypt($merchant_data,$working_key);*/
                            	
                            	unset($sessionData['cards']);
                            	unset($sessionData['personal_data_img']);
                            	unset($sessionData['personal_data']);
                            	unset($sessionData['delivery_option']);
                            	unset($sessionData['plastic_card_charge']);
                                
                                $this->load->library('ccavenue');
                                $merchant_id = '220241';
                        		$rsa_key = $encCodeResponse->key;
                        		
                        		
                        		
                        		$postdata1['currency'] = 'INR';
                        		$postdata1['amount'] = 100;
                        		$postdata1['payment_option'] = 'OPTDBCRD';
                        		$merchantDataArr = array();
                        		foreach ($postdata1 as $key => $value)
                        		{
                        		    array_push($merchantDataArr,$key.'='.$value);
                            	}
                            	$merchant_data = implode("&",$merchantDataArr);
                        		//die;
                        		
                        		$working_key='6165264D423D942805965ADE31184BB2';
                        		$access_code = 'AVMN85GE59CE88NMEC';
                        		
                        		$encrypted_data = $this->ccavenue->encrypt($merchant_data,$working_key);
                        		
                            	echo '<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/initTrans">';
                                    echo '<input type="hidden" name="merchant_id" value="'.$merchant_id.'">';
                                    echo '<input type="hidden" name="access_code" value="'.$access_code.'">';
                                    
                                    //echo '<input type="hidden" name="redirect_url" value="https://isicstaging.cloudzmall.com/payment/responseHandler">';
                                    //echo '<input type="hidden" name="cancel_url" value="https://isicstaging.cloudzmall.com/payment/responseHandler">';
                                    
                                    echo '<input type="hidden" name="redirect_url" value="'.base_url('cards/paymentResponse').'">';
                                    echo '<input type="hidden" name="cancel_url" value="'.base_url('cards/paymentResponse').'">';
                                    
                                    echo '<input type="hidden" name="enc_val" value="'.$encrypted_data.'">';
                                    echo '<input type="hidden" name="order_id" value="'.$order_id.'">';
                                    
                                    //echo '<input type="hidden" name="amount" value="'.$total_price.'">';
                                    //echo '<input type="hidden" name="currency" value="INR">';
                                    
                                    //echo '<input type="hidden" name="payment_option" value="OPTDBCRD">';
                                    //echo '<input type="hidden" name="card_name" value="Axis">';
                                    
                                echo '</form>';
                                echo '<script language="javascript">document.redirect.submit();</script>';
                            }
                            else
                            {
                                $data['error'] = 1;
                                $this->session->set_flashdata('notification',array('error'=>1,'message'=>$encCodeResponse->error->message));
                            }
                        }
                    }
                    else
                    {
                        $data['error'] = 1;
                        $this->session->set_flashdata('notification',array('error'=>1,'message'=>$responseObj->error->message));
                    }
                }
                else
                {
                    $data['error'] = 1;
                    $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Something going wrong, please try again.'));
                }
            }
        }
        
        $user_id = $userData['user_id'];
        $user = get_record('users',array('user_id_api'=>$user_id));
        


    	//$data['records'] = getDataCollection($this->tbl_name);
    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/payment',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function order_payment123()
    {
        CheckFrontLoginSession();
        
        $sessionData = $this->session->userdata();
        //pre($sessionData); 
        $postData = $this->input->post();
        if(!empty($postData))
        {

            $dob = !empty($sessionData['personal_data']['dob'])?$sessionData['personal_data']['dob']['date'].'-'.$sessionData['personal_data']['dob']['month'].'-'.$sessionData['personal_data']['dob']['year']:'';
            $first_name = !empty($sessionData['personal_data']['fname'])?$sessionData['personal_data']['fname']:'';
            $last_name = !empty($sessionData['personal_data']['lname'])?$sessionData['personal_data']['lname']:'';
            $email = !empty($sessionData['personal_data']['email'])?$sessionData['personal_data']['email']:'';
            $mobile_number = !empty($sessionData['personal_data']['phone'])?$sessionData['personal_data']['phone']:'';
            $gender = !empty($sessionData['personal_data']['gender'])?$sessionData['personal_data']['gender']:'';
            $institution_name = !empty($sessionData['personal_data']['institution'])?$sessionData['personal_data']['institution']:'';
            
            
            $data2db['user_id'] = !empty($sessionData['login_data']['user_id'])?$sessionData['login_data']['user_id']:0;
            $data2db['api_user_id'] = !empty($sessionData['login_data']['user_id'])?$sessionData['login_data']['user_id']:0;
            
            $data2db['user_fname'] = $first_name;
            $data2db['user_lname'] = $last_name;
            $data2db['user_dob'] = $dob;
            $data2db['user_photo'] = '';
            if(!empty($sessionData['personal_data_img']['photo']))
            {
                $photo = $sessionData['personal_data_img']['photo'];
                if (!empty($photo["name"]))
                {
                    $profile_img      = do_upload('profilepic','photo');
                    $data2db['user_photo'] = $profile_img;
                }
            }        
            
            $data2db['user_gender'] = $gender;
            $data2db['user_institution'] = $institution_name;
            $data2db['user_email'] = $email;
            $data2db['user_phone'] = $mobile_number;
            
            $cardId = !empty($sessionData['card_id'])?$sessionData['card_id']:0;
            
            $data2db['card_id'] = $cardId;
            $data2db['card_name'] = !empty($sessionData['cards'][$cardId]->card_title)?$sessionData['cards'][$cardId]->card_title:'';
            $data2db['card_type'] = !empty($sessionData['cards'][$cardId]->card_type)?$sessionData['cards'][$cardId]->card_type:'';
            $data2db['card_image_url'] = !empty($sessionData['cards'][$cardId]->image_url)?$sessionData['cards'][$cardId]->image_url:'';
            $data2db['card_price'] = $card_price = !empty($sessionData['cards'][$cardId]->price)?$sessionData['cards'][$cardId]->price:'';
            $data2db['card_currency'] = !empty($sessionData['cards'][$cardId]->currency)?$sessionData['cards'][$cardId]->currency:'';
            $data2db['card_min_age'] = !empty($sessionData['cards'][$cardId]->min_age)?$sessionData['cards'][$cardId]->min_age:'';
            $data2db['card_max_age'] = !empty($sessionData['cards'][$cardId]->max_age)?$sessionData['cards'][$cardId]->max_age:'';
            $data2db['card_valid_from'] = !empty($sessionData['cards'][$cardId]->valid_from)?$sessionData['cards'][$cardId]->valid_from:'';
            $data2db['card_valid_to'] = !empty($sessionData['cards'][$cardId]->valid_to)?$sessionData['cards'][$cardId]->valid_to:'';
            
            
            $data2db['card_delivery_type'] = !empty($sessionData['delivery_option'])?'courier':'pickup';
            $data2db['card_delivery_fee'] = $delivery_option = !empty($sessionData['delivery_option'])?$sessionData['delivery_option']:0;
            $data2db['card_plastic'] = !empty($sessionData['plastic_card_charge'])?1:0;
            $data2db['card_plastic_charge'] = $plastic_card_charge = !empty($sessionData['plastic_card_charge'])?$sessionData['plastic_card_charge']:0;
            
            $total_price = $card_price + $delivery_option + $plastic_card_charge;
            
            $data2db['total_order_amount'] = !empty($total_price)?$total_price:0;
            $data2db['payment_status'] = 'Pending';
            $data2db['order_status'] = 'Pending';
            
            $db_order_id = setInsertData($this->tbl_order, $data2db);
            if ($db_order_id > 0)
            {
                $address1 = 'A - 0';
                $address2 = 'Sector 63';
                $city = 'Noida';
                $state = 'Uttar Pradesh';
                $zip_code = '201301';
                $country = 'IN';
                
                $postPkt = '{
                    "delivery_method":"PICK_UP",
                	"request_type" : "NEW_CARD",
                	"first_name" : "'.$first_name.'",
                	"last_name": "'.$last_name.'",
                	"email" : "'.$email.'",
                	"mobile_number":"'.$mobile_number.'",
                	"card_type":"ISIC",
                	"type" : "physical",
                	"date_of_birth": "'.$dob.'",
                	"gender" : "'.$gender.'",
                	"institution_name": "'.$institution_name.'",
                	"address1":"'.$address1.'",
                	"address2":"'.$address2.'",
                	"city" : "'.$city.'",
                	"state" : "'.$state.'",
                	"zip_code": "'.$zip_code.'",
                	"country" : "'.$country.'"
             }';
                
                $access_token = !empty($sessionData['login_data']['access_token'])?$sessionData['login_data']['access_token']:'';
                $header = array(
                            "Content-Type:application/json",
                            "Authorization: Bearer ".$access_token
                        );
                 
                 
                //pre($postPkt); 
                //pre($header); 
                
                $responseByApi = callAPI('/order/create',$postPkt,$header);
                $responseObj = !empty($responseByApi)?json_decode($responseByApi):array();
                //pre($responseObj);
                $data = array();
                if(!empty($responseObj))
                {
                    if(empty($responseObj->error))
                    {
                        if($responseObj->code == 200)
                        {
                            $data['error'] = 0;
                            //pre($responseObj->data); die;
                            $this->session->set_userdata('order_response',$responseObj->data);
                            $order_id = $responseObj->data->order_id;
                            setUpdateData($this->tbl_order, array('api_order_id_enc'=>$order_id), $db_order_id);
                            $encCodeResponse = $this->getEncCode($order_id,$access_token);
                            //pre($encCodeResponse);
                            if(empty($encCodeResponse->error) && $encCodeResponse->code == 200)
                            {
                        		$this->load->library('ccavenue');
                        		$merchant_data='2';
                        		$encrypted_data = $encCodeResponse->key;
                        		$working_key='6165264D423D942805965ADE31184BB2';
                        		$access_code = 'AVMN85GE59CE88NMEC';
                        		
                        		$postdata['tid'] = time();
                        		$postdata['merchant_id'] = '220241';
                        		$postdata['order_id'] = $order_id;
                        		$postdata['amount'] = $total_price;
                        		$postdata['currency'] = 'INR';
                        		$postdata['redirect_url'] = base_url('cards/paymentResponse');
                        		$postdata['cancel_url'] = base_url('cards/paymentResponse');
                        		//$postdata['redirect_url'] = 'https://isicstaging.cloudzmall.com/payment/responseHandler';
                        		//$postdata['cancel_url'] = 'https://isicstaging.cloudzmall.com/payment/responseHandler';
                        		$postdata['language'] = 'EN';
                        		
                        		foreach ($postdata as $key => $value){
                            		$merchant_data.=$key.'='.$value.'&';
                            	}
                            	
                            	$encrypted_data=$this->ccavenue->encrypt($merchant_data,$working_key);
                            	
                            	unset($sessionData['cards']);
                            	unset($sessionData['personal_data_img']);
                            	unset($sessionData['personal_data']);
                            	unset($sessionData['delivery_option']);
                            	unset($sessionData['plastic_card_charge']);
                            	
                            	/*echo '<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">';
                                echo '<input type="hidden" name="encRequest" value="'.$encrypted_data.'">';
                                echo '<input type="hidden" name="access_code" value="'.$access_code.'">';
                                echo '</form>';
                                echo '<script language="javascript">document.redirect.submit();</script>';*/
                                
                                
                                $merchant_id = '220241';
                        		//$encrypted_data = $encCodeResponse->key;
                        		$working_key='6165264D423D942805965ADE31184BB2';
                        		$access_code = 'AVMN85GE59CE88NMEC';
                        		
                            	/*echo '<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/initTrans">';
                                    echo '<input type="hidden" name="merchant_id" value="'.$merchant_id.'">';
                                    echo '<input type="hidden" name="access_code" value="'.$access_code.'">';
                                    
                                    echo '<input type="hidden" name="redirect_url" value="https://isicstaging.cloudzmall.com/payment/responseHandler">';
                                    echo '<input type="hidden" name="cancel_url" value="https://isicstaging.cloudzmall.com/payment/responseHandler">';
                                    
                                    echo '<input type="hidden" name="enc_val" value="'.$encrypted_data.'">';
                                    echo '<input type="hidden" name="order_id" value="'.$order_id.'">';
                                echo '</form>';*/
                                
                                echo '<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">';
                                    echo "<input type=hidden name=encRequest value=$encrypted_data>";
                                    echo "<input type=hidden name=access_code value=$access_code>";
                                echo '</form>';

                                echo '<script language="javascript">document.redirect.submit();</script>';
                            }
                            else
                            {
                                $data['error'] = 1;
                                $this->session->set_flashdata('notification',array('error'=>1,'message'=>$encCodeResponse->error->message));
                            }
                        }
                    }
                    else
                    {
                        $data['error'] = 1;
                        $this->session->set_flashdata('notification',array('error'=>1,'message'=>$responseObj->error->message));
                    }
                }
                else
                {
                    $data['error'] = 1;
                    $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Something going wrong, please try again.'));
                }
            }
        }
        
        $user_id = $userData['user_id'];
        $user = get_record('users',array('user_id_api'=>$user_id));
        
        $data = array();

    	//$data['records'] = getDataCollection($this->tbl_name);    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/payment',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function getEncCode($order_id,$access_token)
	{
	    $postPkt = '{ "order_id":"'.$order_id.'" }';
        $header = array(
                    "Content-Type:application/json",
                    "Authorization: Bearer ".$access_token
                );
        
        $responseByApi = callAPI('/payment/rsa',$postPkt,$header);
        
        //pre($responseByApi);
        
        $responseObj = !empty($responseByApi)?json_decode($responseByApi):array();
        return $responseObj;
	}
	
	public function paymentResponse()
	{
    	$workingKey='6165264D423D942805965ADE31184BB2';		//Working Key should be provided here.
    	
    	$postData = $this->input->post();
    	//pre($postData);
    	$encResponse = $_POST["encResp"];			//This is the response sent by the CCAvenue Server
    	$this->load->library('ccavenue');
    	$rcvdString = $this->ccavenue->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
    	pre($rcvdString);
    	$order_status="";
    	$decryptValues=explode('&', $rcvdString);
    	
    	
    	$dataSize=sizeof($decryptValues);
    	
    	for($i = 0; $i < $dataSize; $i++) 
    	{
    		$information=explode('=',$decryptValues[$i]);
    		if($i==3)	$order_status=$information[1];
    	}
        
        $response['status'] = $order_status;
        
    	if($order_status==="Success")
    	{
    		$response['message'] = "Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
    		
    	}
    	else if($order_status==="Aborted")
    	{
    		$response['message'] = "Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
    	
    	}
    	else if($order_status==="Failure")
    	{
    		$response['message'] = "Thank you for shopping with us.However,the transaction has been declined.";
    	}
    	else
    	{
    		$response['message'] = "Security Error. Illegal access detected";
    	
    	}
    
    	for($i = 0; $i < $dataSize; $i++) 
    	{
    		$information=explode('=',$decryptValues[$i]);
    		$response['info'][$information[0]] = $information[1];
    	}
    	
    	pre($response);
	}
	
	public function success()
    {
        CheckFrontLoginSession();
        
        $userData = $this->session->userdata('login_data');
        $user_id = $userData['user_id'];
        $user = get_record('users',array('user_id_api'=>$user_id));
        
        $access_token = $user->access_token;
        $token_type = $user->token_type;
  
        $header = array(
                    "Content-Type:application/json",
                    "Authorization: Bearer ".$access_token
                );
        $responseByApi = callAPI('/order/card','',$header);
        $responseObj = !empty($responseByApi)?json_decode($responseByApi):array();
        
        $data = array();
        if(!empty($responseObj))
        {
            if(empty($responseObj->error))
            {
                if($responseObj->code == 200)
                {
                    $data['error'] = 0;
                    $data['delivery_charge'] = $responseObj->delivery_charge;
                    $data['records'] = $responseObj->data;
                    $this->session->set_userdata('delivery_charge',$responseObj->delivery_charge);
                    
                }
            }
            else
            {
                $data['error'] = 1;
                $this->session->set_flashdata('notification',array('error'=>1,'message'=>$responseObj->error->message));
            }
        }
        else
        {
            $data['error'] = 1;
            $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Something going wrong, please try again.'));
        }
        //pre($responseByApi);
                
    	
    	//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('cards');

        /* SEO : Meta data : Start */
        //$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_title');
        //$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_description');
        //$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_key');
        /* SEO : Meta data : End */

    	//$data['records'] = getDataCollection($this->tbl_name);    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/selection',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function cancalled()
    {
        CheckFrontLoginSession();
        
        $userData = $this->session->userdata('login_data');
        $user_id = $userData['user_id'];
        $user = get_record('users',array('user_id_api'=>$user_id));
        
        $access_token = $user->access_token;
        $token_type = $user->token_type;
  
        $header = array(
                    "Content-Type:application/json",
                    "Authorization: Bearer ".$access_token
                );
        $responseByApi = callAPI('/order/card','',$header);
        $responseObj = !empty($responseByApi)?json_decode($responseByApi):array();
        
        $data = array();
        if(!empty($responseObj))
        {
            if(empty($responseObj->error))
            {
                if($responseObj->code == 200)
                {
                    $data['error'] = 0;
                    $data['delivery_charge'] = $responseObj->delivery_charge;
                    $data['records'] = $responseObj->data;
                    $this->session->set_userdata('delivery_charge',$responseObj->delivery_charge);
                    
                }
            }
            else
            {
                $data['error'] = 1;
                $this->session->set_flashdata('notification',array('error'=>1,'message'=>$responseObj->error->message));
            }
        }
        else
        {
            $data['error'] = 1;
            $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Something going wrong, please try again.'));
        }
        //pre($responseByApi);
                
    	
    	//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('cards');

        /* SEO : Meta data : Start */
        //$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_title');
        //$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_description');
        //$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_key');
        /* SEO : Meta data : End */

    	//$data['records'] = getDataCollection($this->tbl_name);    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/selection',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function apply()
    {
    	$data = array();
    	//$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('cards');

        /* SEO : Meta data : Start */
        //$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_title');
        //$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_description');
        //$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('cards','meta_key');
        /* SEO : Meta data : End */

    	//$data['records'] = getDataCollection($this->tbl_name);    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/apply',$data);		
		$this->load->view('front/include/footer');		
	}

	public function details($slug)
    {
    	$data = array();
    	
    	$data['slug'] = $slug;
        $data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('cards');
    	$data['record'] = $dataCollection = get_record($this->tbl_name,array('slug'=>$slug));

        /* SEO : Meta data : Start */
        $data['meta_title'] = !empty($dataCollection->meta_title)?$dataCollection->meta_title:$dataCollection->name;
        $data['meta_description'] = $dataCollection->meta_description;
        $data['meta_key'] = $dataCollection->meta_key;
        /* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/details',$data);		
		$this->load->view('front/include/footer');		
	}

	public function pay2($slug)
    {
    	$record	= $this->cards_model->getSinglePageDataCollection($slug);
    	if(!empty($this->session->userdata('login_data')) && !empty($record))
    	{
    		$login_data = $this->session->userdata('login_data');
    		$user_id = $login_data['user_id'];
    		$data = array(
		            'item_type' => 'cards',
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
	        $payment_id = $this->cards_model->setInsertData($this->tbl_payment,$data);
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

	function success2(){
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
        $this->cards_model->setUpdateData($this->tbl_payment,$data,$paypalInfo['item_number']);

        // Pass the transaction data to view        
        $this->load->view('front/include/header');      
        $this->load->view('front/cards/success', $data);     
        $this->load->view('front/include/footer');
    }
     
    function cancel2(){
        // Load payment failed view        
        $this->load->view('front/include/header');      
        $this->load->view('front/cards/cancel');        
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
        		$this->cards_model->setUpdateData($this->tbl_payment,$data,$paypalInfo['item_number']);
            }
        }
    }
    
    //$secret = 'ThisTokenIsNotSoSecretChangeIt';
    /**
    
     * @param string $plainString
    
     * @return string
    
     */
    
    public function encryptWithIv($plainString)
    {
        $iv = getRandomIv(openssl_cipher_iv_length('aes-256-cbc'));
        $enc = openssl_encrypt($plainString, 'aes-256-cbc', $secret, 0, $iv);
        return base64_encode($enc.":".$iv);
    }
    
    /**
     * @param int $n
     * @return string
     */
    
    public function  getRandomIv($n = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
    
    
    /**
     * decryptWithIv function
     *
     * @param [type] $encryptedValue
     * @return void
     */
    
    public function decryptWithIv($encryptedValue)
    {
        $encryptedValue = base64_decode($encryptedValue);
        $encParams = explode(':' , $encryptedValue);
        return openssl_decrypt($encParams[0], 'aes-256-cbc', $secret, 0, $encParams[1]);
    }
    
    public function verification()
    {
        $data = array();
        $post_data = $this->input->post();
        if(!empty($post_data))
        {
            pre($post_data);
        }
        $this->load->view('front/include/header',$data);		
		$this->load->view('front/cards/verification',$data);		
		$this->load->view('front/include/footer');
    }
}