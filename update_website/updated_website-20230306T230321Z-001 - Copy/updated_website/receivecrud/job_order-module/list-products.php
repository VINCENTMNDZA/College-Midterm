<h3>Product Types</h3>
<div class="btn-box">
<a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'">New Product</a>
</div>
    
                <table id="data-list">
                <tr>
                    <th>Product ID</th>
                    <th>Description</th>
                </tr>
            <?php
            $count = 1;
            $count = 1;
            if($JO->list_products() != false){
            foreach($JO->list_products() as $value){
            extract($value);
            
            ?>
                <tr>
                    <td><a href="index.php?page=job_order&action=upload&id"<?php echo $product_id;?>"><?php echo $product_id;?></a></td>
                    <td><?php echo $product_name;?></td>
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
  
<div id="id02" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">
   
     <center><h2>New Product</h2></center>

      <form method="POST" id="newForm" action="processes/process.job.php?action=newproducts">
        <label for="product_name">New Product Name</label>
            <input type="text" id="product_name" class="input" name="product_name" placeholder="Product Name">            
      
    </form>

      <div class="clearfix">
      <button class="submitbtn" onclick="enableSubmit()">Confirm</button>
        <button class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
        
      </div>
      </div>
    </div>
          </div>
</div>
<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function enableSubmit() {
    document.getElementById("newForm").submit();
}
</script>