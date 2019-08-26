<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchaserequest extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct() {
        // Call the Model constructor
        parent::__construct();
		$this->load->helper('form');
		$this->load->model('purchase_model'); 
		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
		//Loading url helper
		$this->load->helper('url');
    }
	public function index()
	{
        // $this->load->view('purchase_request_internal');
		
	}
	public function import()
	{
		$id = '';
		$data['departments']=$this->purchase_model->display_department($id);
        $this->load->view('purchase_request_import',$data);
		 // $this->load->view('purchase_request_import');
		 
		
	}
	public function internal()
	{
		 $id = '';
		 $data['departments']=$this->purchase_model->display_department($id);
         $this->load->view('purchase_request_internal',$data);
		
	}
	
	// Add department
		public function add_department()
	{
        $data['result'] = $this->purchase_model->add_department();
		echo $data['result']; die;
			
		//echo print_r($data); 
	
	}
}
