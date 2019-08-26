<?php
Class Title_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function titlelist_info()
	{
		
		$this->db->select('*');
		$this->db->from('titles');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}
	
	public function titlelist_info_data($id)
	{

		$condition = "title_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('titles');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}

	
	public function add_titlelist($data) 
	{
		
		$condition = "title_name =" . "'" . $data['title_name'] . "'";
		$this->db->select('*');
		$this->db->from('titles');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {
		
			$query="insert into titles values('','".$data['title_name']."', now())";		
			$this->db->query($query);
		}
		
				
	}

	public function edit_titlelist($data) 
	{
		
			$query="update titles set title_name='".$data['title_name']."' where title_id='".$data['titleid']."'";		
			$this->db->query($query);
			return 2;
		
				
	}	
	
	public function delete_title_data($actid)
	{
		$query="delete from titles where title_id='".$actid."'";		
		$this->db->query($query);
		return 1;
	}
	
}
