<?php $this->load->view("common/top"); ?>
<?php $this->load->view('header_message'); ?>
<?php $this->load->view('left_message'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Purchase Request Internal</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="" method="post" name="Formulaire">
                <?php if (isset($errormsg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $errormsg; ?>
                    </div>
                <?php } ?>
                <?php //print_r ($units_region);?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Unit</label>
                            <select id="unitDropdownSelect" class="form-control select2 select2-hidden-accessible" name="unit">
                                <option hidden value="" >--Select Units--</option>
                                <?php foreach ($units_region as $units) { ?>

                                    <option id="departmentsDropdown"  value="<?php echo $units['unit_region_id']; ?>"><?php echo $units['unit_region_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" id="">
                            <label for="">S. No.</label>
                            <input class="form-control" placeholder="S. No"  disabled value="" id="pr_srno" name="srno">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Indenting Department<span class="text-danger"> *</span><a href="#" data-toggle="modal" data-target="#departmentModal" style="margin-left: 39px;" class="btn-border-orange pull-right"><span class="fa fa-plus"> &nbsp;</span>New Department</a></label>
                            <select id="departmentsDropdownSelect" class="form-control select2 select2-hidden-accessible" name="department">
                                <option hidden value="" >--Select Department--</option>
                                <?php foreach ($departments as $department) { ?>
                                    <option id="departmentsDropdown" value="<?php echo $department['department_id']; ?>"><?php echo $department['department_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="radio" id="phone_person" name="phone_person" value="1" > On Phone &nbsp;&nbsp;
                                <input type="radio"  id="phone_person" name="phone_person" value="2" checked /> In person</label>

                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Issuing date</label>
                            <input class="form-control" placeholder="Enter Date" value="<?php echo date("Y-m-d"); ?>" type="date" id="issuing_date" name="issuing_date">
                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Action Taken by</label>
                            <select id="action_taken_by" class="form-control select2 select2-hidden-accessible" name="action_taken_by">
                                <?php foreach ($actionTakenBy as $action) { ?>
                                    <option value="<?php echo $action['type_id']; ?>"><?php echo $action['type_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Supplier/Make Referred<a href="#" data-toggle="modal" data-target="#supplierModal" style="margin-left: 39px;" class="btn-border-orange pull-right"><span class="fa fa-plus"> &nbsp;</span>New Supplier</a></label>
                            <select id="supplierDropdownSelect" class="form-control select2 select2-hidden-accessible" name="department">
                                <?php foreach ($suppliers as $supplier) { ?>
                                    <option id="departmentsDropdown" value="<?php echo $supplier['supplier_id']; ?>"><?php echo $supplier['supplier_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>
                    <?php
                    $session_data = $this->session->userdata('logged_in');
                    $username = $session_data['username'];
                    $firstname = $session_data['firstname'];
                    $lastname = $session_data['lastname'];
                    ?>           
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Order Placed by</label>
                            <input class="form-control auto ui-autocomplete-input" placeholder="Enter Order Placed by" value="<?php echo ucfirst($username); ?>" name="order_placed_by" id="order_placed_by">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            &nbsp;&nbsp;
                            <label><input type="radio" id="expense" name="expense" value="1" checked> opEx &nbsp;&nbsp;
                                <input type="radio" id="expense" name="expense" value="2"> capEx</label>
                            <span id="errMsg" class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><a href="#" onclick="createPurchaseRequest()" data-toggle="modal" data-target="#prModal"><span class="fa fa-plus"> &nbsp;</span>PURCHASE REQUISITION</a></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <input type="button" class="btn btn-danger bg-red" name="pr_submit" value="Submit Request" onclick="add_pr();"/>
                    </div>
                </div>
                <br/>
            </form>
            <!-- end -->
        </div>
    </div>

    <!--Purchase Modal Start-->
    <div class="modal fade" id="prModal" role="dialog" style="overflow:hidden;">
        <div class="modal-dialog modal-lg" style="width:95%;">
            <div class="modal-content">
                <div class="modal-header" style="overflow:hidden;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">PURCHASE REQUISITION</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">

                        <!-- Editable table -->
                        <div class="card">

                            <!-- <h3 class="card-header text-center font-weight-bold text-uppercase py-4">PURCHASE REQUISITION</h3>-->
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-md-1">PR S. No.</div>
                                <div class="col-md-4">
                                    <input class="form-control" placeholder="Enter PR S. No." readonly="readonly" value="" id="sr_no" name="sr_no" >
                                    <span  id ="missing-srnum" class="alert-danger" hidden></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="table" class="table-editable ">
                                    <table class="table table-bordered table-responsive-md table-striped text-center mb-0" id="crud_table">
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
                                                <th> Total </th>
                                                <th> Rate </th>
                                                <th> Toatl </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="row_1">
                                                <td class="pr_srno" contenteditable="true">1</td>
                                                <td class="pr_desp" contenteditable="true"></td>
                                                <td class="pr_dept_id" contenteditable="false" hidden ></td>
                                                <td class="pr_unit" contenteditable="true"></td>
                                                <td class="pr_avg_cods" contenteditable="true"></td>
                                                <td class="pr_qty_stk" contenteditable="true"></td>
                                                <td class="pr_reorder_pt" contenteditable="true"></td>
                                                <td class="pr_reorder_qty" contenteditable="true"></td>
                                                <td class="pr_qty_req" id="pr_qty_req_1" contenteditable="true"></td>
                                                <td class="pr_supplier_rate" id="pr_supplier_rate_1" contenteditable="true"></td>
                                                <td class="pr_supplier_supplier" id="pr_supplier_supplier_1" onclick="calculateTotal(1)" contenteditable="true"></td>
                                                <td class="pr_order_rate"  id="pr_order_rate_1" contenteditable="true"></td>
                                                <td class="pr_order_supplier"id="pr_order_supplier_1" onclick="calculateTotal(1)"  contenteditable="true"></td>
                                                <td>

                                                    <span class="table-remove">
                                                        <button title="Save PR" type="button" name="save" id="save_pr" class="btn btn-info btn-sm"><i class="fa fa-save"></i></button>
                                                    </span>
                                                    <span id="save" class="table-success">
                                                        <button title="Add Item" type="button" name="add" id="add" class="btn btn-success  btn-sm"><i class="fa fa-plus"></i></button>
                                                    </span>
                                                </td>
                                            </tr>
                                            <!-- This is our clonable table line -->

                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="8">Total</th>

                                                <th  colspan="1" class="" contenteditable="true"></th>
                                                <th  colspan="1" class="" contenteditable="true"></th>               
                                                <td></td> 
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <table class="table table-bordered table-responsive-md table-striped text-center mb-0" id="fixAtPositionForSignature">
                                        <tbody>
                                            
                                            <tr>
                                                <td colspan="2" style="text-align: left;" contenteditable="true">ORIGINATOR : <?php echo ucfirst($firstname) . " " . ucfirst($lastname); ?></td>
                                                <td colspan="2" class="" contenteditable="true">Unit Head : <?php echo ucfirst(); ?></td>
                                                <td colspan="2" class="" contenteditable="true">STORE</td>
                                                <td colspan="2" class="" contenteditable="true">PURCHASE</td>
                                                <td colspan="3" class="" contenteditable="true">ED/FA</td>

                                            </tr>
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
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Department Information</h4>
                </div>
                <form action="" method="post" id="DepartmentAdd" class="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12"> <!--  <h4 class="text-info text-center" style="margin-left: 40px;">Project Information</h4>-->
                                <div class="form-group">
                                    <label class="">Name</label>

                                    <div class="">
                                        <input type="text" class="form-control" id="department_name" placeholder="Enter Department Name" name="department_name" value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="">Description</label>

                                    <div class="">
                                        <input type="text" value="" placeholder="Enter Description" class="form-control" id="department_descp" name="department_descp">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="">Description Code</label>

                                    <div class="">
                                        <input type="text" value="" placeholder="Enter Description Code" class="form-control" id="department_code" name="department_code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->



                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-default pull-left">Cancel</a>
                        <input type="button" class="btn btn-danger bg-red" name="button" value="Submit" onclick="add_department();"/>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
    <!--Department Modal End-->

    <!--Supplier Modal Start-->
    <div class="modal fade" id="supplierModal" role="dialog" style="overflow:hidden;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Supplier Information</h4>
                </div>
                <form action="" method="post" id="SupplierAdd">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <!--  <h4 class="text-info text-center" style="margin-left: 40px;">Project Information</h4>-->
                                    <div class="form-group">
                                        <label class="">Name</label>

                                        <div class="">
                                            <input type="text" class="form-control" id="supplier_name" placeholder="Enter Supplier Name" name="supplier_name" value="">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="">Description</label>

                                        <div class="">
                                            <input type="text" value="" placeholder="Enter Description" class="form-control" id="supplier_descp" name="supplier_descp">
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                        <!-- /.box-body -->



                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-default pull-left">Cancel</a>
                        <input type="button" class="btn btn-danger bg-red" name="button" value="Submit" onclick="add_supplier();"/>

                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
    <!--Department Modal End-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
                            function createPurchaseRequest() {

                                var dept_id = $("#departmentsDropdownSelect").val();
                                var unit_id = $("#unitDropdownSelect").val();
                                var issuing_date = $("#issuing_date").val();
                                $(".pr_dept_id").text(dept_id);
                                $.ajax({
                                    url: "<?php echo base_url(); ?>purchase_request/generate_pr_sn",
                                    method: "POST",
                                    data: {
                                        dept_id: dept_id,
                                        unit_id: unit_id,
                                        issuing_date: issuing_date
                                    },
                                    success: function (data) {
                                        $("#sr_no").val(data);
                                        $('#prModal').modal('show');
                                    }
                                });
                            }

                            // For adding Department
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

                            // For adding Supplier
                            function add_supplier() {
                                //alert("in");
                                var supplier_name = $('#supplier_name').val();
                                var supplier_descp = $('#supplier_descp').val();

                                //  alert(supplier_name);
                                $.ajax({
                                    method: "POST",
                                    url: "<?php echo base_url(); ?>index.php/purchase_request/add_supplier",
                                    data: {supplier_name: supplier_name, supplier_descp: supplier_descp},
                                    success: function (data) {
                                        //alert(data);
                                        data = JSON.parse(data);

                                        $('#supplierDropdownSelect').empty();

                                        for (var i = 0; i < data.length; i++) {
                                            $('#supplierDropdownSelect').append($("<option></option>")
                                                    .attr("value", data[i]['supplier_id']).text(data[i]['supplier_name']));
                                        }


                                        $('#supplierModal').modal('hide');
                                        $('#supplier_name').val('');
                                        $('#supplier_descp').val('');
                                    },
                                    error: function (data) {

                                        alert("error");
                                    }
                                });
                            }

                            function calculateTotal(c) {
                                var qnty = $("#pr_qty_req_" + c).text();
                                var suppRate = $("#pr_supplier_rate_" + c).text();
                                var total1 = qnty * suppRate;

                                var qnty = $("#pr_qty_req_" + c).text();
                                var orderRate = $("#pr_order_rate_" + c).text();
                                var total2 = qnty * orderRate;

                                $("#pr_supplier_supplier_" + c).text(total1);
                                $("#pr_order_supplier_" + c).text(total2);
                            }

                            $(document).ready(function () {

                                var count = 1;
                                $('#add').click(function () {
                                    count = count + 1;
                                    var html_code = "<tr id='row_" + count + "'>";
                                    html_code += "<td class='pr_srno' contenteditable='true'>"+count+"</td>";
                                    html_code += "<td class='pr_desp' contenteditable='true'></td>";
                                    html_code += "<td class='pr_dept_id' contenteditable='true' hidden></td>";
                                    html_code += "<td class='pr_unit' contenteditable='true'></td>";
                                    html_code += "<td class='pr_avg_cods' contenteditable='true'></td>";
                                    html_code += "<td class='pr_qty_stk' contenteditable='true'></td>";
                                    html_code += "<td class='pr_reorder_pt' contenteditable='true'></td>";
                                    html_code += "<td class='pr_reorder_qty' contenteditable='true'></td>";
                                    html_code += "<td class='pr_qty_req' id='pr_qty_req_" + count + "' contenteditable='true'></td>";
                                    html_code += "<td class='pr_supplier_rate' id='pr_supplier_rate_" + count + "' contenteditable='true'></td>";
                                    html_code += " <td class='pr_supplier_supplier' id='pr_supplier_supplier_" + count + "' onclick='calculateTotal(" + count + ")' contenteditable='true'></td>";
                                    html_code += "<td class='pr_order_rate' id='pr_order_rate_" + count + "' contenteditable='true'></td>";
                                    html_code += "<td class='pr_order_supplier' id='pr_order_supplier_" + count + "' onclick='calculateTotal(" + count + ")' contenteditable='true'></td>";

                                    html_code += "<td><button type='button' name='remove' data-row='row" + count + "' class='btn btn-danger btn-sm remove'>-</button></td>";
                                    html_code += "</tr>";
                                    $('#crud_table').append(html_code);
                                });

                                $(document).on('click', '.remove', function () {
                                    var delete_row = $(this).data("row");
                                    $('#' + delete_row).remove();
                                });

                                $('#save_pr').click(function () {
                                    
                                    var sr_no = $('#sr_no').val();
                                    var pr_dept_id = $('.pr_dept_id').text();
                                    var memo_items = [];
                                    var count = 0;
                                    $('table tbody tr').each(function () {
                                        count++;
                                        var ret = {};
                                        $('table tbody tr#row_' + count + ' td').map(function (index, td) {
                                            if (typeof $(td).attr('class') !== "undefined") {
                                                ret[$(td).attr('class')] = $(td).text();
                                            }
                                        });
                                        memo_items.push(ret);
                                    });

                                    $.ajax({
                                        url: "<?php echo base_url(); ?>index.php/purchase_request/add_purchase_request",
                                        method: "POST",
                                        data: {
                                            memo_items: memo_items,
                                            sr_no: sr_no,
                                            pr_dept_id: pr_dept_id
                                        },
                                        success: function (data) {
                                            //alert(data);
                                            var result = jQuery.parseJSON(data);
                                            console.log(result);

                                            if (result.error) {
                                                $("#missing-srnum").html(result.error);
                                                $("#missing-srnum").show();
                                            } else if (result.pr_num) {
                                                $('#pr_srno').val(result.pr_num);
                                                $('#prModal').modal('hide');
                                                $("td[contentEditable='true']").text("");
                                                for (var i = 2; i <= count; i++) {
                                                    $('tr#' + i + '').remove();
                                                }
                                            }
                                        }
                                    });
                                });
                            });
                            function add_pr() {
                                //var department_id = $( "#departmentsDropdownSelect option:selected" ).val(); ---> for fetchching department name
                                var department_id = $("#departmentsDropdownSelect option:selected").val();
                                var unit_id = $("#unitDropdownSelect option:selected").val();
                                var issuing_date = $('#issuing_date').val();
                                var phone_person = $('#phone_person').val();
                                var expense = $('#expense').val();

                                var action_taken_by = $('#action_taken_by').val();
                                var pr_reacd_on = $('#pr_reacd_on').val();
                                var order_placed_by = $('#order_placed_by').val();
                                var pr_srno = document.getElementById("pr_srno").value;
                                var selectedOption = $("input:radio[name=optradio]:checked").val();
                                var supplier_name = $("#supplierDropdownSelect option:selected").text();

                                $.ajax({
                                    method: "POST",
                                    url: "<?php echo base_url(); ?>index.php/purchase_request/update_purchase_request",
                                    data: {pr_srno: pr_srno, department_id: department_id, unit_id: unit_id, issuing_date: issuing_date, phone_person: phone_person, supplier_name: supplier_name, action_taken_by: action_taken_by, pr_reacd_on: pr_reacd_on, order_placed_by: order_placed_by, selectedOption: selectedOption},
                                    success: function (data) {
                                        alert(data);
                                        window.location.href = "<?php echo base_url(); ?>purchase_request/purchase_request_list";
                                        $('#departmentModal').modal('hide');
                                        $('#department_name').val('');
                                        $('#department_descp').val('');
                                    },
                                    error: function (data) {

                                        alert("error");
                                    }
                                });
                            }


                            $('#departmentsDropdownSelect').change(function () {
                                $('#action_taken_by').html('');
                                var dep_id = $(this).val();
                                $.ajax({
                                    url: "<?php echo base_url(); ?>" + "type/get_roles",
                                    type: "POST",
                                    data: {
                                        dep_id: dep_id
                                    },
                                    dataType: 'json',
                                    success: function (data) {
                                        $.each(data, function (index, element) {
                                            $('#action_taken_by').append($("<option></option>").attr("value", element.type_id).text(element.type_name));
                                        });

                                    }
                                });
                            });

    </script>
    <?php echo $this->load->view("common/bottom"); ?>
