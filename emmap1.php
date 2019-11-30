<?php require_once("connect.php");
 session_start();
require_once ("locations_model.php");

if($_SESSION['type'] != 'employee'){
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
    <style>
		img{
			width:100%;
			height: 500px;
			object-fit:cover;
			background-repeat:no-repeat;
			background-size:cover;
		}
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

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
							<a class="nav-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              <i class="fas fa-fw fa-table"></i><span>ขอความช่วยเหลือ</span></a>
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
          <div id="contain_map">
		<div id="map_canvas">&nbsp;</div>
	</div>

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
							<input type="text" class="form-control" id="messagetext" name="text" autocomplete="off">
						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onClick="dataList.addData($('#form_user').serializeArray());">ยืนยัน</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

	<script type="text/javascript">
		var geocoder;
		var my_Marker;

		var map;
		var GGM;
		var my_Latlng;

		var autocomplete;
		var bb;
		var cc;

		var myPosition_lat;
		var myPosition_lon;
		
		function initialize() {
			GGM=new Object(google.maps);
			directionShow=new  GGM.DirectionsRenderer({draggable:true});
			directionsService = new GGM.DirectionsService();
			geocoder = new GGM.Geocoder();

			navigator.geolocation.getCurrentPosition(function(position){

				var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);

				my_Latlng  = new GGM.LatLng(position.coords.latitude,position.coords.longitude);

				initialTo=new GGM.LatLng(14.439424, 101.372485);
				var my_mapTypeId=GGM.MapTypeId.ROADMAP;
				var my_DivObj=$("#map_canvas")[0];

				var myOptions = {
					zoom: 13,
					center: my_Latlng ,
					mapTypeId:my_mapTypeId
				};

				map = new GGM.Map(my_DivObj,myOptions);
				directionShow.setMap(map);
				var infowindow = new GGM.InfoWindow({
					map: map,
					position: my_Latlng,
					content: 'คุณอยู่ที่นี่.'
				});

				var my_Point = infowindow.getPosition();
				map.panTo(my_Point);
				$("#lat_value").val(my_Point.lat());
				$("#lon_value").val(my_Point.lng());
				$("#zoom_value").val(map.getZoom());
				map.setCenter(my_Latlng);
				inputSearch = $("#pac-input")[0];
				map.controls[GGM.ControlPosition.TOP_LEFT].push(inputSearch);
				infowindow = new GGM.InfoWindow();
				my_Marker = new GGM.Marker({
					map: map,
					anchorPoint: new GGM.Point(0, -29)
				});
			});

			navigator.geolocation.watchPosition(function(position){

				var myPosition_lat=position.coords.latitude;
				var myPosition_lon=position.coords.longitude;
				var user = "<?php echo $_SESSION['username']?>";
				var name = "<?php echo $_SESSION['User']?>";
				var pos = new GGM.LatLng(myPosition_lat,myPosition_lon);
				$.post("addpoint.php", {
					lat: myPosition_lat,
					lon: myPosition_lon,
					user: user,
					name: name,
					action: 1
				});

				var pos = new GGM.LatLng(myPosition_lat,myPosition_lon);

				my_Marker.setPosition(pos);

				var my_Point = my_Marker.getPosition();
				$("#lat_value").val(my_Point.lat());
				$("#lon_value").val(my_Point.lng());
				$("#zoom_value").val(map.getZoom());

				map.panTo(pos);
				map.setCenter(pos);
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
		$(function(){
			dataList.addData = function(dataSend){
				// console.log(dataSend);
				// console.log(dataSend[0].value);
				var txt = dataSend[0].value;
				console.log(txt);
				$.post("addpoint.php", {
					
					txt: txt,
					action: 2
				})
				.done(function() {
					$('#form_user')[0].reset();
					alert('เพิ่มตำแหน่งสำเร็จ');
					window.location.href='emmap2.php';
				})
				.fail(function() {
					alert("error");
				});
			
				
			}
		});
		$(function(){
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


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



  <script>
    $(document).ready(function() {
      $('#btnadd').click(function() {
        $.ajax({
          method: "POST",
          url: "insert_ajax.php",
          data: $("#form_user").serialize()


        });
      });
    });
    <?php for ( $i = 0; $i<sizeof($_SESSION['a'])  ; $i++) {    ?>
      
    $(document).ready(function() {
     
        
        // console.log(i);
      $('#btnedit<?php echo $i; ?>').click(function() {
        $.ajax({
          method: "POST",
          url: "Edit_ajax.php",
          data: $("#edit_user<?php echo $i; ?>").serialize()


        });
      });
    
    });  
  <?php  } ?>//for
  </script>
</body>

</html>