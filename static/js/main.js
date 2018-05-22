function watchpage() {
	document.getElementById("watch").className = "animated flipoutx";
	setTimeout(func, 700);
	function func() {
		window.location.href = 'watch.php';
	}
}

function recordpage() {
	document.getElementById("record").className = "animated flipoutx";
	setTimeout(func, 700);
	function func() {
		window.location.href = 'record.php';
	}
}

function swapSignin() {
	var x = document.getElementById('registar');
	var y = document.getElementById('login');
    if (x.style.display === 'none') {
		y.style.display = 'none';
		x.style.display = 'block';
    } else {
        x.style.display = 'none';
		y.style.display = 'block';
    }
}

function register_button() {
	var name = document.getElementById("reg-name").value;
	var email = document.getElementById("reg-email").value;
	var pass = document.getElementById("reg-pass").value;
	Register(name,email,pass);
}

function Register(name, email, pass) {
	    $.ajax({
        url: 'services.php',
        type: 'POST',
        data: {
            'action': 'register',
			'name': name, 
			'email': email,
			'pass': pass
        },
        success: function (response) {
            if(response && response.length) {
                for(var i=0; i<response.length; i++) {
					var div = document.getElementById('reg-err');
					div.innerHTML = response;
					}
            }
            },
        dataType: 'json'
    });
}

function signin_button() {
	var email = document.getElementById("sign-email").value;
	var pass = document.getElementById("sign-pass").value;
	var keepme = document.getElementById("keepsignin").checked;
	Signin(email,pass,keepme);
}

function Signin(email, pass, keepme) {
	    $.ajax({
        url: 'services.php',
        type: 'POST',
        data: {
            'action': 'signin',
			'email': email,
			'pass': pass,
			'keepme': keepme
        },
        success: function (response) {
            if(response && response.length) {
                for(var i=0; i<response.length; i++) {
					var div = document.getElementById('sign-err');
					div.innerHTML = response;
					if (response.includes("Successfuly")) {
						location.reload();
					}
					}
            }
            },
        dataType: 'json'
    });
}

function reset_button() {
	var hash = document.getElementById("reset-hash").value;
	var email = document.getElementById("reset-email").value;
	var pass = document.getElementById("reset-pass").value;
	Reset(hash,email,pass);
}

function Reset(hash, email, pass) {
	    $.ajax({
        url: 'services.php',
        type: 'POST',
        data: {
            'action': 'reset',
			'hash': hash, 
			'email': email,
			'pass': pass
        },
        success: function (response) {
            if(response && response.length) {
                for(var i=0; i<response.length; i++) {
					var div = document.getElementById('reset-err');
					div.innerHTML = response;
					}
            }
            },
        dataType: 'json'
    });
}

function submit_button() {
	var email = document.getElementById("lost-email").value;
	Submit(email);
}

function Submit(email) {
	    $.ajax({
        url: 'services.php',
        type: 'POST',
        data: {
            'action': 'verifyemail',
			'email': email,
        },
        success: function (response) {
            if(response && response.length) {
                for(var i=0; i<response.length; i++) {
					var div = document.getElementById('submit-err');
					div.innerHTML = response;
					}
            }
            },
        dataType: 'json'
    });
}



if (document.getElementById('sign-pass') != null){
	
document.getElementById('sign-pass').onkeypress=function(e){
    if(e.keyCode==13){
        document.getElementById('login-button').click();
    }
}
document.getElementById('keepsignin').onkeypress=function(e){
    if(e.keyCode==13){
        document.getElementById('login-button').click();
    }
}
}
if (document.getElementById('registar-button') != null){
document.getElementById('reg-pass').onkeypress=function(e){
    if(e.keyCode==13){
        document.getElementById('registar-button').click();
    }
}
}