<?php
$u= $_POST["f_u"];
if (preg_match('/^[a-zA-Z0-9]+$/', $u))
{
$con=mysqli_connect("localhost","root","","projectdb");
if(!empty($_POST["f_u"])) {
  $query = mysqli_query($con,"SELECT * FROM `tbl_login` WHERE `uname`='" . $_POST["f_u"] . "' AND `aproval_status`=1") or die("Sign in Error");
  mysqli_close($con);
 if(mysqli_num_rows($query)){ 
     ?>
<script>
document.getElementById("fusername").style.borderColor = "green";
document.getElementById("fphno").disabled = false;
document.getElementById("npass").disabled = false;
document.getElementById("ncpass").disabled = false;
document.getElementById("msg").innerHTML = "<span></span>";
</script>
<?php
  }else{
     ?>
<script>
document.getElementById("fusername").style.borderColor = "red";
document.getElementById("fphno").disabled = true;
document.getElementById("npass").disabled = true;
document.getElementById("ncpass").disabled = true;
document.getElementById("fbutton").disabled = true;
document.getElementById("msg").innerHTML = "<span>Enter a valid Username</span>";
</script>
<?php
  }
}
}
else
{ ?>
<script>
document.getElementById("fusername").style.borderColor = "red";
document.getElementById("fphno").disabled = true;
</script>
<?php
}
?>