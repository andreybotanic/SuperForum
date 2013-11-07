<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Супер Форум</title>
    <link rel="stylesheet" href="css/themes/base/jquery-ui.css"/>
    <link rel="stylesheet" href="css/newtopic.css"/>
    <script language="javascript" type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script src="js/ui/jquery-ui.js"></script>
</head>
<body>
<?php
include 'menu.php';
?>
<br>
<br>
<br>

<div class="post">
    <div class="bgr">
        <div class="postheader">
        </div>
    </div>
    <div class="postbody">
        <form action="post.php" method="post">
            <div class="ui-widget">
                <input name = "theme_title" type="text" class="lab htxt" placeholder="Название темы" id="name">
            </div>
            <textarea name = "theme_text" type="text" class="lab ptxt" placeholder="Текст сообщения"></textarea>
            <input type="submit" value="Создать" class="button bb">

        </form>
    </div>
</div>
<?php
$hostname = "localhost";
$username = "db";
$password = "db";
$dbName = "forum";
mysql_connect($hostname, $username, $password) OR DIE("unable to connect to database ");
mysql_select_db($dbName) or die(mysql_error());
$topicstable = "topics";
$query = "SELECT * FROM $topicstable";
$result = mysql_query($query);
echo "<script>
	$(function() {
    var Tags = [\n";
while ($topics = mysql_fetch_array($result))
    echo "\"" . $topics['title'] . "\",\n";
echo '	];
	$("#name").autocomplete({source: Tags});
	});
</script>;'
?>

<iframe src="footer.html" seamless scrolling="no"></iframe>
</body>
</html>