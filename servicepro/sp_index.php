<?php
session_start();
if($_SESSION['role_id']!="4"){
  header('location:../login.php');
}
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$lid="";



// Total NUmber of Employee
$v="select * from tbl_employee";
$v_query=mysqli_query($con,$v);
$row_sp = mysqli_num_rows($v_query);

// Details of Service Provider
$user=$_SESSION['uname'];
$login_details="select lid from tbl_login where uname='$user'";
$log_query=mysqli_query($con,$login_details);
$log=mysqli_fetch_array($log_query);
$logid=$log['lid'];
$spdetail="select * from tbl_serviceproviders where login_id=$logid";
$sp_query=mysqli_query($con,$spdetail);
$sp=mysqli_fetch_array($sp_query);
$sp_dis=$sp['district_id'];
$sp_id=$sp['sp_id'];
$_SESSION['sp']=$sp_id;
$val=$sp['sp_email'];
$sc=$sp['sc_id'];
$_SESSION['sc']=$sc;


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Provider</title>

   
</head>
<body>
    <?php
        include("header.php")
    ?>
    <div class="container" id="spdata" style="display:inline ;">
        <!-- <h4 style="margin:30px;color:grey;">Dashboard</h4> -->
        
            <!-- <div class="container-fluid px-lg-4">
                <div class="row">
                    <div class="notify"><span id="notifyType" class=""></span></div>
                        <div class="col-md-12">
                            <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Highest Rated</h5>
                                                    <h1 class="display-5 mt-1 mb-3">
                                                    <?php
                                                        
                                                        ?>
                                                    </h1>

                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Lowest Rated</h5>
                                                    <h1 class="display-5 mt-1 mb-3">
                                                        <?php
                                                        
                                                        ?>
                                                    </h1>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">New Admission</h5>
                                                    <h1 class="display-5 mt-1 mb-3"><?php ?></h1>

                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
    </div>
    
      
                <div class="container">
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert" id="noti" style="display:none">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span class="content"  tabindex="1" id="msg" ></span>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="zmdi zmdi-close-circle"></i>
                            </span>
                        </button>
                    </div>
                    
                </div>
            

            <div class="container">
                <div class="row">
                    <div class="col-sm-8" style="display:block;background:white;">
                        <div class="py-3">
                            <h4 class="py-3">Employee Request</h4>
                        </div>
                        <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Service</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                           <?php
                                            $req=mysqli_query($con,"select * from tbl_login where aproval_status=0 and role_id=3 and is_delete=1");
                                            if(mysqli_num_rows($req)>0){
                                                while($req_data=mysqli_fetch_array($req))
                                                {
                                                    $logid=$req_data['lid'];
                                                    $emp_data=mysqli_query($con,"select * from tbl_employee where login_id=$logid and sc_id=$sc and district_id=$sp_dis");
                                                    if(mysqli_num_rows($emp_data)>0)
                                                            {
                                                        while($r=mysqli_fetch_array($emp_data))

                                                        {  
                                                    
                                                        $emp_name=$r['employee_name'];
                                                        $emp_adr=$r['employee_email'];
                                                        $emp_phone=$r['employee_phone'];
                                                        $emp_loc=$r['location_id'];
                                                        $emp_service=$r['service_id'];
                                                        $location=mysqli_query($con,"select * from tbl_location where location_id='$emp_loc'");
                                                        $l=mysqli_fetch_array($location);
                                                        $loca=$l['location'];
                                                        $service_name=mysqli_query($con,"select * from tbl_services where service_id='$emp_service'");
                                                        $s=mysqli_fetch_array($service_name);
                                           ?>
                                            <tr>
                                                <td><?php echo $emp_name; ?></td>
                                                <td><?php echo $emp_adr;?></td>
                                                <td><?php echo $s['service_name']; ?></td>
                                                <!-- <td><?php echo $loca;?></td> -->
                                                <td>
                                                    <button class="btn btn-sm btn-success btn-inline emp_approve" data-target="#demo-lg-modal1" onclick="" data-toggle="modal" title="Approve">Approve</button><a>
                                                    <button class="btn btn-sm btn-danger btn-inline emp_reject" onclick=""  title="Delete">Ignore</button></a><a>
                                                </td>
                                                
                                            </tr>
                                            <?php
                                            }}
                                            
                                            }}
                                            else
                                            {
                                                ?>
                                                <tr>
                                                    <td colspan="4" style="text-align:center;font-weight:10px;font-size:20px;">No request yet</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            
                                           </tbody>
                                           
                                        </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">top rated employees</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                                <tr>
                                                    <td>1.Chippy</td>
                                                    <td></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>2.Manas</td>
                                                    <td></td>
                                                </tr>
                                                
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    </div>
                
                </div>
            </div>
            <div class="col-xl-12">
                                <!-- PAGE CONTENT-->
                    <div class="page-content">
                                    <!-- Employee Notification -->
                        <div class="user-data m-b-20">
                            <h4 class="title-3 m-b-20">
                            <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp Booking Request</h4>
                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Specification</td>
                                            <td>District</td>
                                            <td>Location</td>
                                            <td>Date</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            
                                            $bkname="select * from tbl_booking where sc_id=$sc and status=1 and servicecompleted=0 and aproval_status=0";
                                            $bkquery=mysqli_query($con,$bkname);
                                            while($bkdata=mysqli_fetch_array($bkquery))
                                            {
                                                $ser_cat=$bkdata['sc_id'];
                                                $service=$bkdata['service_id'];
                                                $custid=$bkdata['customer_id'];
                                                $date=$bkdata['booked_on'];
                                                $cust="select * from tbl_customer where customer_id=$custid";
                                                $custquery=mysqli_query($con,$cust);
                                                $custn=mysqli_fetch_array($custquery);
                                                $cust_dis_id=$custn['district_id'];
                                                if($cust_dis_id==$sp_dis)
                                                {
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="table-data__info">
                                                    <h5>
                                                        <span class="cus"><?php echo $custn['customer_name']; ?></span>
                                                    </h5>
                                                    <p style="color:blue">
                                                        <?php echo $custn['customer_email'];  ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                <span><?php 
                                                    $ser="select * from tbl_services where service_id=$service";
                                                    $serquery=mysqli_query($con,$ser);
                                                    $serdata=mysqli_fetch_array($serquery);
                                                    echo $serdata['service_name'];
                                                ?></span>
                                            </td>
                                            <td><?php $dis= $custn['location_id'];
                                                $dis_sql="select * from tbl_district where district_id=$dis";
                                                $dis_query=mysqli_query($con,$dis_sql);
                                                $dis_data=mysqli_fetch_array($dis_query);
                                                echo $dis_data['district_name'];
                                                ?>
                                            </td>
                                            <td>
                                                <span><?php  
                                                    $loc=$custn['location_id'];
                                                    $locname="select * from tbl_location where location_id=$loc";
                                                    $locquery=mysqli_query($con,$locname);
                                                    $locdta=mysqli_fetch_array($locquery);
                                                    echo $locdta['location'];
                                                ?></span>
                                            </td>
                                            <td><?php echo $date; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger assign" id="assign">Assign Staff</button>
                                            </td>
                                        </tr>
                                            <?php
                                             } }
                                            ?>
                                </tbody>
                            </table>
                        </div>
            
                                        <div class="user-data__footer">
                                            <button class="au-btn au-btn-load"></button>
                                        </div>
                                    </div>
                                    <!-- End Employee Notification -->
            
                                    <div class="col-md-12" id="stafftable-body" tabindex="1" style="display:none;">
                                            <!-- DATA TABLE-->
                                            <div class="table-responsive m-b-40" id="stafftable">

                                            </div>
                                            <!-- END DATA TABLE-->
                                    </div>
                    </div>
                </div>
            
            <?php
                 include("footer.php");
            
                $leavereq=mysqli_query($con,"select * from tbl_leave where sp_id=$sp_id and aproval_status=0");
                if(mysqli_num_rows($leavereq)>0)
                {?>
                    <script>
                        $("#msg").css("display","block");
                        $("#msg").html("<p style='color:red;text-align:center'>You have a leave request application</p>");
                        
                    </script>
                    <?php
                    while($request=mysqli_fetch_array($leavereq))
                    {
                        $custm=$request['leave_start_date'];
                        $empid=$request['employee_id'];
                        $enddate=$request['leave_end_date'];
                        $reason=$request['reason'];
                    }
                }
?>
<script>


$('.emp_approve').on('click',function(){
    var name=$(this).closest('tr').find('td:eq(0)').text();
    var nam=name.trim();
    var details=$(this).closest('tr').find('td:eq(1)').text();
    var det=details.trim();
    $.ajax({
                url: "approvestaff.php",
                method:"POST",
                data :{
                    name:nam,
                    details: det
                },
                success: function(result){
                $("#noti").css('dispaly','block');
                $('#msg').html(result);
                $('#msg').css("display","block");
                $('#msg').fadeIn().delay(500).fadeOut();
                }
    });
   
});
$('.emp_reject').on('click',function()
{
    var name=$(this).closest('tr').find('td:eq(0)').text();
    var n=name.trim();
    var details=$(this).closest('tr').find('td:eq(1)').text();
    var d=details.trim();
    $.ajax({
                url: "approvestaff.php",
                method:"POST",
                data :{
                    nam:n,
                    det: d
                },
                success: function(result){
                    
                $('#msg').html(result);
                $('#msg').css("display","block");
                $('#msg').fadeIn().delay(500).fadeOut();
                }
    });

});

$(document).on('click','.assign',function()
        {
            var serv=$(this).closest('tr').find('td:eq(1)').text().trim();
            var dist=$(this).closest('tr').find('td:eq(2)').text().trim();
            var cust=$(this).closest('tr').find('td:first p').text().trim();
            var loca=$(this).closest('tr').find('td:eq(3)').text().trim();
            var datee=$(this).closest('tr').find('td:eq(4)').text().trim();
           
            $.ajax({
                url: "assignstaff.php",
                method:"POST",
                data :{
                ser_name :serv,
                dis : dist,
                loc : loca
                },
                success: function(result){
                    $('#stafftable').html(result);
                    $("#stafftable-body").css("display", "inline");
                    $('#stafftable-body').focus();
                    $('.staff').on('click',function()
                    {
                        var data=$(this).val();
                        $(this).closest("tr").remove();
                        console.log(data);
                        $.ajax({
                          url: "approvestaff.php",
                          method:"POST",
                          data :{
                            dat :data,
                            ser_name :serv,
                            dis : dist,
                            loc : loca,
                            date:datee,
                            cust:cust
                            
                        },
                          success: function(result){
                              alert(result);
                            //   $('#msg').html(result);
                            // $("#msg").css("display","inline");
                            // $("#msg").delay(1000).fadeOut();
                          }
                        });
                    });
                }
            });
        });



</script>
</body>
</html>