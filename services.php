<?php include "base.php"; 
header('Access-Control-Allow-Origin: *');  
?>
<?php   

$action = $_REQUEST['action'];

if($action == 'register') {
	if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])){
		$name = mysqli_real_escape_string($conn,$_POST['name']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = $_POST['pass'];
		
		if(!preg_match("/^([A-Za-z0-9_-]+)(\.[A-Za-z0-9_-]+)*@([A-Za-z0-9_-]\.)*([A-Za-z0-9_-]+)\.[A-Za-z]{2,}$/i", $email)){
			$msg = 'The email you have entered is invalid, please try again.';
		}
		elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
			$msg = "Password didn't meet requirements, please use Letters and Numbers or Symbols.";
		}
		else{
			$msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
			$hash = md5( rand(0,1000) );
			mysqli_query($conn, "INSERT INTO users (username, password, email, hash) VALUES(
			'". mysqli_real_escape_string($conn,$name) ."', 
			'". mysqli_real_escape_string($conn,md5($password)) ."', 
			'". mysqli_real_escape_string($conn,$email) ."', 
			'". mysqli_real_escape_string($conn,$hash) ."') ") or die(json_encode (mysqli_error($conn)));
			
			$to      = $email; // Send email to our user
			$subject = 'CamsProject Verification'; // Give the email a subject 
			$message = '
			 
			Thanks for signing up!
			Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
			 
			------------------------
			Username: '.$name.'
			Password: '.$password.'
			------------------------
			 
			Please click this link to activate your account:
			http://www.CamsProject.com/verify.php?email='.$email.'&hash='.$hash.'
			 
			'; // Our message above including the link
								 
			$headers = 'From:noreply@CamsProject.com' . "\r\n"; // Set from headers
			mail($to, $subject, $message, $headers); // Send our email
		
		}

		echo json_encode ($msg);

			} 
		}
		
		
if($action == 'signin') {
	if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['pass']) && !empty($_POST['pass'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,md5($_POST['pass']));
    $search = mysqli_query($conn, "SELECT email, password, username, active FROM users WHERE email='".$email."' AND password='".$password."' AND active='1'") or die(json_encode (mysqli_error($conn))); 
    $match  = mysqli_num_rows($search);
	$array =  mysqli_fetch_assoc($search);
	if($match > 0){
    $msg = $array['username'].', Signed-in Successfuly!';
		$_SESSION['username'] = $array['username'];
        $_SESSION['email'] = $email;
        $_SESSION['LoggedIn'] = 1;
		header("Refresh:0; url=index.php");
		if($_POST['keepme'] == 'true') {
			$token = bin2hex(openssl_random_pseudo_bytes(30));
			mysqli_query($conn, "UPDATE users set token = '".$token."' where email='".$email."' ") or die(mysqli_error($conn));
			$cookie_name = "keepmesigned";
			setcookie($cookie_name, $token, time() + (864000 * 30), "/");
			}
	}
	else
	{
    $msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';	
	}
	echo json_encode ($msg);

}
}

if($action == 'reset') {
	if(isset($_POST['hash']) && !empty($_POST['hash']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['pass']) && !empty($_POST['pass'])){
		$hash = mysqli_real_escape_string($conn,$_POST['hash']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['pass']);
		
		if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
			$msg = "Password didn't meet requirements, please use Letters and Numbers or Symbols.";
		}
		else{
			$msg = 'Your password was reset.';
			mysqli_query($conn, "UPDATE users set password = 
			'". mysqli_real_escape_string($conn,md5($password)) 
			."' WHERE email = '". mysqli_real_escape_string($conn,$email) ."'
			AND hash = '". mysqli_real_escape_string($conn,$hash) ."'
			;") or die(json_encode (mysqli_error($conn)));
			
			$to      = $email; // Send email to our user
			$subject = 'CamsProject Verification'; // Give the email a subject 
			$message = '
			 
			Your password was reset!
			If this action was not done by you, please reset your password as soon as possible!
			 
			 
			'; // Our message above including the link
								 
			$headers = 'From:noreply@CamsProject.com' . "\r\n"; // Set from headers
			mail($to, $subject, $message, $headers); // Send our email
		
		}

		echo json_encode ($msg);

			} 
		}

if($action == 'verifyemail') {
	if(isset($_POST['email']) && !empty($_POST['email'])){
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		
     $verifyemail = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$email."' ");
		if(mysqli_num_rows($verifyemail) == 1){
			$msg = 'Please check your inbox for a reset mail.';
			$array =  mysqli_fetch_assoc($verifyemail);
			$name = $array['username'];
			$email =  $array['email'];
			$hash =  $array['hash'];
			
			$to      = $email; // Send email to our user
			$subject = 'CamsProj Password Reset'; // Give the email a subject 
			$message = '
			 
			'.$name.', Follow attached link to reset your password:

			
			http://www.CamsProject.com/reset.php?email='.$email.'&hash='.$hash.'
			 
			'; // Our message above including the link
								 
			$headers = 'From:noreply@CamsProject.com' . "\r\n"; // Set from headers
			mail($to, $subject, $message, $headers); // Send our email
		
    }

		else{
			$msg = 'Address does not exist in our systems.';		
		}

		echo json_encode ($msg);

			} 
		}
		
		
		?>