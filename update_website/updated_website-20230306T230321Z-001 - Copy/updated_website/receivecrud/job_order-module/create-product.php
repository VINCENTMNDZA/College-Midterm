<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.job.php?action=newproduct">
        <div id="form-block-center">
       
            <div class="right-menu">
  <div class="menu-button">Service List</div>
  <div class="dropdown-menu">
  <table id="data-list">
                <tr>
                
                    <th>Types of Services</th>
                </tr>
            <?php
            $count = 1;
            $count = 1;
            if($JO->list_products() != false){
            foreach($JO->list_products() as $value){
            extract($value);
            
            ?>
                <tr>
                  
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
  </div>
</div>
<br>
        </br>
<label for="job_availed">Service Type</label>
            <input type="text" class="input" name="job_availed" placeholder="Input Service Type "></textarea>
            <label for="fname">Client Name</label>
            <input type="text" id="customer_name" class="input" name="customer_name" placeholder="Input Customer Name">

            <label for="number">Contact</label>
            <input type="text" id="customer_number" class="input" name="customer_number" placeholder="Input Contact Number / Email "></textarea>
            
            
          
            <label for="job_availed">Products/Accessories</label>
            <input type="text" class="input" name="products_availed" placeholder="Input Products Ordered "></textarea>

            <label for="price">Total Cost</label>
            <input type="text" id="price" class="input" name="price" placeholder="Total Cost">  
              
        </select>
              </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>

