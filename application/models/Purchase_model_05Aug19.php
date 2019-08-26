<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

/**
 * Eye View Design CMS module Ajax Model
 *
 * PHP version 5
 *
 * @category  CodeIgniter
 * @package   EVD CMS
 * @author    Frederico Carvalho
 * @copyright 2008 Mentes 100Limites
 * @version   0.1
 */
class Purchase_model extends CI_Model {

    /**
     * Instanciar o CI
     */
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

	// Add department
    function add_department() {
		//echo "<pre/>"; print_r($_POST); die;	
	    $department_name = trim($_POST['department_name']);
	    $department_descp = trim($_POST['department_descp']);
	    
    if(($department_name != "") || (!empty($department_name))){
    $sql = "insert into department(department_name,department_desp) values('" . ($department_name) . "','" . ($department_descp) . "')";
     // echo $sql; die;
      $query = $this->db->query($sql);
		
	  $sql1 = "select * from department";
	  $result = $this->db->query($sql1)->result_array();
		//echo "<pre/>"; print_r($result);
		return $result;
		}
	}
	
	// edit department
	public function edit_department() 
	{
		//echo "<pre/>"; print_r($_POST);
		//echo "update";die;
		$custid=$_POST['cousttid'];
		$cust_name=$_POST['customer_name'];
		$query="update customer set customer_name='".$cust_name."' where customer_id='".$custid."'";	
		//echo $query; die;
		$result = $this->db->query($query);
		return $result;
	}
	
	// delete department
	public function delete_department($cid)
	{
		$sql ="delete from customer where customer_id='".$cid."'";		
		//echo $sql; die;
		$result = $this->db->query($sql);
		return $result;
	}
	
	// display department
	function display_department($id) {
       if ((!empty($id))){
            $sql = "select * from department where department_id='" . $id . "'";
        } else {
            $sql = "select * from department";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		 return $result;
	}

// Add purchase request 
 function add_purchase_request() {
//echo "<pre/>"; print_r($_POST);

 $pr_sr_no = $_POST["sr_no"];
 $pr_desp = $_POST["pr_desp"];
 $pr_unit = $_POST["pr_unit"];
 $pr_avg_cods = $_POST["pr_avg_cods"];
 $pr_qty_stk = $_POST["pr_qty_stk"];
 $pr_reorder_pt = $_POST["pr_reorder_pt"];
 $pr_reorder_qty = $_POST["pr_reorder_qty"];
 $pr_qty_req = $_POST["pr_qty_req"];
 $pr_supplier_rate = $_POST["pr_supplier_rate"];
 $pr_supplier_supplier = $_POST["pr_supplier_supplier"];
 $pr_order_rate = $_POST["pr_order_rate"];
 $pr_order_supplier = $_POST["pr_order_supplier"];
 $insertArr = array();

for($i = 0; $i < count($pr_desp); $i++)
 {
  $insertArr[] = "('" . $pr_sr_no . "','" . ($pr_desp[$i]) . "','" . ($pr_unit[$i]) . "','" . ($pr_avg_cods[$i]) . "','" . ($pr_qty_stk[$i]) . "','" . ($pr_reorder_pt[$i]) . "','" . ($pr_reorder_qty[$i]) . "','" . ($pr_qty_req[$i]) . "','" . ($pr_supplier_rate[$i]) . "','" . ($pr_supplier_supplier[$i]) . "','" . ($pr_order_rate[$i]) . "','" . ($pr_order_supplier[$i]) . "')";
 
 }
$sql1 = "INSERT INTO purchase_request (sr_no,pr_description,units,avg_cods,qty_in_stock,reorder_point,reorder_quantity,qty_req,pr_supplier_rate,pr_supplier_supplier,order_placed_rate,order_placed_supplier) VALUES " . implode(", ", $insertArr);

//echo $sql1; die;
$result1 = $this->db->query($sql1);
  $sql2 = "select sr_no from purchase_request ORDER BY pr_id desc limit 1";
  $result2 = $this->db->query($sql2)->result_array();
	 if($result2){
		// echo "insert";
	 }else{
		// "not insert";
	 }
	//echo "<pre/>"; print_r($result2); die;
	return $result2;	
}
	
 function update_purchase_request($pr_srno) {
//echo "<pre/>"; print_r($_POST);
$department_id= trim($_POST['department_id']);
 $issuing_date = trim($_POST['issuing_date']);
// echo $issuing_date; die;
 $phone_person = trim($_POST['phone_person']);
 $action_taken_by = trim($_POST['action_taken_by']);
 $pr_reacd_on = trim($_POST['pr_reacd_on']);
 $order_placed_by = trim($_POST['order_placed_by']); 
 $supplier_name =  trim($_POST['supplier_name']); 
 //$pr_issue_date =  trim($_POST['pr_issue_date']); 
 $expense = trim($_POST['selectedOption']);
$query="update purchase_request set department_id='".$department_id."',supplier_name='".$supplier_name."', expense='".$expense."', pr_issue_date='".$issuing_date."',phone_person='".$phone_person."',action_taken_by='".$action_taken_by."', pr_recd_on='".$pr_reacd_on."',order_placed_by='".$order_placed_by."',status='Pending' where sr_no='".$pr_srno."'";

//echo $query; 
   $result = $this->db->query($query);
if($result){
echo "PR raised successfully";
}
else{
echo "Error in PR creation";
}
  //return $result;
	}
	
function display_purchase_request($id) {
         //  echo "--".$id; die;
		 if ((!empty($id))){
            $sql = "select * from purchase_request where pr_id='" . $id . "'";
        } else {
			 
           /* $sql = "select distinct pr.sr_no, pr.department_id,pr.pr_issue_date,pr.supplier_name,pr.order_placed_by,pr.phone_person,pr.expense,pr.action_taken_by,pr.status,d.department_name from purchase_request pr join department d on(pr.department_id=d.department_id);
"; */
	$sql = "select distinct prs.pr_status,prs.status_by,prs.pr_status_date,prs.remarks,pr.sr_no, pr.department_id,pr.pr_issue_date,pr.supplier_name,pr.order_placed_by,pr.phone_person,pr.expense,pr.action_taken_by,pr.status,d.department_name from purchase_request pr join department d on(pr.department_id=d.department_id) left join  pr_status prs on(pr.sr_no=prs.pr_no)";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		//echo "<pre/>"; print_r($result); die;
		 return $result;	
	}
	
	
function display_pr($pr_srno){
 //echo "---".$pr_srno; 
$pr_srno=trim($pr_srno);
$sql = "select distinct d.department_name,pr.department_id,pr_issue_date,supplier_name,expense,pr_recd_on,order_placed_by,action_taken_by,phone_person from purchase_request pr join department d on(pr.department_id=d.department_id) where sr_no= '".$pr_srno."'";
	//echo $sql;
	$result = $this->db->query($sql)->result_array();
	//echo "<pre/>"; print_r($result); die;
	 return $result;
	}
	
	
function display_pr_list($pr_srno){
 //echo "---".$pr_srno; 
$pr_srno=trim($pr_srno);
$sql = "select sr_no, pr_description, units,avg_cods, qty_in_stock,reorder_point, reorder_quantity,qty_req, pr_supplier_rate, pr_supplier_supplier,order_placed_rate,order_placed_supplier,status from purchase_request where sr_no= '".$pr_srno."'";
	//echo $sql;
	$result = $this->db->query($sql)->result_array();
	//echo "<pre/>"; print_r($result); die;
	 return $result;
	}
	
function edit_purchase_request($pr_id){
	
 $issuing_date = trim($_POST['issuing_date']);
 $phone_person = trim($_POST['phone_person']);
 $action_taken_by = trim($_POST['action_taken_by']);
 $pr_reacd_on = trim($_POST['pr_reacd_on']);
 $order_placed_by = trim($_POST['order_placed_by']); 
 $supplier_name = trim($_POST['supplier_name']); 
 $pr_issue_date = trim($_POST['pr_issue_date']); 
 $pr_description = trim($_POST['pr_description']); 
 $units	= trim($_POST['units']); 
 $avg_cods = trim($_POST['avg_cods']); 
 $qty_in_stock = trim($_POST['qty_in_stock']); 
 $reorder_point = trim($_POST['reorder_point']); 
 $reorder_quantity = trim($_POST['reorder_quantity']); 
 $qty_req = trim($_POST['qty_req']); 
 $pr_supplier_rate = trim($_POST['pr_supplier_rate']); 
 $pr_supplier_supplier = trim($_POST['pr_supplier_supplier']); 
 $order_placed_rate = trim($_POST['order_placed_rate']); 
 $order_placed_supplier = trim($_POST['order_placed_supplier']); 
 //$expense = trim($_POST['selectedOption']);
	
$query="update purchase_request set supplier_name='".$supplier_name."', pr_issue_date='".$issuing_date."',phone_person='".$phone_person."',action_taken_by='".$action_taken_by."', pr_recd_on='".$pr_reacd_on."',order_placed_by='".$order_placed_by."',pr_description='".$pr_description."',units='".$units."', avg_cods='".$avg_cods."',qty_in_stock='".$qty_in_stock."',reorder_point='".$reorder_point."',reorder_quantity='".$reorder_quantity."',qty_req='".$qty_req."',pr_supplier_rate='".$pr_supplier_rate."',pr_supplier_supplier='".$pr_supplier_supplier."',order_placed_rate='".$order_placed_rate."',order_placed_supplier='".$order_placed_supplier."' where pr_id='".$pr_id."'";
//echo $query;
$result = $this->db->query($query);
}
	
	
// uploading documents
	function upload_documents($file_upload,$file_type,$file_size){
		echo $file_upload ; die;
	}
        
  function add_negotiation($pr_sr_no) {
 //echo "<pre/>"; print_r($_POST);
 //echo $pr_sr_no;
 $date = $_POST["date"];
 $vendor_person = $_POST["vendor_person"];
 $contact_person = $_POST["contact_person"];
 $number = $_POST["number"];
 $negotiation = $_POST["negotiation"];
 $remarks = $_POST["remarks"];
 $signature = $_POST["signature"];
 
 $insertArr = array();

for($i = 0; $i < count($vendor_person); $i++)
 {
  $insertArr[] = "('".$pr_sr_no."','" . ($date[$i]) . "','" . ($vendor_person[$i]) . "','" . ($contact_person[$i]) . "','" . ($number[$i]) . "','" . ($negotiation[$i]) . "','" . ($remarks[$i]) . "','" . ($signature[$i]) . "')";;
 
 }
$sql = "INSERT INTO pr_negotiation_matrix(pr_sr_no,negotiation_matrix_date,vendor_person,contact_person,number,negotiation,remarks,signature) VALUES " . implode(", ", $insertArr);

//echo $sql1; die;
$result = $this->db->query($sql);
	  if($result){
echo "Negotiation added successfully";
}
else{
echo "Error in Adding Negotiation";
}
 
  }	
	
  function display_negotiation($id) {
         //  echo "--".$id; die;
		 if ((!empty($id))){
            $sql = "select * from pr_negotiation_matrix where pr_negotiation_matrix_id='" . $id . "'";
        } else {
            $sql = "select * from pr_negotiation_matrix order by pr_negotiation_matrix_id desc";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		//echo "<pre/>"; print_r($result); die;
		 return $result;	
	}
	
  // Audit Checklist
  function add_audit_checklist($pr_sr_no) {
//  echo "<pre/>"; print_r($_POST); die;
   //echo $pr_sr_no; die;
 $to = $_POST["to"]; 
 $from = $_POST["from"]; 
 $created_date = $_POST["pr_chk_date"]; 
 $pr_date = $_POST["pr_date"]; 
 $unit = $_POST["unit"]; 
 $item =$_POST["item"];
 $vendor_selection = $_POST["vendor_selection"]; 
 $brand_selection = $_POST["brand_selection"];
 $bids = $_POST["bids"];
 $negotiation_rounds = $_POST["negotiation_rounds"];
 $sla_agreement = $_POST["sla_agreement"];
 $agreement_late_delivery = $_POST["agreement_late_delivery"];
 $payment_agreement = $_POST["payment_agreement"];
 $service_agreement = $_POST["service_agreement"];
 $amc_negotiation = $_POST["amc_negotiation"];
 $delivery_agreement = $_POST["delivery_agreement"];
 $insurance = $_POST["insurance"];
 $special_point = $_POST["special_point"];

 $insertArr = array();

for($i = 0; $i < count($vendor_selection); $i++)
 {
 $insertArr[] = "('".$pr_sr_no."','".$to."','".$from."','".$created_date."','".$pr_date."','".$unit."','".$item."','" . ($vendor_selection[$i]) . "','" . ($brand_selection[$i]) . "','" . ($bids[$i]) . "','" . ($negotiation_rounds[$i]) . "','" . ($sla_agreement[$i]) . "','" . ($agreement_late_delivery[$i]) . "','" . ($payment_agreement[$i]) . "','" . ($service_agreement[$i]) . "','" . ($amc_negotiation[$i]) . "','" . ($delivery_agreement[$i]) . "','" . ($insurance[$i]) . "','" . ($special_point[$i]) . "')";
 
 }
$sql = "INSERT INTO pr_audit_checklist(pr_srno,pr_audit_to,pr_audit_from,pr_created_date,pr_date,pr_items,pr_unit,vendor_selection,brand_selection,bids,negotiation_rounds,sla_agreement,agreement_late_delivery,payment_agreement,service_agreement,amc_negotiation,delivery_agreement,insurance,special_point) VALUES " . implode(", ", $insertArr);

//echo $sql; die;
$result1 = $this->db->query($sql);
	  if($result1){
echo "Audit Checklist added successfully";
}
else{
echo "Error in Audit Checklist creation";
}
 
  }	
	
  function display_audit_checklist($id) {
         //  echo "--".$id; die;
		 if ((!empty($id))){
            $sql = "select * from pr_audit_checklist where pr_audit_checklist_id='" . $id . "'";
        } else {
            $sql = "select * from pr_audit_checklist order by pr_audit_checklist_id desc";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		//echo "<pre/>"; print_r($result); die;
		 return $result;	
	}
	
	
  // Checklist for CAPEX / PR SOP
	public function add_sop_checklist($pr_sr_no){
	//echo "-".$pr_sr_no; die;
    $pr_sop_checklist_chk = $_POST['pr_sop_checklist_chk'];
	$pr_sop_checklistRadio =  $_POST['pr_sop_checklistRadio'];
	$pr_sop_checklist = $_POST['pr_sop_checklist'];
	$user_justification_chk = $_POST['user_justification_chk'];
	$user_justificationRadio = $_POST['user_justificationRadio'];
	$user_justification = $_POST['user_justification'];
	$approved_pr_chk = $_POST['approved_pr_chk'];
	$approved_prRadio = $_POST['approved_prRadio'];
	$approved_pr = $_POST['approved_pr'];
	$comparison_sheet_chk = $_POST['comparison_sheet_chk'];
	$comparison_sheetRadio = $_POST['comparison_sheetRadio'];
	$comparison_sheet = $_POST['comparison_sheet'];
	$negotiation_history_chk = $_POST['negotiation_history_chk'];
	$negotiation_historyRadio = $_POST['negotiation_historyRadio'];
	$negotiation_history = $_POST['negotiation_history'];
	$negotiation_matrix_chk = $_POST['negotiation_matrix_chk'];
	$negotiation_matrixRadio = $_POST['negotiation_matrixRadio'];
	$negotiation_matrix = $_POST['negotiation_matrix'];	
	$delivery_date_schedule_chk = $_POST['delivery_date_schedule_chk'];
	$delivery_date_scheduleRadio = $_POST['delivery_date_scheduleRadio'];
	$delivery_date_schedule = $_POST['delivery_date_schedule'];		
	$shortlisted_vendor_recommendation_chk = $_POST['shortlisted_vendor_recommendation_chk'];
	$shortlisted_vendor_recommendationRadio = $_POST['shortlisted_vendor_recommendationRadio'];
	$shortlisted_vendor_recommendation = $_POST['shortlisted_vendor_recommendation'];
	$final_negotiated_rate_chk = $_POST['final_negotiated_rate_chk'];
	$final_negotiated_rateRadio = $_POST['final_negotiated_rateRadio'];
	$final_negotiated_rate = $_POST['final_negotiated_rate'];	
	$capex_statement_chk = $_POST['capex_statement_chk'];
	$capex_statementRadio = $_POST['capex_statementRadio'];
	$capex_statement = $_POST['capex_statement'];
	$opex_chk = $_POST['opex_chk'];
	$opexRadio = $_POST['opexRadio'];
	$opex = $_POST['opex'];
	$approval_chk = $_POST['approval_chk'];
	$approvalRadio = $_POST['approvalRadio'];
	$approval = $_POST['approval'];
		
	$sql = "INSERT INTO pr_sop_checklist(pr_sr_no,check_points,status,page_number) values('".$pr_sr_no."','".$pr_sop_checklist_chk."','".$pr_sop_checklistRadio."','".$pr_sop_checklist."'),
	('".$pr_sr_no."','".$user_justification_chk."','".$user_justificationRadio."','".$user_justification."'),
	('".$pr_sr_no."','".$approved_pr_chk."','".$approved_prRadio."','".$approved_pr."'),
	('".$pr_sr_no."','".$comparison_sheet_chk."','".$comparison_sheetRadio."','".$comparison_sheet."'),
	('".$pr_sr_no."','".$negotiation_history_chk."','".$negotiation_historyRadio."','".$negotiation_history."'),
	('".$pr_sr_no."','".$negotiation_matrix_chk."','".$negotiation_matrixRadio."','".$negotiation_matrix."'),
	('".$pr_sr_no."','".$delivery_date_schedule_chk."','".$delivery_date_scheduleRadio."','".$delivery_date_schedule."'),
	('".$pr_sr_no."','".$shortlisted_vendor_recommendation_chk."','".$shortlisted_vendor_recommendationRadio."','".$shortlisted_vendor_recommendation."'),
	('".$pr_sr_no."','".$final_negotiated_rate_chk."','".$final_negotiated_rateRadio."','".$final_negotiated_rate."'),
	('".$pr_sr_no."','".$capex_statement_chk."','".$capex_statementRadio."','".$capex_statement."'),
	('".$pr_sr_no."','".$opex_chk."','".$opexRadio."','".$opex."'),
	('".$pr_sr_no."','".$approval_chk."','".$approvalRadio."','".$approval."')
	";
	//echo $sql;	
$result = $this->db->query($sql);
		if($result){
echo "checklist added successfully";
}
else{
echo "Error in Adding checklist";
}
	}
	
	
 // Add comparision sheet
	public function add_comparision_sheet($pr_sr_no){
	//echo "----".$pr_sr_no; die;
   //echo "<pre/>";
   //print_r($_POST); die;
	$item_desp = $_POST["item_desp"];
	$unit = $_POST["unit"];
	$qty = $_POST["qty"];
	$quoted_unit_price = $_POST["quoted_unit_price"];
	$quoted_total_price = $_POST["quoted_total_price"];
	$final_quoted_unit_price = $_POST["final_quoted_unit_price"];
	$final_quoted_total_price = $_POST["final_quoted_total_price"];
	//echo "-->".count($item_desp);
 
 $insertArr = array();

for($i = 0; $i < count($item_desp); $i++)
 {
  $insertArr[] = "('".$pr_sr_no."','" . ($item_desp[$i]) . "','" . ($unit[$i]) . "','" . ($qty[$i]) . "','" . ($quoted_unit_price[$i]) . "','" . ($quoted_total_price[$i]) . "','" . ($final_quoted_unit_price[$i]) . "','" . ($final_quoted_total_price[$i]) . "')";;
 
 }
$sql = "INSERT INTO pr_comparision_sheet(pr_srno,desp,unit,quantity,quoted_unit_price,quoted_amount,final_quoted_unit_price,final_quoted_amount) VALUES " . implode(", ", $insertArr);

//echo $sql; die;
$result = $this->db->query($sql);
if($result){
echo "Comarision sheet added successfully";
}
else{
echo "Error in Adding Comarision sheet";
}

}
	function add_internal_memo($pr_sr_no){
	$date = $_POST["date"];
	$to = $_POST["to"];
	$from = $_POST["from"];
	$subject = $_POST["subject"];
	$description = $_POST["editor"];	
	$sql = "insert into pr_internal_memo(pr_sr_no,pr_date,pr_to,pr_from,subject,description) values('".$pr_sr_no."','".$date."','".$to."','".$from."','".$subject."','".$description."')";
	//echo $sql; die;
	$result = $this->db->query($sql);
if($result){
echo "Internal Memo Mail sent to Unit Head successfully";
}
else{
echo "Error in Sending Internal Memo";
}	
	}
	
 function display_comparision($id) {
         //  echo "--".$id; die;
		 if ((!empty($id))){
            $sql = "select * from pr_comparision_sheet where pr_comparision_sheet_id='" . $id . "'";
        } else {
            $sql = "select * from pr_comparision_sheet order by pr_comparision_sheet_id desc";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		//echo "<pre/>"; print_r($result); die;
		 return $result;	
	}	
	
	function display_checklist($id) {
         //  echo "--".$id; die;
		 if ((!empty($id))){
            $sql = "select * from pr_sop_checklist where pr_sop_checklist_id='" . $id . "'";
        } else {
            $sql = "select * from pr_sop_checklist order by pr_sop_checklist_id desc";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		//echo "<pre/>"; print_r($result); die;
		 return $result;	
	}
	
	function update_pr_status($status,$pr_srno){
	//echo $status; die;
		$session_data = $this->session->userdata('logged_in');
		$username = $session_data['username'];
	$sql = "insert into pr_status(pr_no,status,status_by,pr_status_date) values('".$pr_srno."','".$status."','".$username."',now())";
	//echo $sql; die;
	 $result = $this->db->query($sql);
	 return $result;	
	}
	
	
}




?>