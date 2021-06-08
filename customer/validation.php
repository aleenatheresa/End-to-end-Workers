<?php
session_start();
require('../DbConnection.php');
$login=$_SESSION['login'];
if(isset($_POST['id']))
{
    $id=$_POST['id'];
    
    $availabity=mysqli_query($con,"select * from tbl_employee where service_id=$id and aproval_status=1");
    if(mysqli_num_rows($availabity)>0)
       {
        while($a=mysqli_fetch_array($availabity))
        {
            $emp_id=$a['employee_id'];
            $av=$a['is_available'];
            // $count=$a['avail'];  
            $vali=mysqli_query($con,"select * from tbl_employee where employee_id=$emp_id and is_available=1");
            if(mysqli_num_rows($vali)>0)
            {
                echo "<p style='color:red'>Employee Available</p>";
                break;
            }
            else
            {
                $avail=mysqli_query($con,"SELECT * FROM `tbl_booking` where service_id=$id order by booked_on DESC LIMIT 1");
                $d=mysqli_fetch_array($avail);
                $da=$d['booked_on'];
                echo "<p style='color:red'>Select a date after".$da."</p>";
                
               break;
            }
        }
    }
    else
       {    
                echo "<p style='color:red'>Employee Not Available</p>";?>
                <script>
                document.getElementById("datepicker").style.borderColor="red";
                document.getElementById("cbk").disabled = true;
                $("#datepicker").css('pointer-events', 'none');
                </script>
                <?php      
        }   
}
?>