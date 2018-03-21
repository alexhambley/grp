<?php
include "header.php";
include "navbar.php";
include "db.php";
    session_start();
    if (!$_SESSION['loggedin']) {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CFGC Data Update</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">


        <link type="text/css" rel="stylesheet" href="css/shared.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


        <style type="text/css">
            a {color: #36f; }
            select {font-size: 14px; line-height: 18px; color: royalblue;}
        </style>



    </head>

    <body onload="loadAllRoles()">

        <div class="mainlayer">
            <h1>Competencies for Food Graduate Careers</h1>
            <p>&nbsp;</p>

            <h2>Database Management</h2>
            <p><a href="admin_add.php">Add</a></p>
            <p><a href="admin_update.php">Update</a></p>
            <p><a href="admin_remove.php">Remove</a></p>
            <p>&nbsp;</p>

            <!-- <h2>2. View Role Profile</h2>
            <p>
                <select id="role_list" onchange="viewRoleProfile()"></select>
            </p> -->

            <!-- <p>&nbsp;</p>

            <h2>3. Search Roles</h2>
            <p><a href="search.php">Search Roles by themes and elements</a></p>

            <p>&nbsp;</p>

            <h2>4. Elements of Themes</h2>
            <p><a href="allThemes.php">List all themes with their elements</a></p> -->

            <h2>Create an new account</h2>
            <p><a href="signup.php">Create!</a></p>
        </div>





        <script src="js/index.js"></script>
    </body>
</html>
