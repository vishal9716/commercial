<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct() {
        // Call the Model constructor
        parent::__construct();
            $this->load->model('purchase_model');
            $this->load->model('type_model');
            $this->load->model('unit_region_model');
            $this->load->model('department_model');
            $this->load->model('user_database');
            $this->load->model('approval_chain_model');
            $this->load->helper('string');
            error_reporting(0);		 
    }
	
	public function index()
	{
		  $sr_no = $_GET['sr_no'];
		  $session_data=$this->session->userdata('logged_in');
            $pu_list_param=array(
                'department_id' => $session_data['department_id'],
                'pr_id'=> '',
                'uid'=>$session_data['uid']
            );
            $data['purchase_request_list']=$this->purchase_model->display_purchase_order($sr_no);                       
            
         //echo "<pre>";
         //   print_r($data);
//                print_r($session_data);
//                die("55");
          //  $data['type_list']=$this->type_model->typelist_info_by_key_val_arr();
          //  $data['status_list']= $this->purchase_model::$actionstatus;
         //   $data['session_data'] = $session_info;  
         $this->load->view('purchase_order',$data);
		
	}
}
