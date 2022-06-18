<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smtp_model extends CI_Model {

	public $tbl_name = "smtp";
	public function __construct()
	{
		parent::__construct();
	}

	public function getSmtp($name)
	{
      $this->db->select('value');
	  $this->db->where('name', $name);
	  $query = $this->db->get($this->tbl_name);	
	  $result = $query->row();
	  return $result->value;
	}
}
?>