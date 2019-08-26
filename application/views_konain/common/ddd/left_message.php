<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/user/add_user">Add User</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/user/">User List</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Type<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/type/add_type">Add Type</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url(); ?>index.php/type/">Type List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href=""><i class="fa fa-table fa-fw"></i> Access control</a>
                        </li>
												
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Estimation/Quotation<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/operations">Add Quotation</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url(); ?>index.php/operations/quotation_list">Quotation List</a>
                                </li>
								
								<li>
                                    <a href="<?php echo base_url(); ?>index.php/operations/customer_list">Customer List</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url(); ?>index.php/operations/project_list">Project List</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url(); ?>index.php/operations/activity_list">Activity List</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> MHR <span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/mhr">MHR Calculations</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url(); ?>index.php/mhr/mhr_list">MHR List</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> JTN Issue<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_jtn.php">Add JTN</a>
                                </li>
								<li>
                                    <a href="jtn_list.php">JTN List</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						
						<!-- purchase request/ purchase order -->
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Purchase Request<span class="fa arrow"></span></a>

<ul class="nav nav-second-level">
<li> <a href="<?php echo base_url(); ?>index.php/purchase_request/internal">Purchase Request - Internal</a> </li>
<li> <a href="<?php echo base_url(); ?>index.php/purchase_request/purchase_request_list">Purchase Request List</a></li>
<li> <a href="<?php echo base_url(); ?>index.php/purchase_request/checklist">Checklist</a> </li>
	<li><a href="<?php echo base_url(); ?>index.php/purchase_request/checklist_listing">Checklist Listing</a></li>
	<li> <a href="<?php echo base_url(); ?>index.php/purchase_request/comparision">Comparision</a> </li>
	<li> <a href="<?php echo base_url(); ?>index.php/purchase_request/comparision_history">Comparision History</a> </li>
<li><a href="<?php echo base_url(); ?>index.php/purchase_request/audit_checklist">Audit Checklist</a></li>
<li><a href="<?php echo base_url(); ?>index.php/purchase_request/audit_checklist_listing">Audit Checklist Listing</a></li>
<li> <a href="<?php echo base_url(); ?>index.php/purchase_request/negotiation">Negotiation</a> </li>

<li> <a href="<?php echo base_url(); ?>index.php/purchase_request/negotiation_list">Negotiation List</a> </li>
<li> <a href="<?php echo base_url(); ?>index.php/purchase_request/import">Purchase Request - Import</a> </li>
								
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Purchase Order<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/purchase_order">Purchase Order</a>
                                </li>
								
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
</div>