<?php
require_once("connect.php");
print_r($_REQUEST);
$lat= $_REQUEST['myPosition_lat'];
$lon = $_REQUEST['myPosition_lon'];
$user = $_REQUEST['user'];
$name = $_REQUEST['name'];
$sql = "update user_position SET user_latitude='". $lat ."', user_longitude='". $lon ."'  WHERE user_id='". $user ."'";
$result = $con->query($sql);
echo $result;
// ตรวจสอบว่ามีการส่งคำค้นมาหรือไม่
// ตรวจสอบว่า มีข้อมูล สมาชิก ไอดี นี้อยู่ก่อนหรือไม่ ถ้ามี 
 
// ให้อัพเดทข้อมูล  
 
?>