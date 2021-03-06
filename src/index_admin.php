<?php
  session_start();
  include "header.php";
  if (!$_SESSION['loggedin']) {
      header('Location: admin_login.php');
      exit();
  }
  include "navbar.php";

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" href="css/index_admin.css" />
    <title>Admin</title>
  </head>
  <body class="bg-grey" onload="loadAllRoles()">
    <div class="bg">
      <div class="container">
      <div class="text-center">
        <h1> Admin</h1>
      </div>
        <h2>Database Management: </h2>
        <h4 style="color: black;"> Here you can add new roles, themes and elements, as well as update and remove existing ones. </h4>
        <p><a href="admin_add_roles.php" class="btn btn-default" style="border-color: #192A6C">Add</a></p>
        <p><a href="admin_update_roles.php" class="btn btn-default" style="border-color: #192A6C">Update</a></p>
        <p><a href="admin_remove.php" class="btn btn-default" style="border-color: #192A6C">Remove</a></p>
          <h2>Create a new account:</h2>
          <h4 style="color: black;"> This account will have admin privileges, and therefore will be able to update and remove elements from the database. </h4>
          <p><a href="signup.php" class="btn btn-default" style="border-color: #192A6C">Create Account</a></p>

    <!-- <div class="text-center"> -->
    
     <p><a href="logout.php" class="btn btn-default" style="border-color: #192A6C">Log Out</a></p>
    </div>
  </div>
    <script src="js/index.js"> </script>
    </body>
</html>
