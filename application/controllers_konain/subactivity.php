<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subactivity extends CI_Controller {

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
		$this->load->model('subactivity_database');
		$this->load->model('activity_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
			
		$result = $this->subactivity_database->subactivitylist_info();
		//print_r($result);
		$data = array(
					'subactivitydata' => $result,
					
				);
		
		$this->load->view('subactivity_list',$data);
	}
	
	public function add_subactivity()
	{
		
		if($this->input->post('subactivityname'))
		{
			$data = array(
						'subactivityname' => $this->input->post('subactivityname'),
						'subactivitydesc' => $this->input->post('subactivitydesc'),
						'activityname' => $this->input->post('activityname')
								
					 );
					 
			$result_type = $this->subactivity_database->add_subactivitylist($data); 
			if($result_type != 2)
			{
				$result = $this->subactivity_database->subactivitylist_info();
				//print_r($result);
				$data = array(
						'subactivitydata' => $result,
						
					);
				
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('subactivity_list',$data);
			}
			else
			{
				$data = array(
			'error_message' => 'Sub-activityname is already exist, Please try other subactivityname.'
			);
				$this->load->view('add_subactivity',$data);
			}
				
		}
		else
		{	
			
			$result = $this->activity_database->activitylist_info();
			//print_r($result);
			$data = array(
					'activitydata' => $result,
					
				);
			$this->load->view('add_subactivity',$data);
		}
				
	}
	
	
	// Edit user	
	public function edit_subactivity()
	{
		
		if($this->input->post('subactivityname'))
		{
			
			$data = array(
						'subactivityname' => $this->input->post('subactivityname'),
						'subactivitydesc' => $this->input->post('subactivitydesc'),
						'activityname' => $this->input->post('activityname'),
						'subactid' => $this->input->post('subaid')
					 );
					 
			$result_type = $this->subactivity_database->edit_subactivitylist($data);
			
			if($result_type == 2)
			{
				$result = $this->subactivity_database->subactivitylist_info();
				//print_r($result);
				$data = array(
						'subactivitydata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('subactivity_list',$data);
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
			$subactid = $_GET['subactid'];			
			$result_records = $this->subactivity_database->subactivitylist_info_data($subactid);
			
			$result = $this->activity_database->activitylist_info();
			//print_r($result);
			
			//echo "<pre>";
			//print_r($result_records);
			 $data = array(
					'subactivityrecord' => $result_records,
					'activitydata' => $result,
					
				); 
						
			$this->load->view('edit_subactivity',$data);
		}
				
	}
	
	// Logout from admin page
	public function delete_subactivity() {

		$subaid = $_GET['subaid'];
		$result_records = $this->subactivity_database->delete_subactivity_data($subaid);
		if($result_records ==1)
		{
			$result = $this->subactivity_database->subactivitylist_info();				
			$data = array(
						'subactivitydata' => $result,
						
					);
				
			$this->load->view('subactivity_list',$data);
		}
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */