<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$sc=$_SESSION['sc'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    
    
</head>
<style>
body
{
    font-family:'Calisto MT';
}
#msg
{
    width:200px;
    height: 100px;
    background-color:#0a3170;
}
.asd
{
    border:2px black;
}
#rpt
{
    background-color:white;
    font-family:'Calisto MT';
}
#datepicker
{
    border: 2px solid black;
    border-radius: 4px;
}
a:hover
{
    color:black;
}
</style>
<script>
    var date=document.getElementById("datepicker").value;
    var ToDate=new Date();
    var oldyr=ToDate.getFullYear();
    var oldm=ToDate.getMonth()+1;
    var tyr=new Date(date).getFullYear();
    var tm=new Date(date).getMonth()+1;
    
</script>
<body>
    <?php
        include("header.php");
    ?>
    <div class="container">
        <div id="msg" tabindex="1" style="display:none;">
            
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Monthly Report</strong> 
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Textarea</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control" required></textarea>
                                    </div>
                                </div>
                                                
                                <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm" onclick="refreshPage()">
                                                Reset
                                            </button>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6" id="rpt">
                    <div class="row">
                        <div class="col py-3">
                            <h3><i class="fa fa-file"></i>&nbsp&nbspReport</h3> 
                        </div>
                    </div>
                    <div class="col py-3" id="dat">
                        <label for="start" style="color:black;">Select month:</label>

                        <input type="month" id="datepicker" name="start" min="2018-01" onblur="check();">
                       <span><h4></h4></span>
                    </div>

                    <div class="table table-responsive" id="report" style="display:block;">
                        <div id="report-child">
                           

                        </div>
                    </div>
            </div>
        </div>
    </div>

    <?php
        include("footer.php");
    ?>

   
<script>

function refreshPage(){
    window.location.reload();
} 
$('.submit').on('click',function(){
    var r=$('#textarea-input').val();
    
    var d=new Date().toISOString().split('T')[0];
    $.ajax({
        url: "report.php",
        method:"POST",
        data :{
        report :r,
        date:d
        },
        success: function(result){
            $('#msg').css('display','block');
            $('#msg').html(result);
            $('#msg').fadeIn().delay(500).fadeOut();
            
            
        }
    });

});
$('#datepicker').on('blur',function(){
    var date=$(this).val();
   $.ajax({
        url: "report.php",
        method:"POST",
        data :{
        d:date
        },
        success: function(data){
            $("#report").css('display','block');
            $("#report-child").html(data);
        }
   });
    
});


</script>
</body>
</html>