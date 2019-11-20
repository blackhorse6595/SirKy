
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
require("connect.php");
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
</body>
</html>
