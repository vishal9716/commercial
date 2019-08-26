 <?php $this->load->view('common/top');?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Activity</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Activity edit Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-activity" method="post" action="edit_activity" enctype="multipart/form-data">
                                        
									<?php if (isset($success_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $success_message; ?>
									</div>
									<?php } 
									foreach($activityrecord as $recordslist) {
									//print_r($userrecord);
									?>
										<div class="form-group">
                                            <label>Activity Name</label>
                                            <input class="form-control" placeholder="Enter activity name" type="text" name="activityname" id="activityname" value="<?php echo $recordslist->activity_name;?>">                                            
                                        </div> 
										<div class="form-group">
                                            <label>Activity Description</label>
                                            <input class="form-control" placeholder="Enter activity desc" type="text" name="activitydesc" id="activitydesc" value="<?php echo $recordslist->activity_desc;?>">                                            
                                        </div>										
										
										<input type="hidden" name="actid" value="<?php echo $recordslist->activity_id;?>">

									<?php } ?>									
											
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='/commercial/activity/index'">Cancel</button>
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
	
 <?php $this->load->view('common/footer');?>