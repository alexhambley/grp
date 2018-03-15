<?php
    include '_db-user-util.php';
    session_start();
    $showQuestion = false;
    if (isset($_GET['username']) and isExistUser($_GET['username'])) {
        $showQuestion = true;
        $_SESSION['username-forget'] = $_GET['username'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Your Password</title>
</head>
<body>
    <?php if (!$showQuestion) { ?>
    <h3>Please enter your username:</h3>
    <form method="GET" action="forget.php">
        <input type="text" name="username">
        <input type="submit">
    </form>
    <?php } else {?>
    <form method="POST" action="_resetPassword.php">
        <h3>Please answer these questions:</h3>
        <br>
        <h4>What's Your Email Address?</h4>
        <input type="text" name="email">
        <h4>What's Your Birthday?</h4>
        <input type="text" name="birthday">
        <h4>What's Your Phone Number?</h4>
        <input type="text" name="phone">
        <br><br>
        <input type="submit">
    </form>
    <?php } ?>
</body>
</html>