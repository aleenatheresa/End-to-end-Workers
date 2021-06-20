<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$sc=$_SESSION['sc'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
         <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="../css/admin_stylesheet.css"  rel="stylesheet" media="all">
        <link href="../css/theme.css" rel="stylesheet" media="all">
        <!-- <link href="../css/sp_style.css" rel="stylesheet" media="all"> -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>
 
</head>
<style>

</style>
<body>
    <?php 
    include("header.php");
    ?>
        <div class="container">
            <div class="row">
                <?php
                        $logid=mysqli_query($con,"select * from tbl_login where role_id=3 and aproval_status=1 and is_delete=1");
        
                        if(mysqli_num_rows($logid)>0)
                        {
                            while($r=mysqli_fetch_array($logid))
                            {
                                $id=$r['lid'];
                                $emp=mysqli_query($con,"select * from tbl_employee where login_id=$id and sc_id=$sc");
                                while($e=mysqli_fetch_array($emp))
                                {
                                $loc=$e['location_id'];
                                $ser=$e['service_id'];
                                $loca=mysqli_query($con,"select * from tbl_location where location_id=$loc");
                                $locat=mysqli_fetch_array($loca);
                                $dis=$locat['district_id'];
                                $dis=mysqli_query($con,"select * from tbl_district where district_id=$dis");
                                $d=mysqli_fetch_array($dis);
                                $serv=mysqli_query($con,"select * from tbl_services where service_id=$ser");
                                $s=mysqli_fetch_array($serv);
                    ?>
                <div class="col-md-4">
                    <div class="card">
                                <div class="card-body" style="display:block;">
                                    <div class="mx-auto d-block">
                                        <!-- <img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap"> -->
                                        <h4 class="text-sm-center mt-2 mb-1"><?php echo $e['employee_name']; ?></h4>
                                        <h5 class="text-sm-center mt-2 mb-1"><?php echo $e['employee_email']; ?></h5>
                                        <h5 class="text-sm-center mt-2 mb-1"><?php echo $e['employee_phone']; ?></h5>
                                       
                                        <p class="text-sm-center"><?php echo $s['service_name']; ?></p>
                                        <hr>
                                         <div class="text-sm-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                            </svg>
                                            <?php echo $d['district_name'] ?>,<?php echo $locat['location'];?>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                    </div>
                </div>
                 <?php
                    }}}
                    else
                    {?>
                        <div class="col-md-4">
                            <div class="card">
                                    <div class="card-body" style="display:block;">
                                        <div class="mx-auto d-block">
                                            <!-- <img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap"> -->
                                            <h4 class="text-sm-center mt-2 mb-1">No Employess in the system</h4>
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                 <?php   }   
                    ?>
                
            </div>
        </div>
        
    <?php
        include("footer.php");
    ?>

</body>
</html>