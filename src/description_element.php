<?php
    include "header.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
<Title> Theme Description </Title>
</head>

<body>
<!-- Navigation Bar  -->
    <nav>            
        <ul class="nav nav-pills">
            <li>
                <a href="view_students.php"> Students </a>
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
        $_SESSION['themeID'] = $_GET['id'];
        $id = $_SESSION['themeID'];
        $stmt = $conn->prepare("SELECT elementname, description FROM element WHERE id = '$id'");
        $stmt->execute();
        $stmt->bind_result($name, $desc);
        while ($stmt->fetch()) {
            $name = htmlentities($name);
            $desc = htmlentities($desc);
            echo "<h2> $name";
            echo "<br>";
            echo "<small> $desc </small> </h2>";
        }
    ?>
</body>
