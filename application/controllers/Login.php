<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('user_database');
    }

    public function index() {
        //echo "test"; die;
        $this->load->view('login_message');
    }

    public function login_submit() {
        $this->load->model('login_database');
        $this->load->model('type_model');
        $username = $this->input->post('username');
        $passwords = $this->input->post('password');
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $result = $this->login_database->login($data);        
              
        if ($result == 1) {
            $vpTypeid= 1;
            $username = $this->input->post('username');
            $result = $this->login_database->read_user_information($username);
            $pe_type=$this->type_model->dept_user_types($result[0]->department_id);
           
            if ($result != false) {
                $session_data = array(
                    'uid' => $result[0]->uid,
                    'username' => $result[0]->username,
                    'email' => $result[0]->email_id,
                    'firstname' => $result[0]->fname,
                    'lastname' => $result[0]->lname,
                    'user_type' => $result[0]->type,
                    'department_id' =>$result[0]->department_id,
                    'permission_type_id' => $pe_type[0]
                );               
                
                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);
                $this->load->view('welcome_message');
            }
        } else {
            $data = array(
                'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('login_message', $data);
        }
    }

    // Logout from admin page
    public function logout() {

        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login_message', $data);
    }
    
    public function departmantUserTypes($param) {
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */