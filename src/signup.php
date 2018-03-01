<?php
    include '_db-user-util.php';
    session_start();
    if (!$_SESSION['loggedin']) {
        header('Location: index.php');
        exit();
    }

    $existName = false;
    $isValid = false;
    $errorDB = false;

    session_start();
    
    if (isset($_POST['submit']) and isset($_POST['username']) and isset($_POST['password'])) {
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
        $password = md5($_POST['password']);

        if (isExistUser($username)) {
            $existName = true;
        }
        else {
            $infos = array('username' => $username, 'password' => $password);

            $isValid = true;
            try {
                signup($infos);
            }
            catch (Exception $e) {
                $errorDB = true;
            }

        }

        if (!$existName and $isValid and !$errorDB) {
            header('Location: index_admin.php');
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="text-center">
            <h1>Register Your Account</h1>
        </div>

        <form class="col-md-4 col-md-offset-4" id="signup" action="signup.php" method="POST">
            <div class="form-group has-error text-center">
            <?php if ($existName) { ?>
                <p class="help-block">This username already exists!</p>
            <?php } ?>
            <?php if ($errorDB) { ?>
                <p class="help-block">Error Connecting DB! Try again!</p>
            <?php } ?>
            </div>
            <div class="form-group" id="div-username">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <span class="help-block hidden" id="username-invalid">Invalid username! (only letters and spaces)</span>
                <!-- <span class="help-block hidden" id="username-exist">This username has been used!</span> -->
            </div>
            <div class="form-group" id="div-password">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <span class="help-block hidden" id="password-invalid">Invalid password! (Min length is 6)</span>
            </div>
            <div class="form-group">
                <input class="form-control btn btn-primary" type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>