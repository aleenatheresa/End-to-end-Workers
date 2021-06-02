<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
$sc=$_SESSION['sc'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Report</title>
    
</head>
<style>
body
{
    font-family : 'Poppins';
}
</style>
<body>
    <?php
        include("header.php");
    ?>
    <div id="msg" tabindex="1">

    </div>
    <center>
    <div class="container">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Weekly Report</strong> 
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Textarea</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                </div>
                            </div>
                                            
                            <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm submit">
                                             Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                             Reset
                                        </button>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</center>
    <?php
        include("footer.php");
    ?>
<script>
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
            $('#msg').html(result);
            alert(result);
        }
    });

});

</script>
</body>
</html>