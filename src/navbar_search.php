<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>
<!DOCTYPE html>
<head>
    <Title> Search Results </Title>
    <link rel="stylesheet" href="css/view_students.css" />

</head>
<body class="bg-grey">
    <div class="container">
        <div class="text-center">
            <?php
                $selection = $_GET["selection"];
                echo "<h1>Search Results for \"$selection\"</h1>";
            ?>
        </div>
        <h4> Explanation: </h4>
        <p> Please click on the result for more information about the role, theme or element. </p>
        <?php
        // Get any roles that they may have searched for.
        $stmt = $conn->prepare("SELECT role.id, role.entry, role.description, role.names, role.elements, role.themes
                                FROM role
                                WHERE lower(role.entry)
                                LIKE lower('%$selection%')");
        $stmt->execute();
        $stmt->bind_result($id, $role_entry, $desc, $names, $elements, $themes);
        ?>
        <div class="text-center">
            <h1>Roles</h1>
        </div>
        <?php
        while ($stmt->fetch()) {
            $id = htmlentities($id);
            if (!empty($id)) {
                $role_entry = htmlentities($role_entry);
                $desc = htmlentities($desc);
                $names = htmlentities($names);
                $elements = htmlentities($elements);
                $themes = htmlentities($themes);
                echo "<ul class=\"list-group\">";
                echo "<li class=\"list-group-item list-group-item-info\" data-toggle=\"modal\" data-target=\"#role_mod$id\">$role_entry</li>";
                echo "<li class=\"list-group-item\">$desc</li>";
                // Modal
                echo "<div class=\"modal fade\" id=\"role_mod$id\" role=\"dialog\">";
                echo "<div class=\"modal-dialog\">";
                // Modal content
                echo "<div class=\"modal-content\">";
                echo "<div class=\"modal-header\">";
                echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                // This is the heading
                echo "<h4 class=\"modal-title\">$role_entry</h4>";
                echo "</div>";
                echo "<div class=\"modal-body\">";
                // This is the description
                echo "<p>$desc</p>";
                echo "<h5> Example jobs: </h5>";
                $example_roles = explode(",", $names);
                $counter = 0;
                while ($counter != count($example_roles)) {
                    echo "<li class=\"list-group-item\">$example_roles[$counter]</li>";
                    $counter++;
                }
                echo "</div>";
                echo "<div class=\"modal-footer\">";
                echo "<button type=\"button\" class=\"btn btn-default\" onclick='gotoRole($id)'> See More </button>";
                echo "<button type=\"button\" class=\"btn btn-default\"> Generate PDF </button>";
                echo "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"> Close </button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</ul>";
            }
        }
        $stmt->close();

        // Get any themes that they may have searched for.
        $stmt = $conn->prepare("SELECT theme.id, theme.theme_id, theme.themename, theme.explanation, theme.elements
                                FROM theme
                                WHERE lower(theme.themename)
                                LIKE lower('%$selection%')");
        $stmt->execute();
        $numberOfRows = $stmt->num_rows();
        $stmt->bind_result($id, $tid, $tname, $exp, $elements);
        ?>
        <div class="text-center">
            <h1>Themes</h1>
        </div>
        <?php
        while ($stmt->fetch()) {
            $id = htmlentities($id);
            if (!empty($id)) {
                $tid = htmlentities($tid);
                $tname = htmlentities($tname);
                $exp = htmlentities($exp);
                $elements = htmlentities($elements);
                echo "<ul class=\"list-group\">";
                echo "<li class=\"list-group-item list-group-item-info\" data-toggle=\"modal\" data-target=\"#theme_mod$id\"> $tname</li>";
                echo "<li class=\"list-group-item\">$exp</li>";
                // Modal
                echo "<div class=\"modal fade\" id=\"theme_mod$id\" role=\"dialog\">";
                echo "<div class=\"modal-dialog\">";
                // Modal content
                echo "<div class=\"modal-content\">";
                echo "<div class=\"modal-header\">";
                echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                // This is the heading
                echo "<h4 class=\"modal-title\">$tname</h4>";
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
                echo "</ul>";
            }
        }
        $stmt->close();
            // Get any elements that they may have searched for.
            $stmt = $conn->prepare("SELECT element.id, element.elementname, element.description
                                    FROM element
                                    WHERE lower(element.elementname)
                                    LIKE lower('%$selection%')");
            $stmt->execute();
            $stmt->bind_result($id, $element_name, $desc);
            ?>
            <div class="text-center">
                <h1>Elements</h1>
            </div>
            <?php
            while ($stmt->fetch()) {
                $id = htmlentities($id);
                // var_dump($id);
                if (!empty($id)) {
                    $element_name = htmlentities($element_name);
                    $desc = htmlentities($desc);
                    echo "<ul class=\"list-group\">";
                    echo "<li class=\"list-group-item list-group-item-info\" data-toggle=\"modal\" data-target=\"#ele_mod$id\"> $element_name </li>";
                    echo "<li class=\"list-group-item\">$desc</li>";
                    // Modal
                    echo "<div class=\"modal fade\" id=\"ele_mod$id\" role=\"dialog\">";
                    echo "<div class=\"modal-dialog\">";
                    // Modal content
                    echo "<div class=\"modal-content\">";
                    echo "<div class=\"modal-header\">";
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                    // This is the heading
                    echo "<h4 class=\"modal-title\">$element_name</h4>";
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
                    echo "</ul>";
                }
            }
            $stmt->close();
            ?>
    </div>
    <script>
        function gotoRole(q) {
            window.location = "roleProfile.php?id="+q;
        }
    </script>
</body>
