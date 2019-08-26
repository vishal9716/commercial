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
                    <h1 class="page-header">Add Account Receivable</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Account Receivable add Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-receivable" method="post" action="add_account_receivable" enctype="multipart/form-data">
                                        
									<?php if (isset($error_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $error_message; ?>
									</div>
									<?php } 
									
									?>
										<div class="form-group">
                                            <label>Segment</label>
                                            <input class="form-control" type="text" name="segment" id="segment" placeholder="Enter Segment" value="<?php if(isset($segment)) { echo $segment; } ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Date</label>
                                            <input class="form-control" type="text" name="receivable_date" id="receivable_date" value="<?php echo date("d-m-Y"); ?>">
                                        </div>
										<div class="form-group">
                                            <label>Customer Name</label>                                         	
											<select class="form-control" name="customer_name" id="customer_name" required> 
											<?php												
											foreach($customerdata as $recordscustlist) {													
												?>
											<option value="<?php echo $recordscustlist->customer_id; ?>"><?php echo $recordscustlist->customer_name;?> </option>
											<?php } ?>												
                                            </select> 
											
                                        </div>
										<div class="form-group">
                                            <label>Overdue for</label>                                         					
											<select class="form-control" name="overdue_for" id="overdue_for" required>                                                
												<option value="Noida">Noida</option>
                                                <option value="Chennai">Chennai</option>
                                                <option value="Gangtok">Gangtok</option>
                                                <option value="Mauritius">Mauritius</option>                                                
                                            </select>											
											
                                        </div>
										<div class="form-group">
                                            <label>Total Billing</label>
                                            <input class="form-control" type="text" name="total_billing" id="total_billing" placeholder="Enter Total Billing" value="<?php if(isset($total_billing)) { echo $total_billing; } ?>" required>
                                        </div>									
										<div class="form-group">
                                            <label>Total Overdue</label>                                            
											<input class="form-control" type="text" placeholder="Enter Total Overdue" name="total_overdue" id="total_overdue" value="<?php if(isset($total_overdue)) { echo $total_overdue; } ?>">
                                        </div>
										
										<div class="form-group">
                                            <label>Not Due</label>
                                            <input class="form-control" type="text" placeholder="Enter not due" name="not_due" id="not_due" value="<?php if(isset($not_due)) { echo $not_due; } ?>">                                            
                                        </div>
																			
                                        <div class="form-group">
                                            <label>Taxes</label>
                                              <input class="form-control" type="text" name="taxes" value="<?php if(isset($taxes)) { echo $taxes; } ?>" id="taxes" required placeholder="Enter taxes">
                                        </div>
										<div class="form-group">
                                            <label>Freight charges</label>                                            
											<input class="form-control" type="text" name="freight_charges" value="<?php if(isset($freight_charges)) { echo $freight_charges; } ?>" id="freight_charges" required placeholder="Enter Freight Charges">
                                        </div>
										
										 <div class="form-group">
                                            <label>Grand Total </label>
                                            <input type="text" class="form-control" placeholder="Enter Grand Total" value="<?php if(isset($freight_charges)) { echo $freight_charges; } ?>" name="grand_total" id="grand_total">
                                        </div>
											
										 <div class="form-group">                                            
                                            <label>Remarks</label>
                                            <textarea class="form-control" placeholder="Enter Remarks" name="remarks" id="remarks" cols="30" rows="5"><?php if(isset($remarks)) { echo $remarks; } ?></textarea>
											
                                        </div>                       
															
											
                                        <button type="submit" name="submit" class="btn btn-default">Create Report</button>										
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='<?php echo base_url(); ?>account_receivable/index'">Cancel</button>
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
									
			<script>		 		
				document.getElementById("customer_name").value='<?php echo $customernames;?>';				
			</script>					
									
            </div>
            <!-- /.row -->
			
			<!-- BODY section -->
			
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('common/footer');?>