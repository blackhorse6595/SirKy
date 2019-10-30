<?php  
include_once("connect.php");
// if(isset($_POST['action'])){ 
//     echo "<script>console.log('1');</script>"
// }
// if(isset($_POST['action']) && $_POST['action']=="add"){      
//     $lat = $_POST["myPosition_lat"];
//     $lon = $_POST["myPosition_lon"];
//     $user = $_POST["user"];
//     $name = $_POST["name"];
//     $des = $_POST["messagetext"];
//     // $sql = "INSERT INTO help VALUES(NULL,'$lat','$lon','$user','$name','$des')" ;
//     // $result = $con->query($sql);
// }
// if(isset($_POST['action']) && ($_POST['action'] == "aa")){
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
// }
  
exit();
?>
