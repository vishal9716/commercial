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
class Admin_users_model extends CI_Model {

    /**
     * Instanciar o CI
     */
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    
    function save($user_name, $password, $first_name, $last_name, $e_mail) {
		//echo "model--";
		//echo $user_name."--".$password."--".$first_name."--".$last_name."--".$e_mail;
		//die;
        $sql = "insert into users(username,password,first_name,last_name,email,updated_by,update_at) values('" . $user_name . "','" . $password . "','" . $first_name . "','" . $last_name . "','" . $e_mail . "','parul',now())";
 // echo $sql; die;
       $this->db->query($sql);
        //$id = $this->db->insert_id();

        //$sql = "insert into admin_usertype_rel(`usertype_id`,`user_id`) values('" . $User_Type . "','" . $id . "')";

    }
    
    
     function getData() {
        $sql = "select * from users order by id desc";
       // echo $sql; die;
        $result = $this->db->query($sql);

        return $result;
      /*  $dataall = array();
        foreach ($result->result() as $row) {
            $data['id'] = $row->id;
            $data['username'] = $row->username;
            $data['password'] = $row->password;
            $data['FullName'] = $row->first_name . " " . $row->last_name;     
            $data['email'] = $row->email;
    
        }*/
      //echo "<pre/>"; print_r($data); die;
       
    }

    function checkuser($name, $id) {
        if ($id != '') {
            $sql = "select user_name from admin_users where user_name='" . $name . "' and id!='" . $id . "'";
        } else {
            $sql = "select user_name  from admin_users where user_name='" . $name . "'";
        }
        $result = $this->db->query($sql);

        $data = $result->row();
        if (empty($data)) {
            return "true";
        } else {
            return '"already exists."';
        }
    }
	
	 function getCombo($sql, $value = false) {
        $query = $this->db->query($sql);
        $str = '';
        foreach ($query->result() as $row) {
            $selected = "";
            if ($value) {
                if ($value == $row->f1) {
                    $selected = " selected='selected'";
                }
            }
            $str.="<option value='" . $row->f1 . "'" . $selected . ">" . $row->f2 . "</option>";
        }

        return $str;
    }

  

}

?>