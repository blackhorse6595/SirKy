<?php

	require_once("connect.php");

	$strSQL = "SELECT * FROM member WHERE SID = '".trim($_GET['sid'])."' AND UserID = '".trim($_GET['uid'])."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Activate Invalid !";
	}
	else
	{	
			$strSQL = "UPDATE member SET Active = 'Yes'  WHERE SID = '".trim($_GET['sid'])."' AND UserID = '".trim($_GET['uid'])."' ";
			$objQuery = mysqli_query($con,$strSQL);

		echo "Activate Successfully !";
	}

	mysqli_close($con);
?>

