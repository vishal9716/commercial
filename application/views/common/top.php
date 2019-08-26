<!DOCTYPE html>
<html lang="en">

<head>
<link rel="canonical" href="https://mdbootstrap.com/docs/jquery/tables/editable/" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Commercial/Billing Automation</title>

    <!-- Bootstrap Core CSS -->
	
    <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!--Google font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Roboto:100,300,400,500,700" rel="stylesheet"> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style type="text/css">
		   .table th {
        text-align: center;
   
}
	.pt-3-half {
      padding-top: 1.4rem;
}	
		<!--css for editor -->
		.cke_chrome {
   		
    	 width: 89%;
}
		   </style>
	
	
	
	<script>
	function delete_quotation(quot_sub_activity_id,quotation_id)
	{
		//alert("quot_sub_actity id-----"+quot_sub_activity_id);
		//alert("quotation id ---"+quotation_id);
		var txt;
		var r = confirm("Are you sure wants to delete!");
		if (r == true) {
	 window.location.href = "<?php echo base_url(); ?>index.php/operations/delete_quotation?qsaid="+quot_sub_activity_id+"&qid="+quotation_id;
		} else {
		  window.location.href = "<?php echo base_url();?>index.php/operations/quotation_list";
		} 
	}
	</script>
	

</head>


<body>

    <div id="wrapper">

       