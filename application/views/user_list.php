<?php  $this->load->view("common/top"); ?>
<?php $this->load->view('header_message'); ?>
<?php $this->load->view('left_message'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User listing
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Login / Token</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Created on</th>
                                <th>Action</th>
                            </tr>
                        </thead>								
                        <tbody>
                            <?php
//                            echo "<pre>";
//                            print_r($userdata);
                            $i = 0;
                            foreach ($userdata as $recordslist) {
                                $i++;
                                if ($i % 2 == 0) {
                                    $classname = "odd gradeX";
                                } else {
                                    $classname = "even gradeC";
                                }
                                ?>

                                <tr class="<?php echo $classname; ?>" id="user_id_<?php echo $recordslist->uid ; ?>">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $recordslist->username; ?></td>
                                    <td><?php echo $recordslist->fname; ?> <?php echo $recordslist->lname; ?></td>
                                    <td><?php echo $recordslist->email_id; ?></td>
                                    <td><?php echo $recordslist->type_name; ?></td>
                                    <td><?php echo User_Database::$userStatus[$recordslist->status]; ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($recordslist->created_date)); ?></td>
                                    <td><a href="<?php echo base_url(); ?>index.php/user/edit_user?uid=<?php echo $recordslist->uid; ?>">Edit</a> |
                                        <a href="javascript:void(0)" class="trigger-btn" onclick="deleteuserModal('<?php echo $recordslist->uid; ?>')">Delete</a>                                      
                                    </td>
                                </tr>
<?php } ?>

                        </tbody>
                    </table>
                    <?php if($pagelinks != '' && !empty($pagelinks)){ echo $pagelinks; } ?>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
    <!-- BODY section -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- Modal HTML -->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
<!--                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>				-->
                <h4 class="modal-title">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <input type="hidden" value="" id="delete_user_id" name="delete_user_id">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteuser()">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url(); ?>vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url(); ?>data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>dist/js/sb-admin-2.js"></script>
</body>
</html>
<script>
    function deleteuserModal(uid){
        $("#delete_user_id").val(uid);
        $("#deleteModal").modal('show');
    }
    function deleteuser()
    {
        var userid = $("#delete_user_id").val();
        $.ajax({
            url: "<?php echo base_url(); ?>" + "user/delete_user_by_id",
            type: "POST",
            data: {
                uid: userid
            },
            success: function (data) {
                $("#user_id_"+userid).hide();
                $("#deleteModal").modal('hide');
            }
        });
    }
</script>
 