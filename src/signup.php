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
           <!--  <?php if ($existName) { ?>
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
            <?php } ?> -->
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
            <div class="form-group" id="div-email">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                </div>
                <span class="help-block hidden" id="email-invalid">Invalid email!</span>
            </div>
            <div class="form-group" id="div-phone">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input class="form-control" type="tel" name="phone" placeholder="Phone Number" required>
                </div>
                <span class="help-block hidden" id="phone-invalid">Invalid phone number!</span>
            </div>
            <div class="form-group">
                <input class="form-control btn btn-primary" type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>