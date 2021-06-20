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
    <title>Leave Management</title>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css" type="text/css" media="all">
    
       
 
  </head>
<style>
.container
{
   
    margin-top:15px;
}
h3
{
    font-family:Helvetica ;
}
#datepicker
{
    border: 2px solid;
    width:250px;
    text-align:center;
}
.list-group
{
    font-size:18px;
    font-family:Helvetica;
    width:300px;
    
}
.list-group p
{
    
    color: white;
}
</style>
<body>
    <?php
    include("header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8" id="inp">
                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-6">
                            <p style="color:red">Select Maximum 2 dates</p>
                            <div class="py-3">
                                <h3><b>Select Leave Date</b></h3>
                            </div>
                            <!-- <form id="leave" name="lea"> -->
                                <!-- <input type="text" id="datepicker"/> -->
                                <div id="datepicker" data-date="12/03/2012"></div>
                                <input type="hidden" id="my_hidden_input">
                            <!-- </form> -->
                        </div>
                        <div class="col-md-4">
                            <div class="container" style="background-color:white;">
                                <div class="list-group">
                                    <a class="list-group-item  list-item-sm Active" href="#">Selected dates</a>
                                    <div id="date-header">
                                        <table class="list-group" id="newsample">
                                                <td></td>                  
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4 style="color:red;" id="error"></h4>
                        <div class="col-md-12" style="margin-left:60%;">
                            
                            <button type="submit" class="btn btn-primary btn-sm" id="sub" disabled>
                                Continue..
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="res" style="display:none;">
                    <div class="container" style="background-color:white;">
                                <form>
                                    <table class="table table-bordered" id="review">
                                       <thead class="thead-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Reason</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                            <tr id="tr">
                                                <td id="date"></td>
                                                <td rowspan="2"><input type="text" id="data-reason" style="width:150px;border:2px black;"></td>
                                            </tr>
                                       </tbody>    
                                                
                                    </table>
                                    
                                    <span id="reason-msg" style="color:red"></span><br>
                                    <button type="submit" class="btn btn-primary btn-sm" id="leave-apply">
                                            Apply
                                        </button> 
                            </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>

   
  
    <?php
        include("footer.php");
    ?>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>

<script>
    
   
    $('#datepicker').datepicker({
        altField: '#datepicker',
        todayHighlight: true,
        multidate:true,
        inline:true,
        dateFormat: "dd/mm/yy",
        maxDate :'+4m ',
        minDate:'-0',
        // beforeShowDay: $.datepicker.noHolidays
    });
   
    $('#datepicker').on('change',function(){
        $("#sub").prop('disabled',false);
        var d=$('#datepicker').val();
        $('#newsample').append($('<td>').html(d));
        $('#date').append($('<tr><td>').html(d));
        $('#sub').on('click',function(){
            var rowCount = $("#newsample td").length;
            if(rowCount>3)
            {
                $('#error').text("you are allowed to select max 2 dates");
                $("#sub").prop('disabled',true);
            }
            else 
            {
                $("#res").css("display","inline");
            }
            
        });
    
    });



$("#leave-apply").on('click',function(){
    // console.log("kuzhapam illa");

    if($("#data-reason").val()=="")
    {
        $("#reason-msg").text("Enter reason for leave");
    }
    else
    {
        var rea=$("#data-reason").val();
        var dat=$("#date").text();
        var f=$("#date").find("tr:eq(0)").text();
        var first = f.split("/").reverse().join("-");
        var s=$("#date").find("tr:eq(1)").text();
        var second = s.split("/").reverse().join("-");
        if(second=="")
        {
            second=first;
        }
        $.ajax({
            url:"leave_reason.php",
            method:"GET",
            data :{
                sd :1,
                fdate:first,
                sdate:second,
                lreason:rea
                },
            success: function(data){
                alert(data);
                // $("#reason-msg").html(data);
                
                }
        });

    }
});
</script>
  </body>
</html>