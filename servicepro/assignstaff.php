<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
if(!empty($_POST["ser_name"]))
    {
        $service=$_POST["ser_name"];
        $loc=$_POST["loc"];
        $dis=$_POST['dis'];
    ?>
            <table class="table table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th>Employee</th>
                        <th>Service</th>
                        <th>District</th>
                        <th>Location</th>
                        <th>Assign</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sc=$_SESSION['sc'];
                        $sql_ser_id="select * from tbl_services where service_name='$service' and sc_id=$sc and is_delete=1";
                        $ser_id_query=mysqli_query($con,$sql_ser_id);
                        while($r=mysqli_fetch_array($ser_id_query))
                        {
                            $service_id=$r['service_id'];
                            $sql_dis="select district_id from tbl_district where district_name='$dis' and is_delete=1";
                            $dis_query=mysqli_query($con,$sql_dis);
                            $r1=mysqli_fetch_array($dis_query);
                            $dis_id=$r1['district_id'];
                            $sql_loc="select * from tbl_location where location='$loc' and district_id=$dis_id and is_delete=1";
                            $loc_query=mysqli_query($con,$sql_loc);
                            $r2=mysqli_fetch_array($loc_query);
                            $loc_id=$r2['location_id'];
                            $sql_emp="select * from tbl_employee where sc_id=$sc and service_id=$service_id and is_available=1";
                            $emp_query=mysqli_query($con,$sql_emp);
                            
                            if(mysqli_num_rows($emp_query)>0)
                            {
                                while($row=mysqli_fetch_array($emp_query))
                                {
                                $emp_id=$row['employee_id'];
                                $emp_name=$row['employee_name'];
                        ?>
                    <tr>
                        <td><?php echo $emp_name; ?></td>
                        <td><?php echo $service; ?></td>
                        <td><?php echo  $dis;?></td>
                        <td><?php echo $loc;?></td>
                        <td>
                             <button type="button" class="btn btn-danger staff" id="staff" value=<?php echo $emp_id; ?>>Assign</button>
                        </td>  
                    </tr>
                    <?php
                        }}
                        else
                        {
                            ?>
                            <tr>
                                <td colspan='5' style="text-align:center;">no employee available</td>
                            </tr>
                            <?php
                        }
                       
                    }
                    ?>
                   
                </tbody>
            </table>
    <?php
    // }
    }
    ?>

    <?php
    if(!empty($_POST['dat']))
    {
        $data=$_POST['dat'];
        $name=$_POST['ser_name'];
        $district=$_POST['dis'];
        $date=$_POST['date'];
        $loc=$_POST['loc'];
        $customer=$_POST['cust'];
        // $sql_booking="update tbl_booking set employee_id=$data where booking_id=(select booking_id from tbl_booking where customer_id=(select customer_id from tbl_customer where customer_name='$name' and district_id=(select district_id from tbl_district where district_name='$district') and location_id=(select location_id from tbl_location where location='')))";
        $sql_booking="update tbl_booking set employee_id=$data,aproval_status=1 where booking_id=(select booking_id from tbl_booking where booked_on='$date' AND customer_id=(select customer_id from tbl_customer where customer_name='$customer' and district_id=(select district_id from tbl_district where district_name='$district') and location_id=(select location_id from tbl_location where location='$loc')))";
        $booking_query=mysqli_query($con,$sql_booking);
        $avail=mysqli_query($con,"update tbl_employee set is_available=0 where employee_id=$data");
        echo "<h4>Sucessfully Assigned An Employee</h4>";
        
    }
    ?>
