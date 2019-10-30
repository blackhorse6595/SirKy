<?php
	include("connect.php");
	
	
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
	if(trim($_POST["txtLastName"]) == "")
	{
		echo "Please input LastName!";
		exit();	
	}	
	
	$strSQL = "SELECT * FROM username WHERE user = '".trim($_POST['txtUsername'])."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		
		$strSQL = "INSERT INTO username (user,password,name,lastname,type) VALUES ('".$_POST["txtUsername"]."', 
		'".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["txtLastName"]."','".$_POST["ddlStatus"]."')";
		$objQuery = mysqli_query($con,$strSQL);
		
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='index.html'>Login page</a>";
		
	}

	mysqli_close($con);
?>