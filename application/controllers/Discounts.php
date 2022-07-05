<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discounts extends CI_Controller {
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
        $this->load->model('sectionsettings_model');
    }


	public $tbl_discounts  = "discounts";

    public function index()
    {
    	$data = array();
    	
    	$type = $this->input->get('type');
    	
    	if(empty($type))
    	{
    	    $type = 'dm';
    	}
    	
    	$data['type'] = $type;
    	
    	$sortKey = $this->input->get('sortKey');
    	$data['sortKey'] = !empty($sortKey)?$sortKey:'createdOn';
    	
    	if($data['sortKey'] == 'createdOn')
    	{
    	    $data['sortOrder'] = $sortOrder = 'desc';
    	}
    	
    	//pre($parameters);
    	
    	if($type == 'bm')
    	{
    	    $categoryXML = callBMDiscountAPI('categories?root=true&limit=100');
    	    $xml = simplexml_load_string($categoryXML, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $data['categories'] = json_decode($json,TRUE);
            
            $locationXML = callBMDiscountAPI('locations?sortKey=name&limit=100&status=ACTIVE&domestic=false');
    	    $xml3 = simplexml_load_string($locationXML, "SimpleXMLElement", LIBXML_NOCDATA);
            $json3 = json_encode($xml3);
            $data['locations'] = json_decode($json3,TRUE);
            
            $url = 'search/providers?limit=100&cardTypes=isic&seed=1&offset=0&status=ACTIVE';
    	    $geoPath = $this->input->get('geo');
    	    if(!empty($geoPath))
    	    {
    	       $url .=  '&geoPaths='.$geoPath;
    	    }
    	    $data['text'] = $text = $this->input->get('text');
    	    $data['geo'] = $geoPath;
    	    $online = $this->input->get('online');
    	    if(!empty($online) && $online=='true')
    	    {
    	        //$url .=  '&onlineOffer=true';
    	    }
    	    $url .=  '&onlineOffer=true';
    	    
    	    $data['cat'] = $cat = $this->input->get('cat');
    	    if(!empty($cat))
    	    {
    	       $url .=  '&categoryIds='.$cat;
    	    }
    	    
    	    $data['cardType'] = $cardType = $this->input->get('cardType');
    	    if(!empty($cardType))
    	    {
    	       $url .=  '&cardTypes='.$cardType;
    	    }
    	    
            $providerXML = callBMDiscountAPI($url);
            $xml2 = simplexml_load_string($providerXML, "SimpleXMLElement", LIBXML_NOCDATA);
            $json2 = json_encode($xml2);
            
            $data['providers'] = json_decode($json2,TRUE);
            //pre($data['providers']);
            //pre($data['suggestions']);
    	}
    	else
    	{ 
    	    //echo $location;
    	    $data['categories'] = callDMDiscountAPI('categories');
    	    $url = 'providers?limit=100';
    	    $text = $this->input->get('text');
    	    if(!empty($text))
    	    {
    	       $url .=  '&text='.$text;
    	    }
    	    
    	    $data['cat'] = $cat = $this->input->get('cat');
    	    if(!empty($cat))
    	    {
    	       $url .=  '&categoryIds='.$cat;
    	    }
	    
    	    $data['text'] = $text;
    	    $online = $this->input->get('online');
    	    if(!empty($online) && $online=='true')
    	    {
    	        $url .=  '&availableOnline=true';
    	    }
    	    
    	    $data['cardType'] = $cardType = $this->input->get('cardType');
    	    if(!empty($cardType))
    	    {
    	       $url .=  '&cardTypes='.$cardType;
    	    }
    	    
    	    if(!empty($sortKey))
    	    {
    	       $url .=  '&sortKey='.$sortKey;
    	    }
    	    
    	    if(!empty($sortOrder))
    	    {
    	       $url .=  '&sortOrder='.$sortOrder;
    	    }
    	    else
    	    {
    	       $url .=  '&sortOrder=asc'; 
    	    }
    	    
    	    
    	    $data['providers'] = callDMDiscountAPI($url);
    	    
    	    //pre($data['providers']);
    	}
    	
    	//pre($data['providers']);
    	
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('discounts');

        /* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('discounts','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('discounts','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('discounts','meta_key');
        /* SEO : Meta data : End */

    	//$data['records'] = getDataCollection($this->tbl_name);    	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/discounts/index',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function india()
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
		$this->load->view('front/discounts/india',$data);		
		$this->load->view('front/include/footer');		
	}
	
	
	public function abroad()
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
		$this->load->view('front/discounts/abroad',$data);		
		$this->load->view('front/include/footer');		
	}

	public function india_categories($id)
    {
    	$data = array();
    	$type = 'dm';
    	
    	$data['type'] = $type;
	    $data['categories'] = callDMDiscountAPI('categories');
	    $data['seleced_cat'] = $id;
	    
        $text = $this->input->get('text');
	    $url = 'providers?limit=100';
	    $online = $this->input->get('online');
	    if(!empty($online))
	    {
	        $url .=  '&availableOnline=true';
	    }
	    if(!empty($id))
	    {
	       $url .=  '&categoryIds='.$id;
	    }
	    if(!empty($text))
	    {
	       $url .=  '&text='.$text;
	    }
	    
	    $data['providers'] = callDMDiscountAPI($url);
	    
	    //pre($data['providers']);
    	
        /* SEO : Meta data : Start */
        //$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_title');
        //$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_description');
        //$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_key');
        /* SEO : Meta data : End */
   	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/discounts/categories',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function abroad_categories($id)
    {
    	$data = array();
    	$data['type'] = 'bm';
    	$data['seleced_cat'] = $id;
	    $categoryXML = callBMDiscountAPI('categories?root=true&limit=100');
	    $xml = simplexml_load_string($categoryXML, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $data['categories'] = json_decode($json,TRUE);
        
        $url = 'search/providers?limit=100&cardTypes=isic&seed=1&offset=0&categoryIds='.$id.'&status=ACTIVE';
	    $geoPath = $this->input->get('geo');
	    if(!empty($geoPath))
	    {
	       $url .=  '&geoPaths='.$geoPath;
	    }
        
        $providerXML = callBMDiscountAPI($url);
        $xml2 = simplexml_load_string($providerXML, "SimpleXMLElement", LIBXML_NOCDATA);
        $json2 = json_encode($xml2);
        $data['providers'] = json_decode($json2,TRUE);
        
        //pre($data['providers']);

        /* SEO : Meta data : Start */
        //$data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_title');
        //$data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_description');
        //$data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('services','meta_key');
        /* SEO : Meta data : End */
 	
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/discounts/categories',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function india_provider_details($id)
    {
    	$data = array();

    	$data['type'] = 'dm';
	    $data['categories'] = callDMDiscountAPI('categories');
	    $data['provider'] = callDMDiscountAPI('providers/'.$id);
	    
	    
	    //pre($data['provider']);
	    
	    $data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('discounts');

        /* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('discounts','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('discounts','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('discounts','meta_key');
        /* SEO : Meta data : End */
        
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/discounts/dm-provider-discounts',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function abroad_provider_details($id)
    {
    	$data = array();
    	$data['type'] = 'bm';
    	$categoryXML = callBMDiscountAPI('categories?limit=50');
	    $xml = simplexml_load_string($categoryXML, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $data['categories'] = json_decode($json,TRUE);
        
        $providerXML = callBMDiscountAPI('providers/'.$id);
        $xml2 = simplexml_load_string($providerXML, "SimpleXMLElement", LIBXML_NOCDATA);
        $json2 = json_encode($xml2);
        $data['provider'] = json_decode($json2,TRUE);
        
        
        $benefitsXML = callBMDiscountAPI('benefits?providerIds='.$id.'&limit=10');
        $xml3 = simplexml_load_string($benefitsXML, "SimpleXMLElement", LIBXML_NOCDATA);
        $json3 = json_encode($xml3);
        $data['benefits'] = json_decode($json3,TRUE);

        $data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('discounts');

        /* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('discounts','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('discounts','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('discounts','meta_key');
        /* SEO : Meta data : End */
        
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/discounts/bm-provider-discounts',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function suggestions()
	{
	    $pattern = $this->input->post('pattern');
	    if(!empty($pattern))
	    {
	        $suggestionsXML = callBMDiscountAPI1('suggestions?limit=10&patternLevels=COUNTRY&patternLevels=CITY&resultLevels=COUNTRY&resultLevels=CITY&patterns='.$pattern.'*');
    	    $xml4 = simplexml_load_string($suggestionsXML, "SimpleXMLElement", LIBXML_NOCDATA);
            $json4 = json_encode($xml4);
            $suggestions = json_decode($json4,TRUE);
            
            $suggestionArr = array();
            $responseData = '';
            $responseData .='<ul id="country-list">';
            if(!empty($suggestions['suggestion']))
            {
                foreach($suggestions['suggestion'] as $suggestion)
                {
                    if(!empty($suggestion['components']))
                    {
                        
                        foreach($suggestion['components'] as $component)
                        {
                            if(!empty($component))
                            {
                                $componentIds = array();
                                $componentLabels = array();
                                foreach($component as $comp)
                                {
                                    $geoId = $comp['geoId'];
                                    $geoLevel = $comp['geoLevel'];
                                    $geoName = $comp['name'];
                                    if(!empty($geoLevel) && $geoLevel != 'CONTINENT')
                                    {
                                        $componentIds[$geoLevel] = $geoId;
                                        $componentLabels[$geoLevel] = $geoName;
                                    }
                                }
                                
                                $componentIdsStr = implode(":",array_reverse($componentIds));
                                unset($componentLabels['REGION']);
                                $responseData .='<li class="geoItem" data-geoPath="'.$componentIdsStr.'">'.implode(",",$componentLabels).'</li>';
                            }
                        }
                        
                    }
                }
            }
            $responseData .='</ul>';
            
            echo $responseData;
	    }
	}
	
	public function suggestion()
	{
	    $pattern = 'del';
	    if(!empty($pattern))
	    {
	        $suggestionsXML = callBMDiscountAPI1('suggestions?limit=10&patternLevels=COUNTRY&patternLevels=CITY&resultLevels=COUNTRY&resultLevels=CITY&patterns='.$pattern.'*');
    	    $xml4 = simplexml_load_string($suggestionsXML, "SimpleXMLElement", LIBXML_NOCDATA);
            $json4 = json_encode($xml4);
            $suggestions = json_decode($json4,TRUE);
            
            $suggestionArr = array();
            $responseData = '';
            $responseData .='<ul id="country-list">';
            if(!empty($suggestions['suggestion']))
            {
                foreach($suggestions['suggestion'] as $suggestion)
                {
                    if(!empty($suggestion['components']))
                    {
                        
                        foreach($suggestion['components'] as $component)
                        {
                            if(!empty($component))
                            {
                                $componentIds = array();
                                $componentLabels = array();
                                foreach($component as $comp)
                                {
                                    $geoId = $comp['geoId'];
                                    $geoLevel = $comp['geoLevel'];
                                    $geoName = $comp['name'];
                                    if(!empty($geoLevel) && $geoLevel != 'CONTINENT')
                                    {
                                        $componentIds[$geoLevel] = $geoId;
                                        $componentLabels[$geoLevel] = $geoName;
                                    }
                                }
                                
                                $componentIdsStr = implode(":",array_reverse($componentIds));
                                unset($componentLabels['REGION']);
                                $responseData .='<li onClick="selectCountry('.$componentIdsStr.');">'.implode(",",$componentLabels).'</li>';
                            }
                        }
                        
                    }
                }
            }
            $responseData .='</ul>';
            
            echo $responseData;
	    }
	}
	
	public function home_discount_ajax()
	{
	    $country_id = $this->input->post('country_id');
	    $responseHtml = '';
	    $country_id = !empty($country_id)?$country_id:101;
	    $country_discounts = $this->master_model->get_records($this->tbl_discounts,array('country_id' => $country_id,'status'=>1));
	    if(!empty($country_discounts))
        {
	        $count = count($country_discounts);
            $divider = ($count > 4)?ceil($count/2):$count;
            $country_discounts = array_chunk($country_discounts,$divider);
            
            foreach($country_discounts as $discounts)
            {
        	    $responseHtml .= '<div class="discountslider owl-carousel owl-theme">';
                if(!empty($discounts))
                {
                    foreach($discounts as $provider)
            		{
                        $responseHtml .= '<div class="item"> 
                            <a href="'.base_url('discounts/india/provider/'.$provider->providerId_api).'"> 
                                <div class="thumb">
                                    <img class="poster" src="'.base_url(!empty($provider->banner_img)?$provider->banner_img:'assets/img/no_photo.png').'" alt="image" />
                                    <div class="dscLogo"> <img src="'.base_url(!empty($provider->featured_img)?$provider->featured_img:'assets/img/no_photo.png').'" /> </div>
                                </div>
                                <div class="dscInfo">
                                    <h3>'.$provider->name.'</h3>';
                                    if(!empty($provider->summary)) {
                                        $responseHtml .= '<p>'.$provider->summary.'</p>';
                                    }
                        $responseHtml .= '<span class="plsIcn"><i class="bx bx-plus"></i></span>
                              </div>
                            </a> 
                        </div>';
                    }
                }
                $responseHtml .= '</div>';
            }
        }
        echo $responseHtml;
	}
	
	public function home_discount_ajax2()
    {
    	$responseData = '';
    	$discount_type = $this->input->post('discount_country');
    	if($discount_type == 'bm')
    	{
            $url = 'search/providers?limit=100&cardTypes=isic&seed=1&offset=0&status=ACTIVE';
            $providerXML = callBMDiscountAPI($url);
            $xml2 = simplexml_load_string($providerXML, "SimpleXMLElement", LIBXML_NOCDATA);
            $json2 = json_encode($xml2);
            $providers = json_decode($json2,TRUE);
            if(!empty($providers['providers']))
            {
			    foreach($providers['providers'] as $provider)
        		{
                    $responseData .= '<div class="single-portfolio-item dsHome">
    					<a href="'.base_url('discounts/abroad/provider/'.$provider['providerId']).'" target="_blank" class="image d-block">
    						<img src="'.(!empty($provider['logo'])?$provider['logo']:base_url('assets/img/no_photo.png')).'" alt="image" />
    						<div class="pro-details-div">
    							<div class="pro-details-div-inner">
    								<div class="row">
    									<div class="col-md-12">
    										<h3>'.$provider['name'].'</h3>
    									</div>
    									<i class="bx bx-plus"></i>
    								</div>
    							</div>
    						</div>
    					</a>
                    </div>';
                }
            }
    	}
    	else
    	{ 
    	    $url = 'providers?availableOnline=true&limit=100';
    	    $providers = callDMDiscountAPI($url);
    	    if(!empty($providers))
    	    {
        	    foreach($providers->items as $provider)
        		{
                    $responseData .= '<div class="single-portfolio-item dsHome">';
    					$responseData .= '<a href="'.base_url('discounts/india/provider/'.$provider->id).'" class="image d-block">';
    						$responseData .= '<img src="'.(!empty($provider->logoUrl)?$provider->logoUrl:base_url('assets/img/no_photo.png')).'" alt="image" />';
    						$responseData .= '<div class="pro-details-div">
    							<div class="pro-details-div-inner">
    								<div class="row">
    									<div class="col-md-12">
    										<h3>'.$provider->name.'</h3>
    									</div>
    									<i class="bx bx-plus"></i>
    								</div>
    							</div>
    						</div>
    					</a>
                    </div>';
                }
    	    }
                    
    	}
    	
    	echo $responseData;
	}
}