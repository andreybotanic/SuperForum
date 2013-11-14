<?php
session_start();
if (isset($_SESSION['autorised']))
    echo '<meta http-equiv="refresh" content="0;URL=/viewforum.php">';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        Регистрация
    </title>
    <link rel="stylesheet" href="css/registration.css">
    <?php
    include 'menu.php';
    ?>
</head>
<body>
<div class="dives">
    <div class="frame">
        <?php
        if (isset($_SESSION['incorr']))
        echo '<p align="center">Имя пользователя или пароль неверны</p>';
        ?>
        <form action="auth.php" method="post">
            <div class="field">
                <p class="label">Ник</p>
                <input type="text" class="lab" id="nick" name="username">
            </div>
            <div class="field">
                <p class="label">Пароль</p>
                <input type="password" class="lab" id="password" name="password">
            </div>
            <input type="submit" class="button bb" value="Войти" id="send" >
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>