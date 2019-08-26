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
class Operations_model extends CI_Model {

    /**
     * Instanciar o CI
     */
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

	
   // List Activities
	public function display_activity($id)
	{
		//echo "--".$id; die;
		
 	 if ((!empty($id))){
            $sql = "select * from activity where activity_id='" . $id . "'";
        } else {
            $sql = "select * from activity";
        }
		//echo $sql; die;
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		 return $result;
	}
	
	// Edit Activity
	public function edit_activity() 
	{
		//echo "<pre/>"; print_r($_POST); die;
		//echo "update";die;
		$activity_id=$_POST['actid'];
		$activity_name=$_POST['activity_name'];
		$activitydesc = $_POST['activitydesc'];
		$query="update activity set activity_name='".$activity_name."', activity_desc ='".$activitydesc."' where activity_id='".$activity_id."'";	
		//echo $query; die;
		$result = $this->db->query($query);
		return $result;
	}
	
	// Add Activity
    function add_activity($name) {
	   $activity_name = trim($name);
	   $activitydesc = $_POST['activitydesc'];
    if(($activity_name != "") || (!empty($activity_name))){
        $sql = "insert into activity(activity_name,activity_desc) values('" . $activity_name . "','" . $activitydesc . "')";
      // echo $sql; die;
      $query = $this->db->query($sql);
	  $sql1 = "select * from activity";
	  $result = $this->db->query($sql1)->result_array();
		return 2;
		}

	}
	
	public function display_customer($id)
	{
		//echo "--".$id; die;
		
 	 if ((!empty($id))){
            $sql = "select * from customer where customer_id='" . $id . "'";
        } else {
            $sql = "select * from customer";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		 return $result;
	}
	
		// delete activity
	public function delete_activity($actid)
	{
		$sql ="delete from activity where activity_id='".$actid."'";		
		//echo $sql; die;
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function display_sub_activity($id)
	{
		//echo "--".$id; die;
		
 	 if ((!empty($id))){
            $sql = "select * from sub_activity where activity_id ='" . $id . "'";
        } else {
            $sql = "select * from sub_activity";
        }
		//echo $sql; 
        $result = $this->db->query($sql)->result_array();
		 return $result;
	}
	
	
	// Add customer
    function add_customer() {
		//echo "<pre/>"; print_r($_POST); die;	
	    $customer_name = trim($_POST['customer_name']);
	    $customer_descp = trim($_POST['customer_descp']);
	    $email = trim($_POST['email']);
		$payment_terms = trim($_POST['payment_terms']);
		$country_id = trim($_POST['country_id']);
		$address = trim($_POST['address']);
    if(($customer_name != "") || (!empty($customer_name))){
        $sql = "insert into customer(customer_name,customer_desp,customer_email,payment_terms,address) values('" . ($customer_name) . "','" . ($customer_descp) . "','" . ($email) . "','" . ($payment_terms) . "','" . ($address) . "')";
    //  echo $sql; die;
      $query = $this->db->query($sql);
	  $sql1 = "select * from customer";
	  $result = $this->db->query($sql1)->result_array();
	
		return $result;
		}

	}
	
	// edit customer
	public function edit_customer() 
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
	
	// delete customer
	public function delete_customer($cid)
	{
		$sql ="delete from customer where customer_id='".$cid."'";		
		//echo $sql; die;
		$result = $this->db->query($sql);
		return $result;
	}
	
	function display_projects($id) {
       if ((!empty($id))){
            $sql = "select * from project where project_id='" . $id . "'";
        } else {
            $sql = "select * from project";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		 return $result;
		
	}
	
	// delete project
	public function delete_project($pid)
	{
		$sql ="delete from project where project_id='".$pid."'";		
		//echo $sql; die;
		$result = $this->db->query($sql);
		return $result;
	}
		// edit project
	public function edit_project() 
	{
		//echo "<pre/>"; print_r($_POST);
		//echo "update";die;
		$pro_id=$_POST['proid'];
		$pro_name=$_POST['project_name'];
		$query="update project set project_name='".$pro_name."' where project_id='".$pro_id."'";	
		//echo $query; die;
		$result = $this->db->query($query);
		return $result;
	}
	function display_quotation($id) {
        // echo "--".$id; die;
		if ((!empty($id))){
            $sql = "select * from quotation where quotation_id='" . $id . "'";
        } else {
            $sql = "select q.*,p.project_name,a.activity_name,c.customer_name,l.complexity_level,qsa.* from quotation q join project p on(q.project_id=p.project_id) join activity a on(q.activity_id=a.activity_id) join customer c on(q.client_id=c.customer_id) left join quot_sub_activity qsa on(q.quotation_id=qsa.quotation_id) join complexity_level l on(qsa.complexity_level_id=l.complexity_level_id)";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		//echo "<pre/>"; print_r($result); die;
		 return $result;	
	}
	
	 function add_project() {
		//echo "-->".$project_name; die;
		$project_name = trim($_POST['project_name']);
	    $proj_descp = trim($_POST['description']);
	    $volume = trim($_POST['volume']);
		 
    if(($project_name != "") || (!empty($project_name))){
        $sql = "insert into project(project_name,project_desc,project_vol) values('" . ($project_name) . "','" . ($proj_descp) . "','" . ($volume) . "')";
       //echo $sql; die;
      $query = $this->db->query($sql);
	  $sql1 = "select * from project";
	  $result = $this->db->query($sql1)->result_array();
		return $result;
		}
       
    }
    
	function add_estimation() {
		$cnt = count($_POST['bline_id']);
		$cnt2 = count($_POST['sub_activity_id']);
		$cnt3 = count($_POST['complexity_level_id']);
	
		//echo "-->".$cnt; die;
		$quotation = $this->input->post("quotation");
		$project_id = $this->input->post("project");
		$client_id = $this->input->post("customer");
		$activity = $this->input->post("activity_id");
		$sub_activity = $this->input->post("sub_activity_id");
		$total_pages = $this->input->post("total_pages");
		$jtn = $this->input->post("jtn");
		$payment_terms = $this->input->post("payment_terms");
		$account = $this->input->post("account");
		$volume = $this->input->post("volume");
		$norms = $this->input->post("norms");
		$unit = $this->input->post("unit");
		$illustrations = $this->input->post("illustrations");
		$level = $this->input->post("level");
		//echo "<pre/>"; print_r($_POST);
		//die;
        $sql = "insert into quotation(quotation_no,client_id,project_id,activity_id,total_pages,jtn_id,payment_terms_id,account_id,norms_per_shift,illustrations,complexity_level,created_by) values('" . $quotation . "','" . addslashes($client_id) . "','" . addslashes($project_id) . "','" . $activity . "','" . addslashes($total_pages) . "','" . addslashes($jtn) . "','" .addslashes($payment_terms). "','" .addslashes($account). "','" . $norms . "','". $illustrations ."','" . $level . "','".$created_by."')";
	//echo $sql; die;
    $result = $this->db->query($sql);
	$quotation_id =$this->db->insert_id();
	
	if ($cnt > 0 && $cnt == $cnt2) {
    $insertArr = array();
		
    for ($i=0; $i<$cnt; $i++) {
		//echo "-->>".$_POST['bline_id'][$i];
        $insertArr[] = "('" . $quotation_id . "','" . ($_POST['sub_activity_id'][$i]) . "','" . ($_POST['bline_id'][$i]) . "','" . ($_POST['complexity_level_id'][$i]) . "')";
		
}
		$sql2 = "INSERT INTO quot_sub_activity (quotation_id,sub_activity_id,norms,complexity_level_id) VALUES " . implode(", ", $insertArr);
		
 
	}

		//echo $sql2; die;
		$result1 = $this->db->query($sql2);
		return 2;

    }
    
   	public function edit_quotation() 
	{
		print_r($_POST); die;
		$quotation_id=$this->input->post("quotation_id");
		$quotation = $this->input->post("quotation");
		//$project_id = $this->input->post("project");
		$project_id = '1';
		//$client_id = $this->input->post("customer");
		$client_id='1';
		$activity = $this->input->post("activity");
		$sub_activity = $this->input->post("sub_activity");
		$total_pages = $this->input->post("total_pages");
		$jtn = $this->input->post("jtn");
		$payment_terms = $this->input->post("payment_terms");
		$account = $this->input->post("account");
		$volume = $this->input->post("volume");
		$norms = $this->input->post("norms");
		$illustrations = $this->input->post("illustrations");
		$level = $this->input->post("level");
	    $created_by = $this->input->post("created_by");
			
$sql="update quotation set quotation_no='".$quotation."', client_id='$client_id', project_id='".$project_id."', activity_id='".$activity."',sub_activity_id = '".$sub_activity."', total_pages='".$total_pages."', jtn_id='".$jtn."',
payment_terms_id='".$payment_terms."',account_id='".$account."',norms_per_shift='".$norms."',illustrations='".$illustrations."',complexity_level='".$level."',created_by='".$created_by."' where quotation_id='".$quotation_id."'";		
		//echo $sql; die;
			$result = $this->db->query($sql);
		   return $result;
		
	}
	
	// delete quotation
	public function delete_quotation($qsaid,$qid)
	{
		$sql1 = "SELECT COUNT(quotation_id) FROM quot_sub_activity where quotation_id = $qid";
		$result1 = $this->db->query($sql1)->result_array();
		$count = $result1[0]['COUNT(quotation_id)']; 
		if($count == 1){
		$sql ="delete from quot_sub_activity where quot_sub_activity_id='".$qsaid."'";		
		$result = $this->db->query($sql);
			
		$sql2 ="delete from quotation where quotation_id='".$qid."'";	
		$result2 = $this->db->query($sql2);
		}else{
		$sql ="delete from quot_sub_activity where quot_sub_activity_id='".$qsaid."'";		
		$result = $this->db->query($sql);
		}

		return $result;
	}
    
	public function display_unit($id)
	{		
		
 	 if ((!empty($id))){
            $sql = "select * from unit where unit_id='" . $id . "'";
        } else {
            $sql = "select * from unit";
        }
		
        $result = $this->db->query($sql)->result_array();
		
		 return $result;
	}
	 

  

}

?>
