<?php
    // Inserting the head component

    require_once("components/head.php");

    // Authentication verification

    if (!$user_signed) header("Location: login.php"); 

    // A function that creates options for select 

    require_once("components/functions.php");

    // Deleting a record from a table

    if (isset($_POST['delete'])) {

        $user_id = $_GET['user'];
        $connection->query("DELETE FROM user WHERE id = '$user_id'");
        header("Location: index.php");

    } 

    if (isset($_POST['save'])) {

        // Checking for errors

        $error_message            = "";
        $user_login_exist_error   = "";
        $name_length_error        = (strlen(trim($_POST['new_name'])) != 0) || !isset($_POST['new_name']) ? "" : "The name field is empty";
        $surname_length_error     = (strlen(trim($_POST['new_surname'])) != 0) || !isset($_POST['new_surname']) ? "" : "The surname field is empty";  
        $login_empty_error        = (strlen(trim($_POST['new_login'])) != 0) || !isset($_POST['new_login']) ? "" : "The login field is empty";
        $birthdate_error          = strlen($_POST['new_birthdate']) != 0 ? "" : "The birthdate field is empty";
        $password_length_error    = (strlen(trim($_POST['new_password'])) != 0) || !isset($_POST['new_password']) ? "" : "The password field is empty";
        
        $name                     = $_POST['new_name'];
        $surname                  = $_POST['new_surname'];
        $login                    = $_POST['new_login'];
        $password                 = md5($_POST['new_password']);
        $birthdate                = $_POST['new_birthdate'];
        $sex                      = $_POST['new_sex'];
        $type                     = $_POST['new_type'];

        $result                   = $connection->prepare("SELECT *, COUNT(*) AS count FROM `user` WHERE `login` = ?");
        $result->bind_param('s', $login);
        $result->execute();
        $result                   = $result->get_result();
        $result                   = $result->fetch_array(MYSQLI_ASSOC);

        // Checking the login unique

        if($result['count'] == 1) {
            if ($result['id'] == $_GET['user']) {
                $user_login_exist_error   = "";
            } else {
                $user_login_exist_error = "A user with such a login already exists";
            }
        } else {
            $user_login_exist_error   = "";
        }

        $password = $result['password'] == $_POST['new_password'] ? $_POST['new_password'] : $password;

        $error_array              = array($name_length_error, $surname_length_error,  
                                    $login_empty_error, $password_length_error,
                                    $birthdate_error, $user_login_exist_error);
        $errors_exist             = false;

        // Creating an error message
            
        for ($i = 0; $i < count($error_array); $i++) {
            if (strlen($error_array[$i]) > 0) {
                $errors_exist   = true;
                $error_message  = $error_array[$i];
                break;
            }
        }

        // Updating a record in the table 

        if (!$errors_exist) {
            $result = $connection->prepare("UPDATE `user` 
                SET `name`  = ?, 
                `surname`   = ?, 
                `login`     = ?, 
                `password`  = ?,
                `birthdate` = ?, 
                `sex`       = ?, 
                `user_type` = ? 
                WHERE `id`  = ?");

            $result->bind_param('sssssiii', $name, $surname, $login, $password, $birthdate, $sex, $type, $_GET['user']);
            $result->execute(); 
        }
    }

?>
<div class="user">
    <div class="container">
        <div class="user__content">
            <div class="user__error">
                <?php 
                    if (strlen($error_message) > 0) {
                        echo $error_message . "<br/>No changes have been made";
                    } else {
                        echo "<br/><br/>";
                    }        
                ?>
            </div>
            <?php 

                // Get information about a certain user

                $userId = $_GET['user'];
                $result = $connection->query(
                    "SELECT user.id, user.name, user.surname, user.login, user.password, user.birthdate,
                    sex.name AS sex, user_type.name AS type FROM `user`
                    INNER JOIN sex ON sex.id = user.sex
                    INNER JOIN user_type ON user_type.id = user.user_type 
                    WHERE user.id = $userId"
                );

                $result         = $result->fetch_assoc();
                $u_id           = $result['id'];
                $u_name         = $result['name'];
                $u_surname      = $result['surname'];
                $u_login        = $result['login'];
                $u_password     = $result['password'];
                $u_birthdate    = $result['birthdate'];
                $u_sex          = $result['sex'];
                $u_type         = $result['type'];
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
                <form action='#' method='POST' class='user__column'>
            <?php

                if (isset($_POST['edit'])) {

                    // Rerendering text into form input fields 

                    $sex_result     = $connection->query("SELECT * FROM sex");
                    $type_result    = $connection->query("SELECT * FROM user_type");

                    $sex_select     = "";
                    $sex_select     = "<select name='new_sex'>" . create_select($sex_result, $sex_select, $u_sex) . "</select>";

                    $type_select    = "";
                    $type_select    = "<select name='new_type'>" . create_select($type_result, $type_select, $u_type) . "</select>";

                    echo "
                        <div>$u_id</div>
                        <input type='text' name='new_name' value='$u_name'>
                        <input type='text' name='new_surname' value='$u_surname'>
                        <input type='text' name='new_login' value='$u_login'>
                        <input type='text' name='new_password' value='$u_password'>
                        <input type='date' name='new_birthdate' value='$u_birthdate'>
                        $sex_select
                        $type_select
                        <input type='submit' name='save' value='Save' />
                        <input type='submit' name='delete' value='Delete' />
                    ";
                } else {
                    echo "
                        <div>$u_id</div>
                        <div>$u_name</div>
                        <div>$u_surname</div>
                        <div>$u_login</div>
                        <div>$u_password</div>
                        <div>$u_birthdate</div>
                        <div>$u_sex</div>
                        <div>$u_type</div>
                        <input type='submit' name='edit' value='Edit' />
                        <input type='submit' name='delete' value='Delete' />
                    ";
                }              
            ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    // Inserting the foot component

    require_once("components/foot.php");
?>  