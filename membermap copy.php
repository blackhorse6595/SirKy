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
                            <a class="nav-link js-scroll-trigger" href="user-index.php">home</a>
                        </li><!--/.nav-item-->
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="membermap.php">ดูแผนที่</a>
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
    width:650px;
    height:400px;
    margin:auto;    
    
}   
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
    top:0px;
    width:100%;
    height:400px;
    margin:auto;
}
/*css กำหนดรูปแบบ ของ input สำหรับพิมพ์ค้นหา effect */
.controls_tools {
    margin-top: 16px;
    border: 1px solid transparent;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 32px;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}
/*css กำหนดรูปแบบ ของ input สำหรับพิมพ์ค้นหา*/
#pac-input {
    background-color: #fff;
    padding: 0 11px 0 13px;
    width: 60%;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    text-overflow: ellipsis;
}
/*css กำหนดรูปแบบ ของ input สำหรับพิมพ์ค้นหา ขณะ focus*/
#pac-input:focus {
    width: 60%;
    border-color: #4d90fe;
    margin-left: -1px;
    padding-left: 14px;  /* Regular padding-left + 1. */     
}
 
</style>
<br />
<br />
&nbsp;
</p>
<div id="contain_map">
  <input id="pac-input" class="controls_tools" type="text"placeholder="Enter a location">  
  <div id="map_canvas">&nbsp;</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
var geocoder; // กำหนดตัวแปรสำหรับ เก็บ Geocoder Object ใช้แปลงชื่อสถานที่เป็นพิกัด
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker
var directionShow; // กำหนดตัวแปรสำหรับใช้งาน กับการสร้างเส้นทาง
var directionsService; // กำหนดตัวแปรสำหรับไว้เรียกใช้ข้อมูลเกี่ยวกับเส้นทาง
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของเส้นทางเมื่อโหลดครั้งแรก
var initialTo; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
var searchRoute; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้
var inputSearch; // กำหนดตัวแปร สำหรับ อ้างอิง input สำหรับพิมพ์ค้นหา
var infowindow;// กำหนดตัวแปร สำหรับใช้แสดง popup สถานที่ ที่ค้นหาเจอ
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
     
					// เรียกใช้งาน Autocomplete โดยส่งค่าจากข้อมูล input ชื่อ inputSearch
					autocomplete = new GGM.places.Autocomplete(inputSearch);
					autocomplete.bindTo('bounds', map); 
     
					infowindow = new GGM.InfoWindow();// เก็บ InfoWindow object ไว้ในตัวแปร infowindow
					// เก็บ Marker object พร้อมกำหนดรูปแบบ ไว้ในตัวแปร my_Marker
					my_Marker = new GGM.Marker({
					map: map,
					anchorPoint: new GGM.Point(0, -29)
					});

					if(map){ // เงื่่อนไขถ้ามีการสร้างแผนที่แล้ว
						 searchRoute(my_Latlng,initialTo); // ให้เรียกใช้ฟังก์ชัน สร้างเส้นทาง
					}

					
					
	
			});

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
			

	// กำหนด event ให้กับเส้นทาง กรณีเมื่อมีการเปลี่ยนแปลง 
	GGM.event.addListener(directionShow, 'directions_changed', function() {
   
		var results=directionShow.directions; // เรียกใช้งานข้อมูลเส้นทางใหม่ 
		// นำข้อมูลต่างๆ มาเก็บในตัวแปรไว้ใช้งาน
		var addressStart=results.routes[0].legs[0].start_address; // สถานที่เริ่มต้น
		var addressEnd=results.routes[0].legs[0].end_address;// สถานที่ปลายทาง
		var distanceText=results.routes[0].legs[0].distance.text; // ระยะทางข้อความ
		var distanceVal=results.routes[0].legs[0].distance.value;// ระยะทางตัวเลข
		var durationText=results.routes[0].legs[0].duration.text; // ระยะเวลาข้อความ
		var durationVal=results.routes[0].legs[0].duration.value; // ระยะเวลาตัวเลข
      //เมื่อมีการเลื่อนหมุด
        var startlatlng = results.routes[0].legs[0].start_location;
        var startlat =  results.routes[0].legs[0].start_location.lat();
        var startlng =  results.routes[0].legs[0].start_location.lng();
        var endlatlng = results.routes[0].legs[0].end_location;
        var endlat =  results.routes[0].legs[0].end_location.lat();
        var endlng =  results.routes[0].legs[0].end_location.lng();       
      //เพิ่มข้อมูล ถ้ามีการเลื่อนหมุด
				$("#a").val(startlatlng);
				$("#a1").val(startlat);
                $("#a2").val(startlng);
				$("#b").val(endlatlng);
                $("#b1").val(endlat);
                $("#b2").val(endlng);
      
		// นำค่าจากตัวแปรไปแสดงใน textbox ที่ต้องการ
      
      
      
	});
 // เมื่อแผนที่มีการเปลี่ยนสถานที่ จากการค้นหา
    GGM.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();// เปิด ข้อมูลตัวปักหมุด (infowindow)
        my_Marker.setVisible(false);// ซ่อนตัวปักหมุด (marker) 
        var place = autocomplete.getPlace();// เก็บค่าสถานที่จากการใช้งาน autocomplete ไว้ในตัวแปร place
        if (!place.geometry) {// ถ้าไม่มีข้อมูลสถานที่ 
            return;
        }
         
        // ถ้ามีข้อมูลสถานที่  และรูปแบบการแสดง  ให้แสดงในแผนที่
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else { // ให้แสดงแบบกำหนดเอง
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // แผนที่ขยายที่ขนาด 17 ถือว่าเหมาะสม
        }
        my_Marker.setIcon(/** // กำหนดรูปแบบของ icons การแสดงสถานที่ */({
            url: place.icon,
            size: new GGM.Size(71, 71),
            origin: new GGM.Point(0, 0),
            anchor: new GGM.Point(17, 34),
            scaledSize: new GGM.Size(35, 35)
        }));


         
        // ปักหมุด (marker) ตำแหน่ง สถานที่ที่เลือก
        my_Marker.setPosition(place.geometry.location);
        my_Marker.setVisible(true);// แสดงตัวปักหมุด จากการซ่อนในการทำงานก่อนหน้า
         
        // สรัางตัวแปร สำหรับเก็บชื่อสถานที่ จากการรวม ค่าจาก array ข้อมูล
        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
         
        // แสดงข้อมูลในตัวปักหมุด (infowindow)
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, my_Marker);// แสดงตัวปักหมุด (infowindow)
         
    });
 
 
}


$(function(){
	// ส่วนของฟังก์ชัน สำหรับการสร้างเส้นทาง
	searchRoute=function(FromPlace,ToPlace){ // ฟังก์ชัน สำหรับการสร้างเส้นทาง
		if(!FromPlace && !ToPlace){ // ถ้าไม่ได้ส่งค่าเริ่มต้นมา ให้ใฃ้ค่าจากการค้นหา
			var FromPlace=$("#namePlace").val();// รับค่าชื่อสถานที่เริ่มต้น
			var ToPlace=$("#toPlace").val(); // รับค่าชื่อสถานที่ปลายทาง
		}
		// กำหนด option สำหรับส่งค่าไปให้ google ค้นหาข้อมูล
		var request={
			origin:FromPlace, // สถานที่เริ่มต้น
			destination:ToPlace, // สถานที่ปลายทาง
			travelMode: GGM.DirectionsTravelMode.DRIVING // กรณีการเดินทางโดยรถยนต์
		};
		// ส่งคำร้องขอ จะคืนค่ามาเป็นสถานะ และผลลัพธ์
		directionsService.route(request, function(results, status){
			if(status==GGM.DirectionsStatus.OK){ // ถ้าสามารถค้นหา และสร้างเส้นทางได้
				directionShow.setDirections(results); // สร้างเส้นทางจากผลลัพธ์
				// นำข้อมูลต่างๆ มาเก็บในตัวแปรไว้ใช้งาน 
				var addressStart=results.routes[0].legs[0].start_address; // สถานที่เริ่มต้น
				var addressEnd=results.routes[0].legs[0].end_address;// สถานที่ปลายทาง
				
				var locaStart=results.routes[0].legs[0].start_location; // สถานที่เริ่มต้น
				var locaEnd=results.routes[0].legs[0].end_location;
				
				var distanceText=results.routes[0].legs[0].distance.text; // ระยะทางข้อความ
				var distanceVal=results.routes[0].legs[0].distance.value;// ระยะทางตัวเลข
				var durationText=results.routes[0].legs[0].duration.text; // ระยะเวลาข้อความ
				var durationVal=results.routes[0].legs[0].duration.value; // ระยะเวลาตัวเลข		
				// นำค่าจากตัวแปรไปแสดงใน textbox ที่ต้องการ
				$("#namePlaceGet").val(addressStart);
				$("#toPlaceGet").val(addressEnd);
				$("#a").val(locaStart);
				$("#a1").val(locaStart.lat());
                $("#a2").val(locaStart.lng());
				$("#b").val(locaEnd);
                $("#b1").val(locaEnd.lat());
                $("#b2").val(locaEnd.lng());
								
				$("#distance_text").val(distanceText);
				$("#distance_value").val(distanceVal);
				$("#duration_text").val(durationText);
				$("#duration_value").val(durationVal);		
				// ส่วนการกำหนดค่านี้ จะกำหนดไว้ที่ event direction changed ที่เดียวเลย ก็ได้
			}else{
				// กรณีไม่พบเส้นทาง หรือไม่สามารถสร้างเส้นทางได้
				// โค้ดตามต้องการ ในทีนี้ ปล่อยว่าง
			}
		});
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
<input type="submit" align="center" name="Submit2" value="ขอความช่วยเหลือ" onclick='location.replace("www.thaicreate.com")'>
</body>
</html>