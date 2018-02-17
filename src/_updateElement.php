<?php
    
    if (empty($_GET['elementId']) || empty($_GET['elementName'])) || empty($_GET['description'])
        exit("Invalid parameters.");

    $elementID = trim($_GET['elementId']);
    $elementName = trim($_GET['elementName']);
    $description = trim($_GET['description']);
    

	if ($elementID == "" || $elementName == "" || $description == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "UPDATE element SET elementname=:elementName, description=:description WHERE id=:elementId";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":elementName",$elementName,PDO::PARAM_STR);
	    $stmt->bindParam(":elementId",$elementId,PDO::PARAM_INT);
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


	echo "The selected element was updated.";
	exit;

?>