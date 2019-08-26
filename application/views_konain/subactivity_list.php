 <?php $this->load->view('common/top');?>
	
	<script>
	function deletesubactivity(actid)
	{
		var txt;
		var r = confirm("Are you sure wants to delete!");
		if (r == true) {
		  window.location.href = "/commercial/subactivity/delete_subactivity?subaid="+actid;
		} else {
		  window.location.href = "/commercial/subactivity/";
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
                    <h1 class="page-header">Sub-Activity List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>Sub Activity listing</span> <span class="activity"><a href="/commercial/subactivity/add_subactivity">Add Sub-Activity</a></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Activity Name</th>
                                        <th>Sub-Activity Name</th>                                   
										<th>Action</th>
                                    </tr>
                                </thead>								
                                <tbody>
								
								<?php
								//print_r($userdata);
								$i=0;
								foreach($subactivitydata as $recordslist) {
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
                                        <td><?php echo $recordslist->activity_name;?></td>
                                        <td><?php echo $recordslist->sub_activity_name;?> </td>
                                       	<td><a href="/commercial/subactivity/edit_subactivity?subactid=<?php echo $recordslist->sub_activity_id;?>">Edit</a> / <a href="javascript:deletesubactivity('<?php echo $recordslist->sub_activity_id;?>');">Delete</a></td>
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