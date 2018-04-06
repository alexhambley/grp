<!-- <!DOCTYPE html> -->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
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
                                WHERE lower(role.entry) or lower(role.names)
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
            echo "<li class=\"result\"";
            echo "id=\"$searchresult_show\"";
            echo "onclick=\"fill('$searchresult_show')\">";
            echo $searchresult_show;
            echo "</li>";
            echo "</ul>";
        }
    }
?>
<script> 
function getResult(str) {
    $("#result").load("search.php?"+str);
}
</script>