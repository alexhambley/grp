<?php
    
    if (empty($_GET['roleId']) || empty($_GET['elements']) || empty($_GET['entry']) || empty($_GET['names']) || empty($_GET['description'])) || empty($_GET['themes'])
        exit("Invalid parameters.");

    $roleId = trim($_GET['roleId']);
	$elements = ",".trim($_GET['elements']).",";
    $entry = trim($_GET['entry']);
    $names = trim($_GET['names']);
    $description = trim($_GET['description']);
    $themes = trim($_GET['themes']);
    

	if ($roleID == "" || $elements == "" || $entry == "" || $names == "" || $decription == "" || $themes == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "UPDATE role SET elements=:elements, entry=:entry, names=:names, description=:description, themes=:themes WHERE id=:id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":elements",$elements,PDO::PARAM_STR);
	    $stmt->bindParam(":id",$roleId,PDO::PARAM_INT);
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


	echo "The selected role was updated.";
	exit;

?>