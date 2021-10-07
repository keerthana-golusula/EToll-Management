<?php
$user=$_POST['username'];
$pwd=$_POST['password'];
$table="table";
$database="example";
if($user)
{
    $conn=mysqli_connect("localhost","exampe","");
        $query="select * from $database.$table where username='$user'";
    $rows=mysqli_num_rows($query);
    
}
?>