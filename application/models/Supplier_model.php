<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Supplier_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }   
   
    public function supplier_name_list() {
        $this->db->select('*');       
        $this->db->from('supplier');
        $this->db->where('status', '1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $supplier_list =[];
            foreach ($query->result_array() as $value) {
                $supplier_list[$value['supplier_id']] = $value['supplier_name'];                
            }
            return $supplier_list;
        }
    }
    
    public function add_new_supplier($param) {        
        $this->db->insert('supplier', $param);
        $last_inserted_id=$this->db->insert_id();   
        if($last_inserted_id != ''){
            $this->db->select('*');       
            $this->db->from('supplier');
            $this->db->where('status', '1');
            $query = $this->db->get();
            $result=$query->result_array();
            return $result;
        }
    }
    
    
}

?>