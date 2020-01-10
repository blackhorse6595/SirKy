<?php 
require_once("connect.php");
if($_POST['action'] == 1){
 $id = $_POST["id"];
 $sql = "DELETE FROM `help` WHERE `id`= ".$id;
 echo $sql;
 $result = $con->query($sql);
 if($result){
  echo "success";
 }else $con->error ;
}

if($_POST['action'] == 2){
    $id = $_POST["id"];
    $sql = "UPDATE help set  Used = 'No'  WHERE `id`= ".$id;
    echo $sql;
    $result = $con->query($sql);
    if($result){
     echo "success";
    }else $con->error ;
}
?>