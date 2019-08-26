<!DOCTYPE html>
<html lang="en">

    <head>

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



        <script>
            function deleteuser(userid)
            {
                var txt;
                var r = confirm("Are you sure wants to delete!");
                if (r == true) {
                    window.location.href = "<?php echo base_url(); ?>index.php/user/delete_user?uid=" + userid;
                } else {
                    window.location.href = "<?php echo base_url(); ?>/index.php/user/";
                }
            }
        </script>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <?php $this->load->view('header_message'); ?>
                <?php $this->load->view('left_message'); ?>
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">NEGOTIATION MATRIX</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Add NEGOTIATION - <?php echo $_GET['sr_no'];?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="table" class="table-editable">
                                    <table class="table table-bordered table-responsive-md table-striped text-center" id="crud_table">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Date</th>
                                                <th>Vendor Person</th>
                                                <th>Contact Person</th>
                                                <th>Number</th>
                                                <th>Negotiation</th>
                                                <th>Remarks</th>
                                                <th>Signature</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>								
                                        <tbody>

                                            <tr class="even gradeC">
                                                <td class="srno" contenteditable="true">1.</td>
                                                <td class="date" contenteditable="true"></td>
                                                <td class="vendor_person" contenteditable="true"></td>
                                                <td class="contact_person" contenteditable="true"></td>
                                                <td class="number" contenteditable="true"></td>
                                                <td class="negotiation" contenteditable="true"></td>
                                                <td class="remarks" contenteditable="true"></td>
                                                <td class="signature" contenteditable="true"></td>
                                                <td>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                    <span style="float:right;">
                                        <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                                    </span>
                                    <span style="float: center;">
                                        <button type="button" name="save_nego" id="save_nego" class="btn btn-info">Save</button>
                                    </span>
                                    <br />
                                    <!-- /.table-responsive -->
                                </div>     
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function () {

                var count = 1;
                $('#add').click(function () {

                    count = count + 1;
                    var html_code = "<tr id='row" + count + "'>";
                    html_code += "<td class='srno' contenteditable='true'></td>";
                    html_code += "<td class='date' contenteditable='true'></td>";
                    html_code += "<td class='vendor_person' contenteditable='true'></td>";
                    html_code += "<td class='contact_person' contenteditable='true'></td>";
                    html_code += "<td class='number' contenteditable='true'></td>";
                    html_code += "<td class='negotiation' contenteditable='true'></td>";
                    html_code += "<td class='remarks' contenteditable='true'></td>";
                    html_code += "<td class='signature' contenteditable='true'></td>";

                    html_code += "<td><button type='button' name='remove' data-row='row" + count + "' class='btn btn-danger btn-xs remove'>-</button></td>";
                    html_code += "</tr>";
                    $('#crud_table').append(html_code);
                });

                $(document).on('click', '.remove', function () {
                    var delete_row = $(this).data("row");
                    $('#' + delete_row).remove();
                });


                $('#save_nego').click(function () {
                    //alert("in--");
					var sr_no = "<?php echo $_GET['sr_no'];?>";
                    //var srno = $('#srno').val();
                    var date = [];
                    var vendor_person = [];
                    var contact_person = [];
                    var number = [];
                    var negotiation = [];
                    var remarks = [];
                    var signature = [];
                  

                    $('.date').each(function () {
                        date.push($(this).text());
                    });
                    $('.vendor_person').each(function () {
                        vendor_person.push($(this).text());
                    });
                    $('.contact_person').each(function () {
                        contact_person.push($(this).text());
                    });
                    $('.number').each(function () {
                        number.push($(this).text());
                    });

                    $('.negotiation').each(function () {
                        negotiation.push($(this).text());
                    });
                    $('.remarks').each(function () {
                        remarks.push($(this).text());
                    });
                    $('.signature').each(function () {
                        signature.push($(this).text());
                    });
                
		//alert("<?php echo base_url(); ?>index.php/purchase_request/add_negotiation/"+sr_no);

                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/purchase_request/add_negotiation/"+sr_no,
                        method: "POST",
 data: {date: date, vendor_person: vendor_person, contact_person: contact_person, number: number, negotiation: negotiation, remarks: remarks, signature: signature},
                        success: function (data) {

                            alert(data);
window.location.href = "<?php echo base_url(); ?>index.php/purchase_request/negotiation_list"; 
                          
                            jsonData = JSON.parse(data);
                            document.getElementById("pr_srno").value = jsonData[0].sr_no;


                            $("td[contentEditable='true']").text("");
                            for (var i = 2; i <= count; i++)
                            {
                                $('tr#' + i + '').remove();
                            }
                            fetch_item_data();
                        }
                    });
                });
            });
        </script>

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
