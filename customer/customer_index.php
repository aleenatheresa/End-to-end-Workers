<?php
session_start();
require('payment/config.php');
if($_SESSION['role_id']!="2"){
  header('location:../login.php');
}

require('../DbConnection.php');
// $con=mysqli_connect("localhost","root","","projectdb");
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


// Confirm booking
if(isset($_POST['confirmbooking']))
{

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <!-- Modal class -->

        <!-- <link rel="stylesheet" href="../css/cal.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
       
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
         <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  
  </head>



  <style>
  fieldset {
    border: 1px solid #000;
    width:auto;
}
.asd{
  border-radius:5px;
  width:300px;
  height:35px;
}
  </style>
<script>

var c=[0];
var c=[0,0];
// validation date picker
function checkDate()
{
  var date=document.getElementById("datepicker").value;
  var ToDate=new Date();
  if(date=="")
  {
    document.getElementById("datepicker").style.borderColor="red";
    document.getElementById("cbk").disabled = true;
    var today=new Date();
  }
  else if(new Date(date).getDate() <= ToDate.getDate())
  {
    document.getElementById("datepicker").style.borderColor="red";
    document.getElementById("cbk").disabled = true;
    c[0]=0;
  }
  else
  {
    document.getElementById("datepicker").style.borderColor="green";
    document.getElementById("cbk").disabled = false;
    c[0]=1;
  }
//  button();
}

function button()
{
    var l = c.length;
    var s=0;
    for(var i=0;i<l;i++)
    {
        s=s+c[i];
    }
    if(l==s)
    {
        document.getElementById("cbk").disabled = false;
    }
    else
    {
      document.getElementById("cbk").disabled = true;
    }
}

</script>
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



      <!-- service category -->
            <!-- Page Content -->
    <div id="page-content-wrapper">
      <div id="content">
        <div class="container-fluid p-0 px-lg-0 px-md-0">
            <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light my-navbar py-3">

              <!-- Sidebar Toggle (Topbar) -->
                <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                      <span></span>
                      <span></span>
                      <span></span>
                </div>


              <!-- Topbar Search -->
              <form class="d-none d-sm-inline-block form-inline navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                    </button>
                  </div>
                </div>
              </form>

              <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">
              <li>
                <a  href="#" id="userDropdown" role="button" >
                  <label ><b style="font-famiy: Times New Roman, Times, serif;">Welcome <?php echo $_SESSION['uname']; ?></b></label>
                </a>
              </li>
              <li>
                <a  href="../logout.php" id="userDropdown" role="button" >
                  <label ><b style="font-famiy: Times New Roman, Times, serif;">Signout</b></label>
                </a>
              </li>
             </ul>
          </nav>
          <!-- End of Topbar -->
    </div>
  </div>


<!-- Sucess Message -->
<br><br>
<div class="alert alert-success" id="msg" style="display:none;width:100%">
    <strong>Success!</strong> Sucessfully completed action.
</div>

  <!-- End Sucess Msg -->
        <!-- /#wrapper -->
            <!-- Service Category -->

    <div class="container" id="maindiv">
        <div id="book" style="text-align:center;display:block">
                <div class="row">
                          <?php
                            $noarray=array();
                            $services="SELECT * FROM tbl_service_category WHERE is_delete='1'";
                            $ser_query=mysqli_query($con,$services);
                            $num=mysqli_num_rows($ser_query);
                            // $sizeofnoarray=$num;
                            while($row=mysqli_fetch_array($ser_query))
                            {

                              $image=$row['img'];
                              $scname=$row['sc_name'];
                              $scrate=$row['amount'];
                              $scid=$row['sc_id'];
                              $_SESSION['id']=$scid;
                              $ser_cat= $_SESSION['id'];
                             
                              $ser=mysqli_query($con,"select * from tbl_services where sc_id=$scid");
                              if(mysqli_num_rows($ser)>0)
                              {
                          ?>
                            <!-- <div class="col-sm-3">
                                <div class="card">
                                    <img class="card-img-top" src="images/<?php echo $image;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3" style="color:black"><?php echo $scname;?></h4>
                                        <button type="button" class="test btn btn-link btn-lg" name="ser" id="<?php echo $scid?>" value="<?php echo $scid; ?>"><?php echo $scrate;?>
                                        </button>
                                    </div>
                                </div>
                            </div> -->
                          <div class="column" style="margin-left:10px;margin-top:15px;width: 15rem; height:20rem;">
                            <div class="card" style="width: 15rem; height:20rem; display:block;">
                                <img src="../images/<?php echo $image;?>" class="card-img-top" alt="9.jpg" width="60px" height="180px">
                                <div class="card-body">
                                  <form action="" method="POST">
                                    <button type="button" class="test btn btn-link btn-lg" name="ser" id="<?php echo $scid?>" value="<?php echo $scid; ?>"><?php echo $scname;?>
                                    </button>
                                  </form>
                                </div>
                            </div>
                          </div>
                            <?php
                               }   }
                          ?>
                  </div>
              </div>
              <div id="services_under_sc" style="display:inline">
                <div class="row" id="services_under_sc_body">

                </div>
              </div>
      <!-- modal class for confirm booking -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel" style="font-size:10px;">Datepicker</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" style="height: auto;">
            <form>
              <label>Date</label>  <br>
              <input type="date" class="asd" id="datepicker" min="2021-01-01"  onblur="checkDate();">
                <div id="date-msg"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshPage()">Close</button>
                <button type="button" class="btn btn-success" data-dismiss="modal" disabled id="cbk" data-toggle="modal" data-target="#payment">Book</button>
              </div>
            </form>
          </div>
        </div>
    </div>
    
    <!-- ends modal class -->
    <div class="modal fade" id="payment" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel" style="font-size:10px;">Card Paymet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" style="height: auto;">
            <form action="payment/submit.php" method="POST" id="frm">
              <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="<?php echo $pubk?>"
              data-amount="15000"
              data-name="Payment with E2E workers"
              data-description="Payment with E2E workers description"
              data-image=""
              data-currency="inr"
              ></script>
            </form>
          </div>
              <div class="modal-footer">
               </div>
        </div>
    </div>

  </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    

<script>

function refreshPage(){
    window.location.reload();
} 


$(document).ready(function(){
    $('.test').click(function(){
    // var id = $(this).attr("id");
    var id = $(this).val();
    console.log(id);
      $.ajax({
                url:"services.php",
                method:"post",
                data:{id:id},
                success:function(data){
                     $('#services_under_sc_body').html(data);
                     $("#services_under_sc").css("display", "inline");
                     $('.bkser').click(function()
                     {
                     
                        var sc=$(this).val();
                        $.ajax({
                                url:"validation.php",
                                method:"post",
                                data:{id:sc,
                               
                                },
                                success:function(data){
                                    $("#date-msg").html(data);

                                }

                              });
                        // var s=$(this).val();
                        $('#datepicker').blur(function(){
                          var datee=$("#datepicker").val();
                          // var s=$(this).val();
                              
                          $("#frm").submit(function( e ) {
                            e.preventDefault(); // dont submit multiple times
                             this.submit(); // use native js submit
                              $.ajax({
                                url: 'edit_customer.php' ,
                                method:"POST",
                                data :{
                                dat :datee,
                                service_id : sc,
                                category_id:id
                              },
                                success: function(result){
                                alert(result);
                                  // $("#msg").css("display", "block");
                                  // $("#msg").delay(1000).fadeOut();

                                }
                              });
                          });
                        });

                      });

                }
            });
      });





$('#ser-rate').click(function(){
  $('#service_rate').show();
  $('#book,#bookdetails,#profile').hide();
});

$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper,#profile,#bookdetails,#book').toggleClass('toggled');
});
});

  </script>
  </body>
</html>
