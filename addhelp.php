<?php
include_once("connect.php");
SESSTION_START();
if(isset($_POST['action']) && $_POST['action'] == "1"){
	$_SESSION['lat'] = $_POST["lat"];
	$_SESSION['lon'] = $_POST["lon"];
	echo $_SESSION['lat'];
	$user = $_POST["user"];
	$name = $_POST["name"];
	$des = $_POST["messagetext"];
	// $sql = "INSERT INTO help VALUES(NULL,'$lat','$lon','$user','$name','$des')" ;
	// $result = $con->query($sql);
}
 if(isset($_POST['action']) && ($_POST['action'] == "2")){
	$lat = $_POST['lat'];
	$lon = $_POST['lon'];
	$user = $_POST['user'];
	$name = $_POST['name'];
	$data = '1';
	$sql = "INSERT INTO `help` VALUES(NULL, '$lat','$lon','$user','$name','$data')";
	$result = $con->query($sql);
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
}
exit();
?>
