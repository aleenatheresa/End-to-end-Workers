<?php

session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Location Management</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <title>Admin Index</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="../css/admin_stylesheet.css"  rel="stylesheet" media="all">
    <link href="../css/theme.css" rel="stylesheet" media="all">
    <script src="../js/sidebarfun.js"></script>
    <script src="../js/demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>    

</head>
<style>
 select {
        width: 140px;
    }
</style>
<body>
<?php
include("header.php");
?>

<div class="col-xs-6">
  <h4 style="padding-left:30px;padding-top:20px;color:grey;">Dashboard</h4>
</div>
<br>
    <div class="row">
        <div class="col">
            <button class="btn btn-dark" id="add-new-loc">Add New</button>
                                
            <div class="table-responsive" id="loc-body">
                <table class="table table-data3" id="add-location" style="margin-left:20px;">
                    <thead>
                        <tr>
                            <th>District</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT * FROM tbl_district where is_delete=1";
                        $sql_query=mysqli_query($con,$sql);
                        $num=mysqli_num_rows($sql_query);
                        while($data=mysqli_fetch_array($sql_query))
                        {
                            $dis_id=$data['district_id'];
                        ?>
                        <tr>
                            <th rowspan="1" style="text-align:left;"> 
                                <?php
                                echo $data['district_name'];
                                ?>
                            </th>
                                <?php
                                    $loc_data="select * from tbl_location where district_id=$dis_id and is_delete='1'";
                                    $loc_data_query=mysqli_query($con,$loc_data);
                                    while($loc_details=mysqli_fetch_array($loc_data_query))
                                    {?>
                        <tr style="text-align:center;">
                            <td></td>
                            <td>
                                <?php
                                    echo $loc_details['location'];
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success btn-inline loc_edit" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit"><i class='fas fa-edit'></i></button><a>
                                <button class="btn btn-sm btn-danger btn-inline loc_del" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                            </td>
                        </tr>
                            <?php
                                }
                            ?>
                        </tr>
                            <?php
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col bg-white" id="new-loc" style="display:none;">
            <table class="table table-bordered" style="margin-top:150px;">
                    <thead class="thead-light">
                        <tr>
                            <th>Location</th>
                            <th>District</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input type="text" class="form-control" required="" id="loc-name"></input></th>
                            <th>
                            <div class="dropdown">
                                <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="dist" id="dis-name" required="">
                                <span class="caret-dropdown-menu"></span>
                                <option value="">-District-</option>
                                <?php
                                $sql="SELECT * FROM tbl_district WHERE is_delete=1";
                                $sql_result=mysqli_query($con,$sql);
                                while($data_dis=mysqli_fetch_array($sql_result))
                                {
                                    echo "<option value='".$data_dis['district_id']."'>" .$data_dis['district_name'] ."</option>";
                                }
                                ?>
                            </th>
                            <td style="border-top:0px;text-align:right">
                                <button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="upload-data" title="Upload/View data"><i class="fa fa-upload"></i></button>
                            </td>
                        </tr>
                    </thead>
            </table>
        </div>
    </div>

 <script>
// Insert New Location
$(document).ready(function(){
  $("#add-new-loc").on('click',function(){
    $("#loc-body").width("50%");
    $("#new-loc").css("display","inline");
    $("#upload-data").on('click',function(){
    // $("#add-location").append("<tr><td scope='row'>"+$("#loc-name").val()+"</td><td scope='row' id='dname'>"+$("#dis-name").val()+"</td><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
    var loc = $("#loc-name").val();
    var dis=$("#dis-name").val();
    $.ajax({
        url: "admin_uploaddata.php",
        method:"POST",
        data :{
        location:loc,
        district :dis,
        },
        success: function(result){
        $("#loc-name").val(" ");
        }
      });
    });
  });
});

// End 

// Edit Location

$(document).on('click','.loc_edit',function()
{
    $("#loc-body").width("50%");
    $("#new-loc").css("display","inline");
    var loc= $(this).closest('tr').find('td:eq(1)').text();
    var loca=loc.trim();
    $("#loc-name").val(loca);
    // $(this).closest("tr").remove();
    $("#upload-data").on('click',function(){
        var loc_new=$("#loc-name").val();
        var dis=$("#dis-name").val();


  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
    loc_edit :loc_new,
    locat:loca,
    new_dis :dis
    },
      success: function(result){
        alert(result);
        $("#add-location").append(result);
        $("#loc-name").val(" ");
      }
    });
  });
});
// End Edit Location

// Delete Location
$(document).on('click','.loc_del',function()
{
  var loca= $(this).closest('tr').find('td:eq(1)').text();
  var loce=loca.trim();
//   $(this).closest("tr").remove();
  console.log(loce);
  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
      loce :loce},
    success: function(result){
      $("#add-location").append(result);
                  $("#loc-name").val(" ");
    }
  });

});

// End delete Location
</script>
    
</body>
</html>