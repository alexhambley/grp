<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    include "credentials.php";
    if (!isset($_GET['tid']) || !isset($_GET['eid'])) {
        header("Location: search.html");
        exit;
    }
    $themeIdStr = "";
    $elementIdStr = "";
    if (trim($_GET['tid']) != "") {
        $themeIdStr = trim($_GET['tid']);
    }
    if (trim($_GET['eid']) != "") {
        $elementIdStr = trim($_GET['eid']);
    }
    $themeCondition = '';
    if ($themeIdStr != "") {
        $tmpArr = explode(",", $themeIdStr);
        $themeCondition = implode('%" OR themes LIKE "%', $tmpArr);
    }
    $themeCondition = 'themes LIKE "%'.$themeCondition.'%"';
    $elementCondition = '';
    if ($elementIdStr != "") {
        $tmpArr = explode(",", $elementIdStr);
        $elementCondition = implode('%," OR elements LIKE ",%', $tmpArr);
        $elementCondition = 'elements LIKE "%,'.$elementCondition.',%"';
    } else {
        $elementCondition = 'elements LIKE "%"';
    }
    $query_condition = 'WHERE ('.$themeCondition.') AND ('.$elementCondition.')';
    $dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn, $db_username, $db_password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $db->beginTransaction();
        $query = "SELECT * FROM role ".$query_condition;
        $stmt = $db->prepare($query);
        $stmt->execute();
        $db->commit();
    } catch (PDOException $e) {
        $db = null;
        $msg = "<h3>Error: Can't read database</h3><p>Error Info: ".$e->getMessage()."</p>";
        $msg .= "<p>Query: $query</p>";
        echo $msg;
        exit;
    }
    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
?>

<!DOCTYPE html>
<head>
    <title>Related Roles</title>
    <link rel="stylesheet" href="css/view_students.css" />
</head>

<body class="bg-grey">
    <div class="container">
    <nav class="breadcrumb">
        <li><a class="breadcrumb-item" href="view_students.php">Find a Career</a></li>
        <li><a class="breadcrumb-item" href="view_elements.php">View Elements</a></li>
        <li><span class="breadcrumb-item active">Related Roles</span></li>
    </nav>
        <div class="text-center">
            <h1> Related Roles </h1>
        </div>
        <?php
            if (count($roles) == 0) {
                echo "<h4> Your selected options have no appropriate roles. <br> Please try again with different selections. </h4>";
            } else {
                echo "<h4> Explanation: </h4>";
                echo "<p> Below are the roles that we feel suit the elements that you chose on the previous page. <br>";
                echo "You can click on each result to see more information about the role. <br>";
                echo "You may also wish to search again with different criteria. </p>";
                echo "<br>";
                $i = 0;
                while ($i != count($roles)) {
                    $temp = $roles[$i];
                    $tempID = $temp['id'];
                    echo "<ul class=\"list-group\">";
                    echo "<li class=\"list-group-item list-group-item-info\" data-toggle=\"modal\" data-target=\"#role_mod$tempID\">";
                    echo($temp['entry']);
                    echo "</li>";
                    echo "<li class=\"list-group-item\">";
                    echo($temp['description']);
                    echo "</li>";
                    echo "<div class=\"modal fade\" id=\"role_mod$tempID\" role=\"dialog\">";
                    echo "<div class=\"modal-dialog\">";
                    // Modal content
                    echo "<div class=\"modal-content\">";
                    echo "<div class=\"modal-header\">";
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                    // This is the heading
                    echo "<h4 class=\"modal-title\">";
                    echo($temp['entry']);
                    echo "</h4>";
                    echo "</div>";
                    echo "<div class=\"modal-body\">";
                    // This is the description
                    echo "<p>";
                    echo($temp['description']);
                    echo "</p>";
                    echo "<h5> Example jobs: </h5>";
                    $example_roles = explode(",", $temp['names']);
                    $counter = 0;
                    while ($counter != count($example_roles)) {
                        echo "<li class=\"list-group-item\">$example_roles[$counter]</li>";
                        $counter++;
                    }
                    echo "</div>";
                    echo "<div class=\"modal-footer\">";
                    echo "<button type=\"button\" class=\"btn btn-default\" onclick='gotoRole($tempID)'> See More </button>";
                    echo "<button type=\"button\" class=\"btn btn-default\"> Generate PDF </button>";
                    echo "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"> Close </button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</ul>";
                    $i++;
                }
            }
        ?>
        <br>
        <button class="btn btn-primary" type="submit" onclick="window.history.back()">
             Choose Again
        </button>
    </div>
    <script>
        function gotoRole(q) {
            window.location = "roleProfile.php?id="+q;
        }
    </script>
</body>
</html>
