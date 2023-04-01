<h3>Product Details</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>Transaction ID</th>
        <th>Client Name</th>
        <th>Contact</th>
        <th>Address</th>
        <th>ServiceID</th>
        <th>Price</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($product->list_product() != false){
foreach($product->list_product() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $prod_image;?></td>
        <td><a href="index.php?page=settings&subpage=products&action=profile&id=<?php echo $prod_id;?>"><?php echo $prod_name;?></a></td>
        <td><?php echo $prod_description;?></td>
        <td><?php echo $product->get_prod_type_name($product->get_prod_type($prod_id));?></td>
        <td><?php echo $prod_price;?></td>
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