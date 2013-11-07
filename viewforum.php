<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Супер Форум</title>
    <link rel="stylesheet" href="css/viewforum.css"/>
</head>
<body>
<?php
include 'menu.php';
?>
<br>
<br>
<br>
<a href="newtopic.php" class=" button create">создать новую</a>
<table>
    <col width="45%">
    <col width="20%">
    <col width="35%">
    <tr>
        <th>
            темы
        </th>
        <th>
            сообщений
        </th>
        <th>
            последнее сообщение
        </th>
    </tr>
</table>
<table>
    <col width="45%">
    <col width="20%">
    <col width="35%">
    <?php
    if (isset($_SESSION['numposts']))
        $numposts = $_SESSION['numposts'];
    else $numposts = 3;
    $hostname = "localhost";
    $username = "db";
    $password = "db";
    $dbName = "forum";
    $topicstable = "topics";
    $usrtable = "users";
    $messagetable = "messages";
    mysql_connect($hostname, $username, $password) OR DIE("unable to connect to database ");
    mysql_select_db($dbName) or die(mysql_error());
    $result = mysql_query("select count(1) FROM $topicstable");
    $row = mysql_fetch_array($result);
    $total = $row[0];
    for ($i = 1; $i <= $total; $i++) {
        $query = "SELECT * FROM $topicstable WHERE id=$i";
        $result = mysql_query($query);
        $result1 = mysql_fetch_array($result) or die(mysql_error());
        $create_id = $result1['creator'];
        $date = $result1['creationdate'];
        $name = $result1['title'];
        $query = "SELECT * FROM $usrtable WHERE id=$create_id";
        $result = mysql_query($query);
        $result2 = mysql_fetch_array($result) or die(mysql_error());
        $auth = $result2['nick'];
        $auth_ava = $result2['avatar'];
        $query = "SELECT count(1) FROM $messagetable WHERE topic_id=$i";
        $result = mysql_query($query);
        $result3 = mysql_fetch_array($result) or die(mysql_error());
        $num = $result3[0];
        $query = "SELECT * FROM $messagetable WHERE message_id=$num AND topic_id = $i";
        $result = mysql_query($query);
        $result4 = mysql_fetch_array($result) or die(mysql_error());
        $last_id = $result4['creator'];
        $last_date = $result4['creationdate'];
        $text = $result4['text'];
        if (strlen($text) >= 30)
            $text = substr($text, 0, 30) . "...";
        $query = "SELECT * FROM $usrtable WHERE id=$last_id";
        $result = mysql_query($query);
        $result5 = mysql_fetch_array($result) or die(mysql_error());
        $last = $result5['nick'];
        $last_ava = $result5['avatar'];
        $totalpages = ceil($num / $numposts);
        echo "<tr>
            <td align=\"left\">
				<div class=\"userpic\"> 
					<image src=\"images/" . $auth_ava . "\">
				</div>
				<div class=\"box\">
					<a href=\"viewtopic.php?topic=" . $i . "&page=1\" class=\"name\">" . $name . "</a>
				</div>
				<div class=\"info\">
					<a href=\"users.php?user=\">" . $auth . "</a>, " . $date . "
				</div>
			</td>
            <td><p class=\"num\">" . $num . "<p></td>
            <td align=\"left\">
				<div class=\"userpic\"> 
					<image src=\"images/" . $last_ava . "\">
				</div>
				<div class=\"box\">
					<a href=\"viewtopic.php?topic=" . $i . "&page=" . $totalpages . "\" class=\"text\">" . $text . "</a>
				</div>
				<div class=\"info\">
					<a href=\"users.php?user=" . $last_id . "\">" . $last . "</a>, " . $last_date . "
				</div>
			</td>
        </tr>";
    }
    ?>
</table>
<iframe src="footer.html" seamless scrolling="no"></iframe>
</body>
</html>