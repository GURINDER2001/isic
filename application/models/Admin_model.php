<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }   

    public function AdminLogin()
	{
		$login=$this->input->post();
		$active=1;
		$role=1;
		$username=$login['username'];
		$password=md5($login['password']);
		$array = array('username' => $username, 'password' => $password, 'role' => $role, 'status' => $active);
		$this->db->where($array); 
		$query = $this->db->get('users');
		$rowCount=$query->num_rows();
		if($rowCount>0)
		{

			$result = $query->row();
			$id = $result->id;
			$userdata = array(
    			'admin_id'    => $result->id,
    			'admin_name'    => $result->first_name.' '.$result->last_name,
    			'admin_role'    => $result->role,
    			'admin_email' => $result->email
			);
			$this->session->set_userdata($userdata);
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function getProgramsByBrandId($brand_id = '')
	{
		$this->db->distinct();
		$this->db->select('P.*');			
		$this->db->from('true_programs as P');
		$this->db->join('true_programs_relations as R', 'R.program_id = P.id', 'LEFT');
		if(!empty($brand_id))
		{
			$this->db->where('R.brand_id',$brand_id);
		}
		$this->db->order_by('P.id', 'DESC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result();
            return $result;
        } else {
            return array();
        }
	}
}
?>