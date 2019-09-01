<?php echo $this->load->view("common/top"); ?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <?php $this->load->view('header_message'); ?>
    <?php $this->load->view('left_message'); ?>
</nav>
<div id="page-wrapper">
    <br/>
    <!-- start-->			
    <form action="" method="post" name="Formulaire">  
        <?php foreach ($pr_list as $list) { ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Unit</label>
                        <select disabled id="unitDropdownSelect" class="form-control select2 select2-hidden-accessible" name="unit">
                            <option hidden value="" >--Select Units--</option>
                            <?php foreach ($units_region as $units) { ?>
                                <option id="departmentsDropdown"   <?php if ($units['unit_region_id'] == $list['unit_region_id']) {
                                    echo "selected";
                                } ?>  value="<?php echo $units['unit_region_id']; ?>"><?php echo $units['unit_region_name']; ?></option>
    <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group" id="">
                        <label for="">S. No.</label>
                        <input class="form-control" disabled value="<?php echo $_GET['sr_no']; ?>" id="pr_srno" name="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Indenting Department</label>
                        <select disabled id="departmentsDropdownSelect" class="form-control select2 select2-hidden-accessible" name="department">
                            <option hidden value="" >--Select Department--</option>
                            <?php foreach ($departments as $department) { ?>
                                <option id="departmentsDropdown" <?php if ($department['department_id'] == $list['department_id']) {
                                    echo "selected";
                                } ?> value="<?php echo $department['department_id']; ?>"><?php echo $department['department_name']; ?></option>
    <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="phone_person" value="1" > On Phone &nbsp;&nbsp;
                            <input type="radio" name="phone_person" value="2" checked /> In person</label>

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
                                <option <?php if ($action['type_id'] == $list['action_taken_by']) {
            echo "selected";
        } ?> value="<?php echo $action['type_id']; ?>"><?php echo $action['type_name']; ?></option>
    <?php } ?>
                        </select>
                        <span id="errMsg" class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Supplier/Make Referred</label>
                        <select id="supplierDropdownSelect" name="supplier_name"  class="form-control select2 select2-hidden-accessible">
    <?php foreach ($suppliers as $supplier) { ?>
                                <option value="<?php echo $supplier['supplier_id']; ?>"><?php echo $supplier['supplier_name']; ?></option>
                <?php } ?>
                        </select>
                        <span id="errMsg" class="text-danger"></span>
                    </div>
                </div>
    <?php
    $session_data = $this->session->userdata('logged_in');
    $username = $session_data['username'];
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
                        <label><input type="radio" name="expense" value="1" checked> opEx &nbsp;&nbsp;
                            <input type="radio" name="expense" value="2"> capEx</label>
                        <span id="errMsg" class="text-danger"></span>
                    </div>
                </div>
            </div>
            <br/>	
<?php } ?>																
        <div class="table-responsive" style="border:1px solid; color:#555; padding:5px;">
            <table class="table table-striped table-bordered table-hover mb-0 customTable" id="dataTables-example">
                <thead>
                    <tr style="white-space:nowrap">
                      <!--  <th rowspan="2">S.No.</th> -->
                        <th rowspan="2">Description</th>
                        <th rowspan="2">Unit</th>
                        <th rowspan="2">Avg. Cods.</th>
                        <th rowspan="2">Qty. in Stock</th>
                        <th rowspan="2">Reorder Point</th>
                        <th rowspan="2">Reorder Quantity</th>
                        <th rowspan="2">Qty. Req.</th>
                        <th colspan="2" style="text-align:center">Previous Supplier</th>
                        <th colspan="2" style="text-align:center">Order Placed on</th>
                        <th rowspan="2">Edit</th>
                    </tr>
                    <tr>
                        <th> Rate </th>
                        <th> Total </th>
                        <th> Rate </th>
                        <th> Total </th>
                    </tr>
                </thead>
                <tbody>
<?php
foreach ($purchase_request_list as $key => $value) {
    ?>
        <tr id="row_<?php echo $value['pr_id']; ?>">
            <td>
                <textarea class="form-control" cols="7"  style="width:200px;resize:none;" name="pr_description" id="pr_description_<?php echo $value['pr_id']; ?>"><?php echo $value['pr_description']; ?></textarea>
            </td>
            <td hidden>
                <input class="form-control" type="text" style="width:50px;" name="sr_no" id="sr_no_<?php echo $value['pr_id']; ?>" value="<?php echo $value['sr_no']; ?>"/>
                </td>
            <td hidden>
                <input class="form-control" type="text" style="width:50px;" name="pr_dept_id" id="pr_dept_id_<?php echo $value['pr_id']; ?>" value="<?php echo $value['department_id']; ?>"/>
            </td>
            <td hidden>
                <input class="form-control" type="text" style="width:50px;" name="pr_id" id="pr_id_<?php echo $value['pr_id']; ?>" value="<?php echo $value['pr_id']; ?>"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width:50px;" name="units" id="units_<?php echo $value['pr_id']; ?>" value="<?php echo $value['units']; ?>"/>
            </td>
            <td>
                <input class="form-control" type="text" name="avg_cods" id="avg_cods_<?php echo $value['pr_id']; ?>" value="<?php echo $value['avg_cods']; ?>"/>
            </td>
            <td>
                <input class="form-control" type="text" name="qty_in_stock" id="qty_in_stock_<?php echo $value['pr_id']; ?>" value="<?php echo $value['qty_in_stock']; ?>"/>
            </td>
            <td>
                <input class="form-control" type="text" name="reorder_point" id="reorder_point_<?php echo $value['pr_id']; ?>" value="<?php echo $value['reorder_point']; ?>"/>
            </td>
            <td>
                <input class="form-control" type="text" name="reorder_quantity" id="reorder_quantity_<?php echo $value['pr_id']; ?>" value="<?php echo $value['reorder_quantity']; ?>"/>
            </td>
            <td>
                <input class="form-control" type="text" name="qty_req" id="qty_req_<?php echo $value['pr_id']; ?>" value="<?php echo $value['qty_req']; ?>"/>
            </td>
            <td>
                <input class="form-control" style="width:100px;" type="text" name="pr_supplier_rate" id="pr_supplier_rate_<?php echo $value['pr_id']; ?>" onfocusout="calculateTotal(<?php echo $value['pr_id']; ?>)" value="<?php echo $value['pr_supplier_rate']; ?>"/>
            </td>
            <td>
                <input class="form-control" style="width:100px;" type="text" name="pr_supplier_supplier" id="pr_supplier_supplier_<?php echo $value['pr_id']; ?>" value="<?php echo $value['pr_supplier_supplier']; ?>"/>
            </td>
            <td>
                <input class="form-control" style="width:100px;" type="text" name="order_placed_rate" id="order_placed_rate_<?php echo $value['pr_id']; ?>" onfocusout="calculateTotal(<?php echo $value['pr_id']; ?>)" value="<?php echo $value['order_placed_rate']; ?>"/>
            <td>
                <input class="form-control" style="width:100px;" type="text" name="order_placed_supplier" id="order_placed_supplier_<?php echo $value['pr_id']; ?>" value="<?php echo $value['order_placed_supplier']; ?>"/>
            </td>
            <td onclick="edit_pr(<?php echo $value['pr_id']; ?>);"><a><i class="glyphicon glyphicon-pencil"></i></a></td>
        </tr>
<?php } ?>
            <tbody>
            </table>
            <!-- end add rows -->										
        </div>

        <div class="row">
            <div class="col-md-2">
                <span class="activity pull-right"><a href="<?php echo base_url(); ?>index.php/purchase_request/purchase_request_list" class="btn btn-info">Back to PR List</a></span>
            </div>

        </div>
        <br/>		 
    </form>
    <!-- end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script type="text/javascript">

    function edit_pr(id) {        
        var formData={};
        var textVal = '';
        var inputName = '';
        $('table tbody tr#row_' + id).find("td input:text, textarea").each(function() {        
            textVal = this.value;
            inputName = $(this).attr("name");
            formData[inputName] = textVal;
        });
        
        var issuing_date = $('#issuing_date').val();
        var phone_person = $("input[name='phone_person']:checked").val();
        var supplier_id = $('#supplierDropdownSelect :selected').val();
        var action_taken_by = $('#action_taken_by').val();
        var expense = $("input[name='expense']:checked").val();      
         
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>index.php/purchase_request/edit_pr",
            data: {
                memo_items: formData,
                issuing_date: issuing_date,
                phone_person: phone_person,
                supplier_name: supplier_id,
                action_taken_by: action_taken_by,
                expense: expense
            },
            success: function (data) {
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
    
    function calculateTotal(c) {
        var qnty = $("#qty_req_" + c).val();
        var suppRate = $("#pr_supplier_rate_" + c).val();
        var total1 = qnty * suppRate;
          
           
        var orderRate = $("#order_placed_rate_" + c).val();
        var total2 = qnty * orderRate;

        $("#pr_supplier_supplier_" + c).val(total1);
        $("#order_placed_supplier_" + c).val(total2);
    }

    </script>
<?php echo $this->load->view("common/bottom"); ?>
  