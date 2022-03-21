<?php
    require_once("components/head.php");

    $_SESSION['s_login']    = $_POST['login'];
    $_SESSION['signed']     = $_POST['signed'];

    $error_message          = "";
    $user_error             = ""; 
    $login_error            = (strlen(trim($_POST['login'])) != 0) || !isset($_POST['login']) ? "" : "Login field is empty";
    $password_error         = (strlen(trim($_POST['password'])) != 0) || !isset($_POST['password']) ? "" : "Password field is empty";
 
    if (isset($_POST['login']) && isset($_POST['password'])) {

        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $result = $connection->query(

            "SELECT * FROM `user` 
            WHERE `login` = '$login' AND `password` = '$password'");
        
        if (mysqli_num_rows($result) == 1) {

            if (isset($_POST['signed'])) {

                setcookie("login", $login, time() + 2592e4);
                setcookie("password", $password, time() + 2592e4);

            } else {

                $_SESSION['login']    = $login;
                $_SESSION['password'] = $password;
                
            }

            unset($_SESSION['s_login']);
            unset($_SESSION['signed']);
            header("Location: index.php");
            
        } else {
            $user_error = "User is not exist";
        }
    }

    $error_array = array($login_error, $password_error, $user_error);
    for ($i = 0; $i < count($error_array); $i++) {
        if (strlen($error_array[$i]) > 0) {
            $error_message = $error_array[$i];
            break;
        }
    }    
?>
<div class="login">
    <div class="container">
        <div class="login__content">
            <div class="login__form">
                <div><?php echo $error_message; ?></div>
                <form action="login.php" method="POST">
                    <div class="login__field-title">
                        Login
                    </div>
                    <input type="text" name="login" value="<?php echo $_SESSION['s_login'] ?>"/>
                    <div class="login__field-title">
                        Password
                    </div>
                    <input type="password" name="password" />
                    <div class="login__checkbox">
                        <input type="checkbox" name="signed" <?php if(isset($_SESSION['signed'])) echo "checked"; ?>/>
                        <span>Stay signed in</span>
                    </div>
                    <input type="submit" name="submit" value="Log in" />
                </form>
            </div>

        </div>
    </div>
</div>

<?php
    require_once("components/foot.php");
?>   
