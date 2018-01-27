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
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#myModal$id\">See More</button>";
                        
                            // Modal 
                            echo "<div class=\"modal fade\" id=\"myModal$id\" role=\"dialog\">";
                            echo "<div class=\"modal-dialog\">";

                            // Modal content 
                                echo "<div class=\"modal-content\">";
                                    echo "<div class=\"modal-header\">";
                                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";

                                        // This is the heading
                                        echo "<h4 class=\"modal-title\">$name</h4>";
                                        
                                    echo "</div>";
                                    echo "<div class=\"modal-body\">";
                                        // This is the description!
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

                        // Button to take you to a description of the theme. 


                        // TODO 
                        // I cant seem to fix the ID issue - the modal above for the themes 
                        // works because of the id assigned at #myModal$id - I have done the same
                        // thing below and it doesn't work
 
                        echo "<td>";
                        echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#myModal$id\">See More</button>";
                        
                        // Modal 
                        echo "<div class=\"modal fade\" id=\"myModal$id\" role=\"dialog\">";
                        echo "<div class=\"modal-dialog\">";

                        // Modal content 
                            echo "<div class=\"modal-content\">";
                                echo "<div class=\"modal-header\">";
                                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";

                                    // This is the heading
                                    echo "<h4 class=\"modal-title\">$entry</h4>";
                                    
                                echo "</div>";
                                echo "<div class=\"modal-body\">";
                                    // This is the description!
                                    echo "<p>$desc</p>";
                                    echo "<h5> Examples jobs: </h5>";
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


                        

                        // var_dump($desc);
                           
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