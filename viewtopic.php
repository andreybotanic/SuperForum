<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Супер Форум</title>
    <link rel="stylesheet" href="css/viewtopic.css"/>
    <link rel="stylesheet" href="css/newpost.css"/>
    <script language="javascript" type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.send.js"></script>
    <?php
    include 'menu.php';
    ?>
</head>
<body>
<br><br>



<?php
$hostname = "localhost";
$username = "db";
$password = "db";
$dbName = "forum";
$dt = date('Y-m-d H:i:s');
if (isset($_SESSION['numposts']))
    $numposts = $_SESSION['numposts'];
else $numposts = 3;

$msgtable = "messages";
$usrtable = "users";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$topic = isset($_GET['topic']) ? $_GET['topic'] : 1;
if (isset($_POST['inputname'])) {
    $dest = intval($_POST['inputname']);
    echo '<meta http-equiv="refresh" content="0;URL=/viewtopic.php?page=' . $dest . '&topic=' . $topic . '">';
}
mysql_connect($hostname, $username, $password) OR DIE("unable to connect to database ");
mysql_select_db($dbName) or die(mysql_error());

$result = mysql_query("select count(1) FROM $msgtable WHERE topic_id = $topic");
$row = mysql_fetch_array($result);
$total = $row[0];

$totalpages = ceil($total / $numposts);
if ($page > $totalpages) {
    $page = $totalpages;
    echo '<meta http-equiv="refresh" content="0;URL=/viewtopic.php?page=' . $page . '&topic=' . $topic . '">';
}
if ($page < 1) {
    $page = 1;
    echo '<meta http-equiv="refresh" content="0;URL=/viewtopic.php?page=' . $page . '&topic=' . $topic . '">';
}
$first = ($page - 1) * $numposts;

$query = "SELECT * FROM $msgtable  WHERE topic_id = $topic LIMIT $first,$numposts";
$posts = mysql_query($query) or die(mysql_error());


echo "<nav><ul>";
echo "<li><form  method=\"post\" name=\"formname\">
    <input  class = 'pagelink in' name=\"inputname\" type=\"text\" />
</form></li>";

echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=1&topic=" . $topic . "\"><<</a>
            </div>
        </li>";
for ($n = $page - 3; $n <= $page + 3; $n++) {
    if (($n * $numposts <= $total + $numposts - 1) && $n > 0) {
        if ($n == $page)
            echo " <li>
            <div class=\"pagelink curpage\">
                <a href=\"/viewtopic.php?page=" . $n . '&topic=' . $topic . "\">" . $n . "</a>
            </div>
        </li>";
        else
            echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=" . $n . '&topic=' . $topic . "\">" . $n . "</a>
            </div>
                 </li>";
    }
}
echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=" . $totalpages . '&topic=' . $topic . "\">>></a>
            </div>
        </li>";
echo "</ul></nav><br><div class=\"q\"></div>";


while ($row = mysql_fetch_array($posts)) {
    $id = $row['creator'];
    $num = $row['message_id'];
    $usrqw = "SELECT * FROM $usrtable WHERE id=$id";
    $usr = mysql_fetch_array(mysql_query($usrqw)) or die(mysql_error());

    //  if (isset($_SESSION['autorised'])) $btn =  '<a  class="button respond">Ответить</a>' ; else $btn = '';
    $btn = '';
    echo "<div class=\"post\">
    <div class=\"bgr\">
        <div class=\"postheader\">
            <div class=\"headertext\">
                <div class=\"time\">"
        . $row['creationdate'] .
        "</div>
         <div class=\"postlink\">"
        . "#" . $num .
        "</div>
    </div>
</div>
</div>
<div class=\"postbody\">
<div class=\"userbox\">
    <div class=\"userinfo\">
        <a href=\"\" class=\"link\">
            <img src=\"images/" . $usr['avatar'] . "\">
                    <div class=\"image-info\">"
        . $usr['nick'] .
        "</div>
     </a>
 </div>
</div>
<div class=\"message\">"
        . $row['text'] .
        "</div>
        <div class=\"postbar\">" . $btn . "</div>
    </div>
</div>
";
}


echo "<nav><ul>";
echo "<li><form  method=\"post\" name=\"formname\">
    <input  class = 'pagelink in' name=\"inputname\" type=\"text\" />
</form></li>";

echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=1&topic=" . $topic . "\"><<</a>
            </div>
        </li>";
for ($n = $page - 3; $n <= $page + 3; $n++) {
    if (($n * $numposts <= $total + $numposts - 1) && $n > 0) {
        if ($n == $page)
            echo " <li>
            <div class=\"pagelink curpage\">
                <a href=\"/viewtopic.php?page=" . $n . '&topic=' . $topic . "\">" . $n . "</a>
            </div>
        </li>";
        else
            echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=" . $n . '&topic=' . $topic . "\">" . $n . "</a>
            </div>
                 </li>";
    }
}
echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=" . $totalpages . '&topic=' . $topic . "\">>></a>
            </div>
        </li>";
echo "</ul></nav><br><div class=\"q\"></div>";


if (isset($_SESSION['autorised']))
    echo '<a  id ="sendbtn" class=" button respond">Ответить</a>';
mysql_close();

echo
'<div id = "last">

</div>';

echo '<script>
    $(document).ready(function() {
        $("#sendbtn").send(' . $topic . ');
       });
</script>';

include 'footer.php';
?>
</body>
</html>