<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->model('sectionsettings_model');
    }

    public $tbl_name ='blogs';
    public $tbl_cat ='blogs_cat';


    public function index()
    {

    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('blog');
    	

    	/* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('blog','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('blog','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('blog','meta_key');
        /* SEO : Meta data : End */
        
        $whereConArr = array('status'=>1);
        $totalRows = getRowCount($this->tbl_name,$whereConArr);
        $perpage = 8;
        $limit = 5;
        $url = base_url('blog');
        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
        $offset  = $page * $perpage;
        
	   	$data['records'] = get_recordsWithLimit($this->tbl_name,$whereConArr,$perpage,$offset);
	   	$data['paginations'] = frontPagination($totalRows,$perpage,$limit,$url);
	   	
	   	$data['cats'] = get_records($this->tbl_cat,array('status'=>1));
	   	
	   	//pre($data['paginations']); die;
	   	$data['popular_records'] = get_recordsWithLimit($this->tbl_name,array('status'=>1),4);
	   	
	   	//$data['discounts'] = callDMDiscountAPI('providers?availableOnline=true&limit=4');
	   	$data['discounts'] = get_records('tbl_discounts',array('status'=>1,'FIND_IN_SET("blog", `display_section`) <>'=>0,));
		$this->load->view('front/include/header',$data);
		$this->load->view('front/blog/index',$data);
		$this->load->view('front/include/footer');
	}
	
	public function category($slug)
    {

    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('blog');
    	

    	/* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('blog','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('blog','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('blog','meta_key');
        /* SEO : Meta data : End */
        
        $current_cat = get_record($this->tbl_cat,array('status'=>1,'slug'=>$slug));
        $whereConArr = array('status'=>1);
        $catId = $current_cat->id;
        //$whereConArr['FIND_IN_SET("blog", `display_section`) <>'] = 0;
        if(!empty($catId))
        {
            $whereConArr['FIND_IN_SET('.$catId.', `category`) <>'] = 0;
        }
        
        
        $totalRows = getRowCount($this->tbl_name,$whereConArr);
        $perpage = 8;
        $limit = 5;
        $url = base_url('blog/category/'.$slug);
        $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
        $offset  = $page * $perpage;
        
	   	$data['records'] = get_recordsWithLimit($this->tbl_name,$whereConArr,$perpage,$offset);
	   	$data['paginations'] = frontPagination($totalRows,$perpage,$limit,$url);
	   	
	   	$data['cats'] = get_records($this->tbl_cat,array('status'=>1));
	   	
	   	//pre($data['paginations']); die;
	   	$data['popular_records'] = get_recordsWithLimit($this->tbl_name,array('status'=>1),4);
	   	//$data['discounts'] = callDMDiscountAPI('providers?availableOnline=true&limit=4');
	   	$whereConArr['FIND_IN_SET("blog", `display_section`) <>'] = 0;
	   	$data['discounts'] = get_records('tbl_discounts',array('status'=>1,'FIND_IN_SET("blog", `display_section`) <>'=>0,'FIND_IN_SET('.$catId.', `blog_cat_id`) <>'=>0));
		$this->load->view('front/include/header',$data);
		$this->load->view('front/blog/category',$data);
		$this->load->view('front/include/footer');
	}

	public function detail($slug)
    {

    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('blog');
    	$dataCollection = get_record($this->tbl_name,array('slug'=>$slug));
    	$data['record']	= $dataCollection;
    	
    	$data['recents'] = get_recordsWithLimit($this->tbl_name,array('status'=>1),5);
    	$data['cats'] = get_records($this->tbl_cat,array('status'=>1));

    	/* SEO : Meta data : Start */
        $data['meta_title'] = !empty($dataCollection->meta_title)?$dataCollection->meta_title:$dataCollection->name;
        $data['meta_description'] = $dataCollection->meta_description;
        $data['meta_key'] = $dataCollection->meta_key;
        /* SEO : Meta data : End */
        //$data['discounts'] = callDMDiscountAPI('providers?availableOnline=true&limit=4');
        
        $catIds = !empty($dataCollection->category)?$dataCollection->category:array();

        $this->db->select('*');
        $this->db->from('tbl_discounts');
        $this->db->where('status', 1);
        if(!empty($catIds))
        {
            foreach($catIds as $catId)
            {
                $this->db->or_where('FIND_IN_SET('.$catId.', `category`) <>', 0);
            }
        }
        $this->db->limit(4,0);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            $discounts = $query->result();
        } else {
            $discounts = array();
        }
        
        
        $data['discounts'] = $discounts;
        
        //$data['discounts'] = get_recordsWithLimit('tbl_discounts',array('status'=>1),4);
        
		$this->load->view('front/include/header',$data);
		$this->load->view('front/blog/detail',$data);		
		$this->load->view('front/include/footer');
	}
	
	public function search()
	{
		$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('blog');
    	
        $s = $this->input->get('s');
    	/* SEO : Meta data : Start */
        $data['meta_title'] = 'Search Result';
        /* SEO : Meta data : End */
        
        $whereConArr = array('status'=>1);
        
        $totalRows = getRowCount($this->tbl_name,$whereConArr,'name',$s);
        $perpage = 8;
        $limit = 5;
        $url = base_url('search');
        $page = $this->uri->segment(2) ? ($this->uri->segment(2) - 1) : 0;
        $offset  = $page * $perpage;
        
	   	$data['records'] = get_recordsWithLimit($this->tbl_name,$whereConArr,$perpage,$offset,'id','DESC','name',$s);
	   	$data['paginations'] = frontPagination($totalRows,$perpage,$limit,$url);
	   	
	   	//pre($data);
	   	
		$this->load->view('front/include/header',$data);
		$this->load->view('front/blog/search',$data);
		$this->load->view('front/include/footer');
	}

}