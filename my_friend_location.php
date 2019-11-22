<?php

include('locations_model.php');

 require_once("connect.php");
session_start();
if ($_SESSION['type'] != 'ambulance') {
    header("Location: login.php");
    exit;
}
 
// เช็คว่า User ได้ผ่านการ Login มาหรือไม่ (ถ้าไม่ได้ Login มาให้ส่งต่อไปหน้าไหนก็ใส่ URL ลงไปครับ ตรงตำแหน่ง login.php)
if (!isset($_SESSION['type'])) {
     header("Location: login.php");
     exit;
}
 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Google Map API 3 - Friend 01</title>
<style type="text/css">
html { height: 100% }
body { 
    height:100%;
    margin:0;padding:0;
    font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
    font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
    width:650px;
    height:500px;
    margin:auto;
    margin-top:50px;
}
</style>
 
 
</head>
 

<head>
  <!-- meta data -->
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- title of site -->
    <title>อุทยานแห่งชาติเขาใหญ่</title>
    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--animate.css-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--flaticon.css-->
    <link rel="stylesheet" href="assets/css/flaticon.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--style.css-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <style>
        img{
            width:100%;
            height: 500px;
            object-fit:cover;
            background-repeat:no-repeat;
            background-size:cover;
        }
    </style>

</head>
 
<body id="page-top">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <!--top-area start -->
    <section class="top-area">
        <nav class="navbar navbar-expand-lg navbar-dark " id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Khao Yai</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button><!--/button-->
                <div class="collapse navbar-collapse nav-responsive-list" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#"><?php echo $_SESSION['User']; ?></a>
                        </li><!--/.nav-item-->
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="user-index.php">home</a>
                        </li><!--/.nav-item-->
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" Onclick="" href="membermap.php">Show map</a>
                        </li><!--/.nav-item-->
                        <li class="nav-item">
                            
                            <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ขอความช่วยเหลือ</a>
                        </li><!--/.nav-item-->
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
                        </li><!--/.nav-item-->
                    </ul><!--/ul-->
                </div><!--/.collapse-->
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </section><!--/.top-area-->
    <!--top-area end -->
  <div id="map_canvas"></div>
  
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  
<script type="text/javascript">
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
function initialize() { // ฟังก์ชันแสดงแผนที่
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
    // กำหนดจุดเริ่มต้นของแผนที่
    var my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
    var my_DivObj=$("#map_canvas")[0]; 
    // กำหนด Option ของแผนที่
    var myOptions = {
        zoom: 12, // กำหนดขนาดการ zoom
        center: my_Latlng , // กำหนดจุดกึ่งกลาง
        mapTypeId:GGM.MapTypeId.ROADMAP, // กำหนดรูปแบบแผนที่
        mapTypeControlOptions:{ // การจัดรูปแบบส่วนควบคุมประเภทแผนที่
            position:GGM.ControlPosition.TOP, // จัดตำแหน่ง
            style:GGM.MapTypeControlStyle.DROPDOWN_MENU // จัดรูปแบบ style 
        }
    };
    map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
 
    // เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี  
    if(navigator.geolocation){  
            navigator.geolocation.getCurrentPosition(function(position){  
                var myPosition_lat=position.coords.latitude; // เก็บค่าตำแหน่ง latitude  ปัจจุบัน
                var myPosition_lon=position.coords.longitude;  // เก็บค่าตำแหน่ง  longitude ปัจจุบัน
                var user = "<?php echo $_SESSION['username']?>";
                var name = "<?php echo $_SESSION['User']?>";
                // สรัาง LatLng ตำแหน่ง สำหรับ google map
                var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
                my_Marker = new GGM.Marker({ // สร้างตัว marker  
                    position: pos,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
                    map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
                    // icon:"http://www.ninenik.com/demo/google_map/images/male-2.png",  
                    // draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้  
                    title:"ตำแหน่งของคุณ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ  
                });     
                $.post("save_location.php",{ // ส่งค่าตำแหน่งปัจจุบัน บันทึกลงฐานข้อมูล
                    myPosition_lat:myPosition_lat,   // ส่งค่า latitude
                    myPosition_lon:myPosition_lon,  // ส่งค่า longitude
                    user:user,
                    name:name
                },function() {    
                // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน    
            });    
         
            // ให้อัพเดทตำแหน่งในแผนที่อัตโนมัติ โดยใช้งาน watchPosition
            // ค่าตำแหน่งจะได้มาเมื่อมีการส่งค่าตำแหน่งที่ถูกต้องกลับมา
            navigator.geolocation.watchPosition(function(position){    
  
                var myPosition_lat=position.coords.latitude; // เก็บค่าตำแหน่ง latitude  ปัจจุบัน  
                var myPosition_lon=position.coords.longitude;  // เก็บค่าตำแหน่ง  longitude ปัจจุบัน  
                                
                // สรัาง LatLng ตำแหน่งปัจจุบัน watchPosition
                var pos = new GGM.LatLng(myPosition_lat,myPosition_lon);     
                 
                // ให้ marker เลื่อนไปอยู่ตำแหน่งปัจจุบัน ตามการอัพเดทของตำแหน่งจาก watchPosition
                my_Marker.setPosition(pos);
                                     
                var my_Point = my_Marker.getPosition();  // ดึงตำแหน่งตัว marker  มาเก็บในตัวแปร
                $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value  
                $("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value   
                $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value  
                    map.panTo(pos); // เลื่อนแผนที่ไปตำแหน่งปัจจุบัน
                    map.setCenter(pos);  // กำหนดจุดกลางของแผนที่เป็น ตำแหน่งปัจจุบัน                                   
                });
                
            },function() {  
                // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน  
            });  
    }else{  
         // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง  
    }   
 
 
}

$(function(){
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
    // v=3.2&sensor=false&language=th&callback=initialize
    //  v เวอร์ชัน่ 3.2
    //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
    //  language ภาษา th ,en เป็นต้น
    //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize  
    $("<script/>", {
      "type": "text/javascript",
      src: "//maps.google.com/maps/api/js?key=AIzaSyD0xTflD2TcRSIu_bQzF1Sa2xLMKPsMZLA&sensor=false&language=th&callback=initialize&libraries=places"
    }).appendTo("body");    
});
</script>  
<script src="assets/js/jquery.js"></script>

<!-- popper js -->
<script src="assets/js/popper.min.js"></script>

<!--bootstrap.min.js-->
<script src="assets/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!--Custom JS-->
<script src="assets/js/custom.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
             <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>