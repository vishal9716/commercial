<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Pr_status_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    static $actionstatus = array(
        PENDING => 'Pending',
        APPROVED => 'Approved',
        REJECTED => 'Rejected'
    );
   
    public function get_status_by_prid($pr_srno) {
        $this->db->select('*');       
        $this->db->from('pr_status');
        $this->db->where('pr_status.pr_no', $pr_srno);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {		
            return $query->result_array();
        }
    }
    
    public function remove_pr_tatus($pr_srno) {
        $this->db->where('pr_no', $pr_srno);
        $this->db->delete('pr_status');
    }
    

}

?>