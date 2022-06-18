<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Controller
{
    
    public $tbl_name = "brands";
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('master_model');
        $this->load->model('brands_model');
    }
    
    public function index()
    {
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/brands/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function add()
    {
        $admin_id       = $this->session->userdata('admin_id');
        $post_data      = $this->input->post();
        $data = array();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            
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
                    if (!empty($_FILES))
                    {
                        foreach ($_FILES as $key => $file)
                        {
                            if (!empty($file["name"]))
                            {
                                $brand_img      = do_upload('brands',$key);
                                $data_brand_img = array($key => $brand_img);
                                setUpdateData($this->tbl_name, $data_brand_img, $insert_id);
                            }
                        }
                        
                    }
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
                    redirect('admin/brands', 'refresh');
                }
            }
        }

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/brands/add', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function edit()
    {
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);

        if (!empty($post_data))
        {
            //pre($post_data);
            unset($post_data['_wysihtml5_mode']);
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');          
            if ($this->form_validation->run() != FALSE)
            {
                $name=$this->input->post('name');
                $config = array(
                    'table' => $this->tbl_name,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $name,
                );
                $slug = $this->slug->create_uri($data,$edit_id);
                $post_data['slug'] = $slug;
                setUpdateData($this->tbl_name, $post_data, $edit_id);
                if (!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if (!empty($file["name"]))
                        {
                            $brand_img      = do_upload('brands',$key);
                            $data_brand_img = array($key => $brand_img);
                            setUpdateData($this->tbl_name, $data_brand_img, $edit_id);
                        }
                    }
                }                    
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/brands/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/brands', 'refresh');
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
            redirect('admin/brands', 'refresh');
        }
    }

    public function swichbrand()
    {
        $brand_id = $this->input->post('brand_id');
        $brand_id = !empty($brand_id)?$brand_id:0;
        $this->session->set_userdata('brand_id',$brand_id);
        echo $brand_id;
    }

}