<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email extends CI_Controller {
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
		$this->load->helper('directory');
	}

	function index(){
		CheckLoginSession();
		$data = array();
		$path = APPPATH.'email-templates/';
		$map = directory_map(APPPATH.'email-templates/', FALSE, TRUE);
		//sort($map);
		foreach($map as $m){

			if(file_exists( $path.$m)){
		       $html = @file_get_contents( $path.$m );
		       $nodes = extract_tags( $html, 'table' );
		       if(!empty($nodes[0]['attributes']['template'])){
		          $name[$m] = $nodes[0]['attributes']['template'];
		        }else{
		         	$name[$m] = $m;
		        }
		     }

		}
		asort($name);
		$data['file_list'] = $name;		
		$data['path'] = APPPATH.'email-templates/';
		$this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/email/lists', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
	}

	function edit()
	{
		CheckLoginSession();
		$filename = $this->uri->segment(4);
		$data['path'] = APPPATH.'email-templates/';
		$data['filename'] = $filename;
		if(!empty($this->input->post('code'))){
			$content = $this->input->post('code');
			if(file_exists($data['path'].$filename)){
				file_put_contents($data['path'].$filename,$content);
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
			}else{
				$this->session->set_flashdata('notification', array('error' => 1,'message' => 'File not found !!'));
			}
		}

		$this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/email/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
	}
}