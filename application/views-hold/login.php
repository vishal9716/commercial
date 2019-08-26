<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    
    <title>
      Digiscape-Admin | Login
    </title>
    
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/app.v1.css">
    
    <!--[if lt IE 9]>

<script src="<?php echo base_url();?>public/js/ie/respond.min.js" cache="false">
</script>

<script src="<?php echo base_url();?>public/js/ie/html5.js" cache="false">
</script>

<script src="<?php echo base_url();?>public/js/ie/fix.js" cache="false">
</script>

<![endif]-->

</head>


<body>
    
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
      
      <a class="nav-brand" href="">
        DIGISCAPE-ADMIN LOGIN
      </a>
      
      <div class="row m-n">
        
        <div class="col-md-4 col-md-offset-4 m-t-lg">
          
          <section class="panel">
            
            <header class="panel-heading text-center">
              LOGIN
            </header>
            <?php if($errormsg!='') { ?>
			<div class="alert alert-danger" id="loginerror">
                  <strong>
                    Warning!
                  </strong>
					<?php echo $errormsg; ?>
                </div>
			<?php } ?>
          <form action="<?php echo base_url(); ?>index.php/login/checklogin" method="post" name="loginadmin" id="loginadmin" class="panel-body">
              
              
              <div class="form-group"><label class="control-label">User Name</label>
                <input type="text" placeholder="user name" name="username" class="form-control">
              </div>
              
              <div class="form-group"><label class="control-label">Password</label>
                <input type="password" id="inputPassword" name="pass" placeholder="Password" class="form-control">
              </div>
              
              <div class="checkbox"><label><input type="checkbox">Keep me logged in</label>
              </div>
              
              <button type="submit" class="btn btn-success">
                Sign in
              </button>          
               <div><a href="">Forget Password</a></div>
             
              
            </form>
            
          </section>
          
        </div>
        
      </div>
      
    </section>
    
    <!-- footer -->
    
    <footer id="footer">
      
      <div class="text-center padder clearfix">
        
        <p>
          
          <small>
           Digiscape Solutions Pvt. Ltd.
            <br>
            
          </small>
          
        </p>
        
      </div>
      
    </footer>
    
    <!-- / footer -->
    
    <!-- Bootstrap -->
    
    <!-- app -->
   
   <script src="<?php echo base_url();?>public/css/app.v1.js">
    </script>
   
  </body>
</html>
        