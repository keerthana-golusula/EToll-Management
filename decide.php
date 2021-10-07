<?php
include 'connection.php';
echo "stop the vehicle and ask type of journey";
                    echo '<form method=GET action="decide.php" onchange=this.form.submit()><label for="journey">journey-type</label>
      <select id="journey" name="journey">
      <option value="one_way">one_way</option>
          <option value="up_and_down">up_down_down</option></select>
          <input type="hidden" name="vid" value="'.$v.'">
    <input type="hidden" name="tid" value="'.$t.'"></form>';
$v=$_GET['vid'];
$t=$_GET['tid'];
if(isset($_GET['journey']))
{
$query2="SELECT WALLET FROM VEHICLE WHERE VID='".$v."'";
                $res2=oci_parse($conn,$query2);
                  $exec2=oci_execute($res2);
                  $row2=oci_fetch_array($res2);
                    $b=(int)$row2["WALLET"];
$query1="SELECT VTYPE FROM VEHICLE WHERE VID='".$v."'";
                $res1=oci_parse($conn,$query1);
                  $exec1=oci_execute($res1);
                  $row1=oci_fetch_array($res1);
                    $vt=$row1["VTYPE"];
$query="SELECT ".$j." FROM CHARGE WHERE VTYPE='".$vt."' and tid=".$t;
                $res=oci_parse($conn,$query);
                  $exec=oci_execute($res);
                  $row=oci_fetch_array($res);
                    $c=(int)$row["'$j'"];
if($b>=$c)
{
    $query3="UPDATE VEHICLE SET WALLET=".($b-$c)." WHERE VID='".$v."'";
                $res3=oci_parse($conn,$query3);
                  $exec3=oci_execute($res3);
            if(!$exec)
            {
                echo "transaction not done stop";
            }
    else
    {
    echo "vehicle can go";
    }
}
else
{
    echo "stop the vehicle .collect money";
}
oci_close($conn);
    ?>