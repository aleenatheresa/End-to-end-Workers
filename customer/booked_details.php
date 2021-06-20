<?php
session_start();
require('payment/config.php');
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
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Details</title>

    <script src="../js/custsidebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


      <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
        <title>Details</title>

        <link href="../css/font-face.css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="cust_index.css">
        <link href="../css/theme.css" rel="stylesheet" media="all">

        <link href="../css/cust_index.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script src = "https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <link href="../css/rating.css" rel="stylesheet" media="all">
        <!-- Modal class -->
        <link rel="stylesheet" href="../css/payment.css">


</head>
<body>
<style>
  #msg{
    background-color:white;
    color:black;
  }
</style>
<?php
include("header.php");
?>
<div class="container">
  <div id="msg" tableindex="1">

  </div>
</div>
<!-- Book Details -->

<div class="container">
  <div id="bookdetails">
      <table class="table table-bordered col-sm-12">
        <thead class="thead-dark">
          <tr>
            <th>Booking ID</th>
            <th>Booked On</th>
            <th>Category</th>
            <th>Service</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
              <?php
                $bkdate="select * from tbl_booking where customer_id=$cust_id and status=1 and servicecompleted=0";
                $bkdate_query=mysqli_query($con,$bkdate);
                if(mysqli_num_rows($bkdate_query)>0){
                while($bkrow=mysqli_fetch_array($bkdate_query))
                {
                  $bkon=$bkrow['booked_on'];
                  $bking_id=$bkrow['booking_id'];
                  $bk_service=$bkrow['sc_id'];
                  $bk_status=$bkrow['servicecompleted'];
                  $bk_emp=$bkrow['employee_id'];
                  $ap=$bkrow['aproval_status'];
                  $stat=$bkrow['status'];
                  $ap=$bkrow['aproval_status'];
                  $serid=$bkrow['service_id'];

                  $bk_category="Select * from tbl_service_category where sc_id=$bk_service";
                  $cat_query=mysqli_query($con,$bk_category);
                  
                  $service_query=mysqli_query($con,"select * from tbl_services where service_id=$serid");
                  $ser_data=mysqli_fetch_array($service_query);
                  ?>
          <tr>
              <td>
                <?php
                  echo $bking_id;
                ?>
              </td>
              <td>
                <?php
                      echo $bkon;
                ?>
              </td>
              <td>
                <?php
                    $rcat=mysqli_fetch_array($cat_query);
                    echo $rcat['sc_name'];
                ?>
              </td>
              <td><?php echo $ser_data['service_name'];?></td>
              <td>
                <?php
                 if($bk_status==1)
                  {
                      echo "Work completed";
                  }
                elseif($bk_emp!=0 && $ap==1)
                {
                    echo "Employee Assigned, will be there soon";
                }
                else
                {
                  echo "Requested";
                }
                ?>
              </td>
              <td>
                 <button class="btn btn-sm btn-primary btn-inline cmplt" title="Work Finished" id="c1" value="<?php echo $bking_id;?>"<?php if($ap==0) {?> disabled <?php }?> data-target="#payModal" data-toggle="modal">Completed</button>
                  <button class="btn btn-sm btn-danger btn-inline cancel" title="Cancel Booking" value="<?php echo $bking_id;?>" id="can2" <?php if($bk_emp!=0 && $ap==1){?> disabled <?php }?> data-target="#reasonModal" data-toggle="modal">Cancel</button>

              </td>
            </tr>
                <?php
                  }}
                  else{?>
                      <th colspan="6" style="text-align:center">No current Booking</th>
                <?php  }
                ?>
        </tbody>
      </table>
    </div>

                <div id="payment" style="display:none;">
                    <div id="payment-body">

                    </div>
                </div>

   




  <div id="rating" style="display:none;">
    <div class="rating-body">

    </div>
  </div>

  <div id="reason">
    <div class="modal fade" id="reasonModal" role="dialog" aria-labelledby="modalLabel" tabindex="-1">  
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Reason for Cancelation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body" style="height: auto;">
              <div id="date-msg"></div>
              <label>Reason:</label><br>
              <input type="text" id="reason" class="form-control"><br>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshPage()">Close</button>
              <button type="button" class="btn btn-success" data-dismiss="modal" id="reason-submit">Submit</button>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>


   


<script src="../js/rating.js"></script>
<script>

// $('#bar').click(function(){
// 	$(this).toggleClass('open');
// 	$('#page-content-wrapper ,#sidebar-wrapper,#profile,#bookdetails,#book').toggleClass('toggled');
// });

function refreshPage(){
    window.location.reload();
} 

$('.cmplt').on('click',function()
    {
     
    var bookid=$(this).val();
    var datee=$(this).closest('tr').find('td:eq(1)').text().trim();
    var categ=$(this).closest('tr').find("td:eq(2)").text().trim();
    var serv=$(this).closest('tr').find("td:eq(3)").text().trim();
    var d=new Date().toISOString().split('T')[0];
            $.ajax({
                  url: "paymodal.php",
                  method:"POST",
                  data :{
                  bkid : bookid,
                  compdate:d,
                  workdate:datee,
                  category:categ,
                  service:serv
                },
                  success: function(data){
                    $("#payment").css("display","inline");
                    $("#payment-body").html(data);
                    // $.ajax({
                    //     url: "edit_customer.php",
                    //     method:"POST",
                    //     data :{
                    //     bkid : bookid,
                    //     compdate:d,
                    //     workdate:datee,
                    //     category:categ,
                    //     service:serv, 
                    //   },
                    //   success: function(result){

                    //   }
                    // });
                  }
              });
            });
  

    
      // End Complete work button function

// Cancel booking
$(".cancel").on('click',function()
      {
        var bkid_cancel=$(this).val();
        $(this).closest("tr").remove();
        $('#reason-submit').on('click',function(){
          var reason=$('#can-reason').val();
          
          $.ajax({
                url: "edit_customer.php",
                method:"POST",
                data :{
                can : bkid_cancel,
                cancelreason:reason
              },
                success: function(result){
                  alert(result);
                  $("#msg").css("display","inline");
                  $("#msg").delay(1000).fadeOut();

                }
            });
        });
      });

      // End Cancel booking
   
</script>
</body>
</html>