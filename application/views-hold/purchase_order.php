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
                <label for="exampleInputEmail1">Unit</label>
   
                    <input class="form-control" placeholder="Enter Unit" name="total_pages">
       
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
		
		</div>
				
       <div class="row">
            
            <div class="col-md-6">
             
              <div class="form-group">
                <label for="">Supplier Name</label>
              <input class="form-control" placeholder="Enter Supplier Name" name="total_pages">  
		       </div>
             
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
				  <label for="">Order No</label>
 			<input class="form-control" placeholder="Enter Order No" name="total_pages">			
               </div>
            </div>
		</div>
		
	   <div class="row">		
          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Material Code/Description / Specifications</label>
              <input class="form-control" placeholder="Enter Material Code/Description / Specifications" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div>    
		  <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">PR No.</label>
              <input class="form-control" placeholder="Enter PR No." name="total_pages">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div>    
			
        </div>

       <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Payment Terms</label>
          <select class="form-control" name="payment_terms">
            <option value="30" selected="">30</option>
            <option value="45">45</option>
			   <option value="90">90</option>
          </select>
				 </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Date</label>
                  <input class="form-control" placeholder="Ente Date" name="volume" id="search">
               </div>
            </div>
        </div>
				
	    <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Unit</label>
                     <select class="form-control select2 select2-hidden-+" name="account">
                                          <option value="1" selected="">Unit 1</option>
                                          <option value="2">Unit 2</option>
                                        </select>
              </div>
            </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">PR Date</label>
              <input class="form-control" placeholder="Enter PR Date" name="total_pages">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
        </div>

		 <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Quantity</label>
                  <input class="form-control" placeholder="Enter Quantity" name="volume" id="search">
               </div>
            </div>
			<div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Rate (Rs)- Per unit</label>
                  <input class="form-control" placeholder="Enter rate (Rs)- Per unit" name="level">

            </div>
            </div>
         </div>
				
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Delivery Schedule : Days/Months</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter delivery Schedule : Days/Months" name="volume" id="search">

                     </div>
            </div>
			 <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Value (Rs)-Total</label>
                  <input class="form-control" placeholder="Enter value (Rs)-Total" name="level">

            </div>
            </div>
        </div>
	
	   <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Discount</label>
                  <input class="form-control" placeholder="Enter discount" name="illustrations">

            
              </div>
            </div>
		<div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Total</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Total" name="illustrations">
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
          
        </div>
        <!-- /#page-wrapper -->

<?php echo $this->load->view("common/bottom"); ?>
  