<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_users_model');
    }

    function index() {
        $this->load->view('admin_users');
    }

    function save() {
       
        $user_name = $this->input->post("user_name");
      
        $password = $this->input->post("password");
        $first_name = $this->input->post("first_name");
        $last_name = $this->input->post("last_name");
        // $mobile_no = $this->input->post("mobile_no");
        $e_mail = $this->input->post("e_mail");
        //$address = $this->input->post("address");
        //$User_Type = $this->input->post("user_type");
        // $gender = $this->input->post("gender");

        $this->admin_users_model->save($user_name, $password, $first_name, $last_name, $e_mail);
        echo 'New User Added Successfully';
        //  }
    }

    function getData() {
        //echo "controller"; die;
        //$data['user']="--testing--";
        $data['data'] = $this->admin_users_model->getData()->result_array();
        //echo "<pre/>";
        //print_r($data);
        // echo  $this->load->view('admin_users', $data);
        header('Content-Type: application/json');
        echo json_encode($data);
        //echo $this->load->view('admin_users', $data, true);
    }

}

?>