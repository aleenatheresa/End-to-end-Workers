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
    
</head>
<body>
<?php
include("header.php");
?>

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



</body>
</html>