<?php include "base.php";
header('Access-Control-Allow-Origin: *');
include "head.php";
 ?>
<div id="main">
	<div id="about-canvas">
		<div id="about-background">	
		<div id="about-message">
			<h2>Any device, everywhere.</h2></br>
			<h5>
			Use your old Tablet, Mobile phone, Computer webcam, IPcameras or even 3G\4G cameras from everywhere 
			in the world to stream directly to your own personal cloud storage! 
			no VTR needed, no backups! nothing! just connect the device to the internet and start streaming!
			</h5>
			</br>
			<div  id="start-button" class="button"style="width: 130px;margin-left: 0px;" onclick="location.href='record.php'">Start Streaming</div>	
		</div>
		</div>
	</div>
	
	<div id="tut">
		<h2 style="font-size:50px;">How does it work?</h2>
		<img src="static/images/tut.jpg" >
		<h2>1.Sign Up to CamsProj</h2>
		<p style="padding-bottom: 80px;">Sign Up and verify your email account</p>
		
		<img src="static/images/tut.jpg" >
		<h2>2.Sign In from any device and click 'Start Streaming'</h2>
		<p >Any device with browser will be supported, for Apple, only IOS 11 and above is supported.</p>
		<p style="padding-bottom: 80px;">External 3G\4G and IP cameras have to be configured or you can purchase ower cameras.</p>
		
		
		<img src="static/images/tut.jpg" >
		<h2>3.Sign In to CamsProj from another device</h2>
		<p style="padding-bottom: 80px;">Sign In with the same account but from other device, you can see the new stream under 'Watch' page.</p>
		
		<img src="static/images/tut.jpg" >
		<h2>4.Manage your Streams</h2>
		<p style="padding-bottom: 80px;">Decide wich package will suit your needs, connect more devices and share your streams with other people.</p>
	</div>
	
</div>

	<?php include "footer.php"; ?>
	<script src="static/js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</body>
</html>