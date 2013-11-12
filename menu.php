<meta charset="utf-8"/>
<link rel="stylesheet" href="css/menu.css"/>

<div class="floatcontainer doc_header" id="header">
    <div class="toplinks" id="toplinks">
        <ul class="nouser">
            <?php
            if (!isset($_SESSION['autorised']))
            echo '
                <li>
                    <a href="registration.php" target="_parent">Регистрация</a>
                </li>';
            ?>
            <li>
                <a href="viewforum.php" target="_parent">Список тем</a>
            </li>
            <li style="list-style: none; display: inline">
                <form id="navbar_loginform" action="auth.php" method="post" target="_parent">
                    <fieldset class="logindetails" id="logindetails">
                        <div>
                            <?php
                            if (isset($_SESSION['autorised'])) {
                                echo $_SESSION['user_nick'] . '  <input  type="submit"
                                       value="Log off" class="small-button" />';
                                $_SESSION['action'] = 'logout';
                            } else
                                echo '<input type="text" size="10" id="navbar_username" name="username"
                                           class="textbox default-value" placeholder="username"/>
                                    <input type="password" size="10" id="navbar_password" name="password"
                                           class="textbox default-value" placeholder="password"/>
                                            <input  type="submit"
                                       title="Enter your username and password in the boxes provided to login, or click the &#39;Create new account&#39; button to create a profile for yourself."
                                       value="Log in" class="small-button" />
                                       ';
                            echo "\n";
                            ?>
                        </div>
                    </fieldset>
                </form>
            </li>
        </ul>
    </div>
</div>
<header>
    <a href=index.php target="_parent"> <img src="images/head.png"></a>
</header>
