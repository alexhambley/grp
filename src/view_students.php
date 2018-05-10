<?php
    session_start(); 
    include "header.php";
    include "navbar.php";
    include "db.php";
?>

<!DOCTYPE html>
<head>
    <Title> Find A Career </Title>
    <link rel="stylesheet" href="css/view_students.css" />
    <script>
        function validateForm() {
            var theme1 = document.forms["mainform"]["theme1"].value;
            var theme2 = document.forms["mainform"]["theme2"].value;
            var theme3 = document.forms["mainform"]["theme3"].value;
            if (theme1 == theme2 || theme2 == theme3 || theme1 == theme3) {            
                alert("Must select three different themes.")
                return false;
            }
            else
                return true;
            }
    </script>
</head>

<body class="bg-grey">
    <div class="container">
        <form action="view_elements.php" method="POST" name="mainform"  onsubmit="return validateForm()">
            <div class="text-center">
                <h1> Find Ideal Career Pathways for You </h1>
            </div> 
            <h4> Explanation: </h4>
                    <p>There are 8 themes and 48 elements. These 48 elements are associated to one or more themes. <br>
                    Here, you can select up to 3 themes you feel are a personal strength <br>
                    Alternatively, you can click on ‘Enter Element Choices Only’ to focus on selecting specific elements instead </p>

            <div class="row">
                <div class="col-sm-8">
                   
                    <label for="theme1"> Theme 1 </label>
                    <br>
                    <div class="select">
                    <select class="custom-select" name="theme1" required>
                        <option value="" selected> Please select theme 1 </option>
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
                    <label for="theme2"> Theme 2 </label>
                    <br>
                    <div class="select">
                    <select class="custom-select" name="theme2" required>
                        <option value="" selected> Please select theme 2 </option>
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
                    <label for="theme3"> Theme 3 </label>
                    <br>
                    <div class="select">
                    <select class="custom-select" name="theme3" required>
                        <option value="" selected>Please select theme 3</option>
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
                    <button class="btn btn-default" type="submit" style="border-color: #192A6C">
                        Submit Theme Choices
                    </button> 
                    <p>
                    </p>
                </fieldset>
            </form>
            <form action="view_elements.php">
                <button class="btn btn-default" type="submit" name=skip value="true" style="border-color: #192A6C">
                    Enter Element Choices Only
                </button>
            </form>
            
        </div>
        <div class="col-sm-4">
            <div class="wheel-image">
                <img src="img/wheel.png" alt = "Theme">
            </div>
        </div>
    </div>

 
</body>
