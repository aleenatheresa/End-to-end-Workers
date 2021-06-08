<?php
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
session_start();
$emp=$_SESSION['eid']

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave status</title>
</head>
<body>
    <?php
        include("header.php");
    ?>
                <div class="container">
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert" style="display:none" id="blk">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span class="content"  tabindex="1" id="msg" ></span>
                        <button class="close" type="button" data-dismiss="alert" id="dismiss" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="zmdi zmdi-close-circle"></i>
                            </span>
                        </button>
                    </div>
                    
                </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container" style="background-color:white;">
                    <div class="table">
                        <div class="table table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <th>Date</th>
                                    <th>Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                <?php
                                    $leav=mysqli_query($con,"select * from tbl_leave where employee_id=$emp");
                                    if(mysqli_num_rows($leav)>0)
                                    {
                                    while($r=mysqli_fetch_array($leav))
                                    {
                                        $sdate=$r['leave_start_date'];
                                        $re=$r['reason'];
                                        $ap=$r['aproval_status'];
                                        $de=$r['is_delete'];
                                        $edate=$r['leave_end_date'];

                                        $start = strtotime($sdate);
                                        $end = strtotime($edate);
                                        $days = $end - $start;
                                        $days = ceil($days/86400);?>
                                
                                    <tr>
                                        <td><?php echo $sdate;?></td>
                                        <td><?php echo $days; 
                                        $num=array();
                                        array_push($num,$days);
                                        ?></td>
                                        <td><?php echo $re; ?></td>
                                        <td><?php if($ap==1){
                                            echo "Approved";
                                        } 
                                        elseif($de==1){
                                            echo "Not Approved";
                                        }?></td>
                                    </tr>
                               <?php }}?>
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4">
                    <div class="container" style="background-color:white;">
                        <div class="table">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <th>Leave Taken</th>
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php 
                                        //   print_r($num);
                                        ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div> -->
        </div>
    </div>

    <?php
        include("footer.php");
        
        $leavereq=mysqli_query($con,"select * from tbl_leave where employee_id=$emp and seen=0");
        if(mysqli_num_rows($leavereq)>0)
        {
        $request=mysqli_fetch_array($leavereq);
        $leaveid=$request['leave_id'];
        $custm=$request['leave_start_date'];
        $apr=$request['aproval_status'];
        $del=$request['is_delete'];?>
        <script>
            $("#blk").css("display","block");
            $("#msg").html("<p style='color:red;text-align:center'>Notification for leave request on <?php echo  $custm;?></p>");
            
        </script>
<?php   } ?>
   <script>
    $("#dismiss").on("click",function(){
        <?php 
            $upsen=mysqli_query($con,"update tbl_leave set seen=1 where leave_id=$leaveid");
            
        ?>
       
    });
   </script>
</body>
</html>