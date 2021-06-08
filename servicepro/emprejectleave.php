<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
if(isset($_GET['sd']))
{
    $emp=$_GET['employeeid'];
    $sdate=$_GET['startdate'];
    $del=mysqli_query($con,"update tbl_leave set is_delete=1 where employee_id=$emp and leave_start_date='$sdate'");
    echo "rejected";
}
?>