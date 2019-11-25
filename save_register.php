
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<!-- ส่วนของ Bootstrap -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php

session_start($sid);
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
	?> 
	 <div class="container" >
	
	 
 
	<!--ส่วนของ Modal สังเกตุ id myModal ครับ ส่วนนี้แหละจะถูกเรียกด้วย Java Script -->
	
	<div class="modal fade" id="myModal" role="dialog">
	  <div class="modal-dialog">
		 
		<!-- เนือหาของ Modal ทั้งหมด -->
		<div class="modal-content">
		 <!-- ส่วนหัวของ Modal  -->
		 <div class="modal-header">
		  <!-- ปุ่มกดปิด (X) ตรงส่วนหัวของ Modal  -->
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Register Fail!</h4>
		</div>
		<!-- ส่วนเนื้อหาของ Modal  -->
		<div class="modal-body">
		  <p>Username already exists!</p>
		</div>
		<div class="modal-footer">
		 <!-- ปุ่มกดปิด (Close) ตรงส่วนล่างของ Modal  -->
		 <button type="button"  class="btn btn-default"  onclick="window.location='register.html'" data-dismiss="modal">Close</button>
	   </div>
	 </div>
	  
   </div>
 </div>
  
</div>
	<?php

}
else
{	
	
	$strSQL = "INSERT INTO member (Username,Password,Name,Lastname,Email,Status,SID,Active) VALUES ('".$_POST["txtUsername"]."', 
	'".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["txtLastname"]."','".$_POST["txtEmail"]."','USER','".session_id()."','No')";
	$objQuery = mysqli_query($con,$strSQL);
	
	$Uid = mysqli_insert_id($con);
	
	
	 		

	$strTo = $_POST["txtEmail"];
	$strSubject = "Activate Member Account";
	$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
	$strHeader .= "From: KhaoyaiNationalPark@sirkys.com\nReply-To: Pokkate@sirkys.com";
	$strMessage = "";
	$strMessage .= "Welcome : ".$_POST["txtName"]."".$_POST["txtLastname"]."<br>";
	$strMessage .= "=================================<br>";
	$strMessage .= "Activate account click here.<br>";
	$strMessage .= "https://www.sirkys.com/activate.php?sid=".session_id()."&uid=".$Uid."<br>";
	$strMessage .= "=================================<br>";
	$strMessage .= "Pokkate Eiampubyai<br>";

	$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
	?> 
	 <div class="container" >
	
	 
 
	<!--ส่วนของ Modal สังเกตุ id myModal ครับ ส่วนนี้แหละจะถูกเรียกด้วย Java Script -->
	
	<div class="modal fade" id="myModal" role="dialog">
	  <div class="modal-dialog">
		 
		<!-- เนือหาของ Modal ทั้งหมด -->
		<div class="modal-content">
		 <!-- ส่วนหัวของ Modal  -->
		 <div class="modal-header">
		  <!-- ปุ่มกดปิด (X) ตรงส่วนหัวของ Modal  -->
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Register Success!</h4>
		</div>
		<!-- ส่วนเนื้อหาของ Modal  -->
		<div class="modal-body">
		  <p>Please activate account in your email</p>
		</div>
		<div class="modal-footer">
		 <!-- ปุ่มกดปิด (Close) ตรงส่วนล่างของ Modal  -->
		 <button type="button"  class="btn btn-default"  onclick="window.location='login.html'" data-dismiss="modal">Close</button>
	   </div>
	 </div>
	  
   </div>
 </div>
  
</div>
	<?php
}

mysqli_close($con);
?>
 
</body>

<script type="text/javascript">
  $(window).load(function(){
    $('#myModal').modal('show');
  });
  </script>
</html>
 

