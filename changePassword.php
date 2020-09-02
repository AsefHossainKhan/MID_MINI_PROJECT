<?php
    session_start();

    if(!isset($_SESSION["rememberMeChecked"])) {
        $_SESSION["currentLink"] = "userHomePage.php";
        $_SESSION["rememberMeChecked"] = true;
        header("Location: rememberMe.php");

    }
?>



<?php
    $id = $_SESSION["id"];
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $userType = $_SESSION["usertype"];

    if($userType == "Admin") {
        $homeLink = "adminHomePage.php";
    }
    else {
        $homeLink = "userHomePage.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>CHANGE PASSWORD</legend>
            <table>
                <tr>
                    <td>Current Password</td>
                </tr>
                <tr>
                    <td><input type="password" name="currentPassword" value=""></td>
                </tr>
                <tr>
                    <td>New Password</td>
                </tr>
                <tr>
                    <td><input type="password" name="newPassword" value=""></td>
                </tr>
                <tr>
                    <td>Retype New Password</td>
                </tr>
                <tr>
                    <td><input type="password" name="retypeNewPassword" value=""></td>
                </tr>
                <tr>
                    <td><hr></td>
                </tr>
                <tr>
                    <td><input type="submit" name="changeButton" value="Change">
                    <a href=<?php echo $homeLink; ?>>Home</a>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>

<?php
    //DATABASE CONNECTION
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'mid_mini_project');

    function checkCurrentPassword($currentPassword) {
        global $connection;
        global $id;
        $tableName = "userinfo";
        $query = "SELECT * FROM $tableName WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $databasePassword = $row["password"];
        if ($databasePassword == $currentPassword) {
            return false;
        }
        else {
            return true;
        }
    }

    if(isset($_POST["changeButton"])) {
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];
        $retypeNewPassword = $_POST["retypeNewPassword"];
        if(empty($currentPassword) || empty($newPassword) || empty($retypeNewPassword)) {
            echo "empty fields found";
        }
        else if($newPassword != $retypeNewPassword) {
            echo "passwords don't match";
        }
        else if(checkCurrentPassword($currentPassword)){
            echo "current password is incorrect";
        }
        else {
            $tableName = "userinfo";
            $query = "UPDATE $tableName SET password='$newPassword' WHERE id='$id'";
            mysqli_query($connection, $query);
            echo "password change successful";
        }
    }

?>