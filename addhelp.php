<?php
require_once("connect.php");
SESSION_START();
echo $_POST['action'] ;

if(isset($_POST['action']) && $_POST['action'] == "1"){
	$_SESSION['lat'] = $_POST["lat"];
	$_SESSION['lon'] = $_POST["lon"];
	echo "bbb" ;
}
 if(isset($_POST['action']) && ($_POST['action'] == "2")){
	echo "aaaaa" ;
	$lat = $_SESSION['lat'];
	$lon = $_SESSION['lon'];
	$user = $_SESSION['username'];
	$name = $_SESSION['User'];
	$data = $_POST['txt'];
	$sql = "INSERT INTO help VALUES(NULL, '$lat','$lon','$user','$name','$data')";
	echo "$sql" ;
	$result = $con->query($sql);
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
	exit();
}

?>
