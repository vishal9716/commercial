<?php echo $this->load->view("common/top_parul"); ?>
<script>
function delRow(currElement) {
     var parentRowIndex = currElement.parentNode.parentNode.rowIndex;
     document.getElementById("myTable").deleteRow(parentRowIndex);
}

var countval = 0;
function insRow(id) {
 countval = parseInt(countval) + 1;	
 var k=countval;
 //alert(k);
    var filas = document.getElementById("myTable").rows.length;
    var x = document.getElementById(id).insertRow(filas);
    var y = x.insertCell(0);
	var y1 = x.insertCell(1);
	var y2 = x.insertCell(2);
	var y3 = x.insertCell(3);
	var y4 = x.insertCell(4);
    var z = x.insertCell(5);
	
    y.innerHTML = '<input class="form-control" type="text" name="activity[]" id="activity'+k+'">';
	y1.innerHTML = '<input class="form-control" type="text" name="unit_measure[]" id="unit_measure'+k+'">';
	y2.innerHTML = '<input class="form-control" type="text" name="quantity[]" id="quantity'+k+'">';
	y3.innerHTML = '<input class="form-control" type="text" name="rate[]" id="rate'+k+'">';
	y4.innerHTML = '<input class="form-control" type="text" name="total[]" id="total'+k+'" onfocus="activitytotal('+k+')">';	
    z.innerHTML ='<input class="form-control" type="button" value="Delete" onclick="delRow(this)">';
	
	document.getElementById("ftotal").value = k; 
}

function activitytotal(vals)
{	
	var k= vals;
	var finaltotal;
	var finaltotal_0;
	var finaltotal_1 = 0;
	if(k==0)
	{
		var quantity = document.getElementById("quantity").value;
		var rate = document.getElementById("rate").value;
	}
	else
	{
		var quantity = document.getElementById("quantity"+k).value;
		var rate = document.getElementById("rate"+k).value;
	}		
	var acttotal;
	acttotal = (quantity * rate);	
	
	if(k==0)
	{
		document.getElementById("total").value = acttotal;		
		
	}
	else
	{
		document.getElementById("total"+k).value = acttotal;		
	}	
	
}

function finaltotal()
{
	var finaltotalval=0;
	var finaltotal_0 = Number(document.getElementById("total").value);
	var rowcountval = document.getElementById("ftotal").value;	
	
	 for(var i=1; i<=rowcountval; i++)
	 {
		if(document.getElementById("total"+i).value != '')
		{
			finaltotalval = Number(finaltotalval) + Number(document.getElementById("total"+i).value);
		}
	 }
	 
	 
	
	var totalfinalvalue = finaltotal_0 + finaltotalval;
	//alert(totalfinalvalue);
	document.getElementById("final_total").value = totalfinalvalue;
}


function customerdetail(vals)
{
	//alert(vals);
	if (vals != '') {
		var po_no = document.getElementById("po_no").value;
		var po_date = document.getElementById("po_date").value;
		var invoice_no = document.getElementById("invoice_no").value;
		var invoice_date = document.getElementById("invoice_date").value;
		var unit = document.getElementById("unit").value;
		var unit_address = document.getElementById("unit_address").value;		
		  window.location.href = "/commercial/invoice/add_invoice?cid="+vals+"&pono="+po_no+"&po_date="+po_date+"&invoice_no="+invoice_no+"&invoice_date="+invoice_date+"&unit="+unit+"&unit_address="+unit_address;
	}
	
}

</script>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php $this->load->view('header_message');?>
		<?php $this->load->view('left_message');?>
		  </nav>
        <div id="page-wrapper">
			
			
			<form action="<?php echo base_url(); ?>index.php/operations/add_estimation" method="POST" name="Formulaire">  
				<?php if (isset($errormsg)) {	?>						
                                    <div class="alert alert-danger">
										<?php echo $errormsg; ?>
									</div>
									<?php }  foreach($quotationrecord as $list) { ?>
       <input value="" name="quotation_id" type="hidden">
	<div class="row">
            
		 <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Quotation<span class="text-danger"> *</span></label>
                <div class="input-group">
                   <div class="input-group-addon">QN-</div>
                   <input id="quo" class="form-control" value="<?php echo $list['quotation_no']; ?>" disabled type="text" name="quotation">
                 
                </div>
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
	
		 <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">JTN<span class="text-danger"> *</span></label>
                <div class="input-group">
                  
                   <input id="" name="jtn" class="form-control" value="" type="text">
              </div>
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
		
		</div>
        <div class="row">
            
            <div class="col-md-6">
             
              <div class="form-group">
                <label for="">Client<span class="text-danger"> *</span><a href="#" data-toggle="modal" data-target="#customerModal" style="margin-left: 39px;" class="btn-border-orange"><span class="fa fa-plus"> &nbsp;</span>New Client</a></label>
               <select id="departmentsDropdownSelect" class="form-control select2 select2-hidden-accessible" name="customer">
				  <?php foreach($customers as $customer){ ?>
               <option id="departmentsDropdown" value="<?php echo $list['customer_id'];?>"><?php echo $list['customer_name'];?></option>     
    <?php } ?>  
	 </select> 		  
		       </div>
             
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
				  <label for="">Project<span class="text-danger"> *</span><a href="#" data-toggle="modal" data-target="#projectModal" style="margin-left: 39px;" class="btn-border-orange"><span class="fa fa-plus"> &nbsp;</span>New Project</a></label>

               <select id="projectDropdownSelect" class="form-control" name="project">
                <?php foreach($projects as $project){ ?>
               <option value="<?php echo $project['project_id'];?>"><?php echo $project['project_name'];?></option>
                      <?php } ?>                      
                  </select>
              </div>
            </div>
		</div>
		<div class="row">
		
        <div class="col-md-6">
              <div class="form-group">
	
<?php $activity_id = $_REQUEST['activity_id']; ?>
                  <label for="exampleInputEmail1">Activity List</label>
                     <select name="activity_id" onchange="mise_a_jour()" id="activity_id">
			<option value="">select</option>
<?php
	$sql = "SELECT activity_id, activity_name  FROM activity";
    $result = $this->db->query($sql)->result_array();
    foreach($result as $result1){ ?>
          <option value="<?php echo $result1['activity_id']; ?>" <?php if ($activity_id == $result1['activity_id']) { echo "selected"; } ?>> 
          <?php echo ($result1['activity_name']); ?>
          </option>
          <?php
	}
?>
        </select>
              </div>
            </div>
       
        </div>
				
               <!-- test -->
				
						
										<div class="form-group" style="border:1px solid; color:#555; padding:5px;">
                                        <!-- add rows -->											
										<input type="button" value="Add Row" onclick="insRow('myTable')" />				
											
											<table id="myTable" width="100%" border="0" cellspacing="2" cellpadding="3">
											<tr>	
												<td><strong>Sub Activity</strong></td>
												<td><strong>Level</strong></td>
												<td><strong>Norms</strong></td>
												<td><strong>Unit of measure</strong></td>
												
												<td><strong>Production Rate</strong></td>
												
												<td>&nbsp;</td>
											</tr>
											<?php 
											for($i=0; $i<count($quotationrecord); $i++)
											{												
											?>
											<tr>
											  <td><input class="form-control" type="text" name="activity[]" id="activity" value="<?php echo $quotationrecord[$i]['complexity_level'];?>" /></td>
											  <td><input class="form-control" type="text" name="norms_per_shift[]" id="unit_measure" value="<?php echo $quotationrecord[$i]['norms_per_shift'];?>"/></td>
											  <td><input class="form-control" type="text" name="quantity[]" id="quantity" value="<?php echo $invoiceactivitydata[$i]['quantity'];?>"></td>
											  <td><input class="form-control" type="text" name="rate[]" id="rate" value="<?php echo $invoiceactivitydata[$i]['rates'];?>"/></td>
											  <td><input class="form-control" type="text" name="total[]" id="total" value="<?php echo $invoiceactivitydata[$i]['each_total'];?>" onfocus="activitytotal(0)"/></td>
				<!--<td><input class="form-control" type="button" value="Delete" onclick="delRow(this)"></td>-->
											</tr>
										<?php } ?>
											</table>									
																															
										<!-- end add rows -->										
                                        </div>
				
				
				
				<!-- test -->
		

        <div class="row">

            <div class="col-md-6" style="">
              <div class="form-group">
                  <label for="exampleInputEmail1">Payment Terms</label>
          <select class="form-control" name="payment_terms">
            <option value="30" selected="">30</option>
            <option value="45">45</option>
			   <option value="90">90</option>
          </select>
				 </div>
            </div>

          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Type</label>
             &nbsp;&nbsp;
      <label><input type="radio" name="optradio" checked>  Book &nbsp;&nbsp;
	  <input type="radio" name="optradio" checked>   Journal</label>

                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
     
        </div>
	        <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Account</label>
                     <select class="form-control select2 select2-hidden-+" name="account">
                                          <option value="1" selected="">Account 1</option>
                                          <option value="2">Account 2</option>
                                        </select>
              </div>
            </div>

          <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Total pages in one volume</label>
              <input class="form-control auto ui-autocomplete-input" placeholder="Enter total pages in one volume" name="total_pages" value="<?php echo $list['total_pages'];?>">
                <span id="errMsg" class="text-danger"></span>
            </div>
          </div> 
        </div>

        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Project Volume</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter Project Volume" name="volume" id="search" value="<?php echo $list[''];?>">

                <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="no_div" tabindex="0" style="display: none; top: 60px; left: 15px; width: 520px;">
                <li>No record found li>
                </ul>
              </div>
            </div>
		
        </div>
	
	<div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label>No. Of illustrations/Arts</label>
                  <input class="form-control" placeholder="Enter No. Of illustrations/Arts" name="illustrations" value="<?php echo $list['illustrations'];?>">

                <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="no_div" tabindex="0" style="display: none; top: 60px; left: 15px; width: 520px;">
               
                </ul>
              </div>
            </div>
		<div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">No. Of illustrations</label>
                  <input class="form-control auto ui-autocomplete-input" placeholder="Enter No. Of illustrations" name="illustrations">

                <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="no_div" tabindex="0" style="display: none; top: 60px; left: 15px; width: 520px;">
                <li>No record found li>
                </ul>
              </div>
            </div>
			
        </div>
	<div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Final Price Estimation</label>
                  <input class="form-control" value="<?php echo $list['illustrations'];?>">

              </div>
            </div>
		
        </div>
	
	<?php } ?>	
        <div class="row">
          <div class="col-md-12">
            <div class="text-center" id="quantityMessage" style="color:red; font-weight:bold">
            </div>
          </div>
        </div>
	 <div class="row">
	 <div class="col-md-2">
   <button type="submit" class="btn btn-primary btn-flat pull-left" id="btnSubmit">Edit Quotation</button>
				</div>
				</div>
        </form>
			
		 <!--customer Modal Start-->
  <div class="modal fade" id="customerModal" role="dialog" style="overflow:hidden;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-info">Add Customer Information</h4>
        </div>
        <div class="modal-body">
         <form action="" method="post" id="customerAdd" class="form-horizontal">
            <input type="hidden" value="" name="_token" id="token">
            <input type="hidden" value="" name="type" id="type">
                <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-6">
                          <!-- <h4 class="text-info text-center" style="margin-left: 40px;">Customer Information</h4>-->
                            <div class="form-group">
                              <label class="col-sm-4">Name</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Please enter customer name" name="customer_name"  id="customer_name" value="">
                              </div>
                            </div>
                            
							  <div class="form-group">
                              <label class="col-sm-4">Description</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Please enter customer description"  name="customer_descp"  id="customer_descp" value="">
                              </div>
                            </div> 
							   <div class="form-group">
                              <label class="col-sm-4">Email</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Please enter email"  name="email"  id="email" value="">
                              </div>
                            </div> 
                                <div class="form-group">
                                  <label class="col-sm-4">Payment Terms</label>

                                  <div class="col-sm-8">
                                    <select class="form-control" name="payment_terms">
            <option value="30" selected="">30</option>
            <option value="45">45</option>
			   <option value="90">90</option>
          </select>
                                  </div>
                                </div>
 								<div class="form-group">
                                  <label class="col-sm-4">Address</label>

                                  <div class="col-sm-8">
				<textarea class="form-control z-depth-1" name="address"  id="address" rows="3" placeholder="Enter your Address..."></textarea>
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4">Country</label>

                                  <div class="col-sm-8">
                                    <select class="form-control select2" name="country_id" id="country_id">
                                    <option value="">Select Country</option>
                                                                          <option value="US">United States</option>
                                                                          <option value="CA">Canada</option>
                                                                          <option value="AF">Afghanistan</option>
                                                                          <option value="AL">Albania</option>
                                                                          <option value="DZ">Algeria</option>
                                                                          <option value="AS">American Samoa</option>
                                                                          <option value="AD">Andorra</option>
                                                                          <option value="AO">Angola</option>
                                                                          <option value="AI">Anguilla</option>
                                                                          <option value="AQ">Antarctica</option>
                                                                          <option value="AG">Antigua and/or Barbuda</option>
                                                                          <option value="AR">Argentina</option>
                                                                          <option value="AM">Armenia</option>
                                                                          <option value="AW">Aruba</option>
                                                                          <option value="AU">Australia</option>
                                                                          <option value="AT">Austria</option>
                                                                          <option value="AZ">Azerbaijan</option>
                                                                          <option value="BS">Bahamas</option>
                                                                          <option value="BH">Bahrain</option>
                                                                          <option value="BD">Bangladesh</option>
                                                                          <option value="BB">Barbados</option>
                                                                          <option value="BY">Belarus</option>
                                                                          <option value="BE">Belgium</option>
                                                                          <option value="BZ">Belize</option>
                                                                          <option value="BJ">Benin</option>
                                                                          <option value="BM">Bermuda</option>
                                                                          <option value="BT">Bhutan</option>
                                                                          <option value="BO">Bolivia</option>
                                                                          <option value="BA">Bosnia and Herzegovina</option>
                                                                          <option value="BW">Botswana</option>
                                                                          <option value="BV">Bouvet Island</option>
                                                                          <option value="BR">Brazil</option>
                                                                          <option value="IO">British lndian Ocean Territory</option>
                                                                          <option value="BN">Brunei Darussalam</option>
                                                                          <option value="BG">Bulgaria</option>
                                                                          <option value="BF">Burkina Faso</option>
                                                                          <option value="BI">Burundi</option>
                                                                          <option value="KH">Cambodia</option>
                                                                          <option value="CM">Cameroon</option>
                                                                          <option value="CV">Cape Verde</option>
                                                                          <option value="KY">Cayman Islands</option>
                                                                          <option value="CF">Central African Republic</option>
                                                                          <option value="TD">Chad</option>
                                                                          <option value="CL">Chile</option>
                                                                          <option value="CN">China</option>
                                                                          <option value="CX">Christmas Island</option>
                                                                          <option value="CC">Cocos (Keeling) Islands</option>
                                                                          <option value="CO">Colombia</option>
                                                                          <option value="KM">Comoros</option>
                                                                          <option value="CG">Congo</option>
                                                                          <option value="CK">Cook Islands</option>
                                                                          <option value="CR">Costa Rica</option>
                                                                          <option value="HR">Croatia (Hrvatska)</option>
                                                                          <option value="CU">Cuba</option>
                                                                          <option value="CY">Cyprus</option>
                                                                          <option value="CZ">Czech Republic</option>
                                                                          <option value="CD">Democratic Republic of Congo</option>
                                                                          <option value="DK">Denmark</option>
                                                                          <option value="DJ">Djibouti</option>
                                                                          <option value="DM">Dominica</option>
                                                                          <option value="DO">Dominican Republic</option>
                                                                          <option value="TP">East Timor</option>
                                                                          <option value="EC">Ecudaor</option>
                                                                          <option value="EG">Egypt</option>
                                                                          <option value="SV">El Salvador</option>
                                                                          <option value="GQ">Equatorial Guinea</option>
                                                                          <option value="ER">Eritrea</option>
                                                                          <option value="EE">Estonia</option>
                                                                          <option value="ET">Ethiopia</option>
                                                                          <option value="FK">Falkland Islands (Malvinas)</option>
                                                                          <option value="FO">Faroe Islands</option>
                                                                          <option value="FJ">Fiji</option>
                                                                          <option value="FI">Finland</option>
                                                                          <option value="FR">France</option>
                                                                          <option value="FX">France, Metropolitan</option>
                                                                          <option value="GF">French Guiana</option>
                                                                          <option value="PF">French Polynesia</option>
                                                                          <option value="TF">French Southern Territories</option>
                                                                          <option value="GA">Gabon</option>
                                                                          <option value="GM">Gambia</option>
                                                                          <option value="GE">Georgia</option>
                                                                          <option value="DE">Germany</option>
                                                                          <option value="GH">Ghana</option>
                                                                          <option value="GI">Gibraltar</option>
                                                                          <option value="GR">Greece</option>
                                                                          <option value="GL">Greenland</option>
                                                                          <option value="GD">Grenada</option>
                                                                          <option value="GP">Guadeloupe</option>
                                                                          <option value="GU">Guam</option>
                                                                          <option value="GT">Guatemala</option>
                                                                          <option value="GN">Guinea</option>
                                                                          <option value="GW">Guinea-Bissau</option>
                                                                          <option value="GY">Guyana</option>
                                                                          <option value="HT">Haiti</option>
                                                                          <option value="HM">Heard and Mc Donald Islands</option>
                                                                          <option value="HN">Honduras</option>
                                                                          <option value="HK">Hong Kong</option>
                                                                          <option value="HU">Hungary</option>
                                                                          <option value="IS">Iceland</option>
                                                                          <option value="IN">India</option>
                                                                          <option value="ID">Indonesia</option>
                                                                          <option value="IR">Iran (Islamic Republic of)</option>
                                                                          <option value="IQ">Iraq</option>
                                                                          <option value="IE">Ireland</option>
                                                                          <option value="IL">Israel</option>
                                                                          <option value="IT">Italy</option>
                                                                          <option value="CI">Ivory Coast</option>
                                                                          <option value="JM">Jamaica</option>
                                                                          <option value="JP">Japan</option>
                                                                          <option value="JO">Jordan</option>
                                                                          <option value="KZ">Kazakhstan</option>
                                                                          <option value="KE">Kenya</option>
                                                                          <option value="KI">Kiribati</option>
                                                                          <option value="KP">Korea, Democratic People&#039;s Republic of</option>
                                                                          <option value="KR">Korea, Republic of</option>
                                                                          <option value="KW">Kuwait</option>
                                                                          <option value="KG">Kyrgyzstan</option>
                                                                          <option value="LA">Lao People&#039;s Democratic Republic</option>
                                                                          <option value="LV">Latvia</option>
                                                                          <option value="LB">Lebanon</option>
                                                                          <option value="LS">Lesotho</option>
                                                                          <option value="LR">Liberia</option>
                                                                          <option value="LY">Libyan Arab Jamahiriya</option>
                                                                          <option value="LI">Liechtenstein</option>
                                                                          <option value="LT">Lithuania</option>
                                                                          <option value="LU">Luxembourg</option>
                                                                          <option value="MO">Macau</option>
                                                                          <option value="MK">Macedonia</option>
                                                                          <option value="MG">Madagascar</option>
                                                                          <option value="MW">Malawi</option>
                                                                          <option value="MY">Malaysia</option>
                                                                          <option value="MV">Maldives</option>
                                                                          <option value="ML">Mali</option>
                                                                          <option value="MT">Malta</option>
                                                                          <option value="MH">Marshall Islands</option>
                                                                          <option value="MQ">Martinique</option>
                                                                          <option value="MR">Mauritania</option>
                                                                          <option value="MU">Mauritius</option>
                                                                          <option value="TY">Mayotte</option>
                                                                          <option value="MX">Mexico</option>
                                                                          <option value="FM">Micronesia, Federated States of</option>
                                                                          <option value="MD">Moldova, Republic of</option>
                                                                          <option value="MC">Monaco</option>
                                                                          <option value="MN">Mongolia</option>
                                                                          <option value="MS">Montserrat</option>
                                                                          <option value="MA">Morocco</option>
                                                                          <option value="MZ">Mozambique</option>
                                                                          <option value="MM">Myanmar</option>
                                                                          <option value="NA">Namibia</option>
                                                                          <option value="NR">Nauru</option>
                                                                          <option value="NP">Nepal</option>
                                                                          <option value="NL">Netherlands</option>
                                                                          <option value="AN">Netherlands Antilles</option>
                                                                          <option value="NC">New Caledonia</option>
                                                                          <option value="NZ">New Zealand</option>
                                                                          <option value="NI">Nicaragua</option>
                                                                          <option value="NE">Niger</option>
                                                                          <option value="NG">Nigeria</option>
                                                                          <option value="NU">Niue</option>
                                                                          <option value="NF">Norfork Island</option>
                                                                          <option value="MP">Northern Mariana Islands</option>
                                                                          <option value="NO">Norway</option>
                                                                          <option value="OM">Oman</option>
                                                                          <option value="PK">Pakistan</option>
                                                                          <option value="PW">Palau</option>
                                                                          <option value="PA">Panama</option>
                                                                          <option value="PG">Papua New Guinea</option>
                                                                          <option value="PY">Paraguay</option>
                                                                          <option value="PE">Peru</option>
                                                                          <option value="PH">Philippines</option>
                                                                          <option value="PN">Pitcairn</option>
                                                                          <option value="PL">Poland</option>
                                                                          <option value="PT">Portugal</option>
                                                                          <option value="PR">Puerto Rico</option>
                                                                          <option value="QA">Qatar</option>
                                                                          <option value="SS">Republic of South Sudan</option>
                                                                          <option value="RE">Reunion</option>
                                                                          <option value="RO">Romania</option>
                                                                          <option value="RU">Russian Federation</option>
                                                                          <option value="RW">Rwanda</option>
                                                                          <option value="KN">Saint Kitts and Nevis</option>
                                                                          <option value="LC">Saint Lucia</option>
                                                                          <option value="VC">Saint Vincent and the Grenadines</option>
                                                                          <option value="WS">Samoa</option>
                                                                          <option value="SM">San Marino</option>
                                                                          <option value="ST">Sao Tome and Principe</option>
                                                                          <option value="SA">Saudi Arabia</option>
                                                                          <option value="SN">Senegal</option>
                                                                          <option value="RS">Serbia</option>
                                                                          <option value="SC">Seychelles</option>
                                                                          <option value="SL">Sierra Leone</option>
                                                                          <option value="SG">Singapore</option>
                                                                          <option value="SK">Slovakia</option>
                                                                          <option value="SI">Slovenia</option>
                                                                          <option value="SB">Solomon Islands</option>
                                                                          <option value="SO">Somalia</option>
                                                                          <option value="ZA">South Africa</option>
                                                                          <option value="GS">South Georgia South Sandwich Islands</option>
                                                                          <option value="ES">Spain</option>
                                                                          <option value="LK">Sri Lanka</option>
                                                                          <option value="SH">St. Helena</option>
                                                                          <option value="PM">St. Pierre and Miquelon</option>
                                                                          <option value="SD">Sudan</option>
                                                                          <option value="SR">Suriname</option>
                                                                          <option value="SJ">Svalbarn and Jan Mayen Islands</option>
                                                                          <option value="SZ">Swaziland</option>
                                                                          <option value="SE">Sweden</option>
                                                                          <option value="CH">Switzerland</option>
                                                                          <option value="SY">Syrian Arab Republic</option>
                                                                          <option value="TW">Taiwan</option>
                                                                          <option value="TJ">Tajikistan</option>
                                                                          <option value="TZ">Tanzania, United Republic of</option>
                                                                          <option value="TH">Thailand</option>
                                                                          <option value="TG">Togo</option>
                                                                          <option value="TK">Tokelau</option>
                                                                          <option value="TO">Tonga</option>
                                                                          <option value="TT">Trinidad and Tobago</option>
                                                                          <option value="TN">Tunisia</option>
                                                                          <option value="TR">Turkey</option>
                                                                          <option value="TM">Turkmenistan</option>
                                                                          <option value="TC">Turks and Caicos Islands</option>
                                                                          <option value="TV">Tuvalu</option>
                                                                          <option value="UG">Uganda</option>
                                                                          <option value="UA">Ukraine</option>
                                                                          <option value="AE">United Arab Emirates</option>
                                                                          <option value="GB">United Kingdom</option>
                                                                          <option value="UM">United States minor outlying islands</option>
                                                                          <option value="UY">Uruguay</option>
                                                                          <option value="UZ">Uzbekistan</option>
                                                                          <option value="VU">Vanuatu</option>
                                                                          <option value="VA">Vatican City State</option>
                                                                          <option value="VE">Venezuela</option>
                                                                          <option value="VN">Vietnam</option>
                                                                          <option value="VG">Virgin Islands (British)</option>
                                                                          <option value="VI">Virgin Islands (U.S.)</option>
                                                                          <option value="WF">Wallis and Futuna Islands</option>
                                                                          <option value="EH">Western Sahara</option>
                                                                          <option value="YE">Yemen</option>
                                                                          <option value="YU">Yugoslavia</option>
                                                                          <option value="ZR">Zaire</option>
                                                                          <option value="ZM">Zambia</option>
                                                                          <option value="ZW">Zimbabwe</option>
                                                                        </select>
                                  </div>
                                </div>
                          </div>
                   
    
                        </div>
                      </div><br>
                      </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer">
                          <a href="" class="btn btn-info btn-flat">Cancel</a>
                          <!--<button class="btn btn-primary pull-right btn-flat" type="submit">Submit</button>-->
							<input type="button" class="btn btn-info" name="button" value="click here" onclick="getdata();"/>
                        </div>
                        <!-- /.box-footer -->
                      </form>
        </div>
      </div>
    </div>
  </div>
  <!--customer Modal End-->
			
			
	 <!--Project Modal Start-->
  <div class="modal fade" id="projectModal" role="dialog" style="overflow:hidden;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-info">Project Information</h4>
        </div>
        <div class="modal-body">
         <form action="" method="post" id="customerAdd" class="form-horizontal">
            <input type="hidden" value="" name="_token" id="token">
            <input type="hidden" value="quotation" name="type" id="type">
                <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-6">
                          <!--  <h4 class="text-info text-center" style="margin-left: 40px;">Project Information</h4>-->
                            <div class="form-group">
                              <label class="col-sm-4">Name</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control"  name="project_name"  id="project_name">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-sm-4">Volume</label>

                              <div class="col-sm-8">
                                <input type="email" value="" class="form-control" name="volume" id="volume">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-sm-4">Description</label>

                              <div class="col-sm-8">
                                <input type="text" value="" class="form-control" name="description" id="description">
                              </div>
                            </div>
               
                          </div>
                         
                        </div>
                      </div><br>
                      </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer">
                          <a href="" class="btn btn-info btn-flat">Cancel</a>
                          <button class="btn btn-primary pull-right btn-flat" onclick="getprojects();" type="submit">Submit</button>
                        </div>
                        <!-- /.box-footer -->
                      </form>
        </div>
      </div>
    </div>
  </div>
  <!--Project Modal End-->
			<!-- BODY section -->
			
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<script>
   function getdata() {
       //alert("in");
		var customer_name = $('#customer_name').val();
		var customer_descp= $('#customer_descp').val();
		var email= $('#email').val();
		var payment_terms= $('#payment_terms').val();
		var address= $('#address').val();
		// alert(customer_name);
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>index.php/operations/add_client",
            data: {customer_name: customer_name, customer_descp: customer_descp, email: email, payment_terms: payment_terms, address: address},
            success: function(data) {
			data = JSON.parse(data);
			$('#departmentsDropdownSelect').empty();	
				for(var i=0; i< data.length; i++){
				$('#departmentsDropdownSelect').append($("<option></option>")
     			.attr("value", data[i]['customer_id']).text(data[i]['customer_name']));
			}
             $('#customerModal').modal('hide');
			 $('#customer_name').val('');

            },
            error: function(data) {
               
                alert("error");
            }
        });
    }
	
	 function getprojects() {
       alert("in");
		var project_name = $('#project_name').val();
		var description = $('#description').val();
		var volume = $('#volume').val();
		
	        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>index.php/operations/add_projects",
            data: {project_name: project_name, description: description, volume: volume},
            success: function(data) {
			data = JSON.parse(data);
			$('#projectDropdownSelect').empty();	
				for(var i=0; i< data.length; i++){
				$('#projectDropdownSelect').append($("<option></option>")
     			.attr("value", data[i]['project_id']).text(data[i]['project_name']));
			}
            $('#projectModal').modal('hide');
			$('#project_name').val('');
			$('#description').val('');
			$('#volume').val('');
            },
            error: function(data) {
               
                alert("error");
            }
        });
    }
</script>
<?php echo $this->load->view("common/bottom"); ?>
  
