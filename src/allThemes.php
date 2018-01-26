<?php
    include "header.php";
    include "db.php";
?>

<!DOCTYPE html>
<head>
<Title>All Themes </Title>
</head>

<body>
<!-- Navigation Bar  -->
    <nav>            
        <ul class="nav nav-pills">
            <li>
                <a href="#"> Students </a>
            </li>
            <li class="active">
                <a href="newThemes.php"> View All Themes </a>
            </li>
            <li>
                <a href="#"> Admin </a>
            </li>
        </ul>
    </nav>

<!-- Load in all the themes -->


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">
                #
            </th>
            <th scope="col">
                Theme Name
            </th>
            <th scope="col">
                See More
            </th>
        </tr>
    </thead>
    <tbody>
    <?php
        // $conn = new mysqli("localhost", "root", "", "g52grp");
        // if ($conn->connect_errno != 0) {
        //     die('Failed to connect to the database.');
        // }

        $stmt = $conn->prepare("SELECT id, themename, explanation FROM theme ORDER BY id ASC");
        $stmt->execute();
        $stmt->bind_result($id, $name, $exp);
        // $counter = 1;

        while ($stmt->fetch()) {
            $name = htmlentities($name);
            echo "<tr>";
            echo "<th scope=\"row\"> $id </th>";
            echo "<td> $name </td>";
            echo "<td> button goes here </td>";
            // echo $name;
            // echo "<br>";
        }
    ?>

</body>