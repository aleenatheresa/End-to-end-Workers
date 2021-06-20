<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$lid="";
$sc=$_SESSION['sc'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Employee On Duty</title>
</head>
<style>
.container
{
    margin-top:50px;
}
h4
{
    /* text-shadow: 1px black; */
}
td
{
    overflow:hidden;
}
</style>
<body>

    <?php
        include("header.php");
    ?>
    <div class="container">
        <div class="row md-6">
            <div class="col-md-6">
                <div class="table-responsive">
                   <table class="table table-striped">
                   <h3 class="py-3">Employees On Duty</h3>
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Specification</th>
                            <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $emp_apr=mysqli_query($con,"select * from tbl_booking where aproval_status=1 and servicecompleted=0");
                                if(mysqli_num_rows($emp_apr))
                                {
                                    while($apr=mysqli_fetch_array($emp_apr))
                                    {
                                        $cus_id=$apr['customer_id'];
                                        $emp_id=$apr['employee_id'];
                                        $serv=$apr['service_id'];
                                        $d=$apr['booked_on'];
                                        $cus_query=mysqli_query($con,"select * from tbl_customer where customer_id=$cus_id");
                                        $cus_name=mysqli_fetch_array($cus_query);
                                        $emp_que=mysqli_query($con,"select * from tbl_employee where employee_id=$emp_id");
                                        $emp=mysqli_fetch_array($emp_que);
                                        $ser_quer=mysqli_query($con,"select * from tbl_services where service_id=$serv");
                                        $serc=mysqli_fetch_array($ser_quer);

                            ?>
                            <tr>
                                <td>
                                    <h4><?php echo $emp['employee_name'];?></h4>
                                    <span><?php echo $emp['employee_phone']; ?><span>
                                </td>
                                <td><?php echo $serc['service_name'];?></td>
                                <td><?php echo $d;?></td>
                            </tr>
                            <?php
                                } }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="3" style="text-align:center;">No Employee on duty</td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                   </table>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless table-striped">
                <h3 class="py-3">Employees Avaliable</h3>
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Service</th>
                            <th scope="col">District</th>
                            <th scope="col">Last Duty</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $loginid=mysqli_query($con,"select lid from tbl_login where role_id=3 and aproval_status=1 and is_delete=1");
                            while($lo=mysqli_fetch_array($loginid))
                            {
                                $id=$lo['lid'];
                                $avail=mysqli_query($con,"select * from tbl_employee where login_id=$id and is_available=1 and sc_id=$sc");
                                
                                if(mysqli_num_rows($avail)>0)
                                {
                                    while($a=mysqli_fetch_array($avail))
                                    {
                                        $eid=$a['employee_id'];
                                        $serv=$a['service_id'];
                                        $locat=$a['location_id'];
                                        $ser=mysqli_query($con,"select * from tbl_services where service_id=$serv");
                                        $s=mysqli_fetch_array($ser);
                                        $location=mysqli_query($con,"select * from tbl_location where location_id=$locat");
                                        $l=mysqli_fetch_array($location);
                                        $did=$l['district_id'];
                                        $dis=mysqli_query($con,"select * from tbl_district where district_id=$did");
                                        $di=mysqli_fetch_array($dis);
                                        $date=mysqli_query($con,"SELECT * FROM `tbl_booking` where employee_id=$eid and servicecompleted=1 ORDER BY booked_on DESC LIMIT 1");
                                       
                        ?>
                            <tr>
                            <th scope="row"><?php echo $a['employee_name']; ?><br><?php echo $a['employee_email']?><br><?php echo $a['employee_phone'];?></th>
                            <td><?php echo $s['service_name'];?></td>
                            <td><?php echo $di['district_name'];?><br><?php echo $l['location'];?></td>
                            <td>
                                <?php 
                                
                                    if(mysqli_num_rows($date)>0)
                                    {
                                        $da=mysqli_fetch_array($date);
                                        echo $da['booked_on'];
                                    }
                                    else
                                    {
                                        echo "He hadn't been appointed yet";
                                    }
                                
                                
                                ?>
                            </td>
                            </tr>
                            <?php
                            }
                        }else{

                            }
                        }
                            ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div> 

    
    <?php
        include("footer.php");
    ?>
    
   
</body>
</html>