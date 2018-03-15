<?php
    // var_dump($_POST);
    $elements = implode(",", array_filter($_POST['elements']));
    var_dump($elements);

        // var_dump($_POST['themeName']);
    // var_dump($_POST['explanation']);
    // var_dump($_POST['newName']);
    // var_dump($_POST['elements']);


    if (empty($_POST['themeName']) || empty($_POST['explanation']) || empty($_POST['newName']))
        exit("Invalid parameters.");

    $themeName = trim($_POST['themeName']);
    $explanation = trim($_POST['explanation']);
    $newName = trim($_POST['newName']);

	if ($themeName == "" || $explanation == "" || $newName == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
    // $query = "SELECT id , themename FROM theme WHERE themename = '$themeName'";
		// $stmt = $db->prepare($query);
		// $stmt->execute();
    //     $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //     if ($row['id'] == "")
    //     {
    //         echo "Theme: '$themeName' could not be found.";
    //         exit;
    //     }
    $query = "UPDATE theme SET elements='$elements', explanation='$explanation', themename='$newName' WHERE themename='$themeName'";
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


	echo "The selected theme was updated.";
	exit;

?>
