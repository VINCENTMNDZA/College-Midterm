<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'classes/class.product.php';
include_once 'classes/class.job.php';
include_once 'classes/class.release.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$JO = new job();
$finish = new Finish();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Application Name</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&family=Fredoka+One&family=Golos+Text:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    <script src="javascript/javascript.js"></script>
</head>
<body>

<div id="wrapper">
            
            <img class="img" src="css/Logo.jpg" height="60" width="60" alt="logo">

<div class="navbar">
    <a href="https://www.facebook.com/profile.php?id=100085337051853" class="move-left">JoverTech</a> 

            <ul class="links">
                <li><a href="index.php?page=home">Home</a> </li>
                <li><a href="index.php?page=job_order">Job Orders</a> </li>
                <li> <a href="index.php?page=release">Finished Transactions</a></li>
                <li> <a href="index.php?page=settings&subpage=users">Technicians</a> </li>
</ul>
                <a href="logout.php" class="action_btn">Log Out</a>
                <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
               <!-- <span class="move-right"><?php echo $user->get_user_lastname($user_id).', '.$user->get_user_firstname($user_id);?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span> 
            </div> -->
</div>
            <div id="content">

                <?php
                switch($page){  
                            case 'home':
                                 require_once 'home_module/index.php';
                            break; 
                            case 'settings':
                                require_once 'settings-module/index.php';
                            break; 
                            case 'job_order':
                                require_once 'job_order-module/index.php';
                            break; 
                            case 'inventory':
                                require_once 'inventory-module/index.php';
                            break; 
                            case 'release':
                                require_once 'release-module/index.php';
                            break; 
                            default:
                                require_once 'main.php';
                            break; 
                        }
                ?>
            </div>
    </div>
</div>
</body>
</html>