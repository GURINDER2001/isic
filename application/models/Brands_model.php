<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands_model extends CI_Model {

	public $tbl_name ='brands';
	public $tbl_country ='country';
	public $tbl_location ='locations';

	public function __construct()
	{
		parent::__construct();
	}

	public function getLocationByCountryCode($code)
	{
		$code = strtolower($code);
		$this->db->select('*');		
		$this->db->from('country as C');
		$this->db->join('locations as L', 'C.id = L.country_id', 'left');
		$this->db->where('C.code',$code);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$results = $query->row();
		return $results;
	}

	public function getLocalityByCountryCode($code)
	{
		$code = strtoupper($code);
		$this->db->select('city, state, state_short, country, country_short');		
		$this->db->from('colleges_campus');
		//$this->db->join('locations as L', 'C.id = L.country_id', 'left');
		$this->db->group_by('city');
		$this->db->where('country_short',$code);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$results = $query->result();
		return $results;
	}

	public function getLocationWiseUniverisities($code)
	{
		$code = strtoupper($code);

		$this->db->select('C.id as college_id, C.college_name, C.slug, B.location, B.city, B.city_short, B.district, B.district_short, B.state, B.state_short, B.country, B.country_short');
		$this->db->distinct('`college_id`');		
		$this->db->from('colleges as C');
		$this->db->join('colleges_campus as B', 'C.id = B.college_id', 'left');
		$this->db->group_by('city');
		$this->db->where('country_short',$code);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$results = $query->result();
		return $results;
	}
}
