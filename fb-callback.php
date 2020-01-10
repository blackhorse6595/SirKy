<!DOCTYPE html>
<html>
<head>
	<title>Facebook Login JavaScript Example</title>
	<meta charset="UTF-8">
</head>
<body>
	<script>

		function statusChangeCallback(response) {
			console.log('statusChangeCallback');
			console.log(response.status);
			if (response.status === 'connected') {
				// window.location.href="index.php";
				testAPI();
			} else if (response.status === 'unknown') {
				// testAPI();
			} else {
				document.getElementById('status').innerHTML = 'Please log ' +
				'into this webpage.';
			}
		}


		function checkLoginState() {
			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
				if (response.status === 'connected') {
					var uid = response.authResponse.userID;
					var accessToken = response.authResponse.accessToken;
				}
			});
		}

		function logOut() {
			FB.logout(function(response) {
				statusChangeCallback(response);
				// document.getElementById('logOut').style.display = "none";
				// document.getElementById('logIn').style.display = "block";
			});
		}


		window.fbAsyncInit = function() {
			FB.init({
				appId      : '877764222641349',
				cookie     : true,
				xfbml      : true,
				version    : 'v5.0'
			});


			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});
		};


		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "https://connect.facebook.net/th_TH/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));


		function testAPI() {
			console.log('Welcome!  Fetching your information.... ');
			FB.api('/me?fields=id,first_name,last_name,email', function(response) {
				// document.getElementById('logOut').style.display = "block";
				// document.getElementById('logIn').style.display = "none";
				console.log('Successful login for: ' + response.first_name + ' ' + response.last_name + ' ' + response.email);
				document.getElementById('status').innerHTML =
				'Thanks for logging in, ' + response.first_name + ' ' + response.last_name + ' ' + response.email + '!';
			});
		}

	</script>

	<div id="fb-root"></div>

	<span id="logOut" onclick="logOut();" style="display: none;">Logout</span>
	<div id="status"></div>

	<div id="logIn" class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="true" data-use-continue-as="true" onlogin="checkLoginState();"></div>

</body>
</html>