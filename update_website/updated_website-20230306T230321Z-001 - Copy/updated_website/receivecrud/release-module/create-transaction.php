<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.release.php?action=create">
    <div id="form-block-center">
    

            <label for="user_id">Technician</label>
        <select id="user_id" name="user_id">
              <?php
              if($user->list_users() != false){
                foreach($user->list_users() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $user_id;?>"><?php echo $user_lastname;?></option>
              <?php
                }
              }
              ?>    
            
            
            <select id="finish_payment" name="finish_payment" placeholder="Input Customer Payment">

    
            <label for="trans_id">Transaction ID</label>
        <select id="trans_id" name="trans_id">
              <?php
              if($JO->list_JO() != false){
                foreach($JO->list_JO() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $trans_id;?>"><?php echo $trans_id;?></option>
              <?php
                }
              }
              ?>      
           <select id="finish_payment" name="finish_payment" placeholder="Input Customer Payment">

          <label for="finish_payment">  Payment   </label>
            <input type="text" id="finish_payment" class="input" name="finish_payment" placeholder="Input Customer Payment">
        
              </div>
        <div id="button-block">
        <input type="submit" value="Create">
        </div>
            </form>
</div>