<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operations extends CI_Controller {

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
	public function index()
	{
		//echo CI_VERSION; die;
        //  $this->load->view('common/header');
        // $data['user']="--testing--";
		$this->load->model('operations_model'); 
        $data['customers']=$this->operations_model->display_customer($id);
		$data['projects']=$this->operations_model->display_projects($id);
		$data['activities']=$this->operations_model->display_activity($id);
		//echo "<pre/>"; print_r($data['activities']);
		$activity_id = $data['activities'][0]['activity_id'];
		//echo $activity_id; die;
		$data['sub_activities']=$this->operations_model->display_sub_activity($activity_id);
		$data['units']=$this->operations_model->display_unit($id);
		//echo "<pre/>"; print_r($data); die;
		$this->load->view('operations',$data);
            
	}
	// Activity Module start
	// List Activity
	function activity_list(){
		$this->load->model('operations_model'); 
        $data['activity_list']=$this->operations_model->display_activity($id);
		$this->load->view('activity_list',$data);
		}
	
	// Adding Activity
	public function add_activity()
	{ 
		$name = $this->input->post('activity_name');
		//echo $name; die;
	 	$this->load->model('operations_model'); 
        $data['result'] = $this->operations_model->add_activity($name);
		//echo print_r($data);  die;
		if($data['result'] == "2"){
		$this->activity_list();
		}else{
		
		$this->load->view('add_activity',$data);
		}
	}
	
	// Edit Activity	
	public function edit_activity()
	{ 
		$actid = $_GET['actid'];
		//echo $actid; die;
	//	print_r($_POST); die;
		$activity_name = $_POST['activity_name'];
		//echo $activity_name; die;
		$this->load->model('operations_model'); 
		
		if($activity_name){ 
		    $data['activity_list'] = $this->operations_model->edit_activity();
			echo '<script>alert("Records has been modified successfully.");</script>';
			//$this->load->view('customer_list',$data);
			 $this->activity_list();
		} else{
		
			$data['activityrecord'] = $this->operations_model->display_activity($actid);
			 if ((!empty($actid))){
		    $this->load->view('edit_activity',$data);
			 }else{
				 $this->activity_list();
			 }
		}
	}
	
	// Delete Activity
	public function delete_activity() {
    //print_r($_GET); die;
		$actid = $_GET['actid'];
		$this->load->model('operations_model');
		$result_records = $this->operations_model->delete_activity($actid);
		if($result_records)
		{
			 $this->activity_list();
		}
	}
	// Activity Module ends
	
	// List Sub Activity
	function sub_activity_list(){
		$this->load->model('operations_model'); 
        $data['sub_activity_list']=$this->operations_model->display_activity($id);
		$this->load->view('sub_activity_list',$data);
		}
	
	function customer_list(){
		$this->load->model('operations_model'); 
        $data['customers_list']=$this->operations_model->display_customer($id);
		$this->load->view('customer_list',$data);
		}
	
	// Edit Customer	
	public function edit_customer()
	{ 
		$cid = $_GET['cid'];
		$customer_name = $_POST['customer_name'];
		$this->load->model('operations_model'); 
		
		if($customer_name){ 
		    $data['customers_list'] = $this->operations_model->edit_customer();
			echo '<script>alert("Records has been modified successfully.");</script>';
			//$this->load->view('customer_list',$data);
			 $this->customer_list();
		} else{
		
			$data['customerrecord'] = $this->operations_model->display_customer($cid);
			 if ((!empty($cid))){
		    $this->load->view('edit_customer',$data);
			 }else{
				 $this->customer_list();
			 }
		}
	}
	
	// Delete customer
	public function delete_customer() {
    //print_r($_GET); die;
		$cid = $_GET['cid'];
		$this->load->model('operations_model');
		$result_records = $this->operations_model->delete_customer($cid);
		if($result_records)
		{
			 $this->customer_list();
		}
	}
	// Add client through client screen
		public function add_customer()
	{
		//echo "<pre/>"; print_r($_POST); die;
		//$name = $this->input->post('customer_name');
		//echo $name; die;
	 	$this->load->model('operations_model'); 
        $data['result'] = $this->operations_model->add_customer();
		//echo print_r($data); 
		if($data['result']){
		$this->customer_list();
		}else{
		
		$this->load->view('add_customer',$data);
		}
	}
	
	// Add Client through operations screen
		public function add_client()
	{ 
		$client_name = $this->input->post("customer_name");
		$this->load->model('operations_model'); 
        $data['result'] = $this->operations_model->add_customer();
		echo json_encode($data['result']);
        // echo "Record added Successfully";
	}
	
		// Add Project through operations screen
		public function add_projects()
	{ 
		//echo "controller"; 
		//$project_name = $this->input->post("project_name");
		//echo "--".$client_name; die;
		$this->load->model('operations_model'); 
        $data['result'] = $this->operations_model->add_project();
        //echo "<pre/>";
         echo json_encode($data['result']);
         //	echo "Record added Successfully";
		// echo print_r($_POST)($data); die;
		
	}
	
	public function add_project()
	{
		$name = $this->input->post('project_name');
		
	 	$this->load->model('operations_model'); 
        $data['result'] = $this->operations_model->add_project($name);
		//echo print_r($data); 
		if($data['result']){
		$this->project_list();
		}else{
		
		$this->load->view('add_project',$data);
		}
	}
	
	// Delete Project
	public function delete_project() {
    //print_r($_GET); die;
		$pid = $_GET['pid'];
		$this->load->model('operations_model');
		$result_records = $this->operations_model->delete_project($pid);
		if($result_records)
		{
			 $this->project_list();
		}
	}
	
	// Edit Project	
	public function edit_project()
	{ 
		//print_r($_GET);
		$pid = $_GET['pid'];
		//echo $pid; die;
		$project_name = $_POST['project_name'];
		//echo "---".$project_name; die;
		$this->load->model('operations_model'); 
		
		if($project_name){ 
			//echo "if"; die;
		    $data['project_list'] = $this->operations_model->edit_project();
			echo '<script>alert("Records has been modified successfully.");</script>';
			//$this->load->view('customer_list',$data);
			 $this->project_list();
		} else{
		 //echo "else"; die;
			//echo $pid; die;
			$data['projectrecord'] = $this->operations_model->display_projects($pid);
			 if ((!empty($pid))){
		    $this->load->view('edit_project',$data);
			 }else{
				 $this->project_list();
			 }
		}
	}
	
	function quotation_list(){
		$this->load->model('operations_model'); 
        $data['quotation_list']=$this->operations_model->display_quotation($qid);
		$this->load->view('quotation_list',$data);
		
	}
	
	public function add_estimation()
	{
		//echo "<pre/>"; print_r($_POST); die;
		$this->load->model('operations_model'); 
        $data['result'] = $this->operations_model->add_estimation();
		//echo $data['result']; die;
		if($data['result'] == "2"){
			$this->quotation_list($qid);
		}else{
		$this->load->view('operations',$data);
		 
		}
		
	}
	
	
	// Edit quotation	
	public function edit_quotation()
	{
		$qid = $_GET['qid'];
		//echo $qid; die;
		 $this->load->model('operations_model'); 
		//print_r($_POST);
		//if($_POST){
		//$data['quotation_list'] = $this->operations_model->edit_quotation($qid);
		//	echo '<script>alert("Records has been modified successfully.");</script>';
			//$this->load->view('customer_list',$data);
			// $this->quotation_list();
		//} else{
			
			 //if ((!empty($qid))){
		$data['customers']=$this->operations_model->display_customer($id);
		$data['projects']=$this->operations_model->display_projects($id);
		  $data['quotationrecord'] = $this->operations_model->display_quotation($qid);	  
		  $this->load->view('edit_quotation',$data);
			// }else{
				 //$this->quotation_list($qid);
		//	 }
		//}
		
	}
	
	// Delete quotation
	public function delete_quotation() {
   // print_r($_GET); die;
		$qsaid = $_GET['qsaid'];
		$qid = $_GET['qid'];
		$this->load->model('operations_model');
		$result_records = $this->operations_model->delete_quotation($qsaid,$qid);
		if($result_records)
		{
			 $this->quotation_list();
		}
	}
	
	// Display Projects
	function project_list(){
		$this->load->model('operations_model'); 
        $data['projects_list']=$this->operations_model->display_projects($pid);
		$this->load->view('project_list',$data);
	}
	
}
