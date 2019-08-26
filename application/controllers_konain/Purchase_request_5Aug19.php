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
		error_reporting(0);
    }
	public function index()
	{
        // $this->load->view('purchase_request_internal');
		
	}
	public function import()
	{
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
	public function checklist()
	{		
		$sr_no = $_GET['sr_no'];
		//echo $prid; die;
        $this->load->view('checklist');
		
	}
	public function add_sop_checklist($pr_sr_no){
		//echo $pr_sr_no; die;
		//echo "<pre/>"; print_r($_POST); die;
		$data['result'] = $this->purchase_model->add_sop_checklist($pr_sr_no);
	}
	
	public function comparision()
	{
		$sr_no = $_GET['sr_no'];
		$this->load->view('comparision_sheet');

	}
	
	// add purchase request 
	  function add_purchase_request() {
	  //echo "<pre/>"; print_r($_POST); die;	
	  $data['result'] = $this->purchase_model->add_purchase_request();
	  //echo "<pre/>"; print_r($data);
		  
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
		  $prid='';
		//  echo "in"; die;
	    $data['purchase_request_list']=$this->purchase_model->display_purchase_request($prid);
		
		//echo "<pre/>"; print_r($data); 
		$this->load->view('purchase_request_list',$data);
	   
		}
	
	function display_pr_list($pr_srno) {
	   //echo "in"; die;
	   //echo $pr_srno; die;
		$data['pr_list']=$this->purchase_model->display_pr_list($pr_srno);
		//echo "<pre/>"; print_r($data);
		echo json_encode($data);
		//$this->load->view('purchase_request_list',$data);
		}
	
	  // Internal Memo
	  function internal_memo() {
	  // echo "in"; die;
	   $this->load->view('internal_memo');
	   
		}
	  function edit_purchase_request() {
	  $sr_no = $_GET['sr_no'];
	  //echo $prid; die;
	  $data['pr_list']=$this->purchase_model->display_pr($sr_no);
		  
	  $data['purchase_request_list']=$this->purchase_model->display_pr_list($sr_no);
	  $this->load->view('edit_purchase_request',$data);
	   
		}
	
	
	// upload pr quotation
	function pr_quotation(){
	$this->load->view('pr_quotation');	
		
	}
	function pr_quotation_upload(){
	//echo "in--"; die;
	$target_dir = base_url().'index.php/uploads/PR/';
    $target_file = $target_dir . basename($_FILES["document"]["name"]);	
	$path = base_url().'index.php/uploads/PR/';
	$file_name = $_FILES['document']['name'];
	$file_upload_tmp = $_FILES['document']['tmp_name'];
	$file_type = $_FILES['document']['type'];
	$file_size = $_FILES['document']['size'];
	$file_upload = $path.$file_name;
	// echo $file_name.'<br/>'; 
	// echo $file_upload_tmp.'<br/>'; 
	// echo $file_type.'<br/>'; 
	// echo $file_size.'<br/>';
	// echo $file_upload;
	    if (move_uploaded_file($file_upload_tmp, $target_file)) {
			echo "inside"; die;
	$result = $this->purchase_model->upload_documents($file_upload,$file_type,$file_size);
		}
	// die;
	 echo "<pre/>"; print_r($_POST);
		
	}
        
        // NEGOTIATION MATRIX
	public function negotiation()
	{
        $this->load->view('negotiation_matrix');
		
	}
    
	public function add_negotiation($pr_sr_no)
	{
            //echo "<pre/>";
           // print_r($_POST); die;
            $data['result'] = $this->purchase_model->add_negotiation($pr_sr_no);
       // $this->load->view('negotiation_matrix');
		
	}
	public function negotiation_list()
	{
         $nid = '';
		 $data['negotiation_matrix_list']=$this->purchase_model->display_negotiation($nid);
		//echo "<pre/>"; print_r($data); die;
		$this->load->view('negotiation_matrix_list',$data);
		
	}
	
	public function add_internal_memo($pr_sr_no)
	{
	  // echo "controller"; die;
      // echo "<pre/>";
      // print_r($_POST); die;
        $data['result'] = $this->purchase_model->add_internal_memo($pr_sr_no);
		
	}
	
	//PURCHASE SOP AUDIT CHECKLIST 
	public function audit_checklist()
	{
        $sr_no = '';
		$this->load->view('audit_checklist');
		
	}
	public function add_audit_checklist($pr_sr_no)
	{
	 // echo "<pre/>";
      //print_r($_POST); die;
      $data['result'] = $this->purchase_model->add_audit_checklist($pr_sr_no);
		
	}
	
	
	public function audit_checklist_listing(){
			$id='';
		 $data['audit_checklist_listing']=$this->purchase_model->display_audit_checklist($id);
		 $this->load->view('audit_checklist_listing',$data);
		
	}
	// Comparision Sheet
	
	public function add_comparision($pr_sr_no){
		//echo "<pre/>";
		//print_r($_POST); die;
		$data['result'] = $this->purchase_model->add_comparision_sheet($pr_sr_no);
	}
	
	public function comparision_history(){
		//echo "--";
		$id = '';
		$data['comparision_history']=$this->purchase_model->display_comparision($id);
		$this->load->view('comparision_history',$data);
	}
	
   	public function checklist_listing(){
		$id='';
		 $data['checklist_listing']=$this->purchase_model->display_checklist($id);
		 $this->load->view('checklist_listing',$data);
		
	}
	
	
}
