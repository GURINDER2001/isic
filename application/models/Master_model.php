<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function CheckLoginSession()
    {
        $admin_id = $this->session->userdata('admin_id');
        if (empty($admin_id)) {
            redirect('admin', 'refresh');
        } else {
            return 1;
        }
    }
    
    
    public function getRowCount($table)
    {
        $query = $this->db->get($table);
        $count = $query->num_rows();
        if ($count > 0) {
            return $count;
        } else {
            return 0;
        }
    }

    public function isExist($table, $whereArr = array())
    {
        if (!empty($whereArr))
            $this->db->where($whereArr);
        
        $this->db->from($table);
        $query    = $this->db->get();
        $rowCount = $query->num_rows();
        return (!empty($rowCount) && $rowCount > 0) ? 1 : 0;
    }
    
    public function setUpdateData($table, $data, $id)
    {
        $array = array(
            'id' => $id
        );
        $this->db->where($array);
        $this->db->update($table, $data);
        return $id;
    }

    public function setUpdateRecord($table, $data, $whereArr)
    {
        $this->db->where($whereArr);
        $this->db->update($table, $data);
    }
    
    public function setInsertData($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    
    public function setDeleteData($table, $id)
    {
        $array = array(
            'id' => $id
        );
        $this->db->where($array);
        $this->db->delete($table);
        return $id;
    }
    
    public function getDataCollection($table)
    {
        $query  = $this->db->get($table);
        $result = $query->result();
        return $result;
    }
    
    public function getDataCollectionByID($table, $id = "")
    {
        $this->db->where('id', $id);
        $query  = $this->db->get($table);
        $result = $query->row_array();
        return $result;
    }
    
    public function getOptions($table, $type, $status = 0)
    {
        
        $options = array(
            '' => $type
        );
        if ($table) {
            if ($status == 1) {
                $this->db->where('status', 1);
            }
            $query  = $this->db->get($table);
            $skills = $query->result();
            foreach ($skills as $value) {
                $options[$value->id] = $value->name;
            }
        }
        return $options;
    }

    public function get_record($table, $whereArr = array(), $order_by='id', $order='DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->row();
        } else {
            return array();
        }
        
    }

    public function get_recordArr($table, $whereArr = array(), $order_by='id', $order='DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->row_array();
        } else {
            return array();
        }
        
    }

    public function get_records($table, $whereArr = array(), $order_by='id', $order='DESC', $limit='', $offset=0)
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if(!empty($limit))
            CI()->db->limit($limit, $offset);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->result();
        } else {
            return array();
        }
        
    }

    public function get_recordsArr($table, $whereArr = array(), $order_by='id', $order='DESC')
    {
        if (!empty($whereArr))
            CI()->db->where($whereArr);

        if (!empty($order_by) && !empty($order))
            CI()->db->order_by($order_by, $order);
        
        CI()->db->select('*');
        CI()->db->from($table);
        $query = CI()->db->get();
        //echo CI()->db->last_query();
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->result_array();
        } else {
            return array();
        }
        
    }

    public function programCampusInfos($program_id=0)
    {
        $whereArr = array();
        if(!empty($program_id))
        {
            $whereArr['P.program_id'] = $program_id;
        }

        $this->db->where($whereArr);
        $this->db->select('*, P.id as pid, P.status as pstatus');
        $this->db->from('programs_campus_info as P');
        $this->db->join('colleges_campus as C','P.campus_id = C.id');
 /*       $this->db->group_by('E.question_id');
        $this->db->order_by('qCount','DESC');
        $this->db->limit(10, 0);*/
        $query = $this->db->get();
        ///echo $this->db->last_query();
        return $query->result();
    }
}
?>