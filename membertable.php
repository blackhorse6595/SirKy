<?php require_once("connect.php"); 
 session_start(); 
 if($_SESSION["type"] != "employee"){
   session_destroy();
   header('location:login.php');
 }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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


          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Add User</button>

          <?php $data = mysqli_query($con, "SELECT * FROM member where Status = 'USER'")
            or die($comysqli_error()); ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                <form action="emptable.php" method="POST">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>UserID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Tel</th>
                        <th>Email</th>

                        <th>Edit</th>


                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>UserID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Tel</th>
                        <th>Email</th>

                        <th>Edit</th>
                      </tr>
                    </tfoot>
                    <tbody>

                      <?php
                      $i = 0;
                      while ($info = mysqli_fetch_array($data)) {
                        ?>


                        <tr>
                          <td><?php echo $info['UserID']; ?></td>
                          <td><?php echo $info['Username']; ?></td>
                          <td><?php echo $info['Password']; ?></td>
                          <td><?php echo $info['Name']; ?></td>
                          <td><?php echo $info['Lastname']; ?></td>
                          <td><?php echo $info['Tel']; ?></td>
                          <td><?php echo $info['Email']; ?></td>

                          <?php $a = array();
                            $_SESSION['a'][$i] =  $info['Username'];
                            $_SESSION['i'][$i] =  $i;
                            $_SESSION['e'][$i] =  $info['Email'];
                            $_SESSION['p'][$i] =  $info['Password'];
                            $_SESSION['n'][$i] =  $info['Name'];
                            $_SESSION['ln'][$i] =  $info['Lastname'];
                            $_SESSION['t'][$i] =  $info['Tel'];
                            ?>
                          <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $i; ?>" id="<? $info['Username']; ?> " name='Edit'>Edit User</button> </td>
                        </tr>
                      <?php
                        $i++;
                      }

                      echo "<br><br>";

                      ?>
                    </tbody>

                  </table>

              </div>
            </div>
          </div>

        </div>
        </form>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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



  <!-- Add Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">New User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>
        <div class="modal-body">
          <form id="form_user" method="post" action="insert_ajax2.php">
            <div class="form-group">
              <label for="user-name" class="control-label">Username:</label>
              <input type="text" class="form-control" id="username"  pattern="[A-Za-z0-9]{8,}" title="ภาษาอังกฤษหรือตัวเลข 8 ตัวขึ้นไป" name="username" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="user-pass" class="control-label">Password:</label>
              <input type="password" class="form-control"  pattern="[A-Za-z0-9]{8,}" title="ภาษาอังกฤษหรือตัวเลข 8 ตัวขึ้นไป" id="password" name="password" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="Name" class="control-label">Name:</label>
              <input type="text" class="form-control" pattern="[A-Za-zกขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+" title="ภาษาอังกฤษ ภาษาไทย" id="Name" name="Name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="Lastname" class="control-label">Lastname:</label>
              <input type="text" class="form-control" pattern="[A-Za-zกขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+" title="ภาษาอังกฤษ ภาษาไทย" id="Lastname" name="Lastname" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="Lastname" class="control-label">Tel:</label>
                <input type="text" class="form-control" pattern="[0-9]{10}" title="ภาษาอังกฤษ ภาษาไทย" id="Tel" name="Tel" autocomplete="off">
              </div>
            <div class="form-group">
              <label for="Email" class="control-label">Email:</label>
              <input type="Email" class="form-control" id="Email" name="Email" autocomplete="off" placeholder="@">
            </div>
        </div>
        </form>



        <?php
       
        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-add" onClick="" id="btnadd">Add User</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Add Modal -->
  <?php for ($i = 0; $i < sizeof($_SESSION['a']); $i++) { ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="editmodal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          </div>
          <div class="modal-body">
            <form id="edit_user<?php echo $i; ?>" method="post" action="edit_ajax2.php">
              <div class="form-group">
                <label for="user-name" class="control-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" autocomplete="off" readonly="readonly" value="<?php echo $_SESSION['a'][$i]; ?>">
              </div>
              <div class="form-group">
                <label for="user-pass" class="control-label">Password:</label>
                <input type="text" class="form-control"  pattern="[A-Za-z0-9]{8,}" title="ภาษาอังกฤษหรือตัวเลข 8 ตัวขึ้นไป" id="password" name="password" value="<?php echo $_SESSION['p'][$i]; ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="Name" class="control-label">Name:</label>
                <input type="text" class="form-control" pattern="[A-Za-zกขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+" title="ภาษาอังกฤษ ภาษาไทย" id="Name" name="Name" value="<?php echo $_SESSION['n'][$i]; ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="Lastname" class="control-label">Lastname:</label>
                <input type="text" class="form-control" pattern="[A-Za-zกขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+" title="ภาษาอังกฤษ ภาษาไทย"  id="Lastname" name="Lastname"  value="<?php echo $_SESSION['ln'][$i]; ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="Lastname" class="control-label">Tel:</label>
                <input type="text" class="form-control" id="Tel" name="Tel"  pattern="[0-9]{10}" title="ตัวเลข 10 ตัว" value="<?php echo $_SESSION['t'][$i]; ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="Email" class="control-label">Email:</label>
                <input type="Email" class="form-control" id="Email" name="Email" autocomplete="off" readonly="readonly" value="<?php echo $_SESSION['e'][$i]; ?>">
              </div>
          </div>
         




          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-add" id="btnedit<?php echo $i; ?>">Edit User</button>
          </div>
           </form>
        </div>
      </div>
    </div>  <?php } ?>
    <!-- End Edit Modal -->

  <script>
  //   $(document).ready(function() {
  //     $('#btnadd').click(function() {
  //       $.ajax({
  //         method: "POST",
  //         url: "insert_ajax2.php",
  //         data: $("#form_user").serialize()


  //       });
  //     });
  //   });
  //   <?php for ( $i = 0; $i<sizeof($_SESSION['a'])  ; $i++) {    ?>
      
  //   $(document).ready(function() {
     
        
  //       // console.log(i);
  //     $('#btnedit<?php echo $i; ?>').click(function() {
  //       $.ajax({
  //         method: "POST",
  //         url: "Edit_ajax.php",
  //         data: $("#edit_user<?php echo $i; ?>").serialize()


  //       });
  //     });
    
  //   });  
  // <?php  } ?>//for
  </script>
</body>

</html>