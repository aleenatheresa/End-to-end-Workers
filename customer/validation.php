<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
$login=$_SESSION['login'];
if(isset($_POST['id']))
{
    $id=$_POST['id'];
    // $sqli_count=mysqli_query($con,"select COUNT(service_id) as data FROM tbl_booking where service_id=$id");
    // $data1=mysqli_fetch_assoc($sqli_count);
    // $c=$data1['data'];
    
    // $emp_count=mysqli_query($con,"select COUNT(service_id) as emp FROM tbl_employee where service_id=1");
    // $dat=mysqli_fetch_assoc($emp_count);
    // $c1=$dat['emp'];

   
    $availabity=mysqli_query($con,"select employee_id,is_available,count(is_available) as avail from tbl_employee where service_id=$id");
    while($a=mysqli_fetch_array($availabity))
    {
        $emp_id=$a['employee_id'];
        $av=$a['is_available'];
        $count=$a['avail'];
    }
    if($count>=1)
    {
        echo "<h4 style='color:red'>Employee Available</h4>";
        ?>
        <!-- <script>
        document.getElementById("datepicker").style.borderColor="green";
        document.getElementById("cbk").disabled = false;
        </script> -->
        <?php
    }
    else
    {
        $avail=mysqli_query($con,"SELECT * FROM `tbl_booking` where service_id=$id order by booked_on DESC LIMIT 1");
        $d=mysqli_fetch_array($avail);
        $da=$d['booked_on'];
        
        echo "<h6 style='color:red'>Select a date after".$da."</h6>";
        // echo $da;
        ?>
        <script>
        // document.getElementById("datepicker").style.borderColor="red";
        document.getElementById("cbk").disabled = true;
        </script>
        <?php
        
    }
    
}
?>