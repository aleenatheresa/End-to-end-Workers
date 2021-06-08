<?php
	session_start();
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
// echo $email;
$error="";
//  $con=mysqli_connect("localhost","root","","projectdb");
require('DbConnection.php');
	$sel_query = "SELECT * FROM `tbl_login` WHERE uname='".$email."'";
	$resultse = mysqli_query($con,$sel_query) or die($sel_query);
	$rows=mysqli_fetch_array($resultse);
	$loginid=$rows['lid'];
    $roleid=$rows['role_id'];
    if ($roleid==1){
        $email="aleenatgv@gmail.com";
    }
    elseif($roleid==2){
    $sel_query = "SELECT customer_email FROM `tbl_customer` WHERE login_id='".$loginid."'";
	$results = mysqli_query($con,$sel_query);
	$rows=mysqli_fetch_array($results);
	$email=$rows['customer_email'];
    }
    elseif($roleid==3){
        $sel_query = "SELECT employee_email FROM `tbl_employee` WHERE login_id='".$loginid."'";
        $results = mysqli_query($con,$sel_query)or die($sel_query);
        $rows=mysqli_fetch_array($results);
        $email=$rows['employee_email'];
        }
        elseif($roleid==4){
            $sel_query = "SELECT sp_email FROM `tbl_serviceproviders` WHERE login_id='".$loginid."'";
            $results = mysqli_query($con,$sel_query)or die($sel_query);
            $rows=mysqli_fetch_array($results);
            $email=$rows['sp_email'];
            }


	$row = mysqli_num_rows($resultse);
	if ($rows==""){
		$error .= "<p>No user is registered with this email address!</p>";
		$_SESSION['msg']=" No user is registered with this Username, try again. ";

		header('location:forgotemail.php');
		}

	if($error!=""){
$_SESSION['msg']=" No user is registered with this Username, try again.";
		}else{
	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = md5($email);

// Insert Temp Table
mysqli_query($con,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='Dear user,';
$output.='Please click on the following link to reset your password.';
$output.="http://localhost/End-to-end-Workers/reset-password.php?email=$email&key=$key&roleid=$roleid ";
$output.='Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.If you did not request this forgotten password email, no action
is needed, your password will not be reset. However, you may want to log into
your account and change your security password as someone may have guessed it.';
$output.='Thanks,';
$output.='End-to-end-Workers Team';
$body = $output;
$subject = "Password Recovery - End-to-end-Workers";
$to_email = $email;
$headers = "From: aleenatgv@gmail.com";

if(!mail($to_email, $subject, $body, $headers)){
echo "Mailr Error";
}else{

	$_SESSION['msg']="An email has been sent to you with instructions on how to reset your password.";
header('location:forgotemail.php');
	}

		}

}
?>