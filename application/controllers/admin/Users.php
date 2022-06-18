<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public $tbl_name = "users";

  function __construct()
  {
    parent::__construct();
    $this->load->model('master_model');
    $this->load->model('Users_model');
  }

  public function index()
  {
    CheckLoginSession();
    $data['records'] = getDataRecords($this->tbl_name, array('id <>'=>1), 0, '', "DESC");
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/users/list',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function add()
  {
    CheckLoginSession();
    $data      = array();
    $post_data = $this->input->post();
    if(!empty($post_data))
    {        
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
      $this->form_validation->set_rules('name', 'title', 'required');
      $this->form_validation->set_rules('email', 'email ID', 'trim|required|valid_email|is_unique[users.email]',array('is_unique' => 'Applicant email ID already exist.'));
      $this->form_validation->set_rules('mobile', 'mobile', 'required|regex_match[/^[0-9]{10}$/]');
      $this->form_validation->set_rules('role', 'role', 'required');
      if($this->form_validation->run() != FALSE)
      {
        $data = array(
        'role' => $this->input->post('role'),
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'mobile' => $this->input->post('mobile'),
        'gender' => $this->input->post('gender'),
        'password' => md5($this->input->post('password')),
        'status' => 1        	             
        ); 

        $user_id= setInsertData($this->tbl_name, $data);
        if($user_id>0)
        {
          if($_FILES["featured_img"]["name"] != "")
          {
            $featured_img=do_upload('company_logo');
            $data_featured_img = array('featured_img' => $featured_img );
            setUpdateData($this->tbl_name,$data_featured_img,$user_id);
          }
          
          $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
          redirect('admin/users', 'refresh');
        }
      }
    }

    $data['options_roles']              = getOptions('role', 'Select role', array('status'=>1,'id <>'=>1));
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/users/add',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function edit()
  {
    CheckLoginSession();
    $post_data      = $this->input->post();
    $edit_id        = $this->uri->segment(4);

    if(!empty($post_data))
    {
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_rules('name', 'title', 'required');
        $this->form_validation->set_rules('email', 'email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'mobile', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('role', 'role', 'required');

        if($this->form_validation->run() != FALSE)
        {
            $data = array(
              'role' => $this->input->post('role'),
              'name' => $this->input->post('name'),
              'email' => $this->input->post('email'),
              'mobile' => $this->input->post('mobile'),
              'gender' => $this->input->post('gender'),
            ); 

            if($edit_id>0)
            {
              $user_id= setUpdateData($this->tbl_name, $data, $edit_id);

              if($_FILES["featured_img"]["name"] != "")
              {
                 $featured_img=do_upload('company_logo');
                 $data_featured_img = array('featured_img' => $featured_img );
                 setUpdateData($this->tbl_name,$data_featured_img,$user_id);
              }

              $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
              redirect('admin/users', 'refresh');
            }
        }
    }

    $data['options_roles']      = getOptions('role', 'Select role', array('status'=>1,'id <>'=>1));
    $data['editdata']           = getDataRecord($this->tbl_name, array('id' => $edit_id));
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/users/edit',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function delete()
  {
      CheckLoginSession();
      $id = $this->uri->segment(4);
      setDeleteData($this->tbl_name, $id);
      $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
      redirect('admin/users', 'refresh');
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
          redirect('admin/users', 'refresh');
      }
  }

}