<?php
Class User_Database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function userlist_info()
	{

		$this->db->select('*');
		$this->db->from('users');
		//$this->db->join('types t', 'u.type = t.type_id', 'inner');
		$this->db->order_by("u_date", "desc");
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}
	
	public function userlist_info_data($id)
	{

		$condition = "uid =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('users');
		//$this->db->join('types t', 'u.type = t.type_id', 'inner');
		$this->db->where($condition);
		$this->db->order_by("u_date", "desc");
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

	public function add_userlist($data) 
	{
		
		//$condition = "username= '".$data['username']."' and email_id = '".$data['email_id']."'";
		$condition = "username =" . "'" . $data['username'] . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {
		
			$query="insert into users values('','".$data['username']."','".$data['password']."','".$data['fname']."','".$data['lname']."','".$data['email_id']."','".$data['photo']."','".$data['type']."','".$data['status']."',now())";		
			$this->db->query($query);
		}
		
				
	}

	public function edit_userlist($data) 
	{
		
		//$condition = "username= '".$data['username']."' and email_id = '".$data['email_id']."'";
		
		
			$query="update users set password='".$data['password']."', fname='".$data['fname']."', lname='".$data['lname']."', email_id='".$data['email_id']."',photo = '".$data['photo']."', type='".$data['type']."', status='".$data['status']."' where uid='".$data['userid']."'";		
			$this->db->query($query);
			return 2;
		
				
	}	
	
	public function delete_user_data($uid)
	{
		$query="delete from users where uid='".$uid."'";		
		$this->db->query($query);
		return 1;
	}
	
}
