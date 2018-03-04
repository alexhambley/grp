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
            $query = str_replace("?", $name, "INSERT INTO theme (themename, explanation, elements) VALUES ('!','?','£')");
            $query = str_replace("!", $explanation, $query);
            $query = str_replace("£", trim($_POST['elements']), $query);
            $stmt = $db->prepare($query);
        }
        else
        {
            $query = str_replace("?", $name, "INSERT INTO theme (themename, explanation) VALUES ('?','!')");
            $query = str_replace("!", $explanation, $query);
            $stmt = $db->prepare($query);
        }
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


	echo "The theme '$name' was added.";
	exit;

?>
