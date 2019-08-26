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
class admin_usertype_model_test extends CI_Model {

    /**
     * Instanciar o CI
     */
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

   function getData() {
        $sql = "select * from user_type order by id desc";
       // echo $sql; die;
        $result = $this->db->query($sql);

        return $result;
    }

  function save($user_type) {
        $sql = "insert into user_type(name) values('" . $user_type . "')";
        $this->db->query($sql);
    }

}

?>