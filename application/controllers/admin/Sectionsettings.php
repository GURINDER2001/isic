<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sectionsettings extends CI_Controller
{
    public $tbl_name = "section_settings";
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('sectionsettings_model');
    }
    
    public function index()
    {
        
    }
    
    public function home()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            //pre($_FILES); die;
            //pre($post_data);
            $key_elements_titles   = $post_data['key_elements_title'];
            $key_elements_contents = $post_data['key_elements_content'];
            $key_elements_image    = $post_data['key_elements_image'];
            $key_elements_url      = $post_data['key_elements_url'];
            
            $keyElements = array();
            if(!empty($key_elements_titles) && !empty($key_elements_titles[0]))
            {
                $countS = count($key_elements_titles);
                for ($n =0; $n<$countS; $n++)
                {
                    $rawSArray = array();
                    $rawSArray['title']   = !empty($key_elements_titles[$n])?$key_elements_titles[$n]:'';
                    $rawSArray['content'] = !empty($key_elements_contents[$n])?$key_elements_contents[$n]:'';
                    $rawSArray['icon']    = !empty($key_elements_image[$n])?$key_elements_image[$n]:'';
                    $rawSArray['url']    = !empty($key_elements_url[$n])?$key_elements_url[$n]:'';   
                    array_push($keyElements, $rawSArray);
                }
            }
            
            $post_data['keyinfo_content'] = !empty($keyElements)?serialize($keyElements):'';
            unset($post_data['key_elements_title']);
            unset($post_data['key_elements_content']);
            unset($post_data['key_elements_image']);
            unset($post_data['key_elements_url']);
            
            
            $fTabs_title   = $post_data['fTabs_title'];
            $fTabs_content = $post_data['fTabs_content'];
            $fTabs_image    = $post_data['fTabs_image'];
            
            $fTabsContent = array();
            if(!empty($fTabs_title) && !empty($fTabs_title[0]))
            {
                $countFT = count($fTabs_title);
                for ($n =0; $n<$countFT; $n++)
                {
                    $rawFTArray = array();
                    $rawFTArray['title']   = !empty($fTabs_title[$n])?$fTabs_title[$n]:'';
                    $rawFTArray['content'] = !empty($fTabs_content[$n])?$fTabs_content[$n]:'';
                    $rawFTArray['icon']    = !empty($fTabs_image[$n])?$fTabs_image[$n]:'';
                    array_push($fTabsContent, $rawFTArray);
                }
            }
            
            $post_data['featured_tabs_content'] = !empty($fTabsContent)?serialize($fTabsContent):'';
            unset($post_data['fTabs_title']);
            unset($post_data['fTabs_content']);
            unset($post_data['fTabs_image']);
            
            foreach ($post_data as $key => $value)
            {
                setUpdateSectionSetting($this->tbl_name, 'home', $key, $value);
            }
        
            $keyIcons = array();
            $cntK = count($_FILES["key_elements_icons"]["name"]);
            for($x=0; $x<$cntK; $x++)
            {
                $keyIconsArr = array();
                if(!empty($_FILES["key_elements_icons"]["name"]) && !empty($_FILES["key_elements_icons"]["name"][0]))
                {
                    $keyIconsArr['name']     = $_FILES["key_elements_icons"]["name"][$x];
                    $keyIconsArr['type']     = $_FILES["key_elements_icons"]["type"][$x];
                    $keyIconsArr['tmp_name'] = $_FILES["key_elements_icons"]["tmp_name"][$x];
                    $keyIconsArr['error']    = $_FILES["key_elements_icons"]["error"][$x];
                    $keyIconsArr['size']     = $_FILES["key_elements_icons"]["size"][$x];
                    $_FILES['keyinfo_icons_'.$x] = $keyIconsArr;
                    $keyIcons[$x] = 'keyinfo_icons_'.$x;
                }
            }

            unset($_FILES["key_elements_icons"]);
            
            $fTabsIcons = array();
            $cntFT = count($_FILES["fTabs_icons"]["name"]);
            for($x=0; $x<$cntFT; $x++)
            {
                $fTabsIconsArr = array();
                if(!empty($_FILES["fTabs_icons"]["name"]) && !empty($_FILES["fTabs_icons"]["name"][$x]))
                {
                    $fTabsIconsArr['name']     = $_FILES["fTabs_icons"]["name"][$x];
                    $fTabsIconsArr['type']     = $_FILES["fTabs_icons"]["type"][$x];
                    $fTabsIconsArr['tmp_name'] = $_FILES["fTabs_icons"]["tmp_name"][$x];
                    $fTabsIconsArr['error']    = $_FILES["fTabs_icons"]["error"][$x];
                    $fTabsIconsArr['size']     = $_FILES["fTabs_icons"]["size"][$x];
                    $_FILES['fTabs_icons_'.$x] = $fTabsIconsArr;
                    $fTabsIcons[$x] = 'fTabs_icons_'.$x;
                }
            }

            unset($_FILES["fTabs_icons"]);

            if(!empty($_FILES))
            {
                foreach ($_FILES as $key => $file)
                {
                    if(!empty($file['name']))
                    {
                        if(!in_array($key, $keyIcons) && !in_array($key, $fTabsIcons))
                        {
                           $section_image      = do_upload('sections',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'home', $key, $section_image);
                        }
                    }
                }
            }

            foreach ($keyIcons as $index => $icon_field)
            {
                if(!empty($_FILES[$icon_field]['name']))
                {
                    $keyinfo_icons  = do_upload('cmsimages',$icon_field);

                    if(!empty($keyElements) && !empty($keyElements[$index]))
                    {
                        $keyElements[$index]['icon']  = $keyinfo_icons;
                        setUpdateSectionSetting($this->tbl_name, 'home', 'keyinfo_content', serialize($keyElements));
                    }
                }
            }
            
            foreach ($fTabsIcons as $index => $fIcon_field)
            {
                if(!empty($_FILES[$fIcon_field]['name']))
                {
                    $fTab_icons  = do_upload('cmsimages',$fIcon_field);

                    if(!empty($fTabsContent) && !empty($fTabsContent[$index]))
                    {
                        $fTabsContent[$index]['icon']  = $fTab_icons;
                        setUpdateSectionSetting($this->tbl_name, 'home', 'featured_tabs_content', serialize($fTabsContent));
                    }
                }
            }
            //pre($post_data);
            //pre($_FILES);       die;

            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
            redirect(current_url(), 'refresh');
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'home');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/home', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function aboutus()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'url', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;
                $partner_logo_title   = $post_data['partner_logo_title'];
                $partner_logo_url = $post_data['partner_logo_url'];
                $partner_logo_image    = $post_data['partner_logo_image'];
                
                $logoElements = array();
                if(!empty($partner_logo_title) && !empty($partner_logo_title[0]))
                {
                    $countS = count($partner_logo_title);
                    for ($n =0; $n<$countS; $n++)
                    {
                        $rawSArray = array();
                        $rawSArray['title']   = !empty($partner_logo_title[$n])?$partner_logo_title[$n]:'';
                        $rawSArray['logo']    = !empty($partner_logo_image[$n])?$partner_logo_image[$n]:'';
                        $rawSArray['url']    = !empty($partner_logo_url[$n])?$partner_logo_url[$n]:'';   
                        array_push($logoElements, $rawSArray);
                    }
                }
                
                $post_data['partner_logos'] = !empty($logoElements)?serialize($logoElements):'';
                unset($post_data['partner_logo_title']);
                unset($post_data['partner_logo_url']);
                unset($post_data['partner_logo_image']);
                
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'aboutus', $key, $value);
                }
                
                $logoIcons = array();
                $cntK = count($_FILES["partner_logo_icons"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    if(!empty($_FILES["partner_logo_icons"]["name"]) && !empty($_FILES["partner_logo_icons"]["name"][$x]))
                    { 
                        $logoIconsArr = array();
                        $logoIconsArr['name']     = $_FILES["partner_logo_icons"]["name"][$x];
                        $logoIconsArr['type']     = $_FILES["partner_logo_icons"]["type"][$x];
                        $logoIconsArr['tmp_name'] = $_FILES["partner_logo_icons"]["tmp_name"][$x];
                        $logoIconsArr['error']    = $_FILES["partner_logo_icons"]["error"][$x];
                        $logoIconsArr['size']     = $_FILES["partner_logo_icons"]["size"][$x];
                        $_FILES['partner_logo_'.$x] = $logoIconsArr;
                        $logoIcons[$x] = 'partner_logo_'.$x;
                    }
                }
                
                unset($_FILES["partner_logo_icons"]);
                //pre($_FILES);
                
                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                            if(!in_array($key, $logoIcons))
                            {
                               $section_image      = do_upload('sections',$key); 
                               setUpdateSectionSetting($this->tbl_name, 'aboutus', $key, $section_image);
                            }
                        }
                    }
                }
                

                foreach ($logoIcons as $index => $icon_field)
                {
                    if(!empty($_FILES[$icon_field]['name']))
                    {
                        $logo_icons  = do_upload('cmsimages',$icon_field);
    
                        if(!empty($logoElements) && !empty($logoElements[$index]))
                        {
                            $logoElements[$index]['logo']  = $logo_icons;
                            setUpdateSectionSetting($this->tbl_name, 'aboutus', 'partner_logos', serialize($logoElements));
                        }
                    }
                }

                
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'aboutus');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/aboutus', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function whyisic()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'url', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;
                $key_feature_title   = $post_data['key_feature_title'];
                $key_feature_image    = $post_data['key_feature_image'];
                
                $keyElements = array();
                if(!empty($key_feature_title))
                {
                    $countS = count($key_feature_title);
                    for ($n =0; $n<$countS; $n++)
                    {
                        if(!empty($key_feature_title[$n]))
                        {
                            $rawSArray = array();
                            $rawSArray['title']   = !empty($key_feature_title[$n])?$key_feature_title[$n]:'';
                            $rawSArray['icon']    = !empty($key_feature_image[$n])?$key_feature_image[$n]:'';
                            array_push($keyElements, $rawSArray);
                        }
                    }
                }
                
                $post_data['key_features'] = !empty($keyElements)?serialize($keyElements):'';
                unset($post_data['key_feature_title']);
                unset($post_data['key_feature_image']);
                
                
                $highlights_title   = $post_data['highlights_title'];
                $highlights_image    = $post_data['highlights_image'];
                
                $highlights = array();
                if(!empty($highlights_title))
                {
                    $countS = count($highlights_title);
                    for ($n =0; $n<$countS; $n++)
                    {
                        if(!empty($highlights_title[$n]))
                        {
                            $rawSArray = array();
                            $rawSArray['title']   = !empty($highlights_title[$n])?$highlights_title[$n]:'';
                            $rawSArray['icon']    = !empty($highlights_image[$n])?$highlights_image[$n]:'';
                            array_push($highlights, $rawSArray);
                        }
                    }
                }
                
                $post_data['highlights'] = !empty($highlights)?serialize($highlights):'';
                unset($post_data['highlights_title']);
                unset($post_data['highlights_image']);
                
                
                $steps_title   = $post_data['steps_title'];
                $steps_image    = $post_data['steps_image'];
                
                $steps = array();
                if(!empty($steps_title))
                {
                    $countS = count($steps_title);
                    for ($n =0; $n<$countS; $n++)
                    {
                        if(!empty($steps_title[$n]))
                        {
                            $rawSArray = array();
                            $rawSArray['title']   = !empty($steps_title[$n])?$steps_title[$n]:'';
                            $rawSArray['icon']    = !empty($steps_image[$n])?$steps_image[$n]:'';
                            array_push($steps, $rawSArray);
                        }
                    }
                }
                
                $post_data['steps'] = !empty($steps)?serialize($steps):'';
                unset($post_data['steps_title']);
                unset($post_data['steps_image']);
                
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'whyisic', $key, $value);
                }
                
                $keyIcons = array();
                $cntK = count($_FILES["key_feature_icons"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    if(!empty($_FILES["key_feature_icons"]["name"]) && !empty($_FILES["key_feature_icons"]["name"][$x]))
                    { 
                        $keyIconsArr = array();
                        $keyIconsArr['name']     = $_FILES["key_feature_icons"]["name"][$x];
                        $keyIconsArr['type']     = $_FILES["key_feature_icons"]["type"][$x];
                        $keyIconsArr['tmp_name'] = $_FILES["key_feature_icons"]["tmp_name"][$x];
                        $keyIconsArr['error']    = $_FILES["key_feature_icons"]["error"][$x];
                        $keyIconsArr['size']     = $_FILES["key_feature_icons"]["size"][$x];
                        $_FILES['key_feature_icons_'.$x] = $keyIconsArr;
                        $keyIcons[$x] = 'key_feature_icons_'.$x;
                    }
                }
                
                unset($_FILES["key_feature_icons"]);
                
                
                $highlightsIcons = array();
                $cntK = count($_FILES["highlights_icons"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    if(!empty($_FILES["highlights_icons"]["name"]) && !empty($_FILES["highlights_icons"]["name"][$x]))
                    { 
                        $highlightsIconsArr = array();
                        $highlightsIconsArr['name']     = $_FILES["highlights_icons"]["name"][$x];
                        $highlightsIconsArr['type']     = $_FILES["highlights_icons"]["type"][$x];
                        $highlightsIconsArr['tmp_name'] = $_FILES["highlights_icons"]["tmp_name"][$x];
                        $highlightsIconsArr['error']    = $_FILES["highlights_icons"]["error"][$x];
                        $highlightsIconsArr['size']     = $_FILES["highlights_icons"]["size"][$x];
                        $_FILES['highlights_icons_'.$x] = $highlightsIconsArr;
                        $highlightsIcons[$x] = 'highlights_icons_'.$x;
                    }
                }
                unset($_FILES["highlights_icons"]);
                
                
                $stepsIcons = array();
                $cntK = count($_FILES["steps_icons"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    if(!empty($_FILES["steps_icons"]["name"]) && !empty($_FILES["steps_icons"]["name"][$x]))
                    { 
                        $stepsIconsArr = array();
                        $stepsIconsArr['name']     = $_FILES["steps_icons"]["name"][$x];
                        $stepsIconsArr['type']     = $_FILES["steps_icons"]["type"][$x];
                        $stepsIconsArr['tmp_name'] = $_FILES["steps_icons"]["tmp_name"][$x];
                        $stepsIconsArr['error']    = $_FILES["steps_icons"]["error"][$x];
                        $stepsIconsArr['size']     = $_FILES["steps_icons"]["size"][$x];
                        $_FILES['steps_icons_'.$x] = $stepsIconsArr;
                        $stepsIcons[$x] = 'steps_icons_'.$x;
                    }
                }
                
                unset($_FILES["steps_icons"]);
                //pre($_FILES);
                
                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                            if(!in_array($key, $keyIcons) && !in_array($key, $highlightsIcons) && !in_array($key, $stepsIcons))
                            {
                               $section_image      = do_upload('sections',$key); 
                               setUpdateSectionSetting($this->tbl_name, 'whyisic', $key, $section_image);
                            }
                        }
                    }
                }
                

                foreach ($keyIcons as $index => $keyicon_field)
                {
                    if(!empty($_FILES[$keyicon_field]['name']))
                    {
                        $keyfeature_icons  = do_upload('sections',$keyicon_field);
    
                        if(!empty($keyElements) && !empty($keyElements[$index]))
                        {
                            $keyElements[$index]['icon']  = $keyfeature_icons;
                            setUpdateSectionSetting($this->tbl_name, 'whyisic', 'key_features', serialize($keyElements));
                        }
                    }
                }
                
                foreach ($highlightsIcons as $index => $highlighticon_field)
                {
                    if(!empty($_FILES[$highlighticon_field]['name']))
                    {
                        $highlight_icons  = do_upload('sections',$highlighticon_field);
    
                        if(!empty($highlights) && !empty($highlights[$index]))
                        {
                            $highlights[$index]['icon']  = $highlight_icons;
                            setUpdateSectionSetting($this->tbl_name, 'whyisic', 'highlights', serialize($highlights));
                        }
                    }
                }
                
                foreach ($stepsIcons as $index => $stepicon_field)
                {
                    if(!empty($_FILES[$stepicon_field]['name']))
                    {
                        $steps_icons  = do_upload('sections',$stepicon_field);
    
                        if(!empty($steps) && !empty($steps[$index]))
                        {
                            $steps[$index]['icon']  = $steps_icons;
                            setUpdateSectionSetting($this->tbl_name, 'whyisic', 'steps', serialize($steps));
                        }
                    }
                }

                
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'whyisic');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/whyisic', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function endorsement()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'url', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                
                $key_elements_titles   = $post_data['key_elements_title'];
                $key_elements_image    = $post_data['key_elements_image'];
                $key_elements_pdf      = $post_data['key_elements_pdf'];
                $key_elements_logoimg      = $post_data['key_elements_logoimg'];
                
                $keyElements = array();
                if(!empty($key_elements_titles))
                {
                    $countS = count($key_elements_titles);
                    for ($n =0; $n<$countS; $n++)
                    {
                        if(!empty($key_elements_titles[$n]))
                        {
                            $rawSArray = array();
                            $rawSArray['title']   = !empty($key_elements_titles[$n])?$key_elements_titles[$n]:'';
                            $rawSArray['icon']    = !empty($key_elements_image[$n])?$key_elements_image[$n]:'';
                            $rawSArray['pdf']    = !empty($key_elements_pdf[$n])?$key_elements_pdf[$n]:'';
                            $rawSArray['logo']    = !empty($key_elements_logoimg[$n])?$key_elements_logoimg[$n]:'';
                            array_push($keyElements, $rawSArray);
                        }
                    }
                }
                
                $post_data['keyinfo_content'] = !empty($keyElements)?serialize($keyElements):'';
                unset($post_data['key_elements_title']);
                unset($post_data['key_elements_image']);
                unset($post_data['key_elements_pdf']);
                unset($post_data['key_elements_logoimg']);
                
                //pre($post_data); die;
                $partner_logo_title   = $post_data['partner_logo_title'];
                $partner_logo_iconimage    = $post_data['partner_logo_iconimage'];
                $partner_logo_pdf    = $post_data['partner_logo_pdf'];
                $partner_logo_logoimage    = $post_data['partner_logo_logoimage'];
                $logoElements = array();
                if(!empty($partner_logo_title))
                {
                    $countS = count($partner_logo_title);
                    for ($n =0; $n<$countS; $n++)
                    {
                        if(!empty($partner_logo_title[$n]))
                        {
                            $rawSArray = array();
                            $rawSArray['title']   = !empty($partner_logo_title[$n])?$partner_logo_title[$n]:'';
                            $rawSArray['icon']    = !empty($partner_logo_iconimage[$n])?$partner_logo_iconimage[$n]:'';
                            $rawSArray['pdf']    = !empty($partner_logo_pdf[$n])?$partner_logo_pdf[$n]:'';
                            $rawSArray['logo']    = !empty($partner_logo_logoimage[$n])?$partner_logo_logoimage[$n]:'';
                            array_push($logoElements, $rawSArray);
                        }
                    }
                }
                
                $post_data['partner_logos'] = !empty($logoElements)?serialize($logoElements):'';
                unset($post_data['partner_logo_title']);
                unset($post_data['partner_logo_iconimage']);
                unset($post_data['partner_logo_pdf']);
                unset($post_data['partner_logo_logoimage']);
                
                //pre($post_data); die;
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'endorsement', $key, $value);
                }
                
                $keyIcons = array();
                $cntK = count($_FILES["key_elements_icons"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    $keyIconsArr = array();
                    if(!empty($_FILES["key_elements_icons"]["name"]) && !empty($_FILES["key_elements_icons"]["name"][$x]))
                    {
                        $keyIconsArr['name']     = $_FILES["key_elements_icons"]["name"][$x];
                        $keyIconsArr['type']     = $_FILES["key_elements_icons"]["type"][$x];
                        $keyIconsArr['tmp_name'] = $_FILES["key_elements_icons"]["tmp_name"][$x];
                        $keyIconsArr['error']    = $_FILES["key_elements_icons"]["error"][$x];
                        $keyIconsArr['size']     = $_FILES["key_elements_icons"]["size"][$x];
                        $_FILES['keyinfo_icons_'.$x] = $keyIconsArr;
                        $keyIcons[$x] = 'keyinfo_icons_'.$x;
                    }
                }
    
                unset($_FILES["key_elements_icons"]);
                
                $keyPdfs = array();
                $cntP = count($_FILES["key_elements_pdfs"]["name"]);
                for($x=0; $x<$cntP; $x++)
                {
                    $keyPdfsArr = array();
                    if(!empty($_FILES["key_elements_pdfs"]["name"]) && !empty($_FILES["key_elements_pdfs"]["name"][$x]))
                    {
                        $keyPdfsArr['name']     = $_FILES["key_elements_pdfs"]["name"][$x];
                        $keyPdfsArr['type']     = $_FILES["key_elements_pdfs"]["type"][$x];
                        $keyPdfsArr['tmp_name'] = $_FILES["key_elements_pdfs"]["tmp_name"][$x];
                        $keyPdfsArr['error']    = $_FILES["key_elements_pdfs"]["error"][$x];
                        $keyPdfsArr['size']     = $_FILES["key_elements_pdfs"]["size"][$x];
                        $_FILES['keyinfo_pdfs_'.$x] = $keyPdfsArr;
                        $keyPdfs[$x] = 'keyinfo_pdfs_'.$x;
                    }
                }
                
                unset($_FILES["key_elements_pdfs"]);
                
                $keyLogos = array();
                $cntL = count($_FILES["key_elements_logos"]["name"]);
                for($x=0; $x<$cntL; $x++)
                {
                    $keyLogosArr = array();
                    if(!empty($_FILES["key_elements_logos"]["name"]) && !empty($_FILES["key_elements_logos"]["name"][$x]))
                    {
                        $keyLogosArr['name']     = $_FILES["key_elements_logos"]["name"][$x];
                        $keyLogosArr['type']     = $_FILES["key_elements_logos"]["type"][$x];
                        $keyLogosArr['tmp_name'] = $_FILES["key_elements_logos"]["tmp_name"][$x];
                        $keyLogosArr['error']    = $_FILES["key_elements_logos"]["error"][$x];
                        $keyLogosArr['size']     = $_FILES["key_elements_logos"]["size"][$x];
                        $_FILES['keyinfo_logos_'.$x] = $keyLogosArr;
                        $keyLogos[$x] = 'keyinfo_logos_'.$x;
                    }
                }
                
                unset($_FILES["key_elements_logos"]);
                
                $logoIcons = array();
                $cntK = count($_FILES["partner_logo_icons"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    if(!empty($_FILES["partner_logo_icons"]["name"]) && !empty($_FILES["partner_logo_icons"]["name"][$x]))
                    { 
                        $logoIconsArr = array();
                        $logoIconsArr['name']     = $_FILES["partner_logo_icons"]["name"][$x];
                        $logoIconsArr['type']     = $_FILES["partner_logo_icons"]["type"][$x];
                        $logoIconsArr['tmp_name'] = $_FILES["partner_logo_icons"]["tmp_name"][$x];
                        $logoIconsArr['error']    = $_FILES["partner_logo_icons"]["error"][$x];
                        $logoIconsArr['size']     = $_FILES["partner_logo_icons"]["size"][$x];
                        $_FILES['partner_icons_'.$x] = $logoIconsArr;
                        $logoIcons[$x] = 'partner_icons_'.$x;
                    }
                }
                
                unset($_FILES["partner_logo_icons"]);
                
                
                $logoPdfs = array();
                $cntP = count($_FILES["partner_logo_pdfs"]["name"]);
                for($x=0; $x<$cntP; $x++)
                {
                    if(!empty($_FILES["partner_logo_pdfs"]["name"]) && !empty($_FILES["partner_logo_pdfs"]["name"][$x]))
                    { 
                        $logoPdfsArr = array();
                        $logoPdfsArr['name']     = $_FILES["partner_logo_pdfs"]["name"][$x];
                        $logoPdfsArr['type']     = $_FILES["partner_logo_pdfs"]["type"][$x];
                        $logoPdfsArr['tmp_name'] = $_FILES["partner_logo_pdfs"]["tmp_name"][$x];
                        $logoPdfsArr['error']    = $_FILES["partner_logo_pdfs"]["error"][$x];
                        $logoPdfsArr['size']     = $_FILES["partner_logo_pdfs"]["size"][$x];
                        $_FILES['partner_pdf_'.$x] = $logoPdfsArr;
                        $logoPdfs[$x] = 'partner_pdf_'.$x;
                    }
                }
                
                unset($_FILES["partner_logo_pdfs"]);
                
                
                $logoLogos = array();
                $cntK = count($_FILES["partner_logo_logos"]["name"]);
                for($x=0; $x<$cntK; $x++)
                {
                    if(!empty($_FILES["partner_logo_logos"]["name"]) && !empty($_FILES["partner_logo_logos"]["name"][$x]))
                    { 
                        $logoLogosArr = array();
                        $logoLogosArr['name']     = $_FILES["partner_logo_logos"]["name"][$x];
                        $logoLogosArr['type']     = $_FILES["partner_logo_logos"]["type"][$x];
                        $logoLogosArr['tmp_name'] = $_FILES["partner_logo_logos"]["tmp_name"][$x];
                        $logoLogosArr['error']    = $_FILES["partner_logo_logos"]["error"][$x];
                        $logoLogosArr['size']     = $_FILES["partner_logo_logos"]["size"][$x];
                        $_FILES['partner_logos_'.$x] = $logoLogosArr;
                        $logoLogos[$x] = 'partner_logos_'.$x;
                    }
                }
                
                unset($_FILES["partner_logo_logos"]);
                
                //pre($_FILES);
                
                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                            if(!in_array($key, $keyIcons) && !in_array($key, $logoIcons) && !in_array($key, $keyPdfs) && !in_array($key, $logoPdfs) && !in_array($key, $keyLogos) && !in_array($key, $logoLogos))
                            {
                               //pre($key);
                               $section_image      = do_upload('sections',$key); 
                               setUpdateSectionSetting($this->tbl_name, 'endorsement', $key, $section_image);
                            }
                        }
                    }
                }
                
                foreach ($keyIcons as $index => $icon_field)
                {
                    if(!empty($_FILES[$icon_field]['name']))
                    {
                        $keyinfo_icons  = do_upload('cmsimages',$icon_field);
    
                        if(!empty($keyElements) && !empty($keyElements[$index]))
                        {
                            $keyElements[$index]['icon']  = $keyinfo_icons;
                            setUpdateSectionSetting($this->tbl_name, 'endorsement', 'keyinfo_content', serialize($keyElements));
                        }
                    }
                }
                
                foreach ($keyPdfs as $index => $pdf_field)
                {
                    if(!empty($_FILES[$pdf_field]['name']))
                    {
                        $keyinfo_pdfs  = do_upload('cmspdfs',$pdf_field);
    
                        if(!empty($keyElements) && !empty($keyElements[$index]))
                        {
                            $keyElements[$index]['pdf']  = $keyinfo_pdfs;
                            setUpdateSectionSetting($this->tbl_name, 'endorsement', 'keyinfo_content', serialize($keyElements));
                        }
                    }
                }
                
                foreach ($keyLogos as $index => $logo_field)
                {
                    if(!empty($_FILES[$logo_field]['name']))
                    {
                        $keyinfo_logos  = do_upload('cmsimages',$logo_field);
    
                        if(!empty($keyElements) && !empty($keyElements[$index]))
                        {
                            $keyElements[$index]['logo']  = $keyinfo_logos;
                            setUpdateSectionSetting($this->tbl_name, 'endorsement', 'keyinfo_content', serialize($keyElements));
                        }
                    }
                }
                

                foreach ($logoIcons as $index => $icon_field)
                {
                    if(!empty($_FILES[$icon_field]['name']))
                    {
                        $logo_icons  = do_upload('cmsimages',$icon_field);
    
                        if(!empty($logoElements) && !empty($logoElements[$index]))
                        {
                            $logoElements[$index]['icon']  = $logo_icons;
                            setUpdateSectionSetting($this->tbl_name, 'endorsement', 'partner_logos', serialize($logoElements));
                        }
                    }
                }
                
                foreach ($logoPdfs as $index => $pdf_field)
                {
                    if(!empty($_FILES[$pdf_field]['name']))
                    {
                        $logo_pdfs  = do_upload('cmspdfs',$pdf_field);
    
                        if(!empty($logoElements) && !empty($logoElements[$index]))
                        {
                            $logoElements[$index]['pdf']  = $logo_pdfs;
                            setUpdateSectionSetting($this->tbl_name, 'endorsement', 'partner_logos', serialize($logoElements));
                        }
                    }
                }
                
                foreach ($logoLogos as $index => $logo_field)
                {
                    if(!empty($_FILES[$logo_field]['name']))
                    {
                        $logo_logos  = do_upload('cmsimages',$logo_field);
                        if(!empty($logoElements) && !empty($logoElements[$index]))
                        {
                            $logoElements[$index]['logo']  = $logo_logos;
                            setUpdateSectionSetting($this->tbl_name, 'endorsement', 'partner_logos', serialize($logoElements));
                        }
                    }
                }

                
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'endorsement');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/endorsements', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function referFriend()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'url', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'referfriend', $key, $value);
                }

                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                           $section_image      = do_upload('sections',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'referfriend', $key, $section_image);
                        }
                    }
                }
                
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'referfriend');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/referFriend', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function contactus()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'heading', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;                
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'contactus', $key, $value);
                }

                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                           $section_image      = do_upload('sections',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'contactus', $key, $section_image);
                        }
                    }
                }

                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'contactus');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/contactus', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function goingAbroad()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            //pre($_FILES);
            //pre($post_data); die;
            
            $fact_element_key   = $post_data['fact_element_key'];
            $fact_element_value = $post_data['fact_element_value'];
            $fact_element_image    = $post_data['fact_element_image'];
            
            $factsElements = array();
            if(!empty($fact_element_key) && count($fact_element_key) > 0)
            {
                $countS = count($fact_element_key);
                for ($n =0; $n<$countS; $n++)
                {
                    $rawSArray = array();
                    $rawSArray['key']   = !empty($fact_element_key[$n])?$fact_element_key[$n]:'';
                    $rawSArray['value'] = !empty($fact_element_value[$n])?$fact_element_value[$n]:'';
                    $rawSArray['icon']    = !empty($fact_element_image[$n])?$fact_element_image[$n]:'';
                    array_push($factsElements, $rawSArray);
                }
            }
            
            $post_data['facts_content'] = !empty($factsElements)?serialize($factsElements):'';
            unset($post_data['fact_element_key']);
            unset($post_data['fact_element_value']);
            unset($post_data['fact_element_image']);
            
            
            $tab_title   = $post_data['tab_title'];
            $tab_content = $post_data['tab_content'];
            $tab_old_image    = $post_data['tab_old_image'];
            
            $tabsContent = array();
            if(!empty($tab_title) && count($tab_title) > 0)
            {
                $countT = count($tab_title);
                for ($n =0; $n<$countT; $n++)
                {
                    $rawTArray = array();
                    $rawTArray['title']   = !empty($tab_title[$n])?$tab_title[$n]:'';
                    $rawTArray['content'] = !empty($tab_content[$n])?$tab_content[$n]:'';
                    $rawTArray['image']    = !empty($tab_old_image[$n])?$tab_old_image[$n]:'';
                    array_push($tabsContent, $rawTArray);
                }
            }
            
            $post_data['tabs_content'] = !empty($tabsContent)?serialize($tabsContent):'';
            unset($post_data['tab_title']);
            unset($post_data['tab_content']);
            unset($post_data['tab_old_image']);
            
            foreach ($post_data as $key => $value)
            {
                setUpdateSectionSetting($this->tbl_name, 'goingabroad', $key, $value);
            }
        
            $factsIcons = array();
            $cntK = count($_FILES["fact_element_icons"]["name"]);
            for($x=0; $x<$cntK; $x++)
            {
                $factIconsArr = array();
                if(!empty($_FILES["fact_element_icons"]["name"]) && !empty($_FILES["fact_element_icons"]["name"][$x]))
                {
                    $factIconsArr['name']     = $_FILES["fact_element_icons"]["name"][$x];
                    $factIconsArr['type']     = $_FILES["fact_element_icons"]["type"][$x];
                    $factIconsArr['tmp_name'] = $_FILES["fact_element_icons"]["tmp_name"][$x];
                    $factIconsArr['error']    = $_FILES["fact_element_icons"]["error"][$x];
                    $factIconsArr['size']     = $_FILES["fact_element_icons"]["size"][$x];
                    $_FILES['fact_icon_'.$x] = $factIconsArr;
                    $factsIcons[$x] = 'fact_icon_'.$x;
                }
            }

            unset($_FILES["fact_element_icons"]);
            
            $tabsImages = array();
            $cntFT = count($_FILES["tab_image"]["name"]);
            for($x=0; $x<$cntFT; $x++)
            {
                $tabImageArr = array();
                if(!empty($_FILES["tab_image"]["name"]) && !empty($_FILES["tab_image"]["name"][$x]))
                {
                    $tabImageArr['name']     = $_FILES["tab_image"]["name"][$x];
                    $tabImageArr['type']     = $_FILES["tab_image"]["type"][$x];
                    $tabImageArr['tmp_name'] = $_FILES["tab_image"]["tmp_name"][$x];
                    $tabImageArr['error']    = $_FILES["tab_image"]["error"][$x];
                    $tabImageArr['size']     = $_FILES["tab_image"]["size"][$x];
                    $_FILES['tab_image_'.$x] = $tabImageArr;
                    $tabsImages[$x] = 'tab_image_'.$x;
                }
            }

            unset($_FILES["tab_image"]);

            if(!empty($_FILES))
            {
                foreach ($_FILES as $key => $file)
                {
                    if(!empty($file['name']))
                    {
                        if(!in_array($key, $factsIcons) && !in_array($key, $tabsImages))
                        {
                           $section_image      = do_upload('cmsimages',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'goingabroad', $key, $section_image);
                        }
                    }
                }
            }

            foreach ($factsIcons as $index => $icon_field)
            {
                if(!empty($_FILES[$icon_field]['name']))
                {
                    $fact_icons  = do_upload('cmsimages',$icon_field);

                    if(!empty($factsElements) && !empty($factsElements[$index]))
                    {
                        $factsElements[$index]['icon']  = $fact_icons;
                        setUpdateSectionSetting($this->tbl_name, 'goingabroad', 'facts_content', serialize($factsElements));
                    }
                }
            }
            
            foreach ($tabsImages as $index => $tab_field)
            {
                if(!empty($_FILES[$tab_field]['name']))
                {
                    $tab_image  = do_upload('cmsimages',$tab_field);

                    if(!empty($tabsContent) && !empty($tabsContent[$index]))
                    {
                        $tabsContent[$index]['image']  = $tab_image;
                        setUpdateSectionSetting($this->tbl_name, 'goingabroad', 'tabs_content', serialize($tabsContent));
                    }
                }
            }
            //pre($post_data);
            //pre($_FILES);       die;

            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
            redirect(current_url(), 'refresh');
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'goingabroad');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/goingAbroad', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function bookdemo()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'heading', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;                
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'bookdemo', $key, $value);
                }

                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                           $section_image      = do_upload('sections',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'bookdemo', $key, $section_image);
                        }
                    }
                }

                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'bookdemo');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/bookdemo', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function testimonials()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'heading', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;                
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'testimonials', $key, $value);
                }

                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                           $section_image      = do_upload('sections',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'testimonials', $key, $section_image);
                        }
                    }
                }

                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'testimonials');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/testimonials', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function gallery()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'heading', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;                
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'gallery', $key, $value);
                }

                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                           $section_image      = do_upload('sections',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'gallery', $key, $section_image);
                        }
                    }
                }

                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'gallery');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/gallery', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function faqs()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'heading', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                //pre($post_data); die;                
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'faqs', $key, $value);
                }

                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                           $section_image      = do_upload('sections',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'faqs', $key, $section_image);
                        }
                    }
                }

                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'faqs');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/faqs', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function credentials()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('paypal_mode', 'paypal mode', 'required');
            $this->form_validation->set_rules('paypal_sandbox_email', 'paypal sandbox email', 'required');
            $this->form_validation->set_rules('paypal_live_email', 'paypal live email', 'required');
            
            if ($this->form_validation->run() != FALSE)
            {
                $data_arr = array(
                    'paypal_mode' => $this->input->post('paypal_mode'),
                    'paypal_sandbox_email' => $this->input->post('paypal_sandbox_email'),
                    'paypal_live_email' => $this->input->post('paypal_live_email')
                );
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'credentials', $key, $value);
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'credentials');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/credentials', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    
    
    public function blog()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'page title', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data_arr = array(
                    'page_title' => $this->input->post('page_title'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_key' => $this->input->post('meta_key')
                );
                
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'blog', $key, $value);
                }
                
                foreach ($_FILES as $key => $file) {
                    
                    if ($file["name"] != "") {
                        $uploaded_image = do_upload('sections', $key);
                        setUpdateSectionSetting($this->tbl_name, 'blog', $key, $uploaded_image);
                    }
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'blog');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/blog', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function products()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'page title', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data_arr = array(
                    'page_title' => $this->input->post('page_title'),
                    'page_content' => $this->input->post('page_content'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_key' => $this->input->post('meta_key')
                );
                
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'product', $key, $value);
                }
                
                foreach ($_FILES as $key => $file) {
                    
                    if ($file["name"] != "") {
                        $uploaded_image = do_upload('sections', $key);
                        setUpdateSectionSetting($this->tbl_name, 'product', $key, $uploaded_image);
                    }
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'product');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/product', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function discounts()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'page title', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data_arr = array(
                    'page_title' => $this->input->post('page_title'),
                    'page_content' => $this->input->post('page_content'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_key' => $this->input->post('meta_key')
                );
                
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'discounts', $key, $value);
                }
                
                foreach ($_FILES as $key => $file) {
                    
                    if ($file["name"] != "") {
                        $uploaded_image = do_upload('sections', $key);
                        setUpdateSectionSetting($this->tbl_name, 'discounts', $key, $uploaded_image);
                    }
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'discounts');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/discounts', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    public function involement()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'page title', 'required');
            $this->form_validation->set_rules('stripe_text', 'stripe box text', 'required');
            $this->form_validation->set_rules('lb_heading1', 'heading 1', 'required');
            $this->form_validation->set_rules('lb_heading2', 'heading 2', 'required');
            $this->form_validation->set_rules('lb_content', 'content', 'required');
            
            if ($this->form_validation->run() != FALSE) {
                $data_arr = array(
                    'page_title' => $this->input->post('page_title'),
                    'stripe_text' => $this->input->post('stripe_text'),
                    'lb_heading1' => $this->input->post('lb_heading1'),
                    'lb_heading2' => $this->input->post('lb_heading2'),
                    'lb_content' => $this->input->post('lb_content'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_key' => $this->input->post('meta_key')
                );
                
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'involement', $key, $value);
                }
                
                foreach ($_FILES as $key => $file) {
                    
                    if ($file["name"] != "") {
                        $uploaded_image = do_upload('sections', $key);
                        setUpdateSectionSetting($this->tbl_name, 'involement', $key, $uploaded_image);
                    }
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'involement');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/involement', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function donations()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'page title', 'required');
            $this->form_validation->set_rules('page_content', 'page content', 'required');
            $this->form_validation->set_rules('heading', 'heading', 'required');
            $this->form_validation->set_rules('donation_amount[]', 'donation amount', 'required');
            
            if ($this->form_validation->run() != FALSE) {
                $data_arr = array(
                    'page_title' => $this->input->post('page_title'),
                    'page_content' => $this->input->post('page_content'),
                    'heading' => $this->input->post('heading'),
                    'donation_amount' => implode(",", $this->input->post('donation_amount')),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_key' => $this->input->post('meta_key')
                );
                
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'donations', $key, $value);
                }
                
                foreach ($_FILES as $key => $file) {
                    
                    if ($file["name"] != "") {
                        $uploaded_image = do_upload('donations', $key);
                        setUpdateSectionSetting($this->tbl_name, 'donations', $key, $uploaded_image);
                    }
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'donations');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/donations', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function events()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'page title', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data_arr = array(
                    'page_title' => $this->input->post('page_title'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_key' => $this->input->post('meta_key')
                );
                
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'events', $key, $value);
                }
                
                foreach ($_FILES as $key => $file) {
                    
                    if ($file["name"] != "") {
                        $uploaded_image = do_upload('events', $key);
                        setUpdateSectionSetting($this->tbl_name, 'events', $key, $uploaded_image);
                    }
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'events');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/events', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function services()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'page title', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data_arr = array(
                    'page_title' => $this->input->post('page_title'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_key' => $this->input->post('meta_key')
                );
                
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'services', $key, $value);
                }
                
                foreach ($_FILES as $key => $file) {
                    
                    if ($file["name"] != "") {
                        $uploaded_image = do_upload('services', $key);
                        setUpdateSectionSetting($this->tbl_name, 'services', $key, $uploaded_image);
                    }
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'services');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/services', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function cards()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'page title', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data_arr = array(
                    'page_title' => $this->input->post('page_title'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_key' => $this->input->post('meta_key')
                );
                
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'services', $key, $value);
                }
                
                foreach ($_FILES as $key => $file) {
                    
                    if ($file["name"] != "") {
                        $uploaded_image = do_upload('services', $key);
                        setUpdateSectionSetting($this->tbl_name, 'services', $key, $uploaded_image);
                    }
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'services');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/cards', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function users()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('page_title', 'page title', 'required');
            if ($this->form_validation->run() != FALSE) {
                $data_arr = array(
                    'page_title' => $this->input->post('page_title'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_key' => $this->input->post('meta_key')
                );
                
                foreach ($data_arr as $key => $value) {
                    setUpdateSectionSetting($this->tbl_name, 'users', $key, $value);
                }
                
                foreach ($_FILES as $key => $file) {
                    
                    if ($file["name"] != "") {
                        $uploaded_image = do_upload('users', $key);
                        setUpdateSectionSetting($this->tbl_name, 'users', $key, $uploaded_image);
                    }
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['collection'] = getSectionDataCollection($this->tbl_name, 'users');
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/users', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function jobsite_settings()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('infobox_heading', 'url', 'required');
            $this->form_validation->set_rules('keyinfo_heading', 'heading', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                $key_elements_titles   = $post_data['key_elements_title'];
                $key_elements_contents = $post_data['key_elements_content'];
                $key_elements_image    = $post_data['key_elements_image'];
                $keyElements = array();
                if(!empty($key_elements_titles) && !empty($key_elements_titles[0]))
                {
                    $countS = count($key_elements_titles);
                    for ($n =0; $n<$countS; $n++)
                    {
                        $rawSArray = array();
                        $rawSArray['title']   = $key_elements_titles[$n];
                        $rawSArray['content'] = $key_elements_contents[$n];
                        $rawSArray['icon']    = $key_elements_image[$n];                        
                        array_push($keyElements, $rawSArray);
                    }
                }
                $post_data['keyinfo_content'] = !empty($keyElements)?serialize($keyElements):'';
                unset($post_data['key_elements_title']);
                unset($post_data['key_elements_content']);
                unset($post_data['key_elements_image']);

                //pre($post_data); die;
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'jobsite_settings', $key, $value);
                }

                
                $keyIcons = array();
                if(!empty($_FILES["key_elements_icons"]["name"]) && !empty($_FILES["key_elements_icons"]["name"][0]))
                {   
                    $cntK = count($_FILES["key_elements_icons"]["name"]);
                    for($x=0; $x<$cntK; $x++)
                    {
                        $keyIconsArr = array();

                        $keyIconsArr['name']     = $_FILES["key_elements_icons"]["name"][$x];
                        $keyIconsArr['type']     = $_FILES["key_elements_icons"]["type"][$x];
                        $keyIconsArr['tmp_name'] = $_FILES["key_elements_icons"]["tmp_name"][$x];
                        $keyIconsArr['error']    = $_FILES["key_elements_icons"]["error"][$x];
                        $keyIconsArr['size']     = $_FILES["key_elements_icons"]["size"][$x];
                        $_FILES['keyinfo_icons_'.$x] = $keyIconsArr;
                        $keyIcons[] = 'keyinfo_icons_'.$x;
                    }
                }

                unset($_FILES["key_elements_icons"]);

                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']) && !in_array($key, $keyIcons))
                        {
                           $section_image      = do_upload('sections',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'jobsite_settings', $key, $section_image);
                        }
                    }
                }

                $y = 0;
                foreach ($keyIcons as $icon_field)
                {
                    if(!empty($_FILES[$icon_field]['name']))
                    {
                        $keyinfo_icons  = do_upload('sections',$icon_field);

                        if(!empty($keyElements) && !empty($keyElements[$y]))
                        {
                            $keyElements[$y]['icon']  = $keyinfo_icons;
                            setUpdateSectionSetting($this->tbl_name, 'jobsite_settings', 'keyinfo_content', serialize($keyElements));
                        }
                    }
                                           
                    $y++;
                }
                //pre($post_data);
                //pre($_FILES);       die;

                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'jobsite_settings');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/jobsite_settings', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function jobsite_home()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {        
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');            
            $this->form_validation->set_rules('heading', 'heading', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                $infobox_title   = $post_data['infobox_title'];
                $infobox_content = $post_data['infobox_content'];

                $infoBox = array();
                if(!empty($infobox_title) && !empty($infobox_title[0]))
                {
                    $countS = count($infobox_title);
                    for ($n =0; $n<$countS; $n++)
                    {
                        $rawIArray = array();
                        $rawIArray['title']   = $infobox_title[$n];
                        $rawIArray['content'] = $infobox_content[$n];                       
                        array_push($infoBox, $rawIArray);
                    }
                }
                $post_data['infobox_data'] = !empty($infoBox)?serialize($infoBox):'';
                unset($post_data['infobox_title']);
                unset($post_data['infobox_content']);

                $gallery_image_edit    = !empty($post_data['gallery_image_edit'])?$post_data['gallery_image_edit']:array();
                unset($post_data['gallery_image_edit']);


                $galleryImgEdit = array();
                if(!empty($gallery_image_edit))
                {
                    $countS = count($gallery_image_edit);
                    for ($n =0; $n<$countS; $n++)
                    {
                        $rawIArray = array();
                        $rawIArray['image']   = $gallery_image_edit[$n];                      
                        array_push($galleryImgEdit, $rawIArray);
                    }

                    $post_data['gallery_image'] = !empty($galleryImgEdit)?serialize($galleryImgEdit):'';
                }
                //pre($post_data);
                
                foreach ($post_data as $key => $value)
                {
                    setUpdateSectionSetting($this->tbl_name, 'jobsite_home', $key, $value);
                }

                $galleryImages = !empty($_FILES['gallery_image'])?$_FILES['gallery_image']:'';                
                unset($_FILES['gallery_image']);

                $galleyImageArr = array();
                if(!empty($galleryImages["name"]))
                {   
                    $cntK = count($galleryImages["name"]);
                    for($x=0; $x<$cntK; $x++)
                    {
                        $gallImgArr = array();

                        $gallImgArr['name']     = $galleryImages["name"][$x];
                        $gallImgArr['type']     = $galleryImages["type"][$x];
                        $gallImgArr['tmp_name'] = $galleryImages["tmp_name"][$x];
                        $gallImgArr['error']    = $galleryImages["error"][$x];
                        $gallImgArr['size']     = $galleryImages["size"][$x];
                        $_FILES['gallery_image_'.$x] = $gallImgArr;
                        $galleyImageArr[] = 'gallery_image_'.$x;
                    }
                }

                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']) && !in_array($key, $galleyImageArr))
                        {
                           $section_image      = do_upload('sections',$key); 
                           setUpdateSectionSetting($this->tbl_name, 'jobsite_home', $key, $section_image);
                        }
                    }
                }

                $y = 0;
                foreach ($galleyImageArr as $galleryImg)
                {
                    if(!empty($_FILES[$galleryImg]['name']))
                    {
                        $gallery_image_path  = do_upload('sections',$galleryImg);

                        if(!empty($gallery_image_path))
                        {
                            $galleryImgEdit[$y]['image']  = $gallery_image_path;
                        }
                        //pre($galleryImgEdit);
                        setUpdateSectionSetting($this->tbl_name, 'jobsite_home', 'gallery_image', serialize($galleryImgEdit));
                    }
                                           
                    $y++;
                }
                //pre($post_data);
                //pre($_FILES);       die;

                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been update successfully'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['collection'] = getSectionDataCollection($this->tbl_name, 'jobsite_home');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/sectionsettings/jobsite_home', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function valid_url($str)
    {
        if ($str == '') {
            return TRUE;
        } else {
            return (filter_var($str, FILTER_VALIDATE_URL) !== FALSE);
        }
    }
}