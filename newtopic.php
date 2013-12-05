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
echo "<script>
    jQuery(document).ready(function () {
        $(\"#name\")
    .keyup(function () {
        $.ajax({
                    url: \"getposts.php?title=\"+encodeURI($(\"#name\").val()),
                    caching : false,
                    dataType: \"xml\",
                    success: function (xmlResponse) {
                    var re = $(\"post\", xmlResponse).map(function () {
                    return {
                        value: $(\"title\", this).text(),
                                creator: $(\"creator\", this).text(),
                                date: $(\"date\", this).text(),
                                topic: $(\"id\", this).text()
                            };
                        }).get();
            $(function () {

                $(\"#name\").autocomplete({
                minLength: 1,
                                source: re
                            }).data(\"ui-autocomplete\")._renderItem = function (ul, item) {
                    var inner_html = '<a href = \"viewtopic.php?topic=' + item.topic + '\" target=\"_blank\">' + '<b>' + item.value + '</b> (created by <b>' + item.creator + '</b> on <b>' + item.date + ')</b></a>';
                    return $(\"<li></li>\")
                    .data(\"item.autocomplete\", item)
                    .append(inner_html)
                    .appendTo(ul);
                };
                        });
        }
                });
            });
});

</script>\n";

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