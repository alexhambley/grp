<?php
    session_start();
    if (!empty($_POST['theme1']))
    {
        $_SESSION['theme1'] = $_POST['theme1'];
        $_SESSION['theme2'] = $_POST['theme2'];
        $_SESSION['theme3'] = $_POST['theme3'];
    }
    else if (isset($_SESSION['theme1']))
    {
        session_destroy();
    }
    else if (!isset($_POST['skip']))
    {
        header('Location: view_students.php');
    }
    include "header.php";
    include "navbar.php";
    include "db.php";
 ?>

<!DOCTYPE html>
<html>
<head>
    <Title> Find A Career </Title>
    <link rel="stylesheet" href="css/view_students.css" />
    <script>
        function validate() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
            if (checkedOne)
                return true;
            else {
                alert("Select at least one checkbox.");
                return false;
            }
        }
    </script>
</head>
<body class="bg-grey">
    <div class="container">
        <form action="view_roles.php" onsubmit="return validate()">
      
                <div class="text-center">
                    <h1>Find Ideal Career Pathways for You</h1>
                </div>
                <h4> Explanation: </h4>
                <p> The elements below are skills that are considered desirable to various roles related to the food
                    science industry.
                    <br>
                    By selecting the skills that you feel you are competent in, the website will show you
                    roles that you may be suited for.
                    <br>
                    If you chose three themes, then we have shown below elements that are related to your choice. If not, then all 
                    elements will be shown to you. <br> <br>

                    You can click as many elements as you wish. 
                </p>


                <?php
                    if (empty($_POST['skip']))
                    {
                        $themeid = trim($_POST['theme1']);
                        if ($themeid != "D0") {
                            $stmt = $conn->prepare("SELECT themename
                                                    FROM theme
                                                    WHERE theme_id = '$themeid'");
                            $stmt->execute();
                            $stmt->bind_result($name);
                            while ($stmt->fetch()) {
                              $name = htmlentities($name);
                            }
                            echo "<label> Elements related to \"$name\" (Theme 1) </label>";
                            echo "<br>";
                            $stmt->close();
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
                            echo "<br>";
                            $stmt->close();
                        }
                        else {
                          echo "<label> Theme 1 does not have any related elements </label>";
                          echo "<br>";
                        }
                        $themeid = trim($_POST['theme2']);
                        if ($themeid != "D0") {
                            $stmt = $conn->prepare("SELECT themename
                                                    FROM theme
                                                    WHERE theme_id = '$themeid'");
                            $stmt->execute();
                            $stmt->bind_result($name);
                            while ($stmt->fetch()) {
                              $name = htmlentities($name);
                            }
                            echo "<label> Elements related to \"$name\" (Theme 2) </label>";
                            echo "<br>";
                            $stmt->close();
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
                            echo "<br>";
                            $stmt->close();
                        }
                        else {
                          echo "<label> Theme 2 does not have any related elements </label>";
                          echo "<br>";
                        }
                        $themeid = trim($_POST['theme3']);
                        if ($themeid != "D0") {
                            $stmt = $conn->prepare("SELECT themename
                                                    FROM theme
                                                    WHERE theme_id = '$themeid'");
                            $stmt->execute();
                            $stmt->bind_result($name);
                            while ($stmt->fetch()) {
                              $name = htmlentities($name);
                            }
                            echo "<label> Elements related to \"$name\" (Theme 3) </label>";
                            echo "<br>";
                            $stmt->close();
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
                          }
                          else {
                            echo "<label> Theme 3 does not have any related elements </label>";
                            echo "<br>";
                          }
                    }
                    else
                    {
                      ?>
                      <label> Elements: </label>
                      <br>
                      <?php

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
                ?>
                <br>
                <button class="btn btn-default" style="border-color: #192A6C"
                    type="submit">
                    Submit Element Choices
                </button>
                <br>
                <br>
            </fieldset>
        </form>
    </div>
</body>
<script type="text/javascript" src="js/students.js"></script>
</html>
