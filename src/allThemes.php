<?php


    
    
$db_path = "./data/cfgc.db";

//create db sqlite 3.0
$db = new PDO("sqlite:$db_path");
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//----- Get themes
try {
	$db->beginTransaction();
	$query = "SELECT * FROM theme WHERE id!=1";
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


//----- Get themes
try {
	$db->beginTransaction();
	$query = "SELECT id, name FROM element";
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

$elements = $stmt->fetchAll(PDO::FETCH_ASSOC);    

    
//echo "<pre>";
//var_dump($roles);
//echo "</pre>";    
    
?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CFGC All Themes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        

        <link type="text/css" rel="stylesheet" href="css/shared.css">
        
        <style type="text/css">            
            h1 { line-height: 35px; color: cornflowerblue; font-weight: 400; text-transform: uppercase; }
            h2 { color: cornflowerblue; text-transform:uppercase; text-align: center; padding: 10px; margin: 0px;}
            h3 { color:royalblue; text-indent: 5px;}
            
            table {
                border-collapse: separate; border-spacing: 2px; width: 100%; margin-top: 20px;
            }
            
            td { padding: 10px; vertical-align: top; }
            .tableCellDarkBlue { background-color:cornflowerblue; color: white; font-weight: bold;  font-size: 15px; text-indent: 20px; }
            .tableCellFadeBlue { background-color:aliceblue; font-size: 14px; }
            
            
            input[type="button"] {
                height:45px; font-size:15px; font-weight: bold; border-radius:0px; padding-left:15px; padding-right:15px; line-height: 40px; -webkit-appearance:none;  -moz-appearance:none;  -ms-appearance:none; appearance:none; margin: 5px; width:200px; border-radius: 5px; box-shadow: 0px 1px 2px #666;
                text-transform: uppercase;
            }
            .btnBlue { color: #fff; background-color: cornflowerblue; border: none; }
            .btnGrey { color: #fff; background-color: grey; border: none; }
           
        </style>
        
        
    
    </head>
        
    <body>
        
        <div class="mainlayer">
            <h1>Competencies for Food Graduate Careers</h1>
        
            <h2>All Themes</h2>
            
            <table>
            <?php
                
                foreach ($themes as $aTheme) {
                    $themeId = $aTheme["theme_id"];
                    $themeName = $aTheme["name"];
                    $themeText = $aTheme["explanation"];
                    $themeElementArray = explode(",",$aTheme["elements"]);
                    echo "
                    <tr>
                        <td width='10%' class='tableCellDarkBlue'><b>$themeId</b></td>
                        <td width='90%' class='tableCellDarkBlue'>$themeName</td>
                    </tr>
                    <tr>
                        <td colspan='2' class='tableCellFadeBlue'>
                        $themeText<br><br>
                        <b>Related Elements</b><ul>
                    ";
                     
                    foreach ($elements as $aElement) {
                        if (in_array($aElement['id'],$themeElementArray)) {
                            echo "<li>".$aElement['name']."</li>";
                        }
                    }                    
                    "    </ul></td>
                    </tr>
                    ";
                }
                
                
            
            
            ?>
            </table>
            
            
            
            
            
            
        </div>    
        <p aligh="center">
            <input type="button" class="btnGrey" value="Go Back" onclick="window.history.back()" />
        </p>
        
        
        <script>
        
            function gotoRole(q) {
                window.location = "roleProfile.php?id="+q;
            }
        </script>
        
        
    </body>
</html>