<?php echo $this->load->view("common/top"); ?>

       
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quotation List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Quotation listing
	<span class="activity"><a href="<?php echo base_url();?>index.php/operations">Add Quotation</a></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<?php if (empty($quotation_list)) { 
    							echo '<center>No Records Available</center>'; 
								}else{ ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Quotation No.</th>
                                        <th>Customer Name</th>
                                        <th>Project Name</th>
										 <th>Activity</th>
										 <th>Sub-Act</th>
										<th>Payment Terms</th>
                                        <th>Total Pages</th>
										<th>illustrations</th>
										<th>Complexity Level</th>
										<th>Norms</th>
										<th>Action</th>
                                    </tr>
                                </thead>								
                                <tbody>
								
								<?php
								
								//echo "<pre/>"; print_r($quotation_list); die;
								$i=0;
								foreach($quotation_list as $list) {
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
                                        <td><?php echo $list['quotation_no'];?></td>
                                        <td><?php echo $list['customer_name'];?></td>
                                        <td><?php echo $list['project_name'];?></td>
										<td><?php echo $list['activity_name'];?></td>
										<td><?php echo $list['sub_activity_name'];?></td>
										<td><?php echo $list['payment_terms_id'];?></td>
                                        <td><?php echo $list['total_pages'];?></td>
										<td><?php echo $list['illustrations'];?></td>
										<td><?php echo $list['complexity_level'];?></td>
										
										<td><?php echo $list['norms'];?></td>
										<td><a href="<?php echo base_url();?>index.php/operations/edit_quotation?qid=<?php echo $list['quotation_id'];?>">Edit</a> / <a href="javascript:delete_quotation('<?php echo $list['quot_sub_activity_id'];?>','<?php echo $list['quotation_id'];?>');">Delete</a></td>
                                    </tr>
								<?php }
                             } ?>
									
														
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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
