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
                    <h1 class="page-header">Edit Currency</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Currency edit Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-country" method="post" action="edit_currency" enctype="multipart/form-data">
                                        
									<?php if (isset($success_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $success_message; ?>
									</div>
									<?php } 
									foreach($currencyrecord as $recordslist) {
									//print_r($userrecord);
									?>
										<div class="form-group">
                                            <label>Currency Code</label>
                                            <input class="form-control" placeholder="Enter currency code" type="text" name="currencycode" id="currencycode" value="<?php echo $recordslist->currency_code;?>">                                            
                                        </div> 
										<div class="form-group">
                                            <label>Currency Symbol</label>
                                            <input class="form-control" placeholder="Enter currency symbol" type="text" name="currencysymbol" id="currencysymbol" value="<?php echo $recordslist->currency_symbols;?>">                                            
                                        </div>
										<div class="form-group">
                                            <label>Country Name</label>
                                            <select class="form-control" name="countryname" id="countryname" required>                                                
												<?php
												//print_r($userdata);
												$i=0;
												foreach($countrydata as $recordslists) {													
												?>
												<option value="<?php echo $recordslists->country_id;?>"><?php echo $recordslists->country_name;?></option>
												<?php } ?>
                                            </select>                                            
                                        </div>
										<div class="form-group">
                                            <label>Currency Value</label>
                                            <input class="form-control" placeholder="Enter currency value" type="text" name="currencyvalue" id="currencyvalue" value="<?php echo $recordslist->currency_value;?>" required>                                            
                                        </div>
										
										<input type="hidden" name="curid" value="<?php echo $recordslist->currency_id;?>">
										
										<script>
										document.getElementById("countryname").value='<?php echo $recordslist->country_id;?>';
										</script>

									<?php } ?>									
											
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