<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletters extends CI_Controller
{
    public $tbl_name = "newsletters";
    public $tbl_subscribers = "subscribers";

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        CheckLoginSession();
        $data['records'] = getDataRecords($this->tbl_name);
        $data['subscribers'] = getSubscribersOptions($this->tbl_subscribers, array('subscription_status'=>1));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/newsletters/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }

    public function send()
    {
        CheckLoginSession();
        $admin_id       = $this->session->userdata('admin_id');
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();

        if (!empty($post_data))
        {
            //pre($post_data); die;
            
            $newsletter_id = !empty($post_data['newsletter_id'])?$post_data['newsletter_id']:0;
            $recipient = !empty($post_data['recipient'])?$post_data['recipient']:'all';
            $subscribers = array();
            if($recipient == 'specific')
            {
                $subscribers = !empty($post_data['specific_subscribers'])?$post_data['specific_subscribers']:array();
            }
            else
            {
                $subscribers_cols = get_cols($this->tbl_subscribers, 'subscriber_email', array('subscription_status'=>1));
                if(!empty($subscribers_cols))
                {
                    foreach ($subscribers_cols as $key => $rec)
                    {
                        array_push($subscribers, $rec->subscriber_email);
                    }
                }
            }
            
            $newsletterData = getDataRecord($this->tbl_name, array('id' => $newsletter_id));
            
            if(!empty($newsletterData))
            {
                //pre($newsletterData); die;
                $subject = 'ISIC Newsletter : '.$newsletterData['name'];
                $body_message = $newsletterData['description'];
                if(!empty($subscribers))
                {
                    foreach($subscribers as $subscriber)
                    {
            	        send_email($subscriber,$subject,$body_message);
                        $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Newsletter has send successfully to desire subscribers !!'));
                    }
                }
                else
                {
                    $this->session->set_flashdata('notification', array('error' => 1,'message' => 'Subscribers are not available for newsletter to send !!'));
                }
            }
            else
            {
                $this->session->set_flashdata('notification', array('error' => 1,'message' => 'Newsletter is no more active or available !!'));
            }
            
            //pre($newsletterData); die;
            redirect('admin/newsletters', 'refresh');
        }
    }
    
    public function add()
    {
        CheckLoginSession();
        $admin_id       = $this->session->userdata('admin_id');
        $brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):0;
        $data['active'] = $this->uri->segment(2);
        $post_data      = $this->input->post();

        if (!empty($post_data))
        {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'title', 'required');
            $this->form_validation->set_rules('description', 'content', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                $post_data['status'] = 1;                
                $insert_id = setInsertData($this->tbl_name, $post_data);
                if ($insert_id > 0)
                {                    
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                    redirect('admin/newsletters', 'refresh');
                }
            }
        }

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/newsletters/add', $data);
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
            $this->form_validation->set_rules('description', 'content', 'required');

            if ($this->form_validation->run() != FALSE)
            {
                $insert_id = setUpdateData($this->tbl_name, $post_data, $edit_id);
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }        
        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/newsletters/edit', $data);
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
        redirect('admin/newsletters', 'refresh');
    }

    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/newsletters', 'refresh');
    }
}