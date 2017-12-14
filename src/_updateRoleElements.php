<?php


if (trim($_GET['roleId']) == "" || empty($_GET['roleId']) || trim($_GET['elementId']) == "" || empty($_GET['elementId'])) {
    exit("Invalid parameters.");
}

$roleId = trim($_GET['roleId']);
$elementId = ",".trim($_GET['elementId']).",";



$db_path = "./data/cfgc.db";

//create db sqlite 3.0
$db = new PDO("sqlite:$db_path");
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
	exit;
}

$db = null;


echo "The selected elements were saved to this role.";
exit;

?>