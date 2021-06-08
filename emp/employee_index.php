<?php
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
session_start();
if($_SESSION['role_id']!="3"){
  header('location:../login.php');
}
$user=$_SESSION['uname'];
$login_details="select lid from tbl_login where uname='$user'";
$log_query=mysqli_query($con,$login_details);
$log=mysqli_fetch_array($log_query);
$logid=$log['lid'];
$emp="select * from tbl_employee where login_id=$logid";
$emp_query=mysqli_query($con,$emp);
$emp_details=mysqli_fetch_array($emp_query);
$emp_id=$emp_details['employee_id'];
$_SESSION['eid']=$emp_id;
$emp_name=$emp_details['employee_name'];
$emp_addr=$emp_details['employee_address'];
$emp_phone=$emp_details['employee_phone'];
$emp_email=$emp_details['employee_email'];
$emp_loc=$emp_details['location_id'];
$sc_id=$emp_details['sc_id'];
$_SESSION['emp_sc']=$sc_id;
$sc=mysqli_query($con,"select * from tbl_services where sc_id=$sc_id");
$sc_name=mysqli_fetch_array($sc)
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
    <title>Employee</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">
    <link href="../css/rating.css" rel="stylesheet" media="all">

</head>
<script>
    var date=new Date(Date.now()).toLocaleString().split(',')[0];

</script>
<style>
    body
    {
        font-family:'Calisto MT';
    }
</style>
<body class="animsition">

    <?php
        include("header.php");
    ?>
                <div class="container">
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert" style="display:none" id="blk">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span class="content"  tabindex="1" id="msg" ></span>
                        <button class="close" type="button" data-dismiss="alert" id="dismiss" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="zmdi zmdi-close-circle"></i>
                            </span>
                        </button>
                    </div>
                    
                </div>
    <div class="page-wrapper">
        <div class="page-container3">
           
            <section>
                <div class="container">
                  
                        <!-- <div class="col-xl-9"> -->
                            <!-- PAGE CONTENT-->
                            <div class="page-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-10 au-card--border">
                                            <div class="au-card-title">
                                                <div class="bg-overlay bg-overlay--blue"></div>
                                                <h3>
                                                    <i class="zmdi zmdi-account-calendar"></i><script>document.write(date);</script></h3>
                                                <!-- <button class="au-btn-plus">
                                                    <i class="zmdi zmdi-plus"></i>
                                                </button> -->
                                            </div>
                                            <div class="au-task js-list-load au-task--border">
                                                <div class="au-task__title">
                                                
                                                    <h4>Tasks for <?php echo $user;?></h4>
                                                </div>
                                                <div class="table">
                                                    <table class="table table-borderless">
                                                        <thead class="thead-dark">
                                                            <th>Customer</th>
                                                            <th>Location</th>
                                                            <th>Date</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                $bk=mysqli_query($con,"select * from tbl_booking where employee_id=$emp_id and servicecompleted=0");
                                                                if(mysqli_num_rows($bk)>0)
                                                                {
                                                                    while($b=mysqli_fetch_array($bk))
                                                                    {
                                                                        $cid=$b['customer_id'];
                                                                        $cust=mysqli_query($con,"select * from tbl_customer where customer_id=$cid");
                                                                        $c=mysqli_fetch_array($cust);
                                                                        $loc=$c['location_id'];
                                                                        $dis=$c['district_id'];
                                                                        $location=mysqli_query($con,"select * from tbl_location where location_id=$loc");
                                                                        $l=mysqli_fetch_array($location);
                                                                        $district=mysqli_query($con,"select * from tbl_district where district_id=$dis");
                                                                        $d=mysqli_fetch_array($district);

                                                                        
                                                                ?>
                                                                  <tr>
                                                                    <td>
                                                                        <h4><?php echo $c['customer_name'];  ?></h4>
                                                                        <p id="email"><?php echo $c['customer_email']; ?></p>
                                                                        <p id="phone"><?php echo $c['customer_phone']; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p><?php echo $d['district_name'];?>, <?php echo $l['location'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $b['booked_on'];?>
                                                                    </td>
                                                                  </tr>  
                                                            <?php
                                                                
                                                                }
                                                            }
                                                            else
                                                            {?>
                                                                <div class="au-task-list js-scrollbar3">
                                                                    <div class="au-task__item au-task__item--danger">
                                                                        <div class="au-task__item-inner">
                                                                            <h5 class="task">
                                                                                <a href="#"></a>
                                                                            </h5>
                                                                            <span class="time">Not Assigned any meeting</span>
                                                                        </div>
                                                                    </div>
                                                                </div>   
                                                            <?php  } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <aside class="profile-nav alt">
                                            <section class="card">
                                                <div class="card-header user-header alt bg-dark">
                                                    <div class="media">
                                                        <!-- <a href="#">
                                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/icon/avatar-01.jpg">
                                                        </a> -->
                                                        <div class="media-body">
                                                            <h2 class="text-light display-6"><?php echo $user;?></h2>
                                                            <p style="color:white;"><?php echo $sc_name['service_name']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <a href="#">
                                                            <i class="fa fa-envelope-o"></i> Rating
                                                            <span class="badge pull-right">
                                                                <div class="rating">
                                                                        <i class="rating__star far fa-star"></i>
                                                                        <i class="rating__star far fa-star"></i>
                                                                        <i class="rating__star far fa-star"></i>
                                                                        <i class="rating__star far fa-star"></i>
                                                                        <i class="rating__star far fa-star"></i>
                                                                </div>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a href="#">
                                                            <i class="fa fa-tasks"></i> Recent Activity
                                                            <span class="badge badge-danger pull-right">
                                                                <?php
                                                                $num=mysqli_query($con,"select count(employee_id) as numb from tbl_booking where employee_id=$emp_id and servicecompleted=1");
                                                                $n=mysqli_fetch_assoc($num);
                                                                echo $n['numb'];
                                                                ?>
                                                                
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <!-- <li class="list-group-item">
                                                        <a href="#">
                                                            <i class="fa fa-comments-o"></i> Message
                                                            <span class="badge badge-warning pull-right r-activity"></span>
                                                        </a>
                                                    </li> -->
                                                </ul>

                                            </section>
                                        </aside>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <?php
                                                include("../footer.php");//        
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE CONTENT-->
                       
                   
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>
    <!-- <script src="../js/rating.js"></script> -->

</body>

</html>
<!-- end document-->