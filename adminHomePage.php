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
                session_start();
                echo $_SESSION["name"];
            ?>
        !</h1>
        <a href="profile.php">Profile</a><br>
        <a href="forgotPassword.php">Change Passowrd</a><br>
        <a href="viewUsers.php">View Users</a><br>
        <a href="login.php">Logout</a><br>
    </center>

    
</body>
</html>