<?php
require __DIR__.'/pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();


session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('DbConnection.php');
$date=$_SESSION['d'];
$rpt=mysqli_query($con,"select * from tbl_report where wdate like '%$date%'");


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
      padding: 10px;
      width: 100%;
    }
    #size
    {
        
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
    <table>
    <tr>
    <td style="width:650px;text-align: center;"><h4>Monthly Report</h4></td>
    <td colspan="2"></td>
    </tr></table>';
    $html.='<table>';
    if(mysqli_num_rows($rpt)>0)
    {
        while($r=mysqli_fetch_array($rpt))
        {
            $html.='<tr>
                        <th style="width:600px;text-align: right;"></th></tr>
                    <tr>
                        <td style="width:600px;text-align: right;">'.$r['wdate'].'</td>
                       
                    </tr>
                    <tr>
                    <th style="width:500px;text-align: center;height:5px;">Report</th>
                    </tr>
                    <tr> <td style="width:500px;text-align: center;">'.$r['report'].'</td></tr>';
                    
            
        }
    }
    else{
    $html.='<tr>
    <td colspan="2" style="text-align:center;">No Reports Found </td>         
    </tr>';}
    $html.='</table>
    
  </div>
    </body>
    </html>
';
$html2pdf->writeHTML($html);
$html2pdf->output();
?>