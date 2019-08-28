<?php echo $this->load->view("common/top"); ?>

        
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
       <div ng-app="gaigDemo" id="page-wrapper" class="" ng-controller="DemoCtrl as demo">
            <div class="row">
                <div class="col-lg-12">
		<h1 class="page-header" style="font-size: 26px; margin: 10px 0 20px;">Internal Memo For PR - <?php echo $_GET['sr_no'];?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		 <?php
                                //echo "<pre/>"; print_r($pr_list); die;
                                $i = 0;
                                foreach ($pr_list as $list) {
                                    $i++;
                                    if ($i % 2 == 0) {
                                        $classname = "odd gradeX";
                                    } else {
                                        $classname = "even gradeC";
                                    }
                                    ?>
			<div class="row">
			<div class="col-md-6">
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
                    ?>             
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">From</label>
                            <input class="form-control auto ui-autocomplete-input" placeholder="Enter From" value="<?php echo ucfirst($fname); ?>" name="order_placed_by" id="order_placed_by">
                        </div>
                    </div>
             
             
                <!-- /.col-lg-12 -->
            </div>
		<div class="row">
			<div class="col-md-6">
            <div class="form-group">
             <label for="">Date</label>
             <input class="form-control" placeholder="Enter Date" type="date" id="date" name="date" value="<?php echo date("Y-m-d"); ?>">
              <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
	
        </div>
		   <div class="row">
			<div class="col-md-12">
            <div class="form-group">
             <label for="">Subject</label>
             <input class="form-control" id="subject" placeholder="Enter Subject" name="subject" value="<?php echo $list['subject']; ?>">
              <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
	
            </div>
            <!-- /.row -->
            <div class="row">
                 <div class="col-md-12">
                   <label for="">Description </label>
					 
                  <div class="gaig-main">
                  <div class="gaig-sidebar">
                    <div class="gaig-sidebar-inner">
                      <!-- set height for demo only -->
                     
                    </div>
                  </div>
                
                          <textarea name="editor" id="editor" class="editor" rows="12" cols="50"><?php echo $list['description']; ?>
                          
                          </textarea>		  
                
                </div><br/>
			 
                    <!--</div>-->
                    <!-- /.panel -->
                </div>
								
            </div>
		   
		   <?php } ?>   
		   <?php
    $session_data = $this->session->userdata('logged_in');
    $uid = $session_data['uid'];
    ?>	
		   <?php if($uid!='1'){ ?>
		    <div class="row">
	 <div class="col-md-2">
   <button type="submit" class="btn btn-danger bg-red pull-left" onclick="internal_memo();" id="">Update  Memo</button>
				</div>
			 <div class="col-md-2">
  <span class="btn btn-danger bg-red pull-right"><a  style="text-decoration: none;" href="<?php echo base_url();?>index.php/purchase_request/purchase_request_list"><font color="white">Back to PR List</font></a></span>
				</div>	
				
				</div>
		   
		   <?php } ?>
            <!-- /.row -->
			
			<!-- BODY section -->
			
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
			       // alert(sr_no);
			  		var to = $('#to').val();
			  		var from = $('#from').val();
                    var subject = $('#subject').val();
                    var date = $('#date').val();
			        var editor = CKEDITOR.instances.editor.getData();
                  
			       //alert(editor);
                    $.ajax({
                    url: "<?php echo base_url(); ?>purchase_request/edit_internal_memo",
                    method: "POST",
                    data: {to: to, date: date, from: from, subject: subject, editor: editor, sr_no:sr_no },
                        success: function (data) {
                          //  console.log(data);
							alert(data);
window.location.href = "<?php echo base_url(); ?>index.php/purchase_request/purchase_request_list";
                        }
					  });
		  }
		
	</script>
</body>

</html>
