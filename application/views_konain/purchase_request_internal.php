<?php echo $this->load->view("common/top_parul"); ?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <?php $this->load->view('header_message'); ?>
    <?php $this->load->view('left_message'); ?>
</nav>
<div id="page-wrapper">
    <br/>
    <!-- start-->

    <form action="" method="post" name="Formulaire">  
        <?php if (isset($errormsg)) { ?>						
            <div class="alert alert-danger">
                <?php echo $errormsg; ?>
            </div>
        <?php } ?>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Indenting Department<span class="text-danger"> *</span><a href="#" data-toggle="modal" data-target="#departmentModal" style="margin-left: 39px;" class="btn-border-orange"><span class="fa fa-plus"> &nbsp;</span>New Department</a></label>

                    <select id="departmentsDropdownSelect" class="form-control select2 select2-hidden-accessible" name="department">
                        <?php foreach ($departments as $department) { ?>
                            <option id="departmentsDropdown" value="<?php echo $department['department_id']; ?>"><?php echo $department['department_name']; ?></option>     
                        <?php } ?>  
                    </select> 	
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group" id="">
                    <label for="">S. No.</label>

                    <input class="form-control" placeholder="S. No"  disabled value="" id="pr_srno" name="">
      <!--<textarea class="example-default-value" id="example-textarea" style="width: 400px; height: 50px;">Test</textarea>-->
                </div>
            </div>
        </div>

        <div class="row">		
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Issuing date</label>
                    <input class="form-control" placeholder="Enter Date" type="date" id="issuing_date" name="issuing_date">
                    <span id="errMsg" class="text-danger"></span>
                </div>
            </div>  

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">On Phone/in person</label>
                    <input class="form-control" placeholder="Enter On Phone/in person" id="phone_person"  name="phone_person">
                    <span id="errMsg" class="text-danger"></span>
                </div>
            </div>    

        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Supplier/Make Referred</label>
                    <input class="form-control" placeholder="Enter Supplier/Make Referred" name="supplier_name" id="supplier_name">
                    <span id="errMsg" class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Action Taken by</label>
                    <input class="form-control" placeholder="Enter Action Taken by" id="action_taken_by" name="action_taken_by">
                    <span id="errMsg" class="text-danger"></span>
                </div>
            </div> 
        </div>



        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Order Placed by</label>
                    <input class="form-control auto ui-autocomplete-input" placeholder="Enter Order Placed by" name="order_placed_by" id="order_placed_by">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">PR Recd. On</label>
                    <input class="form-control" placeholder="Enter Date" id="pr_reacd_on"  disabled name="pr_reacd_on">			
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    &nbsp;&nbsp;
                    <label><input type="radio" name="optradio" value="capex"> Capex &nbsp;&nbsp;
                        <input type="radio" name="optradio" value="opex"> Opex</label>

                    <span id="errMsg" class="text-danger"></span>
                </div>
            </div> 
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for=""><a href="#" data-toggle="modal" data-target="#prModal"><span class="fa fa-plus"> &nbsp;</span>PURCHASE REQUISITION</a></label>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <input type="button" class="btn btn-info" name="pr_submit" value="Submit Request" onclick="add_pr();"/>
            </div>
        </div>
        <br/>
        <!--<div class="row">
                <div class="col-md-3">
<button type="submit" class="btn btn-primary btn-flat pull-left" id="btnSubmit">Upload Document</button>
                                </div>
                <div class="col-md-3">
<button type="submit" class="btn btn-primary btn-flat pull-left" id="btnSubmit">Send email to Purchase</button>
               </div>
               </div> -->
    </form>
    <!-- end -->


    <!--Purchase Modal Start-->
    <div class="modal fade" id="prModal" role="dialog" style="overflow:hidden;">
        <div class="modal-dialog modal-lg" style="width:95%;">
            <div class="modal-content">
                <div class="modal-header" style="overflow:hidden;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-info">PURCHASE REQUISITION</h4>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <!-- Editable table -->
                        <div class="card">

                            <!-- <h3 class="card-header text-center font-weight-bold text-uppercase py-4">PURCHASE REQUISITION</h3>-->
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-md-1">PR S. No.</div>
                                <div class="col-md-2"><input class="form-control" placeholder="Enter PR S. No." id="sr_no" name="sr_no" ></div>
                            </div>
                            <div class="card-body">
                                <div id="table" class="table-editable">

                                    <table class="table table-bordered table-responsive-md table-striped text-center" id="crud_table">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">S.No.</th>
                                                <th rowspan="2">Description</th>
                                                <th rowspan="2">Unit</th>
                                                <th rowspan="2">Avg. Cods.</th>
                                                <th rowspan="2">Qty. in Stock</th>
                                                <th rowspan="2">Reorder Point</th>
                                                <th rowspan="2">Reorder Quantity</th>
                                                <th rowspan="2">Qty. Req.</th>
                                                <th colspan="2"> Supplier</th>
                                                <th colspan="2">Order Placed on</th>
                                                <th rowspan="2">Action</th>
                                            </tr>
                                            <tr>
                                                <th> Rate </th>
                                                <th> Supplier </th>
                                                <th> Rate </th>
                                                <th> Supplier </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pr_srno" contenteditable="true"></td>
                                                <td class="pr_desp" contenteditable="true"></td>
                                                <td class="pr_unit" contenteditable="true"></td>
                                                <td class="pr_avg_cods" contenteditable="true"></td>
                                                <td class="pr_qty_stk" contenteditable="true"></td>
                                                <td class="pr_reorder_pt" contenteditable="true"></td>
                                                <td class="pr_reorder_qty" contenteditable="true"></td>
                                                <td class="pr_qty_req" contenteditable="true"></td>
                                                <td class="pr_supplier_rate" contenteditable="true"></td>
                                                <td class="pr_supplier_supplier" contenteditable="true"></td>
                                                <td class="pr_order_rate" contenteditable="true"></td>
                                                <td class="pr_order_supplier" contenteditable="true"></td>
                                                <td>

                                                    <span class="table-remove">
                                                        <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                                                    </span>
                                                    <span id="save" class="table-success">
                                                        <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                                                    </span>
                                                </td>
                                            </tr>
                                            <!-- This is our clonable table line -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Editable table -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--purchase Modal End-->

    <!--Department Modal Start-->
    <div class="modal fade" id="departmentModal" role="dialog" style="overflow:hidden;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-info">Department Information</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="DepartmentAdd" class="form-horizontal">

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <!--  <h4 class="text-info text-center" style="margin-left: 40px;">Project Information</h4>-->
                                        <div class="form-group">
                                            <label class="col-sm-4">Name</label>

                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="department_name" placeholder="Enter Department Name" name="department_name" value="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-4">Description</label>

                                            <div class="col-sm-8">
                                                <input type="text" value="" placeholder="Enter Description" class="form-control" id="department_descp" name="department_descp">
                                            </div>
                                        </div>


                                    </div>


                                </div>
                            </div><br>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="" class="btn btn-info btn-flat">Cancel</a>
                            <input type="button" class="btn btn-info" name="button" value="Submit" onclick="add_department();"/>

                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Department Modal End-->	  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>

                                                         function add_department() {
                                                             //alert("in");
                                                             var department_name = $('#department_name').val();
                                                             var department_descp = $('#department_descp').val();

                                                             // alert(department_name);
                                                             $.ajax({
                                                                 method: "POST",
                                                                 url: "<?php echo base_url(); ?>index.php/purchase_request/add_department",
                                                                 data: {department_name: department_name, department_descp: department_descp},
                                                                 success: function (data) {
                                                                     //alert(data);
                                                                     data = JSON.parse(data);

                                                                     $('#departmentsDropdownSelect').empty();

                                                                     for (var i = 0; i < data.length; i++) {
                                                                         $('#departmentsDropdownSelect').append($("<option></option>")
                                                                                 .attr("value", data[i]['department_id']).text(data[i]['department_name']));
                                                                     }


                                                                     $('#departmentModal').modal('hide');
                                                                     $('#department_name').val('');
                                                                     $('#department_descp').val('');
                                                                 },
                                                                 error: function (data) {

                                                                     alert("error");
                                                                 }
                                                             });
                                                         }


                                                         $(document).ready(function () {
															 
                                                             var count = 1;
                                                             $('#add').click(function () {
                                                                 count = count + 1;
                                                                 var html_code = "<tr id='row" + count + "'>";
                                                                 html_code += "<td class='pr_srno' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_desp' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_unit' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_avg_cods' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_qty_stk' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_reorder_pt' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_reorder_qty' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_qty_req' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_supplier_rate' contenteditable='true'></td>";
                                                                 html_code += " <td class='pr_supplier_supplier' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_order_rate' contenteditable='true'></td>";
                                                                 html_code += "<td class='pr_order_supplier' contenteditable='true'></td>";

                                                                 html_code += "<td><button type='button' name='remove' data-row='row" + count + "' class='btn btn-danger btn-xs remove'>-</button></td>";
                                                                 html_code += "</tr>";
                                                                 $('#crud_table').append(html_code);
                                                             });

                                                             $(document).on('click', '.remove', function () {
                                                                 var delete_row = $(this).data("row");
                                                                 $('#' + delete_row).remove();
                                                             });

                                                             $('#save').click(function () {
																// alert("in");
                                                                 var sr_no = $('#sr_no').val();
                                                                 var pr_desp = [];
                                                                 var pr_unit = [];
                                                                 var pr_avg_cods = [];
                                                                 var pr_qty_stk = [];
                                                                 var pr_reorder_pt = [];
                                                                 var pr_reorder_qty = [];
                                                                 var pr_qty_req = [];
                                                                 var pr_supplier_rate = [];
                                                                 var pr_supplier_supplier = [];
                                                                 var pr_order_rate = [];
                                                                 var pr_order_supplier = [];

                                                                 $('.pr_desp').each(function () {
                                                                     pr_desp.push($(this).text());
                                                                 });
                                                                 $('.pr_unit').each(function () {
                                                                     pr_unit.push($(this).text());
                                                                 });
                                                                 $('.pr_avg_cods').each(function () {
                                                                     pr_avg_cods.push($(this).text());
                                                                 });
                                                                 $('.pr_qty_stk').each(function () {
                                                                     pr_qty_stk.push($(this).text());
                                                                 });

                                                                 $('.pr_reorder_pt').each(function () {
                                                                     pr_reorder_pt.push($(this).text());
                                                                 });
                                                                 $('.pr_reorder_qty').each(function () {
                                                                     pr_reorder_qty.push($(this).text());
                                                                 });
                                                                 $('.pr_qty_req').each(function () {
                                                                     pr_qty_req.push($(this).text());
                                                                 });
                                                                 $('.pr_supplier_rate').each(function () {
                                                                     pr_supplier_rate.push($(this).text());
                                                                 });
                                                                 $('.pr_supplier_supplier').each(function () {
                                                                     pr_supplier_supplier.push($(this).text());
                                                                 });
                                                                 $('.pr_order_rate').each(function () {
                                                                     pr_order_rate.push($(this).text());
                                                                 });
                                                                 $('.pr_order_supplier').each(function () {
                                                                     pr_order_supplier.push($(this).text());
                                                                 });


                                                                 $.ajax({
                                                                     url: "<?php echo base_url(); ?>index.php/purchase_request/add_purchase_request",
                                                                     method: "POST",
                                                                     data: {sr_no: sr_no, pr_desp: pr_desp, pr_unit: pr_unit, pr_avg_cods: pr_avg_cods, pr_qty_stk: pr_qty_stk, pr_reorder_pt: pr_reorder_pt, pr_reorder_qty: pr_reorder_qty, pr_qty_req: pr_qty_req, pr_supplier_rate: pr_supplier_rate, pr_supplier_supplier: pr_supplier_supplier, pr_order_rate: pr_order_rate, pr_order_supplier: pr_order_supplier},
                                                                     success: function (data) {

                                                                        // alert(data);

                                                                         $('#prModal').modal('hide');

                                                                         jsonData = JSON.parse(data.trim());
                                                                         document.getElementById("pr_srno").value = jsonData[0].sr_no;


                                                                         $("td[contentEditable='true']").text("");
                                                                         for (var i = 2; i <= count; i++)
                                                                         {
                                                                             $('tr#' + i + '').remove();
                                                                         }

                                                                     }
                                                                 });
                                                             });




                                                         });
                                                         function add_pr() {
    //var department_id = $( "#departmentsDropdownSelect option:selected" ).val(); ---> for fetchching department name
                                                             var department_id = $("#departmentsDropdownSelect option:selected").val();
                                                             var issuing_date = $('#issuing_date').val();
                                                             var phone_person = $('#phone_person').val();
                                                             var supplier_name = $('#supplier_name').val();
                                                             var action_taken_by = $('#action_taken_by').val();
                                                             var pr_reacd_on = $('#pr_reacd_on').val();
                                                             var order_placed_by = $('#order_placed_by').val();
                                                             var pr_srno = document.getElementById("pr_srno").value;
                                                             var selectedOption = $("input:radio[name=optradio]:checked").val();
    //alert("<?php echo base_url(); ?>index.php/purchase_request/update_purchase_request/"+pr_srno);
    //alert(selectedOption);

                                                            // alert("--__------>" + department_name);
                                                            // alert(issuing_date);
                                                             $.ajax({
                                                                 method: "POST",
                                                                 url: "<?php echo base_url(); ?>index.php/purchase_request/update_purchase_request/" + pr_srno,
                                                                 data: {department_id: department_id, issuing_date: issuing_date, phone_person: phone_person, supplier_name: supplier_name, action_taken_by: action_taken_by, pr_reacd_on: pr_reacd_on, order_placed_by: order_placed_by, selectedOption: selectedOption},
                                                                 success: function (data) {
                                                                     alert(data);
                                                                    // data = JSON.parse(data);
                                                                     //json_decode($data);
                                                             window.location.href = "<?php echo base_url(); ?>index.php/purchase_request/purchase_request_list";
                                                                     $('#departmentModal').modal('hide');
                                                                     $('#department_name').val('');
                                                                     $('#department_descp').val('');
                                                                 },
                                                                 error: function (data) {

                                                                     alert("error");
                                                                 }
                                                             });
                                                         }

    </script>
    <?php echo $this->load->view("common/bottom"); ?>
  