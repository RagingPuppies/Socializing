<?php $retriveinfo = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_SESSION['email']."' ");
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
<div id="warpper">
	<div id="changepic" style="background-color:#25522438;top:25%;left:25%;position:absolute;display:none;padding:30px;border-radius:15px;">
	
		<form action='profile/upload.php' method='post' id='myForm' enctype="multipart/form-data">
		  <input type="file" name="fileToUpload" id="fileToUpload">
		  <input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>" />
		  <input type='submit' name='submit' value='Upload' />
		</form>
		<button id='close' onclick='this.parentNode.style.display = "none"; return false;'>Cancel</button>
		<div id='output'></div>
		


	</div>
	
	<div id="profile">

		<div id="profile-title">
			<img onclick=visbility("changepic"); src="profile/<?php echo $_SESSION['profilepic']; ?>" height="100" width="100" style="border-radius: 50px;float:left;">
			<div style="float: left; ">
			<h3><?php echo $_SESSION['username']; ?></h3>
			<p>Tel-aviv, Israel</p>
			</div>
			<div style="float:right;width:100px;" class="button" onclick='alert("not active")'>Edit</div>
		</div>

		<div id="profile-info" style="display: inline-block;text-align:left;">
		<p><?php echo $_SESSION['about']; ?></p>
		</div>

		<div id="profile-edit" style="text-align: left;display:none;">
           Email  <input class="input" id="edit-email" type="text" name="email" value="<?php echo $_SESSION['email']; ?>" disabled></br>
           Name <input class="input" id="edit-name" type="text" name="name" value="<?php echo $_SESSION['username']; ?>"></br>
           Location <input class="input" id="edit-location" type="text" name="location" value="SubText"></br>
           About <textarea name="about" id="edit-about" cols="40" rows="5" value="<?php echo $_SESSION['about']; ?>"><?php echo $_SESSION['about']; ?></textarea></br>
            <div id="save-edit-button" class="button" onclick="edit_profile_button()">Save</div>
            <div id="edit-err"></div>
		</div>
	</div>
	
	
	<div id="skills">
	<h3>Skills</h3>
	</div>
</div>