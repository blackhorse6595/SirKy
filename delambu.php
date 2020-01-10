<?php 

require_once("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php 

 $username = $_POST["username"];
 $sql = "DELETE FROM `user_position` WHERE `username`= '".$username."' ";
//  echo $sql;
//  echo $sql;
 $result = $con->query($sql);
 if($result){
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
		  <h4 class="modal-title">Success</h4>
		</div>
		<!-- ส่วนเนื้อหาของ Modal  -->
		<div class="modal-body">
		  <p>ลบข้อมูลสำเร็จ</p>
		</div>
		<div class="modal-footer">
		 <!-- ปุ่มกดปิด (Close) ตรงส่วนล่างของ Modal  -->
		 <button type="button"  class="btn btn-default"  onclick="window.location='adminambu.php'" data-dismiss="modal">Close</button>
	   </div>
	 </div>  
   </div>
 </div>
</div>
    <?php 
}else {
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
		  <h4 class="modal-title">Fail!</h4>
		</div>
		<!-- ส่วนเนื้อหาของ Modal  -->
		<div class="modal-body">
		  <p>ไม่สามารถลบได้</p>
		</div>
		<div class="modal-footer">
		 <!-- ปุ่มกดปิด (Close) ตรงส่วนล่างของ Modal  -->
		 <button type="button"  class="btn btn-default"  onclick="window.location='adminambu.php'" data-dismiss="modal">Close</button>
	   </div>
	 </div>
	  
   </div>
 </div>
  
</div>
    <?php 
    
 }
?>
</body>
</html>
<script type="text/javascript">
  $(window).load(function(){
    $('#myModal').modal('show');
  });
  </script>