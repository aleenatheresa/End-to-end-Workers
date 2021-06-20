<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
if(!empty($_POST["ser_name"]))
    {
        $service=$_POST["ser_name"];
        $loc=$_POST["loc"];
        $dis=$_POST['dis'];
    ?>
    <div class="container">
            <table class="table table-bordered">
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
                        $log=mysqli_query($con,"select lid from tbl_login where role_id=3 and aproval_status=1");
                        if(mysqli_num_rows($log)>0)
                        {
                            while($l=mysqli_fetch_array($log))
                            {
                            $id=$l['lid'];
                            $sql_ser_id="select * from tbl_services where service_name='$service' and sc_id=$sc and is_delete=1";
                            $ser_id_query=mysqli_query($con,$sql_ser_id);
                            $r=mysqli_fetch_array($ser_id_query);
                            $service_id=$r['service_id'];
                            // $sql_dis="select district_id from tbl_district where district_name='$dis' and is_delete=1";
                            // $dis_query=mysqli_query($con,$sql_dis);
                            // $r1=mysqli_fetch_array($dis_query);
                            // $dis_id=$r1['district_id'];
                            // $sql_loc="select * from tbl_location where location='$loc' and district_id=$dis_id and is_delete=1";
                            // $loc_query=mysqli_query($con,$sql_loc);
                            // $r2=mysqli_fetch_array($loc_query);
                            // $loc_id=$r2['location_id'];
                            
                            $sql_emp="select * from tbl_employee where sc_id=$sc and service_id=$service_id and is_available=1 and login_id=$id";
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
                            <center>
                                <button type="button" class="btn btn-danger staff" id="staff" value=<?php echo $emp_id; ?>>Assign</button>
                            </center>
                        </td>  
                    </tr>
                    <?php
                    }} }}
                    else
                        {
                            ?>
                            <tr>
                                <td colspan='5' style="text-align:center;">No employee available</td>
                            </tr>
                            <?php
                        } 
                    ?>
                </tbody>
            </table>
    </div>
            <?php
            // }
            }
            ?>
    
    <?php
    
    ?>
