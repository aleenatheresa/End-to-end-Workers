<?php
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
if(isset($_POST['name']))
{
    $n=$_POST['name'];
    $d=$_POST['details'];
    $apr=mysqli_query($con,"select * from tbl_employee where employee_name='$n' and employee_email='$d'");
    $r=mysqli_fetch_array($apr);
    $lid=$r['login_id'];
    $update=mysqli_query($con,"update tbl_login set aproval_status=1 where lid=$lid");
    $avail=mysqli_query($con,"update tbl_employee set is_available=1,aproval_status=1 where login_id=$lid");
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
if(isset($_POST['dat']))
    {
        $data=$_POST['dat'];
        $name=$_POST['ser_name'];
        $district=$_POST['dis'];
        $date=$_POST['date'];
        $loc=$_POST['loc'];
        $customer=$_POST['cust'];
        // $sql_booking="update tbl_booking set employee_id=$data where booking_id=(select booking_id from tbl_booking where customer_id=(select customer_id from tbl_customer where customer_name='$name' and district_id=(select district_id from tbl_district where district_name='$district') and location_id=(select location_id from tbl_location where location='')))";
        $sql_booking="UPDATE `tbl_booking` SET `employee_id`=$data,`aproval_status`='1' WHERE booked_on='$date' and customer_id=(select customer_id FROM tbl_customer where customer_email='$customer') and service_id=(SELECT service_id FROM tbl_services where service_name='$name')";
        $booking_query=mysqli_query($con,$sql_booking) or die("killed");
        $avail=mysqli_query($con,"update tbl_employee set is_available=0 where employee_id=$data");
        // echo "<h4>Sucessfully Assigned An Employee</h4>";
        echo $sql_booking;
        
    }
?>
