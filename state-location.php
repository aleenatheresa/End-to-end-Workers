<?php
$con=mysqli_connect("localhost","root","","projectdb");

if(!empty($_POST["dist_id"]))
{ 
$district_id = $_POST['dist_id'];
$result = mysqli_query($con,"SELECT * FROM tbl_location where district_id =$district_id and is_delete=1;");
if(mysqli_num_rows($result) > 0) 
{ 
  echo '<option value="">Select location</option>'; 
  while($row = mysqli_fetch_array($result))
  {
  $id=$row['location_id'];
  $location=$row['location'];
  echo "<option value='".$id."'>" .$location ."</option>";
  }
}
}


if(!empty($_POST["sc_id"]))
{
  $ser_cat= $_POST["sc_id"];
  $sql_services="select * from tbl_services where sc_id=$ser_cat and is_delete=1";
  $sc_query=mysqli_query($con,$sql_services);
  if(mysqli_num_rows($sc_query)>0)
  {
    echo '<option value="">Select Service</option>'; 
  while($row1 = mysqli_fetch_array($sc_query))
  {
  $ser_id=$row1['service_id'];
  $serv=$row1['service_name'];
  echo "<option value='".$ser_id."'>" .$serv ."</option>";
  }
  }

}
?>


