<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('user_database');

        //Loading url helper
        //$this->load->helper('url');
        $this->load->model('department_model');
    }

    public function index() {
        
        $tr = $this->user_database->userlist_info();
        $config['base_url'] = base_url() . 'user/index';        
        $config['total_rows'] = count($tr);
        $config['per_page'] = 5;
        $config["uri_segment"] = 3;
        
        // Pagination start
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['prev_link'] = '<i></i>Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = 'Next<i></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        // pagination ends
       
        $this->pagination->initialize($config);
        $data['pagelinks'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['userdata'] = $this->user_database->userlist_info($page, $config["per_page"]);
       
        $this->load->view('user_list', $data);
    }

    public function add_user() {
        $data=array();
        $data['departments'] = $this->department_model->department_lists();
        $data['actionTakenBy']=$this->user_database->employee_types();
        if ($this->input->post('username')) {
            $data['username'] = $this->input->post('username');
            $data['fname'] = $this->input->post('fname');
            $data['password'] = $this->input->post('password');
            $data['lname'] = $this->input->post('lname');
            $data['email_id'] = $this->input->post('email');
            $data['type'] = $this->input->post('type');
            $data['department_id'] = $this->input->post('department_id');
            $data['status'] = $this->input->post('status');
            $user_exists = $this->user_database->add_userlist($data);
            if ($user_exists == 1) {
                $data['error_message'] ='Username is already exist, Please try other username.';
                $this->load->view('add_user', $data);
            } else {
                $data=$this->pagination_link();
                $this->load->view('user_list', $data);
            }
        } else {
            $this->load->view('add_user', $data);
        }
    }

    // Edit user	
    public function edit_user() {
        if ($this->input->post('username')) {
            $user_id=$this->input->post('userid');
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email_id' => $this->input->post('email'),
                'type' => $this->input->post('type'),
                'photo' => $this->input->post('photo'),
                'status' => $this->input->post('status'),
                'userid' => $this->input->post('userid'),
            );
            $result_user = $this->user_database->edit_userlist($data);
            if ($result_user == 200) {
                $result = $this->user_database->userlist_info();
                $data = array(
                    'userdata' => $result,
                );
                echo '<script>alert("Records has been modified successfully.");</script>';
                redirect('/user');
            } else if($result_user == 404){
                $result_records = $this->user_database->userlist_info_data($user_id);
                $data = array(
                  'success_message' => 'Username or Email already exits',
                  'userrecord' => $result_records,
                  );
                redirect('/user/edit_user?uid='.$user_id, $data);
                //$this->load->view('edit_user',$data);
            }
        } else {
            $usid = $_GET['uid'];
            $this->load->model('user_database');
            $result_records = $this->user_database->userlist_info_data($usid);
            $data = array(
                'userrecord' => $result_records,
            );
            $data['actionTakenBy']=$this->user_database->employee_types();
            $this->load->view('edit_user', $data);
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

    public function delete_user_by_id() {
        $usid = $this->input->post('uid');
        $result_records = $this->user_database->delete_user_data($usid);
        echo $result_records;
        exit;
}

    private function pagination_link() {
        $tr = $this->user_database->userlist_info();
        $config['base_url'] = base_url() . 'user/index';        
        $config['total_rows'] = count($tr);
        $config['per_page'] = 5;
        $config["uri_segment"] = 3;
        
        // Pagination start
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['prev_link'] = '<i></i>Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = 'Next<i></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        // pagination ends
       
        $this->pagination->initialize($config);
        $data['pagelinks'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['userdata'] = $this->user_database->userlist_info($page, $config["per_page"]);
        return $data;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */