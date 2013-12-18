<?php
session_start();
$hostname = "localhost";
$username = "db";
$password = "db";
$dbName = "forum";

$id = $_SESSION['user_id'];
$msg = $_POST['msg'];
$topic = $_POST['topic'];
$page =  $_POST['page'];
$dt = date('Y-m-d H:i:s');
$msgtable = "messages";

if (isset($_SESSION['numposts']))
    $numposts = $_SESSION['numposts'];
else $numposts = 3;


mysql_connect($hostname,$username,$password) OR DIE("unable to connect to database");
mysql_select_db($dbName) or die(mysql_error());
$result = mysql_query("select count(1) FROM $msgtable where topic_id = $topic");
$row = mysql_fetch_array($result);
$total = $row[0] + 1;

$query = "INSERT INTO $msgtable VALUES('$total','$topic','$dt','$id','$msg')";
mysql_query($query) or die(mysql_error());

$totalpages = ceil($total/$_SESSION['numposts']);

//echo '<meta http-equiv="refresh" content="0;URL=/viewtopic.php?page='.$totalpages.'&topic='.$topic.'">';
//echo 'press here to <a href=/viewtopic.php?page='.$totalpages.'&topic='.$topic.'>return</a>';
mysql_close();

if  ($page ==  $totalpages && $total/$numposts <=  $totalpages) echo "yes"; else echo $totalpages;
?>



