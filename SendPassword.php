<html>
<head>
<title>ForgetPassword</title>
</head>
<body>
<?php

	require_once("connect.php");
	$strSQL = "SELECT * FROM member WHERE Email = '".trim($_POST['txtEmail'])."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Not Found Your Email!";
	}
	else
	{
			echo "Your password send successful.<br>Send to mail : ".$objResult["Email"];		

			$strTo = $objResult["Email"];
			$strSubject = "Your Account information username and password.";
			$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
			$strHeader .= "From: Kh@sirkys.com\nReply-To: webmaster@sirkys.com";
			$strMessage = "";
			$strMessage .= "Welcome : ".$objResult["Name"]."<br>";
			$strMessage .= "Username : ".$objResult["Username"]."<br>";
			$strMessage .= "Password : ".$objResult["Password"]."<br>";
			$strMessage .= "=================================<br>";
			$strMessage .= "Sirkys.com<br>";
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 

	}
	mysqli_close($con);
?>
</body>
</html>