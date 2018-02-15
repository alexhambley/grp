<?php
    
    if (empty($_GET['elementName']) || empty($_GET['description']))
        exit("Invalid parameters.");

    $elementName = trim($_GET['elementName']);
    $description = trim($_GET['description']);
    
	if ($elementName == "" || $description == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "INSERT INTO element (elementname, description) VALUES (:elementName,:description)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":elementName",$elementName,PDO::PARAM_STR);
        $stmt->bindParam(":description",$descripton,PDO::PARAM_INT);
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


	echo "The element has been added.";
	exit;

?>