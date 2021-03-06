<?php
  include 'credentials.php';
  $dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
  $pdo = new PDO($dsn,$db_username,$db_password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Below are functions for validating login actions - these are used elsewhere.

  function isExistUser($username) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM Users WHERE Name = :Name');
    $stmt->bindParam(':Name', $username);
    $stmt->execute();

    if ($stmt->rowCount() != 0) {
      return true;
    } else {
      return false;
    }
  }

  function isExistEmail($email) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM Users WHERE Email = :Email');
    $stmt->bindParam(':Email', $email);
    $stmt->execute();

    if ($stmt->rowCount() != 0) {
      return true;
    } else {
      return false;
    }
  }

  function isExistPhone($phone) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM Users WHERE Phone = :Phone');
    $stmt->bindParam(':Phone', $phone);
    $stmt->execute();

    if ($stmt->rowCount() != 0) {
      return true;
    } else {
      return false;
    }
  }

  function authenticate($username, $password) {
    global $pdo;

    try {
      $stmt = $pdo->prepare('SELECT * FROM Users WHERE Name = :Name');
      $stmt->bindParam(':Name', $username);
      $stmt->execute();
    } catch (Exception $e) {
      return false;
    }

    if ($stmt->rowCount() == 0) {
      return false;
    }

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($password != $row['Password']) {
      return false;
    }
    return true;
  }

  // Below are functions that are used for creating a new user account

  function signup($infos) {
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO Users (Name, Password, Phone, Email, Birthday) VALUES (:Name, :Password, :Phone, :Email, :Birthday)');
    $stmt->bindParam(':Name', $infos['username']);
    $stmt->bindParam(':Password', $infos['password']);
    $stmt->bindParam(':Phone', $infos['phone']);
    $stmt->bindParam(':Email', $infos['email']);
    $stmt->bindParam(':Birthday', $infos['birthday']);
    $stmt->execute();
  }

  function fetchAnswers($username) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT Email, Phone, Birthday FROM Users WHERE Name = :Name');
    $stmt->bindParam(':Name', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  function resetPassword($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE Users SET Password = :Password WHERE Name = :Name');
    $stmt->bindParam(':Name', $username);
    $stmt->bindParam(':Password', hash("sha256", $password));
    $stmt->execute();
  }
?>
