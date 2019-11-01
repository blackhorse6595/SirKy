<?php
include_once("connect.php");
SESSION_START();
if(isset($_POST['action']) && ($_POST['action'] == "1")){
	echo 'Send Lat and Lon';
	$_SESSION['lat'] = $_POST['lat'];
	$_SESSION['lon'] = $_POST['lon'];
}
if(isset($_POST['action']) && ($_POST['action'] == "2")){
	echo 'Send Text';
	$lat = $_SESSION['lat'];
	$lon = $_SESSION['lon'];
	$user = $_SESSION['username'];
	$name = $_SESSION['User'];
	$des = $_POST["txt"];
	$sql = "INSERT INTO help VALUES(NULL,'$lat','$lon','$user','$name','$des')" ;
	$result = $con->query($sql);
	if ($result) {
		echo "<br>Insert Success";
	}else{
		echo "<br> Error";
	}
}

exit();
?>
