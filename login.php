<!DOCTYPE html>
<html lang="en">

<head>
	<title>Khao Yai</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="image/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap1/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<script>
		var bFbStatus = false;
		

		window.fbAsyncInit = function() {
			FB.init({
				appId: '549750135613903',
				cookie: true,
				xfbml: true,
				version: 'v5.0'
			});
			FB.AppEvents.logPageView();
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));


		function statusChangeCallback(response) {

			if (bFbStatus == false) {
				fbID = response.authResponse.userID;

				if (response.status == 'connected') {
					getCurrentUserInfo(response)
				} else {
					FB.login(function(response) {
						if (response.authResponse) {
							getCurrentUserInfo(response)
						} else {
							console.log('Auth cancelled.')
						}
					}, { scope: 'email' });
				}
			}


			bFbStatus = true;
		}


		function getCurrentUserInfo() {
			FB.api('me?fields=email,id,first_name,last_name', function(response) {
				
				console.log('Successful login for: ' + response.first_name + ' ' + response.last_name + ' ' + response.email);
				console.log(response);
				 fbid = response.id;
				 fbfirstname = response.first_name;
			 fblastname = response.last_name;
				 fbEmail = response.email;

				$("#hdnemail").val(fbEmail);
				$("#hdnFbID").val(fbid);
				$("#hdnfirstname ").val(fbfirstname);
				$("#hdnlastname ").val(fblastname);

			$("#frmMain").submit();

		});
		}

		function checkLoginState() {
			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});
		}
	</script>



	<form action="check.php" method="post" name="frmMain" id="frmMain">
		<input type="hidden" id="hdnFbID" name="hdnFbID">
		<input type="hidden" id="hdnfirstname" name="hdnfirstname">
		<input type="hidden" id="hdnemail" name="hdnemail">
		<input type="hidden" id="hdnlastname" name="hdnlastname">
	</form>

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v5.0&appId=877764222641349&autoLogAppEvents=1"></script>

	<div class="limiter"></div>
	<div class="container-login100" style="background-image: url('image/img-01.jpg');">
		<div class="wrap-login100 p-t-190 p-b-30">
			<form class="login100-form validate-form" name="frmlogin" method="post" action="checklogin.php">
				<div class="login100-form-avatar">
					<img src="image/avatar-01.png" alt="AVATAR" onclick="window.location='index.html'">
				</div>

				<span class="login100-form-title p-t-20 p-b-45">
					Khao Yai National Park
				</span>

				<div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
					<input class="input100" id="Username" type="text" name="Username" placeholder="Username">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
					<input class="input100" id="Password" type="password" name="Password" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock"></i>
					</span>
				</div>

				<div class="container-login100-form-btn p-t-10">
					<button class="login100-form-btn">
						Login
					</button></a>
				</div>



				<div class="container-login100-form-btn p-t-10">
					<div class="fb-login-button" scope="public_profile,email" data-width="" data-size="large " data-button-type="login_with" data-auto-logout-link="false" onlogin="checkLoginState();" data-use-continue-as="false"></div>
				</div>
				<div class="container-login100-form-btn p-t-10">
					<div class="text-center w-full">
						<a class="txt1" href="register.html">
							Create new account
							<i class="fa fa-long-arrow-right"></i>
						</a>
					</div>
				</div>
				<div class="container-login100-form-btn p-t-10">
					<div class="text-center w-full p-t-25 p-b-230">
						<a href="ForgetPassword.php" class="txt1">
							Forgot Username / Password?
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div id="status">
	</div>
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap1/js/popper.js"></script>
	<script src="vendor/bootstrap1/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>