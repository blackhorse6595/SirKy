<? echo '<?xml version="1.0" encoding="UTF-8" ?>';?>
<?php
require_once("connect.php");
header('Content-Type : application/json');
    $con=mysqli_connect ("localhost", 'root', '','khoayai');
   $strSQL = "select * from help";
   $objQuery = mysqli_query($con,$strSQL);
   $resultArray = array();
   while($obResult = mysqli_fetch_assoc($objQuery))
    {
    array_push($resultArray,$obResult);
    }
    echo json_encode($resultArray);


?>