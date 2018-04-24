<?php
  $names = implode(",", array_filter($_POST['altName']));
  $elements = implode(",", array_filter($_POST['elements']));
  $tempArr = $_POST['themes'];
  $i = 0;

  while ($i != sizeof($tempArr)) {
    // Roles need a D in front of the number because of their ID in the database.
    $temp = $tempArr[$i];
    $tempArr[$i] = 'D';
    $tempArr[$i] .= $temp;
    $i++;
  }

  $themes = implode(",", array_filter($tempArr));

  if (empty($names) || empty($elements) || empty($_POST['entry']) || empty($_POST['description'])) {
    header( "refresh:3;url=index_admin.php" );
    session_unset();
    session_destroy();
    exit("Invalid parameters. Redirecting in 3 seconds");
  }

  $entry = trim($_POST['entry']);
  $description = trim($_POST['description']);

  if ($elements == "" || $entry == "" || $names == "" || $description == "" || $themes == "") {
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
  session_unset();
  session_destroy();
  header("Location: index_admin.php");
  exit();
  $conn->close();
?>
