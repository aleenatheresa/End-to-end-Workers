<?php
require __DIR__.'/pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();


// $con=mysqli_connect("localhost","root","","projectdb");
require('DbConnection.php');
$lid="";

    $html='
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
        .outerDiv
			{
				background-color: #ffffff;
				height: 10%;
				width: 100%;
				margin: 0px auto;
				padding: 5px;
			}
      .outerDiv1
    {
      background-color: #ffffff;


      margin: auto;
      width: 60%;
      padding: 10px;
    }
    </style>
    </head>
    <body>
      <div class="outerDiv">
      <table>
      <tr>
      <td style="width:150px"></td>
      <td style="width:340px;text-align: center;"><h3>End To End Workers</h3></td>
      <td style="width:230px;text-align: right;"><h5>Contact:<br>e2e@gmail.com</h5></td>
      </tr>
      </table>
      <hr>
		</div>
    <div class="outerDiv1">
    <table border="1">
    <tr>
    <td colspan="6" style="text-align: center;"><h4>Regiestered Service Providers</h4></td>
    </tr>';







    $html.='<tr>
    <td style="width:10px;text-align: center;">Name</td>
    <td style="width:50px;text-align: center;">Category</td>
    <td style="width:50px;text-align: center;">Licence No.</td>
    <td style="width:50px;text-align: center;">Phone</td>
    <td style="width:120px;text-align: center;">Email</td>
    <td style="width:150px;text-align: center;">Address</td>
   
    </tr>';

    $login_query=mysqli_query($con,"select * from tbl_login where role_id=4 and is_delete=1 and aproval_status=1")or die("hiioo");
    while($spdata=mysqli_fetch_array($login_query))
        {
            $activelogin=$spdata['lid'];
            $sp="select * from tbl_serviceproviders where login_id=$activelogin";
            $ser_pro_query=mysqli_query($con,$sp);
            $spid=mysqli_fetch_array($ser_pro_query);
            $disid=$spid['district_id']; 
            $sqldisname="select * from tbl_district where district_id=$disid";
            $disnamequery=mysqli_query($con,$sqldisname);
            $disdata=mysqli_fetch_array($disnamequery);
            $loc_id=$spid['location_id'];  
            $sql_location="select * from tbl_location where location_id=$loc_id";
            $sql_loc_query=mysqli_query($con,$sql_location);
            $loc_name=mysqli_fetch_array($sql_loc_query);
            $serv_cat= $spid['sc_id'];
            $sql_ser_cat="select * from tbl_service_category where sc_id=$serv_cat";
            $ser_cat_query=mysqli_query($con,$sql_ser_cat);
            $ser_name=mysqli_fetch_array($ser_cat_query);
    $html.='<tr>
    <td style="width:50px;text-align: center;">'.$spid['sp_name'].'</td>
    <td style="width:100px;text-align: center;">'.$ser_name['sc_name'].'</td>
    <td style="width:100px;text-align: center;">'.$spid['lisenceno'].'</td>
    <td style="width:100px;text-align: center;">'.$spid['sp_phone'].'</td>
    <td style="width:150px;text-align: center;">'.$spid['sp_email'].'</td>
    <td style="width:150px;text-align: center;">'.$spid['sp_address'].'</td>
   
    </tr>';}
    $html.='</table>
    
  </div>
    </body>
    </html>
';
$html2pdf->writeHTML($html);
$html2pdf->output();
?>