<?php require_once("connect.php"); ?>

<?php
session_start();
require_once 'locations_model.php';
require_once("connect.php");
if ($_SESSION['type'] != 'employee') {
  header("Location: login.html");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="icon" type="image/png" href="image/icons/favicon.png" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Khao Yai </title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0xTflD2TcRSIu_bQzF1Sa2xLMKPsMZLA">
    // api//
  </script>
  <style type="text/css">
    /* css สำหรับ div คลุม google map อีกที */
    #map {
      position: relative;
      width: 75%;
      height: 500px;
      margin: auto;
    }

    /* css กำหนดความกว้าง ความสูงของแผนที่ */
    #map_canvas {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
    }
  </style>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="em-index.php">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">Khao Yai
          <br><?php echo $_SESSION['User']; ?>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">



      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">








        <!-- Nav Item - Tables -->
        <li class="nav-item active">
          <a class="nav-link" href="emptable.php">
            <i class="fas fa-fw fa-table"></i>
            <span>ข้อมูลพนักงาน</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="membertable.php">
            <i class="fas fa-fw fa-table"></i>
            <span>ข้อมูลสมาชิก</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="emmap.php">
            <i class="fas fa-fw fa-table"></i>
            <span>เพิ่มตำแหน่ง</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="emmap1.php">
            <i class="fas fa-fw fa-table"></i>
            <span>เพิ่มตำแหน่งจากจุด</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-table"></i>
            <span>ออกจากระบบ</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            </li>



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <img class="img-profile rounded-circle" src="./image/avatar-01.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          &nbsp;
          </p>
          <div id="map">

            <div id="map_canvas">&nbsp;</div>
          </div>


          <script>
            /**
             * Create new map
             */
            var infowindow;
            var map;
            var red_icon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
            var purple_icon = 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png';
            var locations = <?php get_confirmed_locations() ?>;

            var myOptions = {
              zoom: 15,
              center: new google.maps.LatLng(14.439269, 101.372499),
              mapTypeId: 'roadmap'

            };
            map = new google.maps.Map(document.getElementById('map'), myOptions);

            /**
             * Global marker object that holds all markers.
             * @type {Object.<string, google.maps.LatLng>}
             */
            var markers = {};

            /**
             * Concatenates given lat and lng with an underscore and returns it.
             * This id will be used as a key of marker to cache the marker in markers object.
             * @param {!number} lat Latitude.
             * @param {!number} lng Longitude.
             * @return {string} Concatenated marker id.
             */
            var getMarkerUniqueId = function(lat, lng) {
              return lat + '_' + lng;
            };

            /**
             * Creates an instance of google.maps.LatLng by given lat and lng values and returns it.
             * This function can be useful for getting new coordinates quickly.
             * @param {!number} lat Latitude.
             * @param {!number} lng Longitude.
             * @return {google.maps.LatLng} An instance of google.maps.LatLng object
             */
            var getLatLng = function(lat, lng) {
              return new google.maps.LatLng(lat, lng);
            };

            /**
             * Binds click event to given map and invokes a callback that appends a new marker to clicked location.
             */
            var addMarker = google.maps.event.addListener(map, 'click', function(e) {
              var lat = e.latLng.lat(); // lat of clicked point
              var lng = e.latLng.lng(); // lng of clicked point
              var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
              var marker = new google.maps.Marker({
                position: getLatLng(lat, lng),
                map: map,
                animation: google.maps.Animation.DROP,
                id: 'marker_' + markerId,
                html: "    <div id='info_" + markerId + "'>\n" +
                  "         <table class=\"map1\">\n" +
                  "            <tr>\n" +
                  "                <td><a>Description:</a></td>\n" +
                  "                <td><textarea  id='manual_description' placeholder='Description'></textarea></td></tr>\n" +
                  "            <tr><td>Type :</td><td><select id = 'Type'> <option value= '1'>โป่ง</option>" +
                  " <option value= '2'>โค้งอันตราย</option> <option value= '3'>น้ำตก</option> <option value= '4'>ศูนย์บริการนักท่องเที่ยว</option> " +
                  " <option value= '5'>ลานจอดรถ</option> <option value= '6'>จุดชมวิว</option>  <option value= '7'>แก่ง</option>   " +
                  " <option value= '8'>ลานกางเต้นท์</option><option value= '9'>บ้านพัก</option> <option value= '10'>ศาล</option>  " +
                  " <option value= '11'>ด่านตรวจ</option> <option value= '12'>ห้องน้ำ</option> <option value= '13'>เส้นทางศึกษาธรรมชาติ</option>    " +
                  " <option value= '14'>อ่างเก็บน้ำ</option> <option value= '15'>ร้านอาหาร </option></select> " +
                  " </select></td></tr><tr><td></td><td><input type='button' value='Save' onclick='saveData(" + lat + "," + lng + ")'/></td></tr>\n" +
                  "        </table>\n" +
                  "    </div>"
              });
              markers[markerId] = marker; // cache marker in markers object
              bindMarkerEvents(marker); // bind right click event to marker
              bindMarkerinfo(marker); // bind infowindow with click event to marker

            });

            /**
             * Binds  click event to given marker and invokes a callback function that will remove the marker from map.
             * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
             */
            var bindMarkerinfo = function(marker) {
              google.maps.event.addListener(marker, "click", function(point) {
                var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                var marker = markers[markerId]; // find marker
                infowindow = new google.maps.InfoWindow();
                infowindow.setContent(marker.html);
                infowindow.open(map, marker);
                // removeMarker(marker, markerId); // remove it
              });
            };

            /**
             * Binds right click event to given marker and invokes a callback function that will remove the marker from map.
             * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
             */
            var bindMarkerEvents = function(marker) {
              google.maps.event.addListener(marker, "rightclick", function(point) {
                var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                var marker = markers[markerId]; // find marker
                removeMarker(marker, markerId); // remove it
              });
            };

            /**
             * Removes given marker from map.
             * @param {!google.maps.Marker} marker A google.maps.Marker instance that will be removed.
             * @param {!string} markerId Id of marker.
             */
            var removeMarker = function(marker, markerId) {
              marker.setMap(null); // set markers setMap to null to remove it from map
              delete markers[markerId]; // delete marker instance from markers object
            };
            var a = <?php load_marker() ?>;
            var j;
            var icc = "image/help.png"
            for (j = 0; j < a.length; j++) {
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(a[j][1], a[j][2]),
                map: map,
                icon : icc,
                html: "<div>\n" +
                  "<table class=\"map1\">\n" +
                  "<tr>\n" +
                  "<td><a>รายละเอียด:</a></td>\n" +
                  "<td><textarea disabled id='manual_description' placeholder='Description'>" + a[j][5] + "</textarea></td></tr>\n" +
                  "<tr><td><input type='button' class='btn btn-danger' value='Delete Point' onclick='delhelp(" + a[j][0] + ")'/></button></td></tr>"+
                  "  </table>\n" +

                  "</div>"


              });

              google.maps.event.addListener(marker, 'click', (function(marker, j) {
                return function() {
                  infowindow = new google.maps.InfoWindow();
                  infowindow.setContent(marker.html);
                  infowindow.open(map, marker);
                }
              })(marker, j));
            }

            var i;
            var confirmed = 0;
            for (i = 0; i < locations.length; i++) {
              if (locations[i][5] == '1') {
                var ic = "image/pong.png";
              } else if (locations[i][5] == '2') {
                var ic = "image/2.png";
              } else if (locations[i][5] == '3') {
                var ic = "image/waterfall.png";
              } else if (locations[i][5] == '5') {
                var ic = "image/park.png";
              } else if (locations[i][5] == '4') {
                var ic = "image/info.png";
              } else if (locations[i][5] == '6') {
                var ic = "image/viewpoint.png";
              } else if (locations[i][5] == '7') {
                var ic = "image/boat.png";
              } else if (locations[i][5] == '8') {
                var ic = "image/tent.png";
              } else if (locations[i][5] == '9') {
                var ic = "image/home.png";
              } else if (locations[i][5] == '10') {
                var ic = "image/temple.png";
              } else if (locations[i][5] == '11') {
                var ic = "image/map.png";
              } else if (locations[i][5] == '12') {
                var ic = "image/toilet.png";
              } else if (locations[i][5] == '13') {
                var ic = "image/road.png";
              } else if (locations[i][5] == '14') {
                var ic = "image/lake.png";
              } else if (locations[i][5] == '15') {
                var ic = "image/food.png";
              } else {
                var ic = red_icon;
              }
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: ic,
                draggable: true,
                html: "<div>\n" +
                  "<table class=\"map1\">\n" +
                  "<tr>\n" +
                  "<td><a>รายละเอียด:</a></td>\n" +
                  "<td><textarea disabled id='manual_description' placeholder='Description'>" + locations[i][3] + "</textarea></td></tr>\n" +
                  
                  "<tr> <td><input type='button' class='btn btn-danger' value='Delete Point' onclick='delData(" + locations[i][0] + ")'/></button></td>\n" +
                  "<td><button type='button' class='btn btn-primary' onclick='updatepoint(" + locations[i][0]+ ")' />Edit Point</button></td></tr> </table> " +

                  "</div>"
              });
              google.maps.event.addListener(marker, 'dragend', function() {
               var lata = marker.position.lat() ;  // เอาค่า latitude ตัว marker 
               console.log(lata);
               var lona = marker.position.lng() ; // เอาค่า longitude ตัว marker 
               console.log(lona);
               $.post("editmarker.php", { 
                            lata: lata, // ส่งค่า latitude
                            lona:lona, // ส่งค่า longitude
                            action : 1
                        }, function() {
                               
                        });

              });


              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  infowindow = new google.maps.InfoWindow();
                  confirmed = locations[i][4] === '1' ? 'checked' : 0;
                  $("#confirmed").prop(confirmed, locations[i][4]);
                  $("#id").val(locations[i][0]);
                  $("#description").val(locations[i][3]);
                  $("#form").show();
                  infowindow.setContent(marker.html);
                  infowindow.open(map, marker);
                }
              })(marker, i));
            }

            /**
             * SAVE save marker from map.
             * @param lat  A latitude of marker.
             * @param lng A longitude of marker.
             */
            function saveData(lat, lng) {
              var description = document.getElementById('manual_description').value;
              var Type = document.getElementById('Type').value;
              var url = 'locations_model.php?add_location&description=' + description + '&lat=' + lat + '&lng=' + lng + '&Type=' + Type;
              downloadUrl(url, function(data, responseCode) {
                if (responseCode === 200 && data.length > 1) {
                  var markerId = getMarkerUniqueId(lat, lng); // get marker id by using clicked point's coordinate
                  var manual_marker = markers[markerId]; // find marker
                  manual_marker.setIcon(purple_icon);
                  infowindow.close();
                  infowindow.setContent("<div style=' color: green; font-size: 25px;'> Insert Complete!!</div>");
                  infowindow.open(map, manual_marker);
                  location.reload();
                } else {
                  console.log(responseCode);
                  console.log(data);
                  infowindow.setContent("<div style='color: red; font-size: 25px;'>Inserting Errors</div>");
                }
              });
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

            function delData(id) {
              $.post("delmap.php", {
                id: id,
                action : 2
              }, function(data) {

                location.reload();


              });
            }
          function delhelp(id){
            $.post("delhelp.php",{
              id: id,
            },function(data){
              location.reload();
            });
          }

            function updatepoint(id,lata,lona){
              $.post("editmarker.php",{
                id : id,
                action : 2
              },function(data){
                location.reload();
              
              });
            }
            
          </script>

          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; SirKy</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you Sure</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>




</body>
<script>

    $(document).ready(function() {
      $('#editbtn').click(function() {
        var my_Point = 'a';
  console.log(my_Point);
        $.ajax({
          method: "POST",
          url: "editmarker.php",
          data: lata  ,

        });
      });
    });
</script>
</html>