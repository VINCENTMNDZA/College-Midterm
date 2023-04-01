

      <div id="content">
      <div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="animate-charcter">Phone Repair Service</h3>
    <?php
      switch($subpage){
                case 'users':
                    require_once 'users-module/index.php';
                break;
                case 'module_xxx':
                    require_once 'module-folder/';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>