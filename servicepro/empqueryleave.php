<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');

if(isset($_GET['employeeid']))
{
    $emp=$_GET['employeeid'];
    $sdate=$_GET['startdate'];
    $leaveupdate=mysqli_query($con,"UPDATE `tbl_leave` SET `aproval_status`=1 where employee_id=$emp and leave_start_date='$sdate'");
    echo "sucesfully aproved leave aplication";
}


?>