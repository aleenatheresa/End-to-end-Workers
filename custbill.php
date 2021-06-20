<?php
require __DIR__.'/pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();


session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('DbConnection.php');
    $bk= $_SESSION['bk'];
    // $cnam=$_SESSION['cname'];
    // $cemai=$_SESSION['cemail'];
    $rpt=mysqli_query($con,"select * from tbl_booking where booking_id=$bk");


    $html='
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
       <style>
			body {
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}
            .outerDiv
			{
				background-color: #ffffff;
				height: 10%;
				width: 100%;
				margin: 0px auto;
				padding: 5px;
                
			}
			.invoice-box {
				max-width: 100%;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				color: #555;
			}

			.invoice-box table {
				width: 65%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
                margin-left:100px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
                
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
               
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
              
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: right;
				}
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
    <div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>';
                while($r=mysqli_fetch_array($rpt))
                    {
                        $bkid=$r['booking_id'];
                        $ser=$r['service_id'];
                        $datee=$r['booked_on'];
                        $cmplt=$r['end'];
                        $sername=mysqli_query($con,"select * from tbl_services where service_id=$ser");
                        $s=mysqli_fetch_array($sername);
                        $sname=$s['service_name'];
                        $id=$s['service_amt'];
            $html.='<tr>
                        <td>
                            Booking #: '.$r['booking_id'].'</td></tr>
                      <tr>  <td> Created: '.date('d/m/y').'</td></tr>
                        <tr>   <td> Due:'.date('d/m/y').'</td></tr>
                        
                   
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                           
                        </td>

                        <td>
                           
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Payment Method</td>

            <td>Card #</td>
        </tr>

        <tr class="details">
            <td>Card</td>

            <td>'.$s['service_amt'].'</td>
        </tr>

        <tr class="heading">
            <td>Service</td>

            <td>Amount</td>
        </tr>
        <tr class="details">
        <td>'.$s['service_name'].'</td>

        <td>'.$s['service_amt'].'</td>
    </tr>

        <tr class="total">
            <td></td>

            <td>Total:'.$s['service_amt'].' </td>
        </tr>
    ';
      }
    $html.='</table>
    </div>
    </body>
    </html>
';
$html2pdf->writeHTML($html);
$html2pdf->output();
?>