<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>REGISTRATION</legend>
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
                    <td>Confirm Password</td>
                </tr>
                <tr>
                    <td><input type="password" name="confirmPassword" value=""></td>
                </tr>
                <tr>
                    <td>Name</td>
                </tr>
                <tr>
                    <td><input type="text" name="name" value=""></td>
                </tr>
                <tr>
                    <td>Email</td>
                </tr>
                <tr>
                    <td><input type="text" name="email" value=""></td>
                </tr>
                <tr>
                    <td>User Type [User/Admin]</td>
                </tr>
                <tr>
                    <td>
                        <Select name="userType">
                            <Option value="User">User</Option>
                            <Option value="Admin">Admin</Option>
                        </Select>
                    </td>
                </tr>
                <tr>
                    <td><hr></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Register" name="registerButton">
                        <a href="">Login</a>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>

<?php


    if(isset($_POST["registerButton"])) {
        $id = $_POST["id"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $userType = $_POST["userType"];
        if(empty($id) || empty($password) || empty($confirmPassword) || empty($name) || empty($email)){
            echo "empty fields found";
        }
        else if($_POST["password"] != $_POST["confirmPassword"]) {
            echo "passwords dont match";
        }
        else {
            
            $file = fopen("userInfo.txt",'a');
            $user = $id."|".$password."|".$name."|".$email."|".$userType.PHP_EOL;
            fwrite($file, $user);

            header("Location: login.php");
        }
    }
?>