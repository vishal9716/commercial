<?php echo $this->load->view("common/top_parul"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  </nav>
          <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Comparision History</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Comparision History Listing
							<span class="activity"><a href="<?php echo base_url();?>index.php/purchase_request/purchase_request_list">Back to PR List</a></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>SrNo.</th>
                                        
										<th>Item Description</th>
                                        <th>Unit</th>
                                        <th>Quantity</th>
                                        <th>Quoated Unit Price</th>
                                        <th>Quoated Total Amount</th>
										<th>Final Unit Price</th>
                                        <th>Final Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
								
								<?php
								
								//echo "<pre/>"; print_r($negotiation_matrix_list); die;
								$i=0;
								foreach($comparision_history as $list) {
									$i++;
									if($i%2==0)
									{
										$classname = "odd gradeX";
									}
									else
									{
										$classname = "even gradeC";
									}
								?>
								
                                    <tr class="<?php echo $classname; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $list['desp'];?></td>
                                        <td><?php echo $list['unit'];?></td>
                                        <td><?php echo $list['quantity'];?></td>
                                        <td><?php echo $list['quoted_unit_price'];?></td>
										<td><?php echo $list['quoted_amount'];?></td>
                                        <td><?php echo $list['final_quoted_unit_price'];?></td>
										<td><?php echo $list['final_quoted_amount'];?></td>
                                    </tr>
                                   
									<?php } ?>  
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          
            <!-- /.row -->
           
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script src="<?php echo base_url(); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
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
