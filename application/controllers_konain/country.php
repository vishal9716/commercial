<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends CI_Controller {

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
		$this->load->model('country_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
			
		$result = $this->country_database->countrylist_info();
		//print_r($result);
		$data = array(
					'countrydata' => $result,
					
				);
		
		$this->load->view('country_list',$data);
	}
	
	public function add_country()
	{
		
		if($this->input->post('countrycode'))
		{
			$data = array(
						'countrycode' => $this->input->post('countrycode'),
						'countryname' => $this->input->post('countryname')						
					 );
					 
			$result_type = $this->country_database->add_countrylist($data); 
			if($result_type != 2)
			{
				$result = $this->country_database->countrylist_info();
				//print_r($result);
				$data = array(
						'countrydata' => $result,
						
					);
				
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('country_list',$data);
			}
			else
			{
				$data = array(
			'error_message' => 'Countrycode is already exist, Please try other countrycode.'
			);
				$this->load->view('add_country',$data);
			}
				
		}
		else
		{	
		
			$this->load->view('add_country');
		}
				
	}
	
	
	// Edit user	
	public function edit_country()
	{
		
		if($this->input->post('countrycode'))
		{
			
			$data = array(
						'countrycode' => $this->input->post('countrycode'),
						'countryname' => $this->input->post('countryname'),
						'contid' => $this->input->post('contid')
					 );
					 
			$result_type = $this->country_database->edit_countrylist($data);
			
			if($result_type == 2)
			{
				$result = $this->country_database->countrylist_info();
				//print_r($result);
				$data = array(
						'countrydata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('country_list',$data);
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
			$contid = $_GET['cid'];			
			$result_records = $this->country_database->countrylist_info_data($contid); 
			//echo "<pre>";
			//print_r($result_records);
			 $data = array(
					'countryrecord' => $result_records,
					
				); 
			
			$this->load->view('edit_country',$data);
		}
				
	}
	
	// Logout from admin page
	public function delete_country() {

		$cid = $_GET['cid'];
		$result_records = $this->country_database->delete_country_data($cid);
		if($result_records ==1)
		{
			$result = $this->country_database->countrylist_info();				
			$data = array(
						'countrydata' => $result,
						
					);
				
			$this->load->view('country_list',$data);
		}
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */