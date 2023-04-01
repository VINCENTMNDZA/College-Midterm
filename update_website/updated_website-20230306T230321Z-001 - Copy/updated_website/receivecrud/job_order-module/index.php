<div id="third-submenu">
   | <a href="index.php?page=job_order">Job Order List</a> | 
    <a href="index.php?page=job_order&action=create">New Job Order</a> | 
    <a href="index.php?page=job_order&action=types">Services Offered</a> |
    <a href="index.php?page=job_order&action=products">Products Offered</a> |
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'job_order-module/create-product.php';
                break; 
                case 'modify':
                    require_once 'job_order-module/modify-product.php';
                break; 
                case 'profile':
                    require_once 'job_order-module/view-product.php';
                break;
                case 'types':
                    require_once 'job_order-module/list-product-types.php';
                break;
                case 'products':
                    require_once 'job_order-module/list-products.php';
                break;
                case 'upload':
                    require_once 'job_order-module/imageupload.php';
                break;
                default:
                    require_once 'job_order-module/main.php';
                break; 
            }
    ?>
  </div>