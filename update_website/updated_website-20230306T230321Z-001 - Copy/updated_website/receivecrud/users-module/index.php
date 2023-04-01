<div id="third-submenu">
    <a href="index.php?page=settings&subpage=users">List Technicians</a> | <a href="index.php?page=settings&subpage=users&action=create">Create New Technician</a>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'users-module/create-user.php';
                break; 
                case 'modify':
                    require_once 'users-module/modify-user.php';
                break; 
                case 'profile':
                    require_once 'users-module/view-profile.php';
                break;
                case 'result':
                    require_once 'users-module/search-user.php';
                break;
                case 'upload':
                    require_once 'users-module/imageupload.php';
                break;
                default:
                    require_once 'users-module/main.php';
                break; 
            }
    ?>
  </div>