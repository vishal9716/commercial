<?php
Class type_model extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function typelist_info()
	{
		
		$this->db->select('*');
		$this->db->from('types');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}
        public function typelist_info_by_key_val_arr()
	{
		
		$this->db->select('*');
		$this->db->from('types');		
		$query = $this->db->get();
                
                $type_arry = array();
		if ($query->num_rows() > 0) 
		{	
//                   return $var=$query->result_array();
//                   exit;
                     //print_r($var); die();
                    foreach($query->result_array() as $key=> $value){
                    $type_arry[$value['type_id']]= $value['type_name'];
                 }
			return $type_arry;
		} 
	}
        
//        public function departments() {
//        $this->db->select('*');
//        $this->db->from('department');
//        $query = $this->db->get();
//        $dep_arry=array();
//        if ($query->num_rows() > 0) {
//            foreach ($query->result_array() as $row =>$value){
//               $dep_arry[$value['department_id']]=$value['department_name'];
//            }
//        }
//        return $dep_arry;
//    }
	
	public function typelist_info_data($id)
	{

		$condition = "type_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('types');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
                       
		} 
	}
       
        
        

	// Read data from database to show data in admin page
	public function read_user_information($username) 
	{

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

	public function add_typelist_old($data) 
	{		
		$condition = "type_name =" . "'" . $data['typename'] . "'";
		$this->db->select('*');
		$this->db->from('types');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {
		
			$query="insert into types values('','".$data['typename']."')";		
			$this->db->query($query);
		}
		
				
	}
        
        public function add_typelist($data) 
	{		
            // Check Alreday exist w.r.t dep_id && type name?
            $is_exists=$this->check_existing_type($data);
            if(count($is_exists)){
                return 0;
            }else{
                $insert_data = array(
                     'type_name' => $data['typename'],
                     'department_id' => $data['department_id'],
                     'parent_id' => $data['reporting_head'],
                     'created_date' => $data['created_date']
                 );
                $this->db->insert('types', $insert_data);
                $last_inserted_id = $this->db->insert_id();
                if($last_inserted_id > 0){
                    return 1;
                }
            }
				
	}

	public function edit_typelist($data) 
	{
		
		//$condition = "username= '".$data['username']."' and email_id = '".$data['email_id']."'";
		
		
			$query="update types set type_name='".$data['typename']."' where type_id='".$data['typeid']."'";		
			$this->db->query($query);
			return 2;
		
				
	}	
	
	public function delete_user_data($uid)
	{
		$query="delete from users where uid='".$uid."'";		
		$this->db->query($query);
		return 1;
	}
	
        public function roles_by_dep_id($param) {
                $this->db->select('*')
                        ->from('types')
                        ->where('department_id', $param['dep_id'])
                        ->or_where('parent_id', VP_PARENT_ID)
                        ->or_where('parent_id', ADMIN_PARENT_ID);
		$query = $this->db->get();
                $result=$query->result_array();
                return $result;
        }
        
        public function check_existing_type($data) {
           
            $this->db->select('*');
            $this->db->from('types');
            $this->db->where("type_name", $data['typename']);		
            $this->db->where("department_id", $data['department_id']);		
            $query = $this->db->get();
            return $result= $query->result_array();
        }
        
        public function dept_user_types($dept_id){
            $this->db->select('type_id');
            //$this->db->from('types');
            $this->db->where('department_id', $dept_id);
            $this->db->order_by('parent_id', 'DESC');
            $query= $this->db->get('types', 1);
            return $query->result_array();
        }
}
