<!DOCTYPE html>
<html>
<head>
<title>Invoice</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="content-type" content="text-html; charset=utf-8">
 <link href="<?php echo base_url();?>dist/css/invoice.css" rel="stylesheet">
</head>

<body>
<div class="main_outer">
<header class="clearfix">
  <div class="container">
    <div class="company-info">
      <h2 class="title"><img src="<?php echo base_url();?>public/images/logo_td.png"><br>Thomson Digital</h2>
	   <?php
                                    // echo "<pre>"; print_r($purchase_request_list); die();
                                    $i = 0;
                                    foreach ($purchase_request_list as $list) {
                                       // echo "--->". "<pre/>"; print_r($list); 
										?>
                                 
      <div class="address">
        <p> 129 Noida Special Economic Zone, Noida, Uttar Pradesh 201305</p>
        <p>Phone: 91-120-3085000 <span style="padding:0 10px;">|</span> Email: contact@thomsondigital.com <span style="padding:0 10px;">|</span> G.S.T. No.:  09AAACT4827F2ZB</p>
      </div>
		
	
    </div>
  </div>
</header>
<section class="sectionContent">
  <div class="container">
    <div class="details clearfix">
      <div class="client left">
        <p class="name">John Doe</p>
        <p>Modern Engineering Works, T-11 Gali No. 10, Anand Parbat Industrial Area, Delhi</p>
        <p><strong>Party Pan:</strong></p>
        <p><strong>GSTIN:</strong> O7AAAPP1081C1Z7</p>
        <p><strong>Email:</strong>john@example.com</p>
      </div>
        
      <div class="data right">
        <div class="title">Order no: <?php echo $list['sr_no']; ?></div>
        <div class="date">
          <p><strong>Date of Order:</strong> <?php echo date("Y-m-d"); ?></p>
		  <p><strong>PR No.:</strong> <?php echo $list['sr_no']; ?> </p>
          <p><strong>PR Date:</strong> <?php echo date("d-m-Y", strtotime($list['pr_issue_date'])); ?> </p>
		  <p><strong>Deptt:</strong> <?php echo $list['department_name']; ?> </p>
        </div>
      </div>
    </div>
	  	 <?php }?>
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="qty" width="4%">S.No</th>
          <th class="desc">Material Code / Description / Specification</th>
		  <th class="unit">Unit</th>
          <th class="unit">Qty</th>
          <th class="unit">Unit price</th>
          <th class="total">Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="qty">1</td>
          <td class="desc"><h3> <?php echo $list['pr_description']; ?></h3></td>
		  <td class="qty"><?php echo $list['units']; ?></td>
          <td class="qty"><?php echo $list['qty_req']; ?></td>
          <td class="unit"><?php echo $list['pr_supplier_rate']; ?></td>
          <td class="total"><?php echo $list['pr_supplier_supplier']; ?></td>
        </tr>
       
       
        
        <tr>
          <td colspan="2">
          	<div class="detail_section">
            	<h2>Delivery Schedule : 2-3 Days</h2>
            </div>
          </td>
          <td colspan="4">
              <ul class="sub_total">
                <li>Add: SUBTOTAL@........................%</li>
                <li>126,750.00</li>
              </ul>
              <ul class="sub_total">
                <li>Add: CGST@........................%</li>
                <li>7,605.00</li>
              </ul>
              <ul class="sub_total">
                <li>Add: SGST@........................%</li>
                <li>7,605.00</li>
              </ul>
              <ul class="sub_total">
                <li>Add: FREIGHT</li>
                <li>0.00</li>
              </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2">
          	<div class="detail_section">
            	<p><strong>Delevery Schedule:</strong> 20 Days</p>
            </div>
          </td>
          <td colspan="4">
              <ul class="sub_total">
                <li><strong>GRAND TOTAL:</strong></li>
                <li><strong>141,960.00</strong></li>
              </ul>
               
          </td>
        </tr>
        <tr>
          <td colspan="2">
          	<div class="detail_section">
            	<h2>IMPORTANT CONDITIONS: IGST: As Applicable.  Warranty: As per OEM.</h2>
                <ul>
                    <li>1)  Payment against pro-forma bills/invoice shall be made after fulfilling all the conditions of the purchase order in terms of quality, description, delivery and satisfactory installation of the product wherever necessary and agreed.</li>
<li>2) Final bill/ Invoice with Challan/copy of the purchase order  etc. to be  furnished after the delivery of goods duly signed and vetted by authorities</li>
<li>3)  Payments will be usually made by A/c Payee Cheque. No cash payment shall be paid under any circumstances </li>
<li>4)  Deduction as prescribed under the various statutory statues as applicable shall be made from the payment. </li>
<li>5)  Ensure that bills contain all the statutory information as required under the Income tax act /companies act etc. </li>
<li>6)  The price of any item mentioned in this order should not exceed the accepted price. Company reserves the right to vary the quantity before the dispatch of the consignment or delivery </li>
<li>7) Failure to comply with specifications, terms and conditions of this order, or accepted delivery schedule shall be sufficient grounds for cancellation of order by purchaser without being liable for paying any compensation to the supplier. In case of delay in supply, liquidated damage at the rate of 0.5% on value of the purchase order per week, or part thereof, will be recovered. All dispute shall be subject to the jurisdiction of Courts at Delhi</li>
                    
                </ul>
            </div>
          </td>
          <td colspan="4">
          	<div class="signature_section">
              <h1> For Thomson Digital</h1>
            </div>
              <div>
                  A Division of Thomson Press (India) Ltd.
              </div>
              <div>(Authorised Signatory)</div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
          	<div class="detail_section">
            	<p>Note: Custom Gate entry on all bills or challans for material is must to claim IGST.</p>
            </div>
          </td>
          <td colspan="4">
          	<div class="detail_section">
               <strong>Distribution:</strong><br> Vendor/Accounts/Indenter/Office copy 
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    
  </div>
</section>
 
</div>
</body>
</html>
