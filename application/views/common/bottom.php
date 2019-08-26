</div>
    <!-- /#wrapper -->
<!-- datatable -->
<script src="<?php echo base_url(); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<!-- end datatable -->
  <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
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
    <script src="<?php echo base_url(); ?>public/js/jquery.validate.min.js"></script>

	 <script type="text/javascript">
       $('#customerModal').on('shown.bs.modal', function () {
        $(".select2").select2({});
    });
	</script>

<script language="javascript">
	
	function mise_a_jour()
                {
					Formulaire.onSubmit="";
                var activity_id =document.getElementById("activity_id").value;
					 <?php $myPhpVar= 'activity_id';?> 
				//alert(activity_id);
					Formulaire.action="operations?TRA_ID="+activity_id;
                	Formulaire.submit();
                }
	
		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var colCount = table.rows[0].cells.length;

			for(var i=0; i<colCount; i++) {

				var newcell	= row.insertCell(i);

				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
							newcell.childNodes[0].value = "";
							break;
					case "checkbox":
							newcell.childNodes[0].checked = false;
							break;
					case "select-one":
							newcell.childNodes[0].selectedIndex = 0;
							break;
				}
			}
		}

		function deleteRow(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					if(rowCount <= 1) {
						alert("Cannot delete all the rows.");
						break;
					}
					table.deleteRow(i);
					rowCount--;
					i--;
				}
			}
			}catch(e) {
				alert(e);
			}
		}
// code for customer modal
	  $('#customerModal').on('shown.bs.modal', function () {
        $(".select2").select2({});
    });
	
	// adding department
	 function add_department_1() {
       
		var department_name = $('#department_name').val();
		var department_descp= $('#department_descp').val();
	
	  // alert(department_name);
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>index.php/purchase_request/add_department",
            data: {department_name: department_name, department_descp: department_descp},
            success: function(data) {
				
				alert(data);
				// $("#departmentsDropdown").append(data);
				$("#departmentsDropdown").append(

"<option value=" + value.id +">"+value.department_name+"</option>"

);
            },
            error: function(data) {
               
                alert("error");
            }
        });
    }
	
	</script>






</body>

</html>
