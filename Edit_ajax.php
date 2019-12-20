<?php
require_once('connect.php');
session_start();
$username = $_POST['username'];
echo "$username" ;
$password = $_POST['password'];
$Name = $_POST['Name'];
echo "$Name" ;
$Lastname = $_POST['Lastname'];
$Email = $_POST['Email'];
echo "$Email" ;

$sql = "UPDATE  member SET  Name = '".$_POST["Name"]."' ,
Lastname = '".$_POST["Lastname"]."' ,
Tel = '".$_POST["Tel"]."' WHERE username =  '".$username."' ";

$query = mysqli_query($con,$sql);
// $result =mysqli_fetch_array($query);
if(!$query){ echo "fail";}
else {echo "success";}
echo $sql;
// unset($_SESSION['User']);
$_SESSION['User'] =  $_POST["Name"] ;
$_SESSION['Lastname'] = $_POST['Lastname'] ; 
$_SESSION['Tel'] = $_POST['Tel'] ; 
// echo  $_SESSION['User'] ;
// echo "<script>window.location.href='membermap.php';</script>";
?>