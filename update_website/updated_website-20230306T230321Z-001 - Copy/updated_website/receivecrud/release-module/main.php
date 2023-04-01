<h3>List of Finished Transactions</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>Date Finished</th>
        <th>Transaction ID</th>
        <th>Technician</th>
        <th>Balance</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($finish->list_finish() != false){
foreach($finish->list_finish() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $finish_date_updated;?></td>
        <td><?php echo '#',  $trans_id;?></td>
        <td><?php echo $finish->get_user_lastname($finish->get_user_id($finish_id));?></td>
        <td><?php if ($JO->get_job_price($trans_id) - $finish->get_finish_payment($finish_id) <= 0) { 
        echo "Paid";
         }
        ;?>
        </td>
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

