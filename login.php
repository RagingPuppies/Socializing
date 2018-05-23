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

if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
{
     ?>
<?php include "userinterface.php"; ?>
     <?php
}

else
{
    ?>
     
<div id="main">
	
		<div id="registar" class="animated fadeIn">
			<h2 id="registar-title">I'm New</h2>
			<h1 id="registar-title-mobile">Become A Member</h1>
				<div id="reg-err"></div>
				<input class="input" id="reg-email" type="text" name="email" placeholder="E-mail Address"></br>
				<input class="input" id="reg-name" type="text" name="name" placeholder="Name"></br>
				<input class="input" id="reg-pass" type="password" name="pass" placeholder="Password"></br>
				<div  id="registar-button" class="button" onclick="register_button()">Register</div>

			<div id="signinwith"><span style="background-color: white;">&nbsp;Or Sign Up With&nbsp;</span></div>
			<div style="margin-top: 25px;">
			<img style="margin:15px;" src="static/images/facebook.png" width='30px' height='30px'>
			<img style="margin:15px;" src="static/images/twitter.png" width='30px' height='30px'>
			</div>
			<div id="already-member">Already have an Account? <div id="sign-in" onclick="swapSignin()" style="color: #6464a1;">&nbsp;Sign in</div></div>
		</div>
		
		<div id="login" class="animated fadeIn">
			<h2 id="login-title">It's Me Again</h2>
			<h1 id="login-title-mobile">Welcome Back</h1>
				<div id="sign-err"></div>

			<input style="border: solid 0.5px #4fd2c2;" class="input" id="sign-email" type="text" name="emailoruser" placeholder="E-mail Address"></br>
			<input style="border: solid 0.5px #4fd2c2;" class="input" id="sign-pass" type="password" name="pass" placeholder="Password"> </br>
			<input type="checkbox" name="keepsignin" id="keepsignin" class="css-checkbox">
			<label for="keepsignin" class="css-label">Remember Me</label> </br>
			<div  id="login-button" class="button" onclick="signin_button()">Sign In</div>

			<div id="passwordreset" onclick="location.href='reset.php'"><span style="background-color: white;" >&nbsp;Reset Password&nbsp;</span></div>
			<div id="new-member">New to this website? <div id="sign-up" onclick="swapSignin()" style="color: #4fd2c2;">&nbsp;Sign-up</div></div>

		</div>
		
	</div>
     
   <?php
}
?>

<?php include "footer.php"; ?>
	<script src="static/js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</body>
</html>