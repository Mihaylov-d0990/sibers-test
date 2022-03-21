<?php
    require_once("components/head.php");
?>
<div class="main">
    <div class="container">
        <div class="main__content">
            <?php 
                $connection = mysqli_connect("localhost", "root", "", "sibers_test");
                $result;
                if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
                    $cookie_login    = $_COOKIE['login'];
                    $cookie_password = $_COOKIE['password'];
                    $result          = $connection->query("SELECT * FROM `user` WHERE `login` = '$cookie_login' AND `password` = '$cookie_password'");
                } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                    $session_login    = $_SESSION['login'];
                    $session_password = $_SESSION['password'];
                    $result           = $connection->query("SELECT * FROM `user` WHERE `login` = '$session_login' AND `password` = '$session_password'");
                }
                $result               = mysqli_fetch_assoc($result);
                print_r($result);
            ?>
        </div>
    </div>
</div>
<?php
    require_once("components/foot.php");
?>    