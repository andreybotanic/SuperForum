<?php
session_start();
$hostname = "localhost";
$username = "db";
$password = "db";
$dbName = "forum";
$dt = date('Y-m-d H:i:s');
$title = $_POST['theme_title'];
$text = $_POST['theme_text'];
$userid = $_SESSION['user_id'];

$msgtable = "messages";
$usrtable = "users";
$topicstable = "topics";
mysql_connect($hostname, $username, $password) OR DIE("unable to connect to database ");
mysql_select_db($dbName) or die(mysql_error());

$res = mysql_query("select count(1) FROM $topicstable");
$row = mysql_fetch_array($res);
$id = $row[0] + 1;

$query = "INSERT INTO $topicstable VALUES('$id','$dt','$title','$userid')";
mysql_query($query) or die(mysql_error());

$query = "INSERT INTO $msgtable VALUES('1','$id','$dt','$userid','$text')";
mysql_query($query) or die(mysql_error());

echo '<meta http-equiv="refresh" content="0;URL=viewtopic.php?topic=' .$id. '">';

?>