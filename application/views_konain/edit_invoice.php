 <?php $this->load->view('common/top');?>

<script>
function delRow(currElement) {
     var parentRowIndex = currElement.parentNode.parentNode.rowIndex;
     document.getElementById("myTable").deleteRow(parentRowIndex);
}

var countval1 = 0;
var countval2 = 0;
function insRow(id, invcount) {	
 countval1 = parseInt(invcount);	
 countval2 = parseInt(countval2) + 1;
 countval = parseInt(countval1) + (parseInt(countval2) -1);
//alert(countval);
 //alert(countval2);
 var k=countval;
 	
// alert(k);
    var filas = document.getElementById("myTable").rows.length;
    var x = document.getElementById(id).insertRow(filas);
    var y = x.insertCell(0);
	var y1 = x.insertCell(1);
	var y2 = x.insertCell(2);
	var y3 = x.insertCell(3);
	var y4 = x.insertCell(4);
    var z = x.insertCell(5);
	
    y.innerHTML = '<input class="form-control" type="text" name="activity[]" id="activity'+k+'">';
	y1.innerHTML = '<input class="form-control" type="text" name="unit_measure[]" id="unit_measure'+k+'">';
	y2.innerHTML = '<input class="form-control" type="text" name="quantity[]" id="quantity'+k+'">';
	y3.innerHTML = '<input class="form-control" type="text" name="rate[]" id="rate'+k+'">';
	y4.innerHTML = '<input class="form-control" type="text" name="total[]" id="total'+k+'" onfocus="activitytotal('+k+')">';	
    z.innerHTML ='';
	
	document.getElementById("ftotal").value = k; 
}

function activitytotal(vals)
{	
	var k= vals;
	var finaltotal;
	var finaltotal_0;
	var finaltotal_1 = 0;
	
	var quantity = document.getElementById("quantity"+k).value;
	var rate = document.getElementById("rate"+k).value;
		
		//alert(quantity);
		//alert(rate);
		//exit;
	var acttotal;
	acttotal = (quantity * rate);			
	document.getElementById("total"+k).value = acttotal;			
	
}

function finaltotal(invcounts)
{
	var finaltotalval=0;
	var rowcountval = 0;
	//var finaltotal_0 = Number(document.getElementById("total").value);
	var rowcountval2 = document.getElementById("ftotal").value;
	//alert(invcounts);
	//alert(rowcountval2);
	//exit;
	if(rowcountval2 != '')
	{
		rowcountval = parseInt(rowcountval2)+1;
	}
	else
	{
		rowcountval = invcounts;
	}
	//alert(rowcountval2);
	//alert(rowcountval);
	//exit;
	 for(var i=0; i<rowcountval; i++)
	 {
		if(document.getElementById("total"+i).value != '')
		{
			//alert(i);
			finaltotalval = Number(finaltotalval) + Number(document.getElementById("total"+i).value);
			//alert(finaltotalval);
		}
		//alert(i);
	 }
	 
	 //alert(finaltotalval);
	
	var totalfinalvalue = finaltotalval;
	//alert(totalfinalvalue);
	//exit;
	document.getElementById("final_total").value = totalfinalvalue;
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

function cleanconter()
{
	document.getElementById("ftotal").value = '';
	document.getElementById("final_total").value = '';
	
	
}
</script>

</head>

<body onload="cleanconter();">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Invoice</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Invoice edit Form
							</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="frm-invoice" method="post" action="edit_invoice" enctype="multipart/form-data">
                                        
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
                                            <select class="form-control" name="customer_name" id="customer_name" required onchange="javascript:customerdetail33(this.value);"> 
											<?php												
											foreach($customerdata as $recordscustlist) {													
												?>
											<option value="<?php echo $recordscustlist->customer_id; ?>"><?php echo $recordscustlist->customer_name;?> </option>
											<?php } ?>												
                                            </select>                                            
                                        </div>
																			
                                        <div class="form-group">
                                            <label>Customer Email</label>
                                              <input class="form-control" type="text" name="customer_email" value="<?php if(isset($client_email)) { echo $client_email; } ?>" id="customer_email" required placeholder="Enter Customer Email">
                                        </div>
										<div class="form-group">
                                            <label>Customer Address</label>                                            
											<textarea class="form-control" placeholder="Enter customer address" name="customer_address" id="customer_address"><?php if(isset($customer_address)) { echo $customer_address; }?></textarea>
                                        </div>
										
										 <div class="form-group">
                                            <label>Consignee's Address </label>
                                            <textarea class="form-control" placeholder="Enter consignee address" name="consignee_address" id="consignee_address"><?php echo $consignee_address;?></textarea>
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
											<input class="form-control" type="text" name="jtn_no" id="jtn_no" value="<?php echo $jtn_no;?>" placeholder="Enter JTN #" required>                                     
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
										
										
										<div class="form-group" style="border:1px solid; color:#555; padding:5px;">
                                        <!-- add rows -->
										<?php
											$actcount = count($invoiceactivitydata);
										?>
										<input type="button" value="Add Row" onclick="insRow('myTable','<?php echo $actcount;?>')" />				
											
											<table id="myTable" width="100%" border="0" cellspacing="2" cellpadding="3">
											<tr>	
												<td><strong>Activity</strong></td>
												<td><strong>Unit of measure</strong></td>
												<td><strong>Quantity</strong></td>
												<td><strong>Rate</strong></td>
												<td><strong>Total</strong></td>
												<td>&nbsp;</td>
											</tr>
											<?php 
											
											for($i=0; $i<count($invoiceactivitydata); $i++)
											{												
											?>
											<tr>
											  <td><input class="form-control" type="text" name="activity[]" id="activity<?php echo $i; ?>" value="<?php echo $invoiceactivitydata[$i]['activity_name'];?>" placeholder="Enter activity"/></td>
											  <td><input class="form-control" type="text" name="unit_measure[]" id="unit_measure<?php echo $i; ?>" value="<?php echo $invoiceactivitydata[$i]['unit_measure'];?>" placeholder="Enter unit of measure"/></td>
											  <td><input class="form-control" type="text" name="quantity[]" id="quantity<?php echo $i; ?>" value="<?php echo $invoiceactivitydata[$i]['quantity'];?>" placeholder="Enter quantity"/></td>
											  <td><input class="form-control" type="text" name="rate[]" id="rate<?php echo $i; ?>" value="<?php echo $invoiceactivitydata[$i]['rates'];?>" placeholder="Enter rate"/></td>
											  <td><input class="form-control" type="text" name="total[]" id="total<?php echo $i; ?>" value="<?php echo $invoiceactivitydata[$i]['each_total'];?>" placeholder="Enter total" onfocus="activitytotal(<?php echo $i; ?>)"/></td>
											  <td></td>
											</tr>
										<?php } ?>
											</table>									
																															
										<!-- end add rows -->										
                                        </div>
										<div class="form-group">
                                            <label>Final Total</label><input type="hidden" name="ftol" id="ftotal" value="">
                                            <input class="form-control" type="text" name="final_total" id="final_total" onfocus="finaltotal('<?php echo $actcount;?>');" value="<?php echo $total_price;?>">
											<input type="hidden" name="hid_invoice_id" id="hid_invoice_id" value="<?php echo $invoicing_id; ?>">
                                        </div>	

										<div class="form-group">
                                            <label>Approval</label>
                                            <select class="form-control" name="status" id="status" required>                                                
												<option value="Inprocess">Inprocess</option>
                                                <option value="Approved">Approved</option>
                                                <option value="Not Approved">Not Approved</option>
                                                <option value="Hold">Hold</option>                                                
                                            </select>
                                        </div>
																	
											
                                        <button type="submit" name="submit" class="btn btn-default">Edit for Approval</button>
										<!--<button type="button" name="mail_operation" class="btn btn-default" onclick="location='<?php echo base_url(); ?>invoice/notifyoperation'">Send mail to Operation</button> -->
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
									
			<script>		 		
				document.getElementById("customer_name").value='<?php echo $client_name;?>';
				document.getElementById("currency").value='<?php echo $currency_no;?>';
				document.getElementById("category").value='<?php echo $category;?>';
				document.getElementById("title_name").value='<?php echo $title_name;?>';	
				document.getElementById("status").value='<?php echo $status;?>';
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