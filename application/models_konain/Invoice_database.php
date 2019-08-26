<?php
Class Invoice_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function invoicelist_info()
	{
		
		$this->db->select('*');
		$this->db->from('invoicing');			
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
				 
	}
	
	public function invoicelist_info_data($id)
	{

		$condition = "invoicing_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('invoicing');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result_array();
		} 
	}
	
	public function invoiceactivity_info($id)
	{
		$condition = "invoice_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('invoice_activity');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result_array();
		} 
	}

	
	public function add_invoicelist($data) 
	{
						
			$query="insert into invoicing set invoicing_no = '".$data['invoice_no']."', po_no= '".$data['po_no']."', po_date = '".$data['po_date']."', invoice_date = '".$data['invoice_date']."', unit_name = '".$data['unit']."', unit_address = '".$data['unit_address']."', client_name = '".$data['customer_name']."', client_email = '".$data['customer_email']."', customer_address = '".$data['customer_address']."', consignee_address = '".$data['consignee_address']."', title_name = '".$data['title_name']."', category = '".$data['category']."', jtn_no = '".$data['jtn_no']."', currency_no = '".$data['currency_no']."', total_price = '".$data['final_total']."', status = 'Inprocess' ";		
			$this->db->query($query);
			$insertId = $this->db->insert_id();
			
			//$query_act = "insert";
			for($i=0; $i<count($data['activity']); $i++)
			{
				$query_act = "insert into invoice_activity set activity_name = '".$data['activity'][$i]."', unit_measure = '".$data['unit_measure'][$i]."', quantity = '".$data['quantity'][$i]."', rates = '".$data['rate'][$i]."', each_total = '".$data['total'][$i]."', invoice_id = '".$insertId."'";
				$this->db->query($query_act);
			}
			
			return $insertId;
				
	}

	public function edit_invoicelist($data) 
	{
		$query="update invoicing set invoicing_no = '".$data['invoice_no']."', po_no= '".$data['po_no']."', po_date = '".$data['po_date']."', invoice_date = '".$data['invoice_date']."', unit_name = '".$data['unit']."', unit_address = '".$data['unit_address']."', client_name = '".$data['customer_name']."', client_email = '".$data['customer_email']."', customer_address = '".$data['customer_address']."', consignee_address = '".$data['consignee_address']."', title_name = '".$data['title_name']."', category = '".$data['category']."', jtn_no = '".$data['jtn_no']."', currency_no = '".$data['currency_no']."', total_price = '".$data['final_total']."', status = '".$data['status']."' where invoicing_id='".$data['hid_invoice_id']."' ";		
		$this->db->query($query);

			$querydelact = "delete from invoice_activity where invoice_id = '".$data['hid_invoice_id']."'";
			$this->db->query($querydelact);
			//$query_act = "insert";
			for($i=0; $i<count($data['activity']); $i++)
			{
				$query_act = "insert into invoice_activity set activity_name = '".$data['activity'][$i]."', unit_measure = '".$data['unit_measure'][$i]."', quantity = '".$data['quantity'][$i]."', rates = '".$data['rate'][$i]."', each_total = '".$data['total'][$i]."', invoice_id = '".$data['hid_invoice_id']."'";
				$this->db->query($query_act);
			}
		
		return $data['hid_invoice_id'];
		
				
	}
		
	public function upload_documents($pathweb,$uploaddocfile_namefinal,$uploaded_by,$doc_type, $insert_ids, $doc_typename, $doc_size) 
	{
		
		$query="insert documents set document_name='".$uploaddocfile_namefinal."', document_path='".trim($pathweb)."', uploaded_by='".$uploaded_by."', uploaded_date=now(), document_dept = '".$doc_type."', document_dept_id = '".$insert_ids."', document_size = '".$doc_size."', document_type = '".$doc_typename."'";		
		$this->db->query($query);
			
		
				
	}
	
	public function documentlist_info($id)
	{

		$condition = "document_dept_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('documents');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}
	
	public function documentlist_info_data($id)
	{

		$condition = "document_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('documents');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result_array();
		} 
	}
	
	
	public function delete_currency_data($actid)
	{
		$query="delete from currency where currency_id='".$actid."'";		
		$this->db->query($query);
		return 1;
	}
	
	public function notify_operation($data)
	{
		$query="insert into invoice_query set invoice_no= '".$data['invoice_no']."', operation_email = '".$data['email_operation']."', requested_by = '".$data['requested_by']."',  query_comments = '".$data['querys']."', query_date = now()";		
		$this->db->query($query);
		$insertId = $this->db->insert_id();
		return $insertId;
	}
	
			
	
}
