<?php $this->load->view("common/top"); ?>
<?php $this->load->view('header_message'); ?>
<?php $this->load->view('left_message'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Type</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Type add Form
                </div>
                <div class="panel-body">
                    <div class="row">
                         <form role="form" id="frm-user" name="frm-user" method="post" action="add_type" enctype="multipart/form-data">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Department</label>
                                <select id="department_id" class="form-control select2 select2-hidden-accessible" name="department_id">
                                    <option hidden value="" >--Select--</option>   
                                    <?php foreach ($departments as $department) { ?>
                                        <option value="<?php echo $department['department_id']; ?>"><?php echo $department['department_name']; ?></option>     
                                    <?php } ?> 
                                </select>
                                <span id="errMsg" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reporting Head</label>
                                <select id="reporting_head" class="form-control select2 select2-hidden-accessible" name="reporting_head">
                                    <?php foreach ($actionTakenBy as $action) { ?>
                                        <option value="<?php echo $action['type_id']; ?>"><?php echo $action['type_name']; ?></option>     
                                    <?php } ?> 
                                </select>
                                <span id="errMsg" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                                <?php if (isset($error_message)) { ?>					
                                    <div class="alert alert-danger">
                                        <?php echo $error_message; ?>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label>Add New Role</label>
                                    <input class="form-control" placeholder="Enter type name" type="text" name="typename" id="typename" required>                                            
                                </div>

                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                <button type="reset" name="cancel" class="btn btn-default" onclick="location = '/commercial/type/index'">Cancel</button>
                          
                        </div>
                        </form>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->



    </div>
    <!-- /.row -->

    <!-- BODY section -->


    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

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

 <script src="<?php echo base_url(); ?>public/js/jquery.validate.min.js"></script>
<script>
    
    $(document).ready(function() {
        $("#frm-user").validate({
          errorClass:"text-danger",
          rules: {
            department_id : {
              required: true
            },
            reporting_head : {
              required: true
            },
            typename: {
              required: true
            }
          },
          messages : {
                department_id: {
                  required: "Please select department"
                },
                reporting_head: {
                  required: "Please select reporting head"
                },
                typename: {
                  required: "Please enter role"
                }
            }
        });
    });
        $('#department_id').change(function () {
            $('#reporting_head').html('');
            var dep_id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>" + "type/get_roles",
                type: "POST",
                data: {
                    dep_id: dep_id
                },
                dataType: 'json',
                success: function (data) {
                   
                    $.each(data, function (index, element) {
                        $('#reporting_head').append($("<option></option>").attr("value", element.type_id).text(element.type_name));
                    });

                }
            });
        });
        
//        $("#typename").focusout(function(){
//        $('input#typename').keyup( function() {
//            if( this.value.length < 4 ) return;
//            var datare= $('#frm-user').serialize();
//            $.ajax({
//                url: "<?php //echo base_url(); ?>" + "type/check_existing_type",
//                type: "POST",
//                data: datare,
//                success: function (data) {
//                    if(data == 1){
//                        var errorLable='<label id="typename-error" class="text-danger" for="typename">Typename exists!</label>';
//                        $("input#typename").addClass('text-danger');
//                        $("input#typename").after(errorLable);
//                    }
//                }
//            });
//        });
        
        

</script>

</body>

</html>