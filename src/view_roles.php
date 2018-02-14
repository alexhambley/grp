<?php 
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
    $selected = $_GET['selectedElement'];
    $elementStr = implode(",", $selected);

    $themes[0] = $_SESSION['theme1'];
    $themes[1] = $_SESSION['theme2'];
    $themes[2] = $_SESSION['theme3'];
    $themeStr = implode(",", $themes);

    header("Location: result.php?tid=".$themeStr."&eid=".$elementStr);
    exit();
 ?>