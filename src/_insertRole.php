<?php
    
    if (empty($_GET['elements']) || empty($_GET['entry']) || empty($_GET['names']) || empty($_GET['description'])) || empty($_GET['themes'])
        exit("Invalid parameters.");

	$elements = ",".trim($_GET['elements']).",";
    $entry = trim($_GET['entry']);
    $names = trim($_GET['names']);
    $description = trim($_GET['description']);
    $themes = trim($_GET['themes']);
    

	if ($elements == "" || $entry) == "" || $names == "" || $decription == "") || $themes == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "INSERT INTO role (entry, description, names, elements, themes) VALUE (:elements,:entry,:names,:description,:themes)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":elements",$elements,PDO::PARAM_STR);
        $stmt->bindParam(":entry",$entry,PDO::PARAM_INT);
        $stmt->bindParam(":names",$names,PDO::PARAM_INT);
        $stmt->bindParam(":description",$descripton,PDO::PARAM_INT);
        $stmt->bindParam(":themes",$themes,PDO::PARAM_INT);
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


	echo "The role has been added.";
	exit;

?>