<?php
    session_start();

    if(!isset($_SESSION["rememberMeChecked"])) {
        $_SESSION["currentLink"] = "userHomePage.php";
        $_SESSION["rememberMeChecked"] = true;
        header("Location: rememberMe.php");

    }
    if(!isset($_SESSION["name"])) {
        header("Location: login.php");
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
</head>
<body>
    <center>
        <h1>WELCOME
            <?php 
                echo $_SESSION["name"];
            ?>
        !</h1>
        <a href="profile.php">Profile</a><br>
        <a href="changePassword.php">Change Passowrd</a><br>
        <a href="logout.php">Logout</a><br>
    </center>

    
</body>
</html>