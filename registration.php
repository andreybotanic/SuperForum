<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        Регистрация
    </title>
    <link rel="stylesheet" href="css/registration.css">
    <script language="javascript" type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.validpassw.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.validmail.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.validnick.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.validall.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery.typing-0.2.0.min.js"></script>
	
    <?php
    include 'menu.php';
    ?>
</head>
<body>
<div class="dives">
    <div class="frame">
        <p align="center">Все поля обязательны для заполнения</p>
        <form action="register.php" method="post">
            <div class="field">
                <p class="label">Ник</p>
                <input type="text" class="lab" id="nick" name="nick">
            </div>
            <div class="field">
                <p class="label">E-mail</p>
                <input type="text" class="lab" id="email" name="email">
            </div>
            <div class="field">
                <p class="label">Пароль</p>
                <input type="password" class="lab" id="password" name="password">
            </div>
            <div class="field">
                <p class="label">Подтверждение пароля</p>
                <input type="password" class="lab" id="repeat_password" name="repeat_password">
            </div>
            <input type="button" class="button bb" value="Регистрация" id="send">
        </form>
    </div>
    <div class="side bn" id="inuse-nick" >
        <div class="caption">
            <div class="arrow bnarr">
                ◀
            </div>
            <p>This username is already in use.</p>
        </div>
    </div>
    <div class="side bn" id="baloon-nick">
        <div class="caption">
            <div class="arrow bnarr">
                ◀
            </div>
            <p>Ник не должен быть длиннее 25 символов.</p>
        </div>
    </div>

    <div class="side bp" id="baloon-pass">
        <div class="caption">
            <div class="arrow bparr">
                ◀
            </div>
            <p>Пароль должен быть не короче 6 символов и содержать хотя бы одну букву и одну цифру.</p>
        </div>
    </div>
</div>
<script>
	$(document).ready(function() {
    nickok = false;
    $(this).validall();
    });
</script>
<?php
include 'footer.php';
?>
</body>
</html>