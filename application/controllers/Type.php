<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Type extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();

        // Load form helper library
        //$this->load->helper('form');
        // Load form validation library
        //$this->load->library('form_validation');
        // Load session library
        //$this->load->library('session');
        // Load database
        $this->load->model('type_model');
        $this->load->model('department_model');
        
        //Loading url helper
        //$this->load->helper('url');
    }

    public function index() {


        $result = $this->type_model->typelist_info();
        //print_r($result);
        $data = array(
            'typedata' => $result,
        );

        $this->load->view('type_list', $data);
    }

    public function add_type() {
        
        $request_data = $_POST;
        $data['departments']=$this->department_model->department_lists();
        $data['types']=$this->type_model->roles_by_dep_id(array('dep_id'=>1));
       
        if(isset($request_data) && !empty(($request_data))){
            if(!empty($request_data['typename']) && !empty($request_data['department_id'])){
                $currentDate =date('Y-m-d H:i:s');
                $request_data['created_date']=$currentDate;
                $type_added = $this->type_model->add_typelist($request_data);
                if($type_added == 1){
                    redirect('type/index');
                }else {
                    $data = array(
                        'error_message' => '<strong>' . $request_data['typename'] . '</strong>' . ' ' .' role is already exists , Please try other role.'
                    );
                    $this->load->view('add_type', $data);
                }
            }
        }
        else {
            $this->load->view('add_type', $data);
        }
    }

    // Edit user	
    public function edit_type() {

        if ($this->input->post('typename')) {

            $data = array(
                'typename' => $this->input->post('typename'),
                'typeid' => $this->input->post('typeid')
            );

            $result_type = $this->type_model->edit_typelist($data);

            if ($result_type == 2) {
                $result = $this->type_model->typelist_info();
                //print_r($result);
                $data = array(
                    'typedata' => $result,
                );

                echo '<script>alert("Records has been modified successfully.");</script>';
                $this->load->view('type_list', $data);
            } else {
                /* $data = array(
                  'success_message' => 'Records has been modified successfully.'
                  );
                  $this->load->view('edit_user',$success_message); */
                //echo '<script>alert("Records has been modified successfully.");</script>';
            }
        } else {
            $tid = $_GET['tid'];
            $result_records = $this->type_model->typelist_info_data($tid);
            //echo "<pre>";
            //print_r($result_records);
            $data = array(
                'userrecord' => $result_records,
            );

            $this->load->view('edit_type', $data);
        }
    }

    // Logout from admin page
    public function delete_user() {

        $usid = $_GET['uid'];
        $result_records = $this->user_database->delete_user_data($usid);
        if ($result_records == 1) {
            $result = $this->user_database->userlist_info();
            $data = array(
                'userdata' => $result,
            );

            $this->load->view('user_list', $data);
        }
    }
    
    public function get_roles() {
        $request_data=$_POST;
        $result = $this->type_model->roles_by_dep_id($request_data);
        $xyz= json_encode($result);
        print_r($xyz);die();
        exit;
    }
    
    public function check_existing_type() {
        $request_data=$_POST;
        $result = $this->type_model->check_existing_type($request_data);
        $is_existing = count($result) ? 1 : 0;
        echo $is_existing;
        exit;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */