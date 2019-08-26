<?php

Class Unit_region_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function unit_regions_list() {
        $this->db->select('*');
        $this->db->from('unit_region');
        $query = $this->db->get();
        $unit_region_arry = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row => $value) {
                $unit_region_arry[$value['unit_region_id']] = $value['unit_region_code'];
            }
        }
        return $unit_region_arry;
    }
    
    public function unit_regions_by_id($id) {
       $this->db->select('*');
       $this->db->from('unit_region');
       $this->db->where('unit_region_id', $id);
       $query = $this->db->get();
       $code=$query->row();
       return $code;
   }

}
