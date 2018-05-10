<?php
    session_start();

    include "header.php";
    include '_db-user-util.php';


    if (!$_SESSION['loggedin']) {
        header('Location: admin_login.php');
        exit();
    }

    $existName = false;
    $existEmail = false;
    $existPhone = false;
    $isValid = false;
    $errorDB = false;
    if (isset($_POST['submit']) and isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['birthday']) and isset($_POST['phone'])) {
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
        $password = hash('sha256', $_POST['password']);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $birthday = filter_var(trim($_POST['birthday']), FILTER_SANITIZE_STRING);
        $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);

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
    include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title> Add New Admin </title>
    <link rel="stylesheet" href="css/view_students.css" />
</head>


<body class="bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div style="padding-top: 30px;"> 
                <button type="button" 
                        class="btn btn-default"
                        onclick="window.location.href='index_admin.php'">
                        <span class="glyphicon glyphicon-arrow-left"> </span> 
                        Back to Admin Page
                </button>     
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-center">
                    <h1>Add New Admin</h1>
                </div>
            </div> 
        </div>
        <h4> Explanation: </h4>
        <p> You can add additional administrators to this site. <br>
            These admins are also able to make changes to the database.
            This includes adding new roles, themes and elements, as well as updating existing roles, themes and elements. </p>

        <form id="signup" action="signup.php" method="POST">
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
                <span class="help-block hidden" id="username-invalid">Invalid username! (Letters and spaces only)</span>
            </div>
            <div class="form-group" id="div-password">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <span class="help-block hidden" id="password-invalid">Invalid password! (Minimum length is 6)</span>
            </div>

            <h4> Security Questions: </h4>
            <div class="form-group">
              <label for "email"> Email Address: </label>
                <input class="form-control" type="email" name="email" placeholder="name@nottingham.ac.uk" required>
            </div>

            <div class="form-group">
              <label for "birthday"> Birthday: </label>
                <input class="form-control" type="date" name="birthday" placeholder="01/01/1970" required>
                 <small id="bdayhelp" class="form-text text-muted">Please use the format dd/mm/yyyy</small>
            </div>

            <div class="form-group">
              <label for "number"> Phone Number: </label>
              <input class="form-control" type="number" name="phone" placeholder="07770000000" required>
            </div>
            <input class="btn btn-success" type="submit" name="submit" value="Register New Admin">
        </form>
    </div>
</body>
<script type="text/javascript" src="js/validate.js"></script>
</html>
