<?php
    
    if (empty($_GET['name']))
        exit("Invalid parameters.");

    $name = trim($_GET['name']);;

	if ($name == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
        
        $query = str_replace("?", $name, "SELECT theme_id FROM theme WHERE themename = '?'");
		$stmt = $db->prepare($query);
		$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $row['theme_id'];
        
        $query = str_replace("?", $name, "DELETE FROM theme WHERE themename = '?'");
        $stmt = $db->prepare($query);
		$stmt->execute();
        
        $query = str_replace("?", $id, "SELECT id, themes FROM role WHERE themes = '?' OR themes LIKE '%,?' OR themes LIKE '?,%' OR themes LIKE '%,?,%'");
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
                             
        foreach ($stmt as $row) 
        {
            $counter = 0;
            $themes = explode(",", $row['themes']);
            while  ($themes[$counter] != $id)
            {
                $counter = $counter + 1;
            }
            $themes[$counter] = "";
            $themes = implode(",", $themes);
           
            if ($themes != "")
            {
                if ($themes[0] == ',')
                {
                    $themes[0] = '?';
                    $themes = str_replace('?'.$themes[1], $themes[1], $themes);
                }
                else if ($themes[strlen($themes)-1] == ',')
                {
                    $themes[strlen($themes)-1] = '?';
                    $themes = str_replace($themes[strlen($themes) - 2].'?', $themes[strlen($themes) - 2], $themes);
                }
                else
                {
                    $themes = str_replace(',,',',', $themes);
                }
            }
            
            $query = str_replace("?", $themes, "UPDATE role SET themes = '?' WHERE id = !");
            $query = str_replace("!", $row['id'], $query);
            $stmt = $db->prepare($query);
            $stmt->execute();    
        }
        
		$db->commit();
	} catch (PDOException $e) {
		$db = null;
		$msg = "Error: Can't update database\n\nError Info: ".$e->getMessage()."\n\n";
		$msg .= "Query: $query";
		echo $msg;
		exit;
	}

	$db = null;


	echo "The selected theme was deleted.";
	exit;

?>