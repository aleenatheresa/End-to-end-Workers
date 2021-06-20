<?php
session_start();
if($_SESSION['role_id']!="2"){
  header('location:../login.php');
}
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$user=$_SESSION['uname'];
$data="SELECT * FROM tbl_login where uname='$user'";
$data_query=mysqli_query($con,$data);
$row=mysqli_fetch_array($data_query);
$lid=$row['lid'];
$uname=$row['uname'];
$_SESSION['login']=$lid;
$cust="SELECT * FROM tbl_customer where login_id=$lid";
$cust_query=mysqli_query($con,$cust);
$logid=mysqli_fetch_array($cust_query);
$cust_id=$logid['customer_id'];
$_SESSION['lid']=$cust_id;



//  total num of customers
$count="SELECT * from tbl_customer";
$count_query=mysqli_query($con,$count);
$row = mysqli_num_rows($count_query);

//total num of service providers
$count_sp="SELECT * from tbl_serviceproviders";
$countsp_query=mysqli_query($con,$count_sp);
$row_sp = mysqli_num_rows($countsp_query);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <script src="../js/custsidebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


      <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
        <title>Customer Index</title>

        <link href="../css/font-face.css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="../css/cust_index.css">
      

        <link href="../css/cust_index.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script src = "https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <link href="../css/theme.css" rel="stylesheet" media="all">
        <!-- Modal class -->

        <!-- <link rel="stylesheet" href="../css/cal.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
       
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
         <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  
</head>
<style>
    
a
{
  text-decoration : none;
}
 
</style>
<body>
    
<?php
include("header.php");
?>
    <!-- Booking History -->

    <div class="container" id="service_rate">
        <div class="row">
                            <div class="col">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3 py-3">
                                        <thead>
                                            <tr>
                                                <th>Service Category</th>
                                                <th>service</th>
                                                <th>Work Started</th>
                                                <th>Work Ended</th>
                                                <!-- <th>Service Provider</th> -->
                                                <th>Employee</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $rate_query=mysqli_query($con,"select * from tbl_booking where customer_id=$cust_id and servicecompleted=1");
                                             if(mysqli_num_rows($rate_query)>0)
                                                { 
                                              while($rate=mysqli_fetch_array($rate_query))
                                              {
                                                $id=$rate['customer_id'];
                                                $empid=$rate['employee_id'];
                                                $sart_date=$rate['booked_on'];
                                                $end_date=$rate['end'];
                                                $s=$rate['service_id'];
                                                $sc=$rate['sc_id'];
                                                $sql_ser=mysqli_query($con,"select * from tbl_employee where employee_id=$empid");
                                                $emp=mysqli_fetch_array($sql_ser);
                                                $e=$emp['employee_name'];
                                                $sc_name=mysqli_query($con,"select sc_name from tbl_service_category where sc_id=$sc");
                                                $c=mysqli_fetch_array($sc_name);
                                                $ser=mysqli_query($con,"select service_name from tbl_services where service_id=$s");
                                                $serv=mysqli_fetch_array($ser);
                                                
                                              ?>
                                                  <tr>
                                                      <th colspan="5" style="text-align:left;"><?php echo $c['sc_name']; ?></th>
                                                  </tr><?php
                                                 
                                                  ?>
                                                  <tr>
                                                    <td></td>
                                                    <td><?php echo $serv['service_name']; ?></td>
                                                    <td><?php echo $sart_date;?></td>
                                                    <td><?php echo $end_date;  ?></td>
                                                    <td><?php echo $e; ?></td>

                                                    <!-- <td><button class="btn btn-sm btn-danger btn-inline bk" data-toggle="modal" data-target="#myModal" title="Book Now" value="<?php echo $id;?>" id="bk">Book</button></td> -->
                                                  </tr>
                                            
                                           <?php 
                                          }}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
        </div>
                
        
      </div>
    <!-- End Booking History -->

<script>
// $('#bar').click(function(){
// 	$(this).toggleClass('open');
// 	$('#page-content-wrapper ,#sidebar-wrapper,#profile,#bookdetails,#book').toggleClass('toggled');
// });
</script>
</body>
</html>