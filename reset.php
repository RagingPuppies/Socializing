<?php include "base.php"; 
header('Access-Control-Allow-Origin: *');
include "head.php"; 

 if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    $email = mysqli_real_escape_string($conn,$_GET['email']);
    $hash = mysqli_real_escape_string($conn,$_GET['hash']);
	$search = mysqli_query($conn,"SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='1'") or die(mysqli_error($conn)); 
	$match  = mysqli_num_rows($search);
	
	if($match > 0){
		echo '	<h2> Reset password for '.$email.'</h2>
				<h5>Type your new password:</h5>
				<div id="reset-err"></div>
				<input id="reset-hash" type="hidden" name="hash" value="'.$hash.'">
				<input id="reset-email" type="hidden" name="email" value="'.$email.'">
				<input class="input" id="reset-pass" type="password" name="pass" placeholder="Password"></br>
				<div id="reset-button" class="button" onclick="reset_button()">Reset</div>
				
				';
		
	}
	else{
		echo '<div>There is an issue with your activation link, please try again or contact support</div>';
	}
}
else {
    echo '		<h2> Type Your E-mail addess:</h2>
				<div id="submit-err"></div>
				<input class="input" id="lost-email" type="text" name="email" placeholder="E-mail address"></br>
				<div id="submit-lost-button" class="button" onclick="submit_button()">Submit</div>
				';
}
 
 ?>

<script src="static/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</body>
</html>