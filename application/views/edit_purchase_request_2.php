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
//for ($i = 0; $i < count($purchase_request_list); $i++) {
    foreach($purchase_request_list as $listKeys => $value){ ?>
        <tr id="row_<?php echo $value['pr_id']?>">
            
            <td class="pr_desp" contenteditable="true"> <textarea class="form-control" cols="7"><?php echo $value['pr_description']?></textarea></td>            
            <td class="pr_dept_id" contenteditable="false" hidden ><?php echo $value['department_id']?></td>
            <td class="pr_unit" contenteditable="true"><input class="form-control" type="text" style="width:50px;" value="<?php echo $value['units']?>" /></td>
            <td class="pr_avg_cods" contenteditable="true"><input class="form-control" type="text" style="width:50px;" value="<?php echo $value['avg_cods']?>" /></td>
            <td class="pr_qty_stk" contenteditable="true"><?php echo $value['qty_in_stock']?></td>
            <td class="pr_reorder_pt" contenteditable="true"><?php echo $value['reorder_point']?></td>
            <td class="pr_reorder_qty" contenteditable="true"><?php echo $value['reorder_quantity']?></td>
            <td class="pr_qty_req" id="pr_qty_req_<?php echo $value['pr_id']?>" contenteditable="true"><?php echo $value['qty_req']?></td>
            <td class="pr_supplier_rate" id="pr_supplier_rate_<?php echo $value['pr_id']?>" contenteditable="true"><?php echo $value['pr_supplier_rate']?></td>
            <td class="pr_supplier_supplier" id="pr_supplier_supplier_<?php echo $value['pr_id']?>" onclick="calculateTotal(1)" contenteditable="true"><?php echo $value['pr_supplier_supplier']?></td>
            <td class="pr_order_rate"  id="pr_order_rate_<?php echo $value['pr_id']?>" contenteditable="true"><?php echo $value['order_placed_rate']?></td>
            <td class="pr_order_supplier"id="pr_order_supplier_<?php echo $value['pr_id']?>" onclick="calculateTotal(1)"  contenteditable="true"><?php echo $value['order_placed_supplier']?></td>
            <td onclick="edit_pr(<?php echo $value['pr_id'];?>);"><a><i class="glyphicon glyphicon-pencil"></i></a></td>
            
        </tr>   
<?php } ?>
                </tbody>
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
            var pr_idd = id;
            var sr_no = "<?php echo $_GET['sr_no']; ?>";
            var memo_items = [];           
            var ret = {};
            $('table tbody tr#row_' + id + ' td').map(function (index, td) {
                if (typeof $(td).attr('class') !== "undefined") {
                    ret[$(td).attr('class')] = $(td).val();
                }
            });
            memo_items.push(ret);
           
            alert(memo_items);
            console.log(memo_items);

            //    var department_id = $("#departmentsDropdownSelect option:selected").val();
            //    var issuing_date = $('#issuing_date').val();
            //    var phone_person = $('#phone_person').val();
            //    var supplier_name = $('#supplier_name').val();
            //    var action_taken_by = $('#action_taken_by').val();
            //    var pr_reacd_on = $('#pr_reacd_on').val();
            //    var order_placed_by= $('#order_placed_by').val();
            //    var pr_id =$('#pr_id').val();
            //    var pr_description = $('#pr_description').val();
            //    var units = $('#units').val();
            //    var avg_cods =$('#avg_cods').val();
            //    var qty_in_stock = $('#qty_in_stock').val();
            //    var reorder_point =$('#reorder_point').val() ;
            //    var reorder_quantity =$('#reorder_quantity').val() ;
            //    var qty_req = $('#qty_req').val();
            //    var pr_supplier_rate = $('#pr_supplier_rate').val();
            //    var pr_supplier_supplier = $('#pr_supplier_supplier').val();
            //    var order_placed_rate = $('#order_placed_rate').val();
            //    var order_placed_supplier = $('#order_placed_supplier').val();

            $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>index.php/purchase_request/edit_pr",
                data: {
                    pr_idd: pr_idd,
                    sr_no: sr_no,
                    memo_items: memo_items
                },
                success: function (data) {
                    alert(data);
                    return false;
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
  