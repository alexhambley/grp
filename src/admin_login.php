<?php
    session_start();

    include "header.php";
    include "db.php";
    include '_db-user-util.php';

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = hash("sha256", $_POST['password']);
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

    include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title> Admin Login </title>
    <link rel="stylesheet" href="css/index_admin.css" />
</head>
<body class="bg-grey">
    <div class="bg">
        <div class="container-fluid text-center">
            <div class="text-center">
                <h1>Food Science Admin Page</h1>
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
</div>
</body>
</html>
