<?php
    include "header.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
<Title>All Themes </Title>
</head>

<body>
<!-- Navigation Bar  -->
    <nav>            
        <ul class="nav nav-pills">
            <li>
                <a href="#"> Students </a>
            </li>
            <li class="active">
                <a href="allThemes.php"> View All Themes </a>
            </li>
            <li>
                <a href="login.php"> Admin </a>
            </li>
        </ul>
    </nav>
    <br>

    <?php
        $_SESSION['themeID'] = $_GET['id'];
        $id = $_SESSION['themeID'];
        $stmt = $conn->prepare("SELECT themename, explanation FROM theme WHERE id = '$id'");
        $stmt->execute();
        $stmt->bind_result($name, $exp);
        while ($stmt->fetch()) {
            $name = htmlentities($name);
            $exp = htmlentities($exp);
            echo "<h2> $name";
            echo "<br>";
            echo "<small> $exp </small> </h2>";
        }
    ?>
</body>
