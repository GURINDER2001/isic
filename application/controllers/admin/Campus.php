<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campus extends CI_Controller
{
  public $tbl_name = "colleges";
  public $tbl_campus = "colleges_campus";

  function __construct()
  {
    parent::__construct();
    $this->load->model('master_model');
  }

  public function index()
  {
    CheckLoginSession();
    $college_id = $this->uri->segment(3);

    $whereArr = array();
    if(!empty($college_id))
    {
      $whereArr['college_id'] = $college_id;
    }

    $data['colleges'] = getCollegesOptions($this->tbl_name,'------Choose College------');
    $data['records'] = getDataRecords($this->tbl_campus, $whereArr, 0, '', "DESC");
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/campus/list',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function add()
  {
    CheckLoginSession();    
    $college_id = $this->uri->segment(4);
    $post_data = $this->input->post();
    if(!empty($post_data))
    {
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_rules('location', 'location', 'required');
        if($this->form_validation->run() != FALSE)
        {
            $social_media = !empty($post_data['social_media'])?$post_data['social_media']:array();
            $social_link = !empty($post_data['social_link'])?$post_data['social_link']:array();
            unset($post_data['social_media']);
            unset($post_data['social_link']);
            $cnt = count($social_media);
            if(!empty($cnt))
            {
              for ($j=0; $j < $cnt; $j++)
              {
                $source = $social_media[$j];
                $link = $social_link[$j];
                $social[$source] = $link;
                $post_data['social_links'] = serialize($social);
              }
            }
            $post_data['college_id'] = $college_id;
            $post_data['status'] = 1;
            //pre($post_data); die;
            setInsertData($this->tbl_campus, $post_data);
            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
            redirect('admin/campus/'.$college_id, 'refresh');
        }
    }
   
    $data['record'] = getDataRecord($this->tbl_name, array('id' => $college_id));
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/campus/add',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function edit()
  {
    CheckLoginSession();    
    $id        = $this->uri->segment(4);
    $post_data = $this->input->post();
    if(!empty($post_data))
    {
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_rules('location', 'location', 'required');
        if($this->form_validation->run() != FALSE)
        {
            $social_media = !empty($post_data['social_media'])?$post_data['social_media']:array();
            $social_link = !empty($post_data['social_link'])?$post_data['social_link']:array();
            unset($post_data['social_media']);
            unset($post_data['social_link']);
            $cnt = count($social_media);
            if(!empty($cnt))
            {
              for ($j=0; $j < $cnt; $j++)
              {
                $source = $social_media[$j];
                $link = $social_link[$j];
                $social[$source] = $link;
                $post_data['social_links'] = serialize($social);
              }
            }
            setUpdateData($this->tbl_campus, $post_data, $id);
            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
            redirect(current_url(), 'refresh');
        }
    }
   
    $data['record'] = getDataRecord($this->tbl_campus, array('id' => $id));
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/campus/edit',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function delete()
  {
      CheckLoginSession();
      $id           = $this->uri->segment(4);
      setDeleteData($this->tbl_campus, $id);
      $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
      redirect('admin/campus', 'refresh');
  }

  public function status()
  {
      $college_id     = $this->uri->segment(4);
      $id             = $this->uri->segment(5);

      $statusId       = getStatusById($this->tbl_campus, $id);
      $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;

      $rec_id         = setUpdateData($this->tbl_campus, $data, $id);
      $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
      $redirectTo = !empty($college_id)?'admin/campus/'.$college_id:'admin/campus';
      redirect($redirectTo, 'refresh');
  }
}