<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{
    
    public $tbl_name = "tbl_pages";
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('master_model');
        $this->load->model('page_model');
    }    
    
    public function index()
    {
        CheckLoginSession();
        $data['active']    = $this->uri->segment(2);
        //$data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");

        $records = $this->master_model->get_recordsArr($this->tbl_name);
        $data['records'] = getOptionsTree($records);

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/page/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function add()
    {
        CheckLoginSession();
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            $this->form_validation->set_rules('description', 'content', 'required');
            if ($this->form_validation->run() != FALSE)
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

                $post_data['slug'] = $slug;
                $post_data['status'] = 1;

                $insert_id = setInsertData($this->tbl_name, $post_data);
                if ($insert_id > 0)
                {
                    if ($_FILES["featured_img"]["name"] != "")
                    {
                        $featured_img      = do_upload('pages', 'featured_img');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_name, $data_featured_img, $insert_id);
                    }

                    if ($_FILES["banner_img"]["name"] != "")
                    {
                        $banner_img      = do_upload('pages', 'banner_img');
                        $data_banner_img = array('banner_img' => $banner_img);
                        setUpdateData($this->tbl_name, $data_banner_img, $insert_id);
                    }

                    $this->session->set_flashdata('message', 'Your page has been added successfully');
                    redirect('admin/page', 'refresh');
                }
            }
        }

        $data['options_brands'] = getOptions('brands', 'Main Site', array('status'=>1));
        $data['parentOptions'] = getMultilevelOptions($this->tbl_name, array(), '---Self---');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/page/add', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function edit()
    {
        CheckLoginSession();
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            $this->form_validation->set_rules('description', 'content', 'required');
            if ($this->form_validation->run() != FALSE) 
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
                $post_data['slug'] = $slug;
                $rec_id = setUpdateData($this->tbl_name, $post_data, $edit_id);
                
                if ($_FILES["featured_img"]["name"] != "")
                {
                    $featured_img      = do_upload('pages', 'featured_img');
                    $data_featured_img = array('featured_img' => $featured_img);
                    setUpdateData($this->tbl_name, $data_featured_img, $edit_id);
                }

                if ($_FILES["banner_img"]["name"] != "")
                {
                    $banner_img      = do_upload('pages', 'banner_img');
                    $data_banner_img = array('banner_img' => $banner_img);
                    setUpdateData($this->tbl_name, $data_banner_img, $edit_id);
                }

                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        $data['options_brands'] = getOptions('brands', 'Main Site', array('status'=>1));
        $data['parentOptions'] = getMultilevelOptions($this->tbl_name, array(), '---Self---');
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/page/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/page', 'refresh');
    } 
    
}