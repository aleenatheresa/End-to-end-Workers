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
    <title>Earnings</title>
    
</head>
<body>
<style>
ul
{
    list-style-type:none;
}
.thead
{
    
    background-color:#1a53ff;
    
}
.thead tr td
{
    color:white;
    font-weight :8px;
    font-family : "Times New Roman", Times, serif;
}


</style>
    <?php
        include("header.php");
    ?>
    
    <div class="container">
        <div class="col-md-12">
            <div class="table">
                <table class="table table-bordered">
                    <thead class="thead">
                        <tr>
                            <td>Month</td>
                            <td>Date</td>
                            <td>Categories</td>
                            <td>Customer</td>
                            <td>Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i = 0; $i < 12; ++$i) {
                        $months[$m] = $m = date("F", strtotime("January +$i months"));
                        $nmonth = date('m',strtotime($m));
                    ?>
                        <tr>
                            <th>
                               <a href="#" role="button" data-toggle="collapse" data-target="#<?php echo $m;?>"><?php echo $m;?></a>
                            </th>
                            
                        </tr>
                        <?php
                            $today=date('Y');
                            $tmonth=date('F');
                            $earning=mysqli_query($con,"select * from tbl_earning_sp where sp_id=$sp_id and received_date like '%$today-$nmonth%' ORDER BY received_date ASC");
                            if(mysqli_num_rows($earning)>0)
                            {
                            while($spearn=mysqli_fetch_array($earning))
                            {
                               
                                $amt=$spearn['amount'];
                                $day=$spearn['received_date'];
                                $date = explode('-', $day);
                                $mnth=$date[1];
                                $cust=$spearn['customer_id'];
                                $bkid=$spearn['booking_id'];
                               
                                $bkdata=mysqli_query($con,"select * from tbl_booking where booking_id=$bkid");
                                $bk=mysqli_fetch_array($bkdata);
                                $service=$bk['service_id'];
                                $serdata=mysqli_query($con,"select * from tbl_services where service_id= $service");
                                $ser=mysqli_fetch_array($serdata);
                                $sername=$ser['service_name'];
                                $custdata=mysqli_query($con,"select * from tbl_customer where customer_id=$cust");
                                $cu=mysqli_fetch_array($custdata);
                                $custname=$cu['customer_name'];

                        ?>
                        
                                        <tr id="<?php echo $m;?>" class="collapse">
                                            <td></td>
                                            <td><?php echo $day ;?></td>
                                            <td><?php echo $sername;?></td>
                                            <td><?php echo $custname;?></td>
                                            <td style="text-align:right;"><?php echo $amt;?></td>
                                        </tr>
                        
                                            <?php  }
                                        }
                                        else
                                        {
                                            ?>
                                            <tr id="<?php echo $m;?>" class="collapse">
                                            <td colspan="5" style="text-align:center">No Earnings</td>
                                            </tr>
                                            <?php
                                        }
                                         } 
                                 $sumamt=mysqli_query($con,"select SUM(amount) as mt from tbl_earning_sp where sp_id=$sp_id");
                                $total=mysqli_num_rows($sumamt);
                                $s=mysqli_fetch_array($sumamt);
                                $samt=$s['mt'];
                                         
                                         ?>
                        <tr>
                            <th>Total : </th>
                            <td colspan="4" style="text-align:right"><?php echo $samt; ?></td>
                        </tr>
                    
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php   
        include("footer.php");
    ?>
</body>
</html>