<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Studenthub_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function studentLogin()
	{
		$postdata=$this->input->post();
		$useremail= $postdata['useremail'];
		$password=md5($postdata['userpass']);
		$array = array('email' => $useremail, 'password' => $password,'status' => 1);
		$this->db->where($array); 
		$query = $this->db->get('students');
		$rowCount=$query->num_rows();
		if($rowCount>0)
		{
			$result=$query->row();
			$id=$result->id;
			$userdata = array(
			'student_id'    => $result->id,
			'student_name'    => $result->first_name.' '.$result->last_name,
			'student_email' => $result->email
			);
			$this->session->set_userdata('student_login_data',$userdata);
			return 1;
		}
		else
		{
			return 0;
		}
	}
}
?>