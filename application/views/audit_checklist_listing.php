<?php echo $this->load->view("common/top"); ?>

       
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Audit Checklist Listing</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default" style='width:"120%;'>
                        <div class="panel-heading">
                            Audit Checklist Listing
<!--	<span class="activity"><a href="<?php echo base_url();?>index.php/purchase_request/audit_checklist">Add Audit Checklist</a></span> -->
	<span class="activity"><a href="<?php echo base_url();?>index.php/purchase_request/purchase_request_list">Back to PR List</a></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<?php if (empty($audit_checklist_listing)) { 
    							echo '<center>No Records Available</center>'; 
								}else{ ?>
                            <table width="90%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SNo</th>
										<th style="text-align: center;">PR No.</th>
                                        <th>Vendor selection</th>
                                        <th>Brand selection</th>
                                        <th>Bids</th>
										<th>Negotiation rounds</th>
										<th>SLA</th>
										<th>Agreement late delivery</th>
										<th>Payment agreement</th>
                                        <th>Service agreement</th>
                                        <th>AMC negotiation</th>
										<th>Delivery agreement</th>
										<th>Insurance</th>
										<th>Special point</th>
									<!--	<th>Action</th> -->
                                    </tr>
                                </thead>								
                                <tbody>
								
								<?php
								
								//echo "<pre/>"; print_r($negotiation_matrix_list); die;
								$i=0;
								foreach($audit_checklist_listing as $list) {
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
										<td style="text-align: center;"><?php echo $list['pr_srno'];?></td>
                                        <td><?php echo $list['vendor_selection'];?></td>
                                        <td><?php echo $list['brand_selection'];?></td>
                                        <td><?php echo $list['bids'];?></td>
										<td><?php echo $list['negotiation_rounds'];?></td>
										<td><?php echo $list['sla_agreement'];?></td>
										<td><?php echo $list['agreement_late_delivery'];?></td>
										<td><?php echo $list['payment_agreement'];?></td>
                                        <td><?php echo $list['service_agreement'];?></td>
                                        <td><?php echo $list['amc_negotiation'];?></td>
										<td><?php echo $list['delivery_agreement'];?></td>
										<td><?php echo $list['sla_agreement'];?></td>
										<td><?php echo $list['agreement_late_delivery'];?></td>

<!--<td><a href="<?php echo base_url();?>index.php/operations/edit_quotation?qid=<?php echo $list['quotation_id'];?>">Edit</a> / <a href="javascript:delete_quotation('<?php echo $list['quot_sub_activity_id'];?>','<?php echo $list['quotation_id'];?>');">Delete</a></td> -->
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
