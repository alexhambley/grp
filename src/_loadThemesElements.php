<?php
	include 'credentials.php';
	$dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
  $db = new PDO($dsn,$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$db->beginTransaction();
		$query = "SELECT * FROM element ORDER BY elementname ASC";
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

	$elements = $stmt->fetchAll(PDO::FETCH_ASSOC);

	try {
		$db->beginTransaction();
		$query = "SELECT * FROM theme";
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
	
	$themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$json['themes'] = $themes;
	$json['elements'] = $elements;
	$json['server_message'] = "Search criteria";
	$db = null;
	echo json_encode(utf8ize($json));
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
