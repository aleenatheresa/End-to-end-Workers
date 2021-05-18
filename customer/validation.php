<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
$login=$_SESSION['login'];
if(isset($_POST['id']))
{
    $id=$_POST['id'];
    $sqli_count=mysqli_query($con,"select COUNT(service_id)FROM tbl_booking where service_id=$id");
    
    $emp_count=mysqli_query($con,"select COUNT(service_id)FROM tbl_employee where service_id=1");
    echo "<h4 style='color:red'>".$id."</h4>";
}
?>