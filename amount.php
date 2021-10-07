<head>
</head>
<?php
include 'connection.php';
$v=$_GET['vid'];
$loc="";
if(!$v)
echo "sorry";
?>
<body>
      <form method="GET" action="amount.php">
     <?php   
          if(isset($_GET["pay"]))
          {
              
              $l=$_GET["l"];$d=$_GET["d"];
              $query="INSERT into pass values('${v}','${l}','${d}')";
        $res=oci_parse($conn,$query);
        $exec=oci_execute($res);
        oci_commit($conn);
              if($exec)
                  echo "<h1>payment successful</h1>";
          }
          else{
              
           ?>
          
              <input type="hidden" name="vid" value="<?php echo $v ?>">
    <label for="area">Area: </label>
<?php
        $query = "SELECT location FROM tollgate";
      $res=oci_parse($conn,$query);
      $exec=oci_execute($res);
            echo ' <select name="toll-loc" onchange=this.form.submit()>';
     echo  '<option value="places">places</option>';
while ($row = oci_fetch_array($res)) {
     echo "<option value='" . $row['LOCATION'] ."'>" . $row['LOCATION'] ."</option>";
}
echo '</select>';

    if(isset($_GET["toll-loc"]) && isset($_GET["vid"]))
          {     
        $loc=$_GET['toll-loc'];
              echo '<h3>You selected '.$loc;
        echo '</h3>';
          echo '<h4>Amount: ';
           $query1="select VTYPE from vehicle where VID='".$v."'";
$res1=oci_parse($conn,$query1);
oci_execute($res1);
$vt=oci_fetch_array($res1);
           $vt=$vt['VTYPE'];
          //$query1="select VTYPE from vehicle where VID='".$v."'";
$query2="select TID from tollgate where LOCATION='$loc'";
$res2=oci_parse($conn,$query2);
oci_execute($res2);
$l=oci_fetch_array($res2);
           $l=$l['TID'];
$query="select MONTH_PASS from charge where TID='".$l."' and VTYPE='".$vt."'";
$res3=oci_parse($conn,$query);
$exec=oci_execute($res3);
        if(!$exec){
            echo "error";
        }
$row=oci_fetch_array($res3,OCI_BOTH);
        $row[0]=3000;
echo $row[0];
           echo"</h4></br><h4>End-Date:";
           $query="select SYSDATE+30 from dual";
           $res=oci_parse($conn,$query);
           oci_execute($res);
           $d=oci_fetch_array($res);
           $d=$d['SYSDATE+30'];
           echo $d;
           echo "</h4>";
          }
            
   ?>
          </br>
    <input type="hidden" name="l" value="<?php echo $l ?>">
    <input type="hidden" name="d" value="<?php echo $d ?>">

      <input type="radio" value="make payment" name="pay" onclick=this.form.submit()>
              <label value="make payment"></label>
<?php
          }
          oci_close($conn);
     ?>
  </form>
</body>