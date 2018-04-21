<?php
    session_start();
    $_SESSION['loggedin'] = false;
    header('Location: admin_login.php');
    exit();
?>