<?php
    // var_dump($_POST);
    if (empty($_POST['newName']) || empty($_POST['elementname']) || empty($_POST['description'])) {
		header( "refresh:3;url=index_admin.php" );
		session_unset();
		session_destroy();
		exit("Invalid parameters. Redirecting in 3 seconds");
	}
    $newName = trim($_POST['newName']);
    $elementname = trim($_POST['elementname']);
    $description = trim($_POST['description']);
	if ($newName == "" || $elementname == "" || $description == "") {
		header( "refresh:3;url=index_admin.php" );
		session_unset();
		session_destroy();
		exit("Invalid parameters. Redirecting in 3 seconds");
	}
	include 'credentials.php';
	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {
		$db->beginTransaction();
		$query = str_replace("?", $newName, "UPDATE element SET elementname = '?', description = '!' WHERE elementname = '£'");
        $query = str_replace("!", $description, $query);
        $query = str_replace("£", $elementname, $query);
		$stmt = $db->prepare($query);
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
	// echo "The element has been updated.";
	session_unset();
	session_destroy();
	header("Location: index_admin.php");
	exit();
	$conn->close();
?>
