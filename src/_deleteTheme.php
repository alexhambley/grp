<?php
    
    if (empty($_GET['id']))
        exit("Invalid parameters.");

    $id = trim($_GET['id']);;
    

	if ($id == "")
	    exit("Invalid parameters.");

	include 'credentials.php';

	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
        query = "DELETE FROM theme WHERE id=:id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
        
        $query = "SELECT id, elements FROM theme WHERE elements='%:id%";
        $stmt = $db->prepare($query);
		$stmt->bindParam(":id",$id,PDO::PARAM_STR);
        $result = $stmt->execute();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            //delete from other tables
        }
        
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