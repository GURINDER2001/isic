<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $this->load->model('master_model');
      $this->load->model('admin_model');
    }

    public function index()
    {
        $this->master_model->CheckLoginSession();
        $data['total_users']  = getRowCount('users',array('id <>'=>1));
        $data['total_news']   = getRowCount('news');
        $data['total_programs'] = getRowCount('programs');
        $data['total_brands'] = getRowCount('brands');
        $data['news_data']    = getDataRecords('news',array(),0, 8 );
        $data['users_data']   = getDataRecords('users', array('id <>'=>1), 0, 5 );
        $data['total_enquiries'] = getRowCount('enquiries');
        $data['enquiries_data']  = getDataRecords('enquiries', array(), 0, 7 );
        $data['active']       = $this->uri->segment(2);

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar',$data);
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function logout()
    {   
      $this->session->sess_destroy();
      redirect('admin/login','refresh');
    }

    public function login()
    {
      $admin_id = $this->session->userdata('admin_id');
      if(!empty($admin_id))
      {
          redirect('admin/dashboard','refresh');
      }
      else
      {
        $login_arr=$this->input->post();
        //print_r($login_arr);
        if(!empty($login_arr))
        {
          $admindata= $this->admin_model->AdminLogin();
          if($admindata==1)
          {
          redirect('admin/dashboard','refresh');
          }
          else
          {
            $this->session->set_flashdata('error','Please enter the correct username or password');
            redirect('admin','refresh');
          }
        }
      }
      $this->load->view('admin/login');
    }

}