<?php
    include 'credentials.php';

    $dsn = 'mysql:dbname='.$db_database.';host='.$db_host;
    $pdo = new PDO($dsn,$db_username,$db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // functions for validate login action
    function isExistUser($username) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM Users WHERE Name = :Name');
        $stmt->bindParam(':Name', $username);
        $stmt->execute();

        if ($stmt->rowCount() != 0) {
            return true;
        }
        else {
            return false;
        }
    }

    function authenticate($username, $password) {
        global $pdo;

        try {
            $stmt = $pdo->prepare('SELECT * FROM Users WHERE Name = :Name');
            $stmt->bindParam(':Name', $username);
            $stmt->execute();
        }
        catch (Exception $e) {
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

    // function for signup a user account
    function signup($infos) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO Users (Name, Password) VALUES (:Name, :Password)');
        $stmt->bindParam(':Name', $infos['username']);
        $stmt->bindParam(':Password', $infos['password']);
        $stmt->execute();
    }
?>