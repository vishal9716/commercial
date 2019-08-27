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
            $this->load->model('type_model');
            $this->load->model('unit_region_model');
            $this->load->model('department_model');
            $this->load->helper('string');
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
            $data['units_region']=$this->purchase_model->display_unit_region($id);
            $data['departments']=$this->purchase_model->display_department(NULL);
            $data['suppliers']=$this->purchase_model->display_supplier($id);
            $data['actionTakenBy']=$this->purchase_model->employee_types();
            $this->load->view('purchase_request_internal',$data);
		
	}
	
	// Add department
        public function add_department()
        {   
        $data['result'] = $this->purchase_model->add_department();
		echo json_encode($data['result']);
	}
	
	// Add supplier
        public function add_supplier()
        {   
        $data['result'] = $this->purchase_model->add_supplier();
		echo json_encode($data['result']);
        }
	
	
	// Checklist for CAPEX / PR SOP 
	public function checklist()
	{
		//echo "--"; die;
		$sr_no="";
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
	public function add_purchase_request() {
            echo "<pre/>"; print_r($_POST); die;
            $request_data=$_POST;            
            $data=$message=array();
            if(empty($request_data['pr_dept_id'])  && $request_data['pr_dept_id'] == ''){
                $message['error'] = "Invalid Pr num, please select Department and unit";
                echo json_encode($message);
                exit;
            }
		  
            $last_inserted_id=array();            
            foreach($request_data['memo_items'] as $value){
                ////////////////
                unset($value['pr_srno']);
                $data['sr_no'] = $request_data['sr_no'];
                $data['pr_description'] = $value['pr_desp'];
                $data['units'] = $value['pr_unit'];
                $data['avg_cods'] = $value['pr_avg_cods'];
                $data['qty_in_stock'] = $value['pr_qty_stk'];
                $data['reorder_point'] = $value['pr_reorder_pt'];
                $data['reorder_quantity'] = $value['pr_reorder_qty'];
                $data['qty_req'] = $value['pr_qty_req'];
                $data['order_placed_rate'] = $value['pr_order_rate'];
                $data['order_placed_supplier'] = $value['pr_order_supplier'];
                $inserted_id=$this->purchase_model->add_purchase_request($data);               
                $last_inserted_id[]=$inserted_id;
		}
            if(count($last_inserted_id) == count($request_data['memo_items'])){
                $message['pr_num']=$request_data['sr_no'];
                echo json_encode($message);
            }
            exit;
            
        }
	// function for Editing PR
	// update purchase request columns
	 function update_purchase_request() {
	   //echo "--".$pr_srno; die;
           $pr_srno = $this->input->post('pr_srno');
	 //echo "<pre/>"; print_r($_POST); die;	
	  $data['result'] = $this->purchase_model->update_purchase_request($pr_srno);
          
            exit;
		}
	
	  // purchase request listing
	  function purchase_request_list() {
              $prid='';   
	      $data['purchase_request_list']=$this->purchase_model->display_purchase_request($prid);              
	      $data['type_list']=$this->type_model->typelist_info_by_key_val_arr();
              $data['status_list']= $this->purchase_model::$actionstatus;
              $data['session_data'] = $this->session->userdata('logged_in');               
            
//              echo "<pre>";
//              print_r($data);
//              die(99);
		$this->load->view('purchase_request_list',$data);
	   
		}
	
	function display_pr_list() {
	   //echo "in"; die;
	   //echo $pr_srno; die;
            $pr_srno = $this->input->post('pr_srnumber');
		$data['pr_list']=$this->purchase_model->display_pr_list($pr_srno);
		//echo "<pre/>"; print_r($data);
		echo json_encode($data);
		//$this->load->view('purchase_request_list',$data);
		}
	
	  // Internal Memo
	  function internal_memo() {
	  $sr_no = $_GET['sr_no'];
	  $data['pr_list']=$this->purchase_model->display_memo($sr_no);
		 // echo $data['pr_list'][0]['count']; die;
		  if(($data['pr_list'][0]['count']) > 0){
			$data['pr_list']=$this->purchase_model->view_memo($sr_no);
			$this->load->view('display_memo',$data);
		  }else{
			  echo "create";
			  $this->load->view('internal_memo',$data);
		  }
	 // echo "<pre/>"; print_r($data); die;
	  //echo $sr_no; die;
	   
	   
		}
	
	  public function add_internal_memo($pr_sr_no)
	{
	  // echo "controller"; die;
      // echo "<pre/>";
      // print_r($_POST); die;
        $data['result'] = $this->purchase_model->add_internal_memo($pr_sr_no);
		
	}
	public function edit_internal_memo($pr_sr_no)
	{
		  $data['result'] = $this->purchase_model->edit_internal_memo($pr_sr_no);
		
	}
	  function display_memo() {
	 //echo "in"; die;
	$pr_srno = $_GET['sr_no'];
  // echo $pr_srno; die;
	 $data['pr_list']=$this->purchase_model->display_memo($pr_srno);
		  
		//echo "<pre/>"; print_r($data); die;
	   $this->load->view('display_memo',$data);
	   
		}
		// for editing PR
	  function edit_purchase_request() {
	  $sr_no = $_GET['sr_no'];
          $data['purchase_request_list']=$this->purchase_model->display_pr_list($sr_no);
	  //echo "<pre/>"; print_r($data); die;
          $data['units_region']=$this->purchase_model->display_unit_region($id);
          $data['departments']=$this->purchase_model->display_department(NULL);
          $data['suppliers']=$this->purchase_model->display_supplier($id);
          $data['actionTakenBy']=$this->purchase_model->employee_types();
	  $data['pr_list']=$this->purchase_model->display_pr($sr_no);
	  
	  //echo "<pre/>"; print_r($data); die;
	  $this->load->view('edit_purchase_request',$data);
	   
		}
		
		function edit_pr($pr_srno) {
	   //echo "--".$pr_srno; die;
	// echo "<pre/>"; print_r($_POST); die;	
	  $data['result'] = $this->purchase_model->edit_pr($pr_srno);
	   
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
         $data['negotiation_matrix_list']=$this->purchase_model->display_negotiation($nid);
		//echo "<pre/>"; print_r($data); die;
		$this->load->view('negotiation_matrix_list',$data);
		
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
		$data['comparision_history']=$this->purchase_model->display_comparision($id);
		$this->load->view('comparision_history',$data);
	}
	
   	public function checklist_listing(){
		 $data['checklist_listing']=$this->purchase_model->display_checklist($id);
		 $this->load->view('checklist_listing',$data);
		
	}
	
	
	public function update_pr_status($pr_srno){
		//echo "--->".$pr_srno; die;
		// this function will update pr_status whether it is approved or rejected.
		//echo "---".$status; die;
		// print_r($_POST); die;
		 $this->purchase_model->update_pr_status($pr_srno);
		
	}
	public function show_pr_status($pr_srno){
	//echo $pr_srno; die;
		 $data['pr_status']=$this->purchase_model->show_pr_status($pr_srno);
		echo json_encode($data['pr_status']);
		//echo "<pre/>";print_r($data);
		//echo $aa = "<div>".$data['pr_status'][1]['pr_status']."</div>";
	/*	for($i=0; $i<count($data['pr_status']); $i++)
		{
			echo $data['pr_status'][$i]['pr_status']."<br>";
		}
		*/
	}
	
        public function generate_pr_sn() {
            $request_data=$_POST;
            
            $issue_session=date('Y', strtotime($request_data['issuing_date'])) ."-". date('y', strtotime('+1 year'));           
            $unit=$this->unit_region_model->unit_regions_by_id($request_data['unit_id']);
            $dep=$this->department_model->department_short_by_id($request_data['dept_id']);
            $random=random_string('numeric', 4);
            echo THOMSAN_DIGITAL . "-" . $unit->unit_region_code . "/". $issue_session ."/".$dep->department_code."/".$random;
            exit;
           
        }
	
	
}
