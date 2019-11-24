<?php

	session_start();
	require_once("connect.php");
	
	
	if(trim($_POST["txtUsername"]) == "")
	{
		echo "Please input Username!";
		exit();	
	}
	
	if(trim($_POST["txtPassword"]) == "")
	{
		echo "Please input Password!";
		exit();	
	}	
		
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "Password not Match!";
		exit();
	}
	
	if(trim($_POST["txtName"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	if(trim($_POST["txtLastname"]) == "")
	{
		echo "Please input Lastname!";
		exit();	
	}	


	if(trim($_POST["txtEmail"]) == "")
	{
		echo "Please input Email!";
		exit();	
	}	

	$strSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		
		$strSQL = "INSERT INTO member (Username,Password,Name,Lastname,Email,Status,SID,Active) VALUES ('".$_POST["txtUsername"]."', 
		'".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["txtLastname"]."','".$_POST["txtEmail"]."','USER','".session_id()."','No')";
		$objQuery = mysqli_query($con,$strSQL);
		
		$Uid = mysqli_insert_id($con);
		echo "Register Completed!<br>Please check your email to activate account";		

		$strTo = $_POST["txtEmail"];
		$strSubject = "Activate Member Account";
		$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
		$strHeader .= "From: webmaster@thaicreate.com\nReply-To: webmaster@thaicreate.com";
		$strMessage = "";
		$strMessage .= "Welcome : ".$_POST["txtName"]."".$_POST["txtLastname"]."<br>";
		$strMessage .= "=================================<br>";
		$strMessage .= "Activate account click here.<br>";
		$strMessage .= "https://www.thaicreate.com/activate.php?sid=".session_id()."&uid=".$Uid."<br>";
		$strMessage .= "=================================<br>";
		$strMessage .= "ThaiCreate.Com<br>";

		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
	
	}

	mysqli_close($con);
?>