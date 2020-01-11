<?php
session_start();
//echo $_POST["hdnFbID"]."<br>";
//echo $_POST["hdnName"]."<br>";
//echo $_POST["hdnEmail"]."<br>";
print_r($_POST);
require_once('connect.php');
// Check Exists ID
$sql = "SELECT * FROM member WHERE Email = '" . $_POST["hdnemail"] . "' ";
echo "<br>$sql<br>";
$query = $con-> query($sql);
$row = $query -> fetch_assoc();

print_r($row);
if ($row) {
    $_SESSION["username"] = $row["username"];
    $_SESSION["User"] = $row["Name"];
    $_SESSION["type"] = $row["Status"];
    $_SESSION["Lastname"] = $row["Lastname"];
    $_SESSION["email"] = $row["Email"];

    header("location:membermap.php");
    
} else {
    // Create New ID

    // $strPicture = "https://graph.facebook.com/" . $_POST["hdnFbID"] . "/picture?type=large";
    // $strLink = "https://www.facebook.com/app_scoped_user_id/" . $_POST["hdnFbID"] . "/";
$sid = session_id();
    $sql = "  INSERT INTO  member (Username,Password,Name,Lastname,Tel,Email,Status,SID,Active)
				VALUES
				('" . trim($_POST["hdnFbID"]) . "',
				'FROMFacebook',
                '" . trim($_POST["hdnfirstname"]) . "',
				'" . trim($_POST["hdnlastname"]) . "',
                '',
                '" . trim($_POST["hdnemail"]) . "',
				
				'USER',
                '" . $sid. "',
                'Yes')";
        echo $sql;
    $query  = $con -> query($sql);
    if($query){
        echo "<br>sssdfdsff";
        $sql = "SELECT * FROM member WHERE Email = '" . $_POST["hdnemail"] . "' ";
        $query = $con -> query($sql);
        $row = $query -> fetch_assoc();
        echo "<br>";
        print_r($row);
        $_SESSION["username"] = $row["username"];
    $_SESSION["User"] = $row["Name"];
    $_SESSION["type"] = $row["Status"];
    $_SESSION["Lastname"] = $row["Lastname"];
    $_SESSION["email"] = $row["Email"];
    $_SESSION['Tel'] = "";
    echo "<br>";
        print_r($_SESSION);
    // header("location:membermap.php");
    }else{
        echo $con->error;

    }
   
    // header("location:page1.php");
    exit();
}

