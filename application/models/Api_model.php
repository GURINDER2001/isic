<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

public $usertbl = 'users';
public function __construct()
{
	parent::__construct();
}

public function login($email,$password) {
	$active=1;
	$password=md5($password);
	$this->db->select('*');
	$this->db->where('email', $email); 
	$this->db->where('password', $password); 
	$this->db->where('status', $active); 
	$query = $this->db->get($this->usertbl);
	$rowCount=$query->num_rows();

	if($rowCount>0)
	{
		$result=$query->row_array();
		$result = array_merge($result, array('is_validated'=>true, 'is_loggedin'=>true));
		return $result;
	}
	else{
		return 0;
	}
}

function getUserDetails($email){
	$this->db->select('*');
	$this->db->where('email', $email);  
	$this->db->or_where('id', $email); 
	$query = $this->db->get($this->usertbl);
	$rowCount=$query->num_rows();
	if($rowCount>0)
	{
		$result=$query->row_array();
		$result = array_merge($result, array('is_validated'=>true, 'is_loggedin'=>true));
		return $result;
	}
	else{
		return 0;
	}
}

function ValidateUsers($table,$email,$userID) {
	$this->db->where('email', $email); 
	$this->db->where('id', $userID); 
	$query = $this->db->get($table);
	$rowCount=$query->num_rows();
	if($rowCount>0)
	{
		return true;
	}else{
		return false;
	}

}

function validateOTP($userDetails,$otp ){
	$id=$userDetails['id'];
	$this->db->where('otp', $otp); 
	$this->db->where('id', $id); 
	$query = $this->db->get($this->usertbl);
	$rowCount=$query->num_rows();
	if($rowCount>0)
	{
		$data = array('otp' =>'');
		$this->db->where('id',$id);  
		$this->db->update($this->usertbl, $data);
		return true;
	}else{
		return false;
	}
}

function resetPassword($user_id,$password){
	$data['password'] =md5($password);
	$this->db->where('id', $user_id);
	$update = $this->db->update($this->usertbl ,$data);
	if($update){    
		return true;
	}else{
		return false;
	}   
}

public function setUpdateData($table, $data, $id){
	$array = array('id' => $id);
	$this->db->where($array);  
	$this->db->update($table, $data);
	return $id;
}


public function setInsertData($table, $data){
	$this->db->insert($table, $data);
	return $this->db->insert_id();
}

public function setDeleteData($table,$id){
	$array = array('id'=> $id);
	$this->db->where($array);
	$this->db->delete($table);
	return $id;
}

public function getDataCollection($table){
	$query = $this->db->get($table);
	$result = $query->result();
	return $result;
}

public function getDataCollectionByID($table,$id){
	$this->db->where('id',$id);
	$query = $this->db->get($table);
	$result = $query->row_array();
	return $result;
}

}
?>