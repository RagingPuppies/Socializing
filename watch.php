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
<div id="main">
	
		<div id="left-block">
			<div id="screen">
				<div id="download-button" class="img-button">
					<img src="static/images/download.png" width='20px' height='20px'> 
				</div>
				<div id="player">
					<video id="videoOutput" autoplay width="480px" height="360px"
					></video>
				
					<div id="player-buttons">
					</div>
				</div>


			</div>	
			<div id="premium-button" class="button animated jackInTheBox">
			<img src="static/images/lock.png" width='20px' height='20px'>
			Free the buttons
			</div>	
		</div>
		
		<div id="right-block">
			<div id="history">
				<div id="history-title">
				<div id="left-arrow" class="img-button"><img src="static/images/left.png" width='20px' height='20px'></div>
				<div id="right-arrow" class="img-button"><img src="static/images/right.png" width='20px' height='20px'></div>
					<p style="font-size: 1em;">History<p>
				</div>
				<div class="button">Mon, Mar 23, 2015</div>
				<div class="button">Teu, Mar 24, 2015</div>
				<div class="button">Wed, Mar 25, 2015</div>
				<div class="button">Thu, Mar 26, 2015</div>
				<div class="button">Fri, Mar 27, 2015</div>
				<div class="button">Sut, Mar 28, 2015</div>
				<div class="button">Sun, Mar 29, 2015</div>
			</div>
		</div>
	</div>
     <?php
}

else
{
    ?>
     
<div id="main">
	
		<div id="login" class="animated fadeIn" style="margin-left: 0px;width: 100%;padding-top: 27px;">
			<h2 id="login-title">Log In</h2>
			<h1 id="login-title-mobile">Log In</h1>
				<div id="sign-err">Please Log In in order to use our services...</div>

			<input style="border: solid 0.5px #4fd2c2;" class="input" id="sign-email" type="text" name="emailoruser" placeholder="E-mail Address"></br>
			<input style="border: solid 0.5px #4fd2c2;" class="input" id="sign-pass" type="password" name="pass" placeholder="Password"> </br>
			<input type="checkbox" name="keepsignin" id="keepsignin" class="css-checkbox">
			<label for="keepsignin" class="css-label">Remember Me</label> </br>
			<div  id="login-button" class="button" onclick="signin_button()">Sign-In</div>

			<div id="passwordreset"><span style="background-color: white;">&nbsp;Reset Password&nbsp;</span></div>
			<div id="new-member">New to this website? <div id="sign-up" onclick="swapSignin()" style="color: #4fd2c2;">&nbsp;Sign-up</div></div>

		</div>
	</div>
     
   <?php
}
?>
<?php include "footer.php"; ?>
	<script src="static/js/main.js"></script>
	<script src="static/js/kms.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/demo-console/index.js"></script>
<script src="bower_components/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
<script src="bower_components/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
<script src="bower_components/adapter.js/adapter.js"></script>

<script src="bower_components/kurento-client/js/kurento-client.js"></script>
<script src="bower_components/kurento-utils/js/kurento-utils.js"></script>

</body>
</html>