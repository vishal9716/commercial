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
                    <h1 class="page-header">Add Customer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Customer add Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-customer" method="post" action="add_customer" enctype="multipart/form-data">
                                        
									<?php if (isset($error_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $error_message; ?>
									</div>
									<?php } ?>
										<div class="form-group">
                                            <label>Customer Name</label>
											<input class="form-control" placeholder="Enter customer name" type="text" name="customername" id="customername" required>                  
                                        </div>
										<div class="form-group">
                                            <label>Customer Email</label>
                                            <input class="form-control" placeholder="Enter customer email" type="email" name="customeremail" id="customeremail" required>                                            
                                        </div>
										<div class="form-group">
                                            <label>Customer Address</label>
                                            <textarea class="form-control" placeholder="Enter customer address" type="text" name="customeraddress" id="customeraddress"></textarea>                                            
                                        </div>
										<div class="form-group">
                                            <label>Payment Term</label>
                                            <input class="form-control" placeholder="Enter Payment term" type="text" name="payment_term" id="payment_term">                                            
                                        </div>
										                                       		
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='<?php echo base_url(); ?>customer/index'">Cancel</button>
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