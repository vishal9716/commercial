<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outstanding_payment extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('outstandingpayment_database');
		$this->load->model('customer_database');
		$this->load->model('currency_database');
		$this->load->model('category_database');
		$this->load->model('title_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
		 $result = $this->outstandingpayment_database->receivablelist_info();
		 $result_cust = $this->customer_database->customerlist_info();
		// print_r($result);
		 
		$data = array(
					'receivabledata' => $result,
					'customerdata' => $result_cust,
					
				); 
		
		$this->load->view('outstanding_payment_list',$data);
	}
	
	public function add_outstanding_payment()
	{
		$session_data = $this->session->userdata('logged_in');
		//print_r($session_data);
		//$session_data['username'];
		
		if($this->input->post('segment'))
		{
					
			$receivabledate = $this->input->post('receivable_date');
			$receivabledatearr = explode("-",$receivabledate);
			//print_r($receivabledatearr);
			$receivable_date = $receivabledatearr[2]."-".$receivabledatearr[1]."-".$receivabledatearr[0];
						
			$data = array(
						'segment' => $this->input->post('segment'),
						'receivable_date' => $receivable_date,
						'customer_name' => $this->input->post('customer_name'),
						'overdue_for' => $this->input->post('overdue_for'),
						'total_billing' => $this->input->post('total_billing'),
						'total_overdue' => $this->input->post('total_overdue'),
						'not_due' => $this->input->post('not_due'),
						'taxes' => $this->input->post('taxes'),
						'freight_charges' => $this->input->post('freight_charges'),
						'grand_total' => $this->input->post('grand_total'),
						'remarks' => $this->input->post('remarks')												
					 );
					 
				$result_invoice_id = $this->outstandingpayment_database->add_receivablelist($data);
						
				$result = $this->outstandingpayment_database->receivablelist_info();
				$result_cust = $this->customer_database->customerlist_info();
				//print_r($result_cust);
				$data = array(
					'receivabledata' => $result,
					'customerdata' => $result_cust,
					
				);
		
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('outstanding_payment_list',$data);					
			
				
		} 			
		else
		{	
			// Invoice form		

			$result = $this->customer_database->customerlist_info();
			//$resultcurrency = $this->currency_database->currencylist_info();
			//$resultcategory = $this->category_database->categorylist_info();
			//$resulttitle = $this->title_database->titlelist_info();
				//print_r($result);
				$data = array(
						'customerdata' => $result,
						//'currencydata' => $resultcurrency,	
						//'categorydata' => $resultcategory,
						//'titledata' => $resulttitle,
					);			
			
			$this->load->view('add_outstanding_payment',$data);
		}
				
	}
	
	
	
	// Edit user	
	public function edit_outstanding_payment()
	{
		
		
		$session_data = $this->session->userdata('logged_in');
		
		if($this->input->post('segment'))
		{
			
			$receivabledate = $this->input->post('receivable_date');
			$receivabledatearr = explode("-",$receivabledate);
			$receivable_date = $receivabledatearr[2]."-".$receivabledatearr[1]."-".$receivabledatearr[0];
			
			$data = array(			
						'segment' => $this->input->post('segment'),
						'receivable_date' => $receivable_date,
						'customer_name' => $this->input->post('customer_name'),
						'overdue_for' => $this->input->post('overdue_for'),
						'total_billing' => $this->input->post('total_billing'),
						'total_overdue' => $this->input->post('total_overdue'),
						'not_due' => $this->input->post('not_due'),
						'taxes' => $this->input->post('taxes'),
						'freight_charges' => $this->input->post('freight_charges'),
						'grand_total' => $this->input->post('grand_total'),
						'remarks' => $this->input->post('remarks'),
						'hid_receiveable_id' => $this->input->post('hid_receiveable_id')					
						
					 );
					 
			//echo "<pre>";	
			//print_r($data);
			//die;
					 
			$result_receivable = $this->outstandingpayment_database->edit_receivablelist($data);
			
			// upload documents
			
			
			if($result_receivable != '')
			{
				$result = $this->outstandingpayment_database->receivablelist_info();
				$result_cust = $this->customer_database->customerlist_info();
				//print_r($result_cust);
				$data = array(
					'receivabledata' => $result,
					'customerdata' => $result_cust,
					
				);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('outstanding_payment_list',$data);
			}
			else
			{
					/* $data = array(
						'success_message' => 'Records has been modified successfully.'
					);
					$this->load->view('edit_user',$success_message); */
					//echo '<script>alert("Records has been modified successfully.");</script>';
			}
				
		}
		else 
		{	
				$receivableid = $_GET['revid'];	
				$result_d = $this->outstandingpayment_database->receivablelist_info_data($receivableid);			
										
				$data1['receivable_id'] = $result_d[0]['receivable_id'];
				$data1['segment'] = $result_d[0]['segment'];
				$data1['receivable_date'] = $result_d[0]['receivable_date'];				
				$data1['customer_name'] = $result_d[0]['customer_name'];
				$data1['overdue_for'] = $result_d[0]['overdue_for'];
				$data1['total_billing'] = $result_d[0]['total_billing'];
				$data1['total_overdue'] = $result_d[0]['total_overdue'];				
				$data1['not_due'] = $result_d[0]['not_due'];
				$data1['taxes'] = $result_d[0]['taxes'];
				$data1['freight_charges'] = $result_d[0]['freight_charges'];								
				$data1['grand_total'] = $result_d[0]['grand_total'];				
				$data1['remarks'] = $result_d[0]['remarks'];				
				
				//die("TEST");
				
				$resultcust = $this->customer_database->customerlist_info();				
				$data = array(
							'customerdata' => $resultcust,							
						);						
							
			//echo "<pre>";	
			//print_r($data);
			//die;	
			
			$newData = array_merge($data, $data1);			
			$this->load->view('edit_outstanding_payment',$newData);	
		}
				
	}	
	
	
	// Logout from admin page
	public function delete_outstanding() {

		$receiveid = $_GET['rid'];
		$result_records = $this->outstandingpayment_database->delete_receivable_data($receiveid);
		if($result_records ==1)
		{
			$result = $this->outstandingpayment_database->receivablelist_info();
			$result_cust = $this->customer_database->customerlist_info();
			//print_r($result_cust);
			$data = array(
				'receivabledata' => $result,
				'customerdata' => $result_cust,
				
			);
			
				//echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('outstanding_payment_list',$data);			
		}
	}
	
	
		// Logout from admin page
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */