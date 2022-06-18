<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class products extends CI_Controller {

	public $tbl_name = "products";

	function __construct() {
		parent::__construct();
		$this->load->model('master_model');   
	}

	public function index()
	{
		CheckLoginSession();
		$data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/products/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		CheckLoginSession();
		$data = array();
		$post_data=$this->input->post();
		if(!empty($post_data)) {        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			$this->form_validation->set_rules('api_card_id', 'api card id', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$config = array(
                    'table' => $this->tbl_name,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $this->input->post('name'),
                );
                $slug = $this->slug->create_uri($data);
                
                $key_elements_title   = $post_data['key_elements_title'];
                $key_elements_content    = $post_data['key_elements_content'];
                
                $keyElements = array();
                if(!empty($key_elements_title))
                {
                    $countS = count($key_elements_title);
                    for ($n =0; $n<$countS; $n++)
                    {
                        if(!empty($key_elements_title[$n]))
                        {
                            $rawSArray = array();
                            $rawSArray['title']   = !empty($key_elements_title[$n])?$key_elements_title[$n]:'';
                            $rawSArray['content']    = !empty($key_elements_content[$n])?$key_elements_content[$n]:'';
                            array_push($keyElements, $rawSArray);
                        }
                    }
                }
                
                $keyinfo_content = !empty($keyElements)?serialize($keyElements):'';
                unset($post_data['key_elements_title']);
                unset($post_data['key_elements_content']);
                
				$data = array(
    				'name' => $this->input->post('name'),
    				'slug' => $slug,
    				'api_card_id' => $this->input->post('api_card_id'),
    				'summary' => $this->input->post('summary'),
    				'description' => $this->input->post('description'),
    				'keyinfo_content' => $keyinfo_content,
    				'price' => $this->input->post('price'),
    				'infobox_heading' => $this->input->post('infobox_heading'),
    				'infobox_content' => $this->input->post('infobox_content'),
    				'infobox2_heading' => $this->input->post('infobox2_heading'),
    				'infobox2_content' => $this->input->post('infobox2_content'),
    				'infobox3_heading' => $this->input->post('infobox3_heading'),
    				'infobox3_content' => $this->input->post('infobox3_content'),
    				'cta_heading' => $this->input->post('cta_heading'),
    				'cta_buttonlabel' => $this->input->post('cta_buttonlabel'),
    				'cta_buttonlink' => $this->input->post('cta_buttonlink'),
    				'status'=>1,
    				'meta_title' => $this->input->post('meta_title'),
    				'meta_description' => $this->input->post('meta_description'),
    				'meta_key' => $this->input->post('meta_key')	        	             
				);
				
				$insert_id=setInsertData($this->tbl_name, $data);
				if ($insert_id > 0)
                {
                    if(!empty($_FILES))
                    {
                        foreach ($_FILES as $key => $file)
                        {
                            if(!empty($file['name']))
                            {
                                $products_image      = do_upload('products',$key); 
                                setUpdateData($this->tbl_name, array($key => $products_image), $insert_id);
                            }
                        }
                    }
                    
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/products', 'refresh');
                }
			}
		}   
		$data['options_products'] = getOptions('products', 'Select products',array('status'=>1));         
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/products/add',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function edit()
	{
		CheckLoginSession();
		$post_data = $this->input->post();
		$edit_id   = $this->uri->segment(4);

		if(!empty($post_data))
		{       
		    //pre($post_data); die;
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			$this->form_validation->set_rules('api_card_id', 'api card id', 'required');
			
			if($this->form_validation->run() != FALSE)
			{
				$slug_str=$this->input->post('slug');
                $config = array(
                    'table' => $this->tbl_name,
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
                
                $key_elements_title   = $post_data['key_elements_title'];
                $key_elements_content    = $post_data['key_elements_content'];
                //pre($key_elements_title);
                $keyElements = array();
                if(!empty($key_elements_title))
                {
                    $countS = count($key_elements_title);
                    for ($n =0; $n<$countS; $n++)
                    {
                        if(!empty($key_elements_title[$n]))
                        {
                            $rawSArray = array();
                            $rawSArray['title']   = !empty($key_elements_title[$n])?$key_elements_title[$n]:'';
                            $rawSArray['content']    = !empty($key_elements_content[$n])?$key_elements_content[$n]:'';
                            array_push($keyElements, $rawSArray);
                        }
                    }
                }
                
                //pre($keyElements); die;
                
                $keyinfo_content = !empty($keyElements)?serialize($keyElements):'';
                unset($post_data['key_elements_title']);
                unset($post_data['key_elements_content']);
                
				$data = array(
    				'name' => $this->input->post('name'),
    				'slug' => $slug,
    				'api_card_id' => $this->input->post('api_card_id'),
    				'summary' => $this->input->post('summary'),
    				'description' => $this->input->post('description'),
    				'keyinfo_content' => $keyinfo_content,
    				'price' => $this->input->post('price'),
    				'infobox_heading' => $this->input->post('infobox_heading'),
    				'infobox_content' => $this->input->post('infobox_content'),
    				'infobox2_heading' => $this->input->post('infobox2_heading'),
    				'infobox2_content' => $this->input->post('infobox2_content'),
    				'infobox3_heading' => $this->input->post('infobox3_heading'),
    				'infobox3_content' => $this->input->post('infobox3_content'),
    				'cta_heading' => $this->input->post('cta_heading'),
    				'cta_buttonlabel' => $this->input->post('cta_buttonlabel'),
    				'cta_buttonlink' => $this->input->post('cta_buttonlink'),
    				'meta_title' => $this->input->post('meta_title'),
    				'meta_description' => $this->input->post('meta_description'),
    				'meta_key' => $this->input->post('meta_key')	        	             
				); 
				
				$record_id= setUpdateData($this->tbl_name, $data, $edit_id);
				if($record_id>0)
				{
                    if(!empty($_FILES))
                    {
                        foreach ($_FILES as $key => $file)
                        {
                            if(!empty($file['name']))
                            {
                                $products_image      = do_upload('products',$key); 
                                setUpdateData($this->tbl_name, array($key => $products_image), $record_id);
                            }
                        }
                    }
                    
					$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
					redirect('admin/products','refresh');             
				}
			}
		}
		$data['options_products'] = getOptions('products', 'Select products', array('status'=>1)); 
		$data['editdata'] 		  = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/products/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/products', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        if ($rec_id > 0)
        {
            $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
            redirect('admin/products', 'refresh');
        }
    }
}