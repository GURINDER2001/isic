<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function frontLogin()
	{
		$login=$this->input->post();
		$useremail= $login['useremail'];
		$password=md5($login['password']);
		$array = array('email' => $useremail, 'password' => $password,'status' => 1);
		$this->db->where($array); 
		$query = $this->db->get('true_users');
		$rowCount=$query->num_rows();
		if($rowCount>0)
		{
			$result=$query->row();
			$id=$result->id;
			$userdata = array(
			'user_id'    => $result->id,
			'user_name'    => $result->name,
			'user_email' => $result->email
			);
			$this->session->set_userdata('login_data',$userdata);
			return 1;
		}
		else
		{
			return 0;
		}
	}
}
?>