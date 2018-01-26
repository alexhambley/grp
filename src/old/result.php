<?php

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


    //--- Generate SQL condition string    
    $themeCondition = '';
    if ($themeIdStr != "") {
        $tmpArr = explode(",",$themeIdStr);
        $themeCondition = implode('%" OR themes LIKE "%',$tmpArr);
    }
    $themeCondition = 'themes LIKE "%'.$themeCondition.'%"';
        
    $elementCondition = '';
    if ($elementIdStr != "") {
        $tmpArr = explode(",",$elementIdStr);
        $elementCondition = implode('%," OR elements LIKE ",%',$tmpArr);
        $elementCondition = 'elements LIKE "%,'.$elementCondition.',%"';
    } else {
        $elementCondition = 'elements LIKE "%"';
    }

        
        
        
    $query_condition = 'WHERE ('.$themeCondition.') AND ('.$elementCondition.')';
    //echo $query_condition;


        
        
        
        
    include 'credentials.php';

    $dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $pdo = new PDO($dsn,$db_username,$db_password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    //----- Get Role
    try {
    	$db->beginTransaction();
    	$query = "SELECT * FROM role ".$query_condition;
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

    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);    
        
    //echo "<pre>";
    //var_dump($roles);
    //echo "</pre>";    
        
    $db = null;
?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CFGC Role Search</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        

        <link type="text/css" rel="stylesheet" href="css/shared.css">

        
        <style type="text/css">
            h1 { line-height: 35px; color: cornflowerblue; font-weight: 400; text-transform: uppercase; }
            h2 { background-color: cornflowerblue; color: white; text-transform:uppercase; text-align: center; padding: 10px; margin: 0px;}
            h3 { color:royalblue; text-indent: 5px;}
            
            table {
                border-collapse: separate; border-spacing: 5px; width: 100%;
            }
            td {
                width: 50%; padding: 10px; font-size: 13px; vertical-align: top; background-color: aliceblue;
            }
            
            input[type="button"] {
                height:45px; font-size:15px; font-weight: bold; border-radius:0px; padding-left:15px; padding-right:15px; line-height: 40px; -webkit-appearance:none;  -moz-appearance:none;  -ms-appearance:none; appearance:none; margin: 5px; width:200px; border-radius: 5px; box-shadow: 0px 1px 2px #666;
                text-transform: uppercase;
            }
            .btnBlue { color: #fff; background-color: cornflowerblue; border: none; }
            .btnGrey { color: #fff; background-color: grey; border: none; }
            
            .btnRole {
                color: cornflowerblue; background-color: aliceblue; border: lightBlue 1px solid; padding: 10px 15px; margin: 10px 0px;
                cursor: pointer;
                position: relative;
            }
            .btnRole::after {
                content: "»";
                color:cornflowerblue;
                position: absolute;
                right: 15px;
            }
            
        </style>
        
        
    
    </head>
        
    <body>
        
        <div class="mainlayer">
            <h1>Competencies for Food Graduate Careers</h1>
        
            <h2>Search Result</h2>
            <h3>Related Roles</h3>
            <?php
                if (count($roles) == 0) {
                    echo "<p>&nbsp;No roles are satisfied the search criteria. Please search again.</p>";
                } else {
                    foreach ($roles as $aRole) {
                        echo "<div class='btnRole' onclick='gotoRole(".$aRole['id'].")'>".$aRole['entry']."</div>";
                    }
                }
                
            
            
            ?>

            
            
            
            
            
            
        </div>    
        <p aligh="center">
            <input type="button" class="btnGrey" value="Search Again" onclick="window.history.back()" />
        </p>
        
        
        <script>
        
            function gotoRole(q) {
                window.location = "roleProfile.php?id="+q;
            }
        </script>
        
        
    </body>
</html>