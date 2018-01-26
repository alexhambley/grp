<?php
    include "header.php";
    session_start();
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'admin' and $password == '123456') {
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
</head>
<body>
<!-- Navigation Bar  -->
    <nav>            
        <ul class="nav nav-pills">
            <li>
                <a href="#"> Students </a>
            </li>
            <li>
                <a href="allThemes.php"> View All Themes </a>
            </li>
            <li class="active">
                <a href="login.php"> Admin </a>
            </li>
        </ul>
    </nav>





    <div class="container">
        <div class="text-center">
            <h1>Food Science</h1>
        </div>

        <form class="col-md-4 col-md-offset-4" action="login.php" method="POST">
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
                <input class="form-control btn btn-primary" type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>