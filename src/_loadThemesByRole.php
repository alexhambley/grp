<?php
	if (trim($_GET['q']) == "" || empty($_GET['q'])) {
	    exit("No parameters.");
	}

	$tmparr = explode(",",trim($_GET['q']));
	$condition = implode("' OR theme_id='", $tmparr);
	include 'credentials.php';
	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
  $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "SELECT * FROM theme WHERE theme_id='$condition'";
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
	echo json_encode(utf8ize($result));
	exit;

	function utf8ize($mixed) {
	    if (is_array($mixed)) {
	        foreach ($mixed as $key => $value) {
	            $mixed[$key] = utf8ize($value);
	        }
	    } else if (is_string ($mixed)) {
	        return utf8_encode($mixed);
	    }
	    return $mixed;
	}
?>
