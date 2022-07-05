<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller
{
    
    public $tbl_name = "events";
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('master_model');
        $this->load->model('events_model');
    }
    
    public function index()
    {
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/events/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function add()
    {
        $admin_id       = $this->session->userdata('admin_id');
        $post_data      = $this->input->post();
        $data           = array();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            $this->form_validation->set_rules('summary', 'summary', 'required');
            $this->form_validation->set_rules('description', 'content', 'required');
            $this->form_validation->set_rules('vanue', 'vanue', 'required');
            $this->form_validation->set_rules('event_date', 'event date', 'required');
            $this->form_validation->set_rules('event_by', 'event by', 'required');
            
            if ($this->form_validation->run() != FALSE)
            {
                unset($post_data['_wysihtml5_mode']);
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
                $post_data['slug'] = $slug;
                $post_data['status'] = 1;
                
                $insert_id = setInsertData($this->tbl_name, $post_data);
                if ($insert_id > 0)
                {
                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('events');
                        $data_featured_img = array(
                            'featured_img' => $featured_img
                        );
                        setUpdateData($this->tbl_name, $data_featured_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
                    redirect('admin/events', 'refresh');
                }
            }
        }
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/events/add', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function edit()
    {
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            $this->form_validation->set_rules('summary', 'summary', 'required');
            $this->form_validation->set_rules('description', 'content', 'required');
            $this->form_validation->set_rules('vanue', 'vanue', 'required');
            $this->form_validation->set_rules('event_date', 'event date', 'required');
            $this->form_validation->set_rules('event_by', 'event by', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                unset($post_data['_wysihtml5_mode']);
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
                $post_data['slug'] = $slug;
                
                $rec_id = setUpdateData($this->tbl_name, $post_data, $edit_id);
                if (!empty($_FILES["featured_img"]["name"]))
                {
                    $featured_img      = do_upload('events');
                    $data_featured_img = array(
                        'featured_img' => $featured_img
                    );
                    setUpdateData($this->tbl_name, $data_featured_img, $edit_id);
                }
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/events/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/events', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/events', 'refresh');
    }
}