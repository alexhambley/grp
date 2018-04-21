<?php

    var_dump($_POST);
    $elements = implode(",", array_filter($_POST['elements']));
    $themes = implode(",", array_filter($_POST['themes']));
    // var_dump($elements);
    // var_dump($themes);

    $tempAlternativeNames = array($_POST['altName1'], $_POST['altName2'], $_POST['altName3'], $_POST['altName4'], $_POST['altName5']);
    $names = implode(",", array_filter($tempAlternativeNames));

    if (empty($_POST['entry']) || empty($_POST['newEntry']) || empty($_POST['description'])) {
		header( "refresh:3;url=index_admin.php" );
		session_unset();
		session_destroy();
		exit("Invalid parameters. Redirecting in 3 seconds");
	}

    $entry = trim($_POST['entry']);
    $newEntry = trim($_POST['newEntry']);
    $description = trim($_POST['description']);
    // $names = trim($_POST['names']);

	  // $elements = ",".trim($_POST['elements']).",";
    // $themes = trim($_POST['themes']);


	if ($entry == "" || $elements == "" || $newEntry == "" || $names == "" || $description == "" || $themes == "") {
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
	session_unset();
	session_destroy();
	header("Location: index_admin.php");
	exit();
	$conn->close();

?>
