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
class Mhr_model extends CI_Model {

    /**
     * Instanciar o CI
     */
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

	
   // List Activities
	public function display_mhr($id)
	{
		//echo "--".$id; die;
		
 	 if ((!empty($id))){
            $sql = "select * from mhr where mhr_id='" . $id . "'";
        } else {
            $sql = "select * from mhr";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		 return $result;
	}
	
   public function display_department($id)
	{
		//echo "--".$id; die;
		
 	 if ((!empty($id))){
            $sql = "select * from department where department_id='" . $id . "'";
        } else {
            $sql = "select * from department";
        }
		//echo $sql; die;
        $result = $this->db->query($sql)->result_array();
		 return $result;
	}
	
	// Add MHR
    function add_mhr() {
	
        $sql = "insert into mhr(department_name,resource_count,overhead_cost,support_cost) values('" . ($customer_name) . "')";
       //echo $sql; die;
      $query = $this->db->query($sql);
	  $sql1 = "select * from customer";
	  $result = $this->db->query($sql1)->result_array();
		return 2;
		

	}
  

}

?>