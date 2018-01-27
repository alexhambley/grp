<?php
    include "header.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
<Title> View All </Title>
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

<!-- all the THEMES -->

    <button type="button" class="btn btn-primary" onclick="showThemes(this)"> Show / Hide Themes </button>
    <div id="Themes" style="display:none;">
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
                $stmt = $conn->prepare("SELECT id, themename FROM theme ORDER BY id ASC");
                $stmt->execute();
                $stmt->bind_result($id, $name);
                while ($stmt->fetch()) {
                    $id = htmlentities($id);
                    $name = htmlentities($name);
                    echo "<tr>";
                        echo "<th scope=\"row\"> $id </th>";
                        echo "<td> $name </td>";
                        
                        // Button to take you to a description of the theme. 

                        echo "<td>";
                        echo "<button type=\"button\"";
                        echo "class=\"btn btn-info\""; 
                        echo "onclick=window.location.href=\"description_theme.php?id=$id\">"; 
                        echo "Description of Theme";
                        echo "</button>";

                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        function showThemes(myButton) {
            var x = document.getElementById("Themes");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <br>
    <br>

<!-- all the ROLES -->

    <button type="button" class="btn btn-primary" onclick="showRoles()"> Show / Hide Roles </button>
    <div id="Roles" style="display:none;">
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

                        // Button to take you to a description of the theme. 

                        echo "<td>";
                        echo "<button type=\"button\"";
                        echo "class=\"btn btn-info\""; 
                        echo "onclick=window.location.href=\"description_role.php?id=$id\">"; 
                        echo "Description of Role";
                        echo "</button>";                    

                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        function showRoles() {
            var x = document.getElementById("Roles");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <br>
    <br>

<!-- all the ELEMENTS -->

    <button type="button" class="btn btn-primary" onclick="showElements()"> Show / Hide Elements </button>
    <div id="Elements" style="display:none;">
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

                        // Button to take you to a description of the theme. 

                        echo "<td>";
                        echo "<button type=\"button\"";
                        echo "class=\"btn btn-info\""; 
                        echo "onclick=window.location.href=\"description_element.php?id=$id\">"; 
                        echo "Description of Element";
                        echo "</button>";                    

                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        function showElements() {
            var x = document.getElementById("Elements");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</body>