<?php
    include "header.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
<Title> Role Description </Title>
</head>

<body>
<!-- Navigation Bar  -->
    <nav>            
        <ul class="nav nav-pills">
            <li>
                <a href="#"> Students </a>
            </li>
            <li class="active">
                <a href="view_all.php"> View All </a>
            </li>
            <li>
                <a href="admin_login.php"> Admin </a>
            </li>
        </ul>
    </nav>
    <br>

    <?php
        $_SESSION['roleID'] = $_GET['id'];
        $id = $_SESSION['roleID'];
        $stmt = $conn->prepare("SELECT entry, description, names FROM role WHERE id = '$id'");
        $stmt->execute();
        $stmt->bind_result($entry, $desc, $names);
        while ($stmt->fetch()) {
            $entry = htmlentities($entry);
            $desc = htmlentities($desc);
            $names = htmlentities($names);
            echo "<h2> $entry";
            echo "<br>";
            echo "<small> $desc </small> </h2>";
            echo "<br>";
            // Puts all the jobs on a new line:
            $output = str_replace(',', '<br>', $names);
            echo $output;
        }
    ?>
</body>
