<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colleges extends CI_Controller
{
  public $tbl_name = "colleges";
  public $tbl_campus = "colleges_campus";
  public $tbl_staffs = "colleges_staffs";
  public $tbl_topschools = "topschools";

  function __construct()
  {
    parent::__construct();
    $this->load->model('master_model');
    $this->load->library('csvimport');
  }

  public function index()
  {
    CheckLoginSession();
    $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/colleges/list',$data);
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
      $this->form_validation->set_rules('college_name', 'name', 'required');
      $this->form_validation->set_rules('college_email', 'email ID', 'trim|required|valid_email|is_unique[colleges.college_email]',array('is_unique' => 'Applicant email ID already exist.'));
      $this->form_validation->set_rules('password', 'password', 'required');
      $this->form_validation->set_rules('mobile', 'mobile', 'required|regex_match[/^[0-9]{10}$/]');
      if($this->form_validation->run() != FALSE)
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
            'title' => $this->input->post('college_name'),
        );
        $slug = $this->slug->create_uri($data);

        $password = md5($post_data['password']);


        $college_name = $post_data['college_name'];
        $college_email = $post_data['college_email'];

        $post_data['slug'] = $slug;        
        $post_data['status'] = 1;
        $post_data['start_date'] = !empty($post_data['start_date'])?serialize($post_data['start_date']):'';
        $video = !empty($post_data['video'])?$post_data['video']:array();

        unset($post_data['password']);
        unset($post_data['video']);
        
        $videoArr = array();
        if(!empty($video))
        {
          $count = count($video['reference']);
          if($count)
          {
            for ($i=0; $i < $count; $i++)
            { 
              $vArr = array();
              if(!empty($video['reference'][$i]))
              {
                $vArr['title'] = $video['title'][$i];
                $vArr['reference'] = $video['reference'][$i];
                $vArr['host'] = $video['host'][$i];
              }
              array_push($videoArr, $vArr);
            }
          }
        }
        $post_data['videos'] = !empty($videoArr)?serialize($videoArr):'';

        //pre($post_data); die;
        $rec_id= setInsertData($this->tbl_name, $post_data);

        if($rec_id>0)
        {
          $dataArr['college_id'] = $rec_id;
          $dataArr['name'] = $college_name;
          $dataArr['email'] = $college_email;
          $dataArr['title'] = $college_name;
          $dataArr['password'] = $password;
          $dataArr['role'] = 1;
          $dataArr['status'] = 1;

          $staff_id = setInsertData($this->tbl_staffs, $dataArr);
          if(!empty($staff_id))
          {
            setUpdateData($this->tbl_name, array('primary_staff_id'=>$staff_id), $rec_id);
          }

          if(!empty($_FILES))
          {
              foreach ($_FILES as $key => $file)
              {
                  if(!empty($file["name"]))
                  {
                     $img_path=do_upload('colleges',$key);
                     $data_img = array($key => $img_path );
                     setUpdateData($this->tbl_name,$data_img,$rec_id);
                  }
              }
          }

          $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
          redirect('admin/colleges', 'refresh');
        }
      }
    }
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/colleges/add',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function edit()
  {
    CheckLoginSession();
    $post_data      = $this->input->post();
    $edit_id        = $this->uri->segment(4);
    $data['editdata'] = $editdata = getDataRecord($this->tbl_name, array('id' => $edit_id));


    if(!empty($post_data))
    {
        //pre($post_data);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_rules('college_name', 'name', 'required');
        $this->form_validation->set_rules('college_email', 'email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');

        if($this->form_validation->run() != FALSE)
        {
            if($edit_id>0)
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
              $post_data['start_date'] = !empty($post_data['start_date'])?serialize($post_data['start_date']):'';
              $video = !empty($post_data['video'])?$post_data['video']:array();

              $college_name = $post_data['college_name'];
              $college_email = $post_data['college_email'];
              $password = md5($post_data['password']);

              unset($post_data['video']);
              unset($post_data['password']);

              $videoArr = array();
              if(!empty($video))
              {
                $count = count($video['reference']);
                if($count)
                {
                  for ($i=0; $i < $count; $i++)
                  { 
                    $vArr = array();
                    if(!empty($video['reference'][$i]))
                    {
                      $vArr['title'] = $video['title'][$i];
                      $vArr['reference'] = $video['reference'][$i];
                      $vArr['host'] = $video['host'][$i];
                    }
                    array_push($videoArr, $vArr);
                  }
                }
              }
              $post_data['videos'] = !empty($videoArr)?serialize($videoArr):'';

              //pre($post_data); die;             
              $rec_id= setUpdateData($this->tbl_name, $post_data, $edit_id);

              if(!empty($editdata['primary_staff_id']))
              {
                $dataArr['name'] = $college_name;
                $dataArr['email'] = $college_email;
                $dataArr['title'] = $college_name;
                $dataArr['password'] = $password;
                $staff_id = setUpdateData($this->tbl_staffs, $dataArr, $editdata['primary_staff_id']);
              }
              else
              {
                $dataArr['college_id'] = $edit_id;
                $dataArr['name'] = $college_name;
                $dataArr['email'] = $college_email;
                $dataArr['title'] = $college_name;
                $dataArr['password'] = $password;
                $dataArr['role'] = 1;
                $dataArr['status'] = 1;

                $staff_id = setInsertData($this->tbl_staffs, $dataArr);
                if(!empty($staff_id))
                {
                  setUpdateData($this->tbl_name, array('primary_staff_id'=>$staff_id), $edit_id);
                }
              }


              if(!empty($_FILES))
              {
                  foreach ($_FILES as $key => $file)
                  {
                      if(!empty($file["name"]))
                      {
                         $img_path=do_upload('colleges',$key);
                         $data_img = array($key => $img_path );
                         setUpdateData($this->tbl_name,$data_img,$edit_id);
                      }
                  }
              }
            }

            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
              redirect(current_url(), 'refresh');
              
        }
    }
    
    
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/colleges/edit',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function delete()
  {
      CheckLoginSession();
      $id = $this->uri->segment(4);
      setDeleteData($this->tbl_name, $id);
      $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
      redirect('admin/colleges', 'refresh');
  }

  public function status()
  {
      $id             = $this->uri->segment(4);
      $statusId       = getStatusById($this->tbl_name, $id);
      $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
      $rec_id         = setUpdateData($this->tbl_name, $data, $id);
      $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
      redirect('admin/colleges', 'refresh');
  }

  public function top_schools()
  {
    CheckLoginSession();
    $brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):'';
    $data['records'] = getDataRecords($this->tbl_topschools, array('brand_id'=>$brand_id), 0, '', "DESC");
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/colleges/topschools_list',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function add_top_schools()
  {
    CheckLoginSession();
    $brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):'';
    $post_data = $this->input->post();
    #pre($post_data);
    if(!empty($post_data))
    {
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
      $this->form_validation->set_rules('college_id', 'College', 'required');
      #$this->form_validation->set_rules('associated_categories', 'Categories', 'required');
      if($this->form_validation->run() != FALSE)
      {
        $post_data['brand_id'] = $brand_id;
        $post_data['associated_categories'] = !empty($post_data['associated_categories'])?implode(",", $post_data['associated_categories']):'';
        $post_data['status'] = 1;
        $rec_id = setInsertData($this->tbl_topschools, $post_data);
        if($rec_id>0)
        {
          $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
          redirect('admin/top-schools', 'refresh');
        }
      }
    }
    $data['options_colleges'] = getCollegesOptions('colleges', '----Choose One----', array('status'=>1));
    $brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):'';
    $data['options_categories'] = getMultilevelOptions('programs_category', array('parent'=>0,'status'=>1, 'FIND_IN_SET('.$brand_id.',`associted_brands`) <>' => 0),'', false);
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/colleges/add_top_school',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function edit_top_schools()
  {
    CheckLoginSession();
    $post_data      = $this->input->post();
    $edit_id        = $this->uri->segment(4);
    $data['editdata'] = $editdata = getDataRecord($this->tbl_topschools, array('id' => $edit_id));

    if(!empty($post_data))
    {
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
      $this->form_validation->set_rules('college_id', 'College', 'required');
      #$this->form_validation->set_rules('associated_categories', 'Categories', 'required');

        if($this->form_validation->run() != FALSE)
        {
            if($edit_id>0)
            {                          
              $post_data['associated_categories'] = !empty($post_data['associated_categories'])?implode(",", $post_data['associated_categories']):'';
              //pre($post_data); die;             
              $rec_id= setUpdateData($this->tbl_topschools, $post_data, $edit_id);
            }
            $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
            redirect('admin/top-schools', 'refresh');              
        }
    }
    
    $data['options_colleges'] = getCollegesOptions('colleges', '----Choose One----', array('status'=>1));
    $brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):'';
    $data['options_categories'] = getMultilevelOptions('programs_category', array('parent'=>0,'status'=>1, 'FIND_IN_SET('.$brand_id.',`associted_brands`) <>' => 0),'', false);
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/colleges/edit_top_school',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function delete_top_schools()
  {
      CheckLoginSession();
      $id = $this->uri->segment(4);
      setDeleteData($this->tbl_topschools, $id);
      $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
      redirect('admin/top-schools', 'refresh');
  }

  public function status_top_schools()
  {
      $id             = $this->uri->segment(4);
      $statusId       = getStatusById($this->tbl_topschools, $id);
      $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
      $rec_id         = setUpdateData($this->tbl_topschools, $data, $id);
      $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
      redirect('admin/top-schools', 'refresh');
  }

  public function import()
  {
    CheckLoginSession();
    $data = array();  
    $this->load->view('admin/include/header');
    $this->load->view('admin/include/main-header');
    $this->load->view('admin/include/main-sidebar',$data);
    $this->load->view('admin/colleges/import',$data);
    $this->load->view('admin/include/main-footer');
    $this->load->view('admin/include/footer');
  }

  public function importing()
  {
    $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
    $count = 0;
    foreach($file_data as $row)
    {
        //pre($row);
        $collegeData = array();
        $college_name = !empty($row['college_name'])?$row['college_name']:'';
        $college_email = !empty($row['college_email'])?$row['college_email']:'';

        if(!empty($college_email))
        {
            $parts = explode("@", $college_email);
            $username = $parts[0];
            $password  = md5($username);
        }
        else
        {
            $password  = md5('123456');
        }
        

        if(!isExist($this->tbl_name, ['college_email'=>$college_email]))
        {
          $collegeData['college_name'] = $college_name;

          if(!empty($college_name))
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
                  'title' => $college_name,
              );
              $collegeData['slug'] = $this->slug->create_uri($data);
          }
          
          $collegeData['college_email'] = $college_email;
          $collegeData['mobile'] = !empty($row['mobile'])?$row['mobile']:'';            
          $collegeData['start_date'] = !empty($row['start_date'])?serialize(explode(",", $row['start_date'])):'';
          $collegeData['website'] = !empty($row['website'])?$row['website']:'';
          $collegeData['summary'] = !empty($row['summary'])?$row['summary']:'';
          $collegeData['description'] = !empty($row['description'])?$row['description']:'';
          $collegeData['address'] = !empty($row['address'])?$row['address']:'';
          $collegeData['institution_type'] = !empty($row['institution_type'])?$row['institution_type']:'';
          $collegeData['status'] = 1;
          //pre($collegeData); die;
          $college_id= setInsertData($this->tbl_name, $collegeData);

          if($college_id>0)
          {
            $staffDataArr['college_id'] = $college_id;
            $staffDataArr['name'] = $college_name;
            $staffDataArr['email'] = $college_email;
            $staffDataArr['title'] = $college_name;
            $staffDataArr['password'] = $password;
            $staffDataArr['role'] = 1;
            $staffDataArr['status'] = 1;

            $staff_id = setInsertData($this->tbl_staffs, $staffDataArr);
            if(!empty($staff_id))
            {
              setUpdateData($this->tbl_name, array('primary_staff_id'=>$staff_id), $college_id);
              $count = $count + 1;
            }
          }
        }
    }

    if($count>1)
    {
      echo json_encode(['error' => 0,'message' => $count.' Records have been imported successfully !!']);
    }
    elseif($count == 1)
    {
      echo json_encode(['error' => 0,'message' => $count.' Record has been imported successfully !!']);
    }
    else
    {
      echo json_encode(['error' => 1,'message' => 'CSV Import has failed due to email existance or any technical error !!']);
    }
  }

  public function load_import()
  {
    $results = get_records($this->tbl_name);
    $output = '
     <h3 align="center">Imported User Details from CSV File</h3>
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
            <tr>
              <th>Sr. No</th>
              <th>Logo</th>
              <th>College Name</th>
              <th>Email</th>
              <th>Phone</th>
            </tr>
    ';
    $count = 0;
    if(!empty($results))
    {
      foreach($results as $row)
      {
        $count = $count + 1;
        $output .= '
        <tr>
          <td>'.$count.'</td>
          <td>'.$row->logo.'</td>
          <td>'.$row->college_name.'</td>
          <td>'.$row->college_email.'</td>
          <td>'.$row->mobile.'</td>
        </tr>
        ';
      }
    }
    else
    {
      $output .= '
      <tr>
          <td colspan="5" align="center">Data not Available</td>
        </tr>
      ';
    }
    $output .= '</table></div>';
    echo $output;
  }

}