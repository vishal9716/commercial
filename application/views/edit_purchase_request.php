<?php echo $this->load->view("common/top"); ?>

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
                             foreach ($pr_list as $list) { //print_r($list);?>
					<!--	here fetch data from database-->
								
       
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Unit</label>
                            <select disabled id="unitDropdownSelect" class="form-control select2 select2-hidden-accessible" name="unit">
                                <option hidden value="" >--Select Units--</option>
                                <?php foreach ($units_region as $units) { ?>
                                    <option id="departmentsDropdown"   <?php if($units['unit_region_id'] == $list['unit_region_id']){ echo "selected"; } ?>  value="<?php echo $units['unit_region_id']; ?>"><?php echo $units['unit_region_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" id="">
                            <label for="">S. No.</label>
                           <input class="form-control" disabled value="<?php echo $_GET['sr_no'];?>" id="pr_srno" name="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Indenting Department</label>
                            <select disabled id="departmentsDropdownSelect" class="form-control select2 select2-hidden-accessible" name="department">
                                <option hidden value="" >--Select Department--</option>
                                <?php foreach ($departments as $department) { ?>
                                    <option id="departmentsDropdown" <?php if($department['department_id'] == $list['department_id']){ echo "selected"; } ?> value="<?php echo $department['department_id']; ?>"><?php echo $department['department_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="radio" id="phone_person" name="phone_person" value="1" > On Phone &nbsp;&nbsp;
                                <input type="radio"  id="phone_person" name="phone_person" value="2" checked /> In person</label>

                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Issuing date</label>
                            <input class="form-control" placeholder="Enter Date" value="<?php echo date("Y-m-d"); ?>" type="date" id="issuing_date" name="issuing_date">
                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Action Taken by</label>
                            <select id="action_taken_by" class="form-control select2 select2-hidden-accessible" name="action_taken_by">
                                <?php foreach ($actionTakenBy as $action) { ?>
                                    <option <?php if($action['type_id'] == $list['action_taken_by']){ echo "selected"; } ?> value="<?php echo $action['type_id']; ?>"><?php echo $action['type_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Supplier/Make Referred</label>
                            <select id="supplierDropdownSelect" class="form-control select2 select2-hidden-accessible" name="department">
                                <?php foreach ($suppliers as $supplier) { ?>
                                    <option id="departmentsDropdown" value="<?php echo $supplier['supplier_id']; ?>"><?php echo $supplier['supplier_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>
                    <?php
                    $session_data = $this->session->userdata('logged_in');
                    $username = $session_data['username'];
                    ?>             
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Order Placed by</label>
                            <input class="form-control auto ui-autocomplete-input" placeholder="Enter Order Placed by" value="<?php echo ucfirst($username); ?>" name="order_placed_by" id="order_placed_by">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            &nbsp;&nbsp;
                            <label><input type="radio" id="expense" name="expense" value="1" checked> opEx &nbsp;&nbsp;
                                <input type="radio" id="expense" name="expense" value="2"> capEx</label>
                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>
                </div>

             
			<br/>	
	<?php } ?>				
				
								
										<div class="table-responsive" style="border:1px solid; color:#555; padding:5px;">
                                   		
											
										 <table class="table table-striped table-bordered table-hover mb-0 customTable" id="dataTables-example">
											  <thead>
                                            <tr style="white-space:nowrap">
                                              <!--  <th rowspan="2">S.No.</th> -->
                                                <th rowspan="2">Description</th>
                                                <th rowspan="2">Unit</th>
                                                <th rowspan="2">Avg. Cods.</th>
                                                <th rowspan="2">Qty. in Stock</th>
                                                <th rowspan="2">Reorder Point</th>
                                                <th rowspan="2">Reorder Quantity</th>
                                                <th rowspan="2">Qty. Req.</th>
                                                <th colspan="2" style="text-align:center">Previous Supplier</th>
                                                <th colspan="2" style="text-align:center">Order Placed on</th>
                                                <th rowspan="2">Edit</th>
                                            </tr>
                                            <tr>
                                                <th> Rate </th>
                                                <th> Total </th>
                                                <th> Rate </th>
                                                <th> Total </th>
                                            </tr>
                                        </thead>
											<?php 
											for($i=0; $i<count($purchase_request_list); $i++)
											{												
											?>
												
											<tr>
						<!--<td><input class="form-control" type="text" id="" value="<?php echo $i; ?>"/></td> -->
	<td>
   <textarea class="form-control" cols="7"  style="width:200px;resize:none;" name="pr_description[]" id="pr_description"><?php echo $purchase_request_list[$i]['pr_description'];?></textarea>
   </td>
 <td>
	<input class="form-control" type="text" style="width:50px;" name="units[]" id="units" value="<?php echo $purchase_request_list[$i]['units'];?>"/>
  </td>
 <td>
 <input class="form-control" type="text" name="avg_cods[]" id="avg_cods" value="<?php echo $purchase_request_list[$i]['avg_cods'];?>"/>
	</td>
	
 <td>
 <input class="form-control" type="text" name="qty_in_stock[]" id="qty_in_stock" value="<?php echo $purchase_request_list[$i]['qty_in_stock'];?>"/>
	</td>
												 <td>
 <input class="form-control" type="text" name="reorder_point[]" id="reorder_point" value="<?php echo $purchase_request_list[$i]['reorder_point'];?>"/>
	</td>
 <td>
 <input class="form-control" type="text" name="reorder_quantity[]" id="reorder_quantity" value="<?php echo $purchase_request_list[$i]['reorder_quantity'];?>"/>
	</td>
												 <td>
 <input class="form-control" type="text" name="qty_req[]" id="qty_req" value="<?php echo $purchase_request_list[$i]['qty_req'];?>"/>
	</td>
												 <td>
 <input class="form-control" style="width:100px;" type="text" name="pr_supplier_rate[]" id="pr_supplier_rate" value="<?php echo $purchase_request_list[$i]['pr_supplier_rate'];?>"/>
	</td>
												<td>
 <input class="form-control" style="width:100px;" type="text" name="pr_supplier_supplier[]" id="pr_supplier_supplier" value="<?php echo $purchase_request_list[$i]['pr_supplier_supplier'];?>"/>
	</td>
												<td>
 <input class="form-control" style="width:100px;" type="text" name="order_placed_rate[]" id="order_placed_rate" value="<?php echo $purchase_request_list[$i]['order_placed_rate'];?>"/>
													<td>
 <input class="form-control" style="width:100px;" type="text" name="order_placed_supplier[]" id="order_placed_supplier" value="<?php echo $purchase_request_list[$i]['order_placed_supplier'];?>"/>
	</td>
	<td onclick="edit_pr();"><a><i class="glyphicon glyphicon-pencil"></i></a></td>
		<!--  <td><input class="form-control" type="button" value="Delete" onclick="delRow(this)"></td> -->
											</tr>
											
										<?php } ?>
											</table>									
																															
										<!-- end add rows -->										
                                        </div>
				
	 				
	  <div class="row">
         <div class="col-md-2">
	  <span class="activity pull-right"><a href="<?php echo base_url();?>index.php/purchase_request/purchase_request_list" class="btn btn-info">Back to PR List</a></span>
	  </div>
	 
      </div>
	  <br/>
		 
        </form>
   <!-- end -->
         
			

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
<script>

function edit_pr() {
//alert("in");
var sr_no = "<?php echo $_GET['sr_no'];?>";
var department_id = $("#departmentsDropdownSelect option:selected").val();
var issuing_date = $('#issuing_date').val();
var phone_person = $('#phone_person').val();
var supplier_name = $('#supplier_name').val();
var action_taken_by = $('#action_taken_by').val();
var pr_reacd_on = $('#pr_reacd_on').val();
var	order_placed_by= $('#order_placed_by').val();
//var sr_no = '1';
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
	
//alert(reorder_point);	
//var selectedOption = $("input:radio[name=optradio]:checked").val()
//alert("<?php echo base_url(); ?>index.php/purchase_request/edit_purchase_request/"+pr_srno);
//alert(pr_description);
			
		//alert(pr_supplier_supplier);
	//alert("<?php echo base_url(); ?>index.php/`	/update_pr/"+sr_no);
         $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>index.php/purchase_request/edit_pr",
            data: {sr_no:sr_no, department_id:department_id,issuing_date: issuing_date,phone_person: phone_person, supplier_name:supplier_name, action_taken_by: action_taken_by, pr_reacd_on: pr_reacd_on,order_placed_by:order_placed_by, pr_description:pr_description,units:units,avg_cods:avg_cods,qty_in_stock:qty_in_stock,reorder_point:reorder_point,reorder_quantity:reorder_quantity,qty_req:qty_req,pr_supplier_rate:pr_supplier_rate,pr_supplier_supplier:pr_supplier_supplier,order_placed_rate:order_placed_rate,order_placed_supplier:order_placed_supplier,pr_description:pr_description},
            success: function(data) {
		   alert(data);
		//data = JSON.parse(data);	
		//json_decode($data);
  //  window.location.href = "<?php echo base_url(); ?>index.php/purchase_request/purchase_request_list";
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
  