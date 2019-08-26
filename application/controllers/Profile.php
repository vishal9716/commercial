<?php

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('profile_model');
    }

    function index() {
        $data['res'] = $this->profile_model->getData()->result_array();
		//echo "<pre/>";print_r($data); die;
        $this->load->view('profile',$data);
    }

    function getData() {
        $this->profile_model->getData();
    }

 

}

?>
