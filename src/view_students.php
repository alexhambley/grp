<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
    <Title> Find A Career </Title>
    <link rel="stylesheet" href="css/view_students.css" />
</head>

<body class="bg-grey">
    <div class="container">
        <form action="view_elements.php">
        <fieldset>
            <div class="text-center">
                <h1> Find a Career </h1>
            </div>
            <h4> Explanation: </h4>
            <p> All of the elements, or skills, are associated with themes. <br>
                Here, you can select the three themes that you believe are most appropiate to you, and then submit these choices. <br>
                You may also wish to select elements from all the themes.  </p>
            <label for="theme1"> Theme 1 </label>
            <br>
            <div class="select">
            <select class="custom-select" name="theme1">
                <option selected> Please select theme 1 </option>
                <?php
                    $stmt = $conn->prepare("SELECT theme_id, themename
                                            FROM theme
                                            ORDER BY theme_id ASC");
                    $stmt->execute();
                    $stmt->bind_result($id, $name);
                    while ($stmt->fetch()) {
                        $id = htmlentities($id);
                        $name = htmlentities($name);
                        echo "<option value=\"$id\">$name</option>";
                    }
                ?>
            </select>
            </div>
            <br>
<!-- Theme 2 -->
            <label for="theme2"> Theme 2 </label>
            <br>
            <div class="select">
            <select class="custom-select" name="theme2">
                <option selected> Please select theme 2 </option>
                <?php
                    $stmt = $conn->prepare("SELECT theme_id, themename
                                            FROM theme
                                            ORDER BY theme_id ASC");
                    $stmt->execute();
                    $stmt->bind_result($id, $name);
                    while ($stmt->fetch()) {
                        $id = htmlentities($id);
                        $name = htmlentities($name);
                        echo "<option value=\"$id\">$name</option>";
                    }
                ?>
            </select>
            </div>
            <br>

    <!-- Theme 3 -->
            <label for="theme3"> Theme 3 </label>
            <br>
            <div class="select">
            <select class="custom-select" name="theme3">
                <option selected>Please select theme 3</option>
                <?php
                    $stmt = $conn->prepare("SELECT theme_id, themename
                                            FROM theme
                                            ORDER BY theme_id ASC");
                    $stmt->execute();
                    $stmt->bind_result($id, $name);
                    while ($stmt->fetch()) {
                        $id = htmlentities($id);
                        $name = htmlentities($name);
                        echo "<option value=\"$id\">$name</option>";
                    }
                ?>
            </select>
            </div>
            <br>
            <br>
            <button class="btn btn-primary" type="submit">
                    Submit Theme Choices
            </button>
            <button class="btn btn-primary" type="submit" name=skip value="true">
                    Enter Element Choices Only
            </button>
        </fieldset>
    </form>
    </div>

</body>
