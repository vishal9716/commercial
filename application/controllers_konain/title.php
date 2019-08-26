<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Title extends CI_Controller {

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
		$this->load->model('title_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{			
		$result = $this->title_database->titlelist_info();
		//print_r($result);
		$data = array(
					'titledata' => $result,
					
				);
		
		$this->load->view('title_list',$data);
	}
	
	public function add_title()
	{
		
		if($this->input->post('title_name'))
		{
			$data = array(
						'title_name' => $this->input->post('title_name')										
					 );
					 
			$result_ttitle = $this->title_database->add_titlelist($data); 
			if($result_ttitle != 2)
			{
				$result = $this->title_database->titlelist_info();
				//print_r($result);
				$data = array(
						'titledata' => $result,
						
					);
				
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('title_list',$data);
			}
			else
			{
				$data = array(
			'error_message' => 'title name is already exist, Please try other title name.'
			);
				$this->load->view('add_title',$data);
			}
				
		}
		else
		{	
		
			$result = $this->title_database->titlelist_info();
			//print_r($result);
			$data = array(
					'titledata' => $result,
					
				);
			$this->load->view('add_title',$data);
		}
				
	}
	
	
	// Edit user	
	public function edit_title()
	{
		
		if($this->input->post('title_name'))
		{
			
			$data = array(
						'title_name' => $this->input->post('title_name'),						
						'titleid' => $this->input->post('titleid')
					 );
					 
			$result_title = $this->title_database->edit_titlelist($data);
			
			if($result_title == 2)
			{
				$result = $this->title_database->titlelist_info();
				//print_r($result);
				$data = array(
						'titledata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('title_list',$data);
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
			$titleid = $_GET['tid'];			
			$result_records = $this->title_database->titlelist_info_data($titleid); 			
			//echo "<pre>";
			//print_r($result_records);
			 $data = array(
					'titlerecord' => $result_records,					
				); 
			
			$this->load->view('edit_title',$data);
		}
				
	}
	
	// Logout from admin page
	public function delete_title() {

		$titleid = $_GET['tid'];
		$result_records = $this->title_database->delete_title_data($titleid);
		if($result_records ==1)
		{
			$result = $this->title_database->titlelist_info();				
			$data = array(
						'titledata' => $result,
						
					);
				
			$this->load->view('title_list',$data);
		}
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */