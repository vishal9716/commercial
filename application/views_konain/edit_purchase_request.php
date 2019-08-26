<?php echo $this->load->view("common/top_parul"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  </nav>
        <div id="page-wrapper">
			<br/>
			<!-- start-->
			<?php // echo $_GET['sr_no'];?>
			<form action="" method="post" name="Formulaire">  
								<?php 
								 foreach ($pr_list as $list) {?>
					<!--	here fetch data from database-->
								
       
       <div class="row">
            
           <div class="col-md-6">
              <div class="form-group">
				  <label for="">Indenting Department</label>
 
               <select id="departmentsDropdownSelect" class="form-control select2 select2-hidden-accessible" name="department">
		  
         <option id="departmentsDropdown" value="<?php echo $list['department_name'];?>"><?php echo $list['department_name'];?></option>     
   
	 </select> 	
              </div>
            </div>
		   <input class="form-control" type="hidden" value="<?php echo $list['pr_id'];?>" id="pr_id" name="pr_id">
  
            <div class="col-md-6">
              <div class="form-group" id="">
				  <label for="">S. No.</label>
				  
 			<input class="form-control" disabled value="<?php echo $_GET['sr_no'];?>" id="pr_srno" name="">
	  <!--<textarea class="example-default-value" id="example-textarea" style="width: 400px; height: 50px;">Test</textarea>-->
               </div>
		   </div>
		</div>
		
	   <div class="row">		
          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Issuing date</label>
              <input class="form-control" id="issuing_date" name="issuing_date" value="<?php echo $list['pr_issue_date'];?>">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div>  
		   
		  <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">On Phone/in person</label>
              <input class="form-control" value="<?php echo $list['phone_person'];?>" id="phone_person"  name="phone_person">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div>    
			
        </div>

    			
	    <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Supplier/Make Referred</label>
        <input class="form-control" value="<?php echo $list['supplier_name'];?>" name="supplier_name" id="supplier_name">
                <span id="errMsg" class="text-danger"></span>
              </div>
            </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Action Taken by</label>
              <input class="form-control" value="<?php echo $list['action_taken_by'];?>" id="action_taken_by" name="action_taken_by">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
        </div>

		
				
		 <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Order Placed by</label>
                  <input class="form-control auto ui-autocomplete-input" value="<?php echo $list['order_placed_by'];?>"  name="order_placed_by" id="order_placed_by">

                     </div>
            </div>
			  <div class="col-md-6">
              <div class="form-group">
				  <label for="">PR Recd. On</label>
 			<input class="form-control" value="<?php echo $list['pr_recd_on'];?>" id="pr_reacd_on"  disabled name="pr_reacd_on">			
               </div>
		   </div>
		 <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
             &nbsp;&nbsp;
      <label><input type="radio" name="optradio" value="capex"> Capex &nbsp;&nbsp;
	  <input type="radio" name="optradio" value="opex"> Opex</label>

                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
        </div>
				
	<?php } ?>				
				
								
										<div class="form-group" style="border:1px solid; color:#555; padding:5px;">
                                        <!-- add rows -->											
										<input type="button" value="Add Row" onclick="insRow('myTable')" />				
											
											<table id="myTable" width="100%" border="0" cellspacing="2" cellpadding="3">
											<tr>	
												<td><strong>Description </strong></td>
												<td><strong>Units</strong></td>
												<td><strong>Avg cods</strong></td>
												<td><strong>qty_in_stock</strong></td>
												<td><strong>reorder_point</strong></td>
												<td><strong>reorder_quantity</strong></td>
												<td><strong>qty_req</strong></td>
												<td><strong>pr_supplier_rate</strong></td>
												<!--<td><strong>pr_supplier_supplier</strong></td>-->
												<!--<td><strong>order_placed_rate</strong></td>-->
												<!--<td><strong>order_placed_supplier</strong></td>-->
												<td>&nbsp;</td>
											</tr>
											<?php 
											for($i=0; $i<count($purchase_request_list); $i++)
											{												
											?>
											<tr>
	<td>
   <textarea class="form-control" cols="3" rows="1" name="pr_desp[]" id="pr_desp"><?php echo $purchase_request_list[$i]['pr_description'];?></textarea>
   </td>
 <td>
	<input class="form-control" type="text" name="pr_unit[]" id="pr_unit" value="<?php echo $purchase_request_list[$i]['units'];?>"/>
  </td>
 <td>
 <input class="form-control" type="text" name="pr_avg_cods[]" id="pr_avg_cods" value="<?php echo $purchase_request_list[$i]['avg_cods'];?>"/>
	</td>
	
 <td>
 <input class="form-control" type="text" name="pr_qty_stk[]" id="pr_qty_stk" value="<?php echo $purchase_request_list[$i]['qty_in_stock'];?>"/>
	</td>
												 <td>
 <input class="form-control" type="text" name="pr_reorder_pt[]" id="pr_reorder_pt" value="<?php echo $purchase_request_list[$i]['reorder_point'];?>"/>
	</td>
 <td>
 <input class="form-control" type="text" name="reorder_quantity[]" id="reorder_quantity" value="<?php echo $purchase_request_list[$i]['reorder_quantity'];?>"/>
	</td>
												 <td>
 <input class="form-control" type="text" name="qty_req[]" id="qty_req" value="<?php echo $purchase_request_list[$i]['qty_req'];?>"/>
	</td>
												 <td>
 <input class="form-control" type="text" name="pr_supplier_rate[]" id="" value="<?php echo $purchase_request_list[$i]['pr_supplier_rate'];?>"/>
	</td>
		<!--  <td><input class="form-control" type="button" value="Delete" onclick="delRow(this)"></td> -->
											</tr>
										<?php } ?>
											</table>									
																															
										<!-- end add rows -->										
                                        </div>
				
				   				
	  <div class="row">
      <div class="col-md-3">
	  <input type="button" class="btn btn-info" name="pr_submit" value="Edit Request" onclick="edit_pr();"/>
	  </div>
      </div>
	  <br/>
		 
        </form>
   <!-- end -->
         
			

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
<script>

function edit_pr() {
alert("in");
var issuing_date = $('#issuing_date').val();
var phone_person = $('#phone_person').val();
var supplier_name = $('#supplier_name').val();
var action_taken_by = $('#action_taken_by').val();
var pr_reacd_on = $('#pr_reacd_on').val();
var	order_placed_by= $('#order_placed_by').val();
var sr_no = '1';
var pr_id =$('#pr_id').val();
var pr_description = $('#pr_description').val();
var units = $('#units').val();
var avg_cods =$('#avg_cods').val();
var qty_in_stock = $('#qty_in_stock').val();
var reorder_point =$('#reorder_point').val() ;
var reorder_quantity =$('#reorder_quantity').val() ;
var qty_req = $('#qty_req').val();
var pr_supplier_rate = $('#pr_supplier_rate').val();
var pr_supplier_supplier = $('#pr_supplier_supplier').val();
var order_placed_rate = $('#order_placed_rate').val();
var order_placed_supplier = $('#order_placed_supplier').val();
	
//var selectedOption = $("input:radio[name=optradio]:checked").val()
//alert("<?php echo base_url(); ?>index.php/purchase_request/update_purchase_request/"+pr_srno);
//alert(selectedOption);
			
		//alert(pr_supplier_supplier);
//	alert(pr_supplier_rate);
         $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>index.php/purchase_request/update_pr/"+pr_id,
            data: {issuing_date: issuing_date,phone_person: phone_person, supplier_name:supplier_name, action_taken_by: action_taken_by, pr_reacd_on: pr_reacd_on,order_placed_by:order_placed_by, pr_description:pr_description,units:units,avg_cods:avg_cods,qty_in_stock:qty_in_stock,reorder_point:reorder_point,reorder_quantity:reorder_quantity,qty_req:qty_req,pr_supplier_rate:pr_supplier_rate,pr_supplier_supplier:pr_supplier_supplier,order_placed_rate:order_placed_rate,order_placed_supplier:order_placed_supplier},
            success: function(data) {
		  // alert(data);
		//data = JSON.parse(data);	
		//json_decode($data);
    window.location.href = "<?php echo base_url(); ?>index.php/purchase_request/purchase_request_list";
            $('#departmentModal').modal('hide');
			$('#department_name').val('');
			$('#department_descp').val('');
            },
            error: function(data) {
               
                alert("error");
            }
        });
    }
	
</script>
<?php echo $this->load->view("common/bottom"); ?>
  