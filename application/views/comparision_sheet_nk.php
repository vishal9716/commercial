<?php echo $this->load->view("common/top"); ?>
<style>
	 table, th, td  {
  text-align: left;
}
</style>

                <?php $this->load->view('header_message'); ?>
                <?php $this->load->view('left_message'); ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comparison Sheet</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Add Comparision Sheet - <?php echo $_GET['sr_no'];?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="table" class="table-editable table-responsive">
                                    <table class="table table-bordered table-responsive-md table-striped text-center" id="crud_table">
                                      <thead>
      <tr>
        <th rowspan="2">S.No.</th>
        <th rowspan="2">Item Description</th>
		<th rowspan="2">Unit</th>
        <th rowspan="2">Qty</th>
        <th colspan="2"><input class="form-control" type="text" name="vendor_1" id="vendor_1" value="Vendor 1"/></th>		
        <th colspan="2"><input class="form-control" type="text" name="vendor_2" id="vendor_2" value="Vendor 2"/></th>
        <th colspan="2"><input class="form-control" type="text" name="vendor_3" id="vendor_3" value="Vendor 3"/></th>
	    <th rowspan="2">Action</th>
    </tr>
    <tr>
		<th> Unit Price-(INR) </th>
		<th> Total Amount-(INR) </th>
        <th> Unit Price-(INR) </th>
		<th> Total Amount-(INR) </th>
		<th> Unit Price-(INR) </th>
		<th> Total Amount-(INR) </th>
     </tr>
   </thead>							
                                        <tbody>

                                            <tr class="even gradeC" id="row_1">
                                                <td class="srno" contenteditable="true">1</td>
                                                <td class="item_desp" id="item_desp_1" contenteditable="true"></td>
                                                <td class="unit" id="unit_1" contenteditable="true"></td>
                                                <td class="qty" id="qty_1" contenteditable="true"></td>
                                                <td class="quoted_unit_price" contenteditable="true"></td>
                                                <td class="quoted_total_price" contenteditable="true"></td>
                                                <td class="final_quoted_unit_price" contenteditable="true"></td>
                                                <td class="final_quoted_total_price" contenteditable="true"></td>
												<td class="final_quoted_unit_price" contenteditable="true"></td>
                                                <td class="final_quoted_total_price" contenteditable="true"></td>
                                                <td>
                                                    <button type="button" title="Add PR" name="add" id="add" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button>
                                                </td>

                                            </tr>

                                        </tbody>
										<tfoot>
											<tr style="background:#e3e3e3;">
										<th colspan="1" class="" style="text-align: left;">Amount</th>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
	 									<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td>
                                                </td>
                                        </tr>
										</tfoot>
                                    </table>
									
<table class="table table-bordered table-responsive-md table-striped text-center mb-0 bottomTbl" id="fixAtPositionForSignature">
                                        <tbody>
										
										
											
										<tr>
										 <td colspan="12" class="" contenteditable="true"></td>
									   </tr>
										<tr>
										<th colspan="1" class="" contenteditable="true" style="text-align: left;">Terms and conditions</th>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
	 									<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
                                         </tr>
										<tr>
										<td colspan="1" class="" contenteditable="true">IGST @18%</td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
	 									<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
                                         </tr>
											 <tr>
										<td colspan="1" class="" contenteditable="true">Payment terms</td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
	 									<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
                                         </tr>
											 <tr>
										<td colspan="1" class="" contenteditable="true">Delivery</td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
	 									<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
                                         </tr>
											 <tr>
										<td colspan="1" class="" contenteditable="true">Installation</td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
	 									<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
                                         </tr>
											 <tr>
										<td colspan="1" class="" contenteditable="true">Total Amount</td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
	 									<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
										<td colspan="1" class="" contenteditable="true"></td>
                                         </tr>
									    
											
										
									  <tr >
										  <td class="" colspan="12" style="padding:15px !important;"><b>Comments:</b> As the above statement shows, it is recommended to release the order to M/s Shining Star Services</td>
			</tr>
											 <tr>
										 <td colspan="12" class="" contenteditable="true"></td>
									   </tr>
											<tr>
										<td colspan="4" class="" contenteditable="true">Ramesh Datt</td>
										<td colspan="4" class="" contenteditable="true">Mohan Bansal</td>
										<td colspan="4" class="" contenteditable="true">MS Vinod</td>
										
                                         </tr>
                                         </tbody>
                                    </table>
									
									
                                     
                                    <span style="float: left;margin-top:10px;">
                                        <button type="button" name="save_comp" id="save_comp" class="btn btn-info btn-sm"><i class="fa fa-save"></i> Save</button>
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
                (function() {
                    var pr_list=<?php echo $pr_info; ?>;
                    var ty=Object.keys(pr_list).length;                   
                    var count = 1 ;
                    $.each(pr_list, function (index, value) {
                        var desc=value.pr_description;
                        var units=value.units;
                        var qty_req=value.qty_req; 
                        if(count == 1){
                            $("#item_desp_"+count).text(desc);
                            $("#unit_"+count).text(units);
                            $("#qty_"+count).text(qty_req);
                        }else{
                            addRow(count,desc,units,qty_req)
                        }
                        count++;
                    });                  
                })();
             });
             
            function addRow(count,desc,units,qty_req){               
                var html_code = "<tr id='row_" + count + "'>";
                html_code += "<td class='srno' contenteditable='true'>" + count + "</td>";
                html_code += "<td class='item_desp' contenteditable='true'>"+desc+"</td>";
                html_code += "<td class='unit' contenteditable='true'>"+units+"</td>";
                html_code += "<td class='qty'  contenteditable='true'>"+qty_req+"</td>";
                html_code += "<td class='quoted_unit_price' contenteditable='true'></td>";
                html_code += "<td class='quoted_total_price' contenteditable='true'></td>";
                html_code += "<td class='final_quoted_unit_price' contenteditable='true'></td>";
                html_code += "<td class='final_quoted_total_price' contenteditable='true'></td>";
                html_code += "<td class='' contenteditable='true'></td>";
                html_code += "<td class='' contenteditable='true'></td>";
                html_code += "<td><button title='Remove Item' type='button' name='remove' data-row='row_" + count + "' class='btn btn-danger remove'>-</button></td>";
                html_code += "</tr>";
                $('#crud_table').append(html_code);
            }
            
            $(document).ready(function () { 
                var pr_list=<?php echo $pr_info; ?>;
                var length=Object.keys(pr_list).length;
                if(length > 0){
                    var count= length;
                }else{
                    var count = 1; 
                }
                $('#add').click(function () {
                    count = count + 1;
                    var html_code = "<tr id='row_" + count + "'>";
                    html_code += "<td class='srno' contenteditable='true'>" + count + "</td>";
                    html_code += "<td class='item_desp' contenteditable='true'></td>";
                    html_code += "<td class='unit' contenteditable='true'></td>";
                    html_code += "<td class='qty'  contenteditable='true'></td>";
                    html_code += "<td class='quoted_unit_price' contenteditable='true'></td>";
                    html_code += "<td class='quoted_total_price' contenteditable='true'></td>";
                    html_code += "<td class='final_quoted_unit_price' contenteditable='true'></td>";
                    html_code += "<td class='final_quoted_total_price' contenteditable='true'></td>";
                    html_code += "<td class='' contenteditable='true'></td>";
                    html_code += "<td class='' contenteditable='true'></td>";
                    html_code += "<td><button title='Remove Item' type='button' name='remove' data-row='row_" + count + "' class='btn btn-danger remove'>-</button></td>";
                    html_code += "</tr>";
                    $('#crud_table').append(html_code);
                });
                $(document).on('click', '.remove', function () {
                    var delete_row = $(this).data("row");
                    $('#' + delete_row).remove();
                });
                $('#save_comp').click(function () {
                    //alert("in--");
					var sr_no = "<?php echo $_GET['sr_no'];?>";
					//alert(sr_no);
                    var item_desp = [];
                    var unit = [];
                    var qty = [];
                    var quoted_unit_price = [];
                    var quoted_total_price = [];
                    var final_quoted_unit_price = [];
                    var final_quoted_total_price = [];
                  
                    $('.item_desp').each(function () {
                        item_desp.push($(this).text());
                    });
                    $('.unit').each(function () {
                        unit.push($(this).text());
                    });
                    $('.qty').each(function () {
                        qty.push($(this).text());
                    });
                    $('.quoted_unit_price').each(function () {
                        quoted_unit_price.push($(this).text());
                    });
                    $('.quoted_total_price').each(function () {
                        quoted_total_price.push($(this).text());
                    });
                    $('.final_quoted_unit_price').each(function () {
                        final_quoted_unit_price.push($(this).text());
                    });
                    $('.final_quoted_total_price').each(function () {
                        final_quoted_total_price.push($(this).text());
                    });
                
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/purchase_request/add_comparision",
                        method: "POST",
 data: {sr_no:sr_no, item_desp: item_desp, unit: unit, qty: qty, quoted_unit_price: quoted_unit_price, quoted_total_price: quoted_total_price, final_quoted_unit_price: final_quoted_unit_price, final_quoted_total_price: final_quoted_total_price},
                        success: function (data) {
                            alert(data);
window.location.href = "<?php echo base_url(); ?>index.php/purchase_request/comparision_history";  
                            $('#prModal').modal('hide');
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