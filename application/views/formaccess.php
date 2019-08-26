
<script>
    var myheader = "<?php echo site_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/formaccess.js"></script>
<h4 style="padding-top: 15px; margin-top: 0px;">Module Access</h4>
<hr>
<section id="content">
    <section class="vbox">
        <header class="header bg-success bg-gradient" style="background-color: #fff; margin-bottom: 24px;">

            <ul class="nav nav-tabs">

                <li class="active">
                    <a href="#datagrid" data-toggle="tab">
                        Assign Modules to Usertype
                    </a>
                </li>

                <!--                <li onclick="get_all_usertypes()" class="">
                                    <a href="#datatable" id="datali" data-toggle="tab">
                                        Data
                                    </a>
                                </li>-->

            </ul>

        </header>

        <section class="scrollable wrapper">
            <div class="tab-content">
                <div class="tab-pane active" id="datagrid">

                    <section class="panel">

                        <form id="access_form"  name = "access_form" method="post" action="<?php echo base_url(); ?>formaccess/save">
                            <div class="tab-pane active" id="datagrid">

                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="user_type_id" id="user_type_id" class="form-control" onchange="getaccessmodule(this.value);">
                                            <option value="0">--Select Type--</option>
                                            <?php
                                            echo $this->admin_users_model->getCombo('select id  as f1,name as f2 from user_type order by f2');
                                            ?>
                                        </select>
                                    </div>
<!--                                    <div class="col-md-6">
                                        <input type="button" name="go" id="go" value="GO" class="btn btn-primary" onClick="getdetails();" />
                                    </div>-->
                                </div>
                                <hr>

                                <div class="row">
                                    <?php foreach ($res->result() as $row) {
                                    ?>
                                                <div class="col-md-3">
                                                    <div class="form-group">

                        <!--                                                        <input type="checkbox"  name="module_id[]" id="fancy-checkbox-primary<?php echo $row->module_id; ?>" autocomplete="off" value="<?php echo $row->module_id; ?>" />-->
                                                        <input type="checkbox" name="module_id[]"  id="modulechk_<?php echo $row->module_id; ?>" autocomplete="off" value="<?php echo $row->module_id; ?>" />
                                                        <div class="btn-group">
                                                            <label for="modulechk_<?php echo $row->module_id; ?>" class="btn btn-primary">
                                                                <span class="glyphicon glyphicon-ok"></span>
                                                                <span> </span>
                                                            </label>
                                                            <label for="fancy-checkbox-primary1" class="btn btn-default active">
                                                    <?php echo $row->module_name; ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                            </div>

                                            <hr>

                                            <input onclick="add_access();" type="button" class="btn btn-success" name="submit" value="Save"/>
                                        </div>
                                    </form>
                                </section>

                            </div>

                            <!--                        <div class="tab-pane" id="datatable">

                                                        <section class="panel">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped m-b-none" data-ride="admin_usertype">
                                                                    <thead>

                                                                        <tr>
                                                                            <th width="10%">
                                                                                ID
                                                                            </th>
                                                                            <th width="50%">
                                                                                User Type
                                                                            </th>
                                                                            <th width="10%">
                                                                                Insert
                                                                            </th>
                                                                            <th width="10%">
                                                                                Update
                                                                            </th>
                                                                            <th width="10%">
                                                                                Delete
                                                                            </th>
                                                                            <th width="10%">
                                                                                View
                                                                            </th>

                                                                            <th width="15%">
                                                                                Action
                                                                            </th>
                                                                        </tr>

                                                                    </thead>
                                                                    <tbody class="tb_data">


                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </section>

                                                    </div>-->

                        </div>

                    </section>

                </section>

                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body">
                </a>

                <script>

                    function get_all_usertypes() {
                        alert("in");
                        $('[data-ride="formaccess"]').dataTable().fnDestroy();
                        $('[data-ride="formaccess"]').each(function() {
                            var oTable = $(this).dataTable({
                                "bProcessing": true,
                                "sAjaxSource": "<?php echo base_url(); ?>formaccess/getData",
                                "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                                "sPaginationType": "full_numbers",
                                "aoColumns": [{
                                        "mData": "user_type_id"
                                    }, {
                                        "mData": "module_id"
                                    }, {
                                        "mData": "insert"
                                    }, {
                                        "mData": "update"
                                    }, {
                                        "mData": "delete"
                                    }, {
                                        "mData": "view"
                                    }, {
                                        "mData": "action"
                                    }]
                            });
                        });


                        $("#DataTables_Table_0").width("100%");

                    }


                    function add_access() {
                       show_layer();
                        var formData = new FormData($('#access_form')[0]);
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>formaccess/save",
                            data: formData,
                            async: false,
                            timeout: 6000,
                            error: function(request, error) {
                                alert('error');
                            },
                            success: function(msg) {
                                hide_layer();
                                alert(msg);
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    }

                    var getaccessmodule = function(id){
                        show_layer();
                        $.ajax({
                            type : "POST",
                            url : "<?php echo base_url(); ?>formaccess/getAccessData/"+id,
                datatype:'json',
                success : function(data){
                    var json = $.parseJSON(data);
                    //                 alert(json);
                    for(var i=1;i<=8;i++){
                        
                        $("#modulechk_"+i).prop("checked",false);
                    }
                    if(json!=null){
                        for(var i=0;i<json.length;i++){
                            $("#modulechk_"+json[i]).prop("checked",true);
                        }
                    }
                    hide_layer();
                }
            });
        }
    </script>

</section>

