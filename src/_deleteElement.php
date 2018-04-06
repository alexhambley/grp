<?php
    
    if (empty($_POST['name']))
        exit("Invalid parameters.");

    $name = trim($_POST['name']);

	if ($name == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
        
        $query = str_replace("?", $name, "SELECT id FROM element WHERE elementname = '?'");
		$stmt = $db->prepare($query);
		$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];
        if ($id == "")
        {
            echo "Element: '$name' could not be found.";
            exit;
        }
        
        $query = str_replace("?", $name, "DELETE FROM element WHERE elementname = '?'");
		$stmt = $db->prepare($query);
		$stmt->execute();
        
        $query = str_replace("?", $id, "SELECT id, elements FROM role WHERE elements LIKE '%,?,%'");
        $stmt = $db->prepare($query);
        $stmt->execute();
        foreach ($stmt as $row) 
        {
            $counter = 0;
            $elements = explode(",", $row['elements']);
            while  ($elements[$counter] != $id)
            {
                $counter = $counter + 1;
            }
            $elements[$counter] = "";
            $elements = implode(",", $elements);
            
            $elements = str_replace(',,',',', $elements);
            
            $query = str_replace("?", $elements, "UPDATE role SET elements = '?' WHERE id = !");
            $query = str_replace("!", $row['id'], $query);
            $stmt = $db->prepare($query);
            $stmt->execute();    
        }
        
        $query = str_replace("?", $id,"SELECT id, elements FROM theme WHERE elements = ? OR elements LIKE '?,%' OR elements LIKE '%,?,%' OR elements LIKE '%,?'");
        $stmt = $db->prepare($query);
        $stmt->execute();
        foreach ($stmt as $row) 
        {
            $counter = 0;
            $elements = explode(",", $row['elements']);
            while  ($elements[$counter] != $id)
            {
                $counter = $counter + 1;
            }
            $elements[$counter] = "";
            $elements = implode(",", $elements);
            
            if ($elements[0] == ',')
            {
                $elements[0] = '?';
                $elements = str_replace('?'.$elements[1], $elements[1], $elements);
            }
            else if ($elements[strlen($elements)-1] == ',')
            {
                $elements[strlen($elements)-1] = '?';
                $elements = str_replace($elements[strlen($elements) - 2].'?', $elements[strlen($elements) - 2], $elements);
            }
            else
            {
                $elements = str_replace(',,',',', $elements);
            }
            
            $query = str_replace("?", $row['id'], "UPDATE theme SET elements = '!' WHERE id = ?");
            $query = str_replace("!", $elements, $query);
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


	echo "The element '$name' has been deleted.";
	exit;

?>