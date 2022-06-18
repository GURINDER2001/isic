<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public $tbl_name = "settings";

    function __construct()
    {
        parent::__construct();        
        $this->load->model('settings_model');        
    }

    public function index()
    {
        CheckLoginSession();
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('admin_email', 'admin email', 'required');            
            if ($this->form_validation->run() != FALSE)
            {
               unset($post_data['_wysihtml5_mode']);
               //pre($post_data); die; 

                foreach ($post_data as $key => $value)
                {   
                    $keyExist = $this->master_model->isExist($this->tbl_name,array('name'=>$key));
                    if(!empty($keyExist))
                    {
                        $this->master_model->setUpdateRecord($this->tbl_name, array('value' => $value), array('name' => $key));
                    }
                    else
                    {
                        $this->master_model->setInsertData($this->tbl_name, array('name'=>$key,'value' => $value));
                    }
                }

                if(!empty($_FILES))
                {
                    foreach ($_FILES as $key => $file)
                    {
                        if(!empty($file['name']))
                        {
                            $uploaded_image = do_upload('logo', $key);
                            $keyExist = $this->master_model->isExist($this->tbl_name,array('name'=>$key));
                            if(!empty($keyExist))
                            {
                                $this->master_model->setUpdateRecord($this->tbl_name, array('value' => $uploaded_image), array('name' => $key));
                            }
                            else
                            {
                                $this->master_model->setInsertData($this->tbl_name, array('name'=>$key,'value' => $uploaded_image));
                            }
                        }
                    }
                }


                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been saved successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }

        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/settings/advance', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function logo()
    {
        CheckLoginSession();
        $data['active'] = $this->uri->segment(2);
        //pre($_FILES); die; 
        if(!empty($_FILES))
        {
            foreach ($_FILES as $key => $file)
            {
                if(!empty($file['name']))
                {
                    $uploaded_image = do_upload('logo', $key);
                    $keyExist = $this->master_model->isExist($this->tbl_name,array('name'=>$key));
                    if(!empty($keyExist))
                    {
                        $this->master_model->setUpdateRecord($this->tbl_name, array('value' => $uploaded_image), array('name' => $key));
                    }
                    else
                    {
                        $this->master_model->setInsertData($this->tbl_name, array('name'=>$key,'value' => $uploaded_image));
                    }
                }
            }

            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been saved successfully !!'));
            redirect(current_url(), 'refresh');
        }

        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/settings/logo', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function email()
    {
        CheckLoginSession();
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
           unset($post_data['_wysihtml5_mode']);
           //pre($_FILES); die; 

            foreach ($post_data as $key => $value)
            {
                $keyExist = $this->master_model->isExist($this->tbl_name,array('name'=>$key));
                if(!empty($keyExist))
                {
                    $this->master_model->setUpdateRecord($this->tbl_name, array('value' => $value), array('name' => $key));
                }
                else
                {
                    $this->master_model->setInsertData($this->tbl_name, array('name'=>$key,'value' => $value));
                }
            }

            if(!empty($_FILES))
            {
                foreach ($_FILES as $key => $file)
                {
                    if(!empty($file['name']))
                    {
                        $uploaded_image = do_upload('logo', $key);
                        $keyExist = $this->master_model->isExist($this->tbl_name,array('name'=>$key));
                        if(!empty($keyExist))
                        {
                            $this->master_model->setUpdateRecord($this->tbl_name, array('value' => $uploaded_image), array('name' => $key));
                        }
                        else
                        {
                            $this->master_model->setInsertData($this->tbl_name, array('name'=>$key,'value' => $uploaded_image));
                        }
                    }
                }
            }

            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been saved successfully !!'));
            redirect(current_url(), 'refresh');
        }

        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/settings/email', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function smtp()
    {
        CheckLoginSession();
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();
        if (!empty($post_data))
        {
            foreach ($post_data as $key => $value)
            {
                $keyExist = $this->master_model->isExist($this->tbl_name,array('name'=>$key));
                if(!empty($keyExist))
                {
                    $this->master_model->setUpdateRecord($this->tbl_name, array('value' => $value), array('name' => $key));
                }
                else
                {
                    $this->master_model->setInsertData($this->tbl_name, array('name'=>$key,'value' => $value));
                }
            }
            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Settings has been saved successfully !!'));
            redirect(current_url(), 'refresh');
        }
        
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/settings/smtp', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function valid_url($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        else
        {
            return (filter_var($str, FILTER_VALIDATE_URL) !== FALSE);
        }
    }

    public function send_test_mail()
    {

        $post_data=$this->input->post();        
        if(!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('email', 'email', 'required');           
            if($this->form_validation->run() != FALSE)
            {

                $email = $post_data['email'];
                if(!empty($email))
                {
                    $email_template  = 'test-mail.html';
                    $templateTags =  array(
                        '{{signature}}' => getEmailSignature(),
                        '{{disclaimer}}' => getEmailDisclaimer()
                    );
                    $message_content = email_compose($email_template,$templateTags);
                    $admin_email = getAdminEmail();
                    if(send_email($email,'SMTP : Test mail',$message_content))
                    {
                        $this->session->set_flashdata('notification',array('error'=>0,'message'=>'Test email has been sent successfully !!'));
                        redirect(current_url(), 'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Email failed to sent !!'));
                    }
                    
                }
                else
                {
                    $this->session->set_flashdata('notification',array('error'=>1,'message'=>'Please enter a valid email !!'));
                }
            }
        }

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar');
        $this->load->view('admin/settings/sentemail');
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

}