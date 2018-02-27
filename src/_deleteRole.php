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
		
        $query = str_replace("?", $name, "SELECT id FROM role WHERE entry = '?'");
		$stmt = $db->prepare($query);
		$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];
        if ($id == "")
        {
            echo "Role: '$name' could not be found.";
            exit;
        }
        
        $query = str_replace("?", $name, "DELETE FROM role WHERE entry='?'");
		$stmt = $db->prepare($query);
		$stmt->execute();
		$db->commit();
	} catch (PDOException $e) {
		$db = null;
		$msg = "Error: Can't update database\n\nError Info: ".$e->getMessage()."\n\n";
		$msg .= "Query: $query";
		echo $msg;
		exit;
	}

	$db = null;


	echo "The selected role has been deleted.";
	exit;

?>