<?php

session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
// service image
if(isset($_POST['insert_serv'])){
    $pic1=$_FILES['scImage']['name'];
    $target_dir1 = "images/icon/";
    $target_path1=$target_dir1.$pic1;
    move_uploaded_file($_FILES['scImage']['tmp_name'],$target_path1);
  }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Services</title>

  
</head>
<body>
  <?php
      include("header.php");
  ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12" id="services">
            <div>
                <button type="button" class="btn btn-info add-new"  id="new-service"><i class="fa fa-plus"></i> Add New</button>
                <button type="button" class="btn btn-info del"  id="del-s"> Deleted Services </button>
            </div>
            <table class="table table-data3" id="service-body">
                <thead>
                    <tr>
                        <th>Service Category</th>
                        <th>Service</th>
                        <th>Image</th>
                        <th>Rate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $services="SELECT * FROM tbl_service_category WHERE is_delete=1";
                $ser_query=mysqli_query($con,$services);
                while($row=mysqli_fetch_array($ser_query))
                {
                 ?>
                    <tr>
                        <th><?php
                            echo $row['sc_name'];
                            $rid=$row['sc_id'];
                            ?>
                        </th>
                            <?php
                            $ser="SELECT * from tbl_services where sc_id=$rid and is_delete=1";
                            $service_query=mysqli_query($con,$ser);
                            if(mysqli_num_rows($service_query)>0)
                            {
                            while($ser_data=mysqli_fetch_array($service_query))
                            {
                            $serimg=$ser_data['service_img'];
                            $seramt=$ser_data['service_amt'];
                            ?>
                    <tr>
                        <td></td>
                        <td>
                            <?php echo $ser_data['service_name'];?>
                        </td>
                        <td>
                            <img src="../images/icon/<?php echo $serimg;?>" id="ser_img" width="60px" height="50px"/>
                        </td>
                        <td class="process">
                            <?php echo $seramt;?>
                        </td>
                        <td style="border-top:0px;text-align:right;">
                            <button class="btn btn-sm btn-success btn-inline sedit" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit" value="<?php echo $rid; ?>"><i class='fas fa-edit'></i></button><a>
                            <button class="btn btn-sm btn-danger btn-inline sdel" title="Delete" value="<?php echo $rid; ?>"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    <?php
                        }}
                        else
                        { ?>
                    <tr>
                        <td colspan="5" style="text-align:center">No service Category</td>
                    </tr>
                    <?php } ?>
                                             
                    </tr>
                        <?php
                            } 
                        ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="col" id="add-service" style="display:none">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Service</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <form action="#" name="service-upload" method="post" enctype="multipart/form-data">
                                <td><input type="text" class="form-control" required="" id="service"></input></td>
                                <td>
                                  <div class="dropdown">
                                      <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="sc" id="service_id" required="">
                                      <span class="caret-dropdown-menu"></span>
                                      <option value="">-Select Category-</option>
                                      <?php
                                          $service_category="SELECT * FROM tbl_service_category WHERE is_delete=1";
                                          $sc_result=mysqli_query($con,$service_category);
                                          while($data_sc=mysqli_fetch_array($sc_result))
                                          {
                                            echo "<option value='".$data_sc['sc_id']."'>" .$data_sc['sc_name'] ."</option>";
                                          }
                                       ?>
                                    </div>
                                </td>
                                <td><input type="file" name="scImage" id="sc-img" accept="image/icon/*" /></td>
                                <td><input type="text" class="form-control" required="" id="ser-amt"></input></td>
                                <td style="border-top:0px;text-align:center;">
                                  <button class="btn btn-sm btn-primary" type="submit" style="padding-top: 3px; padding" id="service-submit" name="insert_serv" title="Upload/View data"><i class="fa fa-upload"></i></button>
                                </td>
                              </tr>
                            </thead>
            </table>
        </div>
    </div>
    <br>
    <div class="col" id="del-ser" style="display:none">
        <table class="table table-data3" id="del-service-body">
            <thead>
                <tr>
                    <th>Service Category</th>
                    <th>Service</th>
                    <th>Image</th>
                    <th>Rate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $ct_query=mysqli_query($con,"select * from tbl_services where is_delete=0");
                        if(mysqli_num_rows($ct_query)>0){
                        while($ct=mysqli_fetch_array($ct_query))
                        {
                            $scid=$ct['sc_id'];
                            $servi=mysqli_query($con,"select * from tbl_service_category where sc_id=$scid");
                            $sc=mysqli_fetch_array($servi);
                            echo $sc['sc_name'];
                       
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $ct['service_name'];
                        ?>
                    </td>
                    <td>
                        <img src="../images/icon/<?php echo $ct['service_img'];?>" id="del-ser-img" width="60px" height="50px"/>
                    </td>
                    <td>
                        <?php
                            echo $ct['service_amt'];
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success btn-inline ser-restore" title="Restore">Restore</button>
                    </td>
                </tr>
                <?php
                 }}
                 else{
                ?>
                <tr>
                    <td colspan="5" style="text-align:center">No deleted services</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>

  
<script>
  

    // Service Management
$(document).on('click','#new-service',function()
{
  $('#add-service').css("display","inline");
  $("#service-submit").on('click',function(){
    var name_ser= $('#service').val();
    // var name_ser = $("#service").val();
    var ser_amt=$("#ser-amt").val();
    // var ser_categ=$("#sc-name").val();
    var sercat_id=$("#service_id").val();
    var service_img = document.getElementById('sc-img');
    var sc_filename = service_img.files[0].name;
    
    $.ajax({
      url: "admin_uploaddata.php",
      method:"POST",
      data :{
      service_id: sercat_id,
      service_name :name_ser,
      service_amt:ser_amt,
      // service_catogery:sercat_id,
      service_image:sc_filename
      },
      success: function(data){
        // alert(data)
        $('#add-service').html(data);
        
      }
    });
  });
});

// End Edit services

// Edit Service
$(document).on('click','.sedit',function(){
  $('#add-service').css("display","inline");
    var btnval=$(this).val();
    var oldserv=$(this).closest('tr').find('td:eq(1)').text();
    oldser=oldserv.trim();
      $("#service-submit").on('click',function()
      {
        var ser_name = $("#service").val();
        var ser_amte=$("#ser-amt").val();
        // var ser_categ=$("#sc-name").val();
        var serv_id=$("#service_id").val();
        var service_img = document.getElementById('sc-img');
        var ser_filename = service_img.files[0].name;
        $.ajax({
          url: "admin_uploaddata.php",
          method:"POST",
          data :{
          serv_name : ser_name,
          serv_amount : ser_amte,
          serv_img : ser_filename,
          serv_id : serv_id,
          oldscid :btnval,
          oldserv : oldser
          },
          success: function(data){
            // alert(data)
            $('#add-service').html(data);
          }
      });
    });
});

// end of edit service

// Delete Services

$(document).on('click','.sdel',function(){
    var id=$(this).val();
    var sname=$(this).closest('tr').find('td:eq(1)').text();
    var snam=sname.trim();
    var samount=$(this).closest('tr').find('td:eq(3)').text();
    var samt=samount.trim();
    $.ajax({
          url: "admin_uploaddata.php",
          method:"POST",
          data :{
          ser_nam :snam,
          ser_amt : samt,
          sid : id
          },
          success: function(data){
            // alert(data);
          }
      });
    
});
// End delete service

// Restore deleted Services
    $(document).on('click','.del',function(){
        $('#add-service').css('display','none');
        $('#del-ser').css('display','inline');
        $('.ser-restore').on('click',function()
        {
            var categ= $(this).closest('tr').find('td:eq(0)').text();
            var serv=$(this).closest('tr').find('td:eq(1)').text();
            var cat=categ.trim();
            var ser=serv.trim();

            $.ajax({
                url: "admin_uploaddata.php",
                method:"POST",
                data :{
                    rcate :cat,
                    rser:ser
                    },
                success: function(result){
                   alert(result); 
                }
            });

        }); 
    });

</script>
</body>
</html>