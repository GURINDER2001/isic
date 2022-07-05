<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    public $tbl_name = "users";

    public function index()
    {
        CheckLoginSession();
        $data['active'] = $this->uri->segment(2);
        $admin_id       = $this->session->userdata('admin_id');
        
        $post_data = $this->input->post();
        if (!empty($post_data))
        {
            $userDetails  = getDataRecord($this->tbl_name, array('id' => $admin_id));
            $old_password = md5($this->input->post('old_password'));
            if ($old_password == $userDetails['password'])
            {
                $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
                $this->form_validation->set_rules('old_password', 'old password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password ', 'trim|required|matches[password]');
                if ($this->form_validation->run() != FALSE)
                {
                    $data    = array('password' => md5($this->input->post('password')));
                    $user_id = setUpdateData($this->tbl_name, $data, $admin_id);
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Password has changed successfully !!'));
                    redirect('admin/changepassword', 'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('notification', array('error' => 1, 'message' => 'Please enter the correct old password !!'));
                redirect('admin/changepassword', 'refresh');
            }
        }
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/settings/changepassword', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    
}