<?php
Class Login_Database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function login($data)
	{
		//echo "model"; die;
		/* $sqllogin = "select * from users";
		$exe = mysql_query($sqllogin);
		while($records = mysql_fetch_array($exe))
		{
			echo $records[0];
		} */
		
		
		$condition = "username  =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		//echo "--".$condition; die;
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return 1;
			//echo "correct"; die;
		} else {
			return 0;
			//echo "In correct"; die;
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
	
}
