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
            $this->load->model('approval_chain_model');
            $this->load->model('user_database');
            $this->load->model('pr_status_model');
            $this->load->model('supplier_model');
            //$this->load->model('approval_chain_model');
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
            $request_data=$_POST;
            $currentDate =date('Y-m-d H:i:s');
            $CreateData=array(
                'supplier_name' => $request_data['supplier_name'],
                'supplier_desp' => $request_data['supplier_descp'],
                'supplier_email' => $request_data['supplier_email'],
                'created_date' => $currentDate                
            );           
            $data['result'] = $this->supplier_model->add_new_supplier($CreateData);
            echo json_encode($data['result']);
        }	
	
	// Checklist for CAPEX / PR SOP 
	public function checklist()
	{
            $sr_no="";
            $sr_no = $_GET['sr_no'];
            $this->load->view('checklist');		
	}
	public function add_sop_checklist(){
            $pr_sr_no = $_POST['sr_no'];
            $data['result'] = $this->purchase_model->add_sop_checklist($pr_sr_no);
	}
	
      
	public function add_purchase_request() {           
            $request_data=$_POST;
            $data=array();
            $message=array();
            $currentDate =date('Y-m-d H:i:s');
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
                $data['pr_supplier_rate'] = $value['pr_supplier_rate'];
                $data['pr_supplier_supplier'] = $value['pr_supplier_supplier'];
                $data['order_placed_supplier'] = $value['pr_order_supplier'];
                $data['created_date'] = $currentDate;
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
	public function update_purchase_request() {
            
            $pr_srno = $this->input->post('pr_srno');
            $data['result'] = $this->purchase_model->update_purchase_request($pr_srno);          
            exit;
	}
	
	// purchase request listing
	public function purchase_request_list() {  
            $session_data=$this->session->userdata('logged_in');
            
            $pu_list_param=array(
                'department_id' => $session_data['department_id'],
                'pr_id'=> '',
                'uid'=>$session_data['uid'],
                'type_id'=>$session_data['user_type'],
            );
            $supplier_list=$this->supplier_model->supplier_name_list();
            $data['purchase_request_list']=$this->purchase_model->display_purchase_request($pu_list_param);       
            $data['type_list']=$this->type_model->typelist_info_by_key_val_arr();
            $data['status_list']= $this->purchase_model::$actionstatus;
            $data['session_data'] = $session_info;  
            $data['supplier_list'] = $supplier_list;
            $this->load->view('purchase_request_list',$data);
	}
	
	public function display_pr_list() {
            $pr_srno = $this->input->post('pr_srnumber');
            $data['pr_list']=$this->purchase_model->display_pr_list($pr_srno);            
            echo json_encode($data);           
        }
	
	// Internal Memo
        public function internal_memo() {
            $sr_no = $_GET['sr_no'];           
            $data['pr_list']=$this->purchase_model->display_memo($sr_no);           
            $data['actionTakenBy']=$this->purchase_model->employee_types();
            if(($data['pr_list'][0]['count']) > 0){
                $data['pr_list']=$this->purchase_model->view_memo($sr_no);               
                $this->load->view('display_memo',$data);
            }else{
                $this->load->view('internal_memo',$data);
            }
	}
	
	public function add_internal_memo(){            
            $request_data=$_POST;          
            $session_data = $this->session->userdata('logged_in');
            $addMemodata = array();
            $currentDate =date('Y-m-d H:i:s');
            $addMemodata['pr_sr_no'] = $request_data['sr_no']; 
            $addMemodata['pr_date'] = $request_data['date']; 
            $addMemodata['pr_to'] = $request_data['to'];  // to is the user type id
            $addMemodata['pr_from'] = $request_data['order_placed_by']; 
            $addMemodata['subject'] = $request_data['subject']; 
            $addMemodata['description'] = $request_data['editor']; 
            $addMemodata['created_by'] = $request_data['order_placed_by']; 
            $addMemodata['pr_from_user_id'] = $request_data['from_user_id']; 
            $addMemodata['created_date'] = $currentDate;
            $inserted_id = $this->purchase_model->add_internal_memo($addMemodata);        
//            if($inserted_id){
                // Add approval 
                $userInfo=$this->user_database->user_info_by_type($request_data['to']);
                $approval_data=array(
                    'pr_sr_no' => $request_data['sr_no'],
                    'type_user_id' => $request_data['to'],
                    'user_id'=>$userInfo[0]['uid'],
                    'approval_type' => 0
                );
                $this->add_approval_user($approval_data);

                // Insert Into pr Status
                $create_pr_status=array(
                    'pr_srno' => $request_data['sr_no'],
                    'status_by' => $request_data['order_placed_by'],
                    'from_user_id' =>$request_data['from_user_id'],
                    'to_user_id' =>$userInfo[0]['uid'],
                    'to_user_fullname' =>$userInfo[0]['fname'] .' '.$userInfo[0]['lname'],
                    'pr_status_date' => $request_data['date']
                );
                $this->create_pr_status($create_pr_status);
                // Send mail           
                /* $email_id=$userData[0]['email_id'];
                $sendEmailData=array(
                    'from_email'=>$session_data['email'],
                    'from_name'=>$session_data['firstname'] .' '. $session_data['lastname'],
                    'to_email' => $email_id,
                    'subject' => $request_data['subject'],
                    'message' => $request_data['description']
                );
                $this->sendmail($sendEmailData);*/
//            }
            exit;
	}
        
	public function edit_internal_memo(){
            $request_data=$_POST;             
            $session_data = $this->session->userdata('logged_in');
            $editMemodata = array();
            $pr_srno =$request_data['sr_no'];
            //$editMemodata['pr_sr_no'] = $request_data['sr_no']; 
            $editMemodata['pr_date'] = $request_data['date']; 
            $editMemodata['pr_to'] = $request_data['to'];  // to is the user
            $editMemodata['subject'] = $request_data['subject'];
            $editMemodata['description'] = $request_data['editor'];
            $editMemodata['modified_by'] = $session_data['username'];
            
            // Get Status of Pr Request            
            $existing_pr=$this->purchase_model->get_status_by_prid($pr_srno);           
            // Re initiate the rejected Pr staus 
            if($existing_pr[0]['status'] ==  2){              
                $userInfo=$this->user_database->user_info_by_type($request_data['to']);
                //////////////DELETE//////////////////
                $this->pr_status_model->remove_pr_tatus($pr_srno);
                $this->approval_chain_model->remove_record($pr_srno);                
                //////////////////////////////////
                // Create approval_chain table
                $approval_data=array(
                    'pr_sr_no' => $request_data['sr_no'],
                    'type_user_id' => $request_data['to'],
                    'user_id'=>$userInfo[0]['uid'],
                    'approval_type' => 0
                );
                $this->add_approval_user($approval_data);                
                // Create pr Status
                $create_pr_status = array(
                    'pr_srno' => $request_data['sr_no'],
                    'status_by' => $request_data['order_placed_by'],
                    'from_user_id' =>$request_data['from_user_id'],
                    'to_user_id' =>$userInfo[0]['uid'],
                    'to_user_fullname' =>$userInfo[0]['fname'] .' '.$userInfo[0]['lname'],
                    'pr_status_date' => $request_data['date']
                );
                $this->create_pr_status($create_pr_status);                                
                // Re initiate the PR by resettong status to 0 in 
                // Purchase Request Table
                $reinitiatePr=array(
                    'status' => '0',
                    'sr_no' => $pr_srno
                );
                $this->purchase_model->update_order_status($reinitiatePr);
                
                // Update Memo
                $this->purchase_model->edit_internal_memo($editMemodata,$pr_srno);
                echo "Updated successfully and re initiated and sent to " . $existing_pr[0]['request_reviewed_by_name'] ." for approval";
            }else {
                // Update Memo
                $this->purchase_model->edit_internal_memo($editMemodata,$pr_srno);
                echo "Updated successfully";
            }
            exit;
	}
	
        public function display_memo() {
            $pr_srno = $_GET['sr_no'];
            $data['pr_list']=$this->purchase_model->display_memo($pr_srno);
            $this->load->view('display_memo',$data);	   
	}
		
        public function edit_purchase_request() {
            $sr_no = $_GET['sr_no'];
            $data['purchase_request_list']=$this->purchase_model->display_pr_list($sr_no);
                      
            $data['units_region']=$this->purchase_model->display_unit_region($id);
            $data['departments']=$this->purchase_model->display_department(NULL);
            $data['suppliers']=$this->purchase_model->display_supplier($id);
            $data['actionTakenBy']=$this->purchase_model->employee_types();
            $data['pr_list']=$this->purchase_model->display_pr($sr_no);
            $this->load->view('edit_purchase_request',$data);
	}
		
	public function edit_pr() {
            $request_data=$_POST;           
            $edit_memo_data=$request_data['memo_items'];  
            $pr_id=$edit_memo_data['pr_id'];
            $sr_no=$edit_memo_data['sr_no'];
                       
            unset($edit_memo_data['sr_no']);
            unset($edit_memo_data['pr_id']);
            unset($edit_memo_data['pr_dept_id']);
            
            // 1 update Purchase Requestion data
            $whereCond1=array(
                'pr_id' => $pr_id,
                'sr_no' => $sr_no
            );
            $this->purchase_model->edit_pr($edit_memo_data,$whereCond1);
                        
            // 2 Update Commaon Data
            $commonData=array();
            $commonData['supplier_name']=trim($request_data['supplier_name']);
            $commonData['pr_issue_date']=trim($request_data['issuing_date']);
            $commonData['phone_person']=trim($request_data['phone_person']);
            $commonData['action_taken_by']=trim($request_data['action_taken_by']);
            $commonData['expense']=trim($request_data['expense']);
            
            // update onn where sr_no to common data
            $whereCond2=array(
                'sr_no' => $sr_no
            );
            $this->purchase_model->edit_pr($commonData,$whereCond2);
            echo "Updated Successfully!!";
            exit;
            
        }
		
	// upload pr quotation
	public function pr_quotation(){
            $pr_id = $_GET['pr_id'];		
            $this->load->view('pr_quotation');
	}
	
	public function pr_quotation_upload(){
            $session_data = $this->session->userdata('logged_in');
            $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
            $prIds = $_POST['pr_id'];
            $pr_no = $_POST['pr_no'];
            $pr_nos = explode("/",$pr_no);
            $pr_nos_final = $pr_nos[0]."-".$pr_nos[1]."-".$pr_nos[2]."-".$pr_nos[3];
            
            $pridval = $this->purchase_model->findpr_id($pr_no);		
	   $prIds = $pridval[0]['pr_id'];
            if($_FILES['pr_quotation']['name'][0] <> "")
            {			
                $pathweb=$DOCUMENT_ROOT."/commercial/uploads/PR/";			
                $destination_path = $pathweb.$pr_nos_final."/";			
                if( is_dir($destination_path) === false )
                {
                    mkdir($destination_path);
                    chmod($path, 0777);
                }
                //$makedir = "md $destination_path";
                //system($makedir);
                //$folderpermission = "chmod 777 $destination_path"; 
                //system($folderpermission);
                for($i=0; $i<count($_FILES['pr_quotation']['name']); $i++)
                {					
                    $randomval = mt_rand(1,9999);
                    $fileupload = $_FILES['pr_quotation']['name'][$i];
                    $fileupload_tmp = $_FILES['pr_quotation']['tmp_name'][$i];
                    $uploaddocype = $_FILES['pr_quotation']['type'][$i];
                    $uploaddocsize = $_FILES['pr_quotation']['size'][$i];
                    $uploaddocfile_namefinal = $randomval.basename($_FILES['pr_quotation']['name'][$i]);
                    if(file_exists($destination_path.$uploaddocfile_namefinal))
                    {
                            unlink($destination_path.$uploaddocfile_namefinal); 
                    }
                    $uploadsfinalpaths = $destination_path.$uploaddocfile_namefinal;
                    if(move_uploaded_file($fileupload_tmp, $uploadsfinalpaths))
                    {
                        $result = $this->purchase_model->upload_documents($destination_path,$uploaddocfile_namefinal,$session_data['username'],"PR",$prIds,$uploaddocype,$uploaddocsize);
                    }
                }	
                echo '<script>alert("Quotation document has been uploaded successfully.");</script>';
                //$prid='';   
                $pu_list_param=array(
                    'department_id' => $session_data['department_id'],
                    'pr_id'=> ''
                );
                $data['purchase_request_list']=$this->purchase_model->display_purchase_request($pu_list_param);  
                
               
                $data['type_list']=$this->type_model->typelist_info_by_key_val_arr();
                $data['status_list']= $this->purchase_model::$actionstatus;
                $data['session_data'] = $this->session->userdata('logged_in');
                //$data['quotation_list']=$this->purchase_model->documentlist_info($prIds);
		$this->load->view('purchase_request_list',$data);
		}	
		
	}
	// download Quotation
    public function download(){
            $docid = $_GET['doc'];
            $resultdoclist = $this->purchase_model->documentlist_info_data($docid);
            $document_name = $resultdoclist[0]['document_name'];
            $document_path = $resultdoclist[0]['document_path'];
				
            ignore_user_abort(true);
            set_time_limit(0); // disable the time limit for this script

            $path = $document_path; // change the path to fit your websites document structure

            $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $document_name); // simple file name validation
            $dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
            $fullPath = $path.$dl_file;
		 
            if ($fd = fopen ($fullPath, "r")) {
                    $fsize = filesize($fullPath);
                    $path_parts = pathinfo($fullPath);
                    $ext = strtolower($path_parts["extension"]);
                    switch ($ext) {
                            case "pdf":
                            header("Content-type: application/pdf");
                            header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
                            break;
                            // add more headers for other content types here
                            default;
                            header("Content-type: application/octet-stream");
                            header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
                            break;
                    }
                    header("Content-length: $fsize");
                    header("Cache-control: private"); //use this to open files directly
                    while(!feof($fd)) {
                            $buffer = fread($fd, 2048);
                            echo $buffer;
                    }
            }
            fclose ($fd);
            exit; 		
	}
        
      
	
	//PURCHASE SOP AUDIT CHECKLIST 
	
	
	public function audit(){
		 $sr_no = $_GET['sr_no'];
		//echo $sr_no; die;
	 $data['pr_list']=$this->purchase_model->audit_count($sr_no);
		
       if(($data['pr_list'][0]['count']) > 0){
		   
      $data['audit_checklist_listing']=$this->purchase_model->display_audit_checklist($id);
		 $this->load->view('audit_checklist_listing',$data);
            }else{
          $this->load->view('audit_checklist');
               
            }	
	}
	
	// audit_checklist START
      public function add_audit_checklist() {
        // echo "<pre/>";
        //print_r($_POST); die;\
        $pr_sr_no = $_POST['sr_no'];

        $data['result'] = $this->purchase_model->add_audit_checklist($pr_sr_no);
    }

    public function audit_checklist_listing() {
        $id = '';
        $data['audit_checklist_listing'] = $this->purchase_model->display_audit_checklist($id);
        $this->load->view('audit_checklist_listing', $data);
    }
	
   public function display_audit_checklist_list() {
	 //echo "in"; die;
        $pr_srno = $this->input->post('pr_srnumber');
	 // echo $pr_srno; die;
        $data['pr_list'] = $this->purchase_model->display_audit_checklist_list($pr_srno);
        echo json_encode($data);
    }
	// audit_checklist ENDS
	
	
	
	
	
	
	
	
   	public function checklist_listing(){
		$data['checklist_listing']=$this->purchase_model->display_checklist($id);
		$this->load->view('checklist_listing',$data);		
	}
           
        private function create_pr_status($param) {
            $currentDate =date('Y-m-d H:i:s');
            $update_pr_status=array(
                'pr_no' =>$param['pr_srno'],
                'pr_status' => '0',
                'request_raised_by_name' => $param['status_by'],
                'request_reviewed_by_name' => $param['to_user_fullname'],
                'pr_status_date' => $param['pr_status_date'],
                'request_raised_by' =>$param['from_user_id'],
                'request_approved_by' =>$param['to_user_id'],
                'created_date' => $currentDate
            );
            $this->purchase_model->update_pr_status($update_pr_status);
        }
        
	public function update_pr_status(){
            $request_data=$_POST;
            $pr_srno = $request_data['pr_srno'];
            $session_data = $this->session->userdata('logged_in');
            $logged_in_name = $session_data['firstname'] .' '. $session_data['lastname'];
            $currentDate = date('Y-m-d H:i:s');   
            $status_data=$this->purchase_model->get_status_by_id($request_data['pr_srno']);            
            switch ($request_data['status']) {
                case 0: // rejection request
                // Update status of the earlier 
                $updateRejectStatus=array(
                    'pr_status_id' => $status_data[0]['pr_status_id'],
                    'pr_status' => '2' // Rjected value in db
                );
                // Update Status of pr in pr_status
                $this->purchase_model->update_status($updateRejectStatus);
                
                // Update Purchase Request Table
                $rejectPr=array(
                    'status' => '2',
                    'sr_no' => $pr_srno
                );
                $this->purchase_model->update_order_status($rejectPr);
                
                // Reject 
                $chain_data=array(
                    'pr_sr_no' =>$pr_srno,
                    'approval_type' => 2,
                    'rejected_by' => $session_data['uid'],
                );
                $this->add_approval_user($chain_data);
                
                break;
            case 1: // Approved 
                $vp_type_id = 1; // Vp type id 
                if($session_data['user_type'] == $vp_type_id){    
                    $updateApprovedStatus=array(
                        'pr_status_id' => $status_data[0]['pr_status_id'],
                        'pr_status' => '1' // Approved value in db 
                    );
                    // Update Status of pr in pr_status
                    $this->purchase_model->update_status($updateApprovedStatus);
                    
                    // Update Purchase Request Table
                    $approvePr=array(
                        'status' => '1',
                        'sr_no' => $pr_srno
                    );
                    $this->purchase_model->update_order_status($approvePr);                    
                    
                    // Approved Final by VP 
                    $chain_data=array(
                        'pr_sr_no' =>$pr_srno,
                        'approval_type' => 1,
                        'approved_by' => $session_data['uid'],
                    );
                    $this->add_approval_user($chain_data);                    
                } else{
                    // send To VP
                    // Update Pr Data
                    $update_pr_status=array(
                        'pr_no' =>$pr_srno,
                        'pr_status' =>$request_data['status'],
                        'request_raised_by_name' => $logged_in_name,
                        'pr_status_date' => $currentDate,
                        'remarks' =>$request_data['remarks'],
                        'request_raised_by' =>$status_data[0]['request_approved_by'],
                        'created_date' => $currentDate
                    );
                    // Send to Next Approval
                    $param=array(
                       'pr_sr_no'=>$pr_srno
                    );
                    $ac_data=$this->approval_chain_model->get_approver_id($param);           
                    $appr_user_id = $ac_data[0]['approver_user_id'];
                    $appr_uid_arr= explode(",", $appr_user_id);
                    // Send to VP if Only One User in Approval Chain Till Now
                    if(count($appr_uid_arr) == 1 && (in_array($session_data['uid'], $appr_uid_arr)) 
                            && $session_data['user_type'] != $vp_type_id){                
                        $uInfo=$this->user_database->user_info_by_type($vp_type_id);
                        $vp_data=array(
                            'pr_sr_no' =>$pr_srno,
                            'user_id' => $uInfo[0]['uid'],
                            'approval_type' => $request_data['status'],
                            'approved_by' => $session_data['uid'],
                            'rejected_by' => $session_data['uid'],
                        );
                        $this->add_approval_user($vp_data);   

                        // Update status of the earlier 
                        $updateStatusInfo1=array(
                            'pr_status_id' => $status_data[0]['pr_status_id'],
                            'pr_status' => $request_data['status']
                        );
                        // Update Status of Purchase request table pr_status
                        $this->purchase_model->update_status($updateStatusInfo1);
                        
                        // Create new Pr status 
                        $update_pr_status['request_approved_by'] = $uInfo[0]['uid'];
                        $update_pr_status['request_reviewed_by_name'] = $uInfo[0]['fname'] .' '. $uInfo[0]['fname'];
                        $update_pr_status['pr_status'] = '0';
                        $this->purchase_model->create_pr_status($update_pr_status);                

                    }
                }
          
            break;
        }       
        exit;		
    }
	public function show_pr_status($pr_srno){
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
            $count=$this->purchase_model->get_internal_memo_count();
            $ticket_series=1000 + $count;
            $issue_session=date('Y', strtotime($request_data['issuing_date'])) ."-". date('y', strtotime('+1 year'));           
            $unit=$this->unit_region_model->unit_regions_by_id($request_data['unit_id']);
            $dep=$this->department_model->department_short_by_id($request_data['dept_id']);
            //$random=random_string('numeric', 4);
            $random=$ticket_series;
            echo THOMSAN_DIGITAL . "-" . $unit->unit_region_code . "/". $issue_session ."/".$dep->department_code."/".$random;
            exit;
           
        }
        
        private function sendmail($param) {
            
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'versatilevishal99@gmail.com', // change it to yours
                'smtp_pass' => 'vishu2010pc', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->from($param['from_email'], $param['from_name']);
            $this->email->to($param['to_email']);
            $this->email->subject($param['subject']);
            $this->email->message($param['message']);
            if($this->email->send())
            {
             echo 'Email sent.';
            }
            else
           {
            show_error($this->email->print_debugger());
           }
        }	
        
    public function add_approval_user($data){
        // Add entry in approval chain
        $currentDate =date('Y-m-d H:i:s');
        $approval_data=array(
            'pr_sr_no' => $data['pr_sr_no'],
            'created_date' => $currentDate
        );

        switch ($data['approval_type']) {
            case 1: // Approved
                $approval_data['approved_by_user_id'] = $data['approved_by'];
                $approval_data['approver_user_id'] = $data['user_id'];
                $approval_data['status'] = '1';
                break;
            case 2: // Rejected
                $approval_data['rejected_by_user_id'] = $data['rejected_by'];
                $approval_data['status'] = '2';
                break;
            default: // Pending
                // Send for Approval to user
                $approval_data['approver_user_id'] = $data['user_id'];
                $approval_data['status'] = '0';
                break;
        }
       
        return $this->approval_chain_model->add_approvar_user($approval_data);
    }
    
    
    // NEGOTIATION MATRIX START
    public function negotiation() {
        $this->load->view('negotiation_matrix');
    }

    public function add_negotiation() {
        //echo "<pre/>";
        //print_r($_POST); die;
        $pr_sr_no = $_POST['sr_no'];
        $data['result'] = $this->purchase_model->add_negotiation($pr_sr_no);
        // $this->load->view('negotiation_matrix');
    }

    public function negotiation_list() {
        $data['negotiation_matrix_list'] = $this->purchase_model->display_negotiation($nid);

        //echo "<pre/>"; print_r($data); die;
        $this->load->view('negotiation_matrix_list', $data);
    }
	public function display_negotition_list() {
	//echo "in"; die;
        $pr_srno = $this->input->post('pr_srnumber');
	 //echo $pr_srno; die;
        $data['pr_list'] = $this->purchase_model->display_negotition_list($pr_srno);
        echo json_encode($data);
    }
	
// NEGOTIATION MATRIX ENDS
    // Comparision Sheet Start
    public function comparision() {
        $sr_no = $_GET['sr_no'];
         $data['pr_info'] = $this->purchase_model->get_comparison_info($sr_no);
       
        
        $this->load->view('comparision_sheet',$data);
    }

    public function add_comparision() {
        //echo "<pre/>";
        //print_r($_POST); die;
        $pr_sr_no = $_POST['sr_no'];
        $data['result'] = $this->purchase_model->add_comparision_sheet($pr_sr_no);
    }

    public function comparision_history() {
        //echo "--";
        $data['comparision_history'] = $this->purchase_model->display_comparision($id);
        $this->load->view('comparision_history', $data);
    }

	public function display_comparision_list() {
	// echo "in"; die;
        $pr_srno = $this->input->post('pr_srnumber');
	 // echo $pr_srno; die;
        $data['pr_list'] = $this->purchase_model->display_comparision_list($pr_srno);
        echo json_encode($data);
    }
	 // Comparision Sheet Ends
    
	
}
