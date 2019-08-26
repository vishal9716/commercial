 <?php $this->load->view('common/top');?>
	<script>
	function deletecountry(cid)
	{
		var txt;
		var r = confirm("Are you sure wants to delete!");
		if (r == true) {
		  window.location.href = "/commercial/country/delete_country?cid="+cid;
		} else {
		  window.location.href = "/commercial/country/";
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
                    <h1 class="page-header">JTN List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>JTN list form</span> <span class="activity"><a href="<?php echo base_url(); ?>jtn/add_jtn">Issue JTN</a></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>JTN No</th>
                                        <th>Client Name</th> 
										<th>Type</th>
										<th>Job Name</th>
										<th>Issue date</th>
										<th>Unit</th>
										<th>Action</th>
                                    </tr>
                                </thead>								
                                <tbody>
								
								<?php
								//print_r($userdata);
								$i=0;
								foreach($jtndata as $recordslist) {
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
                                        <td><?php echo $recordslist->jtn_no;?></td>
                                        <td><?php echo $customerN = customervalue($recordslist->customer_id);?> </td>
										<td><?php echo $recordslist->type;?> </td>
										<td><?php echo $recordslist->job_name;?> </td>
										<td><?php echo date("d/m/Y",strtotime($recordslist->job_receive_date));?> </td>
										<td><?php echo $recordslist->unit;?> </td>
                                       	<td><a href="<?php echo base_url(); ?>jtn/edit_jtn?jtnid=<?php echo $recordslist->jtn_id;?>">Edit</a> / <a href="<?php echo base_url(); ?>jtn/view_jtn?jtnid=<?php echo $recordslist->jtn_id;?>">View</a></td>
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