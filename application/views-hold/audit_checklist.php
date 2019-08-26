       <?php echo $this->load->view("common/top"); ?>
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 26px; margin: 10px 0 20px;">PURCHASE SOP AUDIT CHECKLIST - <?php echo $_GET['sr_no'];?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
				<div class="col-md-6">
            <div class="form-group">
                <label for="">Date</label>
                <input class="form-control" type="date" placeholder="Enter Date" id="pr_chk_date" name="pr_chk_date">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
		
            </div>
			<div class="row">
			<div class="col-md-6">
            <div class="form-group">
                                          <label>To</label>
                                            <select class="form-control" name="to" id="to" required>                                                			   <option value="VP">VP</option>
                                              <option value="ED">ED</option>                          
                                            </select>
                                        </div>
          </div> 
				<div class="col-md-6">
            <div class="form-group">
                                            <label>From</label>
                                            <select class="form-control" name="from" id="from" required>                                                			   <option value="Mohan Kumar Bansal">Mohan Kumar Bansal</option>
                                              <option value="Shipra Garg">Shipra Garg</option>                          
                                            </select>
                                        </div>
          </div> 
             
                <!-- /.col-lg-12 -->
            </div>
				<div class="row">
				<div class="col-md-4">
            <div class="form-group">
                <label for="">PR Date:</label>
              <input class="form-control" type="date" placeholder="Enter Date" id="pr_date" name="pr_date">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
				<div class="col-md-4">
            <div class="form-group">
                <label for="">Item/s:</label>
              <input class="form-control"  placeholder="Enter Item/s" name="item">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
             
					<div class="col-md-4">
           <div class="form-group">
                                            <label>Unit</label>
                                            <select class="form-control" name="unit" id="unit" required>                                                
												<option value="Noida">Noida</option>
                                                <option value="Chennai">Chennai</option>
                                                <option value="Gangtok">Gangtok</option>
                                                <option value="Mauritius">Mauritius</option>                                                
                                            </select>
                                        </div>
          </div> 
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                   <!-- <div class="panel panel-default">-->
                      <!--  <div class="panel-heading">
                            PR No: 
                        </div> -->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Points</th>
                                        <th>OK</th>
                                        <th>Not OK</th>
  
                                    </tr>
                                </thead>								
                                <tbody>
					
                                    <tr class="even gradeC">
                                        <td>1.</td>
                                        <td>Vendor Selection</td>
                                        <td class="vendor_selection" contenteditable="true"></td>
                                        <td class="vendor_selection" contenteditable="true"></td>
                                    </tr>
									 <tr class="even gradeC">
                                        <td>2.</td>
                                        <td>Brand Selection</td>
                                        <td class="brand_selection" contenteditable="true"></td>
                                        <td class="brand_selection" contenteditable="true"></td>
                                     </tr>
									<tr class="even gradeC">
                                        <td>3.</td>
                                        <td>Three Best Bids</td>
                                        <td class="bids" contenteditable="true"></td>
                                        <td class="bids" contenteditable="true"></td>								
                                    </tr>
									<tr class="even gradeC">
                                        <td>4.</td>
                                        <td>Negotiation Rounds</td>
                                        <td class="negotiation_rounds" contenteditable="true"></td>
                                        <td class="negotiation_rounds" contenteditable="true"></td>
                                    </tr>
									<tr class="even gradeC">
                                        <td>5.</td>
                                        <td>SLA Agreement</td>
                                         <td class="sla_agreement" contenteditable="true"></td>
                                         <td class="sla_agreement" contenteditable="true"></td>
										
                                    </tr>
									<tr class="even gradeC">
                                        <td>6.</td>
                                        <td>Penalty Clause Agreement for Late Delivery</td>
                                        <td class="agreement_late_delivery" contenteditable="true"></td>
                                        <td class="agreement_late_delivery" contenteditable="true"></td>
								   </tr>
									<tr class="even gradeC">
                                        <td>7.</td>
                                        <td>Payment Terms Agreement</td>
                                        <td class="payment_agreement" contenteditable="true"></td>
                                        <td class="payment_agreement" contenteditable="true"></td>
								  </tr>
									<tr class="even gradeC">
                                        <td>8.</td>
                                        <td>After Sales Service Agreement</td>
                                        <td class="service_agreement" contenteditable="true"></td>
                                        <td class="service_agreement" contenteditable="true"></td>
                                    </tr>
									<tr class="even gradeC">
                                        <td>9.</td>
                                        <td>AMC Negotiation</td>
                                        <td class="amc_negotiation" contenteditable="true"></td>
                                        <td class="amc_negotiation" contenteditable="true"></td>
                                    </tr>
									<tr class="even gradeC">
                                        <td>10.</td>
                                        <td>Delivery Term Agreement</td>
                                        <td class="delivery_agreement" contenteditable="true"></td>
                                        <td class="delivery_agreement" contenteditable="true"></td>	
                                    </tr>
									<tr class="even gradeC">
                                        <td>11.</td>
                                        <td>Insurance</td>
                                        <td class="insurance" contenteditable="true"></td>
                                        <td class="insurance" contenteditable="true"></td>
									
                                    </tr>
									<tr class="even gradeC">
                                        <td>12.</td>
										<td>Any other Special Point In Consideration.</td>
                                        <td class="special_point" contenteditable="true"></td>
                                        <td class="special_point" contenteditable="true"></td>
									</tr>								
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
					 
					  <div class="panel-body" style="border:1px solid black;">
						<div class="form-group">
  						 <textarea class="form-control" rows="3" id="comment">Remarks</textarea>
						</div>  
					 </div> <br/>
					  <div class="panel-body" style="border:1px solid black;">
						 <div class="form-group">
  						 <textarea class="form-control" rows="3" id="comment">Approval/Remarks</textarea>
						</div>
					 </div>
					 
                    <!--</div>-->
                    <!-- /.panel -->
                </div>
									
									
									
            </div>
            <!-- /.row -->
			  <div class="row">
	 <div class="col-md-2">
   <button type="submit" class="btn btn-primary btn-flat pull-left" onclick="add_audit_checklist();" id="submit">Submit</button>
				</div>
			<!-- BODY section -->
			
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<script>
	// adding AUDIT CHECKLIST data
		  function add_audit_checklist() {
                  //  alert("in--");
			        var sr_no = "<?php echo $_GET['sr_no'];?>";
                    var to = $('#to').val();
			  		var from = $('#from').val();
                    var pr_chk_date = $('#pr_chk_date').val();
			  		var pr_date = $('#pr_date').val();
			        var unit = $('#unit').val();
			        var item =$('#item').val();
			        var vendor_selection = [];				
			        var brand_selection = [];
			        var bids = [];				
			        var negotiation_rounds = [];
					var sla_agreement = [];				
			        var agreement_late_delivery = [];
			        var payment_agreement = [];				
			  		var service_agreement = [];				
			        var amc_negotiation = [];
			        var delivery_agreement = [];				
			        var insurance = [];
                    var special_point = [];

                    $('.vendor_selection').each(function () {
                        vendor_selection.push($(this).text());
                    });
			  
			        $('.brand_selection').each(function () {
                        brand_selection.push($(this).text());
                    });
				   $('.bids').each(function () {
                       bids.push($(this).text());
                    });
			  		 $('.negotiation_rounds').each(function () {
                       negotiation_rounds.push($(this).text());
                    });
			   		$('.sla_agreement').each(function () {
                     sla_agreement.push($(this).text());
                    });
			  		 $('.agreement_late_delivery').each(function () {
                     agreement_late_delivery.push($(this).text());
                    });
			  		 $('.payment_agreement').each(function () {
                    payment_agreement.push($(this).text());
                    });
			 		  $('.service_agreement').each(function () {
                    service_agreement.push($(this).text());
                    });
			   		$('.amc_negotiation').each(function () {
                    amc_negotiation.push($(this).text());
                    });
			 	  $('.delivery_agreement').each(function () {
                     delivery_agreement.push($(this).text());
                    });
			      $('.insurance').each(function () {
                     insurance.push($(this).text());
                    });
			    $('.special_point').each(function () {
                     special_point.push($(this).text());
                    });
			  // alert("<?php echo base_url(); ?>index.php/purchase_request/add_audit_checklist/"+sr_no);
			   
                    $.ajax({
                    url: "<?php echo base_url(); ?>index.php/purchase_request/add_audit_checklist/"+sr_no,
                    method: "POST",
 data:{to:to, from:from, pr_chk_date:pr_chk_date, pr_date:pr_date, unit:unit, vendor_selection:vendor_selection, brand_selection:brand_selection, bids:bids, negotiation_rounds:negotiation_rounds, sla_agreement:sla_agreement, agreement_late_delivery:agreement_late_delivery, payment_agreement:payment_agreement, service_agreement:service_agreement, amc_negotiation:amc_negotiation, delivery_agreement:delivery_agreement, insurance:insurance, special_point:special_point},
                        success: function (data) {
                          alert(data);
	window.location.href = "<?php echo base_url(); ?>index.php/purchase_request/audit_checklist_listing";  
                        }
					  });
		  }
		
	</script>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>dist/js/sb-admin-2.js"></script>

</body>

</html>
