<?php
$hostname = "localhost";
$username = "db";
$password = "db";
$dbName = "forum";
$userstable = "users";
$date = date('Y-m-d H:i:s');
$avatar = "default.png";
$nick = $_POST['nick'];
$email = $_POST['email'];
$pass = $_POST['password'];
mysql_connect($hostname,$username,$password) or die("unable to connect to database ");
mysql_select_db($dbName) or die(mysql_error());

if (strlen($nick) <= 25)
	if (preg_match('.@.', $email))
		if (preg_match('/(?!^[0-9]*$)(?!^[a-zA-Z!@#$%^&*()_+=<>?]*$)^([a-zA-Z!@#$%^&*()_+=<>?0-9]{6,})$/', $pass))
			if ($_POST['password'] == $_POST['repeat_password'])
			{
				$pass = md5($pass.'thisisthesalt');
				$result = mysql_query("select count(1) FROM $userstable ");
				$row = mysql_fetch_array($result);
				$users_num = $row[0];
				echo $users_num;
				$users_num++;
				$query = "INSERT INTO $userstable VALUES('$users_num','$nick','$pass', '$email', '$date', '$avatar')";
				mysql_query($query) or die(mysql_error());
				echo '<meta http-equiv="refresh" content="0;URL=/">';
			}
mysql_close();
?>