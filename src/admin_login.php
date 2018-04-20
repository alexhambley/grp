<?php
    session_start();

    include "header.php";
    include "navbar.php";
    include "db.php";
    include '_db-user-util.php';

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        if (!authenticate($username, $password)) {
            $invalid = true;
        }
        else {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            header('Location: index_admin.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Admin Login </title>
    <link rel="stylesheet" href="css/view_students.css" />

    <style>
       /* .bg-grey {
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
    } */
  </style>
</head>
<body class="bg-grey">
    <div class="container-fluid text-center">
        <div class="text-center">
            <h1>Food Science</h1>
        </div>

        <form class="col-md-4 col-md-offset-4" action="admin_login.php" method="POST">
            <div class="form-group has-error text-center">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control btn btn-default" type="submit" name="submit" value="Login">
            </div>
            <div class="form-group text-center">
                <a class="help-block" href="forgotten_password.php">Forgot your password?</a>
            </div>
        </form>
    </div>
</body>
</html>
