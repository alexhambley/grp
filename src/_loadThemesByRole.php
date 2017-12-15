<?php

	if (trim($_GET['q']) == "" || empty($_GET['q'])) {
	    exit("No parameters.");
	}

	$tmparr = explode(",",trim($_GET['q']));
	$condition = implode("' OR theme_id='", $tmparr);


	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $pdo = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "SELECT * FROM theme WHERE theme_id='$condition'";
		$stmt = $db->prepare($query);
		
		$stmt->execute();
		$db->commit();
	} catch (PDOException $e) {
		$db = NULL;
		$msg = "<h3>Error: Can't read database</h3><p>Error Info: ".$e->getMessage()."</p>";
		$msg .= "<p>Query: $query</p>";
		echo $msg;
		exit;
	}

	//echo($query."<br><br>");

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$db = NULL;


	echo json_encode($result);
	exit;

?>