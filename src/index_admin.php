<?php
include "header.php";
include "navbar.php";
    session_start();
    if (!$_SESSION['loggedin']) {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Admin</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="/favicon.ico" type="image/x-icon">

      <style>
        .bg-grey {
          background-color: #f6f6f6;
        }
        .thumbnail {
          padding: 0 0 15px 0;
          border: none;
          border-radius: 0;
        }
        .thumbnail img {
          width: 100%;
          height: 100%;
          margin-bottom: 10px;
        }
        .thumbnail:hover {
          box-shadow: 5px 0px 40px rgba(0,0,0, .2);
        }
        .btn {
            background-color: #192A6C;
        }
      </style>
    </head>

    <body class="bg-grey" onload="loadAllRoles()">
        <div class="container-fluid text-center">
            <h1>Admin</h1>
            <h2>Database Management</h2>
            <h4>Roles, themes and elements</h4>
            <p><a href="admin_add.php" class="btn btn-primary">Add</a></p>
            <p><a href="admin_update.php" class="btn btn-primary">Update</a></p>
            <p><a href="admin_remove.php" class="btn btn-primary">Remove</a></p>
            <h2>Create an new account</h2>
            <p><a href="signup.php" class="btn btn-primary">Create Account</a></p>
        </div>
        <script src="js/index.js"> </script>
    </body>
</html>
