<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$login=$_SESSION['login'];
$customer=$_SESSION['lid'];
if(!empty($_POST["star"])) {
    $star=$_POST["star"];
    $bkid=$_POST["bkid"];
    $cmt=$_POST["com"];
    $emp=mysqli_query($con,"select employee_id from tbl_booking where booking_id=$bkid");
    $empid=mysqli_fetch_array($emp);
    $id=$empid['employee_id'];
    $rating="INSERT INTO `tbl_rating`(`stars`, `customer_id`, `booking_id`, `employee_id`, `comment`) VALUES ($star,$customer,$bkid,$id,'$cmt')";
    // $rating=mysqli_query($con,"INSERT INTO `tbl_rating`(`rating_id`, `stars`, `customer_id`, `booking_id`, `employee_id`, `comment`) VALUES ($star,$customer,$bkid,$id,'$cmt')");
    
    $rat=mysqli_query($con,$rating);
    // echo $rating;
    echo "<h5>Thank you for your rating</h5>";
    
    

}
?>
