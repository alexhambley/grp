<?php
    include "header.php";
    include "db.php";
    include "js/footer.js";
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
            <li class="active">
                <a href="view_students.php"> Students </a>
            </li>
            <li>
                <a href="view_all.php"> View All </a>
            </li>
            <li>
                <a href="admin_login.php"> Admin </a>
            </li>
        </ul>
    </nav>
    <br>

<!-- Search Bar goes here -->



<!-- Form Starts here
     Theme 1 -->

<!-- See Trello if confused.
     The idea is that user chooses three themes, and then we show the 
     elements from these three themes. 

     If we show all 40+ elements, that is poor UI design. 
     User chooses 3 different themes, then 10 correspondng elements. 
     We then show the best matching roles.  -->

    <form>
        <fieldset>
            <legend> Themes </legend>
            <label for="theme1"> Theme 1 </label> 
            <br>
            <select class="custom-select">
                <option selected>Please select theme 1 </option>
                <?php
                    $stmt = $conn->prepare("SELECT id, themename 
                                            FROM theme 
                                            ORDER BY id ASC");
                    $stmt->execute();
                    $stmt->bind_result($id, $name);
                    while ($stmt->fetch()) {
                        $id = htmlentities($id);
                        $name = htmlentities($name);
                        echo "<option value=\"$id\">$name</option>";
                    }
                ?>
            </select>
            <br>
<!-- Theme 2 -->
            <label for="theme2"> Theme 2 </label> 
            <br>
            <select class="custom-select">
                <option selected> Please select theme 2 </option>
                <?php
                    $stmt = $conn->prepare("SELECT id, themename 
                                            FROM theme 
                                            ORDER BY id ASC");
                    $stmt->execute();
                    $stmt->bind_result($id, $name);
                    while ($stmt->fetch()) {
                        $id = htmlentities($id);
                        $name = htmlentities($name);
                        echo "<option value=\"$id\">$name</option>";
                    }
                ?>
            </select>
            <br>

    <!-- Theme 3 -->
            <label for="theme3"> Theme 3 </label> 
            <br>
            <select class="custom-select">
                <option selected>Please select theme 3</option>
                <?php
                    $stmt = $conn->prepare("SELECT id, themename 
                                            FROM theme 
                                            ORDER BY id ASC");
                    $stmt->execute();
                    $stmt->bind_result($id, $name);
                    while ($stmt->fetch()) {
                        $id = htmlentities($id);
                        $name = htmlentities($name);
                        echo "<option value=\"$id\">$name</option>";
                    }
                ?>
            </select>
            <br>
            <br>
            <button class="btn btn-primary" 
                    type="submit"
                    onclick="validateForm()">
                    Submit Theme Choices
            </button>
        </fieldset>
    </form>

    <script>
        function validateForm() {

            if (confirm("Blah Blah Blah") == true) {
                location.reload;
            } else {
                location.reload; 
            }
        }
    </script>
</body>



