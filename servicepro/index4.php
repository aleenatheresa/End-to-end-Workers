<?php

// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');

session_start();
if($_SESSION['role_id']!="4"){
  header('location:../login.php');
}


// Total NUmber of Employee
$v="select * from tbl_employee";
$v_query=mysqli_query($con,$v);
$row_sp = mysqli_num_rows($v_query);

// Details of Service Provider
$user=$_SESSION['uname'];
$login_details="select lid from tbl_login where uname='$user'";
$log_query=mysqli_query($con,$login_details);
$log=mysqli_fetch_array($log_query);
$logid=$log['lid'];
$spdetail="select * from tbl_serviceproviders where login_id=$logid";
$sp_query=mysqli_query($con,$spdetail);
$sp=mysqli_fetch_array($sp_query);
$val=$sp['sp_email'];
$sc=$sp['sc_id'];
$_SESSION['sc']=$sc;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title> ServiceProvider Dashboard</title>

    <!-- Fontfaces CSS-->
   
    <!-- <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all"> -->
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- <link href="../css/font-face.css" rel="stylesheet" media="all"> -->
    <link href="../css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/admin_stylesheet.css">
  
    

   
</head>

<body class="animsition">

        <div id="wrapper">
                 <div class="overlay"></div>

        <!-- Sidebar -->
                            <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
                            <div class="simplebar-content" style="padding: 0px;">
                                        <a class="sidebar-brand" href="index4.php">
                                <span class="align-middle">End To End Workers</span>
                                </a>

                                        <ul class="navbar-nav align-self-stretch">

                                <li class="sidebar-header">
                                        Pages
                                    </li>

                                    <li class=""><a class="nav-link text-left active" href="index4.php" onclick="adminhome()" id="home">Home
                                    <i class="flaticon-bar-chart-1"></i>
                                    </a>
                                </li>
                            <li class="has-sub">
                                    <a class="nav-link collapsed text-left active" id="dropdown-toggle" href="#collapseExample2" role="button" data-toggle="collapse">
                               Employee
                                </a>
                            <div class="collapse menu mega-dropdown" id="collapseExample2">

                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                    <div class="container-fluid ">
                                                    <div class="row">
                                                        <div class="col-lg-12 px-2">
                                                            <div class="submenu-box">
                                                                <ul class="list-unstyled m-0" id="dropdown-menu">
                                                                    <li><a href="#">Employee Available</a></li>
                                                                    <li><a href="#">Employee On Duty</a></li>
                                                                    <li><a href="#">Employee Details</a></li>
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
                                <i class="flaticon-user"></i>   Customers
                                </a>
                                <div class="collapse menu mega-dropdown" id="collapseExample">
                                <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                        <div class="row">
                                            <div class="col-lg-12 px-2">
                                            <div class="submenu-box">
                                                <ul class="list-unstyled m-0">
                                                <li><a href="#">customer Details</a></li>
                                                <li><a href="admin_service.php" value="serv">Services</a></li>
                                                </ul>
                                            </div>
                                            </div>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </li>


                                <li class="">
                                    <a class="nav-link text-left active" href="admin_sp.php" onclick="serviceprovider()" id="spdata"> Service Provider</a>
                                    </li>

                                    <li class="">
                                        <a class="nav-link text-left active" href="admin_emp.php"> Employee </a>
                                    </li>
                                    <li class="">
                                    <a class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false" href="admin_bk.php" onclick="cust()">Customers </a>
                                    </li>


                            </nav>
                                <!-- /#sidebar-wrapper -->


                                <!-- Page Content -->
                            <div id="page-content-wrapper">
                                    <div id="content">
                            <div class="container-fluid p-0 px-lg-0 px-md-0">
                                <!-- Topbar -->
                                <nav class="navbar navbar-expand navbar-light my-navbar py-3">

                                <!-- Sidebar Toggle (Topbar) -->
                                    <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>


                                <!-- Topbar Search -->
                                <form class="d-none d-sm-inline-block form-inline navbar-search">
                                    <div class="input-group">
                                    <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                    </div>
                                </form>

                                <!-- Topbar Navbar -->
                                <ul class="navbar-nav ml-auto">

                                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                   
                                    <li>
                                        <div class="account-wrap">
                                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                                <div class="content">
                                                    <a class="js-acc-btn" href="#" style="color:black;">Welcome <?php ?></a>
                                                </div>
                                                <div class="account-dropdown js-dropdown">
                                                    <div class="info clearfix">
                                                    
                                                            <div class="content">
                                                                <h5 class="name">
                                                                    <a href="#"><?php echo $_SESSION['uname'];  ?></a>
                                                                </h5>
                                                                <span class="email"><?php echo $val;?></span>
                                                            </div>
                                                    </div>
                                                    <div class="account-dropdown__body">
                                                            <div class="account-dropdown__item">
                                                                <a href="#">
                                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                                            </div>
                                                            <div class="account-dropdown__item">
                                                                <a href="#">
                                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                                            </div>
                                                    
                                                    </div>
                                                    <div class="account-dropdown__footer">
                                                        <a href="../logout.php">
                                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                    <a  href="../logout.php" id="userDropdown" role="button" >
                                        <label ><b style="font-famiy: Times New Roman, Times, serif;">Signout</b></label>
                                    </a>
                                    </li> -->

                                </ul>

                                </nav>
                        </div>
        <!-- PAGE CONTENT-->
        <div id="page-content-wrapper">
        <div class="page-container3">
            <section class="alert-wrap">
                <div class="container">
                    <!-- ALERT-->
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert" style="display:none" id="msg">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span class="content">You successfully read this important alert message.</span>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="zmdi zmdi-close-circle"></i>
                            </span>
                        </button>
                    </div>
                    <!-- END ALERT-->
                </div>
            </section>
            <section>
                <div class="col-xl-12">
                                <!-- PAGE CONTENT-->
                    <div class="page-content">
                                    <!-- Employee Notification -->
                        <div class="user-data m-b-20">
                            <h3 class="title-3 m-b-20">
                            <i class="zmdi zmdi-account-calendar"></i>Booking Request</h3>
                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Specification</td>
                                            <td>District</td>
                                            <td>Location</td>
                                            <td>Date</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $bkname="select * from tbl_booking where sc_id=$sc and employee_id=0 and status=1 and servicecompleted=0";
                                            $bkquery=mysqli_query($con,$bkname);
                                            while($bkdata=mysqli_fetch_array($bkquery))
                                            {
                                                $ser_cat=$bkdata['sc_id'];
                                                $service=$bkdata['service_id'];
                                                $custid=$bkdata['customer_id'];
                                                $date=$bkdata['booked_on'];
                                                $cust="select * from tbl_customer where customer_id=$custid";
                                                $custquery=mysqli_query($con,$cust);
                                                $custn=mysqli_fetch_array($custquery);
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="table-data__info">
                                                    <h6>
                                                        <span><?php echo $custn['customer_name']; ?></span>
                                                    </h6>
                                                    <span>
                                                        <a href="#"><?php echo $custn['customer_email'];  ?></a>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <span><?php 
                                                    $ser="select * from tbl_services where service_id=$service";
                                                    $serquery=mysqli_query($con,$ser);
                                                    $serdata=mysqli_fetch_array($serquery);
                                                    echo $serdata['service_name'];
                                                ?></span>
                                            </td>
                                            <td><?php $dis= $custn['location_id'];
                                                $dis_sql="select * from tbl_district where district_id=$dis";
                                                $dis_query=mysqli_query($con,$dis_sql);
                                                $dis_data=mysqli_fetch_array($dis_query);
                                                echo $dis_data['district_name'];
                                                ?>
                                            </td>
                                            <td>
                                                <span><?php  
                                                    $loc=$custn['location_id'];
                                                    $locname="select * from tbl_location where location_id=$loc";
                                                    $locquery=mysqli_query($con,$locname);
                                                    $locdta=mysqli_fetch_array($locquery);
                                                    echo $locdta['location'];
                                                ?></span>
                                            </td>
                                            <td><?php echo $date; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger assign" id="assign">Assign Staff</button>
                                            </td>
                                        </tr>
                                            <?php
                                                }
                                            ?>
                                </tbody>
                            </table>
                        </div>
            
                                        <div class="user-data__footer">
                                            <button class="au-btn au-btn-load"></button>
                                        </div>
                                    </div>
                                    <!-- End Employee Notification -->
            
                                    <div class="col-md-12" id="stafftable-body" tabindex="1" style="display:none;">
                                            <!-- DATA TABLE-->
                                            <div class="table-responsive m-b-40" id="stafftable">

                                            </div>
                                            <!-- END DATA TABLE-->
                                    </div>
                    </div>
                </div>

                        <!-- Employee Aproval Aproval Status -->
            <div class="user-data m-b-30" id="emp-aproval">
                <div id="emp-aproval-body">
                    <h3 class="title-3 m-b-30">Employee On Duty</h3>
                <div class="row m-t-30">
                <div class="col-md-12">
                                <!-- DATA TABLE-->
                     <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                <td>Name</td>
                                <td>Specification</td>
                                <td>Date</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $emp_apr=mysqli_query($con,"select * from tbl_booking where aproval_status=1 and servicecompleted=0");
                                if(mysqli_num_rows($emp_apr))
                                {
                                    while($apr=mysqli_fetch_array($emp_apr))
                                    {
                                        $cus_id=$apr['customer_id'];
                                        $emp_id=$apr['employee_id'];
                                        $serv=$apr['service_id'];
                                        $d=$apr['booked_on'];
                                       
                                        $cus_query=mysqli_query($con,"select * from tbl_customer where customer_id=$cus_id");
                                        $cus_name=mysqli_fetch_array($cus_query);

                                        $emp_que=mysqli_query($con,"select * from tbl_employee where employee_id=$emp_id");
                                        $emp=mysqli_fetch_array($emp_que);

                                        $ser_quer=mysqli_query($con,"select * from tbl_services where service_id=$serv");
                                        $serc=mysqli_fetch_array($ser_quer);

                                ?>
                                <tr style="text-align:left">
                                    <td><?php echo $emp['employee_name'];?></td>
                                    <td><?php echo $serc['service_name'];?></td>
                                    <td><?php echo $d;?></td>
                                    
                                </tr>
                                <?php
                                    } }
                                ?>
                            </tbody>
                        </table>
                    </div>
                                <!-- END DATA TABLE-->
                 </div>
            </div>

                                    </div>
                                </div>

                        <!-- End Aproval Status -->
                               <?php
                                include("footer.php");
                               ?>
                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->

    <!-- </div> -->

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

    <script>
        $(document).on('click','.assign',function()
        {
            var ser=$(this).closest('tr').find('td:eq(2)').text();
            var serv=ser.trim();
            var district=$(this).closest('tr').find('td:eq(3)').text();
            var dist=district.trim();
            var location=$(this).closest('tr').find('td:eq(4)').text();
            var loca=location.trim();
            $.ajax({
                url: "assignstaff.php",
                method:"POST",
                data :{
                ser_name :serv,
                dis : dist,
                loc : loca
                },
                success: function(result){
                    console.log(result);
                    $('#stafftable').html(result);
                    
                    $("#stafftable-body").css("display", "inline");
                    $('#stafftable-body').focus();
                    $('.staff').on('click',function()
                    {
                        var data=$(this).val();
                        $(this).closest("tr").remove();
                        console.log(data);
                        $.ajax({
                          url: "assignstaff.php",
                          method:"POST",
                          data :{
                          dat :data
                        },
                          success: function(result){
                            $("#msg").css("display","inline");
                            $("#msg").delay(1000).fadeOut();
                          }
                        });
                    });
                }
            });
        });


    $('#bar').click(function(){
	$(this).toggleClass('open');
    $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

    });
    </script>

</body>

</html>
<!-- end document-->