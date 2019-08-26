<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_request extends CI_Controller {

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
		 $this->load->model('purchase_model'); 
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
		
	}
	public function internal()
	{
		 $id='';
		 $data['departments']=$this->purchase_model->display_department($id);
         $this->load->view('purchase_request_internal',$data);
		
	}
	
	// Add department
		public function add_department()
		{   
        $data['result'] = $this->purchase_model->add_department();
		echo json_encode($data['result']);
		}
	
	// Checklist for CAPEX / PR SOP 
	public function capex()
	{
        $this->load->view('capex_checklist');
		
	}
	// NEGOTIATION MATRIX
	public function negotiation()
	{
        $this->load->view('negotiation_matrix');
		
	}
	//PURCHASE SOP AUDIT CHECKLIST 
	public function audit_checklist()
	{
        $this->load->view('audit_checklist');
		
	}
	
	// add purchase request 
	  function add_purchase_request() {
	  //echo "<pre/>"; print_r($_POST); die;	
	  $data['result'] = $this->purchase_model->add_purchase_request();
	  // echo "<pre/>"; print_r($data);
		  echo json_encode($data['result']);
		  // $this->load->view('purchase_request_internal',$data);
		}
	
	// update purchase request columns
	 function update_purchase_request($pr_srno) {
	   //echo "--".$pr_srno; die;
	  //echo "<pre/>"; print_r($_POST); die;	
	  $data['result'] = $this->purchase_model->update_purchase_request($pr_srno);
	   
		}
	
	  // purchase request listing
	  function purchase_request_list() {
		//  echo "in"; die;
		$prid='';
	    $data['purchase_request_list']=$this->purchase_model->display_purchase_request($prid);
		 //echo "<pre/>"; print_r($data); die;
		$this->load->view('purchase_request_list',$data);
	   
		}
	  // Internal Memo
	  function internal_memo() {
	  // echo "in"; die;
	   $this->load->view('internal_memo');
	   
		}
	  function edit_purchase_request() {
	  $prid = $_GET['prid'];
	  //echo $prid; die;
	  $data['purchase_request_list']=$this->purchase_model->display_purchase_request($prid);
	  $this->load->view('edit_purchase_request',$data);
	   
		}
	  function test($pr_id){
	   $data['result'] = $this->purchase_model->edit_purchase_request($pr_id);
		//echo '<script>alert("Records has been modified successfully.");</script>';
			//$this->load->view('customer_list',$data);
			 //$this->purchase_request_list();
	}
	
}
