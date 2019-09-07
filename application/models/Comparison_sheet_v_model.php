<?php

Class Comparison_sheet_vendor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function add_vendor($param) {
        $this->db->insert('comparison_sheet_vendor', $param);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
}
