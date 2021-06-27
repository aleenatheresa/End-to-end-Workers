<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
// total number of employee
$count_emp="SELECT * FROM tbl_employee";
$emp_query=mysqli_query($con,$count_emp);
$row_emp = mysqli_num_rows($emp_query);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>

    
</head>
<body>
    
<?php
include("header.php");
?>
<div class="container">
    <h4>Employee Data</h4>
    <br>
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>

                    <tr>
                    <th>Name</th>
                    <th>Service Provider</th>
                    <th>Category</th>
                    <th>Service</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $l_q=mysqli_query($con,"select * from tbl_login where role_id=3 and aproval_status=1");
                    while($emp=mysqli_fetch_array($l_q))
                    { $emplid=$emp['lid'];
                    $employe="select * from tbl_employee where login_id=$emplid";
                    $employee_query=mysqli_query($con,$employe);
                    $r=mysqli_fetch_array($employee_query);
                    
                    $name=$r['employee_name'];
                    $sp=$r['sp_id'];
                    $sc=$r['sc_id'];
                    $ser_id=$r['service_id'];
                    ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php
                        $service_providers="select * from tbl_serviceproviders where sc_id=$sc";
                        $sp_query=mysqli_query($con,$service_providers);
                        $row=mysqli_fetch_array($sp_query);
                            echo $row['sp_name'];
                        ?>
                        </td>
                        <td>
                        <?php
                        $sc="select * from tbl_service_category where sc_id=$sc";
                        $sc_query=mysqli_query($con,$sc);
                        $sprow=mysqli_fetch_array($sc_query);
                        echo $sprow['sc_name'];
                        ?>
                        </td> 
                        <td>
                        <?php 
                        $s_q=mysqli_query($con,"select * from tbl_services");
                        $row_ser=mysqli_fetch_array($s_q);
                        echo $row_ser['service_name'];
                        ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</script>
</body>
</html>