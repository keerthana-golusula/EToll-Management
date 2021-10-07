<?php

$conn=oci_connect('scott','saini','localhost/saini');
if(!$conn)
    echo "database connection failed";
?>