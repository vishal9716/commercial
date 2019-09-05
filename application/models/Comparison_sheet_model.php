<?php

Class Comparison_sheet_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function add_by_pr_so($param) {
        
        $this->db->insert('comparision_sheet', $param);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

}
