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
     ?>

<div id="map"></div>
    <script>
      function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40.674, lng: -73.945},
          zoom: 12,
		  disableDefaultUI: true,
          styles: [
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#343735"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#0f252e"
            },
            {
                "lightness": 17
            }
        ]
    }
]
        });
		

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmComWCVeIl_qOcLnd3uLtd8FxPHXNpzM&callback=initMap">
    </script>

	

	
	
     <?php
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