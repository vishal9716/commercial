<?php
Class Category_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function categorylist_info()
	{
		
		$this->db->select('*');
		$this->db->from('categorys');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}
	
	public function categorylist_info_data($id)
	{

		$condition = "category_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('categorys');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}

	
	public function add_categorylist($data) 
	{
		
		$condition = "category_name =" . "'" . $data['category_name'] . "'";
		$this->db->select('*');
		$this->db->from('categorys');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {
		
			$query="insert into categorys values('','".$data['category_name']."', now())";		
			$this->db->query($query);
		}
		
				
	}

	public function edit_categorylist($data) 
	{
		
			$query="update categorys set category_name='".$data['category_name']."' where category_id='".$data['categoryid']."'";		
			$this->db->query($query);
			return 2;
		
				
	}	
	
	public function delete_category_data($actid)
	{
		$query="delete from categorys where category_id='".$actid."'";		
		$this->db->query($query);
		return 1;
	}
	
}
