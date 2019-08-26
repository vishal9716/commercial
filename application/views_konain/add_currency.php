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
                    <h1 class="page-header">Add Currency</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Currency add Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-currency" method="post" action="add_currency" enctype="multipart/form-data">
                                        
									<?php if (isset($error_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $error_message; ?>
									</div>
									<?php } ?>
										<div class="form-group">
                                            <label>Currency Code</label>
                                            <input class="form-control" placeholder="Enter currency code" type="text" name="currencycode" id="currencycode" required>                                            
                                        </div>
										<div class="form-group">
                                            <label>Currency Symbol</label>
                                            <input class="form-control" placeholder="Enter currency symbol" type="text" name="currencysymbol" id="currencysymbol" required>                                            
                                        </div>
										<div class="form-group">
                                            <label>Country Name</label>
                                            <select class="form-control" name="countryname" id="countryname" required>                                                
												<?php
												//print_r($userdata);
												$i=0;
												foreach($countrydata as $recordslist) {													
												?>
												<option value="<?php echo $recordslist->country_id;?>"><?php echo $recordslist->country_name;?></option>
												<?php } ?>
                                            </select>                                            
                                        </div>
										<div class="form-group">
                                            <label>Currency Value</label>
                                            <input class="form-control" placeholder="Enter currency value" type="text" name="currencyvalue" id="currencyvalue" required>                                            
                                        </div>
                                        		
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='/commercial/currency/index'">Cancel</button>
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