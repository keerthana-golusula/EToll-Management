<?php
include 'connection.php';
echo "success";
$tid=$_POST['$tid'];
      echo "Hello ";
      echo "tollgate no: ".$tid;
      echo "Location: ";
            $query="SELECT LOCATION FROM TOLLGATE WHERE TID=".$tid;
        $res=oci_parse($conn,$query);
      $exec=oci_execute($res);
      $row=oci_fetch_array($res);
      echo $row['LOCATION'];
      
if(isset($_POST["vno"]))
            {
            echo "submitted";
            $v=$_POST["vno"];
                $query="INSERT INTO LOG VALUES('${tid}','${v}')";
            $res=oci_parse($conn,$query);
            $exec=oci_execute($res);
            $query="select vid from vehicle where vid='".$v."'";
            $res=oci_parse($conn,$query);
            $exec=oci_execute($res);
            $row=oci_fetch_array($res,OCI_BOTH);
            if($row)
            {
                $query1="SELECT TID,DATE_OF_END FROM PASS WHERE VID='".$v."'";
                $res1=oci_parse($conn,$query1);
                  $exec1=oci_execute($res1);
                $query="SELECT SYSDATE FROM DUAL";
                $res=oci_parse($conn,$query);
                  $exec=oci_execute($res);
                  $row=oci_fetch_array($res);
                  $sys=$row['SYSDATE'];
                  $row1=oci_fetch_array($res1);
                if($row){
                  while($row1){
                      if($row1['TID']==$tid && $row1['END_OF_DATE']<=$sys)
                      {
                          echo "the vehicle can go";
                          break;
                      }
                      $row1=oci_fetch_array($res1);
                  }
                  }
                else{
                    
                   
      echo '<div><iframe src="decide.php?vid='.$v.'&tid='.$tid.'"></iframe> </div>';
                }
            }
                    
                }
             ?>
      <form method="POST" action="">
      <label for="enteredvehicleno">VehicleNo:</label>
      <input type="text"id="enteredvehicleno" name="vno" placeholder="entered vehicle no" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
      <br />
          
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
          <?php 
    
            oci_close($conn);
          ?>