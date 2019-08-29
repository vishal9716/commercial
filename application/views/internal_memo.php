<?php echo $this->load->view("common/top"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  </nav>
       <div ng-app="gaigDemo" id="page-wrapper" class="" ng-controller="DemoCtrl as demo">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 26px; margin: 10px 0 20px;">INTERNAL MEMO For PR - <?php echo $_GET['sr_no'];?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		
			<div class="row">
			<div class="col-md-4">
            <div class="form-group">
                                          <label>To</label>
                                            <select class="form-control" name="to" id="to" required>
                                              <?php foreach ($actionTakenBy as $action) { ?>
                                                    <option value="<?php echo $action['type_id']; ?>"><?php echo $action['type_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
          </div> 
				  <?php
					//echo "<pre/>"; print_r($_SESSION) ; die;
                    $session_data = $this->session->userdata('logged_in');
                    $fname = $session_data['firstname'];
                    $uid = $session_data['uid'];
                    ?>             
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">From</label>
                            <input type="hidden" id="from_user_id" name="from_user_id" value="<?php echo $uid ;?>"></input>
                            <input class="form-control auto ui-autocomplete-input" placeholder="Enter From" value="<?php echo ucfirst($fname); ?>" name="order_placed_by" id="order_placed_by">
                        </div>
                    </div>
                            
                  <div class="col-md-4">
            <div class="form-group">
             <label for="">Date</label>
             <input class="form-control" placeholder="Enter Date"  value="<?php echo date("Y-m-d"); ?>" type="date" id="date" name="date">
              <span id="errMsg" class="text-danger"></span>
            </div>
          </div>
             
                <!-- /.col-lg-12 -->
            </div>
		
		   <div class="row">
			<div class="col-md-12">
            <div class="form-group">
             <label for="">Subject</label>
             <input class="form-control" id="subject" placeholder="Enter Subject" name="subject">
              <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
	
            </div>
            <!-- /.row -->
            <div class="row">
                 <div class="col-md-10">
                   <label for="">Description </label>
					 
      <div class="gaig-main container"  style="width:122%;">
      <div class="gaig-sidebar">
        <div class="gaig-sidebar-inner">
          <!-- set height for demo only -->
         
        </div>
      </div>
    
              <textarea name="editor" id="editor" class="editor" rows="12" cols="50">
              
              </textarea>		  
    
    </div><br/>
			 
                    <!--</div>-->
                    <!-- /.panel -->
                </div>
								
            </div>
		   
		   
		    <div class="row">
	 <div class="col-md-2">
   <button type="submit" class="btn btn-primary btn-flat pull-left" onclick="internal_memo();" id="sendmail">Send Mail</button>
				</div>
				</div>
            <!-- /.row -->
			
			<!-- BODY section -->
			
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

 <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
  <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/jquery.min.js"></script>
  <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/angular.min.js"></script>
  <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/gaig-ui-bootstrap.js"></script>
	<script>
	function DemoCtrl() {

   this.foo = 'foo';
  
  CKEDITOR.editorConfig = function (config) {
    config.extraPlugins = 'confighelper';
  };
  CKEDITOR.replace('editor');

}

angular
  .module('gaigDemo', ['gaigUiBootstrap'])
  .controller('DemoCtrl', DemoCtrl);

// adding data
		  function internal_memo() {
                    var sr_no = "<?php echo $_GET['sr_no'];?>";
                    var to = $('#to').val();
                    var from = $('#from').val();
                    var subject = $('#subject').val();
                    var date = $('#date').val();
                    var order_placed_by = $('#order_placed_by').val();
                    var from_user_id = $('#from_user_id').val();
                    var editor = CKEDITOR.instances.editor.getData();
                  
                    $.ajax({
                    url: "<?php echo base_url(); ?>index.php/purchase_request/add_internal_memo",
                    method: "POST",
                    data: {
                        to: to, 
                        date: date,
                        from: from, 
                        subject: subject, 
                        editor: editor,
                        sr_no:sr_no,
                        from_user_id:from_user_id,
                        order_placed_by: order_placed_by
                    },
                        success: function (data) {
                            alert(data);
                           
window.location.href = "<?php echo base_url(); ?>index.php/purchase_request/purchase_request_list";
                        }
					  });
		  }
		
	</script>
</body>

</html>
