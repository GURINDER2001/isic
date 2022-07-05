<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holidays extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    public $tbl_name = "holidays";
    
    public function index()
    {
        CheckLoginSession();
        $data['records'] = getDataRecords($this->tbl_name);

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/holidays/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function add()
    {
        CheckLoginSession();
        $admin_id       = $this->session->userdata('admin_id');
        $brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):0;
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();

        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            $this->form_validation->set_rules('holiday_date', 'date', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                $post_data['status'] = 1;
                $insert_id = setInsertData($this->tbl_name, $post_data);
                if ($insert_id > 0)
                {                    
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/holidays', 'refresh');
                }
            }
        }

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/holidays/add', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function edit()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);

        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            $this->form_validation->set_rules('holiday_date', 'date', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                $insert_id = setUpdateData($this->tbl_name, $post_data, $edit_id);
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }        
        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/holidays/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/holidays', 'refresh');
    }

    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/holidays', 'refresh');
    }
}