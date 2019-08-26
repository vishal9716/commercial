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
                    <h1 class="page-header">View JTN Issue</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            JTN issue view Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-jtn" method="post" action="edit_jtn" enctype="multipart/form-data">
                                        
									<?php if (isset($error_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $error_message; ?>
									</div>
									<?php } 
										foreach($jtnrecord as $recordslist) {
									?>
										<div class="form-group">
                                            <label>Client Name</label>
                                            <select class="form-control" name="clientname" id="clientname" required> 
											<?php	
												
											foreach($customerdata as $recordslist2) {													
												?>
												<option value="<?php echo $recordslist2->customer_id;?>"><?php echo $recordslist2->customer_name;?></option>
											<?php } ?>									
												
                                            </select>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                              <select class="form-control" name="type" id="type" required>                                                
												<option value="Book">Book</option>
                                                <option value="Magazine">Magazine</option>
                                                <option value="epubs">epubs</option>
                                                <option value="Journal">Journal</option>                                                
                                            </select> 
                                        </div>
										<div class="form-group">
                                            <label>JTN issue Date</label>
                                            <input class="form-control" type="text" name="jtn_issue_date" value="<?php echo date("d/m/Y", strtotime($recordslist->jtn_issue_date));?>" id="jtn_issue_date" required >
                                        </div>
										 <div class="form-group">
                                            <label>Project/Job Name</label>
                                            <input class="form-control" type="text" name="jobname" id="jobname" value="<?php echo $recordslist->job_name;?>" placeholder="Enter job name" required>
                                        </div>
										 <div class="form-group">
                                            <label>Job received Date</label>
                                            <input class="form-control" type="text" name="job_rec_date" id="job_rec_date" value="<?php echo date("d/m/Y", strtotime($recordslist->job_receive_date));?>"  required>
                                        </div>
                                        <div class="form-group">
                                            <label>Job due Date</label>
                                            <input class="form-control" type="text" name="job_due_date" id="job_due_date" value="<?php echo date("d/m/Y", strtotime($recordslist->job_due_date));?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Payment Terms</label>
											<input class="form-control" type="text" name="payment_term" id="payment_term" value="<?php echo $recordslist->payment_term;?>" placeholder="Enter payment_term" required>
                                            
                                        </div>
										<div class="form-group">
                                            <label>Unit</label>
                                            <select class="form-control" name="unit" id="unit" required>                                                
												<option value="Noida">Noida</option>
                                                <option value="Chennai">Chennai</option>
                                                <option value="Gangtok">Gangtok</option>
                                                <option value="Mauritius">Mauritius</option>                                                
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Total Pages</label>
                                            <input class="form-control" type="text" name="total_pages" id="total_pages" value="<?php echo $recordslist->total_pages;?>" placeholder="Enter total pages" required>
                                        </div>
										
										<div class="form-group">
                                            <label>Project Manager</label>
                                            <input class="form-control" type="text" name="project_manager" id="project_manager" value="<?php echo $recordslist->project_manager;?>" placeholder="Enter project manager" required>
                                        </div>
										
										<div class="form-group">
                                            <label>Currency</label>
                                            <select class="form-control" name="currency" id="currency" required> 
												<?php																					
											foreach($currencydata as $recordslistcur) {													
												?>
												<option value="<?php echo $recordslistcur->currency_id;?>"><?php echo $recordslistcur->currency_code;?></option>
											<?php } ?>												
                                            </select>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Upload Documents</label>
                                            <input type="file" name="jtn_document" id="jtn_document" multiple>
											<br />
											<label>Download / View Documents</label>
											<br />
											<ul>
											<?php
											if(isset($documentdata))
											{
												foreach($documentdata as $docslist) {	
													
												$dpath = $docslist->document_path.$docslist->document_name;
											?>
											<li><a href="<?php echo base_url(); ?>jtn/download?doc=<?php echo $docslist->document_id;?>"><?php echo $docslist->document_name;?></a> <br /></li>
										<?php } 
											} else { ?>
											No Record found <br />
											<?php } ?>
										</ul>
                                        </div>								
																			
											
                                        <!-- <button type="submit" name="submit" class="btn btn-default">Request JTN</button>  -->
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='<?php echo base_url(); ?>jtn/index'">Back to list</button>
                                    </form>
									
			<script>
				document.getElementById("clientname").value='<?php echo $recordslist->customer_id;?>';
				document.getElementById("type").value='<?php echo $recordslist->type;?>';
				document.getElementById("unit").value='<?php echo $recordslist->unit;?>';
				document.getElementById("currency").value='<?php echo $recordslist->currencys;?>';
				
			</script>
						<?php } ?>
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
