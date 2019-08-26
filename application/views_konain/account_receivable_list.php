 <?php $this->load->view('common/top');?>
	<script>
	function deletereceivable(reid)
	{
		var txt;
		var r = confirm("Are you sure wants to delete!");
		if (r == true) {
		  window.location.href = "<?php echo base_url(); ?>account_receivable/delete_receivable?rid="+reid;
		} else {
		  window.location.href = "<?php echo base_url(); ?>account_receivable/";
		} 
	}
	</script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Account Receivable List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>Account receivable list form</span> <span class="activity"><a href="<?php echo base_url(); ?>account_receivable/add_account_receivable">Create </a></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Segment</th>
                                        <th>Customer Name</th> 
										<th>Date</th>
										<th>Overdue For</th>
										<th>Total Billing</th>
										<th>Total Overdue</th>
										<th>Action</th>
                                    </tr>
                                </thead>								
                                <tbody>
								
								<?php
								//print_r($userdata);
								if($receivabledata != '')
								{
								$i=0;
								foreach($receivabledata as $recordslist) {
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
                                        <td><?php echo $recordslist->segment;?></td>
                                        <td><?php echo customervalue($recordslist->customer_name); ?> </td>
										<td><?php echo date("d/m/Y",strtotime($recordslist->receivable_date));?> </td>
										<td><?php echo $recordslist->overdue_for;?> </td>
										<td><?php echo $recordslist->total_billing;?> </td>
										<td><?php echo $recordslist->total_overdue;?> </td>
                                       	<td><a href="<?php echo base_url(); ?>account_receivable/edit_account_receivable?revid=<?php echo $recordslist->receivable_id;?>">Edit</a> / <a href="javascript:deletereceivable('<?php echo $recordslist->receivable_id;?>');">Delete</a></td>
                                    </tr>
								<?php } 
								} else {
								?>
									
									<tr>
                                        <td colspan="8" align="center">No records found.</td>                                        
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
									
									
									
            </div>
            <!-- /.row -->
			
			<!-- BODY section -->
			
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
<?php
function customervalue($cid)
{
	$conn = @mysqli_connect("localhost", "root", "", "commercial");
	$query2 = "select * from customer where customer_id = $cid";
	$exes = @mysqli_query($conn,$query2);
	$records = @mysqli_fetch_assoc($exes);	
	$customername = $records['customer_name'];		
	return $customername;	
} 

?>	
	
 <?php $this->load->view('common/footer');?>