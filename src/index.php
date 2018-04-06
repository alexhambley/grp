<?php
<<<<<<< HEAD

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


    //echo "<pre>";
    //var_dump($result);
    //exit;

=======
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
>>>>>>> dev
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/view_all.css" />
    <Title> View All </Title>
</head>

<body class="bg-grey">
    <section id="banner">
        <div id="text">
            <h1> Welcome to the Competencies for Food Graduate Careers Toolkit </h1>
            <p> On this site, you can select your competencies, either as key themes, roles, or elements that 
                you feel you are strong in, and learn more about the individual roles available to you as a food graduate. </p>
        </div>
    </section>
    <div class="container-fluid text-center">

    <section>
        <!-- Roles -->
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="img/roles.jpg" alt="Roles">
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
            </div>
        </div>
        <!-- Themes -->
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="img/themes.jpg" alt = "Theme">
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
            </div>
        </div>
        <!-- Elements -->
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="img/elements.jpg">
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
                </div>
            </div>
        <div class="col-sm-0.5">
        </div>
    </div>
</body>
