<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Супер Форум</title>
    <link rel="stylesheet" href="css/viewtopic.css"/>
    <link rel="stylesheet" href="css/newpost.css"/>
    <script language="javascript" type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.send.js"></script>
</head>
<body>
<iframe src="menu.html" seamless scrolling="no" class="menu"></iframe>
<br><br>



<?php
$hostname = "localhost";
$username = "db";
$password = "db";
$dbName = "forum";
$dt = date('Y-m-d H:i:s');
$numposts = 3;

$msgtable = "message";
$usrtable = "users";
$page = isset($_GET['page']) ? $_GET['page'] : 1 ;

mysql_connect($hostname,$username,$password) OR DIE("unable to connect to database ");
mysql_select_db($dbName) or die(mysql_error());


$result = mysql_query("select count(1) FROM $msgtable ");
$row = mysql_fetch_array($result);
$total = $row[0];
if ($page > $total/$numposts) $page = $total/$numposts;
$first = ($page -1 )*$numposts;
$num = $first;

$query = "SELECT * FROM $msgtable LIMIT $first,$numposts";
$posts = mysql_query($query) or die(mysql_error());



echo "<nav><ul>";
echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=1\"><<</a>
            </div>
        </li>";
for ($n = $page - 3; $n <= $page + 3 ; $n++)
{
    if (($n * $numposts <= $total+$numposts-1 )  && $n > 0)
    {
        if ($n == $page)
         echo " <li>
            <div class=\"pagelink curpage\">
                <a href=\"/viewtopic.php?page=".$n."\">".$n."</a>
            </div>
        </li>";
        else
            echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=".$n."\">".$n."</a>
            </div>
                 </li>";
    }
}
echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=".$total/$numposts."\">>></a>
            </div>
        </li>";
echo "</ul></nav><br><div class=\"q\"></div>";



  while ($row=mysql_fetch_array($posts)) {
  $id =$row['id'];
  $usrqw = "SELECT * FROM $usrtable WHERE id=$id" ;
  $usr = mysql_fetch_array(mysql_query($usrqw)) or die(mysql_error());
    echo "<div class=\"post\">
    <div class=\"bgr\">
        <div class=\"postheader\">
            <div class=\"headertext\">
                <div class=\"time\">"
                    .$row['date'].
               "</div>
                <div class=\"postlink\">"
                         ."#".($num+1).
                "</div>
            </div>
        </div>
    </div>
    <div class=\"postbody\">
        <div class=\"userbox\">
            <div class=\"userinfo\">
                <a href=\"\" class=\"link\">
                    <img src=\"images/".$usr['avatar']."\">
                    <div class=\"image-info\">"
                            .$usr['nick'].
                   "</div>
                </a>
            </div>
        </div>
        <div class=\"message\">"
           .$row['text'].
        "</div>
        <div class=\"postbar\">
            <a  class=\" button respond\">Ответить</a>
        </div>
    </div>
</div>
";
 $num += 1;
  }


echo "<nav><ul>";
echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=1\"><<</a>
            </div>
        </li>";
for ($n = $page - 3; $n <= $page + 3 ; $n++)
{
    if (($n * $numposts <= $total+$numposts-1 )  && $n > 0)
    {
        if ($n == $page)
            echo " <li>
            <div class=\"pagelink curpage\">
                <a href=\"/viewtopic.php?page=".$n."\">".$n."</a>
            </div>
        </li>";
        else
            echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=".$n."\">".$n."</a>
            </div>
                 </li>";
    }
}
echo " <li>
            <div class=\"pagelink\">
                <a href=\"/viewtopic.php?page=".$total/$numposts."\">>></a>
            </div>
        </li>";
echo "</ul></nav><br><br><div class=\"q\"></div>";

mysql_close();
?>


<a  id ="sendbtn" class=" button respond">Ответить</a>

<div id = "last">

</div>

<script>
    $(document).ready(function() {
        $("#sendbtn").send();
       });
</script>
<iframe src="footer.html" seamless scrolling="no"></iframe>
</body>
</html>