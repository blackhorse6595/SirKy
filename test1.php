<?php

include 'locations_model.php';

?>
<html>
<head>
<title></title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
</head>
 
<body>
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
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var inputSearch; // กำหนดตัวแปร สำหรับ อ้างอิง input สำหรับพิมพ์ค้นหา
var infowindow;// กำหนดตัวแปร สำหรับใช้แสดง popup สถานที่ ที่ค้นหาเจอ
var autocomplete; // กำหนดตัวแปร สำหรับเก็บค่า การใช้งาน places Autocomplete

function initialize() { // ฟังก์ชันแสดงแผนที่
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
    geocoder = new GGM.Geocoder(); // เก็บตัวแปร google.maps.Geocoder Object
    // กำหนดจุดเริ่มต้นของแผนที่
    var my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);
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
					//$("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
					//$("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
					//$("#zoom_value").	val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value              
					map.setCenter(my_Latlng);

				},function() {
					// คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน
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
       
 
            },function() {    
                // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน    
            });    
		}else{
			 // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง
		}

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
</body>
</html>