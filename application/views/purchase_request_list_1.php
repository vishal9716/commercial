<?php echo $this->load->view("common/top"); ?>
<style>
    .disabled {
        pointer-events: none;
        cursor: default;
        opacity: 0.6;
    }
</style>
<!-- Navigation -->

<?php $this->load->view('header_message'); ?>
<?php $this->load->view('left_message'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Purchase Request List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php
    $session_data = $this->session->userdata('logged_in');
    $username = $session_data['username'];
    $firstname = $session_data['firstname'];
    $lastname = $session_data['lastname'];
    ?> 	
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Purchase Request listing  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><a href="<?php echo base_url(); ?>index.php/purchase_request/internal"><?php if ($username == 'konain') { ?>Add Purchase Request <?php } ?></a></span>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php
                    if (empty($purchase_request_list)) {
                        echo '<center>No Records Available</center>';
                    } else {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover mb-0" id="dataTables-example">
                                <thead>

                                    <tr>
                                        <th width="20">SNo</th>
                                        <th>PR SNo.</th>
                                        <th>Unit</th>
                                        <th>Department</th>
                                        <th>Issue Date</th>
                                        <th>Supplier</th>
                                        <th>Order Placed</th>
                                        <th>Action Taken</th>
                                        <th>Quotation</th>
                                        <th>Status</th>

                                        <?php
                                        if (($username == 'parul') || ($username == 'vikas')) {
                                            
                                        } else {
                                            ?>  <th width="200">Action</th> <?php } ?>
                                    </tr>
                                </thead>								
                                <tbody>

                                    <?php
                                     //echo "<pre>"; print_r($purchase_request_list); die();
                                    $i = 0;
                                    foreach ($purchase_request_list as $list) {
                                        $i++;
                                        if ($i % 2 == 0) {
                                            $classname = "odd gradeX";
                                        } else {
                                            $classname = "even gradeC";
                                        }
                                        $review_list=explode(",",$list['approver_user_id']);
                                        ?>

                                        <tr class="<?php echo $classname; ?>">
                                            <td><?php echo $i; ?></td>
                                            <td id="pr_srno"><a prsno="<?php echo $list['sr_no']; ?>" class="prsno" href='#' data-toggle='modal' data-target='#prQuot'>
                                                    <?php echo $list['sr_no']; ?></a>
                                            </td>
                                            <td><?php echo $list['unit_region_name']; ?></td>
                                            <td><?php echo $list['department_name']; ?></td>

                                            <td><?php echo date("d-m-Y", strtotime($list['pr_issue_date'])); ?></td>
                                            <td><?php echo $list['supplier_name']; ?></td>
                                            <!--<td><?php // echo $list['pr_recd_on'];    ?></td>-->
                                            <td><?php echo $list['order_placed_by']; ?></td>
                                            <td><?php echo $type_list[$list['action_taken_by']]; ?></td>
                                            
                                            <td>									
											<?php 
												$quatcount = quotationlist($list['pr_id']);
                                                                                                print_r($quatcount);
												$qtcount = count($quatcount);
												if($qtcount > 0)
												{
													for($i=1; $i<=$qtcount;$i++)
													{												
														
											?>		
													<a href="<?php echo base_url(); ?>purchase_request/download?doc=<?php echo $quatcount[$i-1];?>"><?php echo $i;?></a>
														
											<?php
													}
												}
											
											?>
																					
											
											
											</td>
                                            <td>

                                                <?php
                                                $hello = "";
                                                $flag = 0;
                                                $showStatus =0;
//                                                foreach ($list['statushistory'] as $history) {
//                                                    if ($username == $history['status_by']) {
//                                                        $flag = 1;
//                                                    }
//                                                    $hello .= $status_list[$history['pr_status']] . " on : " . date('Y-m-d', strtotime($history['pr_status_date'])) . " by : " . $history['status_by'] . "\n";                                                                                                        
//                                                    }
                                                
                                                foreach ($list['statushistory'] as $history) {
                                                    if ($session_data['uid'] == $history['action_first_user_id']) {
                                                        $flag = 1;
                                                        $showStatus= 1;
                                                    }
                                                    $hello .= $status_list[$history['pr_status']] . " on : " . date('Y-m-d', strtotime($history['pr_status_date'])) . " by : " . $history['status_by'] . "\n";                                                                                                        
                                                    }
                                                ?>
                       
                                                <?php
//                                                if ($flag == 1 && $showStatus ==1) {
//                                                    if ($list['status'] == 1) {
//                                                        $class = 'success disabled';
//                                                    } else if ($list['status'] == 2) {
//                                                        $class = 'danger disabled';
//                                                    } else if ($list['status'] == 0 && $list['user_id'] = $session_data['uid']) {
//                                                        $class = 'warning disabled';
//                                                    } 
//                                                } else {
//                                                    if ($list['status'] == 1 && $showStatus == 1 ) {
//                                                        $class = 'success';
//                                                    } else if ($list['status'] == 2) {
//                                                        $class = 'danger';
//                                                    }else if($list['status'] == 1 && $showStatus != 1){
//                                                        $class = 'warning';
//                                                    }else if ($list['status'] == 0 && $list['user_id'] = $session_data['uid']) {
//                                                        $class = 'warning';
//                                                    }
//                                                }
                                                ?>
                                                 <?php if ($list['status'] != 0) { ?>
                                                    <span title="<?php echo $hello; ?>">  <span class="show_status label label-<?php echo $class; ?>" prid="<?php echo $list['sr_no']; ?>" data-toggle="modal" data-target="#exampleModal"><?php echo $status_list[$list['status']]; ?></span></span>
                                                <?php } else { ?> 
                                                    <span  prid="<?php echo $list['sr_no']; ?>" title="" data-toggle="modal" data-target="#exampleModal" class="label label-warning"><?php echo "6" . $status_list[$list['status']]; ?></span>
                                                <?php } ?>
                                                    
                                                    
                                            </td>
                                            <?php echo $list['phone_person']; ?>

                                            <?php if (($session_data['uid'] == $list[user_id]) && $list['status'] == '0') { ?>
                                                <td class="text-center"><a href="<?php echo base_url(); ?>index.php/purchase_request/edit_purchase_request?sr_no=<?php echo $list['sr_no']; ?>">Edit</a> 
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/internal_memo?sr_no=<?php echo $list['sr_no']; ?>" class="">Memo</a></td>
                                            <?php } elseif(in_array ($session_data['uid'], $review_list))  { ?>
                                                <td><a href="<?php echo base_url(); ?>index.php/purchase_request/internal_memo?sr_no=<?php echo $list['sr_no']; ?>" class="">Memo</a> </td>
                                            <?php } elseif ( (in_array ($session_data['uid'], $review_list)) && ($session_data['department_id'] == 5) ){ ?> 
                                                    <!-- For Purchase Department -->
                                                    <td class="text-center">
                                                        <a disabled="disabled" href="<?php echo base_url(); ?>index.php/purchase_request/edit_purchase_request?sr_no=<?php echo $list['sr_no']; ?>">Edit</a> 
                                                    | <a disabled="disabled" href="<?php echo base_url(); ?>index.php/purchase_request/internal_memo?sr_no=<?php echo $list['sr_no']; ?>" class="">Memo</a> 
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/pr_quotation/?pr_id=<?php echo $list['pr_id']; ?>&sr_no=<?php echo $list['sr_no']; ?>">Quotation</a>
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/checklist?sr_no=<?php echo $list['sr_no']; ?>">Checklist</a>
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/negotiation?sr_no=<?php echo $list['sr_no']; ?>">Negotiation</a> 
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/comparision?sr_no=<?php echo $list['sr_no']; ?>">Comparision </a>
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/audit_checklist?sr_no=<?php echo $list['sr_no']; ?>">Audit</a></td>
                                                <? } ?>
                                               <?php// } ?>
                                            <?php /* if (($username == 'test') && $list['status'] == '0') {
                                                ?>  <td class="text-center"><a href="<?php echo base_url(); ?>index.php/purchase_request/edit_purchase_request?sr_no=<?php echo $list['sr_no']; ?>">Edit</a> 
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/internal_memo?sr_no=<?php echo $list['sr_no']; ?>" class="">Memo</a> 
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/pr_quotation/?pr_id=<?php echo $list['pr_id']; ?>&sr_no=<?php echo $list['sr_no']; ?>">Quotation</a>
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/checklist?sr_no=<?php echo $list['sr_no']; ?>">Checklist</a>
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/negotiation?sr_no=<?php echo $list['sr_no']; ?>">Negotiation</a> 
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/comparision?sr_no=<?php echo $list['sr_no']; ?>">Comparision </a>
                                                    | <a href="<?php echo base_url(); ?>index.php/purchase_request/audit_checklist?sr_no=<?php echo $list['sr_no']; ?>">Audit</a></td>
                                            <?php } else if (($username == 'parul') || ($username == 'vikas') || ($username == 'pooja') && ($list['status'] == 'Pending3' || $list['status'] == 'Approved' || $list['status'] == 'Rejected')) { ?>  <td><a href="<?php echo base_url(); ?>index.php/purchase_request/internal_memo?sr_no=<?php echo $list['sr_no']; ?>">Edit Memo</a>  </td> 
                                            <?php } */?>											

                                            <!-- Status updation code starts -->

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Purchase Request Status</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>

                                                        <div class="form-group">

                                                            <div id="prIdForDecision" style="visibility: hidden;"></div>
                                                            <label><input type="radio" name="optradio" value="1"> Approved &nbsp;&nbsp;
                                                                <input type="radio" name="optradio" value="0"> Rejected</label>

                                                            <span id="errMsg" class="text-danger"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Remarks:</label>
                                                            <textarea class="form-control" id="remarks"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                                    <input type="button" class="btn btn-primary" name="button" value="Submit Status" onclick="confirmation();"/>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Status updation code ends -->
                                    
                                    <?php
                                }
                            }
                            
                            function quotationlist($dpt_id)
				{
					$conn = @mysqli_connect("localhost", "root", "", "commercial");
					$query2 = "select document_id from documents where document_dept = 'PR' and document_dept_id= $dpt_id";
					$exes = @mysqli_query($conn,$query2);
					while($records = @mysqli_fetch_array($exes))
					{
						$documentids[] = $records['document_id'];
					}
					return $documentids;
				}
                            ?>


                            </tbody>
                        </table>

                    </div>

                </div>

                <div class="panel-footer">
               <!-- <span class="label label-warning">Pending</span>
                <span class="label label-primary">Approved</span>
                <span class="label label-danger">Rejected</span>
                <span class="label label-success">Approved</span>-->
                </div>

            </div>

        </div>		
    </div>

    <!-- /.row -->

    <!-- BODY section -->


    <!-- /.row -->
</div>
<!-- /#page-wrapper -->


<!--Purchase Modal Start-->
<div class="modal fade" id="prQuot" role="dialog" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="width:95%;">
        <div class="modal-content">
            <div class="modal-header" style="overflow:hidden;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-info">PURCHASE REQUISITION Listing</h4>
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
                                            <th rowspan="2">S.No.</th>
                                            <th rowspan="2">PR No.</th>
                                            <th rowspan="2">Description</th>
                                            <th rowspan="2">Unit</th>
                                            <th rowspan="2">Avg. Cods.</th>
                                            <th rowspan="2">Qty. in Stock</th>
                                            <th rowspan="2">Reorder Point</th>
                                            <th rowspan="2">Reorder Quantity</th>
                                            <th rowspan="2">Qty. Req.</th>
                                           <!-- <th rowspan="2">Status</th> -->
                                            <th colspan="2"> Supplier</th>
                                            <th colspan="2">Order Placed on</th>
                                        </tr>
                                        <tr>
                                            <th> Rate </th>
                                            <th> Supplier </th>
                                            <th> Rate </th>
                                            <th> Supplier </th>
                                        </tr>


                                    </thead>
                                    <tbody class="test">

                                    </tbody> 
                                </table>


                                <!-- signature Row added by Parul -->

                                <table class="table table-bordered table-responsive-md table-striped text-center mb-0" id="fixAtPositionForSignature">
                                    <tbody>

                                        <tr>
                                            <td colspan="2" style="text-align: center;" contenteditable="true">ORIGINATOR : <?php echo ucfirst($firstname) . " " . ucfirst($lastname); ?></td>
                                            <td colspan="2" class="" contenteditable="true">Unit Head</td>
                                            <td colspan="2" class="" contenteditable="true">STORE</td>
                                            <td colspan="2" class="" contenteditable="true">PURCHASE</td>
                                            <td colspan="2" class="" contenteditable="true">ED/FA</td>

                                        </tr>
                                    </tbody>
                                </table>
                                <!--signature Row added by Parul  -->


                            </div>
                        </div>
                    </div>
                    <!-- Editable table -->

                </div>
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
                                                                    url: "<?php echo base_url(); ?>index.php/purchase_request/display_pr_list",
                                                                    method: "POST",
                                                                    data: {
                                                                        pr_srnumber: pr_srnumber
                                                                    },
                                                                    success: function (data) {
                                                                        $('#crud_table tbody').empty();
                                                                        data = JSON.parse(data);
                                                                        var objList = data['pr_list'];
                                                                        $.each(objList, function (index, obj) {
                                                                            var row = $('<tr>');
                                                                            row.append('<td>' + eval(index + 1) + '</td>');
                                                                            row.append('<td>' + obj.sr_no + '</td>');
                                                                            row.append('<td>' + obj.pr_description + '</td>');
                                                                            row.append('<td>' + obj.units + '</td>');
                                                                            row.append('<td>' + obj.avg_cods + '</td>');
                                                                            row.append('<td>' + obj.qty_in_stock + '</td>');
                                                                            row.append('<td>' + obj.reorder_point + '</td>');
                                                                            row.append('<td>' + obj.reorder_quantity + '</td>');
                                                                            row.append('<td>' + obj.qty_req + '</td>');
                                                                            // row.append('<td><span class="label label-warning">' + obj.status + '</span></td>');
                                                                            row.append('<td>' + obj.pr_supplier_rate + '</td>');
                                                                            row.append('<td>' + obj.pr_supplier_supplier + '</td>');
                                                                            row.append('<td>' + obj.order_placed_rate + '</td>');
                                                                            row.append('<td>' + obj.order_placed_supplier + '</td>');
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


                                                            //Approve Reject model opening
                                                            $('#exampleModal').on('show.bs.modal', function (e) {

                                                                // alert('hello');
                                                                var $modal = $(this);
                                                                $modal.find('#prIdForDecision').text('');
                                                                var prId = $(e.relatedTarget).attr('prid');

                                                                //alert(prId);

                                                                $modal.find('#prIdForDecision').text(prId);


                                                            });
                                                            //Approve reject ends
                                                        });



                                                        function confirmation() {
                                                            $("#prIdForDecision").hide();
                                                            var status = $("input:radio[name=optradio]:checked").val();
                                                            var pr_srno = $('#prIdForDecision').text();
                                                            var remarks = $('#remarks').val();
                                                            $.ajax({
                                                                url: "<?php echo base_url(); ?>index.php/purchase_request/update_pr_status",
                                                                method: "POST",
                                                                data: {status: status, remarks: remarks, pr_srno:pr_srno},
                                                                success: function (data) {
                                                                    $('#exampleModal').modal('hide');
                                                                    window.location.href = "<?php echo base_url(); ?>index.php/purchase_request/purchase_request_list";

                                                                }
                                                            });

                                                        }
</script>
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
