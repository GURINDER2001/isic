<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smtp extends CI_Controller
{
    public $tbl_name = "smtp";

    function __construct()
    {
        parent::__construct();
        $this->load->model('smtp_model');
        
    }    
    
    public function index()
    {
        CheckLoginSession();
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            foreach ($post_data as $key => $value)
            {
                if(!empty($value))
                {
                    $keyExist = $this->master_model->isExist($this->tbl_name,array('name'=>$key));
                    if(!empty($keyExist))
                    {
                        $this->master_model->setUpdateRecord($this->tbl_name, array('value' => $value), array('name' => $key));
                    }
                    else
                    {
                        $this->master_model->setInsertData($this->tbl_name, array('name'=>$key,'value' => $value));
                    }
                }
            }
            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been saved successfully !!'));
            redirect(current_url(), 'refresh');
        }
        
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/settings/smtp', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
}