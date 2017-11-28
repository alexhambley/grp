<?php

$db_path = "./data/cfgc.db";

//create db sqlite 3.0
$db = new PDO("sqlite:$db_path");
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
	$db->beginTransaction();
	$query = "SELECT * FROM 'role'";
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