<?php

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $pdo = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "SELECT * FROM element ORDER BY name ASC";
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

	$elements = $stmt->fetchAll(PDO::FETCH_ASSOC);


	//echo "<pre>";
	//var_dump($elements);
	//echo "</pre>";




	try {
		$db->beginTransaction();
		$query = "SELECT * FROM theme";
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

	$themes = $stmt->fetchAll(PDO::FETCH_ASSOC);



	//echo "<pre>";
	//var_dump($themes);
	//echo "</pre>";

	$json['themes'] = $themes;
	$json['elements'] = $elements;
	$json['server_message'] = "Search criteria";




	$db = null;






	echo json_encode($json);
	exit;

?>