<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();

    $_SESSION['theme1'] = $_GET['theme1'];
    $_SESSION['theme2'] = $_GET['theme2'];
    $_SESSION['theme3'] = $_GET['theme3'];
 ?>

<!DOCTYPE html>
<html>
<head>
    <Title> Find A Career </Title>
    <link rel="stylesheet" href="css/view_students.css" />
</head>
<body>
    <div class="container" style="padding-top: 10px;">
        <form action="view_roles.php">
            <fieldset>
                <legend class="legend"> Find a Career </legend>
                <h4> Explanation: </h4>
                <p> Below is a list of elements.
                    <br>
                    These elements are skills that are deemed critical to various roles related to the food
                    science industry.
                    <br>
                    By selecting the skills that you feel you are competent in, the website will show you
                    roles that you may be suited for.
                    <br>
                    If you chose three themes, then these are related to your choice. If not, then all the
                    elements will be shown to you.
                </p>

                <label> Elements related to Theme 1 </label>
                <br>
                <?php
                    if (empty($_GET['skip']))
                    {
                        $themeid = trim($_GET['theme1']);
                        $stmt = $conn->prepare("SELECT elements
                                                FROM theme
                                                WHERE theme_id = (?)");
                        $stmt->bind_param("s", $themeid);
                        $stmt->execute();
                        $stmt->bind_result($elements);
                        $stmt->fetch();
                        $stmt->close();

                        $elementArray = explode(",", $elements);

                        $stmt = $conn->prepare("SELECT id, elementname
                                                FROM element
                                                WHERE id = (?)
                                                ORDER BY id ASC");
                        foreach ($elementArray as $value) {
                            $value = (int)$value;
                            $stmt->bind_param("i", $value);
                            $stmt->execute();
                            $stmt->bind_result($id, $name);
                            $stmt->fetch();
                            $id = htmlentities($id);
                            $name = htmlentities($name);
                            echo "<input type=\"checkbox\" name=\"selectedElement[]\" value=\"$id\" style=\"margin-right:10px;\">$name<br>";
                        }
                    }
                    else
                    {
                        $stmt = $conn->prepare("SELECT id, elementname 
                                                FROM element 
                                                ORDER BY id ASC");
                        $stmt->execute();
                        $stmt->bind_result($id, $elementname);
                        while ($stmt->fetch()) {
                            $id = htmlentities($id);
                            $elementname = htmlentities($elementname);
                            echo "<input type=\"checkbox\" name=\"selectedElement[]\" value=\"$id\" style=\"margin-right:10px;\">$elementname<br>";
                        }
                    }
                    $stmt->close();
                ?>
                <br>


                <label> Elements related to Theme 2 </label>
                <br>
                <?php
                    $themeid = trim($_GET['theme2']);
                    $stmt = $conn->prepare("SELECT elements
                                            FROM theme
                                            WHERE theme_id = (?)");
                    $stmt->bind_param("s", $themeid);
                    $stmt->execute();
                    $stmt->bind_result($elements);
                    $stmt->fetch();
                    $stmt->close();

                    $elementArray = explode(",", $elements);

                    $stmt = $conn->prepare("SELECT id, elementname
                                            FROM element
                                            WHERE id = (?)
                                            ORDER BY id ASC");

                    foreach ($elementArray as $value) {
                        $value = (int)$value;
                        $stmt->bind_param("i", $value);
                        $stmt->execute();
                        $stmt->bind_result($id, $name);
                        $stmt->fetch();
                        $id = htmlentities($id);
                        $name = htmlentities($name);
                        echo "<input type=\"checkbox\" name=\"selectedElement[]\" value=\"$id\" style=\"margin-right:10px;\">$name<br>";
                    }
                    $stmt->close();
                ?>
                <br>

                <label> Elements related to Theme 3 </label>
                <br>
                <?php
                    $themeid = trim($_GET['theme3']);
                    $stmt = $conn->prepare("SELECT elements
                                            FROM theme
                                            WHERE theme_id = (?)");
                    $stmt->bind_param("s", $themeid);
                    $stmt->execute();
                    $stmt->bind_result($elements);
                    $stmt->fetch();
                    $stmt->close();

                    $elementArray = explode(",", $elements);

                    $stmt = $conn->prepare("SELECT id, elementname
                                            FROM element
                                            WHERE id = (?)
                                            ORDER BY id ASC");

                    foreach ($elementArray as $value) {
                        $value = (int)$value;
                        $stmt->bind_param("i", $value);
                        $stmt->execute();
                        $stmt->bind_result($id, $name);
                        $stmt->fetch();
                        $id = htmlentities($id);
                        $name = htmlentities($name);
                        echo "<input type=\"checkbox\" name=\"selectedElement[]\" value=\"$id\" style=\"margin-right:10px;\">$name<br>";
                    }
                    $stmt->close();
                ?>
                <br><br>
                <button class="btn btn-primary"
                    type="submit">
                    Submit Element Choices
                </button>
            </fieldset>
        </form>
    </div>
</body>
<script type="text/javascript" src="js/students.js"></script>
</html>
