<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('DbConnection.php');
if(!empty($_POST["emp_id"]))
{
    $id=$_POST["emp_id"];
    $sql_bking="update tbl_booking set aproval_status=1 where employee_id=$id and status=1";
    $bking_query=mysqli_query($con,$sql_bking) or die("couldn't connect");
    $sql_emp="update tbl_employee set is_available=1 where employee_id=$id";
    $emp_query=mysqli_query($con,$sql_emp);
    // echo $sql_bking;
}
?>