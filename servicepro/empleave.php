<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$sp_id=$_SESSION['sp'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Leave Management</title>
   
</head>
<body>

    <?php
        include("header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="table">
                    <table class="table table-borderless">
                        <thead class="thead-dark">
                            <th>Employee id</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>No. of Days</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                        $leavereq=mysqli_query($con,"select * from tbl_leave where sp_id=$sp_id and aproval_status=0 and is_delete=0");
                        if(mysqli_num_rows($leavereq)>0)
                        {
                            while($request=mysqli_fetch_array($leavereq))
                            {
                                $startdate=$request['leave_start_date'];
                                $empid=$request['employee_id'];
                                $enddate=$request['leave_end_date'];
                                $reason=$request['reason'];
                                $emp=mysqli_query($con,"select * from tbl_employee Where employee_id=$empid");
                                $e=mysqli_fetch_array($emp);
                                $empname=$e['employee_name'];
                           
                                $start = strtotime($startdate);
                                $end = strtotime($enddate);
                                $days = $end - $start;
                                $days = ceil($days/86400);
                                if($days==0)
                                {
                                    $days=1;
                                }?>
                            <tr>
                                <td><?php echo $empid; ?></td>
                                <td><?php echo $empname; ?></td>
                                <td><?php echo $startdate;?></td>
                                <td><?php echo $days?></td>
                                <td>
                                    <button class="lapr btn btn-sm btn-success btn-inline" title="Approve">Approve</button><a>
                                    <button class="lrej btn btn-sm btn-danger btn-inline" title="Delete">Reject</button></a><a>
                            
                                </td>
                            </tr>
                            <?php
                                }
                                }
                                else
                                {?>
                                    <td colspan="5" style="text-align:center;color:blackl;">No Request of leave application</td>
                        <?php  }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
        include("footer.php");
    ?>
<script>
    $(".lapr").on("click",function(){
        var emp=$(this).closest('tr').find('td:eq(0)').text();
        var startd=$(this).closest('tr').find('td:eq(2)').text();
        $.ajax({
            url: "empqueryleave.php",
            method:"GET",
            data :{
                employeeid:emp,
                startdate:startd
            },
            success: function(data){
                alert(data);
                
            }
        });
    });

    $(".lrej").on("click",function(){
        var emp=$(this).closest('tr').find('td:eq(0)').text();
        var startd=$(this).closest('tr').find('td:eq(2)').text();
        $.ajax({
            url: "emprejectleave.php",
            method:"GET",
            data :{
                sd:1,
                employeeid:emp,
                startdate:startd
            },
            success: function(data){
                alert(data);
                
            }
        });
    });
</script>
</body>
</html>