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
        $_SESSION['roleID'] = $_GET['id'];
        $id = $_SESSION['roleID'];
        $stmt = $conn->prepare("SELECT entry, description, names, elements, themes FROM role WHERE id = '$id'");
        $stmt->execute();
        $stmt->bind_result($entry, $desc, $names, $elements, $themes);
        while ($stmt->fetch()) {
            $entry = htmlentities($entry);
            $desc = htmlentities($desc);
            $names = htmlentities($names);
            $elements = htmlentities($elements);
            $themes = htmlentities($themes);
            echo "<h2> $entry";
            echo "<br>";
            echo "<small> $desc </small> </h2>";
            echo "<br>";
            // Puts all the jobs on a new line:
            $output = str_replace(',', '<br>', $names);
            $_SESSION['elements'] = $elements;
            $_SESSION['themes'] = $themes;
        }
        echo "<h4> Example Roles include: </h4>";
        
        // This just lists the jobs in a list - looks better. 
        echo "<ul class=\"list-group list-group-flush\">";
        $example_roles = explode("<br>", $output);
        $counter = 0;
        while($counter != count($example_roles)) {
            echo "<li class=\"list-group-item\">$example_roles[$counter]</li>";
            $counter++;
        }
        echo "</ul>";
    ?>
    <br> 

    <h3> Related Elements and their description </h3>

    <div id="element_table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        #
                    </th>
                    <th scope="col">
                        Element Name
                    </th>
                    <th scope="col">
                        Description
                    </th>
                </tr>
            </thead>
            <tbody>
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
                            echo "<tr>";
                                echo "<th scope=\"row\"> $id </th>";
                                echo "<td> $name </td>";
                                echo "<td> $desc </td>";
                            echo "</tr>";
                        }
                        $counter++;
                    }
                ?>
            </tbody>
        </table>
    </div>

    <h3> Related themes and their description </h3>

    <div id="theme_table">
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
                        Description
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $themes = $_SESSION['themes'];
                    $theme = explode(",", $themes);
                    $counter = 0;
                    while ($counter != count($theme)) {
                        // echo $theme[$counter];
                        $stmt = $conn->prepare("SELECT id, themename, explanation FROM theme WHERE theme_id = '$theme[$counter]'");
                        $stmt->execute();
                        $stmt->bind_result($id, $name, $exp);
                        while ($stmt->fetch()) {
                            $id = htmlentities($id);
                            $name = htmlentities($name);
                            $exp = htmlentities($exp);
                            echo "<tr>";
                                echo "<th scope=\"row\"> $id </th>";
                                echo "<td> $name </td>";
                                echo "<td> $exp </td>";
                            echo "</tr>";
                        }
                        $counter++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
