<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
    <Title> View All </Title>
</head>

<body>
    <button type="button" class="btn btn-primary" onclick="showThemes(this)"> Show / Hide Themes </button>
    <div id="Themes" style="display:none;">
        <?php
            include "view_all_themes.php"
        ?>

    </div>
    <script>
        function showThemes(myButton) {
            var x = document.getElementById("Themes");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <br>
    <br>
    <button type="button" class="btn btn-primary" onclick="showRoles()"> Show / Hide Roles </button>
    <div id="Roles" style="display:none;">
    <?php
        include "view_all_roles.php"
    ?>
        
    </div>
    <script>
        function showRoles() {
            var x = document.getElementById("Roles");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <br>
    <br>
    <button type="button" class="btn btn-primary" onclick="showElements()"> Show / Hide Elements </button>
    <div id="Elements" style="display:none;">
    <?php
        include "view_all_elements.php"
    ?>
        
    </div>
    <script>
        function showElements() {
            var x = document.getElementById("Elements");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</body>