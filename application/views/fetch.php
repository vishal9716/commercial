<?php
//fetch.php

$output = '
<br />
<h3 align="center">Item Data</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="30%">Item Name</th>
  <th width="10%">Item Code</th>
  <th width="50%">Description</th>
  <th width="10%">Price</th>
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["vendor_person"].'</td>
  <td>'.$row["contact_person"].'</td>
  <td>'.$row["number"].'</td>
  <td>'.$row["negotiation"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>