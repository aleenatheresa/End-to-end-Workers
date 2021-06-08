<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$login=$_SESSION['login'];
$customer=$_SESSION['lid'];
if(!empty($_POST["star"])) {
    $star=$_POST["star"];
    $bkid=$_POST["bkid"];
    $emp=mysqli_query($con,"select employee_id from tbl_booking where booking_id=$bkid");
    $empid=mysqli_fetch_array($emp);
    $id=$empid['employee_id'];
    $rating=mysqli_query($con,"insert into tbl_rating (`stars`, `customer_id`, `booking_id`, `employee_id`) VALUES($star,$customer,$bkid,$id)");
    // echo "<h5>Thank you for your rating</h5>";
    echo $rating;
    

}
?>
