<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->model('sectionsettings_model');
    }

    public $tbl_name ='news';


    public function index()
    {

    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('news');

    	/* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('news','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('news','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('news','meta_key');
        /* SEO : Meta data : End */

	   	//$data['records'] = get_records($this->tbl_name,array('status'=>1));
	   	
	   	$whereConArr = array('status'=>1);
        $totalRows = getRowCount($this->tbl_name,$whereConArr);
        $perpage = 5;
        $limit = 5;
        $url = base_url('news');
        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
        $offset  = $page * $perpage;
        
	   	$data['records'] = get_recordsWithLimit($this->tbl_name,$whereConArr,$perpage,$offset);
	   	$data['paginations'] = frontPagination($totalRows,$perpage,$limit,$url);
	   	
	   	
		$this->load->view('front/include/header',$data);
		$this->load->view('front/news/index',$data);
		$this->load->view('front/include/footer');
	}

	public function detail($slug)
    {

    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('news');
    	$dataCollection = get_record($this->tbl_name,array('slug'=>$slug));
    	$data['record']	= $dataCollection;

    	/* SEO : Meta data : Start */
        $data['meta_title'] = !empty($dataCollection->meta_title)?$dataCollection->meta_title:$dataCollection->name;
        $data['meta_description'] = $dataCollection->meta_description;
        $data['meta_key'] = $dataCollection->meta_key;
        /* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);
		$this->load->view('front/news/detail',$data);		
		$this->load->view('front/include/footer');
	}

}