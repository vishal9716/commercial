 <?php $this->load->view('common/top');?>	
	<script>
	function deletecustomer(custid)
	{
		var txt;
		var r = confirm("Are you sure wants to delete!");
		if (r == true) {
		  window.location.href = "<?php echo base_url(); ?>customer/delete_customer?custid="+custid;
		} else {
		  window.location.href = "<?php echo base_url(); ?>customer/";
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
                    <h1 class="page-header">Customer List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>Customer list form</span> <span class="activity"><a href="<?php echo base_url(); ?>customer/add_customer">Add Customer</a></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Customer Name</th>                                                                         
										<th>Action</th>
                                    </tr>
                                </thead>								
                                <tbody>
								
								<?php
								//print_r($userdata);
								$i=0;
								foreach($customerdata as $recordslist) {
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
                                        <td><?php echo $recordslist->customer_name;?></td>                                        
                                       	<td><a href="<?php echo base_url(); ?>customer/edit_customer?custid=<?php echo $recordslist->customer_id;?>">Edit</a> / <a href="javascript:deletecustomer('<?php echo $recordslist->customer_id;?>');">Delete</a></td>
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
 <?php $this->load->view('common/footer');?>