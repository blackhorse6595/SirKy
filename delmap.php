<?php 
require_once("connect.php");
 $id = $_POST["id"];
 $sql = "DELETE FROM `locations` WHERE `id`= ".$id;
 $result = $con->query($sql);
 echo "success";
?>