<?php
Class Country_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function countrylist_info()
	{
		
		$this->db->select('*');
		$this->db->from('countries');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}
	
	public function countrylist_info_data($id)
	{

		$condition = "country_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('countries');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}

	
	public function add_countrylist($data) 
	{
		
		$condition = "country_code =" . "'" . $data['countrycode'] . "'";
		$this->db->select('*');
		$this->db->from('countries');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {
		
			$query="insert into countries values('','".$data['countrycode']."', '".$data['countryname']."')";		
			$this->db->query($query);
		}
		
				
	}

	public function edit_countrylist($data) 
	{
		
			$query="update countries set country_code='".$data['countrycode']."', country_name='".$data['countryname']."' where country_id='".$data['contid']."'";		
			$this->db->query($query);
			return 2;
		
				
	}	
	
	public function delete_country_data($actid)
	{
		$query="delete from countries where country_id='".$actid."'";		
		$this->db->query($query);
		return 1;
	}
	
}
