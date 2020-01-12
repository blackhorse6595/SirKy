<?php
require_once('connect.php');
session_start();
$sid = session_id();
// echo $sid;
echo "<meta http-equiv='Content-Security-Policy' content='upgrade-insecure-requests'>";
$username = $_POST['username'];
$password = $_POST['password'];
$Name = $_POST['Name'];
$Lastname = $_POST['Lastname'];
$Tel = $_POST['Tel'];
$Email = $_POST['Email'];
$Active =  "Yes";
$sql = "SELECT * from member where Username = '".$username."' or Email = '".$Email."'" ;

$query = mysqli_query($con,$sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
if($result){?>
   <script language ="javascript"> 
    alert("มี Username หรือ Email ซ้ำ")
    window.location='adminem.php' 
  </script>
  <?php
}else{
$sql = "INSERT INTO member (Username,Password,Name,Lastname,Tel,Email,Status,SID,Active) VALUES ('".$username."','".$password."','".$Name."',
'".$Lastname."','".$Tel."','".$Email."','employee','".$sid."','Yes')" ;
$query = mysqli_query($con,$sql);
// $result =mysqli_fetch_array($query);
if(!$query){ ?>
   <script language ="javascript">
 alert("เพิ่มข้อมูลล้มเหลว")
  window.location='adminem.php' 
</script> ; <?php
 
//  header('Location: adminem.php');
}
else { ?>
   <script language ="javascript">
 alert("เพิ่มข้อมูลสำเร็จ")
  window.location='adminem.php' 
</script> ; <?php

// header('Location: adminem.php');    
}

}
?>