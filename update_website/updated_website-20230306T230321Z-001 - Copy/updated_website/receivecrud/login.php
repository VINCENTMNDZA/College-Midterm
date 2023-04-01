<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,$password);
	if($login){
		header("location: index.php?page=home");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Application Name</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@500&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css?<?php echo time();?>">
</head>
<body>

<div id="login-block">
    <div class="formbox">
        <form action="">
		<img class="img" src="css/Logo.jpg" >

	<h2>Sign In</h2>
	<div>
	<div class="input-box">
        <span class="icon"><i class='bx bx-envelope'></i> </span>
		<input type="email" class="input" required name="useremail" placeholder="Valid E-mail"/>
		<label for=""><b>Email</b></label>

	</div>
	<div>
	<div class="input-box">
        <span class="icon"><i class='bx bxs-lock-alt'></i> </span>
		<input type="password" class="input" required name="password" placeholder="Password"/>
		<label for=""><b>Password</b></label>
	</div>
	<div>
	<button class="btn" input name="submit">Log In</button>

	</div>
	</form>
</div>
</body>
</html>