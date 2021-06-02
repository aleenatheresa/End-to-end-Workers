<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
$sc=$_SESSION['sc'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/theme.css">
</head>
<body>

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
                            <div class="col-xl-4">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <strong class="card-title mb-3"></strong>
                                    </div> -->
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <!-- <img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap"> -->
                                            <h4 class="text-sm-center mt-2 mb-1"><?php echo $e['employee_name']; ?></h4>
                                            <h5 class="text-sm-center mt-2 mb-1"><?php echo $e['employee_email']; ?></h5>
                                            <h5 class="text-sm-center mt-2 mb-1"><?php echo $e['employee_phone']; ?></h5>
                                            <div class="location text-sm-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                                </svg>
                                                <?php echo $d['district_name'] ?>,<?php echo $locat['location'];?></div>
                                            </div>
                                            <p class="text-sm-center"><?php echo $s['service_name']; ?></p>
                                            <hr>
                                            <div class="card-text text-sm-center">
                                                <a href="#"> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                        
                        
                            <?php
                                    }
                                }
                            }
                            else
                            {
                                echo "<h4 style='text-align:center'>No Employee in the system</td>";
                            }
                        ?>
                        
                    </div>
               
            </div>
            <div class="row">
                        <div class="col-xl-4" style="display:block">
                                <div class="card" style="background-color:black">
                                    <!-- <div class="card-header">
                                        <strong class="card-title mb-3"></strong>
                                    </div> -->
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <!-- <img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap"> -->
                                            <p>gdsfgbhdg</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card" style="background-color:black">
                                    <!-- <div class="card-header">
                                        <strong class="card-title mb-3"></strong>
                                    </div> -->
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <!-- <img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap"> -->
                                            <p>gdsfgbhdg</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>  
            </div>
    
            </body>
</html>