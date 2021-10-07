<?php
$user = $_POST['username'];
$age =$_POST['age'];
    if($age<18)
    {
      echo "not a valid user";  
    }
else{
    echo "welcome" .$user; 
}
?>