<?php
    require_once("components/head.php");
    if (!$user_signed) header("Location: login.php");   
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
                    $entryQuantity  = 20;
                    $itemsFrom      = $_GET['page'] * $entryQuantity - $entryQuantity;
                    $users_query    = "SELECT user.id, user.name, user.surname, user.login, user.password, user.birthdate,
                                    sex.name AS sex, user_type.name AS type FROM `user`
                                    INNER JOIN sex ON sex.id = user.sex
                                    INNER JOIN user_type ON user_type.id = user.user_type
                                    LIMIT $itemsFrom, $entryQuantity";

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

                    $countUsers = $connection->query("SELECT COUNT(*) AS count FROM `user`");
                    $countUsers = ceil($countUsers->fetch_assoc()['count'] / $entryQuantity);

                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $routes = "<div>$currentPage</div>";

                    for ($i = $currentPage - 1; $i > $currentPage - 3 && $i != 0; $i--) {
                        $routes = "<a href='?page=$i'>$i</a>" . $routes;
                    }

                    for ($i = $currentPage + 1; $i < $currentPage + 3 && $i != $countUsers + 1; $i++) {
                        $routes = $routes . "<a href='?page=$i'>$i</a>";
                    }

                    $routes = $currentPage > 3 ? "<a class='main__route-left' href='?page=1'>1</a>" . $routes : $routes;
                    $routes = $currentPage < $countUsers - 2 ? $routes . "<a class='main__route-right' href='?page=$countUsers'>$countUsers</a>" : $routes;

                    echo "<div class='main__router'>$routes</div>";
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