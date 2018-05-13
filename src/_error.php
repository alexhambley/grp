<?php
    session_start(); 
    include "header.php";
    include "navbar.php";
    include "db.php";
?>

<!DOCTYPE html>
<head>
    <Title> Validation Error </Title>
    <link rel="stylesheet" href="css/index_admin.css" />
</head>

<body class="bg-grey">
    <div class="bg">
        <div class="container">
            <div class="text-center">
                <h1> Validation Error </h1>
                <br>
                <p> 
                    Unfortunately there was an error. 
                    Are you sure that you inputted the right details? 
                    <br>
                    No changes have been made to the database. 
                </p>
                <br> 
                <br> 
                <p><a href="index_admin.php" class="btn btn-default" style="border-color: #192A6C">Back to the Admin Page</a></p>
            </div>
        </div>
    </div>
</body>
