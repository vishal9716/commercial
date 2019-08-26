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
		echo "<pre/>"; print_r($result);
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
	//echo "<pre/>"; print_r($result2); die;
	return $result2;	
}
	
 function update_purchase_request($pr_srno) {

 $issuing_date = trim($_POST['issuing_date']);
 $phone_person = trim($_POST['phone_person']);
 $action_taken_by = trim($_POST['action_taken_by']);
 $pr_reacd_on = trim($_POST['pr_reacd_on']);
 $order_placed_by = trim($_POST['order_placed_by']); 
 $supplier_name =  trim($_POST['supplier_name']); 
 $pr_issue_date =  trim($_POST['pr_issue_date']); 
 $expense = trim($_POST['selectedOption']);
$query="update purchase_request set supplier_name='".$supplier_name."', expense='".$expense."', pr_issue_date='".$issuing_date."',phone_person='".$phone_person."',action_taken_by='".$action_taken_by."', pr_recd_on='".$pr_reacd_on."',order_placed_by='".$order_placed_by."',pr_issue_date='".$pr_issue_date."' where sr_no='".$pr_srno."'";

echo $query; 
   $result = $this->db->query($query);
  //return $result;
	}
	
function display_purchase_request($id) {
         //  echo "--".$id; die;
		 if ((!empty($id))){
            $sql = "select * from purchase_request where pr_id='" . $id . "'";
        } else {
            $sql = "select * from purchase_request order by pr_id desc";
        }
		//echo $sql; die;
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
 $supplier_name =  trim($_POST['supplier_name']); 
 $pr_issue_date =  trim($_POST['pr_issue_date']); 
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
	
}




?>