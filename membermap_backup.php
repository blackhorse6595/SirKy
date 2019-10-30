<?php

include 'locations_model.php';

 include("connect.php");
session_start();
if ($_SESSION['type'] != 'member') {
    header("Location: login.php");
    exit;
}
 
// เช็คว่า User ได้ผ่านการ Login มาหรือไม่ (ถ้าไม่ได้ Login มาให้ส่งต่อไปหน้าไหนก็ใส่ URL ลงไปครับ ตรงตำแหน่ง login.php)
if (!isset($_SESSION['type'])) {
     header("Location: login.php");
     exit;
}
 
?>


<html>
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
<style type="text/css">
/* css สำหรับ div คลุม google map อีกที */
#contain_map{
    
    position:relative;
    width:75%;
    height:200px;
    margin:auto;    
    
}   
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
    overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
 </style>

&nbsp;
</p>
<div id="contain_map">

  <div id="map_canvas">&nbsp;</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  
<script type="text/javascript">
var geocoder; // กำหนดตัวแปรสำหรับ เก็บ Geocoder Object ใช้แปลงชื่อสถานที่เป็นพิกัด
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker

var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของเส้นทางเมื่อโหลดครั้งแรก




var autocomplete; // กำหนดตัวแปร สำหรับเก็บค่า การใช้งาน places Autocomplete
var bb; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
var cc; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้

function initialize() { // ฟังก์ชันแสดงแผนที่
	GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	directionShow=new  GGM.DirectionsRenderer({draggable:true});
	directionsService = new GGM.DirectionsService();
	geocoder = new GGM.Geocoder(); // เก็บตัวแปร google.maps.Geocoder Object
	
	// เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี
	
			navigator.geolocation.getCurrentPosition(function(position){
				
				var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
				
									// กำหนดจุดเริ่มต้นของแผนที่
					my_Latlng  = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
					// กำหนดตำแหน่งปลายทาง สำหรับการโหลดครั้งแรก

					initialTo=new GGM.LatLng(14.439424, 101.372485); 
					var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
					// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
					var my_DivObj=$("#map_canvas")[0];
					// กำหนด Option ของแผนที่
					var myOptions = {
						zoom: 13, // กำหนดขนาดการ zoom
						center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
						mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
					};


					map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
					directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map
					
						var infowindow = new GGM.InfoWindow({
						map: map,
						position: my_Latlng,
						content: 'คุณอยู่ที่นี่.'
					});
                 
					
					var my_Point = infowindow.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
					map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker       
					$("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
					$("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
					$("#zoom_value").	val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value              
					map.setCenter(my_Latlng);
					 inputSearch = $("#pac-input")[0]; // เก็บตัวแปร dom object โดยใช้ jQuery
					 // จัดตำแหน่ง input สำหรับการค้นหา ด้วย คำสั่งของ google map
					map.controls[GGM.ControlPosition.TOP_LEFT].push(inputSearch);
     
					
     
					infowindow = new GGM.InfoWindow();// เก็บ InfoWindow object ไว้ในตัวแปร infowindow
					// เก็บ Marker object พร้อมกำหนดรูปแบบ ไว้ในตัวแปร my_Marker
					my_Marker = new GGM.Marker({
					map: map,
					anchorPoint: new GGM.Point(0, -29)
					});

				

					
					
	
			});

			navigator.geolocation.watchPosition(function(position){  
  
                var myPosition_lat=position.coords.latitude; // เก็บค่าตำแหน่ง latitude  ปัจจุบัน  
                var myPosition_lon=position.coords.longitude;  // เก็บค่าตำแหน่ง  longitude ปัจจุบัน
                var user = "<?php echo $_SESSION['username']?>";
                var name = "<?php echo $_SESSION['User']?>";
                var pos = new GGM.LatLng(myPosition_lat,myPosition_lon);  
                $.post("addhelp.php", {// ไฟล์ php รับค่าจาก post ไป insert
                    lat: myPosition_lat, // ส่งค่าที่จะ insert
                    lon: myPosition_lon,  // ส่งค่าที่จะ insert
                    user:user,
                    name :name
                });    
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
       
  /**
     * loop through (Mysql) dynamic locations to add markers to map.    โช marker
         */
		var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
		var locations = <?php get_confirmed_locations() ?>; /*marker*/
        var i ; var confirmed = 0;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon :   locations[i][4] === '1' ?  red_icon  : purple_icon,
                html: "<div>\n" +
                "<table class=\"map1\">\n" +
                "<tr>\n" +
                "<td><a>Description:</a></td>\n" +
                "<td><textarea disabled id='manual_description' placeholder='Description'>"+locations[i][3]+"</textarea></td></tr>\n" +
                "</table>\n" +
                "</div>"
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow = new google.maps.InfoWindow();
                   var  confirmed =  locations[i][4] === '1' ?  'checked'  :  0;
                    $("#confirmed").prop(confirmed,locations[i][4]);
                    $("#id").val(locations[i][0]);
                    $("#description").val(locations[i][3]);
                    $("#form").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }



        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    callback(request.responseText, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }
            });
			

 
 
}

var dataList = {}
$(function(){dataList.addData = function(dataSend){
		dataSend.push({
            
			name:"action",
			value:"add"
             
		});
       
		// $.post("addhelp.php",dataSend,function(response){
           
		// 	if(response != null){		
		// 		if(response[0].error!=null || response[0].success!=null){
		// 			var statusText = (response[0].error!=null)?response[0].error:response[0].success;
		// 			$('#exampleModal').modal('toggle')
		// 			alert(statusText);					
		// 		}
		// 		if(response[0].success!=null){
		// 			$('#form_user')[0].reset();
		// 			dataList.getList(0,true);
		// 		}
		// 	}
           
		// });
	}
});
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
 
      <form id="form_user">
      <div class="form-group">
          
            <label for="messagetext" class="col-form-label">Message:</label>
            <input type="text" class="form-control" id="messagetext" name="messagetext" autocomplete="off">
          </div>
           
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="dataList.addData($('#form_user').serializeArray());">ขอความช่วยเหลือ</button>
      </div>
    </div>
    </form>
  </div>
</div>

</body>
</html>

