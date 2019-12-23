<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<title>Khao Yai</title>
</head>
<body>
<?php

require_once("connect.php");

$strSQL = "SELECT * FROM member WHERE SID = '".trim($_GET['sid'])."' AND UserID = '".trim($_GET['uid'])."' ";
$objQuery = mysqli_query($con,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)
{
		?> <div class="container" >

 

		<!--ส่วนของ Modal สังเกตุ id myModal ครับ ส่วนนี้แหละจะถูกเรียกด้วย Java Script -->
		
		<div class="modal fade" id="myModal" role="dialog">
		  <div class="modal-dialog">
			 
			<!-- เนือหาของ Modal ทั้งหมด -->
			<div class="modal-content">
			 <!-- ส่วนหัวของ Modal  -->
			 <div class="modal-header">
			  <!-- ปุ่มกดปิด (X) ตรงส่วนหัวของ Modal  -->
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Activate Fail!</h4>
			</div>
			<!-- ส่วนเนื้อหาของ Modal  -->
			<div class="modal-body">
			  <p>Activate fail please contact staff!!!</p>
			</div>
			<div class="modal-footer">
			 <!-- ปุ่มกดปิด (Close) ตรงส่วนล่างของ Modal  -->
			 <button type="button"  class="btn btn-default"  onclick="window.location='login.html'" data-dismiss="modal">Close</button>
		   </div>
		 </div>
		  
	   </div>
	 </div>
	  
	</div> <?php
}
else
{	
		$strSQL = "UPDATE member SET Active = 'Yes'  WHERE SID = '".trim($_GET['sid'])."' AND UserID = '".trim($_GET['uid'])."' ";
		$objQuery = mysqli_query($con,$strSQL);
?>
	 <!-- <div class="container" > -->
<!--ส่วนของ Modal สังเกตุ id myModal ครับ ส่วนนี้แหละจะถูกเรียกด้วย Java Script -->

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
	 
	<!-- เนือหาของ Modal ทั้งหมด -->
	<div class="modal-content">
	 <!-- ส่วนหัวของ Modal  -->
	 <div class="modal-header">
	  <!-- ปุ่มกดปิด (X) ตรงส่วนหัวของ Modal  -->
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title">Activate Success</h4>
	</div>
	<!-- ส่วนเนื้อหาของ Modal  -->
	<div class="modal-body">
	  <p>Activate Success</p>
	</div>
	<div class="modal-footer">
	 <!-- ปุ่มกดปิด (Close) ตรงส่วนล่างของ Modal  -->
	 <button type="button"  class="btn btn-default"  onclick="window.location='login.html'" data-dismiss="modal">Close</button>
   </div>
 </div>
  
</div>
<!-- </div> -->

</div> <?php
}

mysqli_close($con);
?>
</body>
</html>

<script type="text/javascript">
  $(window).load(function(){
    $('#myModal').modal('show');
  });
  </script>

