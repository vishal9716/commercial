<?php echo $this->load->view("common/top"); ?>

        
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  
        <div id="page-wrapper">
			
			
			
			<!-- start-->
			
			<form action="<?php echo base_url(); ?>index.php/operations/add_estimation" method="POST" name="Formulaire">  
				<?php if (isset($errormsg)) {	?>						
                                    <div class="alert alert-danger">
										<?php echo $errormsg; ?>
									</div>
									<?php } ?>
       
	   <div class="row">
            <?php  $quo_no = (rand(1000,10000)); ?>
		 <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">S. No</label>
                <div class="input-group">
                   <div class="input-group-addon">SN-</div>
                   <input id="quo" class="form-control" value="<?php echo $quo_no; ?>" readonly type="text" name="quotation">
                 
                </div>
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
	
		 <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">PRI</label>
   
                    <input class="form-control" placeholder="Enter PRI" name="total_pages">
       
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
		
		</div>
				
       <div class="row">
            
           <div class="col-md-6">
              <div class="form-group">
				  <label for="">Department<span class="text-danger"> *</span><a href="#" data-toggle="modal" data-target="#departmentModal" style="margin-left: 39px;" class="btn-border-orange"><span class="fa fa-plus"> &nbsp;</span>New Department</a></label>

               <select id="" class="form-control select2 select2-hidden-accessible" name="department">
		  <?php foreach($departments as $department){ ?>
         <option id="departmentsDropdown" value="<?php echo $department['department_id'];?>"><?php echo $department['department_name'];?></option>     
    <?php } ?>  
	 </select> 	
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
				  <label for="">Date</label>
 			<input class="form-control" placeholder="Enter Date" name="total_pages">			
               </div>
            </div>
		</div>
		
	   <div class="row">		
          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Computer Code</label>
              <input class="form-control" placeholder="Enter Computer Code" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div>    
		  <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Priority</label>
              <input class="form-control" placeholder="Enter Priority" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div>    
			
        </div>

    			
	    <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                   <input class="form-control" placeholder="Enter Description" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
              </div>
            </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Material</label>
              <input class="form-control" placeholder="Enter Material" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
        </div>

		 <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Present Stock</label>
                  <input class="form-control" placeholder="Enter Present Stock" name="volume" id="search">
               </div>
            </div>
			<div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Mode of Transport </label>
                  <input class="form-control" placeholder="Enter Mode of Transport" name="level">

            </div>
            </div>
         </div>
				
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Avg. Con.</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Avg. Con." name="volume" id="search">

                     </div>
            </div>
			 <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Indian supplier</label>
                  <input class="form-control" placeholder="Enter value (Rs)-Total" name="level">

            </div>
            </div>
        </div>
	  <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Qty. Req.</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Qty. Req." name="volume" id="search">

                     </div>
            </div>
			 <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Total value</label>
                  <input class="form-control" placeholder="Enter Total value" name="level">

            </div>
            </div>
        </div>
				
	   <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Old rate</label>
                  <input class="form-control" placeholder="Enter Old rate if any" name="illustrations">

            
              </div>
            </div>
		<div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Delivery Schedule</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Delivery Schedule" name="illustrations">
            </div>
            </div>
       </div>

				  <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Present Offers</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Present Offers if Any" name="volume" id="search">

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
                  <label for="exampleInputEmail1">Custom Duty</label>
                  <input class="form-control" placeholder="Enter Custom Duty" name="illustrations">

            
              </div>
            </div>
	
       </div>
				
        <div class="row">
          <div class="col-md-12">
            <div class="text-center" id="quantityMessage" style="color:red; font-weight:bold">
            </div>
          </div>
        </div>
				 <div class="row">
					 <div class="col-md-2">
	<button type="submit" class="btn btn-primary btn-flat pull-left" id="btnSubmit">Create PDF</button>
					 </div>
						 <div class="col-md-2">
   <button type="submit" class="btn btn-primary btn-flat pull-left" id="btnSubmit">Send email to Requestor</button>
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
                                <input type="text" class="form-control" id="department_name" placeholder="Enter Department Name" name="department_name" value="">
                              </div>
                            </div>
                            
                                                    
                            <div class="form-group">
                              <label class="col-sm-4">Description</label>

                              <div class="col-sm-8">
                                <input type="text" value="" placeholder="Enter Description" class="form-control" id="department_descp" name="department_descp">
                              </div>
                            </div>

                         
                          </div>
               
                          
                        </div>
                      </div><br>
                      </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer">
                          <a href="" class="btn btn-info btn-flat">Cancel</a>
						 <input type="button" class="btn btn-info" name="button" value="Submit" onclick="add_department();"/>
                         
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

<?php echo $this->load->view("common/bottom"); ?>
  