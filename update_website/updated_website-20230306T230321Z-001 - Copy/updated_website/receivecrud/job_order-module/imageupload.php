<h3>Provide the Required Information</h3>
<h4><?php echo $JO->get_prod_type_name($id);?></h4>
<div id="form-block">
    <form action="job_order-module/upload.php?id=<?php echo $type_name;?>" method="post" enctype="multipart/form-data">
    <input type="hidden" id="userid" name="userid" value="<?php echo $type_id;?>"/>
    <label for="fileToUpload">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" multiple>
    <input type="submit" value="Upload Image" name="submit">
    </form>
</div>