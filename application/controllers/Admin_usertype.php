<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_usertype extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_usertype_model');
    }

    function index() {
        $this->load->view('admin_usertype');
    }

   function getData() {
		//echo "controller";
		 $data['data'] = $this->admin_usertype_model->getData()->result_array();
      //echo "<pre/>";
		//print_r($data);
		header('Content-Type: application/json');
        echo json_encode($data);
    }

    function update() {
        $id = $this->input->post("id");
        $usertype = $this->input->post("usertype");
        $d = $this->admin_usertype_model->update($id,$usertype);
        echo "Usertype Updated Successfully";
        
//        $data['id'] = $d->utypeid;
//        $data['usertype'] = $d->usertype;
//        $data['insert'] = $d->insert;
//        $data['update'] = $d->update;
//        $data['delete'] = $d->delete;
//        $data['view'] = $d->view;
//        $this->load->view('admin_usertype', $data);
    }

    function delete() {
        $id = $this->input->post("id");
        $d = $this->admin_usertype_model->delete($id);
        echo "Record deleted Successfully";
    }

    function save() {
        //echo "controller"; die;
        $user_type = $this->input->post("usertype");
		 //$desp = $this->input->post("usertype");
        $usertypecount = "SELECT `name` FROM `user_type` WHERE `name` = '$user_type' ";
        //echo $usertypecount; die;
        $result = $this->db->query($usertypecount);
        if ($result->num_rows() > 0) {
            echo 'true';
        } else {
            $this->admin_usertype_model->save($user_type);
            echo 'New User Type Added Successfully';
        }
    }

}

?>