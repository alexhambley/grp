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
        $seletion = $_GET["selection"];
        $stmt = $conn->prepare("SELECT element.elementname, element.description
                                FROM element
                                WHERE element.elementname 
                                LIKE 'zzz'");
        $stmt->execute();        
        $numberOfRows = $stmt->num_rows();
        var_dump($numberOfRows);
        $stmt->bind_result($element_name, $desc);
        while ($stmt->fetch()) {
            $element_name = htmlentities($element_name);
            $desc = htmlentities($desc);
        }

    
    
    
    ?>


</body>



