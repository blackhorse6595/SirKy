<?php 
require_once("connect.php");
 $id = $_POST["id"];
 $sql = "DELETE FROM `help` WHERE `id`= ".$id;
 echo $sql;
 $result = $con->query($sql);
 if($result){
  echo "success";
 }else $con->error ;
?>