<?php echo $this->load->view("common/top_parul"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  </nav>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 26px; margin: 10px 0 20px;">PR Quotation </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		 <form role="form" name="frm-pr" method="post" action="pr_quotation_upload" enctype="multipart/form-data">
			<div class="row">
					<div class="col-md-6">
		    <div class="form-group">
                                            <label>Upload Documents</label>
                                            <input type="file" name="document" />
                                        </div>								
				</div>		
				 </div>

            
			<div class="row">
	 <div class="col-md-2">
     <button type="submit" name="submit" class="btn btn-default">Upload Quotation</button>
		</div>
		 <div class="col-md-2">
		<button type="reset" name="cancel" class="btn btn-default" onclick="location='<?php echo base_url(); ?>/index.php/Purchase_request/purchase_request_list'">Cancel</button>
		</div>
	</div>
		 </form>
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

</body>

</html>
