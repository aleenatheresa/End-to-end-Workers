<?php

// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="../css/admin_stylesheet.css"  rel="stylesheet" media="all">
        <link href="../css/theme.css" rel="stylesheet" media="all">
        <!-- <link href="../css/font-face.css" rel="stylesheet" media="all"> -->
       <!-- <link href="../css/sp_style.css" rel="stylesheet" media="all"> -->
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
                    <a class="sidebar-brand" href="sp_index.php">
                        <span class="align-middle">End To End Workers</span>
                    </a>
                <ul class="navbar-nav align-self-stretch">
                    <li class="sidebar-header">
                        Pages
                    </li>

                    <li class=""><a class="nav-link text-left active" href="employee_index.php" id="home">Home
                        <i class="flaticon-bar-chart-1"></i>
                        </a>
                    </li>
                    <!-- <li class=""><a class="nav-link text-left active" href="leave.php" id="leave">Apply Leave
                        <i class="flaticon-bar-chart-1"></i>
                        </a>
                    </li> -->
                    <li class="has-sub">
                            <a class="nav-link collapsed text-left active" id="dropdown-toggle" href="#collapseExample2" role="button" data-toggle="collapse">
                        Leave
                        </a>
                        <div class="collapse menu mega-dropdown" id="collapseExample2">
                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                                <div class="row">
                                                    <div class="col-lg-12 px-2">
                                                        <div class="submenu-box">
                                                            <ul class="list-unstyled m-0" id="dropdown-menu">
                                                                <li><a href="leave.php" id="leave">Apply leave</a></li>
                                                                <li><a href="empleavestatus.php">Leave status</a></li>
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
                                        <li><a href="custfeedback.php">Customer Feedback</a></li>
                                        <!-- <li><a href="admin_sc.php">Complaint</a></li> -->
                                        </ul>
                                    </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                   
                    
                </ul>
            </div>
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
                <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                
                <li>
                    <a  href="#" id="userDropdown" role="button" >
                        <label ><b style="font-famiy: Times New Roman, Times, serif;">Welcome <?php  echo $_SESSION['uname'];?></b></label>
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

    <script>
    $('#bar').click(function(){
	    $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
    });
</script> 
</body>
</html>