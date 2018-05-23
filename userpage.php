<?php include "base.php"; ?>
<?php include "head.php"; ?>
<script src="static/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

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
	    $uAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

        if(strpos($uAgent,'mobile')) {
            include "userinterface-mobile.php";
        }
        else {
            include "userinterface.php";
        }
     

}

else
{
    ?>
     
<div id="main">
	
		<div id="login" class="animated fadeIn" style="margin-left: 0px;width: 100%;display:block;">
			<h2 id="login-title">Log In</h2>
			<h1 id="login-title-mobile">Log In</h1>
				<div id="sign-err">You're one step away! Sign In now and enjoy our high end services!</div>

			<input style="border: solid 0.5px #4fd2c2;" class="input" id="sign-email" type="text" name="emailoruser" placeholder="E-mail Address"></br>
			<input style="border: solid 0.5px #4fd2c2;" class="input" id="sign-pass" type="password" name="pass" placeholder="Password"> </br>
			<input type="checkbox" name="keepsignin" id="keepsignin" class="css-checkbox">
			<label for="keepsignin" class="css-label">Remember Me</label> </br>
			<div  id="login-button" class="button" onclick="signin_button()">Sign-In</div>

			<div id="passwordreset" onclick="location.href='reset.php'"><span style="background-color: white;">&nbsp;Reset Password&nbsp;</span></div> </br>
			<div id="new-member" style="display:inline-flex !important;padding-top: 50px;">New to this website? <div id="sign-up" onclick="location.href='login.php'" style="color: #4fd2c2;">&nbsp;Sign up</div></div>

		</div>
	</div>
     
   <?php
}
?>
<?php include "footer.php"; ?>
</body>
</html>