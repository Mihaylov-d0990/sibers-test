<?php 
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "sibers_test");

    $user_signed = false;
    $content_unavailable = false;
    if (isset($_POST['exit'])) {
        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
            setcookie("login", $result['login'], time() - 2592e4);
            setcookie("password", $result['password'], time() - 2592e4);
        } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
            unset($_SESSION['login']);
            unset($_SESSION['password']);
        }
        $user_signed = false; 
    } else {
        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
            $cookie_login    = $_COOKIE['login'];
            $cookie_password = $_COOKIE['password'];
            $result          = $connection->query("SELECT * FROM `user` WHERE `login` = '$cookie_login' AND `password` = '$cookie_password'");
            if (mysqli_num_rows($result)) $user_signed = true;

            $result = mysqli_fetch_assoc($result);
            $content_unavailable = $result['user_type'] == 2 ? true : false;
        } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
            $session_login    = $_SESSION['login'];
            $session_password = $_SESSION['password'];
            $result           = $connection->query("SELECT * FROM `user` WHERE `login` = '$session_login' AND `password` = '$session_password'");
            if (mysqli_num_rows($result)) $user_signed = true;

            $result = mysqli_fetch_assoc($result);
            $content_unavailable = $result['user_type'] == 2 ? true : false;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="head dividing">
            <div class="container">
                <div class="head__content">
                    <div class="head__controller">
                        <?php 
                            if ($user_signed) {
                                echo '
                                    <div>
                                        <a href="index.php">
                                            <img src="images/profile.svg" />
                                        </a>
                                    </div>
                                    <div>
                                        <a href="add.php">
                                            <img src="images/add.svg" />
                                        </a>
                                    </div>
                                    <form action="#" method="POST">
                                        <input type="hidden" name="exit" />
                                        <input type="image" src="images/exit.svg" />
                                    </form>';
                            }
                        ?>   
                    </div>
                </div>
            </div>
        </div>