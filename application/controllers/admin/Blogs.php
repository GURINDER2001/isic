<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    public $tbl_name = "blogs";
    public $tbl_cat  = "blogs_cat";
    
    public function index()
    {
        CheckLoginSession();
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/blogs/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function add()
    {
        CheckLoginSession();
        $admin_id       = $this->session->userdata('admin_id');
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();

        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            $this->form_validation->set_rules('summary', 'summary', 'required');
            $this->form_validation->set_rules('description', 'content', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                $config = array(
                    'table' => $this->tbl_cat,
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
                $post_data['category'] = !empty($post_data['category'])?implode(",",$post_data['category']):'';
                $post_data['status'] = 1;
                $post_data['post_by'] = $admin_id;
                
                $insert_id = setInsertData($this->tbl_name, $post_data);

                if ($insert_id > 0)
                {
                    if ($_FILES["featured_img"]["name"] != "")
                    {
                        $featured_img      = do_upload('blogs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_name, $data_featured_img, $insert_id);
                    }
                    
                    if ($_FILES["banner_img"]["name"] != "")
                    {
                        $banner_img      = do_upload('blogs', 'banner_img');
                        $data_banner_img = array('banner_img' => $banner_img);
                        setUpdateData($this->tbl_name, $data_banner_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/blogs', 'refresh');
                }
            }
        }

        $data['categoryOptions'] = getMultiOptions($this->tbl_cat, array('status'=>1));
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/blogs/add', $data);
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
            $this->form_validation->set_rules('summary', 'summary', 'required');
            $this->form_validation->set_rules('description', 'content', 'required');

            if ($this->form_validation->run() != FALSE)
            {
                $slug_str=$this->input->post('slug');
                $config = array(
                    'table' => $this->tbl_cat,
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
                $post_data['category'] = !empty($post_data['category'])?implode(",",$post_data['category']):'';
                $insert_id = setUpdateData($this->tbl_name, $post_data, $edit_id);
                if ($_FILES["featured_img"]["name"] != "")
                {
                    $featured_img      = do_upload('blogs');
                    $data_featured_img = array('featured_img' => $featured_img);
                    setUpdateData($this->tbl_name, $data_featured_img, $edit_id);
                }
                
                if ($_FILES["banner_img"]["name"] != "")
                {
                    $banner_img      = do_upload('blogs', 'banner_img');
                    $data_banner_img = array('banner_img' => $banner_img);
                    setUpdateData($this->tbl_name, $data_banner_img, $edit_id);
                }
                
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }
        
        $data['categoryOptions'] = getMultiOptions($this->tbl_cat, array('status'=>1));    
        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/blogs/edit', $data);
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
        redirect('admin/blogs', 'refresh');
    }

    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/blogs', 'refresh');
    }

    public function category()
    {
        CheckLoginSession();
        $data['records'] = $this->master_model->get_records($this->tbl_cat);
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/blogs/categories',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function addcategory()
    {
        CheckLoginSession();
        $data = array();
        $post_data=$this->input->post();
        if(!empty($post_data)) {        
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            if($this->form_validation->run() != FALSE)
            {
                $slug_str=$this->input->post('name');
                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_str)));
                $post_data['slug'] = $slug;
                $post_data['status'] = 1;
                $insert_id = setInsertData($this->tbl_cat, $post_data);
                if ($insert_id > 0)
                {
                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('blogs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_cat, $data_featured_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
                    redirect('admin/blogs/category','refresh');
                }
            }
        }
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/blogs/add-category',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function editcategory()
    {
        CheckLoginSession();
        $post_data = $this->input->post();
        $edit_id   = $this->uri->segment(5);

        if(!empty($post_data))
        {        
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            if($this->form_validation->run() != FALSE)
            {
                $slug_str=$this->input->post('name');
                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_str)));
                $post_data['slug'] = $slug;
                
                $record_id= setUpdateData($this->tbl_cat, $post_data, $edit_id);
                if($record_id>0)
                {
                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('blogs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_cat, $data_featured_img, $edit_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect(current_url(),'refresh');
                }
            }
        }

        $data['editdata'] = getDataRecord($this->tbl_cat, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/blogs/edit-category',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function deletecategory()
    {
        CheckLoginSession();
        $id = $this->uri->segment(5);
        setDeleteData($this->tbl_cat, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/blogs/category', 'refresh');
    }
    
    public function statuscategory()
    {
        $id             = $this->uri->segment(5);
        $statusId       = getStatusById($this->tbl_cat, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_cat, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/blogs/category', 'refresh');
    }
}