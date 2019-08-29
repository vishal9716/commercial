<?php
if(!isset($this->session->userdata['logged_in'])) {
	header("location: http://localhost/commercial/index.php/login/");
        //redirect('login','refresh');
}

?>
<nav class="navbar navbar-default navbar-static-top topband fixed-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="<?php echo base_url(); ?>public/images/logo.png" class="img-responsive"></a>
				<?php
    $session_data = $this->session->userdata('logged_in');
    $username = $session_data['username'];

    ?>	
				<!--<span>Welcome <b></b></span>-->
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right d-flex">
                
                <li class="dropdown d-inline">
                    <a class="dropdown-toggle notification" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Notification
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                       
                        
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown user-wrap">
                    <button class="user dropdown-toggle" data-toggle="dropdown" href="#">
                    	<img src="<?php echo base_url(); ?>public/images/mail_user.jpg" class="img-responsive"> <div class="user_name">Welcome <p><?php echo $username;?></p></div>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a> </li> -->
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->            
            <!-- /.navbar-static-side -->
 </nav>
      