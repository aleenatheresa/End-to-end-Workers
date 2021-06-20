<?php
session_start();
require('../DbConnection.php');
$cid=$_SESSION['lid'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Generation</title>
     <!-- Bootstrap CSS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet"> -->
           <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="../css/cust_index.css">
       
      

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script src = "https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Modal class -->

        <!-- <link rel="stylesheet" href="../css/cal.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
       
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
         <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  
</head>
<body>
    
    <?php
        include("header.php");
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="container" style="background-color:white;">
                <div class="table">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Booking ID</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Completed Date</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                <?php
                                $rpt=mysqli_query($con,"select * from tbl_booking where customer_id=$cid and servicecompleted=1");
                                if(mysqli_num_rows($rpt)>0)
                                {
                                    while($r=mysqli_fetch_array($rpt))
                                    {

                                        $bkid=$r['booking_id'];
                                        $_SESSION['bk']=$bkid;
                                        $ser=$r['service_id'];
                                        $datee=$r['booked_on'];
                                        $cmplt=$r['end'];
                                        $sername=mysqli_query($con,"select * from tbl_services where service_id=$ser");
                                        $s=mysqli_fetch_array($sername);
                                        $sname=$s['service_name'];
                                ?>
                                <tr>
                                        <td><?php echo $bkid; ?></td>
                                        <td><?php echo $sname; ?></td>
                                        <td><?php echo $datee; ?></td>
                                        <td><?php echo $cmplt; ?></td>
                                        <td><a href="../custbill.php" onClick="doprint();"><button type="button" class="btn btn-primary" id="billrpt">Print</button></a></td>
                                </tr>
                                <?php  }}
                                else{?>
                                    
                                    <tr>
                                        <td colspan="5" style="text-align:center">No booking yet</td>
                                    </tr>
                                   <?php 
                                }?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>