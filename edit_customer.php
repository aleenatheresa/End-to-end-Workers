<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
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
    $time=$_POST['tim'];
    $sc_id=$_POST['service_id'];
    $category=$_POST['category_id'];
    $cust_id=$_SESSION['lid'];
    
    $bkemployee="insert into tbl_booking(customer_id,booked_on,time,servicecompleted,employee_id,sc_id,service_id,aproval_status,status)
    values($cust_id,'$date','$time',0,0,$category,$sc_id,0,1)";
    // echo $cust_id;
    // echo "<script>console.log('$bkemployee');</script>"; 
    $bk_query=mysqli_query($con,$bkemployee) or die("ghghjghj");
    
}
// End Confirm booking

// Complete booking
if(isset($_POST['comp']))
{
    $complete=$_POST['comp'];
    $update_status="update tbl_booking set servicecompleted=1 where booking_id='$complete'";
    $upquery=mysqli_query($con,$update_status);
    echo "<script>console.log('$update_status');</script>";
}

// End

// Cancel Button function
if(isset($_POST['can']))
{
    $canc=$_POST['can'];
    $cancel_booking="update tbl_booking set status=0 where booking_id='$canc'";
    $canquery=mysqli_query($con,$cancel_booking);
    echo "<script>console.log('$cancel_booking');</script>";
}

// End 