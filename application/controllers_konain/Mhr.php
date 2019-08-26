<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhr extends CI_Controller {

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
	public function index()
	{
		$id = '';
		$this->load->model('mhr_model'); 
		$data['departments']=$this->mhr_model->display_department($id);
        $this->load->view('mhr',$data);
         
	}
	// Display MHR List
	function mhr_list(){
		$mhrid = '';
		$this->load->model('mhr_model'); 
        $data['mhr_list']=$this->mhr_model->display_mhr($mhrid);
		$this->load->view('mhr_list',$data);
		
	}
	
		public function add_mhr()
	{
			//print_r($_POST);
			
		//$name = $this->input->post('customer_name');
	 	$this->load->model('mhr_model'); 
        $data['result'] = $this->mhr_model->add_mhr();
		//echo print_r($data); 
		if($data['result'] == "2"){
		$this->mhr_list();
		}else{
		$this->load->view('mhr',$data);
		}
	}
}
