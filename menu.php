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
	
	$retriveinfo = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_SESSION['email']."' ");
	     if(mysqli_num_rows($retriveinfo) == 1)
    {
		$array =  mysqli_fetch_assoc($retriveinfo);
		$_SESSION['username'] = $array['username'];
        $_SESSION['email'] =  $array['email'];
		$_SESSION['profilepic'] =  $array['profilepic'];
		$_SESSION['about'] =  $array['about'];
		$_SESSION['run'] =  $array['run'];

		
    }
	
     ?>
	<div id="menu">
		<a href="interact.php">Interact</a>
		<a href="watch.php">Skills</a>
		<a href="userpage.php"><img src="profile/<?php echo $_SESSION['profilepic']; ?>" height="30" width="30" style="margin-right: 3px;margin: -10px;border-radius: 50px;"> <?php echo $_SESSION['username']; ?></a>
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