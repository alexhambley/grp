<?php

    if (empty($_POST['name']) || empty($_POST['explanation']))
        exit("Invalid parameters.");

    $name = trim($_POST['name']);
    $explanation = trim($_POST['explanation']);


	if ($name == "" || $explanation == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		if (!empty($_POST['elements']))
        {
            $elements = implode(",", array_filter($_POST['elements']));
            $query = "INSERT INTO theme (themename, explanation, elements) VALUES ('$name','$explanation','$elements')";
            $stmt = $db->prepare($query);
        }
        else
        {
            $query = "INSERT INTO theme (themename, explanation) VALUES ('$name','$explanation')";
            $stmt = $db->prepare($query);
        }
		$stmt->execute();
		$db->commit();
        
        $query = "SELECT MAX(id) AS max FROM theme";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        foreach($stmt as $row)
        {
            $id = $row['max'];
            $theme_id = 'D'.$id;
            $query = "UPDATE theme SET theme_id = '$theme_id' WHERE id = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
        }
        
        } catch (PDOException $e) {
		$db = null;
		$msg = "Error: Can't update database\n\nError Info: ".$e->getMessage()."\n\n";
		$msg .= "Query: $query";
		echo $msg;
		exit;
	}

	$db = null;


	echo "The theme '$name' was added.";
	exit;

?>
