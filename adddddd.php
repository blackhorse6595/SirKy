<?php  
include_once("connect.php");
 $lat = $_POST["myPosition_lat"];
 $lon = $_POST["myPosition_lon"];
 $user = $_POST["user"];
 $name = $_POST["name"];
 $des = $_POST["messagetext"];
if(isset($_POST['action']) && $_POST['action']=="add"){
           
            
             $sql = "insert into help (latitude,longitude,user,name,description) values('$lat','$lon','$user','$name','$des') ;
             $result = $con->query($sql);
           
           		 			
        }

        ?>
