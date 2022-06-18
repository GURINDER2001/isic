<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Smarthub_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function collegeLogin()
	{
		$postdata=$this->input->post();
		$useremail= $postdata['useremail'];
		$password=md5($postdata['userpass']);
		$array = array('S.email' => $useremail, 'S.password' => $password,'S.status' => 1);
		$this->db->where($array);
		$this->db->select('S.*, C.college_name, C.college_email ');
		$this->db->from('colleges_staffs S');
  		$this->db->join('colleges C', 'S.college_id = C.id');
		$query = $this->db->get();
		$rowCount=$query->num_rows();
		if($rowCount>0)
		{
			$result=$query->row();
			$id=$result->id;
			$userdata = array(
				'college_staff_id'    => $result->id,
				'college_staff_name'  => $result->name,
				'college_staff_email' => $result->email,
				'college_staff_role'  => !empty($result->role)?$result->role:0,
				'college_id'    => $result->college_id,
				'college_name'  => $result->college_name,
				'college_email' => $result->college_email
			);
			$this->session->set_userdata('college_login_data',$userdata);
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function topQuestions($college_id)
	{
		$array = array('Q.status' => 1,'E.college_id'=>$college_id);
		$this->db->where($array);
		$this->db->select('E.question_id, count(E.question_id) as qCount, Q.question, SUM(E.responded) as response');
		$this->db->from('enquiries as E');
		$this->db->join('questions as Q','E.question_id = Q.id');
		$this->db->group_by('E.question_id');
		$this->db->order_by('qCount','DESC');
		$this->db->limit(10, 0);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();	
	}

	public function studentLeads($whereArr = array(), $progress_status = 0)
	{
		$whereArr['S.progress_status'] = $progress_status;
		if(!empty($whereArr))
		{
			$this->db->where($whereArr);
		}		
		$this->db->select('*');
		$this->db->from('enquiries as E');
		$this->db->join('students as S','E.student_id = S.id', true);
		$this->db->join('questions as Q','E.question_id = Q.id');
		$this->db->group_by('E.student_id');
		$this->db->order_by('S.id','DESC');
		//$this->db->limit(10, 0);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function irreleventStudentLeads($whereArr = array())
	{
		if(!empty($whereArr))
		{
			$this->db->where($whereArr);
		}		
		$this->db->select('*');
		$this->db->from('enquiries as E');
		$this->db->join('students as S','E.student_id = S.id', true);
		$this->db->join('questions as Q','E.question_id = Q.id');
		$this->db->group_by('E.student_id');
		$this->db->order_by('S.id','DESC');
		//$this->db->limit(10, 0);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function serach_gdpr($college_id,$keyword)
	{
		if(!empty($keyword))
		{
			$this->db->where('status', 1);  
			$this->db->like('first_name', $keyword);
			$this->db->or_like('last_name', $keyword);
			$this->db->or_like('email', $keyword);
		}		
		$this->db->select('*');
		$this->db->from('students');
		$this->db->order_by('first_name','ASC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function gdprDeletionRequests($college_id)
	{
		$this->db->select('*');
		$this->db->from('students_deletion as R');
		$this->db->join('students as S','R.student_id = S.id', true);
		$this->db->where('R.college_id',$college_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function performanceRecords($whereArr)
	{
		$this->db->select('P.name as name, 
						IFNULL(SUM(C.impression), 0) AS impression, 
						IFNULL(SUM(C.click), 0) AS click, 
						IFNULL(SUM(C.lead), 0) AS lead, 
						FORMAT(IFNULL(((click/impression) * 100),0),1) AS ctr, 
						FORMAT(IFNULL(((lead/click) * 100),0),1) AS cr'
					);
		$this->db->from('programs as P');
		$this->db->join('matrix_counters as C','C.program_id = P.id', 'left');
		$this->db->group_by('P.id');
		$this->db->where($whereArr);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function demographicsCountriesRecords($whereArr)
	{
		$this->db->select('L.name, L.code, SUM(C.impression) as impression, SUM(C.click) as click, SUM(C.lead) as lead');		
		$this->db->from('matrix_counters as C');
		$this->db->join('programs as P', 'P.id = C.program_id', 'left');
		$this->db->join('country as L', 'L.code = C.country', 'left');
		$this->db->group_by('C.country');
		$this->db->where($whereArr);
		$this->db->order_by('impression','DESC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$results = $query->result();
		if(!empty($results))
		{
			$total_impressions = 0;
			$total_clicks = 0;
			$total_leads = 0;
			foreach ($results as $key => $rec)
            {
               $total_impressions += $rec->impression;
               $total_clicks += $rec->click;
               $total_leads += $rec->lead;
            }

            foreach ($results as $key => $rec)
            {
               $rec->total_impressions = $total_impressions;
               $rec->total_clicks = $total_clicks;
               $rec->total_leads = $total_leads;
               $rec->per_impressions = !empty($total_impressions)?($rec->impression * 100) / $total_impressions:0;
               $rec->per_clicks = !empty($total_clicks)?($rec->click * 100) / $total_clicks:0;
               $rec->per_leads = !empty($total_leads)?($rec->lead * 100) / $total_leads:0;              
            }
		}
		return $results;
	}

	public function demographicsProgramsRecords($whereArr)
	{
		$this->db->select('P.name, SUM(C.impression) as impression, SUM(C.click) as click, SUM(C.lead) as lead');		
		$this->db->from('matrix_counters as C');
		$this->db->join('programs as P', 'P.id = C.program_id', 'left');
		$this->db->group_by('C.program_id');
		$this->db->where($whereArr);
		$this->db->order_by('impression','DESC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$results = $query->result();
		if(!empty($results))
		{
			$total_impressions = 0;
			$total_clicks = 0;
			$total_leads = 0;
			foreach ($results as $key => $rec)
            {
               $total_impressions += $rec->impression;
               $total_clicks += $rec->click;
               $total_leads += $rec->lead;
            }

            foreach ($results as $key => $rec)
            {
               $rec->total_impressions = $total_impressions;
               $rec->total_clicks = $total_clicks;
               $rec->total_leads = $total_leads;
               $rec->per_impressions = !empty($total_impressions)?($rec->impression * 100) / $total_impressions:0; 
               $rec->per_clicks = !empty($total_clicks)?($rec->click * 100) / $total_clicks:0; 
               $rec->per_leads = !empty($total_leads)?($rec->lead * 100) / $total_leads:0;               
            }
		}
		return $results;
	}

	public function distributorsReports()
	{
		$this->db->select('D.id,D.college_id,D.recipient,D.report_id,D.frequency,D.whichtime,R.programs_selections,R.included_programs,R.document_options,S.sentOn');		
		$this->db->from('matrix_report_distributors as D');
		$this->db->join('matrix_reports as R', 'R.id = D.report_id', 'left');
		$this->db->join('matrix_report_distributions_states as S', 'D.id = S.distributor_id', 'left');
		$query = $this->db->where('D.status',1);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
}
?>