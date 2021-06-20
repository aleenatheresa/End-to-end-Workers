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
    if($bk!=0)
    {
        $update_status="update tbl_booking set servicecompleted=1,end='$complete' where booking_id='$bk'";
        $upquery=mysqli_query($con,$update_status);
        $emp=mysqli_query($con,"select employee_id from tbl_booking where booking_id='$bk'");
        $d=mysqli_fetch_array($emp);
        $empid=$d['employee_id'];
        $emp_avail=mysqli_query($con,"update tbl_employee set is_available=1 where employee_id=$empid");
        
        echo "<p>Thanku for using our system</p>";
    }
    
?>
<script>
    location.href ="../feedback.php";                
</script>