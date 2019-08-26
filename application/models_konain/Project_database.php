<?php
Class Project_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function projectlist_info()
	{
		
		$this->db->select('*');
		$this->db->from('project');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
		
				 
	}
	
	public function projectlist_info_data($id)
	{

		$condition = "project_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}

	
	public function add_projectlist($data) 
	{
		
		$condition = "project_name =" . "'" . $data['projectname'] . "'";
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {
		
			$query="insert into project values('','".$data['projectname']."', '".trim(htmlentities($data['projectdesc']))."', '".$data['projectcreated']."')";		
			$this->db->query($query);
		}
		
				
	}

	public function edit_projectlist($data) 
	{
		
			$query="update project set project_name='".$data['projectname']."', project_desc='".trim(htmlentities($data['projectdesc']))."', project_created_by='".$data['projectcreated']."' where project_id='".$data['projid']."'";		
			$this->db->query($query);
			return 2;
		
				
	}	
	
	public function delete_project_data($actid)
	{
		$query="delete from project where project_id='".$actid."'";		
		$this->db->query($query);
		return 1;
	}
	
}
