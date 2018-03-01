<?php
    
    if (empty($_POST['elements']) || empty($_POST['entry']) || empty($_POST['names']) || empty($_POST['description']) || empty($_POST['themes']))
        exit("Invalid parameters.");

	$elements = trim($_POST['elements']);
    $entry = trim($_POST['entry']);
    $names = trim($_POST['names']);
    $description = trim($_POST['description']);
    $themes = trim($_POST['themes']);
    

	if ($elements == "" || $entry == "" || $names == "" || $description == "" || $themes == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = str_replace("?", $entry, "INSERT INTO role (entry, description, names, elements, themes) VALUE ('?','!','£','%','*')");
        $query = str_replace("!", $description, $query);
        $query = str_replace("£", $names, $query);
        $query = str_replace("%", ','.$elements.',', $query);
        $query = str_replace("*", $themes, $query);
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


	echo "The role '$entry' has been added.";
	exit;

?>