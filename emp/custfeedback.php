<?php
session_start();

require('../DbConnection.php');
$empid=$_SESSION['eid'];

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
     <!-- Fontfaces CSS-->
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
    <link rel="stylesheet" href="../css/rating.css">

   
</head>
<body>

    <style>
        .container
        {
            margin-top:50px;
            line-height:20px;
        }
    </style>
    <?php
        include("header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container" style="background-color:white">
                <script>
                   
                </script>
                    <?php
                    $feedback=mysqli_query($con,"select * from tbl_rating where employee_id=$empid");
                    $n=mysqli_num_rows($feedback);
                    while($f=mysqli_fetch_array($feedback))
                    {
                        $cust_id=$f['customer_id'];
                        $bkid=$f['booking_id'];
                        $starr=$f['stars'];
                        $cmt=$f['comment'];
                        $cust=mysqli_query($con,"select * from tbl_customer where customer_id=$cust_id");
                        $c=mysqli_fetch_array($cust);
                        $cust_name=$c['customer_name'];
                        
                    ?>
                    <script>
                         
                    </script>
                    <!-- <div class="au-task-list js-scrollbar"> -->
                        <div class="au-task__item au-task__item--danger">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="#"></a>
                                </h5>
                                <span class="time">
                                    <p><?php echo $cust_name?></p>
                                </span>
                                <a href="#">
                                    <span class="badge pull-right">
                                        <div class="rating">
                                        <?php
                                           for ($i=0; $i <$starr ; $i++) { ?>
                                           <i class="rating__star fas fa-star"></i>
                                          <?php }
                                           ?>
                                           <?php
                                           for ($i=0; $i <5-$starr ; $i++) { ?>
                                           <i class="rating__star far fa-star"></i>
                                          <?php }
                                           ?>
                                        </div>
                                    </span>
                                </a>

                    <script>
                        
                         
                    
                    </script>
                                    
                                <p><?php echo $cmt;?></p>
                            </div>
                        </div>
                    <!-- </div>    -->
                    
                   
                <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container" style="background-color:white">
                <h4>Total Review</h4><br>
                    <?php 
                    $total=mysqli_query($con,"SELECT COUNT(rating_id) as tot from tbl_rating");
                    $t=mysqli_fetch_array($total);
                    $c=$t['tot'];

                    $total5=mysqli_query($con,"SELECT COUNT(rating_id) as tot5 from tbl_rating where stars=5") ;
                    $t5=mysqli_fetch_array($total5);
                    $count5=$t5['tot5'];

                    $total4=mysqli_query($con,"SELECT COUNT(rating_id) as tot4 from tbl_rating where stars=4") ;
                    $t4=mysqli_fetch_array($total4);
                    $count4=$t4['tot4'];

                    $total3=mysqli_query($con,"SELECT COUNT(rating_id) as tot3 from tbl_rating where stars=3") ;
                    $t3=mysqli_fetch_array($total3);
                    $count3=$t3['tot3'];

                    $total2=mysqli_query($con,"SELECT COUNT(rating_id) as tot2 from tbl_rating where stars=2") ;
                    $t2=mysqli_fetch_array($total2);
                    $count2=$t2['tot2'];

                    $total1=mysqli_query($con,"SELECT COUNT(rating_id) as tot1 from tbl_rating where stars=1") ;
                    $t1=mysqli_fetch_array($total1);
                    $count1=$t1['tot1'];
                    ?>
                        <div style="display:block">
                            <span>5</span>&nbsp<i class="rating__star far fa-star"></i>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($count5/$c)*100 ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo ($count5/$c)*100 ?> %</div>
                            </div>
                        </div>
                        <div style="display:block">
                            <span>4</span>&nbsp<i class="rating__star far fa-star"></i>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($count4/$c)*100 ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo ($count4/$c)*100 ?> %</div>
                            </div>
                        </div>
                        <div style="display:block">
                            <span>3</span>&nbsp<i class="rating__star far fa-star"></i>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($count3/$c)*100 ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo ($count3/$c)*100 ?> %</div>
                            </div>
                        </div>
                        <div style="display:block">
                            <span>2</span>&nbsp<i class="rating__star far fa-star"></i>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($count2/$c)*100 ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo ($count2/$c)*100 ?> %</div>
                            </div>
                        </div>
                        <div style="display:block">
                            <span>1</span>&nbsp<i class="rating__star far fa-star"></i>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($count1/$c)*100 ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo ($count1/$c)*100 ?> %</div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("footer.php");
      ?>
       
</body>
</html>