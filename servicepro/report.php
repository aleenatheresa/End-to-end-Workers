<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
$sid=$_SESSION['sp'];
if(isset($_POST['report']))
{
    $re=$_POST['report'];
    $date=$_POST['date'];
    $rep=mysqli_query($con,"INSERT INTO `tbl_report`('report_id',`report`, `sp_id`, `wdate`) VALUES ('','$re',$sid,'$date')")or die("hii");
    echo "<p>Sucessfully sent Report</p>";
}

?>