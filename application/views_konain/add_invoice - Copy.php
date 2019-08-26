 <?php $this->load->view('common/top');?>

 <SCRIPT language="javascript">
		function addRow(tableID) {

			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;			
			var row = table.insertRow(rowCount);
			var colCount = table.rows[0].cells.length;			
			 //document.getElementById("quantity").setAttribute('value',rowCount); 
			if(rowCount==1)
			{
				var activity_quanty = '<INPUT class="form-control" type="text" name="quantity[]" id="quantity0" placeholder="Enter quantity0"/>';
					document.getElementById("int_qnty").innerHTML=activity_quanty;
					var activity_rate = '<INPUT class="form-control" type="text" name="rate[]" id="rate0" placeholder="Enter rate"/>';
					document.getElementById("int_rate").innerHTML=activity_rate;
					var activity_total = '<INPUT class="form-control" type="text" name="total[]" id="total0" placeholder="Enter total" onfocus="activitytotal(0)"/>';
					document.getElementById("int_total").innerHTML=activity_total;
			}
			else
			{
				for(var k=0; k<=rowCount; k++)
				{	
					var activity_quanty = '<INPUT class="form-control" type="text" name="quantity[]" id="quantity'+k+'" placeholder="Enter quantity'+k+'"/>';
					document.getElementById("int_qnty").innerHTML=activity_quanty;
					var activity_rate = '<INPUT class="form-control" type="text" name="rate[]" id="rate'+k+'" placeholder="Enter rate"/>';
					document.getElementById("int_rate").innerHTML=activity_rate;
					var activity_total = '<INPUT class="form-control" type="text" name="total[]" id="total'+k+'" placeholder="Enter total" onfocus="activitytotal('+k+')"/>';
					document.getElementById("int_total").innerHTML=activity_total;
				}
			}
			
			 
			 
			for(var i=0; i<colCount; i++) {

				var newcell	= row.insertCell(i);

				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
							newcell.childNodes[0].value = "";
							break;
					case "checkbox":
							newcell.childNodes[0].checked = false;
							break;
					case "select-one":
							newcell.childNodes[0].selectedIndex = 0;
							break;
				}
			}
		}

		function deleteRow(tableID) {
			
			try {
			var table = document.getElementById(tableID);			
			var rowCount = table.rows.length;
			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					if(rowCount <= 1) {
						alert("Cannot delete all the rows.");
						break;
					}
					table.deleteRow(i);
					rowCount--;
					i--;
				}


			}
			}catch(e) {
				alert(e);				
			}
		}


function customerdetail(vals)
{
	//alert(vals);
	if (vals != '') {
		var po_no = document.getElementById("po_no").value;
		var po_date = document.getElementById("po_date").value;
		var invoice_no = document.getElementById("invoice_no").value;
		var invoice_date = document.getElementById("invoice_date").value;
		var unit = document.getElementById("unit").value;
		var unit_address = document.getElementById("unit_address").value;		
		  window.location.href = "/commercial/invoice/add_invoice?cid="+vals+"&pono="+po_no+"&po_date="+po_date+"&invoice_no="+invoice_no+"&invoice_date="+invoice_date+"&unit="+unit+"&unit_address="+unit_address;
	}
	
}

function activitytotal(vals)
{
	alert(vals);
	for(var j=0; j<vals; j++)
	{
		
		var quantity = document.getElementById("quantity2").value;
		alert(quantity);
		
	}
	
	
	//var quantity = document.getElementById("quantity").value;
	//alert(quantity);
	//var rate = document.getElementsByName("rate").value;
	//var acttotal;
		//acttotal = (quantity * rate);
		//alert(acttotal);
	
}


	</SCRIPT>
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
                    <h1 class="page-header">Create Invoice</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Invoice add Form
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
                                            <input class="form-control" type="text" name="po_no" id="po_no" value="<?php if(isset($po_no)) { echo $po_no; } ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>PO Date</label>
                                            <input class="form-control" type="date" name="po_date" id="po_date" value="<?php if(isset($po_date)) { echo $po_date; } ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Invoice #</label>
                                            <input class="form-control" type="text" name="invoice_no" id="invoice_no" value="<?php if(isset($invoice_no)) { echo $invoice_no; } ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Invoice Date</label>
                                            <input class="form-control" type="date" name="invoice_date" id="invoice_date" value="<?php if(isset($invoice_date)) { echo $invoice_date; } ?>" required>
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
                                            <label>Unit Address</label>                                            
											<textarea class="form-control" placeholder="Enter unit Address" name="unit_address" id="unit_address"><?php if(isset($unit_address)) { echo $unit_address; } ?></textarea>
                                        </div>
										
										<div class="form-group">
                                            <label>Customer Name</label>&nbsp;<!-- <a href="">+Add Customer</a> -->
                                            <select class="form-control" name="customer_name" id="customer_name" required onchange="javascript:customerdetail(this.value);"> 
											<?php												
											foreach($customerdata as $recordscustlist) {													
												?>
												<option value="<?php echo $recordscustlist->customer_id;?>"><?php echo $recordscustlist->customer_name;?></option>
											<?php } ?>												
                                            </select>                                            
                                        </div>
																			
                                        <div class="form-group">
                                            <label>Customer Email</label>
                                              <input class="form-control" type="text" name="customer_email" value="<?php if(isset($customeremail)) { echo $customeremail; } ?>" id="customer_email" required placeholder="Enter Customer Email">
                                        </div>
										<div class="form-group">
                                            <label>Customer Address</label>                                            
											<textarea class="form-control" placeholder="Enter customer address" name="customer_address" id="customer_address"><?php if(isset($customer_address)) { echo $customer_address; }?></textarea>
                                        </div>
										
										 <div class="form-group">
                                            <label>Consignee's Address </label>
                                            <textarea class="form-control" placeholder="Enter consignee address" name="consignee_address" id="consignee_address"></textarea>
                                        </div>
											
										 <div class="form-group">                                            
                                            <label>Title Name</label>
                                            <select class="form-control" name="title_name" id="title_name" required>                                                
												<?php																					
												foreach($titledata as $recordstitlelist) {													
												?>
												<option value="<?php echo $recordstitlelist->title_id;?>"><?php echo $recordstitlelist->title_name;?></option>
											<?php } ?>                                                
                                            </select>
											
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category" id="category" required>                                                
												<?php																					
												foreach($categorydata as $recordscatlist) {													
												?>
												<option value="<?php echo $recordscatlist->category_id;?>"><?php echo $recordscatlist->category_name;?></option>
											<?php } ?>                                                
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>JTN #</label>
											<input class="form-control" type="text" name="jtn_no" id="jtn_no" placeholder="Enter JTN #" required>                                     
                                        </div>
										<div class="form-group">
                                            <label>Currency</label>
                                            <select class="form-control" name="currency" id="currency" required> 
												<?php																					
												foreach($currencydata as $recordslist) {													
												?>
												<option value="<?php echo $recordslist->currency_id;?>"><?php echo $recordslist->currency_code;?></option>
											<?php } ?>												
                                            </select>
                                        </div>
										
										
										<div class="form-group" style="border:1px solid; color:#555;">
                                        <!-- add rows -->											
										<INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />
										<INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />

										
										
										
										<TABLE id="dataTable" width="100%" border="0">
											<TR>
												<TD><INPUT type="checkbox" name="chk"/></TD>
												<TD><div class="form-group"><label>Activity</label><br/>
												<INPUT class="form-control" type="text" name="activity[]" id="activity" placeholder="Enter activity"/></div></TD>
												<TD><div class="form-group"><label>Unit of measure</label><br/>
												<INPUT class="form-control" type="text" name="unit_measure[]" id="unit_measure" placeholder="Enter unit of measure"/></div></TD>
												<TD><div class="form-group"><label>Quantity</label><br/>
												<span id="int_qnty"><INPUT class="form-control" type="text" name="quantity[]" id="quantity" placeholder="Enter quantity"/></span></div></TD>
												<TD><div class="form-group"><label>Rate</label><br/>
												<span id="int_rate"><INPUT class="form-control" type="text" name="rate[]" id="rate" placeholder="Enter rate"/></span></div></TD>
												<TD><div class="form-group"><label>Total</label><br/>
												<span id="int_total"><INPUT class="form-control" type="text" name="total[]" id="total" placeholder="Enter total" onfocus="activitytotal()"/></span></div></TD>							
											</TR>
											</TABLE>																						
										<!-- end add rows -->										
                                        </div>
										<div class="form-group">
                                            <label>Final Total</label>
                                            <input class="form-control" type="text" name="final_total" id="final_total" placeholder="Enter final total" required>
                                        </div>		
																			
																	
											
                                        <button type="submit" name="submit" class="btn btn-default">Request JTN</button>
                                        <button type="reset" name="cancel" class="btn btn-default" onclick="location='<?php echo base_url(); ?>jtn/index'">Cancel</button>
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
				document.getElementById("unit").value='<?php echo $unit;?>';
				document.getElementById("clientname").value='<?php echo $customer_id;?>';				
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