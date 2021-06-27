<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$lid="";
//total num of service providers
$count_sp="SELECT * from tbl_login where role_id=4 and aproval_status=1";
$countsp_query=mysqli_query($con,$count_sp);
$row_sp = mysqli_num_rows($countsp_query);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Location</title>

  </head>
<body>

<?php
include("header.php");
?>
<div class="container">
  <div class="row">
    <div class="col">
        <button class="btn btn-dark" id="add-new-dis">Add New</button>
      <table class="table table-bordered" id="add-district">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">District</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                        $sql="SELECT * FROM tbl_district where is_delete=1";
                        $sql_query=mysqli_query($con,$sql);
                        while($data=mysqli_fetch_array($sql_query))
                        {
                          $dis_id=$data['district_id'];
                      ?>
                  <tr>
                    <td scope="row">
                    <?php

                      echo $data['district_name'];
                    ?>
                    </td>
                    <td style="border-top:0px;text-align:right;">
                            <button class="btn btn-sm btn-success btn-inline edit" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit"><i class='fas fa-edit'></i></button><a>
                                <button class="btn btn-sm btn-danger btn-inline del" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </td>
                  </tr>
                <?php
                    }
                ?>

                </tbody>
      </table>
    </div>
    <div class="col bg-white" id="new-dis" style="display:none;">
      <table class="table table-bordered" style="margin-top:150px;">
        <thead class="thead-light">
          <tr>
            <th scope="col">District</th>
            <th scope="col">Actions</th>
          </tr>
        <tbody>
          <tr>
            <td><input type="text" class="form-control" required="" id="dis"></input></td>
            <td style="border-top:0px;">
              <button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="upload" title="Upload/View data"><i class="fa fa-upload"></i></button>  
            </td>
          </tr>
        </thead>
      </table>            
    </div>
  </div>
</div>
                   

  <script>
 
  $(document).ready(function(){
    $("#add-new-dis").on('click',function(){
      $("#add-district").width("60%");
      $("#new-dis").css("display","inline");
      $("#upload").on('click',function(){
      // $("#add-district").append("<tr><th scope='row'>"+$("#dis").val()+"</th><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
      var district = $("#dis").val();
            $.ajax({
                  url: "admin_uploaddata.php",
                  method:"POST",
                  data :{
                    dis :district},
                  success: function(result){
                    if(result==1)
                    {
                        alert("District already exist");
                    }
                    else
                    {
                      $("#add-district").append(result)
                      $("#dis").val(" ");
                    }
                  }
                });
          });
      });
    });
  
// delete district from db

  $(document).on('click','.del',function()
  {
    var dist= $(this).closest('tr').find('td:eq(0)').text();
    var diste=dist.trim();
    //  var dist= $(this).val();
    //  console.log(dist);
    $(this).closest("tr").remove();
    console.log(diste);
    $.ajax({
      url: "admin_uploaddata.php",
      method:"POST",
      data :{
      diste :diste},
      success: function(result){
        // $("#add-district").append(result);
                    $("#dis").val(" ");
      }
    });

  });
// Edit District values
  $(document).on('click','.edit',function()
  {
    
    $("#add-district").width("60%");
    $("#new-dis").css("display","inline");
    var dis= $(this).closest('tr').find('td:eq(0)').text();
    var dist=dis.trim();
    $("#dis").val(dist);
    $("#upload").on('click',function(){
      var dist_new=$("#dis").val();
    $.ajax({
      url: "admin_uploaddata.php",
      method:"POST",
      data :{
      dist_edit :dist_new,
      distee:dist
    },
      success: function(data){
        alert(data);
        $("#add-district").append(data);
        $("#dis").val(" ");
      }
    });
    });
  });
  
  </script>
</body>
</html>