<?php

class Formaccess extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('formaccess_model');
    }

    function index() {
       // $data['res'] = $this->formaccess_model->getmodules();
        $this->load->view('formaccess', $data);
    }

    function getData() {
        $this->formaccess_model->getData();
    }

    function det($utypeid) {
        $res = $this->formaccess_model->display_access($utypeid);
        echo $res;
    }

    function update() {
        $res = $this->formaccess_model->change_access();
        $res = $this->formaccess_model->display_access($_REQUEST['user_type_id']);
        echo $res . "@" . $_REQUEST['mod'];
        ;
    }

    function save() {
        if ($_POST) {
            $user_type_id = $this->input->post('user_type_id');
            if ($user_type_id != '') {
                if (count($_POST['module_id']) == 0) {
                    echo "Please select atleast one Module";
                } else {
                    $sql = "delete from admin_form_access where user_type_id=".$user_type_id;
                     $this->db->query($sql);
                    foreach ($_POST['module_id'] as $mod_id) {
//                        echo $mod_id; die;
                        if ($mod_id == 1) {
                            $sql = "insert into admin_form_access(`user_type_id`,`module_id`,`page_id`,`access`,`insert`,`update`,`delete`,`view`,`lastupdate_id`,`ipaddress`) value ('" . $user_type_id . "','" . $mod_id . "',1,1,1,1,1,1,1,1),('" . $user_type_id . "','" . $mod_id . "',2,1,1,1,1,1,1,1),('" . $user_type_id . "','" . $mod_id . "',3,1,1,1,1,1,1,1)";
                            $this->db->query($sql);
                        } else {
                            $sql = "insert into admin_form_access(`user_type_id`,`module_id`,`page_id`,`access`,`insert`,`update`,`delete`,`view`,`lastupdate_id`,`ipaddress`) value ('" . $user_type_id . "','" . $mod_id . "',1,1,1,1,1,1,1,1)";
//                        echo $sql;
                            $this->db->query($sql);
                        }
                    }
                    echo "Successfully added the modules";
                }
            } else {
                echo "Please select Usertype";
            }
        }
    }

    function getAccessData($id) {
        $sql = "SELECT `module_id` FROM `admin_form_access` WHERE `user_type_id`=" . $id;
        $by_combo = $this->db->query($sql);
       
        foreach ($by_combo->result() as $row) {
            $output[]=$row->module_id;
        }
//        print_r($output);
        print(json_encode($output));
    }

}

?>
