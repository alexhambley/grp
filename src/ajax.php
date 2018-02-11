<!DOCTYPE html>
<?php
    include "db.php";
    if (isset($_POST['search'])) {
        $searchresult = $_POST['search'];
        $stmt = $conn->prepare("SELECT element.elementname
                                FROM element
                                WHERE lower(element.elementname)
                                LIKE lower('%$searchresult%')
                                UNION
                                SELECT role.entry
                                FROM role
                                WHERE lower(role.entry)
                                LIKE lower('%$searchresult%')
                                UNION
                                SELECT theme.themename
                                FROM theme
                                WHERE lower(theme.themename)
                                LIKE lower('%$searchresult%')");
        $stmt->execute();
        $stmt->bind_result($searchresult_show);
        while ($stmt->fetch()) {
            $searchresult_show = htmlentities($searchresult_show);
            echo "<ul>";
            echo "<li onclick='fill'";
            echo "(\"echo $searchresult_show;\")'>";
            echo "<a>";
            echo $searchresult_show;
            echo "</li></a>";
            echo "</ul>";
        }
        
    }
?>

