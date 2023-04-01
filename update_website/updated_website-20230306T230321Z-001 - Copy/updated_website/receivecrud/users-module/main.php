<br>
</br>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($user->list_users() != false){
foreach($user->list_users() as $value){
   extract($value);
  
?>
      <tr>
        <td><a href="index.php?page=settings&subpage=users&action=upload"<?php echo $count;?>"><?php echo $count;?></a></td>
        <td><a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id;?>"><?php echo $user_lastname.', '.$user_firstname;?></a></td>
        <td><?php echo $user_access;?></td>
        <td><?php echo $user_email;?></td>
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