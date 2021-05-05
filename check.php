<?php
if (isset($_GET['licensce'])){
	$licensce = $_GET['licensce'];
	// require('tables.php');
	$con=mysqli_connect("localhost","root","","projectdb") or die("connection moonchi");
	$sql="select * from tbl_serviceproviders where lisenceno = '$licensce'";
	$result=mysqli_query($con,$sql)or die("query moonchi");
	$n=mysqli_num_rows($result);
	if ($n>0)
		die("TRUE");
	else die("user row illaathe moonchi");
} else die('user moonchal');
?>
