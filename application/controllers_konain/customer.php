<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

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
		$this->load->model('customer_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
			
		$result = $this->customer_database->customerlist_info();
		//print_r($result);
		$data = array(
					'customerdata' => $result,
					
				);
		
		$this->load->view('customer_list',$data);
	}
	
	public function add_customer()
	{
		
		if($this->input->post('customername'))
		{
			$data = array(
						'customername' => $this->input->post('customername'),
						'customeremail' => $this->input->post('customeremail'),
						'customeraddress' => $this->input->post('customeraddress'),
						'payment_term' => $this->input->post('payment_term')
					 );
					 
			$result_type = $this->customer_database->add_customerlist($data); 
			if($result_type != 2)
			{
				$result = $this->customer_database->customerlist_info();
				//print_r($result);
				$data = array(
						'customerdata' => $result,
						
					);
				
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('customer_list',$data);
			}
			else
			{
				$data = array(
			'error_message' => 'Customer name is already exist, Please try other.'
			);
				$this->load->view('add_customer',$data);
			}
				
		}
		else
		{	
		
			$this->load->view('add_customer');
		}
				
	}
	
	
	// Edit user	
	public function edit_customer()
	{
		
		if($this->input->post('customername'))
		{
			
			$data = array(
						'customername' => $this->input->post('customername'),
						'customeremail' => $this->input->post('customeremail'),
						'customeraddress' => $this->input->post('customeraddress'),
						'payment_term' => $this->input->post('payment_term'),
						'cousttid' => $this->input->post('cousttid')
					 );
					 
			$result_type = $this->customer_database->edit_customerlist($data);
			
			if($result_type == 2)
			{
				$result = $this->customer_database->customerlist_info();
				//print_r($result);
				$data = array(
						'customerdata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('customer_list',$data);
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
			$custid = $_GET['custid'];			
			$result_records = $this->customer_database->customerlist_info_data($custid); 
			//echo "<pre>";
			//print_r($result_records);
			 $data = array(
					'customerrecord' => $result_records,
					
				); 
			
			$this->load->view('edit_customer',$data);
		}
				
	}
	
	// Logout from admin page
	public function delete_customer() {

		$cid = $_GET['custid'];
		$result_records = $this->customer_database->delete_customer_data($cid);
		if($result_records ==1)
		{
			$result = $this->customer_database->customerlist_info();				
			$data = array(
						'customerdata' => $result,
						
					);
				
			$this->load->view('customer_list',$data);
		}
	}
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */