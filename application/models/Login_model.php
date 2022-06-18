<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function check_email() {
		
		$user_email = $this->input->post('useremail');
		
		$this->db->select('*');
	    $this->db->from('true_users');
		$this->db->where('email',$user_email);
	    $query = $this->db->get();
        if($query->num_rows()>0)
        {
            $data=$query->row_array();
            return $data;
               
        }else{        	            
            return array();
        }
    }

    public function UserLogin(){
    	$login=$this->input->post();
    	$active=1;
		$uemail=$login['useremail'];
		$password=md5($login['password']);
		$array = array('email' => $uemail, 'password' => $password);
		$this->db->where($array); 
		$query = $this->db->get('true_users');
		$rowCount=$query->num_rows();
		if($rowCount>0){
			$result=$query->row();
			$id=$result->id;
			$userdata = array(
			'userID'    => $result->id,
			'user_name'    => $result->name,
			'user_email' => $result->email
			);
			if($result->status==1){
				$this->session->set_userdata($userdata);
				return 1;
			}else{				
				return 2;
			}
			
		}
		else{
			return 0;
		}
    }

	
}