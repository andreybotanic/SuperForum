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
<?php
include 'menu.php';
?>
</head>
<body>
<?php
if (isset($_SESSION['autorised'])) {
    echo '
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
</div> ';

    $hostname = "localhost";
    $username = "db";
    $password = "db";
    $dbName = "forum";
    mysql_connect($hostname, $username, $password) OR DIE("unable to connect to database ");
    mysql_select_db($dbName) or die(mysql_error());
    $topicstable = "topics";
    $usrtable = "users";
    $query = "SELECT * FROM $topicstable";
    $result = mysql_query($query);
    echo "<script>
$(function() {

    $(\"#name\").autocomplete({
        source: [";

    while ($topics = mysql_fetch_array($result)) {
        $creator = $topics['creator'];
        $usr = mysql_query("SELECT * FROM $usrtable WHERE id=$creator");
        $usr = mysql_fetch_array($usr)['nick'];
        $dt = $topics['creationdate'];
        echo "\n{\n" . 'topic : "' . $topics['id'] . "\",\n" . ' value : "' . $topics['title'] . "\",\n" . 'creator : "' . $usr . '",' . "\n date: \"" . $dt . "\"\n},";
    }
    echo "\n]
    }).data( \"ui-autocomplete\" )._renderItem = function( ul, item ) {
        var inner_html = '<a href = \"viewtopic.php?topic='+  item.topic +'\" target=\"_blank\">' + '<b>'+item.value + '</b> (created by <b>' +item.creator + '</b> on <b>' +item.date+ ')</b></a>';
        return $( \"<li></li>\" )
            .data( \"item.autocomplete\", item )
            .append(inner_html)
            .appendTo( ul );
    };
});
</script>";
} else echo "
<div class=\"post\">
    <div class=\"bgr\">
        <div class=\"postheader\">
        </div>
    </div>
    <div class=\"postbody notlogpost\">
        <div class = \"notloginfo\">you're not autorised!</div>
    </div>
</div> ";

include 'footer.php';
?>
</body>
</html>