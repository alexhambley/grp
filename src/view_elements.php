<?php 
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pick Elements</title>
</head>
<body>
    <div class="container">
        <form>
            <fieldset>
                <legend>Elements</legend>
                <label>Theme 1 - Elements</label>
                <br>
                <option selected>Please select an element</option>
                <?php
                    $themeid = trim($_GET['theme1']);
                    $stmt = $conn->prepare("SELECT elements
                                            FROM theme
                                            WHERE id = (?)");
                    $stmt->bind_param("i", $themeid);
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
                        echo "<input type=\"checkbox\" name=\"theme1\" value=\"$id\">$name<br>";
                    }
                    $stmt->close();
                ?>
                <br>

                <label>Theme 2 - Elements</label>
                <br>
                <?php
                    $themeid = trim($_GET['theme2']);
                    $stmt = $conn->prepare("SELECT elements
                                            FROM theme
                                            WHERE id = (?)");
                    $stmt->bind_param("i", $themeid);
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
                        echo "<input type=\"checkbox\" name=\"theme2\" value=\"$id\">$name<br>";
                    }
                    $stmt->close();
                ?>
                <br>

                <label>Theme 3 - Elements</label>
                <br>
                <?php
                    $themeid = trim($_GET['theme3']);
                    $stmt = $conn->prepare("SELECT elements
                                            FROM theme
                                            WHERE id = (?)");
                    $stmt->bind_param("i", $themeid);
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
                        echo "<input type=\"checkbox\" name=\"theme3\" value=\"$id\">$name<br>";
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
</html>