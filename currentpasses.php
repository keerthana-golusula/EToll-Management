<?php
    include 'connection.php';
        $v=$_GET['vid'];
        $q="select LOCATION,DATE_OF_END from pass,tollgate where PASS.TID=TOLLGATE.TID and vid='".$v."'";
        $res=oci_parse($conn,$q);
        $exec=oci_execute($res);
        $row=oci_fetch_array($res,OCI_BOTH);
        if(!$row)
            echo "Currently there are no passes available for your vehicle";
        else
        {
        echo "<table><tr><th>LOCATION</th><th>END DATE</th></tr> ";
            while ($row ) {
     echo "<tr><td>". $row['LOCATION'] ."</td><td>" . $row['DATE_OF_END']."</td></tr>";
            $row = oci_fetch_array($res,OCI_BOTH);
            }
        }
oci_close($conn);
?>