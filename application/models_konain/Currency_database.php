<?php
Class Currency_database extends CI_Model {

	// Read data using username and password
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		
    }
	
	public function currencylist_info()
	{
		
		$this->db->select('cur.*,c.*');
		$this->db->from('currency cur');
		$this->db->join('countries c', 'cur.country_id = c.country_id', 'inner');		
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
				 
	}
	
	public function currencylist_info_data($id)
	{

		$condition = "currency_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('currency');
		$this->db->where($condition);
		$query = $this->db->get();			
		if ($query->num_rows() > 0) 
		{			
			return $query->result();
		} 
	}

	
	public function add_currencylist($data) 
	{
		
		$condition = "currency_code =" . "'" . $data['currencycode'] . "'";
		$this->db->select('*');
		$this->db->from('currency');
		$this->db->where($condition);		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 2;
		} else {
		
			$query="insert into currency values('','".$data['currencycode']."', '".trim(htmlentities($data['currencysymbol']))."', '".$data['countryname']."', '".$data['currencyvalue']."')";		
			$this->db->query($query);
		}
		
				
	}

	public function edit_currencylist($data) 
	{
		
			$query="update currency set currency_code='".$data['currencycode']."', currency_symbols='".trim(htmlentities($data['currencysymbol']))."', country_id='".$data['countryname']."', currency_value='".$data['currencyvalue']."' where currency_id='".$data['curid']."'";		
			$this->db->query($query);
			return 2;
		
				
	}	
	
	public function delete_currency_data($actid)
	{
		$query="delete from currency where currency_id='".$actid."'";		
		$this->db->query($query);
		return 1;
	}
	
}
