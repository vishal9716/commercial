<?php echo $this->load->view("/common/top"); ?>
<section id="content">

    <section class="vbox">

        <header class="header bg-success bg-gradient" style="background-color: #fff; margin-bottom: 24px;">

            <ul class="nav nav-tabs">

                <li class="active" onclick="setdefault();">
                    <a href="#datagrid" id="firsttab" data-toggle="tab">
                        Add New User Type
                    </a>
                </li>

                <li onclick="get_all_usertypes()" class="">
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

                        <!--                        <header class="panel-heading">
                                                    * Please Feel up Mandetory Fields
                                                </header>-->

                        <form class="form-horizontal" data-validate="parsley">
                            <!--<input id="id" type="hidden" name="id" value="<?php echo $id; ?>" />-->

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">User Type</label> 
                                        <div class="col-sm-8"> <input id="usertype" type="text" name="usertype" onkeypress="changecolor(this.id);" placeholder="User Type" class="form-control" data-required="true" value=""> </div>
                                    </div>


                                </div>
								
								
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="button" id="savebtn" class="btn btn-primary pull-left" onclick="add_usertype()">
                                            Add New
                                        </button>

                                        <button type="button" id="updatebtn" class="btn btn-primary pull-left" style="display: none;">
                                            Update
                                        </button>


                                    </div>
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
                                           Usertype
                                        </th>
                                        <th width="20%">
                                            Description
                                        </th>
                                        

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
		// alert("in");
                                                $('#example').DataTable({
                                                    "processing": true,
                                                    "serverSide": true,
                                                    "ajax": {
                                                        "url":"http://localhost/AdminPanel/index.php/admin_usertype_test/getData",
                                                        "type": "POST"
                                                    },
                                                    "columns": [
                                                        {"data": "name"},
                                                        {"data": "description"}
                                                        
                                                    ]
                                                });
                                            });
	
	
	
    var changecolor= function(id){
        document.getElementById(id).style.borderColor='';
    }
	
		
	
// for adding user type start
    function add_usertype() {
        //alert("in");
        usertype = $('#usertype').val();
        
        //alert(usertype);
        if(usertype==''){
            document.getElementById('usertype').style.borderColor='red';
            $('#usertype').focus();
        }
        else{
            $.ajax({
                method: "POST",
                 url: "http://localhost/AdminPanel/index.php/admin_usertype_test/save",
                data: {usertype: usertype},
                success: function(msg) {
                   
                    $('#usertype').val('');
                    if(msg!='true'){
                        alert(msg);
                        //get_all_usertypes();
                        $("#datali").click();
                    }
                    else{
                        alert("Usertype already exists!!");
                        document.getElementById('usertype').style.borderColor='red';
                        $('#usertype').focus();
                    }
                },
                error: function(msg) {
                    alert(msg);
                }
            });
            $("#DataTables_Table_0").width("100%");
        }
    }

	// for adding user type ends
	
	
	
	
    function get_all_usertypes() {
		 $('#example').DataTable().ajax.reload();

 
    }

    function editData(id,usertype)
    {
        var d = confirm("Are you Sure edit data with id { " + id + " }");
        if (d == 1)
        {
            $('#updatebtn').removeAttr('onclick');
            $('#updatebtn').attr('onclick','updatedata("'+id+'");');
            
            $("#firsttab").click();
            $("#usertype").val(usertype);
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
                url: "<?php echo base_url(); ?>admin_usertype/delete",
                data: {id: id},
                success: function(msg) {
                    alert(msg);
                    get_all_usertypes();
                },
                error: function(msg) {
                    alert(msg);
                }
            });
        }
    }

    function updatedata(id){
    var usertype = $('#usertype').val();
    $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>admin_usertype/update",
                data: {id: id,usertype:usertype },
                success: function(msg) {
                    alert(msg);
                    get_all_usertypes();
                    $("#datali").click();
                },
                error: function(msg) {
                    alert(msg);
                }
            });
    }

    function setdefault(){
      $("#usertype").val('');
        $("#savebtn").show();
        $('#updatebtn').hide();

    }

</script>
