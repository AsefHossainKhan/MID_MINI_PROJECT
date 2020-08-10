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
    if(isset($_POST["loginButton"])) {
        $id = $_POST["id"];
        $password = $_POST["password"];
        if(empty($id) || empty($password)){
            echo "empty fields found";
        }
        else {
            $file = fopen("userInfo.txt",'r');
            while(!feof($file)) {
                $data = fgets($file);
                $user = explode('|', $data);

                if($id == trim($user[0]) && $password == trim($user[1])) {
                    session_start();
                    $_SESSION["name"] = $user[2];
                    $_SESSION["id"] = $user[0];
                    $_SESSION["email"] = $user[3];
                    $_SESSION["userType"] = $user[4];

                    if(trim($user[4]) == "User") {
                        header("Location: userHomePage.php");
                    }
                    else {
                        header("Location: adminHomePage.php");
                    }

                }
                else {
                    echo "username/password wrong";
                }

            }
        }
    }
?>