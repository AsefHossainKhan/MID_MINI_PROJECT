<?php
    session_start();
    setcookie("loginStatus", $id, time()-3600);
    session_destroy();
    header("Location: login.php");
?>