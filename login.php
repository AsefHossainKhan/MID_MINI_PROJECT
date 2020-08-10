<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>LOGIN</legend>
            <table>
                <tr>
                    <td>Id</td>
                </tr>
                <tr>
                    <td><input type="text" name="id" value=""></td>
                </tr>
                <tr>
                    <td>Password</td>
                </tr>
                <tr>
                    <td><input type="password" name="password" value=""></td>
                </tr>
                <tr>
                    <td><input type="checkBox" name="rememberMe">Remember Me</td>
                </tr>
                <tr>
                    <td><hr></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Login" name="loginButton">
                        <a href="">Register</a>
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

    //starting session
    Session_start();

    if(isset($_POST["loginButton"])) {
        $id = $_POST["id"];
        $password = $_POST["password"];
        if(empty($id) || empty($password)){
            echo "empty fields found";
        }
        else {
            if (isset($_POST["rememberMe"])) {
                $loggedInAs = $id;
                setcookie("loginStatus", $id, time()+3600);
            }
            $tableName = "userinfo";
            $query = "SELECT * FROM $tableName WHERE id='$id' AND password='$password'";
            
            $result = mysqli_query($connection, $query);

            if($row = mysqli_fetch_assoc($result)) {
                $_SESSION["id"] = $id;
                $_SESSION["name"] = $row["name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["usertype"] = $row["usertype"];
                if($row["usertype"] == "Admin") {
                    header("Location: adminHomePage.php");
                }
                else {
                    header("Location: userHomePage.php");
                }
            }
            else {
                echo "username/password incorrect";
            }
        }
    }
?>