
<?php
require_once('connect.php');
session_start();
if( $_SESSION["type"] == 'Ambulance' ){
    echo $_SESSION['type']."<br>";
    echo $_SESSION["username"];
    $sql = " UPDATE `user_position` SET `user_latitude`= NULL ,`user_longitude`= NULL WHERE username = '{$_SESSION['username']}'" ;
    $query = $con ->query($sql);
    // echo $sql ;  
}
session_destroy();
header("Location: index.html ");	
?>