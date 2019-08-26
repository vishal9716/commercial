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
class Login_model extends CI_Model {

   function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
 
function setsessions($id, $user_name) {
   


        $newdata = array(
            'admin_user_id' => $id,
            'admin_user_name' => $user_name
        
        );

        $this->session->set_userdata($newdata);
    }
	
function checklogin() {
		//echo "model"; die;
        $username= $this->input->post('username');
		//echo $username; die;
        $password =$this->input->post('pass');
          //  echo "0000"; die;
		
		$this->db->select("id,lower(username),`password`");
        $this->db->from('users');
        $this->db->where('(username)', ($username));
        $this->db->where('password', $password);
        
        $query = $this->db->get();
        $row = $query->row();
		if ($username != '' && $password != '') {
			 if (!empty($row)) {
				  $this->setsessions($row->id, $row->username);
                    redirect('index.php/dashboard', 'refresh');
				 
			 } else {
                return "user/password combination wrong";
            }
		}else {
            return "please provide input";
        }
	
           
     }
	
	
	  function unsetsessions() {

//		$newdata = array(
//                   'admin_user_id'  => '',
//				   'admin_user_name'  => '',
//				   'admin_login_type'  => '',
//				   'admin_user_type' => ''
//               );
//		$this->session->unset_userdata($newdata);

        $this->session->unset_userdata('admin_user_name');
       
        $this->session->sess_destroy();
        session_destroy();
        session_unset();
//        delete_cookie("ci_session");
    }
	
    }



?>