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
                    <h1 class="page-header">Notify to Operation</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Query from Operation
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-queryoperation" method="post" action="notifyoperation" enctype="multipart/form-data">
                                        
									<?php if (isset($error_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $error_message; ?>
									</div>
									<?php } ?>
									
										<div class="form-group">
                                            <label>Invoice #</label>
                                            <input class="form-control" placeholder="Enter invoice number" type="text" name="invoice_no" id="invoice_no" required>                                            
                                        </div>
										<div class="form-group">
                                            <label>Operation Email ID</label>
                                            <input class="form-control" placeholder="Enter email id of operation" type="email" name="email_operation" id="email_operation" required>                                            
                                        </div>
										<div class="form-group">
                                            <label>Requested by</label>
                                            <input class="form-control" placeholder="Enter the requester name" type="text" name="requested_by" id="requested_by">                                            
                                        </div>
										<div class="form-group">
                                            <label>Query/Comments</label>
                                           	<textarea class="form-control" placeholder="Enter query/comments" row="5" cols="30" name="querys" id="querys" required></textarea>
                                        </div>
                                        		
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='<?php echo base_url(); ?>invoice/add_invoice'">Cancel</button>
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