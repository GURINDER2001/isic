<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller
{
  public $tbl_name = "students";

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
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/students/list',$data);
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
      $this->form_validation->set_rules('first_name', 'first name', 'required');
      $this->form_validation->set_rules('last_name', 'last name', 'required');
      $this->form_validation->set_rules('email', 'email ID', 'trim|required|valid_email|is_unique[students.email]',array('is_unique' => 'Applicant email ID already exist.'));
      $this->form_validation->set_rules('mobile', 'mobile', 'required|regex_match[/^[0-9]{10}$/]');
      if($this->form_validation->run() != FALSE)
      {
        $post_data['password'] = md5($post_data['password']);
        $post_data['status'] = 1;

        $user_id= setInsertData($this->tbl_name, $post_data);
        if($user_id>0)
        {
          if(!empty($_FILES["featured_img"]["name"]))
          {

            $featured_img=do_upload('students');
            $data_featured_img = array('featured_img' => $featured_img );
            setUpdateData($this->tbl_name,$data_featured_img,$user_id);
          }          

          $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
          redirect('admin/students', 'refresh');
        }
      }
    }

    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/students/add',$data);
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
        $this->form_validation->set_rules('first_name', 'first name', 'required');
        $this->form_validation->set_rules('last_name', 'last name', 'required');
        $this->form_validation->set_rules('email', 'email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'mobile', 'required|regex_match[/^[0-9]{10}$/]');

        if($this->form_validation->run() != FALSE)
        {
            if($edit_id>0)
            {
              if(!empty($post_data['password']))
              {
                $post_data['password'] = md5($post_data['password']);
              }
              else
              {
                unset($post_data['password']);
              }
              
              $user_id= setUpdateData($this->tbl_name, $post_data, $edit_id);
              if(!empty($_FILES["featured_img"]["name"]))
              {
                 $featured_img=do_upload('students');
                 $data_featured_img = array('featured_img' => $featured_img );
                 setUpdateData($this->tbl_name,$data_featured_img,$user_id);
              }

              $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
              redirect(current_url(), 'refresh');
            }
        }
    }

    $data['editdata']           = getDataRecord($this->tbl_name, array('id' => $edit_id));
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/students/edit',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function delete()
  {
      CheckLoginSession();
      $id = $this->uri->segment(4);
      setDeleteData($this->tbl_name, $id);
      $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
      redirect('admin/students', 'refresh');
  }

  public function status()
  {

      $id             = $this->uri->segment(4);
      $statusId       = getStatusById($this->tbl_name, $id);
      $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
      $rec_id         = setUpdateData($this->tbl_name, $data, $id);
      $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
      redirect('admin/students', 'refresh');
  }

}