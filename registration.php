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
    
    <script language="javascript" type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.validpassw.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.validmail.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.validnick.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.validall.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery.typing-0.2.0.min.js"></script>
	<link rel="stylesheet" href="bootstrap-3.0.0/dist/css/bootstrap.css">
	<script language="javascript" type="text/javascript" src="bootstrap-3.0.0/dist/js/bootstrap.js"></script>
	<link rel="stylesheet" href="css/registration.css">

	
	
    <?php
    include 'menu.php';
    ?>
</head>
<body>

       
	   
	   
	  
	   
	   
	   <form class="form-horizontal" action="register.php" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Регистрейшн, десу</legend>

<!-- Text input-->
<div class="form-group">
   
  <div class="col-md-7">
  <input id="nick" name="nick" placeholder="Имя пользователя" class="form-control input-md lab" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  
  <div class="col-md-7">
  <input id="email" name="email" placeholder="E-mail" class="form-control input-md lab" required="" type="text">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
 
  <div class="col-md-7">
    <input id="password" name="password" placeholder="Пароль" class="form-control input-md lab" required="" type="password">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
 
  <div class="col-md-7">
    <input id="repeat_password" name="repeat_password" placeholder="Подтверждение пароля" class="form-control input-md lab" required="" type="password">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
 
  <div class="col-md-7">
    <input type="button" id="send" name="send" class="btn btn-success" value="Отправить"></button>
  </div>
</div>

</fieldset>
</form>

	  
	   <div class="side bn" id="inuse-nick" >
        <div class="caption ">
            <div class="arrow bnarr">
                ◀
            </div>
            <p id="bnbl" >Этот ник уже занят.</p>
        </div>
    </div>
    <div class="side bn" id="baloon-nick">
        <div class="caption">
            <div class="arrow bnarr">
                ◀
            </div>
            <p id = "bnbll">Ник не должен быть длиннее 25 символов.</p>
        </div>
    </div>

    <div class="side bp" id="baloon-pass">
        <div class="caption bps">
            <div class="arrow bparr">
                ◀
            </div>
            <p id = "bpc">Пароль должен быть не короче 6 символов и содержать хотя бы одну букву и одну цифру.</p>
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