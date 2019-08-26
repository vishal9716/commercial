<?php  $this->load->view("common/top"); ?>
<?php $this->load->view('header_message'); ?>
<?php $this->load->view('left_message'); ?>

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
//                            echo "<pre>";
//                            print_r($userdata);
                            $i = 0;
                            foreach ($userdata as $recordslist) {
                                $i++;
                                if ($i % 2 == 0) {
                                    $classname = "odd gradeX";
                                } else {
                                    $classname = "even gradeC";
                                }
                                
                                ?>

                                <tr class="<?php echo $classname; ?>">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $recordslist->username; ?></td>
                                    <td><?php echo $recordslist->fname; ?> <?php echo $recordslist->lname; ?></td>
                                    <td><?php echo $recordslist->email_id; ?></td>
                                    <td><?php echo $recordslist->type_name; ?></td>
                                    <td><?php echo User_Database::$userStatus[$recordslist->status]; ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($recordslist->created_date)); ?></td>
                                    <td><a href="<?php echo base_url(); ?>index.php/user/edit_user?uid=<?php echo $recordslist->uid; ?>">Edit</a> / <a href="javascript:deleteuser('<?php echo $recordslist->uid; ?>');">Delete</a></td>
                                </tr>
<?php } ?>

                        </tbody>
                    </table>
                    <?php if($pagelinks != '' && !empty($pagelinks)){ echo $pagelinks; } ?>
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
<!-- jQuery -->
<script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url(); ?>vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url(); ?>data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>dist/js/sb-admin-2.js"></script>
</body>
</html>
<script>
    function deleteuser(userid)
    {
            var txt;
            var r = confirm("Are you sure wants to delete!");
            if (r == true) {
              window.location.href = "/sales/user/delete_user?uid="+userid;
            } else {
              window.location.href = "/sales/user/";
            } 
    }
</script>
<?php /* 
<!--<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>

        <style type="text/css">

        ::selection{ background-color: #E13300; color: white; }
        ::moz-selection{ background-color: #E13300; color: white; }
        ::webkit-selection{ background-color: #E13300; color: white; }

        body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
        }

        a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
        }

        h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
        }

        code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
        }

        #body{
                margin: 0 15px 0 15px;
        }
        
        p.footer{
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
        }
        
        #container{
                margin: 10px;
                border: 1px solid #D0D0D0;
                -webkit-box-shadow: 0 0 8px #D0D0D0;
        }
        </style>
</head>
 <body>

<div id="container">
        <h1>Welcome to CodeIgniter!</h1>

        <div id="body">
                <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

                <p>If you would like to edit this page you'll find it located at:</p>
                <code>application/views/welcome_message.php</code>

                <p>The corresponding controller for this page is found at:</p>
                <code>application/controllers/welcome.php</code>

                <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
        </div>

        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> second</p>
</div> 

</body>
</html>-->
 */ ?>
 