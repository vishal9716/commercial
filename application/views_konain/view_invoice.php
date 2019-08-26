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
                    <h1 class="page-header">View Invoice</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Invoice view Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-invoice" method="post" action="add_invoice" enctype="multipart/form-data">
                                        
									<?php if (isset($error_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $error_message; ?>
									</div>
									<?php } 
									
									?>
										<div class="form-group">
                                            <label>PO #</label>
                                            <span class="form-control"><?php echo $po_no; ?></span>
                                        </div>
										<div class="form-group">
                                            <label>PO Date</label>
                                            <span class="form-control"><?php echo $po_date; ?></span> 
                                        </div>
										<div class="form-group">
                                            <label>Invoice #</label>
                                            <span class="form-control"><?php echo $invoice_no; ?></span> 
                                        </div>
										<div class="form-group">
                                            <label>Invoice Date</label>
                                            <span class="form-control"><?php echo $invoice_date; ?></span> 
                                        </div>
										<div class="form-group">
                                            <label>Unit</label>
                                            <span class="form-control"><?php echo $unit_name; ?></span>
											
                                        </div>									
										<div class="form-group">
                                            <label>Unit Address</label>                                            
											<span class="form-control"><?php echo $unit_address; ?></span>
											
                                        </div>
										
										<div class="form-group">
                                            <label>Customer Name</label>&nbsp;<!-- <a href="">+Add Customer</a> -->
                                            <span class="form-control"><?php echo $client_name; ?></span>
											                                           
                                        </div>
																			
                                        <div class="form-group">
                                            <label>Customer Email</label>
												<span class="form-control"><?php echo $client_email; ?></span>                                             
                                        </div>
										<div class="form-group">
                                            <label>Customer Address</label> 
												<span class="form-control"><?php echo $customer_address; ?></span>											
                                        </div>
										
										 <div class="form-group">
                                            <label>Consignee's Address </label>
                                            <span class="form-control"><?php echo $consignee_address; ?></span>											
                                        </div>
											
										 <div class="form-group">                                            
                                            <label>Title Name</label>
                                            <span class="form-control"><?php echo $title_name; ?></span>
											
											
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
											<span class="form-control"><?php echo $category; ?></span>                                            
                                        </div>
										<div class="form-group">
                                            <label>JTN #</label>
											<span class="form-control"><?php echo $jtn_no; ?></span>
                                        </div>
										<div class="form-group">
                                            <label>Currency</label>
											<span class="form-control"><?php echo $currency_no; ?></span>                                            
                                        </div>
																				
										<div class="form-group" style="border:1px solid; color:#555; padding:5px;">
                                        <!-- add rows -->											
													
											
											<table id="myTable" width="100%" border="0" cellspacing="2" cellpadding="3">
											<tr>	
												<td><strong>Activity</strong></td>
												<td><strong>Unit of measure</strong></td>
												<td><strong>Quantity</strong></td>
												<td><strong>Rate</strong></td>
												<td><strong>Total</strong></td>
												<td>&nbsp;</td>
											</tr>
											<?php //echo "<pre>"; print_r($invoiceactivitydata);
												//echo "ACTNAme->".$invoiceactivitydata[0]['activity_name'];
											?>
											<?php 
											for($i=0; $i<count($invoiceactivitydata); $i++)
											{												
											?>
											<tr>
											  <td>
											  
											  <input class="form-control" type="text" name="activity" id="activity" value="<?php echo $invoiceactivitydata[$i]['activity_name'];?>"/></td>
											  <td><input class="form-control" type="text" name="unit_measure" id="unit_measure" value="<?php echo $invoiceactivitydata[$i]['unit_measure'];?>"/></td>
											  <td><input class="form-control" type="text" name="quantity" id="quantity" value="<?php echo $invoiceactivitydata[$i]['quantity'];?>"/></td>
											  <td><input class="form-control" type="text" name="rate" id="rate" value="<?php echo $invoiceactivitydata[$i]['rates'];?>"/></td>
											  <td><input class="form-control" type="text" name="total" id="total" value="<?php echo $invoiceactivitydata[$i]['each_total'];?>"/></td>
											  <td>&nbsp;</td>
											</tr>
											<?php } ?>
											</table>									
																															
										<!-- end add rows -->										
                                        </div>
										<div class="form-group">
                                            <label>Final Total</label>
											<span class="form-control"><?php echo $total_price; ?></span>                                             
                                        </div>																	
										                                        
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='<?php echo base_url(); ?>invoice/index'">Cancel</button>
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
