<?php
include 'connection.php';
$tollno= $_POST['tollgateno'];
$pass = $_POST['password1'];
if(!$tollno|| !$pass ){
    header("Location: index.html");
    echo '<script>';
        echo 'window.alert("enter all details")';
        echo 'document.getElementById("usersignup").style.display ="block"';
        echo '</script>';
        
}else {
    $pass=md5($pass);
    $query="insert into operator(opid,password) values('${tollno}','${pass}')";
    //$query="insert into vehicle values('123','car',0,'gsvdhgdv')";
    $result = oci_parse($conn,$query);
    $exec = oci_execute($result);
    if($exec){
    header("Location: operator.html");
}}
oci_close($conn);

?>