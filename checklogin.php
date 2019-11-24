
<?php
session_start();
if (isset($_POST['Username'])) {
  //connection
  require_once("connect.php");
  //รับค่า user & password
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];
  //query 
  $sql = "SELECT * FROM member WHERE Username = '" . trim($_POST['Username']) . "' 
        and Password = '" . trim($_POST['Password']) . "'
        and Active = 'Yes' ";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_array($result);

    $_SESSION["username"] = $row["Username"];
    $_SESSION["User"] = $row["Name"];
    $_SESSION["type"] = $row["Status"];

    if ($_SESSION["type"] == "employee") { //ถ้าเป็น employee ให้กระโดดไปหน้า em-index.php

      header("Location: em-index.php");
    }

    if ($_SESSION["type"] == "USER") {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
      header("Location: user-index.php");
      
    }
    if ($_SESSION["type"] == "ambulance") { //ถ้าเป็น ambulance ให้กระโดดไปหน้า my_friend_location.php

      header("Location: my_friend_location.php");
    }
  } else {
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {




  // Header("Location: login.html"); //user & password incorrect back to login again

}
?>