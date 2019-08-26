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
                    <h1 class="page-header">Edit Project</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Project edit Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-project" method="post" action="edit_project" enctype="multipart/form-data">
                                        
									<?php if (isset($success_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $success_message; ?>
									</div>
									<?php } 
									foreach($projectrecord as $recordslist) {
									//print_r($userrecord);
									?>
										<div class="form-group">
                                            <label>Project Name</label>
                                            <input class="form-control" placeholder="Enter project name" type="text" name="projectname" id="projectname" value="<?php echo $recordslist->project_name;?>">                                            
                                        </div> 
										<div class="form-group">
                                            <label>Project Description</label>
                                            <input class="form-control" placeholder="Enter project desc" type="text" name="projectdesc" id="projectdesc" value="<?php echo $recordslist->project_desc;?>">                                            
                                        </div>										
										<div class="form-group">
                                            <label>Project created by</label>
                                            <input class="form-control" placeholder="Enter project created by" type="text" name="projectcreated" id="projectcreated" value="<?php echo $recordslist->project_created_by;?>" required>                                            
                                        </div>
										
										<input type="hidden" name="projid" value="<?php echo $recordslist->project_id;?>">

									<?php } ?>									
											
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='<?php echo base_url(); ?>project/index'">Cancel</button>
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