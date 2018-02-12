<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>
<!DOCTYPE html>
<head>
    <Title> Search Result </Title>
</head>
<body>
    <?php
        $selection = $_GET["selection"];
        // var_dump($selection);
        // Get any elements that they may have searched for. 
        $stmt = $conn->prepare("SELECT element.id, element.elementname, element.description
                                FROM element
                                WHERE lower(element.elementname)
                                LIKE lower('%$selection%')");
        $stmt->execute();        
        $stmt->bind_result($id, $element_name, $desc);
        echo "<h4> Elements </h4>";
        while ($stmt->fetch()) {
            $id = htmlentities($id);
            // var_dump($id);
            if (!empty($id)) {
                $element_name = htmlentities($element_name);
                $desc = htmlentities($desc);
                echo "<ul class=\"list-group\">";
                echo "<li class=\"list-group-item list-group-item-info\">$element_name</li>";
                echo "<li class=\"list-group-item\">$desc</li>";
                echo "</ul>";
            }
        }
        $stmt->close();
        // Get any roles that they may have searched for. 
        $stmt = $conn->prepare("SELECT role.id, role.entry, role.description, role.names, role.elements, role.themes
                                FROM role
                                WHERE lower(role.entry)
                                LIKE lower('%$selection%')");
        $stmt->execute();        
        $stmt->bind_result($id, $role_entry, $desc, $names, $elements, $themes);
        echo "<h4> Roles </h4>";
        while ($stmt->fetch()) {
            $id = htmlentities($id);
            if (!empty($id)) {
                $role_entry = htmlentities($role_entry);
                $desc = htmlentities($desc);
                $names = htmlentities($names);
                $elements = htmlentities($elements);
                $themes = htmlentities($themes);
                echo "<ul class=\"list-group\">";
                echo "<li class=\"list-group-item list-group-item-info\">$role_entry</li>";
                echo "<li class=\"list-group-item\">$desc</li>";
                echo "</ul>";
            } 
        }          
        $stmt->close();
        // Get any roles that they may have searched for. 
        $stmt = $conn->prepare("SELECT theme.id, theme.theme_id, theme.themename, theme.explanation, theme.elements
                                FROM theme
                                WHERE lower(theme.themename)
                                LIKE lower('%$selection%')");
        $stmt->execute();        
        $numberOfRows = $stmt->num_rows();
        $stmt->bind_result($id, $tid, $tname, $exp, $elements);
        echo "<h4> Themes </h4>";
        while ($stmt->fetch()) {
            $id = htmlentities($id);
            if (!empty($id)) {
                $tid = htmlentities($tid);
                $tname = htmlentities($tname);
                $exp = htmlentities($exp);
                $elements = htmlentities($elements);
                echo "<ul class=\"list-group\">";
                echo "<li class=\"list-group-item list-group-item-info\">$tname</li>";
                echo "<li class=\"list-group-item\">$exp</li>";
                echo "</ul>";
            }
        }
        $stmt->close();
    ?>
</body>