<?php
$hostname = "localhost";
$username = "db";
$password = "db";
$dbName = "forum";

$id = 2;
$msg = $_POST['msg'];
$dt = date('Y-m-d H:i:s');
$userstable = "message";


mysql_connect($hostname,$username,$password) OR DIE("unable to connect to database");
mysql_select_db($dbName) or die(mysql_error());

$query = "INSERT INTO $userstable VALUES('$id','$dt','$msg')";
mysql_query($query) or die(mysql_error());


echo '<meta http-equiv="refresh" content="0;URL=/viewtopic.php?page=1">';
echo "press here to <a href='/viewtopic.php?page=1'>return</a> ";
mysql_close();
?>



