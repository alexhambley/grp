<?php
    session_start();

    include "header.php";
    include "navbar.php";
    include "db.php";
?>

<!DOCTYPE html>
<head>
	<title> Remove Database Elements </title>
  <link rel="stylesheet" href="css/view_students.css" />
</head>

<body class="bg-grey">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div style="padding-top: 30px;"> 
          <button type="button" 
                  class="btn btn-default"
                  onclick="window.location.href='index_admin.php'">
                  <span class="glyphicon glyphicon-arrow-left"> </span> 
                  Back to Admin Page
          </button>     
        </div>
      </div>
      <div class="col-sm-4">
        <div class="text-center">
          <h1> Remove From Database </h1>  
        </div>
      </div>
    </div>
    <h4> Warning: </h4>
    This page will permanently delete elements from the database.
    <br>
    You will have to add the elements back manually, or by using the add tool on the previous page. <p>

    <div class="text-center">
      <h2> Remove Roles </h2>
    </div>

    <form action="_deleteRole.php" method="post">
      <div class="form-group">
        <label for="roleentry"> Please use this form to remove roles from the database. </label>
        <div class="select">
          <select name="entry" class="custom-select">
            <?php
              $stmt = $conn->prepare("SELECT id, entry FROM role ORDER BY id ASC");
              $stmt->execute();
              $stmt->bind_result($id, $entry);
              while ($stmt->fetch()) {
                  $id = htmlentities($id);
                  $entry = htmlentities($entry);
                  echo "<option name=\"$entry\" value=\"$entry\">$entry</option>";
              }
            ?>
          </select>
        </div>
      </div>
      <input type="submit" class="btn btn-danger" style="background-color: #e84c4c" value="Remove from database">
    </form>


    <div class="text-center">
      <h2> Remove Themes </h2>
    </div>

    <form action="_deleteTheme.php" method="post">
      <div class="form-group">
        <label for="roleentry"> Please use this form to remove themes from the database. </label>
        <div class="select">
            <select name="themeName" class="custom-select">
              <?php
                $stmt = $conn->prepare("SELECT id, themename FROM theme ORDER BY id ASC");
                $stmt->execute();
                $stmt->bind_result($id, $themeName);
                while ($stmt->fetch()) {
                    $id = htmlentities($id);
                    $themeName = htmlentities($themeName);
                    echo "<option name=\"$themeName\" value=\"$themeName\">$themeName</option>";
                }
              ?>
            </select>
          </div>
      </div>
      <input type="submit" class="btn btn-danger" style="background-color: #e84c4c" value="Remove from database">
    </form>

    <div class="text-center">
      <h2> Remove Elements </h2>
    </div>

    <form action="_deleteElement.php" method="post">
      <div class="form-group">
        <label for="roleentry"> Please use this form to remove elements from the database. </label>
        <div class="select">
          <select name="elementname" class="custom-select">
            <?php
              $stmt = $conn->prepare("SELECT id, elementname FROM element ORDER BY id ASC");
              $stmt->execute();
              $stmt->bind_result($id, $elementname)
              ;
              while ($stmt->fetch()) {
                  $id = htmlentities($id);
                  $elementname = htmlentities($elementname);
                  echo "<option name=\"$elementname\" value=\"$elementname\">$elementname</option>";
              }
            ?>
          </select>
      </div>
    </div>
      <input type="submit" class="btn btn-danger" style="background-color: #e84c4c" value="Remove from database">
    </form>
  </div>
</body>
