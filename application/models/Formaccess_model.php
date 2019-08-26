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
class Formaccess_model extends CI_Model {

    /**
     * Instanciar o CI
     */
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * Instanciar o CI
     */
    public function formaccess_model() {
        parent::Model();
        $this->CI = & get_instance();
    }
    
    function getmodules()
	{
		$sql="SELECT * FROM `admin_module`";
		$result=$this->db->query($sql);
		return $result;
	}

    function getData() {
        $sql = "select * from admin_form_access";
        $result = $this->db->query($sql);

        $dataall = array();
        foreach ($result->result() as $row) {
            $data['user_type_id'] = $row->user_type_id;
            $data['module_id'] = $row->module_id;
            $data['insert'] = $row->insert;
            $data['update'] = $row->update;
            $data['delete'] = $row->delete;
            $data['view'] = $row->view;
            $data['action'] = "<a href='" . site_url('/admin_usertype/update/' . $row->utypeid) . "'>Edit</a> | <a href='javascript:deleteData(" . $row->utypeid . ")'>Delete</a>";
            $dataall[] = $data;
        }

        echo json_encode(array("aaData" => $dataall));
    }
    function get_usertype_combo($id = false) {
        $this->db->select('utypeid,usertype');
        $this->db->from('admin_usertype');
        $this->db->where("status", 'Y');
        $this->db->order_by("usertype", "asc");
        $by_combo = $this->db->get();
        $str = '';
        foreach ($by_combo->result() as $row) {
            if ($id == $row->id) {
                $str.="<option value='" . $row->utypeid . "' selected>" . $row->usertype . "</option>";
            } else {
                $str.="<option value='" . $row->utypeid . "'>" . $row->usertype . "</option>";
            }
        }
        return $str;
    }

    function display_access($utypeid) {
        $this->db->select('usertype,insert,update,delete,view');
        $this->db->from('admin_usertype');
        $this->db->where("status", 'Y');
        $this->db->where("utypeid", $utypeid);

        $by_combo = $this->db->get();
        $uty = $by_combo->row();

        //echo $uty->usertype;
        //echo $udt->dept_name;
        //$sqa="select `insert`,`update`,`delete`,`view` from admintype where user_id='".$this->user_id."' and status='y'";
        //$uac = $this->select($sqa);
        /* echo $uac->insert;
          echo $uac->update;
          echo $uac->delete;
          echo $uac->view; */
        $str = "";

        $str.="<table align='center' cellpadding='0' cellspacing='0' border='0' class='table' width='100%'>";
        $str.="<tr>";
        $str.="<td>Usertype :-";
        $str.="</td>";
        $str.="<td>";
        $str.="" . $uty->usertype . "";
        $str.="</td>";
        $str.="</tr>";
        $str.="<tr>";
        $str.="<td>Default Rights to User :-";
        $str.="</td>";
        $str.="<td>";
        if ($uty->insert == 1) {
            $str.="<img src='../images/tick.gif' title='Available' >Insert";
        } else {
            $str.="<img src='../images/cross.gif' title='Not Available' >Insert";
        }
        $str.="&nbsp;&nbsp;";
        if ($uty->update == 1) {
            $str.="<img src='../images/tick.gif' title='Available' >Update";
        } else {
            $str.="<img src='../images/cross.gif' title='Not Available' >Update";
        }
        $str.="&nbsp;&nbsp;";
        if ($uty->delete == 1) {
            $str.="<img src='../images/tick.gif' title='Available' >Delete";
        } else {
            $str.="<img src='../images/cross.gif' title='Not Available' >Delete";
        }
        $str.="&nbsp;&nbsp;";
        if ($uty->view == 1) {
            $str.="<img src='../images/tick.gif' title='Available' >View";
        } else {
            $str.="<img src='../images/cross.gif' title='Not Available' >View";
        }
        $str.="&nbsp;&nbsp;";

        $str.="</td>";
        $str.="</tr>";
        $str.="</table>";


        $this->db->select('module_id, module_name');
        $this->db->from('admin_module');
        $this->db->where("status", 'y');
        $by_combo = $this->db->get();

        //print_r($mod);
        $i = -1;
        foreach ($by_combo->result() as $mod) {
            $i++;

            $str.="<table align='center' cellpadding='0' cellspacing='0' border='0' class='table' width='100%'>";
            $str.="<tr>";
            /*
              $str.="<td  width='800px' class='head' onclick='open_down(".$mod->module_id.");'><img src='../images/plus.gif' onclick='open_down(".$mod->module_id.");' align='middle' /><div align='center' style='vertical-align:middle'>";
              $str.="<b>".$mod->module_name."</b>";
              $str.="</div></td>";
              $str.="<td style='vertical-align:middle' align='center' class='head' >";
              $str.="<div id='modimg".$mod->module_id."'align='right' ><img src='../images/plus.gif' onclick='open_down(".$mod->module_id.");' align='middle' /></div> </td>";
              $str.=""; */
            $str.="<td  width='90%' class='bg-primary' onclick='open_down(" . $mod->module_id . ");' title='Click Here To Expand' id='show" . $mod->module_id . "'>";
            //$str.="";
            $str.="<img src='public/images/plus.gif' id='my" . $mod->module_id . "' >&nbsp;&nbsp;<font style='cursor:pointer'><b>" . $mod->module_name . "</b><input type='hidden' name='modstat" . $mod->module_id . "' id='modstat" . $mod->module_id . "' value='0'";
            $str.="</td>";
            $str.="</tr>";
            $str.="</table>";
            $str.="<div id='mod" . $mod->module_id . "' style='display:none'>";
            $str.="<table align='center' cellpadding='0' cellspacing='0' border='0' class='table-form' width='100%'>";

            $this->db->select('page_id,pagename');
            $this->db->from('admin_module_pages');
            $this->db->where("module_id", $mod->module_id);
            $this->db->where("status", 'y');
            $this->db->where("main_status", 'y');

            $by_combo1 = $this->db->get();

            $str.="<div id='err" . $mod->module_id . "' style='color:#FF0000'></div>";


            //print_r($pag);
            $pp = 0;
            $j = 0;

            foreach ($by_combo1->result() as $pag) {

                /* if($pp=="0" || $pp=="4")
                  {
                  $str.="<tr>";
                  } */

                if ($j == 0) {
                    $str.="<tr align='center'>";
                    $str.="<td width='400px' align='center'>";
                    $str.="<b>Page Access</b>";
                    $str.="</td>";
                    $str.="<td width='150px' align='center'><center>";
                    $str.="<b>Set All Priviledged</b>";
                    $str.="</center></td>";
                    $str.="<td width='150px' align='center'><center>";
                    $str.="<b>Insert</b>";
                    $str.="</center></td>";
                    $str.="<td align='center' width='150px'><center>";
                    $str.="<b>Update</b>";
                    $str.="</center></td>";
                    $str.="<td align='center' width='150px'><center>";
                    $str.="<b>Delete</b>";
                    $str.="</center></td>";
                    $str.="<td align='center' width='150px'><center>";
                    $str.="<b>View</b>";
                    $str.="</center></td>";
                    $str.="</tr>";
                }

                $str.="<tr>";

                $this->db->select('formaccess_id,access,`insert`,`update`,`delete`,`view`,status');
                $this->db->from('admin_form_access');
                $this->db->where("page_id", $pag->page_id);
                $this->db->where("module_id", $mod->module_id);
                $this->db->where("user_type_id", $utypeid);

                $by_combo2 = $this->db->get();


                //echo $sq3;
                //print_r($chk);

                $pp++;
                if ($by_combo2->num_rows() > 0) {
                    $chk = $by_combo2->row();
                } else {
                    $chk->formaccess_id = '';
                    $chk->access = 0;
                    $chk->insert = 0;
                    $chk->update = 0;
                    $chk->delete = 0;
                    $chk->view = 0;
                    $chk->status = 0;
                }
                $str.="<td>";
                if ($chk->access == 1) {
                    $str.="<input type='checkbox' name='" . $mod->module_id . "access" . $j . "' id='" . $mod->module_id . "access" . $j . "' value='' checked='checked' onclick='check_access(" . $mod->module_id . "," . $j . ");' >" . $pag->pagename . "";
                } else {
                    $str.="<input type='checkbox' name='" . $mod->module_id . "access" . $j . "' id='" . $mod->module_id . "access" . $j . "' value='' onclick='check_access(" . $mod->module_id . "," . $j . ");' >" . $pag->pagename . "";
                }
                if ($chk->formaccess_id != '') {
                    $str.="<input type='hidden' name='" . $mod->module_id . "faccess" . $j . "' id='" . $mod->module_id . "faccess" . $j . "' value='" . $chk->formaccess_id . "' />";
                } else {
                    $str.="<input type='hidden' name='" . $mod->module_id . "faccess" . $j . "' id='" . $mod->module_id . "faccess" . $j . "' value='0' />";
                }
                $str.="<input type='hidden' name='" . $mod->module_id . "page_id" . $j . "' id='" . $mod->module_id . "page_id" . $j . "' value='" . $pag->page_id . "' />";
                //echo "djkhfhdk".$chk->insert."sdfdf<br><br><br>";
                $str.="</td>";
                $str.="<td>";
                if ($chk->access == 1) {
                    if ($chk->insert == 1 && $chk->update == 1 && $chk->delete == 1 && $chk->view == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "all" . $j . "' id='" . $mod->module_id . "all" . $j . "' value='' checked='checked' onclick='check_all(" . $mod->module_id . "," . $j . ");'  > All";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "all" . $j . "' id='" . $mod->module_id . "all" . $j . "' value='' onclick='check_all(" . $mod->module_id . "," . $j . ");' > All";
                    }
                } else {
                    if ($chk->insert == 1 && $chk->update == 1 && $chk->delete == 1 && $chk->view == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "all" . $j . "' id='" . $mod->module_id . "all" . $j . "' value='' checked='checked' disabled='disabled' onclick='check_all(" . $mod->module_id . "," . $j . ");' > All";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "all" . $j . "' id='" . $mod->module_id . "all" . $j . "' value='' disabled='disabled' onclick='check_all(" . $mod->module_id . "," . $j . ");' > All";
                    }
                }
                $str.="</td>";
                $str.="<td>";
                if ($chk->access == 1) {
                    if ($chk->insert == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "ins" . $j . "' id='" . $mod->module_id . "ins" . $j . "' value='' checked='checked'  > Insert";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "ins" . $j . "' id='" . $mod->module_id . "ins" . $j . "' value='' > Insert";
                    }
                } else {
                    if ($chk->insert == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "ins" . $j . "' id='" . $mod->module_id . "ins" . $j . "' value='' checked='checked' disabled='disabled' > Insert";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "ins" . $j . "' id='" . $mod->module_id . "ins" . $j . "' value='' disabled='disabled' > Insert";
                    }
                }
                $str.="</td>";
                $str.="<td>";
                if ($chk->access == 1) {
                    if ($chk->update == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "upd" . $j . "' id='" . $mod->module_id . "upd" . $j . "' value='' checked='checked' > Update";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "upd" . $j . "' id='" . $mod->module_id . "upd" . $j . "' value='' > Update";
                    }
                } else {
                    if ($chk->update == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "upd" . $j . "' id='" . $mod->module_id . "upd" . $j . "' value='' checked='checked' disabled='disabled' > Update";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "upd" . $j . "' id='" . $mod->module_id . "upd" . $j . "' value='' disabled='disabled' > Update";
                    }
                }
                $str.="</td>";
                $str.="<td>";
                if ($chk->access == 1) {
                    if ($chk->delete == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "del" . $j . "' id='" . $mod->module_id . "del" . $j . "' value='' checked='checked' > Delete";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "del" . $j . "' id='" . $mod->module_id . "del" . $j . "' value='' > Delete";
                    }
                } else {
                    if ($chk->delete == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "del" . $j . "' id='" . $mod->module_id . "del" . $j . "' value='' checked='checked' disabled='disabled' > Delete";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "del" . $j . "' id='" . $mod->module_id . "del" . $j . "' value='' disabled='disabled' > Delete";
                    }
                }
                $str.="</td>";
                $str.="<td>";
                if ($chk->access == 1) {
                    if ($chk->view == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "view" . $j . "' id='" . $mod->module_id . "view" . $j . "' value='' checked='checked' > View";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "view" . $j . "' id='" . $mod->module_id . "view" . $j . "' value='' > View";
                    }
                } else {
                    if ($chk->view == 1) {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "view" . $j . "' id='" . $mod->module_id . "view" . $j . "' value='' checked='checked' disabled='disabled' > View";
                    } else {
                        $str.="<input type='checkbox' name='" . $mod->module_id . "view" . $j . "' id='" . $mod->module_id . "view" . $j . "' value='' disabled='disabled' > View";
                    }
                }
                $str.="</td>";
                $str.="</tr>";
                /* if($pp=="0" || $pp=="4")
                  {
                  $str.="</tr>";
                  $pp=0;;
                  } */
                $j++;
            }
            $str.="<tr><td colspan='6' align='center'><input type='hidden' name='" . $mod->module_id . "pgcount' id='" . $mod->module_id . "pgcount' value='" . $j . "' /><center><input type='button' name='btn' id='btn' value='Update' class='submit' onclick='update_access(\"" . $mod->module_id . "\",5);' /></center></td></tr>";
            $str.="</table>";
            $str.="</div>";
        }
        return $str;
    }

    function change_access() {
        //echo $this->acc;
        $com = explode("@", $_REQUEST['acc']);
        //print_r($com);
        $marlen = sizeof($com);
        for ($i = 0; $i < $marlen - 1; $i++) {
            $inar = explode("#", $com[$i]);
            //print_r($inar);
            if ($inar[6] != "") {
                if ($inar[0] == 0) {
                    //echo "INSERT";
                    if ($inar[1] == 1) {
                        $sq = "insert into admin_form_access(`user_type_id`,`module_id`,`page_id`,`access`,`insert`,`update`,`delete`,`view`,`lastupdate_id`,`ipaddress`) value ('" . $inar[6] . "','" . $inar[7] . "','" . $inar[8] . "','" . $inar[1] . "','" . $inar[2] . "','" . $inar[3] . "','" . $inar[4] . "','" . $inar[5] . "','" . $this->session->userdata('useridznl') . "','" . $_SERVER['REMOTE_ADDR'] . "')";
                        $this->db->query($sq);
                    } else {
                        
                    }
                } else {
                    //echo "UPDATE";
                    $sq = "update admin_form_access set access='" . $inar[1] . "',`insert`='" . $inar[2] . "',`update`='" . $inar[3] . "',`delete`='" . $inar[4] . "',`view`='" . $inar[5] . "',lastupdate_id='" . $this->session->userdata('useridznl') . "',ipaddress='" . $_SERVER['REMOTE_ADDR'] . "' where formaccess_id='" . $inar[0] . "'";
                    //echo $sq;
                    $this->db->query($sq);

                    if ($inar[1] == "1") {
                        $sqy = "update admin_form_access set status='y' where formaccess_id='" . $inar[0] . "' ";
                        $this->db->query($sqy);
                    }
                }
            }
        }
    }

}

?>