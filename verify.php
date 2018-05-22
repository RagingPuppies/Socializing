<?php include "base.php"; 
header('Access-Control-Allow-Origin: *');
?>
<html>

<head>
	<title>Security Camera Project</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="static/css/main.css">
	<link rel="stylesheet" type="text/css" href="static/css/animate.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<header>
	<div id="logo">
		<h1>My Cam</h1>
	</div>
	<div id="share-button" class="button" style="display:none;">
		<img src="static/images/share.png" width='20px' height='20px'>
		Share Link With Friends
	</div>
</header>

<body>
 <?php
 if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    $email = mysqli_real_escape_string($conn,$_GET['email']);
    $hash = mysqli_real_escape_string($conn,$_GET['hash']);
	$search = mysqli_query($conn,"SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysqli_error($conn)); 
	$match  = mysqli_num_rows($search);
	
	if($match > 0){
		mysqli_query($conn,"UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error($conn));
		echo '<div>Your account has been activated, you can now login</div></br> <a href="index.php">Sign-In</a>';
		
	}
	else{
		echo '<div>There is an issue with your activation link or you already activated, please contact support</div>';
	}
}
else {
    echo '<div>Invalid approach, please use the link that has been send to your email.</div>';
}
 
 ?>

<script src="static/js/main.js"></script>
</body>
</html>