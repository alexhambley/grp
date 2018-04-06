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
    <link rel="stylesheet" href="css/index_admin.css" />
    <title>Admin</title>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"> -->
    <!-- <link rel="icon" href="/favicon.ico" type="image/x-icon"> -->
  </head>

  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

  <body class="bg-grey" onload="loadAllRoles()">
    <div class="bg">
      <div class="container">

      <!-- <div class="container-fluid text-center"> -->
      <div class="text-center">
        <h1> Admin</h1>
      </div>
          <!-- <h1>Admin</h1> -->
          <h2>Database Management: </h2>
          <h4> Here you can add new roles, themes and elements, as well as update and remove existing ones. </h4>
          <p><a href="admin_add.php" class="btn btn-primary">Add</a></p>
          <p><a href="admin_update.php" class="btn btn-primary">Update</a></p>
          <p><a href="admin_remove.php" class="btn btn-primary">Remove</a></p>
          <h2>Create a new account:</h2>
          <h4> This account will have admin privileges, and therefore will be able to update and remove elements from the database. </h4>
          <p><a href="signup.php" class="btn btn-primary">Create Account</a></p>
      <!-- </div> -->
    </div>
  </div>
    <script src="js/index.js"> </script>
    </body>
</html>
