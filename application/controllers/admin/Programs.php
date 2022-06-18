<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller
{
	public $tbl_brand = "brands";
	public $tbl_name = "programs";
	public $tbl_cat  = "programs_category";
	public $tbl_college_campus  = "colleges_campus";
	public $tbl_campus_info  = "programs_campus_info";
	public $tbl_programs_relations = "programs_relations";

	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->load->model('admin_model');
	}

	public function index()
	{
		CheckLoginSession();
		$brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):'';
		$data['records'] = $this->admin_model->getProgramsByBrandId($brand_id); //getDataRecords($this->tbl_name, array(), 0, '', "DESC");
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/programs/list',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		CheckLoginSession();
		$data = array();
		$post_data=$this->input->post();
		if(!empty($post_data)) {        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
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
                    'title' => $this->input->post('name'),
                );
                $slug = $this->slug->create_uri($data);
				$post_data['slug'] = $slug;
				//$post_data['associted_brands'] = !empty($post_data['associted_brands'])?implode(",", $post_data['associted_brands']):'';
				$post_data['study_type'] = !empty($post_data['study_type'])?implode(",",$post_data['study_type']):'';
				$post_data['pace'] = !empty($post_data['pace'])?implode(",",$post_data['pace']):'';
				$post_data['status'] = 1;

				$associted_brands = !empty($post_data['associted_brands'])?$post_data['associted_brands']:'';
		        $categories = !empty($post_data['category'])?$post_data['category']:'';
				unset($post_data['associted_brands']);
				unset($post_data['category']);

				$insert_id = setInsertData($this->tbl_name, $post_data);
				if ($insert_id > 0)
                {

                	if(!empty($associted_brands))
		            {
		                foreach ($associted_brands as $key => $brand_id)
		                {
		                    if(!empty($categories[$brand_id]))
		                    {
		                        foreach ($categories[$brand_id] as $key => $cat_id)
		                        {
		                            $whereArr = $dataRel = array('program_id'=>$insert_id, 'brand_id'=>$brand_id, 'cat_id'=>$cat_id);
		                            setInsertData($this->tbl_programs_relations, $dataRel);
		                        }
		                    }                           
		                }                        
		            }

                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('programs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_name, $data_featured_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
					redirect('admin/programs','refresh');
                }
			}
		}   
		$data['options_categories'] = getMultilevelOptions($this->tbl_cat, array(), '----Choose One----');
		$data['options_colleges'] = getCollegesOptions('colleges', '----Choose One----', array('status'=>1));
		$data['options_studytype'] = getMultiOptions('studytype', array('status'=>1));
		$data['options_pace'] = getMultiOptions('pace',array('status'=>1));
		$data['options_brands'] = getOptions('brands', '----Choose Brand----', array('status'=>1));

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/programs/add',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function edit()
	{
		CheckLoginSession();
		$post_data = $this->input->post();
		$edit_id   = $this->uri->segment(4);

		if(!empty($post_data))
		{
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
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

				//$post_data['associted_brands'] = !empty($post_data['associted_brands'])?implode(",", $post_data['associted_brands']):'';
				$post_data['study_type'] = !empty($post_data['study_type'])?implode(",",$post_data['study_type']):'';
				$post_data['pace'] = !empty($post_data['pace'])?implode(",",$post_data['pace']):'';
				//$post_data['category'] = !empty($post_data['category'])?implode(",",$post_data['category']):'';				

				$campus_id = !empty($post_data['campus_id'])?$post_data['campus_id']:array();
				$start_date = !empty($post_data['start_date'])?$post_data['start_date']:array();
				$end_date = !empty($post_data['end_date'])?$post_data['end_date']:array();
				$application_deadline = !empty($post_data['application_deadline'])?$post_data['application_deadline']:array();
				$edit_campus = !empty($post_data['edit_campus'])?$post_data['edit_campus']:array();

				unset($post_data['campus_id']);
				unset($post_data['start_date']);
				unset($post_data['end_date']);
				unset($post_data['application_deadline']);
				unset($post_data['edit_campus']);

				$associted_brands = !empty($post_data['associted_brands'])?$post_data['associted_brands']:'';
		        $categories = !empty($post_data['category'])?$post_data['category']:'';
				unset($post_data['associted_brands']);
				unset($post_data['category']);

				$record_id= setUpdateData($this->tbl_name, $post_data, $edit_id);


				if(!empty($edit_id))
		        {
		            
		            if(!empty($associted_brands))
		            {
		                foreach ($associted_brands as $key => $brand_id)
		                {
		                    if(!empty($categories[$brand_id]))
		                    {
		                        foreach ($categories[$brand_id] as $key => $cat_id)
		                        {
		                            $whereArr = $dataRel = array('program_id'=>$edit_id, 'brand_id'=>$brand_id, 'cat_id'=>$cat_id);
		                            setInsertOrUpdate($this->tbl_programs_relations, $dataRel, $whereArr);
		                        }
		                    }                           
		                }                        
		            }
		        }

				$college_id = $post_data['college_id'];
				if($record_id>0)
				{
					//Start Storing Campus Information
					$campusData = array();
					if(!empty($campus_id))
					{
						$cnt = count($campus_id);
						for ($i=0; $i < $cnt; $i++)
						{ 
							$campusData['program_id'] = $edit_id;
							$campusData['college_id'] = $college_id;
							$campusData['campus_id'] = $campusId = !empty($campus_id[$i])?$campus_id[$i]:'';
							$campusRec = get_record($this->tbl_college_campus,array('id'=>$campusId));
							$campusData['country_id'] = !empty($campusRec->country)?$campusRec->country:'';
							$campusData['state_id'] = !empty($campusRec->state)?$campusRec->state:'';
							$campusData['city_id'] = !empty($campusRec->city)?$campusRec->city:'';
							$campusData['start_date'] = !empty($start_date[$i])?$start_date[$i]:'';
							$campusData['end_date'] = !empty($end_date[$i])?$end_date[$i]:'';
							$campusData['application_deadline'] = !empty($application_deadline[$i])?$application_deadline[$i]:'';
							if(!empty($edit_campus[$i]) && !empty(isExist($this->tbl_campus_info,array('id'=>$edit_campus[$i]))))
			                {
			                	$id = $edit_campus[$i];
			                    setUpdateData($this->tbl_campus_info, $campusData, $id);
			                }
			                else
			                {
			                	$campusData['status'] = 1;
			                	setInsertData($this->tbl_campus_info, $campusData);
			                }
						}
						
					}
					//End Storing Campus Information
					if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('programs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_name, $data_featured_img, $record_id);
                    }
					$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
					//redirect(current_url(),'refresh');             
				}
			}
		}


		
		$data['options_categories'] = getMultilevelOptions($this->tbl_cat, array(), '----Choose One----');
		$data['options_colleges'] = getCollegesOptions('colleges', '----Choose One----', array('status'=>1));
		$data['options_studytype'] = getMultiOptions('studytype', array('status'=>1));
		$data['options_pace'] = getMultiOptions('pace',array('status'=>1));

		

		$data['options_countries'] = getOptions('country', '----Country----', array('is_active'=>1));
	    $data['options_states'] = getOptions('state', '----State----', array('status'=>1));
	    $data['options_cities'] = getOptions('city', '----City----', array('status'=>1));

		$data['brands'] = get_records('brands',array('status'=>1));
		$data['editdata'] = $editdata = getDataRecord($this->tbl_name, array('id' => $edit_id));
		$data['campusDatas'] = $campusDatas = get_recordsArr($this->tbl_campus_info, array('college_id' => $editdata['college_id']),'id','ASC');

		$campusLocArr = array(''=>'----Campus Location----');
		if(!empty($editdata['college_id']))
		{
			$campusArr = get_records('colleges_campus',array('college_id'=>$editdata['college_id'], 'status'=>1));
			if(!empty($campusArr))
			{
				foreach ($campusArr as $key => $rec)
				{
					$campusLocArr[$rec->id] = $rec->location;
				}
			}
		}		
		$data['options_campus'] = $campusLocArr; 
		$data['options_brands'] = getOptions('brands', '----Choose Brand----', array('status'=>1));
		$relations = get_records($this->tbl_programs_relations, array('program_id'=>$edit_id));
        
        $brands = array();
        $cats = array();
        if(!empty($relations))
        {
            $brands = array_unique(array_column($relations, 'brand_id'));
            if(!empty($brands))
            {
                foreach ($relations as $key => $row)
                {
                    if(in_array($row->brand_id, $brands))
                    {
                        $cats[$row->brand_id][] = $row->cat_id;
                    }
                }
            }
        }
        $data['brands'] = $brands;
        $data['cats'] = $cats;

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/programs/edit',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function ajaxFindCategory()
    {
        $brand_id = $this->input->post('brand_id');    
        $brandsArr = getMultiOptions($this->tbl_brand, array('status'=>1) );    
        if(!empty($brand_id))
        {
            $whereArr = array();
            $whereArr['FIND_IN_SET('.$brand_id.',associted_brands) <>'] = 0;
            $options_categories = getMultilevelOptions($this->tbl_cat, $whereArr, '----Choose Categories----');

            $outputHtml = '';
            $brandName = !empty($brandsArr[$brand_id])?'( '.$brandsArr[$brand_id].' )':'';

            $outputHtml.= '<div id="program_category_box_'.$brand_id.'" class="col-md-12">';
            $outputHtml.= '<div class="form-group">';
            $outputHtml.= '<label>Program Categories '.$brandName.'</label>';
            $outputHtml.= form_multiselect('category['.$brand_id.'][]', $options_categories, array(),'id="program_category_'.$brand_id.'" class="form-control select2"');
            $outputHtml.= '</div>';
            $outputHtml.= '</div>';
            $outputHtml.= '</div>';

            echo $outputHtml;
        } 
    }

	public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        deleteRecords($this->tbl_programs_relations, array('program_id'=>$id));
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/programs', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);

        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/programs', 'refresh');
    }


    public function campusinfo()
	{
		CheckLoginSession();
	    $data['program_id'] = $program_id = $this->uri->segment(4);
	    $program_id = !empty($program_id)?$program_id:0;
		$data['records'] = $records = $this->master_model->programCampusInfos($program_id);
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/programs/campusinfo',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function add_campusinfo()
	{
		CheckLoginSession();
		$post_data = $this->input->post();
		$data['program_id'] = $program_id = $this->uri->segment(5);
		$data['record'] = $record = getDataRecord($this->tbl_name, array('id' => $program_id));
		if(!empty($post_data))
		{        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('campus_id', 'campus', 'required');
			if($this->form_validation->run() != FALSE)
			{
				$post_data['program_id'] = !empty($program_id)?$program_id:0;
				$post_data['college_id'] = !empty($record['college_id'])?$record['college_id']:0;
				$post_data['status'] = 1;

				/*if(!empty($post_data['date_type']) && !empty($post_data['visibility']) && $post_data['date_type']=='automatic' && $post_data['visibility']=='yes')
				{
					$post_data['start_date'] = date('Y-m-d');
					$post_data['end_date'] = date('Y-m-t');
				}*/

				//pre($post_data); die;
				$insert_id = setInsertData($this->tbl_campus_info, $post_data);
				if ($insert_id > 0)
                {
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
					redirect('admin/programs/campus/'.$program_id,'refresh');
                }
			}
		}   
		
		$campusLocArr = array(''=>'----Campus Location----');
		if(!empty($record['college_id']))
		{
			$campusArr = get_records('colleges_campus',array('college_id'=>$record['college_id'], 'status'=>1));
			if(!empty($campusArr))
			{
				foreach ($campusArr as $key => $rec)
				{
					$campusLocArr[$rec->id] = $rec->location;
				}
			}
		}		
		$data['options_campus'] = $campusLocArr;

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/programs/add-campusinfo',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function edit_campusinfo()
	{
		CheckLoginSession();
		$post_data = $this->input->post();
		$id   = $this->uri->segment(6);
		$data['program_id'] = $program_id = $this->uri->segment(5);

		if(!empty($post_data))
		{
			//pre($post_data); die;
			$record_id= setUpdateData($this->tbl_campus_info, $post_data, $id);
			if($record_id)
			{
				$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
				redirect(base_url('admin/programs/campus/'.$program_id),'refresh');             
			}
		}

		$data['record'] = $record = getDataRecord($this->tbl_campus_info, array('id' => $id));
		$campusLocArr = array(''=>'----Campus Location----');
		if(!empty($record['college_id']))
		{
			$campusArr = get_records('colleges_campus',array('college_id'=>$record['college_id'], 'status'=>1));
			if(!empty($campusArr))
			{
				foreach ($campusArr as $key => $rec)
				{
					$campusLocArr[$rec->id] = $rec->location;
				}
			}
		}		
		$data['options_campus'] = $campusLocArr; 

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/programs/edit-campusinfo',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function delete_campusinfo()
    {
        CheckLoginSession();
        $id = $this->uri->segment(6);
        $data['program_id'] = $program_id = $this->uri->segment(5);
        setDeleteData($this->tbl_campus_info, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/programs/campus/'.$program_id, 'refresh');
    }
    
    public function status_campusinfo()
    {
        $id             = $this->uri->segment(6);
        $program_id     = $this->uri->segment(5);
        $statusId       = getStatusById($this->tbl_campus_info, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_campus_info, $data, $id);

        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/programs/campus/'.$program_id, 'refresh');
    }

    public function category()
	{
		CheckLoginSession();
		//$records = getDataRecords($this->tbl_cat, array(), 0, '', "DESC");
		$brand_id = !empty($this->session->userdata('brand_id'))?$this->session->userdata('brand_id'):'';
		$records = $this->master_model->get_recordsArr($this->tbl_cat,array('associted_brands'=>$brand_id));
		//pre($records); die;
        $data['records'] = getOptionsTree($records); 

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/programs/categories',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function addcategory()
	{
		CheckLoginSession();
		$data = array();
		$post_data=$this->input->post();

		$brand_id = getBrandId();

		if(!empty($post_data)) {        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
			{
				/*$config = array(
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
                $slug = $this->slug->create_uri($data);*/

                $slug_str=$this->input->post('name');
				$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_str)));

				$post_data['slug'] = $slug;
				$post_data['associted_brands'] = $brand_id;
				$post_data['status'] = 1;
				$insert_id = setInsertData($this->tbl_cat, $post_data);
				if ($insert_id > 0)
                {
                    if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('programs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_cat, $data_featured_img, $insert_id);
                    }
                    $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been added successfully !!'));
					redirect('admin/programs/category','refresh');
                }
			}
		}
		$data['parentOptions'] = getMultilevelOptions($this->tbl_cat, array('associted_brands'=>$brand_id), '---Self---');
		$data['options_colleges'] = getCollegesOptions('colleges', '----Choose One----', array('status'=>1));
		$data['brands'] = get_records('brands',array('status'=>1));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/programs/add-category',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function editcategory()
	{
		CheckLoginSession();
		$post_data = $this->input->post();
		$edit_id   = $this->uri->segment(5);

		$brand_id = getBrandId();

		if(!empty($post_data))
		{        
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('name', 'title', 'required');
			if($this->form_validation->run() != FALSE)
			{
				/*$slug_str=$this->input->post('slug');
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
				$post_data['slug'] = $slug;*/

				$record_id= setUpdateData($this->tbl_cat, $post_data, $edit_id);

				if($record_id>0)
				{
					if (!empty($_FILES["featured_img"]["name"]))
                    {
                        $featured_img      = do_upload('programs');
                        $data_featured_img = array('featured_img' => $featured_img);
                        setUpdateData($this->tbl_cat, $data_featured_img, $edit_id);
                    }
					$this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been modified successfully !!'));
					redirect(current_url(),'refresh');             
				}

			}
		}

		$data['parentOptions'] 		= getMultilevelOptions($this->tbl_cat, array('associted_brands'=>$brand_id), '---Self---');
		$data['options_colleges'] 	= getCollegesOptions('colleges', '----Choose One----', array('status'=>1));
		$data['brands'] 			= get_records('brands',array('status'=>1));
		$data['editdata'] 			= getDataRecord($this->tbl_cat, array('id' => $edit_id));
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/main-header');
		$this->load->view('admin/include/main-sidebar',$data);
		$this->load->view('admin/programs/edit-category',$data);
		$this->load->view('admin/include/main-footer');
		$this->load->view('admin/include/footer');
	}

	public function deletecategory()
    {
        CheckLoginSession();
        $id = $this->uri->segment(5);
        setDeleteData($this->tbl_cat, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/programs/category', 'refresh');
    }
    
    public function statuscategory()
    {
        $id             = $this->uri->segment(5);
        $statusId       = getStatusById($this->tbl_cat, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_cat, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/programs/category', 'refresh');
    }

    public function markpopularcat()
    {
        $id             = $this->uri->segment(5);
        $is_popular     = get_columData($this->tbl_cat,'is_popular', array('id'=>$id));
        $data['is_popular'] = (empty($is_popular) || $is_popular == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_cat, $data, $id);
		$this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Popularity status has been updated successfully !!'));
        redirect('admin/programs/category', 'refresh');
    }
}