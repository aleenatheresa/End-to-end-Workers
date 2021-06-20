<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$login=$_SESSION['login'];
if(isset($_POST['name']))
{
    $name=$_POST['name'];
    $address=$_POST['address'];
    $ph=$_POST['phone'];
    $em=$_POST['email'];
    $uname=$_POST['uname'];
    $edit="update tbl_customer set customer_name='$name',customer_address='$address',customer_phone='$ph',customer_email='$em' where login_id=$login";
    $edit_query=mysqli_query($con,$edit);
    $user_edit="update tbl_login set uname='$uname' where lid=$login";
    $user_query=mysqli_query($con,$user_edit);
    echo " ";
}

// Confirm booking
if(isset($_POST['dat']))
{
    // header('location:asd.php');
    $date=$_POST['dat'];
    $_SESSION['sdate'] = $date;
    // $time=$_POST['tim'];
    $sc_id=$_POST['service_id'];
    $category=$_POST['category_id'];
    $cust_id=$_SESSION['lid'];
    $bkemployee="insert into tbl_booking(customer_id,booked_on,servicecompleted,employee_id,sc_id,service_id,aproval_status,status)
    values($cust_id,'$date',0,0,$category,$sc_id,0,1)";
    // echo $cust_id;
    // echo "<script>console.log('$bkemployee');</script>"; 
  
    $bk_query=mysqli_query($con,$bkemployee) or die("ghghjghj"); 

}
// End Confirm booking

// Complete booking
if(isset($_POST['bkid']))
{
    $complete=$_POST['bkid'];
    $datee=$_POST['workdate'];
    $cmplt=$_POST['compdate'];
    $cat=$_POST['category'];
    $ser=$_POST['service'];
    $update_status="update tbl_booking set servicecompleted=1,end='$cmplt' where booking_id='$complete'";
    $upquery=mysqli_query($con,$update_status);
    $emp=mysqli_query($con,"select employee_id from tbl_booking where booking_id='$complete'");
    $d=mysqli_fetch_array($emp);
    $empid=$d['employee_id'];
    $emp_avail=mysqli_query($con,"update tbl_employee set is_available=1 where employee_id=$empid");
    
    echo "<p>Thanku for using our system</p>";
}

// End

// Cancel Button function
if(isset($_POST['can']))
{
    $canc=$_POST['can'];
    $reason=$_POST['cancelreason'];
    $cancel_booking="update tbl_booking set status=0 where booking_id='$canc'";
    $canquery=mysqli_query($con,$cancel_booking);
    $c=mysqli_query($con,"select * from tbl_booking where booking_id=$canc");
    $empn=mysqli_fetch_array($c);
    $cid=$empn['customer_id'];
    $cantbl=mysqli_query($con,"INSERT INTO `tbl_cancel`( `customer_id`, `booking_id`, `Reason`) VALUES ($cid,$canc,'$reason')");
    echo "<script>alert('updated');</script>";
}

// End 

session_write_close();
?>