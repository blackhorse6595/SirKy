<html>
<head>
<title>ForgetPassword</title>
<!-- ส่วนของ Bootstrap -->
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php

	require_once("connect.php");
	$strSQL = "SELECT * FROM member WHERE Email = '".trim($_POST['txtEmail'])."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
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
             <h4 class="modal-title">Failed!</h4>
           </div>
           <!-- ส่วนเนื้อหาของ Modal  -->
           <div class="modal-body">
             <p>Not Found Your Email</p>
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
	else
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
		  <h4 class="modal-title">Success!</h4>
		</div>
		<!-- ส่วนเนื้อหาของ Modal  -->
		<div class="modal-body">
		  <p>Your password will send in your Email</p>
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
					

			$strTo = $objResult["Email"];
			$strSubject = "Your Account information username and password.";
			$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
			$strHeader .= "From: Kh@sirkys.com\nReply-To: webmaster@sirkys.com";
			$strMessage = "";
			$strMessage .= "Welcome : ".$objResult["Name"]."<br>";			
			// $strMessage .= "Username : ".$objResult["Username"]."<br>";
			// $strMessage .= "Password : ".$objResult["Password"]."<br>";
			$strMessage = "Please click link to change your password<br>";
			$strMessage .= "https://www.sirkys.com/changepassword.php?sid=".$objResult['SID']."&username=".$objResult["Username"]."<br>";
			$strMessage .= "=================================<br>";
			$strMessage .= "Sirkys.com<br>";
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 

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