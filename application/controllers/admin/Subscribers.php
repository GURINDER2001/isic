<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends CI_Controller {

	public $tbl_name = "subscribers";

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		CheckLoginSession();
		$data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/subscribers/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}
	
	public function export2()
	{
		CheckLoginSession();
		$data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/subscribers/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}
	
	public function export(){
	        CheckLoginSession();
            $usersData = getDataFilteredRecordsArr($this->tbl_name, array(), 0, '', "DESC",'id,subscriber_email,subscriber_name,subscription_status,createdOn');
            
            //pre($usersData); die;
            
            $filename = 'subscribers_'.date('Ymd').'.csv';
		
		    header("Content-Description: File Transfer");
		    header("Content-Disposition: attachment; filename=$filename");
		    header("Content-Type: application/csv; "); 
            header("Pragma: no-cache");
            header("Expires: 0");
            
            // file creation
    		$file = fopen('php://output', 'w');
    
    		$header = array("Id","Subscriber Email","Subscriber Name","Status","Created On");
    		fputcsv($file, $header);
    
    		foreach ($usersData as $key=>$line){
    		 fputcsv($file,$line);
    		}
    
    		fclose($file);
    		exit;
    }

	public function add()
	{
		CheckLoginSession();
		$data = array();
		$post_data=$this->input->post();
		if(!empty($post_data))
		{        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('username', 'user name', 'required');
			$this->form_validation->set_rules('destination', 'destination', 'required');
			$this->form_validation->set_rules('content', 'content', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$post_data['status'] = 1;
				$insert_id=setInsertData($this->tbl_name, $post_data);
				if ($insert_id > 0)
                {
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/subscribers', 'refresh');
                }
			}
		}

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/subscribers/add',$data);
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
			$this->form_validation->set_rules('username', 'user name', 'required');
			$this->form_validation->set_rules('destination', 'destination', 'required');
			$this->form_validation->set_rules('content', 'content', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$record_id= setUpdateData($this->tbl_name, $post_data, $edit_id);
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
				redirect(current_url(),'refresh');
			}
		}
		
		$data['editdata'] 		  = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/subscribers/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/subscribers', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/subscribers', 'refresh');
    }

    public function subscription_status()
    {
        $id             = $this->uri->segment(4);
        $subscriber 	= getDataRecord($this->tbl_name, array('id' => $id));
        $data['subscription_status'] = (empty($subscriber['subscription_status']) || $subscriber['subscription_status'] == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Subsciption Status has been updated successfully !!'));
        redirect('admin/subscribers', 'refresh');
    }    
}