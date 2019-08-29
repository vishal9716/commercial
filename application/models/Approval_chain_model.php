<?php

Class Approval_chain_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    static $REQUEST_FOR_APPROVAL = 0;
    static $REQUEST_APPROVED = 1;
    static $REQUEST_REJECTED = 2;

    public function add_approvar_user($param) {
        $this->db->select('*');
        $this->db->from('approval_chain');
        $this->db->where('pr_sr_no', $param['pr_sr_no']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result=$query->result();
            
            // 1
            $existing_approver_list=$result[0]->approver_user_id;
            $approver_list=$existing_approver_list . ',' .$param['approver_user_id'];
            
            // 2
            $existing_rejected_list=$result[0]->rejected_by_user_id;
            if($existing_rejected_list){
                $rejected_list=$existing_rejected_list . ',' .$param['rejected_by_user_id'];
            }else{
                $rejected_list= $param['rejected_by_user_id'];
            }            
            
            // 3
            $existing_approved_list=$result[0]->approved_by_user_id;
            if($existing_approved_list){
                $approved_list=$existing_approved_list . ',' .$param['approved_by_user_id'];
            }else{
                $approved_list=$param['approved_by_user_id'];
            }
            
            $data = array(
                'approver_user_id' => $approver_list,
                'approved_by_user_id' => $approved_list,
                'rejected_by_user_id' => $rejected_list,
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
