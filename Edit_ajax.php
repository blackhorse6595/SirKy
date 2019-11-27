<?php
require_once('connect.php');
$username = $_POST['username'];
echo "$username" ;
$password = $_POST['password'];
$Name = $_POST['Name'];
echo "$Name" ;
$Lastname = $_POST['Lastname'];
$Email = $_POST['Email'];
echo "$Email" ;

$sql = "UPDATE  member SET  Name = '".$_POST["Name"]."' ,
Lastname = '".$_POST["Lastname"]."' WHERE username =  '".$username."' ";

$query = mysqli_query($con,$sql);
// $result =mysqli_fetch_array($query);
if(!$query){ echo "fail";}
else {echo "success";}
echo $sql;
?>