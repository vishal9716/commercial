<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends CI_Controller {

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
		$this->load->model('currency_database');
		$this->load->model('country_database');
		
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
			
		$result = $this->currency_database->currencylist_info();
		//print_r($result);
		$data = array(
					'currencydata' => $result,
					
				);
		
		$this->load->view('currency_list',$data);
	}
	
	public function add_currency()
	{
		
		if($this->input->post('currencycode'))
		{
			$data = array(
						'currencycode' => $this->input->post('currencycode'),
						'currencysymbol' => $this->input->post('currencysymbol'),
						'countryname' => $this->input->post('countryname'),
						'currencyvalue' => $this->input->post('currencyvalue')						
					 );
					 
			$result_type = $this->currency_database->add_currencylist($data); 
			if($result_type != 2)
			{
				$result = $this->currency_database->currencylist_info();
				//print_r($result);
				$data = array(
						'currencydata' => $result,
						
					);
				
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('currency_list',$data);
			}
			else
			{
				$data = array(
			'error_message' => 'Currencycode is already exist, Please try other currencycode.'
			);
				$this->load->view('add_currency',$data);
			}
				
		}
		else
		{	
		
			$result = $this->country_database->countrylist_info();
			//print_r($result);
			$data = array(
					'countrydata' => $result,
					
				);
			$this->load->view('add_currency',$data);
		}
				
	}
	
	
	// Edit user	
	public function edit_currency()
	{
		
		if($this->input->post('currencycode'))
		{
			
			$data = array(
						'currencycode' => $this->input->post('currencycode'),
						'currencysymbol' => $this->input->post('currencysymbol'),
						'countryname' => $this->input->post('countryname'),
						'currencyvalue' => $this->input->post('currencyvalue'),
						'curid' => $this->input->post('curid')
					 );
					 
			$result_type = $this->currency_database->edit_currencylist($data);
			
			if($result_type == 2)
			{
				$result = $this->currency_database->currencylist_info();
				//print_r($result);
				$data = array(
						'currencydata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('currency_list',$data);
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
			$curid = $_GET['curid'];			
			$result_records = $this->currency_database->currencylist_info_data($curid); 
			$result = $this->country_database->countrylist_info();
			//echo "<pre>";
			//print_r($result_records);
			 $data = array(
					'currencyrecord' => $result_records,
					'countrydata' => $result,
				); 
			
			$this->load->view('edit_currency',$data);
		}
				
	}
	
	// Logout from admin page
	public function delete_currency() {

		$cid = $_GET['curid'];
		$result_records = $this->currency_database->delete_currency_data($cid);
		if($result_records ==1)
		{
			$result = $this->currency_database->currencylist_info();				
			$data = array(
						'currencydata' => $result,
						
					);
				
			$this->load->view('currency_list',$data);
		}
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */