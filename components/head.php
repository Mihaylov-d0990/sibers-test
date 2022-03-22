<?php 
    session_start();

    // Server connection

    $ip             = "localhost";
    $db_login       = "root";
    $db_password    = "";
    $data_base      = "sibers_test";

    $connection     = mysqli_connect($ip, $db_login, $db_password, $data_base);

    $user_signed = false;
    $content_unavailable = false;

    $root_url = "index.php";

    if (isset($_POST['exit'])) {

        // Log out

        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {

            setcookie("login", $result['login'], time() - 2592e4);
            setcookie("password", $result['password'], time() - 2592e4);

        } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

            unset($_SESSION['login']);
            unset($_SESSION['password']);

        }

        $user_signed = false; 

    } else {

        // Authentication verification

        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {

            $cookie_login             = $_COOKIE['login'];
            $cookie_password          = $_COOKIE['password'];
            $result                   = $connection->prepare("SELECT *, COUNT(*) AS count FROM `user` WHERE `login` = ? AND `password` = ?");

            $result->bind_param('ss', $cookie_login, $cookie_password);
            $result->execute();

            $result                   = $result->get_result();
            $result                   = $result->fetch_array(MYSQLI_ASSOC);

            if ($result['count'] != 0) $user_signed = true;

            $content_unavailable      = $result['user_type'] == 2 ? true : false;

        } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

            $session_login            = $_SESSION['login'];
            $session_password         = $_SESSION['password'];
            $result                   = $connection->prepare("SELECT *, COUNT(*) AS count FROM `user` WHERE `login` = ? AND `password` = ?");

            $result->bind_param('ss', $session_login, $session_password);
            $result->execute();
            
            $result                   = $result->get_result();
            $result                   = $result->fetch_array(MYSQLI_ASSOC);

            if ($result['count'] != 0) $user_signed = true;

            $content_unavailable      = $result['user_type'] == 2 ? true : false;
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
    <title>Sibers-test</title>
</head>
<body>
    <div class="wrapper">
        <div class="head dividing">
            <div class="container">
                <div class="head__content">
                    <div class="head__controller">
                        <?php 
                            if ($user_signed) {
                                echo "
                                    <div>
                                        <a href='$root_url'>
                                            <img src='images/profile.svg' />
                                        </a>
                                    </div>
                                    <div>
                                        <a href='add.php'>
                                            <img src='images/add.svg' />
                                        </a>
                                    </div>
                                    <form action='#' method='POST'>
                                        <input type='hidden' name='exit' />
                                        <input type='image' src='images/exit.svg' />
                                    </form>    
                                ";
                            }
                        ?>   
                    </div>
                </div>
            </div>
        </div>