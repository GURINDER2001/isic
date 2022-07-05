<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sectionsettings_model extends CI_Model {

	public $tbl_name = "section_settings";

	public function __construct()
	{
		parent::__construct();
	}

	public function getSectionDataCollection($section,$brand_id=0, $order="",$start=0,$limit="")
	{
		if($limit!="")
			CI()->db->limit($limit,$start);

		if($order!="")
			CI()->db->order_by("id",$order);

		CI()->db->where('section',$section);
		CI()->db->where('brand_id',$brand_id);
		$query = CI()->db->get($this->tbl_name);		
		$resultArr = array();
		if($query->num_rows()>0)
		{

			$result = $query->result();
			foreach ($result as $key => $row) {
				$resultArr[$row->name] = $row->value;
			}
		}
		return $resultArr;
	}

	public function getSectionSettingByKey($section,$key='',$brand_id=0)
	{

		CI()->db->where('section',$section);
		CI()->db->where('brand_id',$brand_id);
		CI()->db->where('name',$key);
		$query = CI()->db->get($this->tbl_name);
		if($query->num_rows()>0)
		{
			$result = $query->row();
			return $result->value;
		}		
	}
}
?>