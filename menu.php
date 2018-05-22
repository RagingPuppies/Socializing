<?php
header('Access-Control-Allow-Origin: *');


if(isset($_COOKIE['keepmesigned'])) {
     $checkcookie = mysqli_query($conn, "SELECT * FROM users WHERE token = '".$_COOKIE['keepmesigned']."' ");
	     if(mysqli_num_rows($checkcookie) == 1)
    {
		$array =  mysqli_fetch_assoc($checkcookie);
		$_SESSION['username'] = $array['username'];
        $_SESSION['email'] =  $array['email'];
        $_SESSION['LoggedIn'] = 1;
		
    }
}

if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
{
     ?>
	<div id="menu">
		<a href="interact.php">Interact</a>
		<a href="watch.php">Skills</a>
		<a href="userpage.php"><?php echo $_SESSION['username']; ?></a>
		<a href="logout.php">Sign-out</a>
	</div>
     <?php
}

else
{
    ?>
     
	<div id="menu">
		<a href="interact.php">Start Socializing</a>
		<a href="about.php">About</a>
		<a href="login.php">Log In</a>
	</div>
     
   <?php
}
?>