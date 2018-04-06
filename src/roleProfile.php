<?php
    session_start();
    if (trim($_GET['id']) == "" || empty($_GET['id'])) {
        exit("No parameters.");
    }
    if (!ctype_digit($_GET['id']) || intval($_GET['id']) < 1 || intval($_GET['id']) > 14) {
        exit("Invalid parameters.");
    }
    $roleId = trim($_GET['id']);
    include 'credentials.php';
    $dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
    	$db->beginTransaction();
    	$query = "SELECT * FROM role WHERE id=:id";
    	$stmt = $db->prepare($query);
    	$stmt->bindParam(":id",$roleId,PDO::PARAM_INT);
    	$stmt->execute();
    	$db->commit();
    } catch (PDOException $e) {
    	$db = NULL;
    	$msg = "<h3>Error: Can't read database</h3><p>Error Info: ".$e->getMessage()."</p>";
    	$msg .= "<p>Query: $query</p>";
    	echo $msg;
    	exit;
    }
    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $tmparr = explode(",",$roles[0]['themes']);
    $condition = implode("' OR theme_id='", $tmparr);
    try {
    	$db->beginTransaction();
    	$query = "SELECT * FROM theme WHERE theme_id='$condition'";
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
    $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $tmpStr = ltrim($roles[0]['elements'],",");
    $tmpStr = rtrim($tmpStr,",");
    $tmparr = explode(",",$tmpStr);
    $condition = implode("' OR id='", $tmparr);
    try {
    	$db->beginTransaction();
    	$query = "SELECT id, elementname FROM element WHERE id='$condition'";
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
    $element = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    $mainTitle = $roles[0]["entry"];
    $mainDescr = $roles[0]["description"];
    $roleNames = explode(",",$roles[0]["names"]);

    $subTitle = "So What is Desirable for a ".$mainTitle;
    $subText = "
    <p>14 typical graduate roles have been identified and this is one of them.  Industry have outlined what they think may be the most valuable skills, knowledge and behaviours for this role.<br>
    They are outlined in <b>8 general themes</b>. Also there is more detail provided on specific elements (there are <b>48 elements grouped into 11 Zones</b>). Below is the profile for this role.</p>
    ";

    if (substr($mainTitle, 0, 3) == "NPD") {
        $tmparr = explode("NPD",$mainTitle);
        $mainTitle = implode("NPD*",$tmparr);
    }
    $themeOrderArray = explode(",",$roles[0]['themes']);
    $i = 0;
    $leftList = "";
    $rightList = "";

    foreach ($roleNames as $item) {
        if ($i % 2 == 0) {
            $leftList .= "<li>$item</li>";
        } else {
            $rightList .= "<li>$item</li>";
        }
        $i++;
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CFGC Role Profile</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/shared.css">
        <style type="text/css">
            h1 { line-height: 35px; color: cornflowerblue; font-weight: 400; text-transform: uppercase; }
            h2 { background-color: cornflowerblue; color: white; text-transform:uppercase; text-align: center; padding: 10px; margin: 0px;}
            h3 { line-height: 25px; }

            table { border-spacing: 2px; border-collapse: separate;}
            td { padding: 10px; vertical-align: top; }

            .boxLightBlue {
                padding: 15px; background-color:aliceblue;
            }
            .boxLightBlue p { font-size: 15px; line-height: 20px; font-weight: 300; }


            .boxDarkBlue {
                padding: 15px; background-color:cornflowerblue;
            }
            .boxDarkBlue p { color: white; font-size: 14px; line-height: 16px; }
            .boxDarkBlue h3 { color: white; font-weight: 300; margin: 0px; text-transform: uppercase; }
            .boxDarkBlue a { color:yellow; }


            .boxElement {
                background-color:lightskyblue; padding: 10px; display: inline-block; text-align: left; max-width: 400px; width: 100%;
            }


            .tableCellLightBlue { background-color:lightskyblue; font-size: 14px; }
            .tableCellDarkBlue { background-color:cornflowerblue; color: white; font-weight: bold;  font-size: 13px; }


            input[type="button"] {
                height:45px; font-size:15px; font-weight: bold; border-radius:0px; padding-left:15px; padding-right:15px; line-height: 40px; -webkit-appearance:none;  -moz-appearance:none;  -ms-appearance:none; appearance:none; margin: 5px; width:200px; border-radius: 5px; box-shadow: 0px 1px 2px #666;
                color: #fff; background-color: grey; border: none; text-transform: uppercase;
            }

        </style>
    </head>

    <body>

        <div class="mainlayer">
            <h1><?php echo $mainTitle; ?></h1>
            <p><?php echo $mainDescr; ?></p>
            <?php
                if (substr($mainTitle, 0, 3) == "NPD") {
                    echo "<p align='right'><em>*NPD = New Product Development</em></p>";
                }
            ?>
            <h2>Key Features</h2>
            <div class="boxLightBlue">
                <h3>Typical Role Names</h3>
                <div align="center">
                    <table width="100%">
                        <tr>
                            <td width="50%"><?php echo $leftList; ?></td>
                            <td width="50%"><?php echo $rightList; ?></td>
                        </tr>
                    </table>

                </div>
                <h3><?php echo $subTitle; ?></h3>
                <div><?php echo $subText; ?></div>

                <h3>Desirable Themes for this Role</h3>
                <p style="color:green">Green: Themes you have</p>
                <p style="color:red">Red: Themes to improve</p>

                <div align="center">
                    <table width="90%">
                        <?php

                        foreach ($themeOrderArray as $themeId) {
                            foreach ($themes as $item) {
                                if ($item["theme_id"] == $themeId) {
                                    $themeName = $item["themename"];
                                    $themeText = $item["explanation"];

                                    if ($_SESSION['theme1'] != $themeId &&
                                        $_SESSION['theme2'] != $themeId &&
                                        $_SESSION['theme3'] != $themeId) {
                                        echo "
                                        <tr>
                                            <td width='7%' class='tableCellLightBlue'><b>$themeId</b></td>
                                            <td width='33%' class='tableCellDarkBlue' style='color:red'>$themeName</td>
                                            <td width='60%' class='tableCellLightBlue'>$themeText</td>
                                        </tr>
                                        ";
                                    }
                                    else {
                                        echo "
                                        <tr>
                                            <td width='7%' class='tableCellLightBlue'><b>$themeId</b></td>
                                            <td width='33%' class='tableCellDarkBlue' style='color:green'>$themeName</td>
                                            <td width='60%' class='tableCellLightBlue'>$themeText</td>
                                        </tr>
                                        ";
                                    }

                                }
                            }
                        }
                        ?>
                    </table>
                </div>
                <h3>Desirable Elements for this Role</h3>
                <p style="color:green">Green: Elements you have</p>
                <p style="color:red">Red: Elements to improve</p>
                <div align="center">
                    <div class="boxElement">
                    <?php
                        foreach ($element as $item) {
                            if (array_search($item['id'], $_SESSION['selectedElement']) == FALSE) {
                                echo "<span style='color:red'>".$item['elementname']."</span><br>";
                            }
                            else {
                                echo "<span style='color:green'>".$item['elementname']."<br>";
                            }

                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="boxDarkBlue">
                <h3>Competencies for Food Graduate Careers<img src="img/wheel.png?id=<?php echo time(); ?>" width="153" height="150" style="float: right; margin: 10px 0px 10px 20px;" /></h3>
                <p>Find out about more technical graduate roles in the food industry and what may be best suited to you in developing your career on  XXXX</p>

                <p>
                    <img src="img/uon-logo.png" width="140" height="52" style="float: left; margin: 10px 20px 10px 0px;" />
                    This material has been developed with full food industry involvement to support new graduates, employers and degree educators.
                </p>

                <p>For more information please contact <a href="mailto:emma.weston@nottingham.ac.uk">emma.weston@nottingham.ac.uk</a></p>
            </div>
        </div>
        <p align="center">
            <input type="button" value="See Other Roles" onclick="window.history.back()" />
        </p>
    </body>
</html>
