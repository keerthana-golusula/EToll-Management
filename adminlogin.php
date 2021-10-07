<?php
$pass=$_POST['admin-password'];
echo " sucess";
if(!$pass){
    header("location: index.html");
    echo "notsucces";
}
if($pass == '1234')
{
    header("Location: admin.php");
}

?>