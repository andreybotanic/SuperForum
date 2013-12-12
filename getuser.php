<?php

header("Content-type: text/xml");
echo chr(60) . chr(63) . 'xml version="1.0" encoding="utf-8" ' . chr(63) . chr(62);
?>
<list>
<?php
  
$usrnm = isset($_GET['username']) ? urldecode($_GET['username']) : "";
$hostname = "localhost";
$username = "db";
$password = "db";
$dbName = "forum";
mysql_connect($hostname, $username, $password) OR DIE("unable to connect to database ");
mysql_select_db($dbName) or die(mysql_error());
$usrtable = "users";
$usr = mysql_query("SELECT * FROM $usrtable WHERE nick='$usrnm'");
$usr = mysql_fetch_array($usr)['nick'];
echo '<result><taken>';
if (isset ($usr)) echo 'true'; else echo 'false';
echo '</taken></result>';
?>
</list>