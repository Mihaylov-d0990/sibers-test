<?php
    // Inserting the head component

    require_once("components/head.php");

    // Authentication verification

    if (!$user_signed) header("Location: $root_url");   

    // A function that creates options for select 

    require_once("components/functions.php");

    $user_type = $connection->query("SELECT * FROM user_type");
    $sex_array = $connection->query("SELECT * FROM sex");

    // A function that destroys session variables

    function unset_session_variables() {
        unset($_SESSION['name']);
        unset($_SESSION['surname']);
        unset($_SESSION['s_login']);
        unset($_SESSION['s_password'] );
        unset($_SESSION['birthdate']);
        unset($_SESSION['sex']);
        unset($_SESSION['user_type']); 
    }

    if (isset($_POST['add'])) {
        $_SESSION['name']         = $_POST['name'];
        $_SESSION['surname']      = $_POST['surname'];
        $_SESSION['s_login']      = $_POST['login'];
        $_SESSION['s_password']   = $_POST['password'];
        $_SESSION['birthdate']    = $_POST['birthdate'];
        $_SESSION['sex']          = $_POST['sex'];
        $_SESSION['user_type']    = $_POST['user_type'];

        // Checking for errors

        $error_message            = "";
        $user_login_exist_error   = "";
        $name_length_error        = (strlen(trim($_POST['name'])) != 0) || !isset($_POST['name']) ? "" : "The name field is empty";
        $surname_length_error     = (strlen(trim($_POST['surname'])) != 0) || !isset($_POST['surname']) ? "" : "The surname field is empty";  
        $login_empty_error        = (strlen(trim($_POST['login'])) != 0) || !isset($_POST['login']) ? "" : "The login field is empty";
        $birthdate_error          = strlen($_POST['birthdate']) != 0 ? "" : "The birthdate field is empty";
        $password_length_error    = (strlen(trim($_POST['password'])) != 0) || !isset($_POST['password']) ? "" : "The password field is empty";
        
        $name                     = $_POST['name'];
        $surname                  = $_POST['surname'];
        $login                    = $_POST['login'];
        $password                 = md5($_POST['password']);
        $birthdate                = $_POST['birthdate'];
        $sex                      = $_POST['sex'];
        $type                     = $_POST['user_type'];

        // Checking the login unique

        $result                   = $connection->prepare("SELECT *, COUNT(*) AS count FROM `user` WHERE `login` = ?");
        $result->bind_param('s', $login);
        $result->execute();
        $result                   = $result->get_result();
        $result                   = $result->fetch_array(MYSQLI_ASSOC);
        $user_login_exist_error   = $result['count'] == 0 ? "" : "A user with such a login already exists";

        $error_array              = array($name_length_error, $surname_length_error,  
                                    $login_empty_error, $password_length_error,
                                    $birthdate_error, $user_login_exist_error);

        $errors_exist             = false;

        // Creating an error message
            
        for ($i = 0; $i < count($error_array); $i++) {
            if (strlen($error_array[$i]) > 0) {
                $errors_exist = true;
                $error_message = $error_array[$i];
                break;
            }
        }

        if (!$errors_exist) {

            // Inserting data in the table

            $result = $connection->prepare("INSERT INTO `user` (`name`, `surname`, `login`, `password`, `birthdate`, `sex`, `user_type`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $result->bind_param('sssssii', $name, $surname, $login, $password, $birthdate, $sex, $type);
            $result->execute();
            unset_session_variables();    
        }
    } else {
        unset_session_variables();
    }

?>
<div class="add">
    <div class="container">
        <div class="add__content">
            <div class="add__error">
                <?php 
                    if (strlen($error_message) > 0) {
                        echo $error_message;
                    } else {
                        echo "<br/>";
                    } 
                ?>
            </div>
            <form class='add__form' action='#' method='POST'>
                <span>Name</span>
                <input type='text' name='name' value="<?php echo $_SESSION['name']; ?>" />
                <span>Surname</span>
                <input type='text' name='surname' value="<?php echo $_SESSION['surname']; ?>" />
                <span>Login</span>
                <input type='text' name='login' value="<?php echo $_SESSION['s_login']; ?>" />
                <span>Password</span>
                <input type='text' name='password' value="<?php echo $_SESSION['s_password']; ?>" />
                <span>Birthdate</span>
                <input type='date' name='birthdate' value="<?php echo $_SESSION['birthdate']; ?>" />
                <span>Sex</span>
                <select name='sex'>
                    <?php 
                        echo create_select($sex_array, "", $sex_id);
                    ?>
                </select>
                <span>User type</span>
                <select name='user_type'>
                    <?php 
                        echo create_select($user_type, "", $type_id);
                    ?>
                </select>
                <input type='submit' name='add' value='Add' />
            </form>
        </div>
    </div>
</div>
<?php
    // Inserting the foot component

    require_once("components/foot.php");
?>   