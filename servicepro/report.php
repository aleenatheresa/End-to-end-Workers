<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$sid=$_SESSION['sp'];
if(isset($_POST['report']))
{
    $re=$_POST['report'];
    $date=$_POST['date'];
    $rep=mysqli_query($con,"INSERT INTO `tbl_report`(`report`, `sp_id`, `wdate`) VALUES ('$re',$sid,'$date')")or die("hii");
    echo "<h4>Sucessfully sent Report</h4>";
}

if(isset($_POST['d']))
{
    $date=$_POST['d'];
    $_SESSION['d']=$date;
    $rpt=mysqli_query($con,"select * from tbl_report where wdate like '%$date%'");
    ?>
    <table class="table table-borderless">
                <thead class="thead-dark">
                    <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    if(mysqli_num_rows($rpt)>0)
    {
        while($r=mysqli_fetch_array($rpt))
        {
            ?>
                    <tr>
                        <td><?php echo $r['wdate']?></td>
                        <td><a href="../rpt.php" onClick="doprint();">Report</a></td>
                    </tr>
            <?php
        }
    }
    else{
    ?>              <tr>
                        <td colspan="2" style="text-align:center;">No Reports Found </td>
                    </tr>
    
                </tbody>
            </table>
    <?php
    }
}
?>
