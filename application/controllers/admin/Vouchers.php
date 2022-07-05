<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouchers extends CI_Controller {

	public $tbl_name = "vouchers";

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
		$this->load->view('admin/vouchers/list',$data);
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
			$this->form_validation->set_rules('voucher', 'voucher', 'required');
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
                
				$data = array(
    				'name' => $this->input->post('name'),
    				'slug' => $slug,
    				'voucher' => $this->input->post('voucher'),
    				'description' => $this->input->post('description'),
    				'status'=>1,
    				//'meta_title' => $this->input->post('meta_title'),
    				//'meta_description' => $this->input->post('meta_description'),
    				//'meta_key' => $this->input->post('meta_key')	        	             
				);			
				$insert_id=setInsertData($this->tbl_name, $data);
				if ($insert_id > 0)
                {
                    if (!empty($_FILES["banner_img"]["name"]))
                    {
                        $banner_img      = do_upload('vouchers','banner_img');
                        $data_banner_img = array('banner_img' => $banner_img);
                        setUpdateData($this->tbl_name, $data_banner_img, $insert_id);
                    }
                    
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/vouchers', 'refresh');
                }
			}
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/vouchers/add',$data);
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
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
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
                $slug = $this->slug->create_uri($data,$edit_id);
                
				$data = array(
    				'name' => $this->input->post('name'),
    				'slug' => $slug,
    				'voucher' => $this->input->post('voucher'),
    				'description' => $this->input->post('description'),
    				//'meta_title' => $this->input->post('meta_title'),
    				//'meta_description' => $this->input->post('meta_description'),
    				//'meta_key' => $this->input->post('meta_key')	        	             
				); 
				
				//pre($data); die;
				setUpdateData($this->tbl_name, $data, $edit_id);
                if (!empty($_FILES["banner_img"]["name"]))
                {
                    $banner_img      = do_upload('vouchers','banner_img');
                    //echo $banner_img; die;
                    $data_banner_img = array('banner_img' => $banner_img);
                    setUpdateData($this->tbl_name, $data_banner_img, $edit_id);
                }
                
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
				redirect(current_url(),'refresh'); 
			}
		}
		$data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/vouchers/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}
	
	
	public function view()
	{
		CheckLoginSession();
		$post_data = $this->input->post();
		$rec_id   = $this->uri->segment(4);

		$data['rec'] = $record = getDataRecord($this->tbl_name, array('id' => $rec_id));
		
		$voucherLogsArr = array();
		$vouchers_log = getDataRecords('vouchers_logs');
		if(!empty($vouchers_log))
		{
		    foreach($vouchers_log as $row)
		    {
                $voucherLogsArr[$row->voucher][] = $row->viewCount;
		    }
		}
		
		$vouchers = !empty($record['voucher'])?explode(",",$record['voucher']):array();
		//pre($vouchers); die;
		$voucherDataArr = array();
		
		if(!empty($vouchers))
		{
		    foreach($vouchers as $voucher)
		    {
		        $dataRow = array();
		        $dataRow['voucher'] = $voucher;
		        if(array_key_exists($voucher,$voucherLogsArr))
		        {
		            $voucherCountArr = !empty($voucherLogsArr[$voucher])?$voucherLogsArr[$voucher]:array();
		            $dataRow['is_viewed'] = 1;
		            $dataRow['view_count'] = array_sum($voucherCountArr);
		        }
		        else
		        {
		            $dataRow['is_viewed'] = 0;
		            $dataRow['view_count'] = 0;
		        }
		        
		        $voucherDataArr[$voucher] = $dataRow;
		    }
		}
		
		$data['vouchers_logs'] = $voucherDataArr;
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/vouchers/view',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/vouchers', 'refresh');
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
            redirect('admin/vouchers', 'refresh');
        }
    }
}