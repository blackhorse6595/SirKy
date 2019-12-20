<?php
require_once('connect.php') ;
SESSION_START();
if(isset($_POST['action']) && $_POST['action'] == "1"){
$_SESSION['lata'] = $_POST['lata'];
$_SESSION['lona'] = $_POST['lona'];
echo $_POST['action'];
echo $_SESSION['lata'];
echo $_SESSION['lona'];
}

if(isset($_POST['action']) && ($_POST['action'] == "2")){
    echo $_POST['action'];
    echo $_POST['id'];
$id = $_POST['id'];
$lata = $_SESSION['lata'];
$lona = $_SESSION['lona'];
$sql = "update locations set lat = '".$lata."',lng = '".$lona."' where  id  ='".$id."'" ;
$query = $con -> query($sql);
echo "$sql";
}
?>