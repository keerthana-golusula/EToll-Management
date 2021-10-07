<?php
include 'connection.php';
$loc="";
?>
<form>
      <form method="GET" action="amount.php">
          <input type="hidden" name="vid" value="<?php echo $v ?>">
    <label for="area">Area: </label>
  <?php  
      $query = "SELECT location FROM tollgate";
      $res=oci_parse($conn,$query);
      $exec=oci_execute($res);
            echo ' <select name="toll-loc" onchange=this.form.submit()>';

while ($row = oci_fetch_array($res)) {
     echo "<option value='" . $row['LOCATION'] ."'>" . $row['LOCATION'] ."</option>";
}
echo '</select>';

    if(isset($_GET["toll-loc"]) && isset($_GET["vid"]))
          {     
        $loc=$_GET['toll-loc'];
              echo '</br>You selected '.$loc;
          echo '</br><h4>Amount: ';
           $query1="select VTYPE from vehicle where VID='AP28DU2131'";
$res1=oci_parse($conn,$query1);
oci_execute($res1);
$vt=oci_fetch_array($res1);
           $vt=$vt['VTYPE'];
          $query1="select VTYPE from vehicle where VID='AP28DU2131'";
$query2="select TID from tollgate where LOCATION='$loc'";
$res2=oci_parse($conn,$query2);
oci_execute($res2);
$l=oci_fetch_array($res2);
           $l=$l['TID'];
$query="select MONTH_PASS FROM charge where TID='$l' and VTYPE='$vt'";
$res=oci_parse($conn,$query);
oci_execute($res);
$r=oci_fetch_array($res);
$r=$r['MONTH_PASS'];
echo $r;
           echo"</h4></br><h4>End-Date:";
           $query="select SYSDATE+30 from dual";
           $res=oci_parse($conn,$query);
           oci_execute($res);
           $d=oci_fetch_array($res);
           $d=$d['SYSDATE+30'];
           echo $d;
           echo "<h4>";
          }
            
?>
      </form>   
      <input type="button" value="make payment" onclick="func()">
    <script type="application/javascript">
    function func(){
        window.alert("hi");
        <?php
        $query="INSERT into pass values('${v}','${l}','${d}')";
        $res=oci_parse($conn,$query);
        oci_execute($res);
        oci_commit($conn);
        ?>
    }
    
    </script>
  </form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
