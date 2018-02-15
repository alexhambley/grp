<?php
    
    if (empty($_GET['themeName']) || empty($_GET['explanation'])) || empty($_GET['themeID'])
        exit("Invalid parameters.");

    $themeID = trim($_GET['themeID']);
    $themeName = trim($_GET['themeName']);
	$elements = trim($_GET['elements']);
    $description = trim($_GET['explanation']);
    

	if ($themeID == "" || $themeName) == "" || $description == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		if (elements != "")
        {
            $query = "UPDATE theme SET elements=:elements, explanation=:description, themename=:themeName WHERE id=:themeId";
            $stmt = $db->prepare($query);
            $stmt->bindParam(":elements",$elements,PDO::PARAM_STR);
        }
        else
        {
            query = "UPDATE theme SET explanation=:description, themename=:themeName WHERE id=:themeId";
            $stmt = $db->prepare($query);
        }
	    $stmt->bindParam(":id",$themeId,PDO::PARAM_INT);
        $stmt->bindParam(":description",$descripton,PDO::PARAM_INT);
        $stmt->bindParam(":themeName",$themeName,PDO::PARAM_INT);
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