<?php
Class Activity_Database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function activitylist_info()
	{
		
		$this->db->select('*');
		$this->db->from('activity');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}
	
	public function activitylist_info_data($id)
	{

		$condition = "activity_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('activity');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}

	
	public function add_activitylist($data) 
	{
		
		$condition = "activity_name =" . "'" . $data['activityname'] . "'";
		$this->db->select('*');
		$this->db->from('activity');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {
		
			$query="insert into activity values('','".$data['activityname']."', '".$data['activitydesc']."')";		
			$this->db->query($query);
		}
		
				
	}

	public function edit_activitylist($data) 
	{
		
			$query="update activity set activity_name='".$data['activityname']."', activity_desc='".$data['activitydesc']."' where activity_id='".$data['actid']."'";		
			$this->db->query($query);
			return 2;
		
				
	}	
	
	public function delete_activity_data($actid)
	{
		$query="delete from activity where activity_id='".$actid."'";		
		$this->db->query($query);
		return 1;
	}
	
}
