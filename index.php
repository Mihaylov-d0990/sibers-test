<?php
    require_once("components/head.php");
    if (!$user_signed) {
        header("Location: login.php");
    }
    
?>
<div class="main">
    <div class="container">
        <div class="main__content">
            <?php 
                if (!$content_unavailable) {
                    echo "<div class='main__table'>
                            <div class='main__cell'>ID</div>
                            <div class='main__cell'>Name</div>
                            <div class='main__cell'>Surname</div>
                            <div class='main__cell'>Login</div>
                            <div class='main__cell'>Password</div>
                            <div class='main__cell'>Birthdate</div>
                            <div class='main__cell'>Sex</div>
                            <div class='main__cell'>Type</div>";

                    $users;
                    $users_query = "SELECT user.id, user.name, user.surname, user.login, user.password, user.birthdate,
                                    user_type.name AS type, sex.name AS sex FROM `user`
                                    INNER JOIN user_type ON user_type.id = user.user_type
                                    INNER JOIN sex ON sex.id = user.sex
                                    LIMIT 50";
                    if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
                        $cookie_login       = $_COOKIE['login'];
                        $cookie_password    = $_COOKIE['password'];
                        $users              = $connection->query($users_query);
                    } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                        $session_login      = $_SESSION['login'];
                        $session_password   = $_SESSION['password'];
                        $users              = $connection->query($users_query);
                    }
                    while($row = mysqli_fetch_assoc($users)) {
                        $rowCells = "";
                        foreach($row as $key => $value) {
                            $rowCells = $rowCells . "<div class='main__cell'>$value</div>";
                        }
                        
                        echo $rowCells;
                    }

                    echo "</div>";
                } else {
                    echo "<strong>Content is unavailable.<br/>
                            You need to log in as an administrator</strong>";      
                }
            ?>
        </div>
    </div>
</div>
<?php
    require_once("components/foot.php");
?>    