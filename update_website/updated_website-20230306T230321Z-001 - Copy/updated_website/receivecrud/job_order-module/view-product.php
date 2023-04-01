<h3>Product Details</h3>
<div class="btn-box">
<a href="index.php?page=settings&subpage=products&action=upload&id=<?php echo $id;?>" class="btn-jsactive">Upload Image</a> | 
</div>
<br/>
<div id="form-block">
    <form method="POST" action="processes/process.job.php?action=updateproduct">
    <div id="form-block-half">
    <img src="img/<?php echo $product->get_prod_image($id);?>"/>
    </div>
        <div id="form-block-center">
            <label for="fname">Client Name</label>
            <input type="text" id="customer_name" class="input" name="customer_name" value="<?php echo $JO->get_customer_name($trans_id);?>" placeholder="Client name..">

            <label for="lname">Contact</label>
            <textarea id="customer_number" class="input" name="customer_number" placeholder="Number"><?php echo $JO->get_customer_number($trans_id);?></textarea>
          
            <input type="hidden" id="prodid" name="prodid" value="<?php echo $id;?>"/>
            <label for="ptype">Type</label>
            <select id="ptype" name="ptype">
              <?php
              if($product->list_types() != false){
                foreach($product->list_types() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $type_id;?>" <?php if($product->get_prod_type($id) == $type_id){ echo "selected";};?>><?php echo $type_name;?></option>
              <?php
                }
              }
              ?>
        </select>
              </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>