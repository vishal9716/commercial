 <?php $this->load->view('common/top');?>
	
	<script>
	function deleteuser(userid)
	{
		var txt;
		var r = confirm("Are you sure wants to delete!");
		if (r == true) {
		  window.location.href = "/commercial/user/delete_user?uid="+userid;
		} else {
		  window.location.href = "/commercial/user/";
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
                    <h1 class="page-header">User List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User listing
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Login / Token</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
										<th>Status</th>
										<th>Created on</th>
										<th>Action</th>
                                    </tr>
                                </thead>								
                                <tbody>
								
								<?php
								//print_r($userdata);
								$i=0;
								foreach($userdata as $recordslist) {
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
                                        <td><?php echo $recordslist->username;?></td>
                                        <td><?php echo $recordslist->fname;?> <?php echo $recordslist->lname;?></td>
                                        <td><?php echo $recordslist->email_id;?></td>
                                        <td><?php 
										foreach($typedata as $recordstypelist) {
												
												if($recordstypelist->type_id == $recordslist->type)
												{
													echo $recordstypelist->type_name;
												}
										}
										?></td>
										<td><?php echo $recordslist->status;?></td>
										<td><?php echo date("d/m/Y",strtotime($recordslist->u_date));?></td>
										<td><a href="/commercial/user/edit_user?uid=<?php echo $recordslist->uid;?>">Edit</a> / <a href="javascript:deleteuser('<?php echo $recordslist->uid;?>');">Delete</a></td>
                                    </tr>
								<?php } ?>
									
                                    <!-- <tr class="even gradeC">
                                        <td>Trident</td>
                                        <td>Internet Explorer 5.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">5</td>
                                        <td class="center">C</td>
										<td>Win 95+</td>
										<td>Win 95+</td>
										<td>Win 95+</td>
                                    </tr>  -->
																	
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