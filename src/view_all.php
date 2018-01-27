<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
    <Title> View All </Title>
</head>

<body>
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
                $stmt = $conn->prepare("SELECT id, themename, explanation FROM theme ORDER BY id ASC");
                $stmt->execute();
                $stmt->bind_result($id, $name, $exp);
                while ($stmt->fetch()) {
                    $id = htmlentities($id);
                    $name = htmlentities($name);
                    $exp = htmlentities($exp);
                    echo "<tr>";
                        echo "<th scope=\"row\"> $id </th>";
                        echo "<td> $name </td>";
                        echo "<td>";
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#theme_mod$id\">See More</button>";
                            // Modal 
                            echo "<div class=\"modal fade\" id=\"theme_mod$id\" role=\"dialog\">";
                            echo "<div class=\"modal-dialog\">";
                            // Modal content 
                                echo "<div class=\"modal-content\">";
                                    echo "<div class=\"modal-header\">";
                                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                                        // This is the heading
                                        echo "<h4 class=\"modal-title\">$name</h4>";
                                    echo "</div>";
                                    echo "<div class=\"modal-body\">";
                                        // This is the description
                                        echo "<p>$exp</p>";
                                    echo "</div>";
                                    echo "<div class=\"modal-footer\">";
                                        echo "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
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
                $stmt = $conn->prepare("SELECT id, entry, description, names, elements, themes FROM role ORDER BY id ASC");
                $stmt->execute();
                $stmt->bind_result($id, $entry, $desc, $names, $elements, $themes);
                while ($stmt->fetch()) {
                    $id = htmlentities($id);
                    $entry = htmlentities($entry);
                    $desc = htmlentities($desc);
                    $names = htmlentities($names);
                    $elements = htmlentities($elements);
                    $themes = htmlentities($themes);
                    echo "<tr>";
                        echo "<th scope=\"row\"> $id </th>";
                        echo "<td> $entry </td>";
                        echo "<td>";
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#role_mod$id\">See More</button>";
                            // Modal 
                            echo "<div class=\"modal fade\" id=\"role_mod$id\" role=\"dialog\">";
                                echo "<div class=\"modal-dialog\">";
                                    // Modal content 
                                    echo "<div class=\"modal-content\">";
                                        echo "<div class=\"modal-header\">";
                                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                                            // This is the heading
                                            echo "<h4 class=\"modal-title\">$entry</h4>";
                                        echo "</div>";
                                        echo "<div class=\"modal-body\">";
                                            // This is the description
                                            echo "<p>$desc</p>";
                                            echo "<h5> Example jobs: </h5>";
                                            $example_roles = explode(",", $names);
                                            $counter = 0;
                                            while($counter != count($example_roles)) {
                                                echo "<li class=\"list-group-item\">$example_roles[$counter]</li>";
                                                $counter++;   
                                            }                                 
                                        echo "</div>";
                                    echo "<div class=\"modal-footer\">";
                                        echo "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
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
                $stmt = $conn->prepare("SELECT id, elementname, description FROM element ORDER BY id ASC");
                $stmt->execute();
                $stmt->bind_result($id, $elename, $desc);
                while ($stmt->fetch()) {
                    $id = htmlentities($id);
                    $elename = htmlentities($elename);
                    $desc = htmlentities($desc);
                    echo "<tr>";
                        echo "<th scope=\"row\"> $id </th>";
                        echo "<td> $elename </td>";
                        echo "<td>";
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#ele_mod$id\">See More</button>";
                            // Modal 
                            echo "<div class=\"modal fade\" id=\"ele_mod$id\" role=\"dialog\">";
                                echo "<div class=\"modal-dialog\">";
                                    // Modal content 
                                    echo "<div class=\"modal-content\">";
                                        echo "<div class=\"modal-header\">";
                                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                                            // This is the heading
                                            echo "<h4 class=\"modal-title\">$elename</h4>";
                                    echo "</div>";
                                    echo "<div class=\"modal-body\">";
                                        // This is the description
                                        echo "<p>$desc</p>";
                                    echo "</div>";
                                    echo "<div class=\"modal-footer\">";
                                        echo "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
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