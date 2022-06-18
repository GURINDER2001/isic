<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller
{
    public $tbl_name = "slider";

    function __construct()
    {
        parent::__construct();
        $this->load->model('master_model');
    }    
    
    public function index()
    {
        CheckLoginSession();
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/slider/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function add()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        $data = array();
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            if ($this->form_validation->run() != FALSE)
            {

                $insert_id = setInsertData($this->tbl_name, $post_data);
                if ($insert_id > 0)
                {
                    if ($_FILES["featured_img"]["name"] != "")
                    {
                        $featured_img      = do_upload('slider');
                        $data_featured_img = array(
                            'featured_img' => $featured_img
                        );
                        setUpdateData($this->tbl_name, $data_featured_img, $insert_id);
                    }

                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
                    redirect('admin/slider', 'refresh');
                }
            }
        }
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/slider/add', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function edit()
    {
        CheckLoginSession();
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);
        if (!empty($post_data)) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            if ($this->form_validation->run() != FALSE) 
            {                
                $insert_id = setUpdateData($this->tbl_name, $post_data, $edit_id);
                if ($insert_id > 0)
                {
                    if ($_FILES["featured_img"]["name"] != "")
                    {
                        $featured_img      = do_upload('slider');
                        $data_featured_img = array(
                            'featured_img' => $featured_img
                        );
                        setUpdateData($this->tbl_name, $data_featured_img, $insert_id);
                    }
                    
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect(current_url(), 'refresh');
                }
            }
        }
        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/slider/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function delete()
    {
        CheckLoginSession();
        $id    = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/slider', 'refresh');
    }

    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/slider', 'refresh');
    }
}