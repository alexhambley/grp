<?php
	if (trim($_GET['roleId']) == "" || empty($_GET['roleId']) || trim($_GET['elementId']) == "" || empty($_GET['elementId'])) {
		header( "refresh:3;url=index_admin.php" );
		session_unset();
		session_destroy();
		exit("Invalid parameters. Redirecting in 3 seconds");
	}

	$roleId = trim($_GET['roleId']);
	$elementId = ",".trim($_GET['elementId']).",";
	include 'credentials.php';
	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
  $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "UPDATE role SET elements=:elements WHERE id=:id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":elements",$elementId,PDO::PARAM_STR);
	    $stmt->bindParam(":id",$roleId,PDO::PARAM_INT);
		$stmt->execute();
		$db->commit();
	} catch (PDOException $e) {
		$db = null;
		$msg = "Error: Can't update database\n\nError Info: ".$e->getMessage()."\n\n";
		$msg .= "Query: $query";
		echo $msg;
		header( "refresh:3;url=index_admin.php" );
		session_unset();
		session_destroy();
		exit("Invalid parameters. Redirecting in 3 seconds");
	}

	$db = null;
	session_unset();
	session_destroy();
	header("Location: index_admin.php");
	exit();
	$conn->close();
?>
