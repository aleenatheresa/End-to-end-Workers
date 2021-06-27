<?php
session_start();
require('../DbConnection.php');
if(isset($_POST['dat']))
{
    $logid=$_POST['dat'];
    $delemp=mysqli_query($con,"update tbl_login set is_delete=0 where lid=$logid");
    echo "Blocked one employee";
}
?>