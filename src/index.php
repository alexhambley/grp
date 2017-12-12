<?php

$db_path = "./data/cfgc.db";

//create db sqlite 3.0
$db = new PDO("sqlite:$db_path");
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
	$db->beginTransaction();
	$query = "SELECT * FROM 'role'";
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

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CFGC Data Update</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        
<!--
        <link type="text/css" rel="stylesheet" href="css/shared.css">
        <link type="text/css" rel="stylesheet" href="css/index.css">
-->
        
        <style type="text/css">
            body {
                text-align: center; padding: 20px 0px; margin: 0px; background-color: whitesmoke;
                line-height: 20px;
                font-family: Arial, Helvetica, sans-serif;
            }
            
            h1 { line-height: 35px; color: cornflowerblue; font-weight: 400; text-transform: uppercase; }
            h2 { background-color: cornflowerblue; color: white; text-transform:uppercase; padding: 10px; margin: 0px;}
            
            .mainlayer {
                display: inline-block;
                text-align: left; width: 100%; max-width: 800px; background-color: white; padding: 15px; border: 1px #ddd solid;
            }
            a {
                font-size:16px; font-weight: normal; padding:15px 25px; text-decoration: none;
                color: cornflowerblue; background-color: aliceblue; display: inline-block;
                margin: 5px; min-width:200px; width:90%; border-radius: 5px;
                position: relative;
            }
            a::after {
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
            
            

            
            <h2>View Role Profiles</h2>
            
            <?php
            
            foreach ($result as $role) {
                echo "<div>";
                echo '<a href="roleProfile.php?id='.$role['id'].'">'.$role['entry'].'</a>';
                echo "</div>";
            }
            
            
            ?>
            
            
            
            
            <p>&nbsp;</p>
            
            <h2>Search Roles</h2>
            <p><a href="search.html">Search Roles by themes and elements</a></p>
            
            <p>&nbsp;</p>
            
            <h2>Elements in Themes</h2>
            <p><a href="allThemes.php">List all themes with their elements</a></p>
        </div>    
        
        
        
    
    </body>
</html>