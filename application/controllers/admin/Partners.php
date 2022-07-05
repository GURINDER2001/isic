<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends CI_Controller
{
    
    public $tbl_name = "partners";
    public $tbl_partners_pages = "partners_pages";
	public $tbl_partners_pagemeta = "partners_pagemeta";
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('partners_model');
    }
    
    public function index()
    {
        CheckLoginSession();
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $data['partnerPagesOptions'] = getMultiOptions($this->tbl_partners_pages, array('status'=>1));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/partners/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
	
	public function add()
    {
        CheckLoginSession();
        $admin_id       = $this->session->userdata('admin_id');
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();

        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'name', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;
                $post_data['status'] = 1;
                $post_data['associated_pages'] = !empty($post_data['associated_pages'])?implode(",",$post_data['associated_pages']):'';
                $insert_id = setInsertData($this->tbl_name, $post_data);
                if ($insert_id > 0)
                {
                    if ($_FILES["partner_logo"]["name"] != "")
                    {
                        $partner_logo      = do_upload('partnerlogos','partner_logo');
                        $data_logo_img = array('logo' => $partner_logo);
                        setUpdateData($this->tbl_name, $data_logo_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/partners', 'refresh');
                }
            }
        }
        $data['partnerPagesOptions'] = getMultiOptions($this->tbl_partners_pages, array('status'=>1));
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/partners/add', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function edit()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);

        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'name', 'required');

            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;
                $post_data['associated_pages'] = !empty($post_data['associated_pages'])?implode(",",$post_data['associated_pages']):'';
                $insert_id = setUpdateData($this->tbl_name, $post_data, $edit_id);
                if ($_FILES["partner_logo"]["name"] != "")
                {
                    $partner_logo      = do_upload('partnerlogos','partner_logo');
                    $data_logo_img = array('logo' => $partner_logo);
                    setUpdateData($this->tbl_name, $data_logo_img, $edit_id);
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['partnerPagesOptions'] = getMultiOptions($this->tbl_partners_pages, array('status'=>1));   
        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/partners/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/partners', 'refresh');
    }

    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/partners', 'refresh');
    }
    
    public function pages()
    {
        CheckLoginSession();
        $data['records'] = getDataRecords($this->tbl_partners_pages, array(), 0, '', "DESC");

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/partners/pages-list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function addpage()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'title', 'required');

            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data);
                
                $insertArr = array();
                
                $insertArr['name'] = $post_data['page_title'];
                
                $config = array(
                    'table' => $this->tbl_partners_pages,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $this->input->post('page_title'),
                );
                $slug = $this->slug->create_uri($data);
                $insertArr['slug'] = $slug;
                $updateArr['layout'] = !empty($post_data['layout'])?$post_data['layout']:0;
                $insertArr['meta_title'] = $post_data['meta_title'];
                $insertArr['meta_description'] = $post_data['meta_description'];
                $insertArr['meta_key'] = $post_data['meta_key'];
                $insertArr['status'] = 1;
                
                
                //pre($post_data); die;
                
                $insert_id = setInsertData($this->tbl_partners_pages, $insertArr);
                if(!empty($insert_id))
                {
                    if ($_FILES["feature_img"]["name"] != "")
                    {
                        $featured_img      = do_upload('partners','feature_img');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_partners_pages, $data_featured_img, $insert_id);
                    }
                    
                    if ($_FILES["banner_img"]["name"] != "")
                    {
                        $banner_img      = do_upload('partners','banner_img');
                        $data_banner_img = array('banner_img' => $banner_img);
                        setUpdateData($this->tbl_partners_pages, $data_banner_img, $insert_id);
                    }
                    
                    unset($post_data['page_title']);
                    unset($post_data['slug']);
                    unset($post_data['meta_title']);
                    unset($post_data['meta_description']);
                    unset($post_data['meta_key']);
                    unset($_FILES["feature_img"]);
                    unset($_FILES["banner_img"]);
                    
                    $offer_heading   = !empty($post_data['offer_heading'])?$post_data['offer_heading']:array();
        			$offer_content   = !empty($post_data['offer_content'])?$post_data['offer_content']:array();
                    $offer_old_image    = !empty($post_data['offer_old_image'])?$post_data['offer_old_image']:array();
                    
        			$offerElements = array();
                    if(!empty($offer_heading) && count($offer_heading) > 0)
                    {
                        $countS = count($offer_heading);
                        for ($n =0; $n<$countS; $n++)
                        {
                            $rawSArray = array();
                            $rawSArray['heading']   = !empty($offer_heading[$n])?$offer_heading[$n]:'';
                            $rawSArray['content']   = !empty($offer_content[$n])?$offer_content[$n]:'';
                            $rawSArray['image']    = !empty($offer_old_image[$n])?$offer_old_image[$n]:'';
                            array_push($offerElements, $rawSArray);
                        }
                    }
                    
                    unset($post_data['offer_heading']);
                    unset($post_data['offer_content']);
                    unset($post_data['offer_old_image']);
                    
                    $endorsements_heading   = !empty($post_data['endorsements_heading'])?$post_data['endorsements_heading']:array();
                    $endorsements_old_image    = !empty($post_data['endorsements_old_image'])?$post_data['endorsements_old_image']:array();
                    
        			$endorsementsElements = array();
                    if(!empty($endorsements_heading) && count($endorsements_heading) > 0)
                    {
                        $countEH = count($endorsements_heading);
                        for ($n =0; $n<$countEH; $n++)
                        {
                            $rawEHArray = array();
                            $rawEHArray['heading']   = !empty($endorsements_heading[$n])?$endorsements_heading[$n]:'';
                            $rawEHArray['image']    = !empty($endorsements_old_image[$n])?$endorsements_old_image[$n]:'';
                            array_push($endorsementsElements, $rawEHArray);
                        }
                    }
                    
                    unset($post_data['endorsements_heading']);
                    unset($post_data['endorsements_old_image']);
                
                    $featured_heading   = !empty($post_data['featured_heading'])?$post_data['featured_heading']:array();
                    
        			$featuredElements = array();
                    if(!empty($featured_heading) && count($featured_heading) > 0)
                    {
                        $countL = count($featured_heading);
                        for ($p =0; $p<$countL; $p++)
                        {
                            $rawPArray = array();
                            $rawPArray['heading']   = !empty($featured_heading[$p])?$featured_heading[$p]:'';
                            array_push($featuredElements, $rawPArray);
                        }
                    }
                    $post_data['featured_elements'] = !empty($featuredElements)?serialize($featuredElements):'';
                    unset($post_data['featured_heading']);
                    
                    $keyelement_heading   = !empty($post_data['keyelement_heading'])?$post_data['keyelement_heading']:array();
        			$keyelement_content   = !empty($post_data['keyelement_content'])?$post_data['keyelement_content']:array();
                    
        			$keyElements = array();
                    if(!empty($keyelement_heading) && count($keyelement_heading) > 0)
                    {
                        $countK = count($keyelement_heading);
                        for ($o =0; $o<$countK; $o++)
                        {
                            $rawOArray = array();
                            $rawOArray['heading']   = !empty($keyelement_heading[$o])?$keyelement_heading[$o]:'';
                            $rawOArray['content']   = !empty($keyelement_content[$o])?$keyelement_content[$o]:'';
                            array_push($keyElements, $rawOArray);
                        }
                    }
                    $post_data['key_elements'] = !empty($keyElements)?serialize($keyElements):'';
                    unset($post_data['keyelement_heading']);
                    unset($post_data['keyelement_content']);
                    
                    $highlight_heading   = !empty($post_data['highlight_heading'])?$post_data['highlight_heading']:array();
        			$highlight_content   = !empty($post_data['highlight_content'])?$post_data['highlight_content']:array();
                    
        			$highlightsElements = array();
                    if(!empty($highlight_heading) && count($highlight_heading) > 0)
                    {
                        $countL = count($highlight_heading);
                        for ($p =0; $p<$countL; $p++)
                        {
                            $rawPArray = array();
                            $rawPArray['heading']   = !empty($highlight_heading[$p])?$highlight_heading[$p]:'';
                            $rawPArray['content']   = !empty($highlight_content[$p])?$highlight_content[$p]:'';
                            array_push($highlightsElements, $rawPArray);
                        }
                    }
                    $post_data['highlight_elements'] = !empty($highlightsElements)?serialize($highlightsElements):'';
                    unset($post_data['highlight_heading']);
                    unset($post_data['highlight_content']);
                    
                    $infobox_heading   = $post_data['infobox_heading'];
                    $infobox_content   = $post_data['infobox_content'];
                    $infobox_old_image    = $post_data['infobox_old_image'];
                    
        			$infoboxElements = array();
                    if(!empty($infobox_heading) && count($infobox_heading) > 0)
                    {
                        $countS = count($infobox_heading);
                        for ($n =0; $n<$countS; $n++)
                        {
                            $rawSArray = array();
                            $rawSArray['heading']   = !empty($infobox_heading[$n])?$infobox_heading[$n]:'';
                            $rawSArray['content']   = !empty($infobox_content[$n])?$infobox_content[$n]:'';
                            $rawSArray['image']    = !empty($infobox_old_image[$n])?$infobox_old_image[$n]:'';
                            array_push($infoboxElements, $rawSArray);
                        }
                    }
                    
                    unset($post_data['infobox_heading']);
                    unset($post_data['infobox_content']);
                    unset($post_data['infobox_old_image']);
                    
                    $endorment_heading   = $post_data['endorment_heading'];
                    $endorment_old_logo    = $post_data['endorment_old_logo'];
                    $endorment_old_image    = $post_data['endorment_old_image'];
                    
        			$endormentElements = array();
                    if(!empty($endorment_heading) && count($endorment_heading) > 0)
                    {
                        $countE = count($endorment_heading);
                        for ($n =0; $n<$countE; $n++)
                        {
                            $rawEArray = array();
                            $rawEArray['heading']   = !empty($endorment_heading[$n])?$endorment_heading[$n]:'';
                            $rawEArray['logo']   = !empty($endorment_old_logo[$n])?$endorment_old_logo[$n]:'';
                            $rawEArray['image']    = !empty($endorment_old_image[$n])?$endorment_old_image[$n]:'';
                            array_push($endormentElements, $rawEArray);
                        }
                    }
                    
                    unset($post_data['endorment_heading']);
                    unset($post_data['endorment_old_logo']);
                    unset($post_data['endorment_old_image']);
                    
                    $offerImgs = array();
                    $cntK = count($_FILES["offer_image"]["name"]);
                    for($x=0; $x<$cntK; $x++)
                    {
                        $offerImgArr = array();
                        if(!empty($_FILES["offer_image"]["name"]) && !empty($_FILES["offer_image"]["name"][$x]))
                        {
                            $offerImgArr['name']     = $_FILES["offer_image"]["name"][$x];
                            $offerImgArr['type']     = $_FILES["offer_image"]["type"][$x];
                            $offerImgArr['tmp_name'] = $_FILES["offer_image"]["tmp_name"][$x];
                            $offerImgArr['error']    = $_FILES["offer_image"]["error"][$x];
                            $offerImgArr['size']     = $_FILES["offer_image"]["size"][$x];
                            $_FILES['offer_image_'.$x] = $offerImgArr;
                            $offerImgs[$x] = 'offer_image_'.$x;
                        }
                    }
        
                    unset($_FILES["offer_image"]);
                    
                    $endorsementsImgs = array();
                    $cntK = count($_FILES["endorsements_image"]["name"]);
                    for($x=0; $x<$cntK; $x++)
                    {
                        $endorsementsImgArr = array();
                        if(!empty($_FILES["endorsements_image"]["name"]) && !empty($_FILES["endorsements_image"]["name"][$x]))
                        {
                            $endorsementsImgArr['name']     = $_FILES["endorsements_image"]["name"][$x];
                            $endorsementsImgArr['type']     = $_FILES["endorsements_image"]["type"][$x];
                            $endorsementsImgArr['tmp_name'] = $_FILES["endorsements_image"]["tmp_name"][$x];
                            $endorsementsImgArr['error']    = $_FILES["endorsements_image"]["error"][$x];
                            $endorsementsImgArr['size']     = $_FILES["endorsements_image"]["size"][$x];
                            $_FILES['endorsements_image_'.$x] = $endorsementsImgArr;
                            $endorsementsImgs[$x] = 'endorsements_image_'.$x;
                        }
                    }
        
                    unset($_FILES["endorsements_image"]);
                    
                    $infoboxImg = array();
                    $cntFT = count($_FILES["infobox_image"]["name"]);
                    for($x=0; $x<$cntFT; $x++)
                    {
                        $infoboxImgArr = array();
                        if(!empty($_FILES["infobox_image"]["name"]) && !empty($_FILES["infobox_image"]["name"][$x]))
                        {
                            $infoboxImgArr['name']     = $_FILES["infobox_image"]["name"][$x];
                            $infoboxImgArr['type']     = $_FILES["infobox_image"]["type"][$x];
                            $infoboxImgArr['tmp_name'] = $_FILES["infobox_image"]["tmp_name"][$x];
                            $infoboxImgArr['error']    = $_FILES["infobox_image"]["error"][$x];
                            $infoboxImgArr['size']     = $_FILES["infobox_image"]["size"][$x];
                            $_FILES['infobox_image_'.$x] = $infoboxImgArr;
                            $infoboxImg[$x] = 'infobox_image_'.$x;
                        }
                    }
                    
                    //pre($infoboxImg);
                    unset($_FILES["infobox_image"]);
                    
                    
                    
                    $endormentBoxLogo = array();
                    $cntLT = count($_FILES["endorment_logo"]["name"]);
                    for($x=0; $x<$cntLT; $x++)
                    {
                        $endormentLogoArr = array();
                        if(!empty($_FILES["endorment_logo"]["name"]) && !empty($_FILES["endorment_logo"]["name"][$x]))
                        {
                            $endormentLogoArr['name']     = $_FILES["endorment_logo"]["name"][$x];
                            $endormentLogoArr['type']     = $_FILES["endorment_logo"]["type"][$x];
                            $endormentLogoArr['tmp_name'] = $_FILES["endorment_logo"]["tmp_name"][$x];
                            $endormentLogoArr['error']    = $_FILES["endorment_logo"]["error"][$x];
                            $endormentLogoArr['size']     = $_FILES["endorment_logo"]["size"][$x];
                            $_FILES['endorment_logo_'.$x] = $endormentLogoArr;
                            $endormentBoxLogo[$x] = 'endorment_logo_'.$x;
                        }
                    }
                    
                    //pre($infoboxImg);
                    unset($_FILES["endorment_logo"]);
                    
                    $endormentBoxImg = array();
                    $cntET = count($_FILES["endorment_image"]["name"]);
                    for($x=0; $x<$cntET; $x++)
                    {
                        $endormentImgArr = array();
                        if(!empty($_FILES["endorment_image"]["name"]) && !empty($_FILES["endorment_image"]["name"][$x]))
                        {
                            $endormentImgArr['name']     = $_FILES["endorment_image"]["name"][$x];
                            $endormentImgArr['type']     = $_FILES["endorment_image"]["type"][$x];
                            $endormentImgArr['tmp_name'] = $_FILES["endorment_image"]["tmp_name"][$x];
                            $endormentImgArr['error']    = $_FILES["endorment_image"]["error"][$x];
                            $endormentImgArr['size']     = $_FILES["endorment_image"]["size"][$x];
                            $_FILES['endorment_image_'.$x] = $endormentImgArr;
                            $endormentBoxImg[$x] = 'endorment_image_'.$x;
                        }
                    }
                    
                    //pre($infoboxImg);
                    unset($_FILES["endorment_image"]);
                    
                    if(!empty($_FILES))
                    {
                        foreach ($_FILES as $key => $file)
                        {
                            if(!empty($file['name']))
                            {
                                if(!in_array($key, $offerImgs) && !in_array($key,$endorsementsImgs) && !in_array($key, $infoboxImg) && !in_array($key, $endormentBoxLogo) && !in_array($key, $endormentBoxImg))
                                {
                                   $partner_image      = do_upload('partners',$key);
                                   $post_data[$key] = $partner_image;
                                }
                            }
                        }
                    }
                    
                    foreach ($offerImgs as $index => $oImage_field)
                    {
                        if(!empty($_FILES[$oImage_field]['name']))
                        {
                            $offer_image  = do_upload('partners',$oImage_field);
        
                            if(!empty($offer_image) && !empty($offerElements[$index]))
                            {
                                $offerElements[$index]['image']  = $offer_image;
                            }
                        }
                    }
                    
                    foreach ($endorsementsImgs as $index => $endorsements_field)
                    {
                        if(!empty($_FILES[$endorsements_field]['name']))
                        {
                            $endorsements_image  = do_upload('partners',$endorsements_field);
        
                            if(!empty($endorsements_image) && !empty($endorsementsElements[$index]))
                            {
                                $endorsementsElements[$index]['image']  = $endorsements_image;
                            }
                        }
                    }
                    
                    foreach ($infoboxImg as $index => $infoboximg_field)
                    {
                        if(!empty($_FILES[$infoboximg_field]['name']))
                        {
                            $infobox_image  = do_upload('partners',$infoboximg_field);
        
                            if(!empty($infoboxElements) && !empty($infoboxElements[$index]))
                            {
                                $infoboxElements[$index]['image']  = $infobox_image;
                            }
                        }
                    }
                    
                    foreach ($endormentBoxLogo as $index => $endormentLogo_field)
                    {
                    	if(!empty($_FILES[$endormentLogo_field]['name']))
                    	{
                    		$endorment_logo  = do_upload('partners',$endormentLogo_field);
                    
                    		if(!empty($endorment_logo) && !empty($endormentElements[$index]))
                    		{
                    			$endormentElements[$index]['logo']  = $endorment_logo;
                    		}
                    	}
                    }
                    
                    
                    foreach ($endormentBoxImg as $index => $endormentImg_field)
                    {
                    	if(!empty($_FILES[$endormentImg_field]['name']))
                    	{
                    		$endorment_image  = do_upload('partners',$endormentImg_field);
                    
                    		if(!empty($endorment_image) && !empty($endormentElements[$index]))
                    		{
                    			$endormentElements[$index]['image']  = $endorment_image;
                    		}
                    	}
                    }
                    
                    $post_data['offer_elements'] = !empty($offerElements)?serialize($offerElements):'';
                    $post_data['infobox_elements'] = !empty($infoboxElements)?serialize($infoboxElements):'';
                    $post_data['endorment_elements'] = !empty($endormentElements)?serialize($endormentElements):'';
                    $post_data['endorsements_elements'] = !empty($endorsementsElements)?serialize($endorsementsElements):'';
                    
                    //pre($post_data);
                    if(!empty($post_data))
                    {
                        foreach($post_data as $key => $value)
                        {
                            setInsertOrUpdate($this->tbl_partners_pagemeta,array('page_id'=>$insert_id,'name'=>$key,'value'=>$value),array('page_id'=>$insert_id,'name'=>$key));
                        }
                    }
                    
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been inserted successfully !!'));
                    redirect('admin/partners/pages', 'refresh');
                }
            }
        }

		$data['records'] = getDataRecords($this->tbl_partners_pages, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/partners/add-page', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function editpage()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);

        if (!empty($post_data))
        { 
            //pre($post_data); die();
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'title', 'required');

            if ($this->form_validation->run() != FALSE)
            {
                $updateArr = array();
                $slug_str=$this->input->post('slug');
                $config = array(
                    'table' => $this->tbl_partners_pages,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $slug_str,
                );
                $slug = $this->slug->create_uri($data,$edit_id);
                
                $updateArr['name'] = $post_data['page_title'];
                $updateArr['slug'] = $slug;
                $updateArr['layout'] = !empty($post_data['layout'])?$post_data['layout']:0;
                $updateArr['meta_title'] = $post_data['meta_title'];
                $updateArr['meta_description'] = $post_data['meta_description'];
                $updateArr['meta_key'] = $post_data['meta_key'];
                setUpdateData($this->tbl_partners_pages, $updateArr, $edit_id);
                if (!empty($_FILES["feature_img"]["name"]))
                {
                    $featured_img      = do_upload('partners','feature_img');
                    $data_featured_img = array('featured_img' => $featured_img);
                    setUpdateData($this->tbl_partners_pages, $data_featured_img, $edit_id);
                }
                
                if (!empty($_FILES["banner_img"]["name"]))
                {
                    $banner_img      = do_upload('partners','banner_img');
                    $data_banner_img = array('banner_img' => $banner_img);
                    setUpdateData($this->tbl_partners_pages, $data_banner_img, $edit_id);
                }
                
                unset($post_data['page_title']);
                unset($post_data['meta_title']);
                unset($post_data['meta_description']);
                unset($post_data['meta_key']);
                unset($_FILES["feature_img"]);
                unset($_FILES["banner_img"]);
    			
    			$offer_heading   = !empty($post_data['offer_heading'])?$post_data['offer_heading']:array();
    			$offer_content   = !empty($post_data['offer_content'])?$post_data['offer_content']:array();
                $offer_old_image    = !empty($post_data['offer_old_image'])?$post_data['offer_old_image']:array();
                
    			$offerElements = array();
                if(!empty($offer_heading) && count($offer_heading) > 0)
                {
                    $countS = count($offer_heading);
                    for ($n =0; $n<$countS; $n++)
                    {
                        $rawSArray = array();
                        $rawSArray['heading']   = !empty($offer_heading[$n])?$offer_heading[$n]:'';
                        $rawSArray['content']   = !empty($offer_content[$n])?$offer_content[$n]:'';
                        $rawSArray['image']    = !empty($offer_old_image[$n])?$offer_old_image[$n]:'';
                        array_push($offerElements, $rawSArray);
                    }
                }
                
                unset($post_data['offer_heading']);
                unset($post_data['offer_content']);
                unset($post_data['offer_old_image']);
                
                $endorsements_heading   = !empty($post_data['endorsements_heading'])?$post_data['endorsements_heading']:array();
                $endorsements_old_image    = !empty($post_data['endorsements_old_image'])?$post_data['endorsements_old_image']:array();
                
    			$endorsementsElements = array();
                if(!empty($endorsements_heading) && count($endorsements_heading) > 0)
                {
                    $countEH = count($endorsements_heading);
                    for ($n =0; $n<$countEH; $n++)
                    {
                        $rawEHArray = array();
                        $rawEHArray['heading']   = !empty($endorsements_heading[$n])?$endorsements_heading[$n]:'';
                        $rawEHArray['image']    = !empty($endorsements_old_image[$n])?$endorsements_old_image[$n]:'';
                        array_push($endorsementsElements, $rawEHArray);
                    }
                }
                
                unset($post_data['endorsements_heading']);
                unset($post_data['endorsements_old_image']);
                
                $featured_heading   = !empty($post_data['featured_heading'])?$post_data['featured_heading']:array();
                
    			$featuredElements = array();
                if(!empty($featured_heading) && count($featured_heading) > 0)
                {
                    $countL = count($featured_heading);
                    for ($p =0; $p<$countL; $p++)
                    {
                        $rawPArray = array();
                        $rawPArray['heading']   = !empty($featured_heading[$p])?$featured_heading[$p]:'';
                        array_push($featuredElements, $rawPArray);
                    }
                }
                $post_data['featured_elements'] = !empty($featuredElements)?serialize($featuredElements):'';
                unset($post_data['featured_heading']);
                
                $keyelement_heading   = !empty($post_data['keyelement_heading'])?$post_data['keyelement_heading']:array();
    			$keyelement_content   = !empty($post_data['keyelement_content'])?$post_data['keyelement_content']:array();
                
    			$keyElements = array();
                if(!empty($keyelement_heading) && count($keyelement_heading) > 0)
                {
                    $countK = count($keyelement_heading);
                    for ($o =0; $o<$countK; $o++)
                    {
                        $rawOArray = array();
                        $rawOArray['heading']   = !empty($keyelement_heading[$o])?$keyelement_heading[$o]:'';
                        $rawOArray['content']   = !empty($keyelement_content[$o])?$keyelement_content[$o]:'';
                        array_push($keyElements, $rawOArray);
                    }
                }
                $post_data['key_elements'] = !empty($keyElements)?serialize($keyElements):'';
                unset($post_data['keyelement_heading']);
                unset($post_data['keyelement_content']);
                
                $highlight_heading   = !empty($post_data['highlight_heading'])?$post_data['highlight_heading']:array();
    			$highlight_content   = !empty($post_data['highlight_content'])?$post_data['highlight_content']:array();
                
    			$highlightsElements = array();
                if(!empty($highlight_heading) && count($highlight_heading) > 0)
                {
                    $countL = count($highlight_heading);
                    for ($p =0; $p<$countL; $p++)
                    {
                        $rawPArray = array();
                        $rawPArray['heading']   = !empty($highlight_heading[$p])?$highlight_heading[$p]:'';
                        $rawPArray['content']   = !empty($highlight_content[$p])?$highlight_content[$p]:'';
                        array_push($highlightsElements, $rawPArray);
                    }
                }
                $post_data['highlight_elements'] = !empty($highlightsElements)?serialize($highlightsElements):'';
                unset($post_data['highlight_heading']);
                unset($post_data['highlight_content']);
                
                $infobox_heading   = $post_data['infobox_heading'];
                $infobox_content   = $post_data['infobox_content'];
                $infobox_old_image    = $post_data['infobox_old_image'];
                
    			$infoboxElements = array();
                if(!empty($infobox_heading) && count($infobox_heading) > 0)
                {
                    $countS = count($infobox_heading);
                    for ($n =0; $n<$countS; $n++)
                    {
                        $rawSArray = array();
                        $rawSArray['heading']   = !empty($infobox_heading[$n])?$infobox_heading[$n]:'';
                        $rawSArray['content']   = !empty($infobox_content[$n])?$infobox_content[$n]:'';
                        $rawSArray['image']    = !empty($infobox_old_image[$n])?$infobox_old_image[$n]:'';
                        array_push($infoboxElements, $rawSArray);
                    }
                }
                
                unset($post_data['infobox_heading']);
                unset($post_data['infobox_content']);
                unset($post_data['infobox_old_image']);
                
                
                $endorment_heading   = $post_data['endorment_heading'];
                $endorment_old_logo    = $post_data['endorment_old_logo'];
                $endorment_old_image    = $post_data['endorment_old_image'];
                
    			$endormentElements = array();
                if(!empty($endorment_heading) && count($endorment_heading) > 0)
                {
                    $countE = count($endorment_heading);
                    for ($n =0; $n<$countE; $n++)
                    {
                        $rawEArray = array();
                        $rawEArray['heading']   = !empty($endorment_heading[$n])?$endorment_heading[$n]:'';
                        $rawEArray['logo']   = !empty($endorment_old_logo[$n])?$endorment_old_logo[$n]:'';
                        $rawEArray['image']    = !empty($endorment_old_image[$n])?$endorment_old_image[$n]:'';
                        array_push($endormentElements, $rawEArray);
                    }
                }
                
                unset($post_data['endorment_heading']);
                unset($post_data['endorment_old_logo']);
                unset($post_data['endorment_old_image']);
                
                //pre($_FILES["offer_image"]); die;
                $offerImgs = array();
                $cntK = count($_FILES["offer_image"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    $offerImgArr = array();
                    if(!empty($_FILES["offer_image"]["name"]) && !empty($_FILES["offer_image"]["name"][$x]))
                    {
                        $offerImgArr['name']     = $_FILES["offer_image"]["name"][$x];
                        $offerImgArr['type']     = $_FILES["offer_image"]["type"][$x];
                        $offerImgArr['tmp_name'] = $_FILES["offer_image"]["tmp_name"][$x];
                        $offerImgArr['error']    = $_FILES["offer_image"]["error"][$x];
                        $offerImgArr['size']     = $_FILES["offer_image"]["size"][$x];
                        $_FILES['offer_image_'.$x] = $offerImgArr;
                        $offerImgs[$x] = 'offer_image_'.$x;
                    }
                }
    
                unset($_FILES["offer_image"]);
                
                $endorsementsImgs = array();
                $cntK = count($_FILES["endorsements_image"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    $endorsementsImgArr = array();
                    if(!empty($_FILES["endorsements_image"]["name"]) && !empty($_FILES["endorsements_image"]["name"][$x]))
                    {
                        $endorsementsImgArr['name']     = $_FILES["endorsements_image"]["name"][$x];
                        $endorsementsImgArr['type']     = $_FILES["endorsements_image"]["type"][$x];
                        $endorsementsImgArr['tmp_name'] = $_FILES["endorsements_image"]["tmp_name"][$x];
                        $endorsementsImgArr['error']    = $_FILES["endorsements_image"]["error"][$x];
                        $endorsementsImgArr['size']     = $_FILES["endorsements_image"]["size"][$x];
                        $_FILES['endorsements_image_'.$x] = $endorsementsImgArr;
                        $endorsementsImgs[$x] = 'endorsements_image_'.$x;
                    }
                }
    
                unset($_FILES["endorsements_image"]);
                
                $infoboxImg = array();
                $cntFT = count($_FILES["infobox_image"]["name"]);
                for($x=0; $x<$cntFT; $x++)
                {
                    $infoboxImgArr = array();
                    if(!empty($_FILES["infobox_image"]["name"]) && !empty($_FILES["infobox_image"]["name"][$x]))
                    {
                        $infoboxImgArr['name']     = $_FILES["infobox_image"]["name"][$x];
                        $infoboxImgArr['type']     = $_FILES["infobox_image"]["type"][$x];
                        $infoboxImgArr['tmp_name'] = $_FILES["infobox_image"]["tmp_name"][$x];
                        $infoboxImgArr['error']    = $_FILES["infobox_image"]["error"][$x];
                        $infoboxImgArr['size']     = $_FILES["infobox_image"]["size"][$x];
                        $_FILES['infobox_image_'.$x] = $infoboxImgArr;
                        $infoboxImg[$x] = 'infobox_image_'.$x;
                    }
                }
                
                //pre($infoboxImg);
                unset($_FILES["infobox_image"]);
                
                
                $endormentBoxLogo = array();
                $cntLT = count($_FILES["endorment_logo"]["name"]);
                for($x=0; $x<$cntLT; $x++)
                {
                    $endormentLogoArr = array();
                    if(!empty($_FILES["endorment_logo"]["name"]) && !empty($_FILES["endorment_logo"]["name"][$x]))
                    {
                        $endormentLogoArr['name']     = $_FILES["endorment_logo"]["name"][$x];
                        $endormentLogoArr['type']     = $_FILES["endorment_logo"]["type"][$x];
                        $endormentLogoArr['tmp_name'] = $_FILES["endorment_logo"]["tmp_name"][$x];
                        $endormentLogoArr['error']    = $_FILES["endorment_logo"]["error"][$x];
                        $endormentLogoArr['size']     = $_FILES["endorment_logo"]["size"][$x];
                        $_FILES['endorment_logo_'.$x] = $endormentLogoArr;
                        $endormentBoxLogo[$x] = 'endorment_logo_'.$x;
                    }
                }
                
                //pre($infoboxImg);
                unset($_FILES["endorment_logo"]);
                
                $endormentBoxImg = array();
                $cntET = count($_FILES["endorment_image"]["name"]);
                for($x=0; $x<$cntET; $x++)
                {
                    $endormentImgArr = array();
                    if(!empty($_FILES["endorment_image"]["name"]) && !empty($_FILES["endorment_image"]["name"][$x]))
                    {
                        $endormentImgArr['name']     = $_FILES["endorment_image"]["name"][$x];
                        $endormentImgArr['type']     = $_FILES["endorment_image"]["type"][$x];
                        $endormentImgArr['tmp_name'] = $_FILES["endorment_image"]["tmp_name"][$x];
                        $endormentImgArr['error']    = $_FILES["endorment_image"]["error"][$x];
                        $endormentImgArr['size']     = $_FILES["endorment_image"]["size"][$x];
                        $_FILES['endorment_image_'.$x] = $endormentImgArr;
                        $endormentBoxImg[$x] = 'endorment_image_'.$x;
                    }
                }
                
                //pre($infoboxImg);
                unset($_FILES["endorment_image"]);
                
                
                
                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                            if(!in_array($key, $offerImgs) && !in_array($key,$endorsementsImgs) && !in_array($key, $infoboxImg) && !in_array($key, $endormentBoxLogo) && !in_array($key, $endormentBoxImg))
                            {
                               $partner_image      = do_upload('partners',$key);
                               $post_data[$key] = $partner_image;
                            }
                        }
                    }
                }
                
                foreach ($offerImgs as $index => $oImage_field)
                {
                    if(!empty($_FILES[$oImage_field]['name']))
                    {
                        $offer_image  = do_upload('partners',$oImage_field);
    
                        if(!empty($offer_image) && !empty($offerElements[$index]))
                        {
                            $offerElements[$index]['image']  = $offer_image;
                        }
                    }
                }
                
                foreach ($endorsementsImgs as $index => $endorsements_field)
                {
                    if(!empty($_FILES[$endorsements_field]['name']))
                    {
                        $endorsements_image  = do_upload('partners',$endorsements_field);
    
                        if(!empty($endorsements_image) && !empty($endorsementsElements[$index]))
                        {
                            $endorsementsElements[$index]['image']  = $endorsements_image;
                        }
                    }
                }
                
                //pre($offerElements); die;
                foreach ($infoboxImg as $index => $infoboximg_field)
                {
                    if(!empty($_FILES[$infoboximg_field]['name']))
                    {
                        $infobox_image  = do_upload('partners',$infoboximg_field);
    
                        if(!empty($infoboxElements) && !empty($infoboxElements[$index]))
                        {
                            $infoboxElements[$index]['image']  = $infobox_image;
                        }
                    }
                }
                
                
                foreach ($endormentBoxLogo as $index => $endormentLogo_field)
                {
                    if(!empty($_FILES[$endormentLogo_field]['name']))
                    {
                        $endorment_logo  = do_upload('partners',$endormentLogo_field);
    
                        if(!empty($endorment_logo) && !empty($endormentElements[$index]))
                        {
                            $endormentElements[$index]['logo']  = $endorment_logo;
                        }
                    }
                }
                
                foreach ($endormentBoxImg as $index => $endormentImg_field)
                {
                    if(!empty($_FILES[$endormentImg_field]['name']))
                    {
                        $endorment_image  = do_upload('partners',$endormentImg_field);
                        if(!empty($endorment_image) && !empty($endormentElements[$index]))
                        {
                            $endormentElements[$index]['image']  = $endorment_image;
                        }
                    }
                }
                
                $post_data['offer_elements'] = !empty($offerElements)?serialize($offerElements):'';
                $post_data['infobox_elements'] = !empty($infoboxElements)?serialize($infoboxElements):'';
                $post_data['endorment_elements'] = !empty($endormentElements)?serialize($endormentElements):'';
                $post_data['endorsements_elements'] = !empty($endorsementsElements)?serialize($endorsementsElements):'';
                
                if(!empty($post_data))
                {
                    foreach($post_data as $key => $value)
                    {
                        setInsertOrUpdate($this->tbl_partners_pagemeta,array('page_id'=>$edit_id,'name'=>$key,'value'=>$value),array('page_id'=>$edit_id,'name'=>$key));
                    }
                }
                
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }
        
        //$data['categoryOptions'] = getMultiOptions($this->tbl_cat, array('status'=>1));    
        $data['editdata'] = getDataRecord($this->tbl_partners_pages, array('id' => $edit_id));
        $data['collection'] = getDataRecords($this->tbl_partners_pagemeta, array('page_id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/partners/edit-page', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function deletepage()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_partners_pages, $id);
        deleteRecords($this->tbl_partners_pagemeta,array('page_id'=>$id));
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/partners/pages', 'refresh');
    }
    
    public function statuspage()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_partners_pages, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        //pre($data);
        $rec_id         = setUpdateData($this->tbl_partners_pages, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/partners/pages', 'refresh');
    }

    public function category()
    {
        CheckLoginSession();
        $data['records'] = $this->master_model->get_records($this->tbl_cat);
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/blogs/categories',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function addcategory()
    {
        CheckLoginSession();
        $data = array();
        $post_data=$this->input->post();
        if(!empty($post_data)) {        
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            if($this->form_validation->run() != FALSE)
            {
                $slug_str=$this->input->post('name');
                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_str)));
                $post_data['slug'] = $slug;
                $post_data['status'] = 1;
                $insert_id = setInsertData($this->tbl_cat, $post_data);
                if ($insert_id > 0)
                {
                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('blogs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_cat, $data_featured_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
                    redirect('admin/blogs/category','refresh');
                }
            }
        }
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/blogs/add-category',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function editcategory()
    {
        CheckLoginSession();
        $post_data = $this->input->post();
        $edit_id   = $this->uri->segment(5);

        if(!empty($post_data))
        {        
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            if($this->form_validation->run() != FALSE)
            {
                $slug_str=$this->input->post('name');
                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_str)));
                $post_data['slug'] = $slug;
                
                $record_id= setUpdateData($this->tbl_cat, $post_data, $edit_id);
                if($record_id>0)
                {
                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('blogs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_cat, $data_featured_img, $edit_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect(current_url(),'refresh');
                }
            }
        }

        $data['editdata'] = getDataRecord($this->tbl_cat, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/blogs/edit-category',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function deletecategory()
    {
        CheckLoginSession();
        $id = $this->uri->segment(5);
        setDeleteData($this->tbl_cat, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/blogs/category', 'refresh');
    }
    
    public function statuscategory()
    {
        $id             = $this->uri->segment(5);
        $statusId       = getStatusById($this->tbl_cat, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_cat, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/blogs/category', 'refresh');
    }
}