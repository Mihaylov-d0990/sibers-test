<?php
    // Inserting the head component

    require_once("components/head.php");

    // Authentication verification

    if (!$user_signed) header("Location: login.php");   
?>
<div class="main">
    <div class="container">
        <div class="main__content">
            <?php 
                if (!$content_unavailable) {
                    $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
                    $_GET['sort'] = isset($_GET['sort']) ? $_GET['sort'] : 0;
                    $currentPage = $_GET['page'];
                    
                    $sortTitles = "";
                    $arr = array('ID', 'Name', 'Surname', 'Login', 'Password', 'Birthdate', 'Sex', 'Type');

                    // Create list head

                    for ($i = 0; $i < 8; $i++) {
                        $descSort = "";

                        if (($_GET['sort'] == $i) && ($_GET['desc'] != "DESC")) $descSort = "DESC";   
                        else $descSort = "ASC";

                        // Create links in the list head for routing and sorting

                        $newTitle = "<div class='main__cell'><a href='?sort=$i&desc=$descSort&page=$currentPage'>" . $arr[$i] . "</a></div>";
                        $sortTitles = $sortTitles . $newTitle;
                    }

                    echo "
                        <div class='main__table'>
                            <div class='main__header-row'>$sortTitles</div>";

                    $users;

                    // Setting parameters for list output

                    $entryQuantity  = 20;
                    $itemsFrom      = $_GET['page'] * $entryQuantity - $entryQuantity;
                    $arr            = array(0 => 'id', 1 => 'name', 2 => 'surname', 3 => 'login', 4 => 'password', 5 => 'birthdate', 6 => 'sex', 7 => 'user_type');
                    $sortType       = $arr[$_GET['sort']];
                    $sortDesc       = $_GET['desc'];

                    $result         = $connection->prepare("SELECT user.id, user.name, user.surname, user.login, user.password, user.birthdate,
                                        sex.name AS sex, user_type.name AS type FROM `user`
                                        INNER JOIN sex ON sex.id = user.sex
                                        INNER JOIN user_type ON user_type.id = user.user_type
                                        ORDER BY $sortType $sortDesc
                                        LIMIT ?, ?");

                    $result->bind_param('ii', $itemsFrom, $entryQuantity);

                    // Authentication verification

                    if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {

                        $cookie_login       = $_COOKIE['login'];
                        $cookie_password    = $_COOKIE['password'];

                        $result->execute();
                        $result             = $result->get_result();         

                    } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

                        $session_login      = $_SESSION['login'];
                        $session_password   = $_SESSION['password'];
                        
                        $result->execute();
                        $result             = $result->get_result();
                    }

                    // List output

                    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $rowCells = "";
                        foreach($row as $key => $value) {
                            $rowCells = $rowCells . "<div class='main__cell'>$value</div>";
                        }

                        $userId = $row['id'];
                        echo "<a href='user.php?user=$userId'>$rowCells</a>";
                    }

                    echo "</div>";

                    // Creating routing

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
    // Inserting the foot component

    require_once("components/foot.php");
?>    