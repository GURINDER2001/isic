<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Involvements extends CI_Controller {
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
        $this->load->model('involvements_model');
        $this->load->model('sectionsettings_model');
        $this->load->model('clients_model');
    }


    public $tbl_name ='true_involvements';

    public function index()
    {
    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('involement');

    	/* SEO : Meta data : Start */
        $data['meta_title'] = $this->sectionsettings_model->getSectionSettingByKey('involement','meta_title');
        $data['meta_description'] = $this->sectionsettings_model->getSectionSettingByKey('involement','meta_description');
        $data['meta_key'] = $this->sectionsettings_model->getSectionSettingByKey('involement','meta_key');
        /* SEO : Meta data : End */

    	$data['logos'] = $this->clients_model->getDataCollection();
    	$data['records'] = getDataCollection($this->tbl_name);
		$this->load->view('front/include/header',$data);		
		$this->load->view('front/involvements/index',$data);		
		$this->load->view('front/include/footer');		
	}

	public function detail($slug)
    {
    	$data = array();
    	$data['pageContent'] = $this->sectionsettings_model->getSectionDataCollection('involement');
    	
    	$dataCollection = $this->involvements_model->getSinglePageDataCollection($slug);
    	$data['record']	= $dataCollection;

    	/* SEO : Meta data : Start */
        $data['meta_title'] = !empty($dataCollection->meta_title)?$dataCollection->meta_title:$dataCollection->name;
        $data['meta_description'] = $dataCollection->meta_description;
        $data['meta_key'] = $dataCollection->meta_key;
        /* SEO : Meta data : End */

		$this->load->view('front/include/header',$data);		
		$this->load->view('front/involvements/detail',$data);		
		$this->load->view('front/include/footer');		
	}
}