<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");

if(!empty($_POST["id"])) {
    $value= $_POST["id"];
    $sql_service="select * from tbl_services where sc_id= ".$value."";
    $service_query=mysqli_query($con,$sql_service);
    while($row=mysqli_fetch_array($service_query))
    {
        // $row=mysqli_fetch_array($service_query);
        $service_id=$row['service_id'];
        $name=$row['service_name'];
        $img=$row['service_img'];
        // $jsonResponse=json_encode($service_id);
    ?>
    <div class="column" style="margin-left:10px;margin-top:15px">
        <div class="card" style="width: 15rem; display:block;">
        <img src="images/icon/<?php echo $img;?>" class="card-img-top" alt="8.jpg" width="60px" height="180px">
        <div class="card-body">
            <button type="button" class="btn btn-link btn-lg bkser" data-toggle="modal" data-target="#myModal" id="<?php echo $service_id ?>"value="<?php echo $service_id; ?>"><?php echo $name; ?>
            </button>
        </div>
     </div>
    </div>
    <?php
}
}
?>

