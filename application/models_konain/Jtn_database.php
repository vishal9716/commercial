<?php
Class Jtn_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function jtnlist_info()
	{
		
		$this->db->select('*');
		$this->db->from('jtn');			
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
				 
	}
	
	public function jtnlist_info_data($id)
	{

		$condition = "jtn_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('jtn');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}

	
	public function add_jtnlist($data) 
	{
						
			$query="insert into jtn set jtn_no = '', customer_id= '".$data['clientname']."', type = '".$data['type']."', jtn_issue_date = '".$data['jtn_issue_date']."', job_name = '".$data['jobname']."', job_receive_date = '".$data['job_rec_date']."', job_due_date = '".$data['job_due_date']."', payment_term = '".$data['payment_term']."', unit = '".$data['unit']."', total_pages = '".$data['total_pages']."', project_manager = '".$data['project_manager']."', currencys = '".$data['currency']."', jtn_document = '".$data['jtn_document']."'";		
			$this->db->query($query);
			$insertId = $this->db->insert_id();
			return $insertId;
				
	}

	public function edit_jtnlist($data) 
	{
		
			if($data['jtn_issue_date'] !='')
			{
				$jtn_issue_date = $data['jtn_issue_date'];
			}
			else
			{
				$jtn_issue_date = $data['jtn_issue_date_hid'];
			}
			
			if($data['job_rec_date'] !='')
			{
				$job_rec_date = $data['job_rec_date'];
			}
			else
			{
				$job_rec_date = $data['job_rec_date_hid'];
			}
			
			if($data['job_due_date'] !='')
			{
				$job_due_date = $data['job_due_date'];
			}
			else
			{
				$job_due_date = $data['job_due_date_hid'];
			}
			
			// Create JTN Number			
			$jtn_no_val = "TD-129-19-16036";			
			$this->db->select('jtn_no');
			$this->db->from('jtn');	
			$this->db->order_by("jtn_no", "desc");
			 $this->db->limit(1);
			$query = $this->db->get();
			$jtn_nos = $query->result_array();		
			$jtnNos = $jtn_nos[0]['jtn_no'];
			$jtnNosarr = explode("-",$jtnNos);
			//print_r($jtnNosarr);
			$year = date("y");
		
			if($jtnNosarr[2] == $year)
			{
				$years = $year;
			}
			$jtn_no_val = $jtnNosarr[0]."-".$jtnNosarr[1]."-".$years."-".($jtnNosarr[3]+1);			
			// End JTN Number
			
			
			$query="update jtn set jtn_no = '".$jtn_no_val."', customer_id= '".$data['clientname']."', type = '".$data['type']."', jtn_issue_date = '".$jtn_issue_date."', job_name = '".$data['jobname']."', job_receive_date = '".$job_rec_date."', job_due_date = '".$job_due_date."', payment_term = '".$data['payment_term']."', unit = '".$data['unit']."', total_pages = '".$data['total_pages']."', project_manager = '".$data['project_manager']."', currencys = '".$data['currency']."' where jtn_id='".$data['jtn_id_hid']."' ";		
			$this->db->query($query);			
			return $data['jtn_id_hid'];
		
				
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
	
}
