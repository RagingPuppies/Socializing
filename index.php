<?php include "base.php"; ?>
<?php include "head.php"; ?>
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

include "feed.php"; 
?>

	<?php include "footer.php"; ?>
	<script src="static/js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</body>
</html>