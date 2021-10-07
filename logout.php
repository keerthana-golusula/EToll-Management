<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
print "<p align='right'>session started at".date("h:i:sa",time())."</p><br>";
print "thank you".$_SESSION['user'];
$sessiontime=time()-$_SESSION['start'];
print "<br>Your session duration:".$sessiontime."seconds";
session_destroy();
?>