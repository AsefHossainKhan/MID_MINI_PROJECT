<?php
    session_start();
    if (isset($_COOKIE["loginStatus"])) {
        $id = $_COOKIE["loginStatus"];
        $tableName = "userinfo";
        $query = "SELECT * FROM $tableName WHERE id='$id'";
        
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $_SESSION["id"] = $row["id"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["usertype"] = $row["usertype"];

        header("Location: ".$_SESSION["currentLink"]."");

    }
    else {
        header("Location: login.php");
    }
?>