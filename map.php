<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

include 'locations_model.php';

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Google Map API 3 - 01</title>
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
    width:550px;
    height:400px;
    margin:auto;
/*  margin-top:100px;*/
}
</style>
 
 
</head>
 
<body>
  <div id="map_canvas"></div>
 <div id="showDD" style="margin:auto;padding-top:5px;width:550px;">  
  <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">  
    Latitude  
    <input name="lat_value" type="text" id="lat_value" value="0" />  <br />
    Longitude  
    <input name="lon_value" type="text" id="lon_value" value="0" />  <br />
  Zoom  
  <input name="zoom_value" type="text" id="zoom_value" value="0" size="5" />  
  <br />
  <input type="submit" name="button" id="button" value="บันทึก" />  
  </form>  
</div> 
   
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">

var directionShow; // กำหนดตัวแปรสำหรับใช้งาน กับการสร้างเส้นทาง
var directionsService; // กำหนดตัวแปรสำหรับไว้เรียกใช้ข้อมูลเกี่ยวกับเส้นทาง
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของเส้นทางเมื่อโหลดครั้งแรก
var initialTo; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
var searchRoute; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้
function initialize() { // ฟังก์ชันแสดงแผนที่
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	directionShow=new  GGM.DirectionsRenderer({draggable:true});
    directionsService = new GGM.DirectionsService();
	 // เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี
		if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(function(position){
					my_Latlng = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
				
					var infowindow = new GGM.InfoWindow({
						map: map,
						position: my_Latlng,
						content: 'คุณอยู่ที่นี่.'
					});
                 
					var my_Point = infowindow.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
					map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker       
					$("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
					$("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
					$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value              
					map.setCenter(my_Latlng);
				},function() {
					// คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน
				});
		}else{
			 // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง
		}
    // กำหนดจุดเริ่มต้นของแผนที่
	initialTo=new GGM.LatLng(13.8129355,100.7316899); 
    my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);

    var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
    var my_DivObj=$("#map_canvas")[0]; 
    // กำหนด Option ของแผนที่
    var myOptions = {
        zoom: 13, // กำหนดขนาดการ zoom
        center: my_Latlng , // กำหนดจุดกึ่งกลาง
        mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
    };
    map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
	directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map

	if(map){ // เงื่่อนไขถ้ามีการสร้างแผนที่แล้ว
         searchRoute(my_Latlng,initialTo); // ให้เรียกใช้ฟังก์ชัน สร้างเส้นทาง
    }
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
        // นำค่าจากตัวแปรไปแสดงใน textbox ที่ต้องการ
        $("#namePlaceGet").val(addressStart);
        $("#toPlaceGet").val(addressEnd);
        $("#distance_text").val(distanceText);
        $("#distance_value").val(distanceVal);
        $("#duration_text").val(durationText);
        $("#duration_value").val(durationVal);      
    });
 

 
 
 
   var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
	var locations = <?php get_confirmed_locations() ?>; /*marker*/
     /**
         * loop through (Mysql) dynamic locations to add markers to map.    โช marker
         */
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
                    confirmed =  locations[i][4] === '1' ?  'checked'  :  0;
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

    // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
    GGM.event.addListener(map, 'zoom_changed', function() {
        $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value  
    });
 
}$(function(){
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
                var distanceText=results.routes[0].legs[0].distance.text; // ระยะทางข้อความ
                var distanceVal=results.routes[0].legs[0].distance.value;// ระยะทางตัวเลข
                var durationText=results.routes[0].legs[0].duration.text; // ระยะเวลาข้อความ
                var durationVal=results.routes[0].legs[0].duration.value; // ระยะเวลาตัวเลข     
                // นำค่าจากตัวแปรไปแสดงใน textbox ที่ต้องการ
                $("#namePlaceGet").val(addressStart);
                $("#toPlaceGet").val(addressEnd);
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
     
    // ส่วนควบคุมปุ่มคำสั่งใช้งานฟังก์ชัน
    $("#SearchPlace").click(function(){ // เมื่อคลิกที่ปุ่ม id=SearchPlace 
        searchRoute();  // เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง
    });
 
    $("#namePlace,#toPlace").keyup(function(event){ // เมื่อพิมพ์คำค้นหาในกล่องค้นหา
        if(event.keyCode==13 && $(this).val()!=""){ //  ตรวจสอบปุ่มถ้ากด ถ้าเป็นปุ่ม Enter 
            searchRoute();      // เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง
        }       
    });
     
    $("#iClear").click(function(){
        $("#namePlace,#toPlace").val(""); // ล้างค่าข้อมูล สำหรับพิมพ์คำค้นหาใหม่
    });
     
});

$(function(){
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
    
    $("<script/>", {
      "type": "text/javascript",
      src: "//maps.google.com/maps/api/js?key=AIzaSyD0xTflD2TcRSIu_bQzF1Sa2xLMKPsMZLA&sensor=false&language=th&callback=initialize"
    }).appendTo("body");    
});
</script>  
</body>
</html>