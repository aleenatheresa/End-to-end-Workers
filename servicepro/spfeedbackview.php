<?php
session_start();
require('../DbConnection.php');
$sp_id=$_SESSION['sp'];
$scid=$_SESSION['sc'];
$district=$_SESSION['dis'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback from customers</title>
    <link rel="stylesheet" href="../css/rating.css">
</head>
<body>
<style>
.task
{
line-height:25px;
}
</style>
    <?php
        include("header.php");
    ?>
<center>
<div class="container">
        <div class="row">
        <?php 
        $emp=mysqli_query($con,"select * from tbl_login where role_id=3 and aproval_status=1 and is_delete=1");
        while($r=mysqli_fetch_array($emp))
        {
            $id=$r['lid'];
            $empselected=mysqli_query($con,"select * from tbl_employee where login_id=$id and sc_id=$scid and district_id=$district");
            while($e=mysqli_fetch_array($empselected))
            {
            $empid=$e['employee_id'];
            $empname=$e['employee_name'];
            $ser=$e['service_id'];
            $servicequery=mysqli_query($con,"select * from tbl_services where service_id=$ser");
            $s=mysqli_fetch_array($servicequery);
            
            
        
        ?>
            <div class="col-md-6" >
                <div class="au-card au-card--no-shadow au-card--no-pad au-card--border">
                                            <div class="au-card-title">
                                                <div class="bg-overlay bg-overlay--blue"></div>
                                                <h3><?php echo $empname;?></h3>
                                            </div>
                                            <?php
                                           
                                            $rating=mysqli_query($con,"select * from tbl_rating where employee_id=$empid");
                                            if(mysqli_num_rows($rating)>0)
                                            {
                                            while($feed=mysqli_fetch_array($rating))
                                            {
                                                $num= $feed['stars'];
                                                $comment=$feed['comment'];
                                                $custid=$feed['customer_id'];
                                                $bkid=$feed['booking_id'];
                                                $cust=mysqli_query($con,"select * from tbl_customer where customer_id=$custid");
                                                $c=mysqli_fetch_array($cust);
                                                $cname=$c['customer_name'];
                                                $bkdetails=mysqli_query($con,"select * from tbl_booking where booking_id=$bkid");
                                                $b=mysqli_fetch_array($bkdetails);
                                                $bkdate=$b['booked_on'];
                                                $cmplt=$b['end'];
                                            ?>
                                                <div class="au-task js-list-load au-task--border">
                                                                <div class="au-task__item au-task__item--danger">
                                                                    <div class="au-task__item-inner">
                                                                        <h5 class="task">
                                                                            <?php echo $cname;?><br>
                                                                            Booking id :   <?php echo $bkid;?><br>
                                                                            Service : <?php echo $s['service_name']; ?><br>
                                                                            Work On :   <?php echo $bkdate; ?><br>
                                                                            Completed :   <?php echo $cmplt; ?>
                                                                        </h5>
                                                                        <span class="badge pull-right">
                                                                            <div class="rating">
                                                                            <?php
                                                                            for ($i=0; $i <$num ; $i++) { ?>
                                                                            <i class="rating__star fas fa-star"></i>
                                                                            <?php }
                                                                            ?>
                                                                            <?php
                                                                            for ($i=0; $i <5-$num ; $i++) { ?>
                                                                            <i class="rating__star far fa-star"></i>
                                                                            <?php }
                                                                            ?>
                                                                            </div>
                                                                        </span><br>
                                                                        <span class="time"><?php echo $comment;?></span>
                                                                    </div>
                                                                </div>
                                                </div>
                                                <?php
                                            }}
                                            else
                                            {?>
                                                    <div class="au-task-list js-scrollbar3">
                                                                        <div class="au-task__item au-task__item--danger">
                                                                            <div class="au-task__item-inner">
                                                                                <h5 class="task">
                                                                                    <a href="#"></a>
                                                                                </h5>
                                                                                <span class="time">No Feedback</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>   
                                        <?php   }
                                            ?>
                    </div>
                </div>
            <?php
            }
            }
            ?>
        </div>
    </div>
</center>
    <?php include("footer.php");?>
</body>
</html>