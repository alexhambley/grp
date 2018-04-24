<?php
	include 'credentials.php';
	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
  $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "SELECT * FROM role";
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
	
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$db = NULL;
	echo json_encode($result);
	exit;
?>
