<?php
require_once('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
$Name = $_POST['Name'];
$Lastname = $_POST['Lastname'];
$Email = $_POST['Email'];
$Active =  "Yes";
$sql = "INSERT INTO member (Username,Password,Name,Lastname,Email,Status,SID,Active) VALUES ('".$username."','".$password."','".$Name."',
'".$Lastname."','".$Email."','USER',NULL,'Yes')" ;
$query = mysqli_query($con,$sql);
// $result =mysqli_fetch_array($query);
if(!$query){ echo "fail";}
else {echo "success";}
echo $sql;
?>