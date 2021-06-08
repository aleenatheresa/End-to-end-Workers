<?php
session_start();
require('../DbConnection.php');
// $con=mysqli_connect("localhost","root","","projectdb");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
              <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="../css/admin_stylesheet.css"  rel="stylesheet" media="all">
    <link href="../css/theme.css" rel="stylesheet" media="all">
    <script src="../js/sidebarfun.js"></script>
    <script src="../js/demo.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>    
 
</head>
<body>
<div id="wrapper">
   <div class="overlay"></div>

        <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
      <div class="simplebar-content" style="padding: 0px;">
				<a class="sidebar-brand" href="Admin_index.php">
          <span class="align-middle">End To End Workers</span>
        </a>

				   <ul class="navbar-nav align-self-stretch">

          <li class="sidebar-header">
                Pages
		      </li>

	        <li class=""><a class="nav-link text-left active" href="admin_index.php" >Home
            <i class="flaticon-bar-chart-1"></i>
              </a>
          </li>
          <li class="has-sub">
            <a class="nav-link collapsed text-left active" id="dropdown-toggle" href="#collapseExample2" role="button" data-toggle="collapse">
              Admin Location Control
            </a>
            <div class="collapse menu mega-dropdown" id="collapseExample2">
              <div class="dropmenu" aria-labelledby="navbarDropdown">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 px-2">
                          <div class="submenu-box">
                            <ul class="list-unstyled m-0" id="dropdown-menu">
                              <li><a href="admin_location.php" id="district">Add District</a></li>
                              <li><a href="admin_loc.php" onclick="adminloc()" id="location">Add Location</a></li>
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
		  </li>
      <li class="has-sub">
        <a class="nav-link collapsed text-left active" href="#collapseExample" role="button" data-toggle="collapse" >
          <i class="flaticon-user"></i>   Service
        </a>
        <div class="collapse menu mega-dropdown" id="collapseExample">
          <div class="dropmenu" aria-labelledby="navbarDropdown">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-lg-12 px-2">
                  <div class="submenu-box">
                    <ul class="list-unstyled m-0">
                      <li><a href="admin_sc.php">Service Category</a></li>
                      <li><a href="admin_service.php" id="serv" value="serv">Services</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		  </li>
      <li class="">
        <a class="nav-link text-left active" href="admin_sp.php"> Service Provider</a>
      </li>
      <li class="">
        <a class="nav-link text-left active" href="admin_emp.php" onclick="employe()"> Employee </a>
      </li>
      <li class="">
        <a class="nav-link text-left active" href="admin_bk.php" >  Customers </a>
      </li>
    </nav>
        <!-- /#sidebar-wrapper -->


        <!-- Page Content -->
    <div id="page-content-wrapper">
			<div id="content">
        <div class="container-fluid p-0 px-lg-0 px-md-0">
        <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light my-navbar">

          <!-- Sidebar Toggle (Topbar) -->
            <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
               <span></span>
                <span></span>
                <span></span>
            </div>


          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search" id="searchbar">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="search_submit"><i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li>
              <a  href="#" id="userDropdown" role="button" >
                <label ><b style="font-famiy: Times New Roman, Times, serif;">Welcome <?php echo $_SESSION['uname']; ?></b></label>
              </a>
            </li>
            <li>
              <a  href="../logout.php" id="userDropdown" role="button" >
                <label ><b style="font-famiy: Times New Roman, Times, serif;">Signout</b></label>
              </a>
            </li>
          </ul>
        </nav>
</div>

<div class="container">
    <div class="row" id="cu">
        <div class="col" id="customer">
            <!-- customer Details -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
                <a href="../pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                Generate Report</a>
            </div> -->
  
            <h2 style="font-family: Times New Roman, Times, serif;">Booking Details</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Service</th>
                        <th>Booking Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $custom_data="select * from tbl_booking where status=1";
                    $cu_query=mysqli_query($con,$custom_data);
                    while($c=mysqli_fetch_array($cu_query))
                    {
                    $custm_id=$c['customer_id'];
                    $bk=$c['booking_id'];
                    $bk_date=$c['booked_on'];
                    $ser_cat=$c['service_id'];
                    $cus_id="select * from tbl_customer where customer_id=$custm_id";
                    $cus_query=mysqli_query($con,$cus_id);
                    $cu=mysqli_fetch_array($cus_query);
                    $cu_name=$cu['customer_name'];
                    $service="select * from tbl_services where service_id=$ser_cat";
                    $ser_query=mysqli_query($con,$service);
                    $service_category=mysqli_fetch_array($ser_query);
                    $service_name=$service_category['service_name'];
                    ?>
                    <tr>
                        <td><?php echo $cu_name; ?></td>
                        <td><?php echo $service_name; ?></td>
                        <td><?php echo $bk_date; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
<!-- customer Details -->
        </div>
    </div>
</div>


<script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $('#bar').click(function(){
	$(this).toggleClass('open');
    $('#page-content-wrapper ,#sidebar-wrapper,#cu').toggleClass('toggled');
    });
</script>
</body>
</html>