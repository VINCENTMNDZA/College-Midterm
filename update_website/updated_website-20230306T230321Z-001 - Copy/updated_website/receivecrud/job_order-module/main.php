<h3>Product Details</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>Transaction ID</th>
        <th>Client Name</th>
        <th>Contact</th>
        <th>Service</th>
        <th>Products</th>
        <th>Total Cost</th>
        <th>Date Added</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($JO->list_JO() != false){
foreach($JO->list_JO() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $trans_id;?></td>
        <td><?php echo $customer_name;?></td>
        <td><?php echo $customer_number;?></td>
        <td><?php echo $products_availed;?></td>
        <td><?php echo $job_availed;?></td>
        <td><?php echo "₱ ", $job_price;?></td>
        <td><?php echo $job_date_added;?></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>