<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('login_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{
		
		$this->load->view('login_message');
	}
	
	public function login_submit()
	{
		
		//$this->load->model('login_database');
		$username = $this->input->post('username');
		$passwords = $this->input->post('password');
		$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					 );
		
		//echo "Test";
		//print_r($data);
		$result = $this->login_database->login($data); 
				
		if($result == 1)
		{
			$username = $this->input->post('username');
			
			$result = $this->login_database->read_user_information($username);
			if ($result != false)
			{
				$session_data = array(
					'username' => $result[0]->username,
					'email' => $result[0]->email_id,
					'firstname' => $result[0]->fname,
					'lastname' => $result[0]->lname,
				);
				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);
				$this->load->view('welcome_message');
			}
		} else {
			$data = array(
			'error_message' => 'Invalid Username or Password'
			);
			
			$this->load->view('login_message', $data);			
		}
			
		
	
		//$this->load->view('login_message');
	}
	
	
	// Logout from admin page
public function logout() {

	// Removing session data
	$sess_array = array(
	'username' => ''
	);
	$this->session->unset_userdata('logged_in', $sess_array);
	$data['message_display'] = 'Successfully Logout';
	$this->load->view('login_message', $data);
}


	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */