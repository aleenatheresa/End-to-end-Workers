<?php
session_start();
if($_SESSION['role_id']!="2"){
  header('location:../login.php');
}
$con=mysqli_connect("localhost","root","","projectdb");
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
<body>


  <div id="wrapper">
    <div class="overlay"></div>
            <!-- Sidebar -->
        <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
            <div class="simplebar-content" style="padding: 0px;">
              <a class="sidebar-brand" href="customer_index.php">
                <span class="align-middle">End To End Workers</span>
              </a>
              
              <ul class="navbar-nav align-self-stretch">
                <li>
                  <a href="edit_pro.php" id="" role="button" style="text-color:white;" data-toggle="modal"  data-target="#ProModal">
                    <label ><b style="font-famiy: Times New Roman, Times, serif;"> <?php echo $_SESSION['uname']; ?></b></label>
                  </a>
                </li>
                <li class="sidebar-header">
                  Pages
                </li>
                <li class=""><a class="nav-link text-left active" href="customer_index.php" onclick="home()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                  </svg>&ensp;Home</a>
                </li>
                <li class="has-sub">
                  <a class="nav-link collapsed text-left active" href="#collapseExample2" role="button" data-toggle="collapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                      <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                      <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                    </svg>&ensp;  Customer Booking
                  </a>
                  <div class="collapse menu mega-dropdown" id="collapseExample2">
                    <div class="dropmenu" aria-labelledby="navbarDropdown">
                        <div class="container-fluid ">
                              <div class="row">
                                <div class="col-lg-12 px-2">
                                  <div class="submenu-box">
                                    <ul class="list-unstyled m-0" id="dropdown-menu">
                                      <li><a href="customer_index.php" onclick="home()">Booking</a></li>
                                      <li><a href="booked_details.php" onclick="cust_book()">Booked Details</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                  </div>
                </li>

                <!-- <li class="">
                  <a class="nav-link text-left active" href="#profile" onclick="userprofile()">
                  <i class="fa fa-user" aria-hidden="true"></i>  Profile
                  </a>
                </li> -->

                <li class="">
                  <a class="nav-link text-left active"  role="button" href="service_rate.php" id="ser-rate">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                      <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                      <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                    </svg> &ensp;Service Rate
                  </a>
                </li>

                <!-- <li class="">
                  <a class="nav-link text-left active"  role="button" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                    </svg>&ensp;Shop
                  </a>
                </li> -->
              </ul>
              
        </div>
      </nav>
      <!-- /#sidebar-wrapper -->

  </div>




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
            <label>Date</label>  <br>
            <input type="date" class="asd" id="datepicker" min="2021-01-01"  onblur="checkDate();">
              <div id="date-msg">
                          
              </div>
              </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshPage()">Close</button>
            <button type="button" class="btn btn-success" data-dismiss="modal" disabled id="cbk">Book</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- ends modal class -->
  

  </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/cal.js"></script>

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
                        $('#cbk').on('click',function(){
                          
                          var datee=$("#datepicker").val();
                          
                     // var timee=$("#timepicker").val();

                        $.ajax({
                          url: "edit_customer.php",
                          method:"POST",
                          data :{
                          dat :datee,
                          service_id : sc,
                          category_id:id
                        },
                          success: function(result){
                            console.log(result);
                             $("#msg").css("display", "block");
                            $("#msg").delay(1000).fadeOut();

                          }
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
