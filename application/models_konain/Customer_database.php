<?php
Class Customer_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function customerlist_info()
	{
		
		$this->db->select('*');
		$this->db->from('customer');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}
	
		
	public function customerlist_info_data($id)
	{

		$condition = "customer_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}
	
	public function customerlist_info_data_detail($id)
	{

		$condition = "customer_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result_array();
		} 
	}
	
	public function add_customerlist($data) 
	{
		
		$condition = "customer_name =" . "'" . $data['customername'] . "'";
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {
		
			$query="insert into customer values('','".$data['customername']."', '".$data['customeraddress']."', '".$data['payment_term']."', '".$data['customeremail']."')";		
			$this->db->query($query);
		}
		
				
	}

	public function edit_customerlist($data) 
	{
		
		$query="update customer set customer_name='".$data['customername']."', customer_address='".$data['customeraddress']."', payment_term='".$data['payment_term']."', customer_email='".$data['customeremail']."' where customer_id='".$data['cousttid']."'";		
		$this->db->query($query);
		return 2;		
				
	}	
	
	public function delete_customer_data($actid)
	{
		$query="delete from customer where customer_id='".$actid."'";		
		$this->db->query($query);
		return 1;
	}
	
}
