<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

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
		$this->load->model('project_database');		
		
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
			
		$result = $this->project_database->projectlist_info();
		//print_r($result);
		$data = array(
					'projectdata' => $result,
					
				);
		
		$this->load->view('project_list',$data);
	}
	
	public function add_project()
	{
		
		if($this->input->post('projectname'))
		{
			$data = array(
						'projectname' => $this->input->post('projectname'),
						'projectdesc' => $this->input->post('projectdesc'),
						'projectcreated' => $this->input->post('projectcreated')											
					 );
					 
								 
			$result_type = $this->project_database->add_projectlist($data); 
			if($result_type != 2)
			{
				$result = $this->project_database->projectlist_info();
				//print_r($result);
				$data = array(
						'projectdata' => $result,
						
					);
				
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('project_list',$data);
			}
			else
			{
				$data = array(
			'error_message' => 'Project code is already exist, Please try other.'
			);
				$this->load->view('add_project',$data);
			}
				
		}
		else
		{	
		
			$result = $this->project_database->projectlist_info();
			//print_r($result);
			$data = array(
					'projectdata' => $result,
					
				);
			$this->load->view('add_project',$data);
		}
				
	}
	
	
	// Edit user	
	public function edit_project()
	{
		
		if($this->input->post('projectname'))
		{
			
			$data = array(
						'projectname' => $this->input->post('projectname'),
						'projectdesc' => $this->input->post('projectdesc'),
						'projectcreated' => $this->input->post('projectcreated'),						
						'projid' => $this->input->post('projid')
					 );
					 
			$result_type = $this->project_database->edit_projectlist($data);
			
			if($result_type == 2)
			{
				$result = $this->project_database->projectlist_info();
				//print_r($result);
				$data = array(
						'projectdata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('project_list',$data);
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
			$pid = $_GET['pid'];			
			$result_records = $this->project_database->projectlist_info_data($pid); 
			$data = array(
					'projectrecord' => $result_records,
					
				); 
					
			$this->load->view('edit_project',$data);
		}
				
	}
	
	// Logout from admin page
	public function delete_project() {

		$pid = $_GET['pid'];
		$result_records = $this->project_database->delete_project_data($pid);
		if($result_records ==1)
		{
			$result = $this->project_database->projectlist_info();				
			$data = array(
						'projectdata' => $result,
						
					);
				
			$this->load->view('project_list',$data);
		}
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */