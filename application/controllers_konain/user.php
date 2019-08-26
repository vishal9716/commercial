<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('user_database');
		$this->load->model('type_model');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
		$result = $this->user_database->userlist_info();
		$result_type = $this->type_model->typelist_info();
		//print_r($result);
		$data = array(
					'userdata' => $result,
					'typedata' => $result_type,
					
				);
		
		$this->load->view('user_list',$data);
	}
	
	public function add_user()
	{
		
		if($this->input->post('username'))
		{
			$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'fname' => $this->input->post('fname'),
						'lname' => $this->input->post('lname'),
						'email_id' => $this->input->post('email'),
						'type' => $this->input->post('type'),
						'photo' => $this->input->post('photo'),
						'status' => $this->input->post('status')						
					 );
					 
			$result_user = $this->user_database->add_userlist($data); 
			if($result_user != 2)
			{
				$result = $this->user_database->userlist_info();
				$result_type = $this->type_model->typelist_info();
				//print_r($result);
				$data = array(
						'userdata' => $result,
						'typedata' => $result_type,
						
					);
				
				$this->load->view('user_list',$data);
			}
			else
			{
				$data = array(
			'error_message' => 'Username is already exist, Please try other username.'
			);
				$this->load->view('add_user',$data);
			}
				
		}
		else
		{	
			$result_type = $this->type_model->typelist_info();
			$data = array(						
						'typedata' => $result_type,
						
					);
			$this->load->view('add_user',$data);
		}
				
	}
	
	
	// Edit user	
	public function edit_user()
	{
		
		if($this->input->post('username'))
		{
			
			$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'fname' => $this->input->post('fname'),
						'lname' => $this->input->post('lname'),
						'email_id' => $this->input->post('email'),
						'type' => $this->input->post('type'),
						'photo' => $this->input->post('photo'),
						'status' => $this->input->post('status'),
						'userid' => $this->input->post('userid'),
					 );
					 
			$result_user = $this->user_database->edit_userlist($data);
			
			if($result_user == 2)
			{
				$result = $this->user_database->userlist_info();
				$result_type = $this->type_model->typelist_info();
				//print_r($result);
				$data = array(
						'userdata' => $result,
						'typedata' => $result_type,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('user_list',$data);
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
			$usid = $_GET['uid'];			
			$result_records = $this->user_database->userlist_info_data($usid); 
			$result_type = $this->type_model->typelist_info();
			//echo "<pre>";
			//print_r($result_records);
			 $data = array(
					'userrecord' => $result_records,
					'typedata' => $result_type,
					
				); 
			
			$this->load->view('edit_user',$data);
		}
				
	}
	
	// Logout from admin page
	public function delete_user() {

		$usid = $_GET['uid'];
		$result_records = $this->user_database->delete_user_data($usid);
		if($result_records ==1)
		{
			$result = $this->user_database->userlist_info();				
			$data = array(
						'userdata' => $result,
						
					);
				
			$this->load->view('user_list',$data);
		}
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */