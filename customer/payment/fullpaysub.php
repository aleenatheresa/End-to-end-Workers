<?php

require('config.php');
session_start();
require('../../DbConnection.php');

\Stripe\Stripe::setVerifySslCerts(false);

$token=$_POST['stripeToken'];

$data=\Stripe\Charge::create(array("amount"=>15000,
    "currency"=>"inr",
    "description"=>"Payment with E2E workers description",
    "source"=>$token,
));
  
    $bk=$_SESSION['bookid'];
    $work=$_SESSION['workon'];
    $complete=$_SESSION['complete'];
    $category=$_SESSION['categ'];
    $serv=$_SESSION['service'];
    $cust_id= $_SESSION['lid'];
    if($bk!=0)
    {
        $update_status="update tbl_booking set servicecompleted=1,end='$complete' where booking_id='$bk'";
        $upquery=mysqli_query($con,$update_status);
        $emp=mysqli_query($con,"select employee_id from tbl_booking where booking_id='$bk'");
        $d=mysqli_fetch_array($emp);
        $empid=$d['employee_id'];
        $emp_avail=mysqli_query($con,"update tbl_employee set is_available=1 where employee_id=$empid");

        // Admin and service provider share
        $amtser=mysqli_query($con,"select * from tbl_services where service_name='$serv' and sc_id=(select sc_id from tbl_service_category where sc_name='$category')");
        $s=mysqli_fetch_array($amtser);
        $amt=$s['service_amt'];
        $spquery=mysqli_query($con,"select * from tbl_employee where employee_id=$empid");
        $sp=mysqli_fetch_array($spquery);
        $sp_id=$sp['sp_id'];
        $sp_share=$amt*(5/100);
        $today=date('Y-m-d');
        $sp_share_insert=mysqli_query($con,"INSERT INTO `tbl_earning_sp`( `amount`, `booking_id`, `customer_id`, `sp_id` , `received_date`) VALUES ('$sp_share',$bk,$cust_id,$sp_id,'$today')");
        $admin_share_insert=mysqli_query($con,"INSERT INTO `tbl_earning_admin`(`amount`, `customer_id`, `booking_id`, `date_recieved`) VALUES ($sp_share,$cust_id,$bk,'$today')");
        echo "<p>Thanku for using our system</p>";


    }
    
  
?>
<script>
    location.href ="../feedback.php";                
</script>