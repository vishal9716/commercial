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
                    <h1 class="page-header">Invoice List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>Invoice list form</span> <span class="activity"><a href="<?php echo base_url(); ?>invoice/add_invoice">Create Invoice </a></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Invoice #</th>
                                        <th>PO #</th> 
										<th>PO Date</th>
										<th>Client Name</th>
										<th>Invoice date</th>
										<th>Unit</th>
										<th>Action</th>
                                    </tr>
                                </thead>								
                                <tbody>
								
								<?php
								//print_r($userdata);
								$i=0;
								foreach($invoicedata as $recordslist) {
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
                                        <td><?php echo $recordslist->invoicing_no;?></td>
                                        <td><?php echo $recordslist->po_no;?> </td>
										<td><?php echo $recordslist->po_date;?> </td>
										<td><?php echo customervalue($recordslist->client_name);?> </td>
										<td><?php echo date("d/m/Y",strtotime($recordslist->invoice_date));?> </td>
										<td><?php echo $recordslist->unit_name;?> </td>
                                       	<td><a href="<?php echo base_url(); ?>invoice/edit_invoice?invid=<?php echo $recordslist->invoicing_id;?>">Edit</a> / <a href="<?php echo base_url(); ?>invoice/view_invoice?invid=<?php echo $recordslist->invoicing_id;?>">View</a></td>
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