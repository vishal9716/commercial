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
                    <h1 class="page-header">Edit Customer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Customer edit Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-customer" method="post" action="edit_customer" enctype="multipart/form-data">
                                        
									<?php if (isset($success_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $success_message; ?>
									</div>
									<?php } 
									foreach($customerrecord as $recordslist) {
									//print_r($userrecord);
									?>
										<div class="form-group">
                                            <label>Customer Name</label>
                                            <input class="form-control" placeholder="Enter customer name" type="text" name="customername" id="customername" value="<?php echo $recordslist->customer_name;?>" required>                                            
                                        </div> 
										
										<div class="form-group">
                                            <label>Customer Email</label>
                                            <input class="form-control" placeholder="Enter customer email" type="email" name="customeremail" id="customeremail" value="<?php echo $recordslist->customer_email;?>" required>                                            
                                        </div>
										<div class="form-group">
                                            <label>Customer Address</label>
                                            <textarea class="form-control" placeholder="Enter customer address" type="text" name="customeraddress" id="customeraddress"><?php echo $recordslist->customer_address;?></textarea>                                            
                                        </div>
										<div class="form-group">
                                            <label>Payment Term</label>
                                            <input class="form-control" placeholder="Enter Payment term" type="text" name="payment_term" id="payment_term" value="<?php echo $recordslist->payment_term;?>">                                            
                                        </div>
										
										<input type="hidden" name="cousttid" value="<?php echo $recordslist->customer_id;?>">

									<?php } ?>									
											
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