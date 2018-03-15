<?php
    include '_db-user-util.php';
    session_start();
    $showQuestion = false;
    if (isset($_GET['username'])) {
        $showQuestion = true;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Your Password</title>
</head>
<body>
    <?php if (!$showQuestion) { ?>
    <h4>Please enter your username:</h4>
    <form>
        <input type="text" name="username">
        <input type="submit">
    </form>
    <?php } else {?>
    <form>
        <h4>Please answer these questions:</h4>
        <input type="text" name="email">
        <input type="submit">
    </form>
    <?php } ?>
</body>
</html>