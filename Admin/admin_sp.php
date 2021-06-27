<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Providers Details</title>
   
</head>
<body>
<?php
include("header.php");
?>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="serviceprovider"> 
                <div class="col-md-12 mt-lg-4 mt-4" >
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"></h1>
                            <a href="../pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                                Generate Report</a>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                <th data-colname="name" data-order="desc">Service Provider</th>
                                <th data-colname="phone" data-order="desc">Phone</th>
                                <th data-colname="email" data-order="desc">Email</th>
                                <th data-colname="address" data-order="desc">Address</th>
                                <th data-colname="district" data-order="desc">District</th>
                                <th data-colname="location" data-order="desc">Location</th>
                                <th data-colname="licence" data-order="desc">lisenceno</th>
                                <th data-colname="sc" data-order="desc">Service category</th>
                                <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                $spsql="select * from tbl_login where role_id=4 and is_delete=1 and aproval_status=1";
                                $activesp=mysqli_query($con,$spsql);
                                while($spdata=mysqli_fetch_array( $activesp))
                                {
                                $activelogin=$spdata['lid'];
                                $sp="select * from tbl_serviceproviders where login_id= $activelogin";
                                $ser_pro_query=mysqli_query($con,$sp);
                                $spid=mysqli_fetch_array($ser_pro_query);

                                ?>
                                <tr>
                                <td><?php echo $spid['sp_name']; ?></td>
                                <td><?php echo $spid['sp_phone']; ?></td>
                                <td><?php echo $spid['sp_email']; ?></td>
                                <td><?php echo $spid['sp_address']; ?></td>
                                <td><?php $disid=$spid['district_id'];
                                            $sqldisname="select * from tbl_district where district_id=$disid";
                                            $disnamequery=mysqli_query($con,$sqldisname);
                                            $disdata=mysqli_fetch_array($disnamequery);
                                            echo $disdata['district_name'];?></td>
                                <td><?php $loc_id=$spid['location_id'];
                                            $sql_location="select * from tbl_location where location_id=$loc_id";
                                            $sql_loc_query=mysqli_query($con,$sql_location);
                                            $loc_name=mysqli_fetch_array($sql_loc_query);
                                            echo $loc_name['location'];?></td>
                                <td><?php echo $spid['lisenceno']; ?></td>
                                <td><?php $serv_cat= $spid['sc_id'];
                                            $sql_ser_cat="select * from tbl_service_category where sc_id=$serv_cat";
                                            $ser_cat_query=mysqli_query($con,$sql_ser_cat);
                                            $ser_name=mysqli_fetch_array($ser_cat_query);
                                            echo $ser_name['sc_name']; ?></td>
                                <!-- <td>
                                    <button class="btn btn-sm btn-danger btn-inline sp_dismiss" title="Dismiss">Dismiss</button>
                                </td>                  -->
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
  
</script>
</body>
</html>