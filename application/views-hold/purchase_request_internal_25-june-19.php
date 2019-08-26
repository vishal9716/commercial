<?php echo $this->load->view("common/top"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  </nav>
        <div id="page-wrapper">
			
			
			
			<!-- start-->
			
			<form action="<?php echo base_url(); ?>index.php/operations/add_estimation" method="POST" name="Formulaire">  
				<?php if (isset($errormsg)) {	?>						
                                    <div class="alert alert-danger">
										<?php echo $errormsg; ?>
									</div>
									<?php } ?>
       
				
       <div class="row">
            
            <div class="col-md-6">
              <div class="form-group">
				  <label for="">Indenting Department<span class="text-danger"> *</span><a href="#" data-toggle="modal" data-target="#departmentModal" style="margin-left: 39px;" class="btn-border-orange"><span class="fa fa-plus"> &nbsp;</span>New Department</a></label>

               <select id="departmentDropdownSelect" class="form-control" name="department">
		  <?php foreach($departments as $department){ ?>
         <option id="departmentsDropdown" value="<?php echo $department['department_id'];?>"><?php echo $department['department_name'];?></option>     
    <?php } ?>  
	 </select> 	
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
				  <label for="">PR</label>
 			<input class="form-control" placeholder="Enter Date" name="total_pages">			
               </div>
		   </div>
		</div>
		
	   <div class="row">		
          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Issuing date</label>
              <input class="form-control" placeholder="Enter Date" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div>    
		  <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
              <input class="form-control" placeholder="Enter Priority" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div>    
			
        </div>

    			
	    <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Supplier/Make Referred</label>
                   <input class="form-control" placeholder="Enter Supplier/Make Referred" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
              </div>
            </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Rate</label>
              <input class="form-control" placeholder="Enter Material" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
        </div>

		 <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">S. No</label>
                  <input class="form-control" placeholder="Enter Present Stock" name="volume" id="search">
               </div>
            </div>
			<div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Remarks</label>
                  <input class="form-control" placeholder="Enter Remarks" name="level">

            </div>
            </div>
         </div>
				
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Description Item</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Description Item" name="volume" id="search">

                     </div>
            </div>
	<!--		 <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Indian supplier</label>
                  <input class="form-control" placeholder="Enter value (Rs)-Total" name="level">

            </div>
            </div>-->
        </div>
	  <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Unit</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Units" name="volume" id="search">

                     </div>
            </div>
			<!-- <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Total value</label>
                  <input class="form-control" placeholder="Enter Total value" name="level">

            </div>
            </div> -->
        </div>
				
	   <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Avg. Cods</label>
                  <input class="form-control" placeholder="Enter Avg. Cods" name="illustrations">

            
              </div>
            </div>
		<!--<div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Delivery Schedule</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Delivery Schedule" name="illustrations">
            </div>
            </div>-->
       </div>

		  <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Qty. in Stock</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Qty. in Stock" name="volume" id="search">

                     </div>
            </div>
			<!--<div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Remarks</label>
                  <input class="form-control" placeholder="Enter Remarks" name="level">

            </div>
            </div>-->
        </div>
	
	   <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Reorder Point</label>
                  <input class="form-control" placeholder="Enter Reorder Point" name="illustrations">

            
              </div>
            </div>
	
       </div>
	  
	     <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Reorder Quantity</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Qty. in Stock" name="volume" id="search">

                     </div>
            </div>
		<!--	 <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Remarks</label>
                  <input class="form-control" placeholder="Enter Remarks" name="level">

            </div>
            </div> -->
        </div>
				
		 <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Qty. Req</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Qty. Req" name="volume" id="search">

                     </div>
            </div>
		<!--	 <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Remarks</label>
                  <input class="form-control" placeholder="Enter Remarks" name="level">

            </div>
            </div> -->
        </div>
				
        <div class="row">
          <div class="col-md-12">
            <div class="text-center" id="quantityMessage" style="color:red; font-weight:bold">
            </div>
          </div>
        </div>
				 <div class="row">
					 <div class="col-md-3">
	<button type="submit" class="btn btn-primary btn-flat pull-left" id="btnSubmit">Upload Document</button>
					 </div>
						 <div class="col-md-3">
   <button type="submit" class="btn btn-primary btn-flat pull-left" id="btnSubmit">Send email to Purchase</button>
				</div>
				</div>
        </form>
            <!-- end -->
         
			
<!--Department Modal Start-->
  <div class="modal fade" id="departmentModal" role="dialog" style="overflow:hidden;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-info">Department Information</h4>
        </div>
        <div class="modal-body">
         <form action="" method="post" id="DepartmentAdd" class="form-horizontal">
            
                <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-6">
                          <!--  <h4 class="text-info text-center" style="margin-left: 40px;">Project Information</h4>-->
                            <div class="form-group">
                              <label class="col-sm-4">Name</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Enter Department Name" id="department_name" name="department_name">
                              </div>
                            </div>
                            
                                                    
                            <div class="form-group">
                              <label class="col-sm-4">Description</label>

                              <div class="col-sm-8">
                  <input type="text" value="" class="form-control" id="department_descp" placeholder="Enter Description" name="department_descp">
                              </div>
                            </div>

                         
                          </div>
               
                          
                        </div>
                      </div><br>
                      </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer">
                          <a href="" class="btn btn-info btn-flat">Cancel</a>
						 <input type="button" class="btn btn-info" name="button" value="Submit" onclick="getdepartment();"/>
                         
                        </div>
                        <!-- /.box-footer -->
                      </form>
        </div>
      </div>
    </div>
  </div>
<!--Department Modal End-->
			
        </div>
        <!-- /#page-wrapper -->

<script>

function getdepartment() {
       //alert("in");
		var department_name = $('#department_name').val();
		var department_descp= $('#department_descp').val();
		
		// alert(department_name);
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>index.php/purchase_request/add_department",
            data: {department_name: department_name, department_descp: department_descp},
            success: function(data) {
				//alert(data);
			data = JSON.parse(data);
			$('#departmentDropdownSelect').empty();	
				for(var i=0; i< data.length; i++){
				$('#departmentDropdownSelect').append($("<option></option>")
     			.attr("value", data[i]['department_id']).text(data[i]['department_name']));
			}

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
  