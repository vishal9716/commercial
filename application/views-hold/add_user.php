<?php echo $this->load->view("common/top"); ?>
      
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User add Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-user" method="post" action="add_user" enctype="multipart/form-data">
                                        
									<?php if (isset($error_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $error_message; ?>
									</div>
									<?php } ?>
										<div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" placeholder="Enter username" type="text" name="username" id="username" required>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password" id="password" placeholder="Enter password" required>
                                        </div>
										 <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" name="fname" id="fname" placeholder="Enter first name" required>
                                        </div>
										 <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="lname" id="lname" placeholder="Enter last name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" id="email" placeholder="Enter email" required>
                                        </div>
										<div class="form-group">
                                            <label>Select Type</label>
                                            <select class="form-control" name="type" id="type">                                                
												<option value="1">Administrator</option>
                                                <option value="2">Operation - Manager</option>
                                                <option value="3">Operation - Team</option>
                                                <option value="4">Account - Manager</option>
                                                <option value="5">Account - Team</option>
                                            </select>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Upload Photo</label>
                                            <input type="file" name="photo" id="photo">
                                        </div>
										
										<div class="form-group">
                                            <label>Status</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="status" value="Active" checked>Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="status" value="De-active">De-Active
                                            </label>                                            
                                        </div>									
											
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='/commercial/user/index'">Cancel</button>
                                    </form>
                                </div>
                                
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

</body>

</html>
