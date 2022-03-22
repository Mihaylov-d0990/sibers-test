<?php
    require_once("components/head.php");
    if (!$user_signed) header("Location: login.php"); 
    if (isset($_POST['delete'])) {
        $user_id = $_GET['user'];
        $connection->query("DELETE FROM user WHERE id = '$user_id'");
        header("Location: index.php");
    }
?>
<div class="user">
    <div class="container">
        <div class="user__content">
            <?php 
                $userId = $_GET['user'];
                $result = $connection->query(
                    "SELECT user.id, user.name, user.surname, user.login, user.password, user.birthdate,
                    sex.name AS sex, user_type.name AS type FROM `user`
                    INNER JOIN sex ON sex.id = user.sex
                    INNER JOIN user_type ON user_type.id = user.user_type 
                    WHERE user.id = $userId"
                );

                $result = $result->fetch_assoc();

                $u_id = $result['id'];
                $u_name = $result['name'];
                $u_surname = $result['surname'];
                $u_login = $result['login'];
                $u_password = $result['password'];
                $u_birthdate = $result['birthdate'];
                $u_sex = $result['sex'];
                $u_type = $result['type'];
            ?>

            <div class='user__info'>
                <div class='user__column'>
                    <div class='user__title'>ID: </div>
                    <div class='user__title'>Name: </div>
                    <div class='user__title'>Surname: </div>
                    <div class='user__title'>Login: </div>
                    <div class='user__title'>Password: </div>
                    <div class='user__title'>Birthdate: </div>
                    <div class='user__title'>Sex: </div>
                    <div class='user__title'>Type: </div>
                </div>

            <?php
                echo "
                    <div class='user__column'>
                        <div>$u_id</div>
                        <div>$u_name</div>
                        <div>$u_surname</div>
                        <div>$u_login</div>
                        <div>$u_password</div>
                        <div>$u_birthdate</div>
                        <div>$u_sex</div>
                        <div>$u_type</div>
                    </div>
                </div>
                ";
            ?>
            <form action='#' method='POST'>
                <input type='submit' name='delete' value='Delete' />
            </form>
        </div>
    </div>
</div>
<?php
    require_once("components/foot.php");
?>  