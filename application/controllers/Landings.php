<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landings extends CI_Controller {
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

    public $tbl_landings ='landings';
    public $tbl_landingsmeta ='landings_meta';

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
		$this->load->view('front/landings/index',$data);		
		$this->load->view('front/include/footer');		
	}
	
	public function details($slug)
	{
		$data = array();
		$dataCollection = $this->master_model->get_recordArr($this->tbl_landings,array('slug'=>$slug));
		//pre($dataCollection);
		
		if(!empty($dataCollection))
		{
		    $data['pageContent']	=	$dataCollection;
		    $data['pageMeta'] = $this->master_model->get_records($this->tbl_landingsmeta, array('page_id' => $dataCollection['id']));
			/* SEO : Meta data : Start */
			$data['meta_title'] = !empty($dataCollection['meta_title'])?$dataCollection['meta_title']:$dataCollection['name'];
			$data['meta_description'] = !empty($dataCollection['meta_description'])?$dataCollection['meta_description']:'';
			$data['meta_key'] = !empty($dataCollection['meta_key'])?$dataCollection['meta_key']:'';
			/* SEO : Meta data : End */			
		}
		
		$layout = !empty($dataCollection['layout'])?$dataCollection['layout']:0;
		$this->load->view('front/include/header',$data);
		$this->load->view('front/landings/layout1',$data);
		/*if(!empty($layout) && $layout == 2)
        {
            $this->load->view('front/landings/layout3',$data);
        }
        else if(!empty($layout) && $layout == 1)
        {
            $this->load->view('front/landings/layout2',$data);
        }
        else
        {
            $this->load->view('front/landings/layout1',$data);
        }*/
        
		$this->load->view('front/include/footer',$data);		
	}

}