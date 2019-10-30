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

</head
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
                            <a class="nav-link js-scroll-trigger" href="em-index.php">home</a>
                        </li><!--/.nav-item-->
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="emmap.php">Point</a>
                        </li><!--/.nav-item-->
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="showtable.php">Show User</a>
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
<?php include ("connect.php") ;

//ส่วนคำสั่ง SQL เพื่อสั่งดึงข้อมูล
 $data = mysqli_query($con,"SELECT * FROM username") 
 or die($comysqli_error());
 ?>
 <table style="width:50%" border=1 align ="center">
  <tr>
    <th>Username</th>
    <th>Password</th> 
    <th>First Name</th>
	<th>Last Name </th>
	<th>Type</th>
  </tr>

 <?php

 while($info = mysqli_fetch_array( $data )) 
 { 
	?>

	
	<tr>
	<td><?php echo $info['user']; ?></td> 
    <td><?php echo $info['password']; ?></td>  
    <td><?php echo $info['name']; ?></td> 
	<td><?php echo $info['lastname']; ?></td>  
	<td><?php echo $info['type']; ?></td> 
	</tr> 
	 <?php
 }
 
 ?> 
</table>
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
</body> 
</html>