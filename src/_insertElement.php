<?php
	if (empty($_POST['name']) || empty($_POST['description'])) {
		exit("Invalid parameters.");
		header("Location: _error.php");
	}
  $name = trim($_POST['name']);
  $description = trim($_POST['description']);

	if ($name == "" || $description == "") {
		header("Location: _error.php");
		session_unset();
		session_destroy();
		exit("Invalid parameters.");
	}

	include 'credentials.php';
	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
  $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = str_replace("?", $name, "INSERT INTO element (elementname, description) VALUES ('?','!')");
		$query = str_replace("!", $description, $query);
		$stmt = $db->prepare($query);
		$stmt->execute();
		$db->commit();
	} catch (PDOException $e) {
		$db = null;
		$msg = "Error: Can't update database\n\nError Info: ".$e->getMessage()."\n\n";
		$msg .= "Query: $query";
		echo $msg;
		header("Location: _error.php");
		session_unset();
		session_destroy();
		exit("Invalid parameters.");
	}
	
	$db = null;
	session_unset();
	session_destroy();
	header("Location: index_admin.php");
	exit();
	$conn->close();
?>
