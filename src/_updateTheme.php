<?php
  $elements = implode(",", array_filter($_POST['elements']));

  if (empty($_POST['themeName']) || empty($_POST['explanation']) || empty($_POST['newName'])) {
		header("Location: _error.php");
		session_unset();
		session_destroy();
		exit("Invalid parameters.");
  }

  $themeName = trim($_POST['themeName']);
  $explanation = trim($_POST['explanation']);
  $newName = trim($_POST['newName']);

	if ($themeName == "" || $explanation == "" || $newName == "") {
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
    $query = "UPDATE theme SET elements='$elements', explanation='$explanation', themename='$newName' WHERE themename='$themeName'";
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
