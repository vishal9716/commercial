<?php
Class Outstandingpayment_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function receivablelist_info()
	{
		
		$this->db->select('*');
		$this->db->from('outstanding_payment');			
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
				 
	}
	
	public function receivablelist_info_data($id)
	{

		$condition = "receivable_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('outstanding_payment');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result_array();
		} 
	}
	
		
	public function add_receivablelist($data) 
	{
						
			$query="insert into outstanding_payment set segment = '".$data['segment']."', receivable_date= '".$data['receivable_date']."', customer_name = '".$data['customer_name']."', overdue_for = '".$data['overdue_for']."', total_billing = '".$data['total_billing']."', total_overdue = '".$data['total_overdue']."', not_due = '".$data['not_due']."', taxes = '".$data['taxes']."', freight_charges = '".$data['freight_charges']."', grand_total = '".$data['grand_total']."', remarks = '".$data['remarks']."' ";		
			$this->db->query($query);
			$insertId = $this->db->insert_id();
					
			return $insertId;
				
	}

	public function edit_receivablelist($data) 
	{
		$query="update outstanding_payment set segment = '".$data['segment']."', receivable_date= '".$data['receivable_date']."', customer_name = '".$data['customer_name']."', overdue_for = '".$data['overdue_for']."', total_billing = '".$data['total_billing']."', total_overdue = '".$data['total_overdue']."', not_due = '".$data['not_due']."', taxes = '".$data['taxes']."', freight_charges = '".$data['freight_charges']."', grand_total = '".$data['grand_total']."', remarks = '".$data['remarks']."' where receivable_id='".$data['hid_receiveable_id']."' ";		
		$this->db->query($query);		
		return $data['hid_receiveable_id'];		
				
	}
		
		
	
	public function delete_receivable_data($actid)
	{
		$query="delete from outstanding_payment where receivable_id='".$actid."'";		
		$this->db->query($query);
		return 1;
	}

	
			
	
}
