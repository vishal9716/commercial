 <?php $this->load->view('common/top');?>	
<script>
function login_validate()
{
	if(document.getElementById("username").value=='')
	{
		alert("Please enter the username");
		document.getElementById("username").focus();
		return false;
	}
		
	if(document.getElementById("password").value=='')
	{
		alert("Please enter the password");
		document.getElementById("password").focus();
		return false;
	}
	return true;
}
</script>	

</head>

<body>

		<div class="container">
        <div class="row">
				<div class="col-lg-12">
                    <h1 class="page-header">Commercial/Billing Automation</h1>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="/commercial/login/login_submit" onsubmit="return login_validate();">
                            <fieldset>
									<?php if (isset($error_message)) {	?>					
                                    <div class="alert alert-danger">
										<?php echo $error_message; ?>
									</div>
									<?php } ?>
							
                                <div class="form-group">
                                    <!-- <input class="form-control" placeholder="E-mail" name="email" id="email" type="email" autofocus> -->
									<input class="form-control" placeholder="User name" name="username" id="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
								<input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

 <?php $this->load->view('common/footer');?>
