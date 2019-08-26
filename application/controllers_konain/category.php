<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
		$this->load->model('category_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{			
		$result = $this->category_database->categorylist_info();
		//print_r($result);
		$data = array(
					'categorydata' => $result,
					
				);
		
		$this->load->view('category_list',$data);
	}
	
	public function add_category()
	{
		
		if($this->input->post('category_name'))
		{
			$data = array(
						'category_name' => $this->input->post('category_name')										
					 );
					 
			$result_tcategory = $this->category_database->add_categorylist($data); 
			if($result_tcategory != 2)
			{
				$result = $this->category_database->categorylist_info();
				//print_r($result);
				$data = array(
						'categorydata' => $result,
						
					);
				
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('category_list',$data);
			}
			else
			{
				$data = array(
			'error_message' => 'category name is already exist, Please try other category name.'
			);
				$this->load->view('add_category',$data);
			}
				
		}
		else
		{	
		
			$result = $this->category_database->categorylist_info();
			//print_r($result);
			$data = array(
					'categorydata' => $result,
					
				);
			$this->load->view('add_category',$data);
		}
				
	}
	
	
	// Edit user	
	public function edit_category()
	{
		
		if($this->input->post('category_name'))
		{
			
			$data = array(
						'category_name' => $this->input->post('category_name'),						
						'categoryid' => $this->input->post('categoryid')
					 );
					 
			$result_category = $this->category_database->edit_categorylist($data);
			
			if($result_category == 2)
			{
				$result = $this->category_database->categorylist_info();
				//print_r($result);
				$data = array(
						'categorydata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('category_list',$data);
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
			$categoryid = $_GET['catid'];			
			$result_records = $this->category_database->categorylist_info_data($categoryid); 			
			//echo "<pre>";
			//print_r($result_records);
			 $data = array(
					'categoryrecord' => $result_records,					
				); 
			
			$this->load->view('edit_category',$data);
		}
				
	}
	
	// Logout from admin page
	public function delete_category() {

		$categoryid = $_GET['catid'];
		$result_records = $this->category_database->delete_category_data($categoryid);
		if($result_records ==1)
		{
			$result = $this->category_database->categorylist_info();				
			$data = array(
						'categorydata' => $result,
						
					);
				
			$this->load->view('category_list',$data);
		}
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */