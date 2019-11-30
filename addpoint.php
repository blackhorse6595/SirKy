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
		$data = $_POST['txt'];
	$sql = "INSERT INTO locations VALUES(NULL, '$lat','$lon','$data','1')";
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
