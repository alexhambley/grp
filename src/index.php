<?php
    include 'credentials.php';

    $dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
    	$db->beginTransaction();
    	$query = "SELECT * FROM role";
    	$stmt = $db->prepare($query);

    	$stmt->execute();
    	$db->commit();
    } catch (PDOException $e) {
    	$db = NULL;
    	$msg = "<h3>Error: Can't read database</h3><p>Error Info: ".$e->getMessage()."</p>";
    	$msg .= "<p>Query: $query</p>";
    	echo $msg;
    	exit;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = NULL;

    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="css/view_all.css?"/>
    <Title> View All </Title>
</head>

<body class="bg-grey" style="background-color: #f6f6f6">
    <section id="banner">
        <div id="text" style="color: white">
            <h1>Welcome to the Competencies for Food Graduate Careers Toolkit</h1>

            <p>This is an interactive online tool where you can explore a range of roles that food science graduates can enter 
                the food industry with, including in retail and research. The industry has identified key competencies that are 
                desirable for these roles. 
                Below you can identify which competencies are desired in the roles that you are interested in. You can see what 
                you already feel that you are strong in and where there are gaps, and identify a personal development plan.
                You can also find out about the themes and elements the industry has. <br>
                <br>
                Alternatively if you click on the ‘Find a Career’ link, you can select the competencies that you feel you are strong 
                in (there are themes and specific elements) and see the roles that may be initially suitable for you.</p>
 
        </div>
    </section>
    <div class="row">
        <div class="col-sm-8" style="padding-left: 30px;">
            <h4 style="color: #1c2c67;"> Explaination: </h4>
            <p> Select roles, themes or elements to see a list of all roles, themes or elements. <br> 
            You can then choose to see more information for an individual option by selecting 'See More'. <br>
            For more details on how the Competencies for Food Graduate Careers was developed, you can view the 
            <a href='https://www.ifst.org/knowledge-centre-other-knowledge/competencies-food-graduate-careers'> IFST </a> website. 
            </p>
        </div>
        <div class="col-sm-4">
            <div class="wheel-image">
                <img src="img/wheel.png" alt = "Theme">
            </div>
        </div>
     </div>

    <div class="container-fluid text-center"> 
    <section>
        <!-- Roles -->
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="img/roles.jpg" alt="Roles">
                <button type="button" class="btn btn-default" style="border-color: #192A6C" onclick="showRoles()"> Show / Hide Roles </button>
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
            </div>
        </div>
        <!-- Themes -->
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="img/themes.jpg" alt = "Theme">
                <button type="button" class="btn btn-default" style="border-color: #192A6C" onclick="showThemes(this)"> Show / Hide Themes </button>
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
            </div>
        </div>
        <!-- Elements -->
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="img/elements.jpg">
                <button type="button" class="btn btn-default" style="border-color: #192A6C" onclick="showElements()"> Show / Hide Elements </button>
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
                </div>
            </div>
        <div class="col-sm-0.5">
        </div>
    </div>
</body>
