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
                    <h1 class="page-header">Edit Sub-activity</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sub-activity edit Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-subactivity" method="post" action="edit_subactivity" enctype="multipart/form-data">
                                        
									<?php if (isset($error_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $error_message; ?>
									</div>
									<?php } ?>
									
									
										<div class="form-group">
                                            <label>Activity Name</label>											
                                            <select class="form-control" name="activityname" id="activityname">                                                
												<?php
												//print_r($userdata);
												$i=0;
												foreach($activitydata as $recordslist2) {													
												?>
												<option value="<?php echo $recordslist2->activity_id;?>"><?php echo $recordslist2->activity_name;?></option>
												<?php } ?>
                                            </select>
                                                                                        
                                        </div>
										<?php foreach($subactivityrecord as $recordslist) { ?>
										<div class="form-group">
                                            <label>Sub-Activity Name</label>
                                            <input class="form-control" placeholder="Enter sub-activity name" type="text" name="subactivityname" id="subactivityname" value="<?php echo $recordslist->sub_activity_name;?>" required>                                            
                                        </div>
										<div class="form-group">
                                            <label>Sub-Activity Description</label>
                                            <input class="form-control" placeholder="Enter sub-activity desc" type="text" name="subactivitydesc" id="subactivitydesc" value="<?php echo $recordslist-> 	sub_activity_desc;?>">                                            
                                        </div>
										<input type="hidden" name="subaid" value="<?php echo $recordslist->sub_activity_id;?>">
										<script> 
											document.getElementById("activityname").value='<?php echo $recordslist->activity_id;?>';
										</script>
									<?php } ?>
                                        		
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='/commercial/subactivity/index'">Cancel</button>
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