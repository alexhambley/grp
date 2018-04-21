<?php
    session_start();

  include "header.php";
  include "navbar.php";
  include "db.php";
    include '_db-user-util.php';
    $showQuestion = false;
    if (isset($_GET['username']) and isExistUser($_GET['username'])) {
        $showQuestion = true;
        $_SESSION['username-forget'] = $_GET['username'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgotten Password</title>
    <link rel="stylesheet" href="css/view_students.css" />
</head>
<body class="bg-grey">
  <div class="container">
    <div class="text-center">
        <h1> Forgotten Password </h1>
    </div>
    <h4> Explanation: </h4>
    <p> When you signed up we asked you three security questions. These will now be used to recover your account. <br>
    <?php if (!$showQuestion) { ?>
    <h3>Please enter your username:</h3>
    <form method="GET" action="forgotten_password.php" id="form-username">
      <div class="form-group" id="div-username">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input class="form-control" type="text" name="username" placeholder="Username" required>
          </div>
          <span class="help-block hidden" id="username-invalid">Invalid username! (Letters and spaces only)</span>
      </div>
        <input class="btn btn-default" type="submit" value="Forgotten Password">
    </form>
    <?php } else {?>
    <form method="POST" action="_resetPassword.php" id="form-other">
        <h3>Security Questions: </h3>
        <br>
        <div class="form-group" id="div-email">
          <label for "email"> Email Address: </label>
          <input class="form-control" type="email" name="email" placeholder="name@nottingham.ac.uk" required>
        </div>

        <div class="form-group">
          <label for "birthday"> Birthday: </label>
            <input class="form-control" type="date" name="birthday" placeholder="01/01/1970" required>
             <small id="bdayhelp" class="form-text text-muted">Please use the format dd/mm/yyyy</small>
        </div>

        <div class="form-group">
          <label for "phone"> Phone Number: </label>
          <input class="form-control" type="number" name="phone" placeholder="07770000000" required>
        </div>

        <div class="form-group">
          <label for "password"> New Password: </label>
          <input class="form-control" type="password" name="password" placeholder="New Password" required>
        </div>


        <input class="btn btn-primary" type="submit" value="Forgotten Password">
    </form>
    <?php } ?>
</body>
<script type="text/javascript" src="js/validate.js"></script>
</html>
