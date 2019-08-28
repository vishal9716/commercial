<?php

Class User_Database extends CI_Model {

    // Read data using username and password
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    static $userStatus=array(
        ACTIVE_USER => 'Active',
        INACTIVE_USER => 'Inactive'
    );

    public function userlist_info($start = NULL, $limit = NULL) {
        $this->db->select('u.*,t.*');
        $this->db->from('users u');
        $this->db->join('types t', 'u.type = t.type_id', 'inner');
        if(isset($start) && isset($limit)){
            $this->db->limit($limit,$start);
        }
        $this->db->order_by("u.created_date", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function userlist_info_data($id) {
        $condition = "uid =" . "'" . $id . "'";
        $this->db->select('u.*,t.*');
        $this->db->from('users u');
        $this->db->join('types t', 'u.type = t.type_id', 'inner');
        $this->db->where($condition);
        $this->db->order_by("u.created_date", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    // Read data from database to show data in admin page
    public function read_user_information($username) {
        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function add_userlist($data) {
        unset($data['departments']);
        unset($data['actionTakenBy']);
        $currentDate =date('Y-m-d H:i:s');
        $data['created_date']=$currentDate;       
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $data['username'] );
        //$this->db->or_where('email_id', $data['email_id'] );
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            $this->db->insert('users', $data);
        }
    }

    public function edit_userlist($data) {
        $this->db->select('username','email_id');
        $this->db->from('users');
        //$this->db->where('username', $data['username'] );
        $this->db->where('email_id', $data['email_id'] );
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 404;
        } else {
            $this->db->update('users', $data, array('id' => $data['userid'])); 
            return 200;
        }
    }

    public function delete_user_data($uid) {
        $this->db->where('uid', $uid);
        $result=$this->db->delete('users');
        return $result;
    }
    
    function employee_types() {
        $this->db->select('*');
        $this->db->from('types');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->result_array();
        }
    }
    
    public function user_info_by_type($typeid) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('type', $typeid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
     public function vp_info_by_type($typeid) {
        $this->db->select(array('uid', 'email_id', 'type', 'department_id'));
        $this->db->from('users');
        $this->db->where('type', $typeid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
}