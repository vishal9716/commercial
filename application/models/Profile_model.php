<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
class Profile_model extends CI_Model {

   function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
 
 function getData() {
        $sql = "select * from users where id = 1";
        //echo $sql; die;
        $result = $this->db->query($sql);
        return $result;
   
       
    }
	
    }



?>