<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
if(isset($_GET['sd']))
{
   
    $start=$_GET['fdate'];
    $end=$_GET['sdate'];
    $reason=$_GET['lreason'];
    $empid=$_SESSION['eid'];
    $empsc=$_SESSION['emp_sc'];

    // $eid=$_POST['empid'];
    // $scid=$_POST['empsc'];
    $sclog=mysqli_query($con,"select * from tbl_login where role_id=4 and aproval_status=1") or die("loginerror");
    while($l=mysqli_fetch_array($sclog))
    {
        $log=$l['lid'];
        $sp=mysqli_query($con,"select * from tbl_serviceproviders where sc_id=$empsc and login_id=$log") or die("loginerror");
    }
        $r=mysqli_fetch_array($sp);
        $sid=$r['sp_id'];
        $leave=mysqli_query($con,"INSERT INTO `tbl_leave`(`leave_start_date`, `employee_id`, `sp_id`, `leave_end_date`,reason,aproval_status) 
        VALUES ('$start',$empid,$sid,'$end','$reason',0)");
        // $leave="INSERT INTO `tbl_leave`(`leave_start_date`, `employee_id`, `sp_id`, `leave_end_date`) VALUES ('$start',$empid,$sid,'$end'";
        echo "<p>Sucessfully sent leave application</p>";
        
}

?>
