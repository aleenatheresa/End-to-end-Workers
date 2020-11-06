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
?>


