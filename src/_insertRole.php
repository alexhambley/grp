<?php
  // var_dump($_POST);
  // $tempAlternativeNames = array($_POST['altName1'], $_POST['altName2'], $_POST['altName3'], $_POST['altName4'], $_POST['altName5']);
  $names = implode(",", array_filter($_POST['altName']));
  $elements = implode(",", array_filter($_POST['elements']));
  $tempArr = $_POST['themes'];
  // var_dump($tempArr);

  $i = 0;
  while ($i != sizeof($tempArr)) {
    $temp = $tempArr[$i];
    $tempArr[$i] = 'D';
    $tempArr[$i] .= $temp;
    $i++;
  }
  // var_dump($tempArr);

  $themes = implode(",", array_filter($tempArr));
  //var_dump($themes);

    if (empty($names) || empty($elements) || empty($_POST['entry']) || empty($_POST['description']))
        exit("Invalid parameters.");

	  // $elements = trim($_POST['elements']);
    $entry = trim($_POST['entry']);
    $description = trim($_POST['description']);
    // $themes = trim($_POST['themes']);


	if ($elements == "" || $entry == "" || $names == "" || $description == "" || $themes == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
  $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "INSERT INTO role (entry, description, names, elements, themes) VALUE ('$entry','$description','$names',',$elements,','$themes')";
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


	echo "The role '$entry' has been added.";
	exit;

?>
