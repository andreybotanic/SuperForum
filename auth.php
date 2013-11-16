<?php
session_start();
if (!isset($_SESSION['autorised']))
    if (isset($_POST['username'])) {
        $hostname = "localhost";
        $username = "db";
        $password = "db";
        $dbName = "forum";
        $usrtable = "users";
        mysql_connect($hostname, $username, $password) OR DIE("unable to connect to database ");
        mysql_select_db($dbName) or die(mysql_error());

        $name = mysql_real_escape_string($_POST['username']);
        $pass = md5(mysql_real_escape_string($_POST['password']).'thisisthesalt');
        $query = "SELECT * FROM $usrtable WHERE nick='$name' AND password='$pass'";

        $res = mysql_query($query) or trigger_error(mysql_error() . $query);
        if ($row = mysql_fetch_assoc($res)) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_nick'] = $row['nick'];
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['autorised'] = 1;
            unset($_SESSION['incorr']);
            $id = $_SESSION['user_id'];
            $usrqw = "SELECT * FROM $usrtable WHERE id=$id";
            $usr = mysql_fetch_array(mysql_query($usrqw)) or die(mysql_error());
            echo '<meta http-equiv="refresh" content="0;URL='.$_SERVER['HTTP_REFERER'].'">';

            $_SESSION['numposts'] = 3;
            unset($_SESSION['incorr']);
            exit;
        } else {
            $_SESSION['incorr'] = 1;
            echo '<meta http-equiv="refresh" content="0;URL=/login.php">';
            exit;
        }

    }
if (isset($_SESSION['action']) AND $_SESSION['action'] == "logout") {
    session_destroy();
    echo '<meta http-equiv="refresh" content="0;URL=' . $_SERVER['HTTP_REFERER'] . '">';
    exit;
}
?>