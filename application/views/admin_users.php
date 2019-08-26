<?php echo $this->load->view("/common/top"); ?>
<h4 style="padding-top: 15px; margin-top: 0px;">User</h4>
<hr>
    <section id="content">

        <section class="vbox">

            <header class="header bg-success bg-gradient">

                <ul class="nav nav-tabs">

                    <li class="active" onclick="setdefault();">
                        <a href="#datagrid" id="firsttab" data-toggle="tab">
                            Add New User
                        </a>
                    </li>

                    <li onclick="get_all_users()" class="">
                        <a href="#datatable" id="datali" data-toggle="tab">
                            Data
                        </a>
                    </li>

                </ul>


            </header>

            <section class="scrollable wrapper">

                <div class="tab-content">

                    <div class="tab-pane active" id="datagrid">

                        <section class="panel">

                            <header class="panel-heading">
                                <!--* Please Feel up Mandetory Fields-->              
                            </header>



                            <form class="form-horizontal" method="post" data-validate="parsley" action="http://localhost/AdminPanel/index.php/admin_users/save">
                                <input type="hidden" name="id" value="<?php ?>" />
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User Name</label>
                                    <div class="col-sm-4"> <input id="user_name" type="text" name="user_name" placeholder="User Name" onkeypress="changecolor(this.id);" class="form-control" data-required="true" value="<?php echo $user_name; ?>"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-4"> <input type="text" id="password" name="password" placeholder="password" onkeypress="changecolor(this.id);" class="form-control" data-required="true" value="<?php ?>"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">First Name</label>
                                    <div class="col-sm-4"> <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control" data-required="true" value="<?php ?>"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Last Name</label>
                                    <div class="col-sm-4"> <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control" data-required="true" value="<?php ?>"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">E-Mail</label>
                                    <div class="col-sm-4"> <input id="e_mail" type="text" name="e_mail" placeholder="E-Mail" class="form-control" data-required="true" value=""> </div>
                                </div>


                               <div class="form-group">
                                <label class="col-sm-3 control-label">User Type</label>
                                <div class="col-sm-4">
                                    <select id="User_Type" name="User_Type" data-required="true" onchange="changecolor(this.id);" class="form-control" <?php
                                    if ($id != '') {
                                        echo "disabled='disabled'";
                                    }
                                    ?>>
                                        <option value="">-- Select --</option>
										<?php echo $this->admin_users_model->getCombo('select id  as f1,name as f2 from user_type order by f2'); ?>
                                    </select>
                                </div>
                            </div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-3">
                                        <button type="button" class="btn btn-primary pull-left" id="savebtn" onclick="add_user()">
                                            Add New
                                        </button>
                                        <button type="button" id="updatebtn" class="btn btn-primary pull-left" style="display: none;">
                                            Update
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </section>

                    </div>

                    <div class="tab-pane" id="datatable">

                        <section class="panel">

                            <header class="panel-heading">
                                Users Master
                                <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="List Of all Categories">
                                </i>

                            </header>

                            <table id="example" class="table table-striped m-b-none" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="20%">
                                            First Name
                                        </th>
                                        <th width="20%">
                                            Last Name
                                        </th>
                                        <th width="20%">
                                            User Name
                                        </th>
                                        <th width="20%">
                                            Password
                                        </th>
                                        <th width="20%">
                                            Email
                                        </th>
                                        <th>Created By</th>

                                    </tr>
                                </thead>
                            </table>



                        </section>

                    </div>

                </div>

            </section>

        </section>

        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body">
        </a>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>




    <script>
		
		 $(document).ready(function () {
                                                $('#example').DataTable({
                                                    "processing": true,
                                                    "serverSide": true,
                                                    "ajax": {
                                                        "url":"http://localhost/AdminPanel/index.php/admin_users/getData",
                                                        "type": "POST"
                                                    },
                                                    "columns": [
                                                        {"data": "first_name"},
                                                        {"data": "last_name"},
                                                        {"data": "username"},
                                                        {"data": "password"},
                                                        {"data": "email"},
                                                        {"data": "updated_by"}
                                                    ]
                                                });
                                            });
                                            function get_all_users() {
                                                $('#example').DataTable().ajax.reload();

                                            }
                                                                                    

                                           
                                            function add_user() {
                                                //alert("test1");
                                                var user_name = $('#user_name').val();
                                                var password = $('#password').val();
                                                var first_name = $('#first_name').val();
                                                var last_name = $('#last_name').val();
                                                // var mobile_no = $('#mobile_no').val();
                                                var e_mail = $('#e_mail').val();
                                                // var user_type = $('#user_type').val();
                                                //alert(user_name);
                                                if (user_name == '') {
                                                    $('#user_name').css('border-color', 'red');
                                                } else if (password == '') {
                                                    $('#password').css('border-color', 'red');
                                                }
                                                /* else if (user_type == '') {
                                                 $('#user_type').css('border-color', 'red');
                                                 }*/
                                                else {
                                                    //  alert("else");
                                                    $.ajax({
                                                        method: "POST",
                                                        url: "http://localhost/AdminPanel/index.php/admin_users/save",
                                                        data: {user_name: user_name, password: password, first_name: first_name, last_name: last_name, e_mail: e_mail},
                                                        success: function (msg) {

                                                            if (msg != 'true') {
                                                                alert(msg);

                                                                $("#datali").click();
                                                                // $('#example').DataTable().ajax.reload();

                                                            } else {
                                                                alert("Username already exists!!");
                                                                $('#user_name').css('border-color', 'red');
                                                                // $('#user_name').focus();
                                                            }


                                                        },
                                                        error: function (msg) {
                                                            alert(msg);
                                                        }
                                                    });
                                                }


                                            }
		
		 var changecolor = function (id) {
            document.getElementById(id).style.borderColor = '';
                    }



                                            function editData(id, user_name, password, first_name, last_name, mobile_no, e_mail, address)
                                            {
                                                var d = confirm("Are you Sure edit data with id { " + id + " }");
                                                if (d == 1)
                                                {
                                                    $('#updatebtn').removeAttr('onclick');
                                                    $('#updatebtn').attr('onclick', 'updatedata("' + id + '");');

                                                    $("#firsttab").click();
                                                    $("#user_name").val(user_name);
                                                    $("#password").val(password);
                                                    $("#first_name").val(first_name);
                                                    $("#last_name").val(last_name);
                                                    $("#e_mail").val(e_mail);
                                                    $("#mobile_no").val(mobile_no);
                                                    $("#address").val(address);
                                                    $("#savebtn").hide();
                                                    $('#updatebtn').show();

                                                }
                                            }

                                            function deleteData(id)
                                            {
                                                var d = confirm("Are you Sure deleting data with id { " + id + " }");
                                                if (d == 1)
                                                {
                                                    $.ajax({
                                                        method: "POST",
                                                        url: "<?php echo base_url(); ?>admin_users/delete",
                                                        data: {id: id},
                                                        success: function (msg) {
                                                            alert(msg);
                                                            get_all_users();
                                                        },
                                                        error: function (msg) {
                                                            alert(msg);
                                                        }
                                                    });
                                                }
                                            }

                                            function updatedata(id) {
                                                var user_name = $('#user_name').val();
                                                var password = $('#password').val();
                                                var first_name = $('#first_name').val();
                                                var last_name = $('#last_name').val();
                                                var e_mail = $('#e_mail').val();
                                                var mobile_no = $('#mobile_no').val();
                                                var address = $('#address').val();
                                                $.ajax({
                                                    method: "POST",
                                                    url: "<?php echo base_url(); ?>admin_users/update",
                                                    data: {id: id, user_name: user_name, password: password, first_name: first_name, last_name: last_name, e_mail: e_mail, mobile_no: mobile_no, address: address},
                                                    success: function (msg) {
                                                        alert(msg);
                                                        get_all_users();
                                                        $("#datali").click();
                                                    },
                                                    error: function (msg) {
                                                        alert(msg);
                                                    }
                                                });
                                            }

                                            function setdefault() {
                                                $("#user_name").val('');
                                                $("#password").val('');
                                                $('#first_name').val('');
                                                $('#last_name').val('');
                                                $('#mobile_no').val('');
                                                $('#e_mail').val('');
                                                $('#address').val('');
                                                $("#savebtn").show();
                                                $('#updatebtn').hide();

                                            }


    </script>




