<?php
    include '_db-user-util.php';
    session_start();
    if (!$_SESSION['loggedin']) {
        header('Location: index.php');
        exit();
    }

    $existName = false;
    $existEmail = false;
    $existPhone = false;
    $isValid = false;
    $errorDB = false;
    
    if (isset($_POST['submit']) and isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['birthday']) and isset($_POST['phone'])) {
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
        $password = md5($_POST['password']);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $birthday = filter_var(trim($_POST['birthday']), FILTER_SANITIZE_STRING);
        $phone = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);

        if (isExistUser($username)) {
            $existName = true;
        }
        elseif (isExistEmail($email)) {
            $existEmail = true;
        }
        elseif (isExistPhone($phone)) {
            $existPhone = true;
        }
        else {
            $infos = array('username' => $username, 'password' => $password, 'email' => $email, 'phone' => $phone, 'birthday' => $birthday);

            $isValid = true;
            try {
                signup($infos);
            }
            catch (Exception $e) {
                $errorDB = true;
            }

        }

        if (!$existName and !$existEmail and !$existPhone and $isValid and !$errorDB) {
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
            <?php if ($existEmail) { ?>
                <p class="help-block">This email has been used!</p>
            <?php } ?>
            <?php if ($existPhone) { ?>
                <p class="help-block">This phone number has been used!</p>
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
            </div>
            <div class="form-group" id="div-password">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <span class="help-block hidden" id="password-invalid">Invalid password! (Min length is 6)</span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <h5>What's Your Email Address?</h5>
                    <input class="form-control" type="text" name="email" placeholder="abc@nottingham.ac.uk">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <h5>What's Your Birthday?</h5>
                    <input class="form-control" type="text" name="birthday" placeholder="1970-01-01">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <h5>What's Your Phone Number?</h5>
                    <input class="form-control" type="text" name="phone" placeholder="123456789">
                </div>
            </div>
            <div class="form-group">
                <input class="form-control btn btn-primary" type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>