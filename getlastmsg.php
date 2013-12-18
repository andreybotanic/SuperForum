<?php
header("Content-type: text/xml");
echo chr(60) . chr(63) . 'xml version="1.0" encoding="utf-8" ' . chr(63) . chr(62);
?>

<?php
session_start();

$hostname = "localhost";
$username = "db";
$password = "db";
$dbName = "forum";

$msgtable = "messages";
$usrtable = "users";
$topic = isset($_GET['topic']) ? $_GET['topic'] : 1;
$id = $_SESSION['user_id'];

mysql_connect($hostname, $username, $password) OR DIE("unable to connect to database ");
mysql_select_db($dbName) or die(mysql_error());

$query = "SELECT *
FROM $msgtable
WHERE topic_id =$topic
AND creator =$id
ORDER BY creationdate DESC
LIMIT 0 , 1";

$posts = mysql_query($query) or die(mysql_error());

while ($row = mysql_fetch_array($posts)) {


    echo '<post>';
    $creator = $id;
    $usr = mysql_query("SELECT * FROM $usrtable WHERE id=$id");
    $usra = mysql_fetch_array($usr)['avatar'];
    $usr = mysql_fetch_array($usr)['nick'];

    $dt = $row['creationdate'];
    $num = $row['message_id'];
    echo '<text>' . htmlspecialchars($row['text']) . '</text>';
    echo '<creator>' . htmlspecialchars($usr) . '</creator>';
    echo '<date>' . htmlspecialchars($dt) . '</date>';
    echo '<num>' . htmlspecialchars($num) . '</num>';
    echo '<avatar>' . htmlspecialchars($usra) . '</avatar>';
    echo '</post>';


}

mysql_close();

?>

