<?php

Class Approval_chain_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_approvar_user($param) {
        $this->db->select('*');
        $this->db->from('approval_chain');
        $this->db->where('pr_sr_no', $param['pr_sr_no']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result=$query->result();
            $existing_id=$result[0]->approver_user_id;
            $new_ids=$existing_id . ',' .$param['approver_user_id'];
            $data = array(
                    'approver_user_id' => $new_ids,
            );
            $this->db->where('pr_sr_no', $param['pr_sr_no']);      
            $this->db->update('approval_chain', $data);
        }else{            
            $this->db->insert('approval_chain', $param);
        }
    }
    
    public function get_approver_id($param) {
        $this->db->select('*');
        $this->db->from('approval_chain');
        $this->db->where('pr_sr_no', $param['pr_sr_no']);
        $query = $this->db->get();
        return $query->result_array();
    }

}
