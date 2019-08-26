<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {

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
		$this->load->model('activity_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
			
		$result = $this->activity_database->activitylist_info();
		//print_r($result);
		$data = array(
					'activitydata' => $result,
					
				);
		
		$this->load->view('activity_list',$data);
	}
	
	public function add_activity()
	{
		
		if($this->input->post('activityname'))
		{
			$data = array(
						'activityname' => $this->input->post('activityname'),
						'activitydesc' => $this->input->post('activitydesc')						
					 );
					 
			$result_type = $this->activity_database->add_activitylist($data); 
			if($result_type != 2)
			{
				$result = $this->activity_database->activitylist_info();
				//print_r($result);
				$data = array(
						'activitydata' => $result,
						
					);
				
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('activity_list',$data);
			}
			else
			{
				$data = array(
			'error_message' => 'Activityname is already exist, Please try other activityname.'
			);
				$this->load->view('add_activity',$data);
			}
				
		}
		else
		{	
		
			$this->load->view('add_activity');
		}
				
	}
	
	
	// Edit user	
	public function edit_activity()
	{
		
		if($this->input->post('activityname'))
		{
			
			$data = array(
						'activityname' => $this->input->post('activityname'),
						'activitydesc' => $this->input->post('activitydesc'),
						'actid' => $this->input->post('actid')
					 );
					 
			$result_type = $this->activity_database->edit_activitylist($data);
			
			if($result_type == 2)
			{
				$result = $this->activity_database->activitylist_info();
				//print_r($result);
				$data = array(
						'activitydata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('activity_list',$data);
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
			$actid = $_GET['actid'];			
			$result_records = $this->activity_database->activitylist_info_data($actid); 
			//echo "<pre>";
			//print_r($result_records);
			 $data = array(
					'activityrecord' => $result_records,
					
				); 
			
			$this->load->view('edit_activity',$data);
		}
				
	}
	
	// Logout from admin page
	public function delete_activity() {

		$aid = $_GET['aid'];
		$result_records = $this->activity_database->delete_activity_data($aid);
		if($result_records ==1)
		{
			$result = $this->activity_database->activitylist_info();				
			$data = array(
						'activitydata' => $result,
						
					);
				
			$this->load->view('activity_list',$data);
		}
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */