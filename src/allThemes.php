<?php
    include "header.php";
    include "db.php";
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

<!-- all the THEMES -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    Theme Name
                </th>
                <th scope="col">
                    See More
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            $stmt = $conn->prepare("SELECT id, themename, explanation FROM theme ORDER BY id ASC");
            $stmt->execute();
            $stmt->bind_result($id, $name, $exp);
            while ($stmt->fetch()) {
                $name = htmlentities($name);
                echo "<tr>";
                    echo "<th scope=\"row\"> $id </th>";
                    echo "<td> $name </td>";
                    echo "<td> button goes here </td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>

<!-- all the ROLES -->

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    Role Name
                </th>
                <th scope="col">
                    See More
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            $stmt = $conn->prepare("SELECT id, entry FROM role ORDER BY id ASC");
            $stmt->execute();
            $stmt->bind_result($id, $entry);
            while ($stmt->fetch()) {
                $entry = htmlentities($entry);
                echo "<tr>";
                    echo "<th scope=\"row\"> $id </th>";
                    echo "<td> $entry </td>";
                    echo "<td> button goes here </td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    
    <!-- all the ELEMENTS -->

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    Role Name
                </th>
                <th scope="col">
                    See More
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            $stmt = $conn->prepare("SELECT id, elementname FROM element ORDER BY id ASC");
            $stmt->execute();
            $stmt->bind_result($id, $elename);
            while ($stmt->fetch()) {
                $elename = htmlentities($elename);
                echo "<tr>";
                    echo "<th scope=\"row\"> $id </th>";
                    echo "<td> $elename </td>";
                    echo "<td> button goes here </td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</body>