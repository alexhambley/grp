<?php
    include '_db-user-util.php';
    session_start();
    $answers = fetchAnswers($_SESSION['username-forget']);

    if (strcmp($answers['Email'], $_POST['email']) == 0 and
        strcmp($answers['Phone'], $_POST['phone']) == 0 and
        strcmp($answers['Birthday'], $_POST['birthday']) == 0) {
        resetPassword($_SESSION['username-forget'], $_POST['password']);
        header('Location: admin_login.php');
        exit();
    }
    else {
        header('Location: admin.php');
        exit();
    }
?>
