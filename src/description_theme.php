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
        $_SESSION['themeID'] = $_GET['id'];
        $id = $_SESSION['themeID'];
        $stmt = $conn->prepare("SELECT themename, explanation, elements FROM theme WHERE id = '$id'");
        $stmt->execute();
        $stmt->bind_result($name, $exp, $elements);
        while ($stmt->fetch()) {
            $name = htmlentities($name);
            $exp = htmlentities($exp);
            echo "<h2> $name";
            echo "<br>";
            echo "<small> $exp </small> </h2>";
            $_SESSION['elements'] = $elements;
        }
    ?>

    <br> 

    <h3> Related Elements and their name </h3>

    <?php
        $elements = $_SESSION['elements'];
        $elem = explode(",", $elements);
        $counter = 0;
        while ($counter != count($elem)) {
            $stmt = $conn->prepare("SELECT id, elementname, description FROM element WHERE id = '$elem[$counter]'");
            $stmt->execute();
            $stmt->bind_result($id, $name, $desc);
            while ($stmt->fetch()) {
                $id = htmlentities($id);
                $name = htmlentities($name);
                $desc = htmlentities($desc);
                echo $id;
                echo "<br>";
                echo $name;
                echo "<br>";
                echo $desc;
                echo "<br>";
            }
            $counter++;
        }
    ?>


</body>
