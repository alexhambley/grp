<?php
    
    if (empty($_POST['entry']) || empty($_POST['elements']) || empty($_POST['newEntry']) || empty($_POST['names']) || empty($_POST['description']) || empty($_POST['themes']))
        exit("Invalid parameters.");

    $entry = trim($_POST['entry']);
	$elements = ",".trim($_POST['elements']).",";
    $newEntry = trim($_POST['newEntry']);
    $names = trim($_POST['names']);
    $description = trim($_POST['description']);
    $themes = trim($_POST['themes']);
    

	if ($entry == "" || $elements == "" || $newEntry == "" || $names == "" || $description == "" || $themes == "")
	    exit("Invalid parameter.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
        
		$query = "UPDATE role SET elements = '$elements', entry = '$newEntry', names = '$names', description = '$description', themes = '$themes' WHERE entry = '$entry'";
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


	echo "The selected role was updated.";
	exit;

?>