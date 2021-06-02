<?php
$con=mysqli_connect("localhost","root","","projectdb");
if(isset($_POST['name']))
{
    $n=$_POST['name'];
    $d=$_POST['details'];
    $apr=mysqli_query($con,"select * from tbl_employee where employee_name='$n' and employee_email='$d'");
    $r=mysqli_fetch_array($apr);
    $lid=$r['login_id'];
    $update=mysqli_query($con,"update tbl_login set aproval_status=1 where lid=$lid");
    echo "<p>Sucesfully added an employee</p>";
}
if(isset($_POST['nam']))
{
    $name=$_POST['nam'];
    $email=$_POST['det'];
    $apro=mysqli_query($con,"select * from tbl_employee where employee_name='$name' and employee_email='$email'");
    $ro=mysqli_fetch_array($apro);
    $logid=$ro['login_id'];
    $updatee=mysqli_query($con,"update tbl_login set is_delete=0 where lid=$logid");
    echo "<p>Sucesfully Removed an employee</p>";
}
?>
