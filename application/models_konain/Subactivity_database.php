<?php
Class Subactivity_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function subactivitylist_info()
	{
		
		/* $this->db->select('*');
		$this->db->from('sub_activity');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		}  */
		
		$this->db->select('sub.*,a.*');
		$this->db->from('sub_activity sub');
		$this->db->join('activity a', 'sub.activity_id = a.activity_id', 'inner');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
		
	}
	
	public function subactivitylist_info_data($id)
	{

		$condition = "sub_activity_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('sub_activity');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}

	
	public function add_subactivitylist($data) 
	{
		
		$condition = "sub_activity_name =" . "'" . $data['subactivityname'] . "'";
		$this->db->select('*');
		$this->db->from('sub_activity');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {  
		
			$query="insert into sub_activity values('','".$data['subactivityname']."', '".$data['subactivitydesc']."', '".$data['activityname']."')";		
			$this->db->query($query);
		}
		
				
	}

	public function edit_subactivitylist($data) 
	{
		
			$query="update sub_activity set sub_activity_name='".$data['subactivityname']."', sub_activity_desc='".$data['subactivitydesc']."',activity_id='".$data['activityname']."' where sub_activity_id='".$data['subactid']."'";		
			$this->db->query($query);
			return 2;
		
				
	}	
	
	public function delete_subactivity_data($id)
	{
		$query="delete from sub_activity where sub_activity_id='".$id."'";		
		$this->db->query($query);
		return 1;
	}
	
}
