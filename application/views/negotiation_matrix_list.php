<?php echo $this->load->view("common/top"); ?>
<style>
	table thead tr th{
text-align: center;
	}
</style>
       
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Negotiation List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Negotiation listing
	<!--<span class="activity"><a href="<?php echo base_url();?>index.php/purchase_request/negotiation">Add negotiation</a></span>-->
	<span class="activity"><a href="<?php echo base_url();?>index.php/purchase_request/purchase_request_list">Back to PR List</a></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<?php if (empty($negotiation_matrix_list)) { 
    							echo '<center>No Records Available</center>'; 
								}else{ ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Sr. No</th>
										<th style="text-align: center;">PR No.</th>
                                        
                                    </tr>
                                </thead>								
                                <tbody>
								
								<?php
								
								//echo "<pre/>"; print_r($negotiation_matrix_list); die;
								$i=0;
								foreach($negotiation_matrix_list as $list) {
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
									<td style="text-align: center;"><?php echo $i; ?></td>
                                <td style="text-align: center;" id="pr_srno"><a prsno="<?php echo $list['pr_sr_no']; ?>" class="prsno" href='#' data-toggle='modal' data-target='#prQuot'>
                                                    <?php echo $list['pr_sr_no']; ?></a>
                                            </td>
	

									<!--	<td><a href="<?php echo base_url();?>index.php/operations/edit_quotation?qid=<?php echo $list['quotation_id'];?>">Edit</a> / <a href="javascript:delete_quotation('<?php echo $list['quot_sub_activity_id'];?>','<?php echo $list['quotation_id'];?>');">Delete</a></td> -->
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

    
    <div class="modal fade" id="prQuot" role="dialog" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="width:95%;">
        <div class="modal-content">
            <div class="modal-header" style="overflow:hidden;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-info">Negotiation Listing</h4>
            </div>
            <div class="modal-body">
                <div class="container">

                    <!-- Editable table -->
                    <div class="card">

                        <!-- <h3 class="card-header text-center font-weight-bold text-uppercase py-4">PURCHASE REQUISITION</h3>-->
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-1" style="margin-bottom: 20px;"></div>
                          <!--  <div class="col-md-2"><input class="form-control" placeholder="Enter PR S. No." id="sr_no" name="sr_no" value=""></div>-->
                        </div>
                        <div class="card-body">
                            <div id="table" class="table-editable">

                                <table class="table table-bordered table-responsive-md table-striped text-center" id="crud_table">
                                    <thead> 	
                                       <tr>
                                        <th>Sr. No</th>
										<th style="text-align: center;">PR No.</th>
                                        <th style="text-align: center;">Date</th>
                                        <th>Vendor Person</th>
                                        <th>Contact Person</th>
										 <th>Number</th>
										 <th>Negotiation</th>
										
                                    </tr>
                                        


                                    </thead>
                                    <tbody class="test">

                                    </tbody> 
                                </table>




                            </div>
                        </div>
                    </div>
                    <!-- Editable table -->

                </div>
            </div>
        </div>
    </div>
</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
                                                        $(document).ready(function () {


                                                            $(".prsno").click(function () {
                                               //I need to get the child of this-> then I need to fetch prsno attr
                                                                var pr_srno = $(this).attr('prsno');
                                                                var pr_srnumber = pr_srno.trim();
                                                                $.ajax({
                                                                    url: "<?php echo base_url(); ?>index.php/purchase_request/display_negotition_list",
                                                                    method: "POST",
                                                                    data: {
                                                                        pr_srnumber: pr_srnumber
                                                                    },
                                                                    success: function (data) {
									//alert(data);									//alert(data);
                                                                        $('#crud_table tbody').empty();
                                                                        data = JSON.parse(data);
                                                                        var objList = data['pr_list'];
                                                                        $.each(objList, function (index, obj) {
                                                                            var row = $('<tr>');
                                                                            row.append('<td>' + eval(index + 1) + '</td>');
                                                                            row.append('<td>' + obj.pr_sr_no + '</td>');
                                                                            row.append('<td>' + obj.negotiation_matrix_date + '</td>');
                                                                            row.append('<td>' + obj.vendor_person + '</td>');
                                                                            row.append('<td>' + obj.contact_person + '</td>');
                                                                            row.append('<td>' + obj.number + '</td>');
                                                                            row.append('<td>' + obj.negotiation + '</td>');
                                                                         
                                                                          
                                                                          
                                                                            $('#crud_table tbody').append(row);
                                                                        });
                                                                        // Display Modal
                                                                        // ('#prQuot').modal('show'); 
                                                                    },
                                                                    error: function (data) {

                                                                        alert("error");
                                                                    }
                                                                });



                                                            });
															  });
	</script>


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
