<?php 
session_start();
        if(isset($_POST['Username'])){
				//connection
                  include("connect.php");
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];
				//query 
                  $sql="SELECT * FROM username Where user ='".$Username."' and password ='".$Password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["username"] = $row["user"];
                      $_SESSION["User"] = $row["name"];
                      $_SESSION["type"] = $row["type"];

                      if($_SESSION["type"]=="employee"){ //ถ้าเป็น employee ให้กระโดดไปหน้า admin_page.php

                        Header("Location: em-index.php");

                      }

                      if ($_SESSION["type"]=="member"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
						

                        Header("Location: user-index.php"); 

                      }
                      if($_SESSION["type"]=="ambulance"){ //ถ้าเป็น ambulance ให้กระโดดไปหน้า admin_page.php

                        Header("Location: my_friend_location.php");

                      }


                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{
			

			

             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>