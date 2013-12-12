<?php
header("Content-type: text/xml");
echo chr(60) . chr(63) . 'xml version="1.0" encoding="utf-8" ' . chr(63) . chr(62);
?>
<list>
    <?php
    $ttl =  isset($_GET['title']) ? urldecode($_GET['title']): "";
    $hostname = "localhost";
    $username = "db";
    $password = "db";
    $dbName = "forum";
    mysql_connect($hostname, $username, $password) OR DIE("unable to connect to database ");
    mysql_select_db($dbName) or die(mysql_error());
    $topicstable = "topics";
    $usrtable = "users";
    $query = "SELECT * FROM $topicstable WHERE title LIKE '%$ttl%' ";
    $result = mysql_query($query);

    while ($topics = mysql_fetch_array($result)) {
        echo '<post>';
        $creator = $topics['creator'];
        $usr = mysql_query("SELECT * FROM $usrtable WHERE id=$creator");
        $usr = mysql_fetch_array($usr)['nick'];
        $dt = $topics['creationdate'];
        echo '<title>' . htmlspecialchars($topics['title']) . '</title>';
        echo '<creator>' . htmlspecialchars($usr) . '</creator>';
        echo '<date>' . htmlspecialchars($dt) . '</date>';
        echo '<id>' . htmlspecialchars($topics['id']) . '</id>';
        echo '</post>';
    }

    ?>
</list>