<?php
    session_start();
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
    <table border=1>
        <tr>
            <td colspan=2 align=center>Profile</td>
        </tr>
        <tr>
            <td>ID</td>
            <td><?php echo $id; ?></td>
        </tr>
        <tr>
            <td>NAME</td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>USER TYPE</td>
            <td><?php echo $userType; ?></td>
        </tr>
        <tr>
            <td colspan=2 align=right><a href=<?php echo $homeLink ?>>Go Home</a></td>
        </tr>

    </table>
</body>
</html>