<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
	<title> Update </title>
</head>

<body>
    <style>
    /* Otherwise the navbar will cover stuff in body */
        body { padding-bottom: : 140px; }
    </style>
    <nav class="navbar navbar-default navbar-fixed-top" style="margin-top: 62px">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="admin_add.php"> Add </a></li>
                <li><a href="admin_remove.php"> Remove  </a></li>
                <li><a href="admin_update.php"> Update</a></li>

                <div id="display"></div>
            </ul>
        </div>
    </nav>

    <!-- UPDATE THEME -->

    <form action="_updateTheme.php" style="margin-top: 62px" method="post">
      <h4> Update Themes </h4>
      Choose existing theme to update:
      <select name="themeName" onchange="themeNameSelectionChanged()">
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
    <br>
    New Name:
    <input type="text" name="newName">

    <br>
    Associated Elements:
    <?php
      $stmt = $conn->prepare("SELECT id, elementname FROM element ORDER BY id ASC");
      $stmt->execute();
      $stmt->bind_result($id, $elements);
      while ($stmt->fetch()) {
          $id = htmlentities($id);
          $elements = htmlentities($elements);
          echo "<input type=\"checkbox\" name=\"elements[]\" value=\"$id\">";
          echo $elements;
          echo "<br>";
      }
    ?>

    <br>
    New Explanation:
    <input type="text" name="explanation">

    <input type="submit" value="Submit"><br><br>
  </form>

  <!-- Update Element  -->
  <form action="_updateElement.php" style="margin-top: 62px" method="post">
    <h4> Update Elements </h4>
    Choose existing element to update:
    <select name="elementname" ">
    <?php
      $stmt = $conn->prepare("SELECT id, elementname FROM element ORDER BY id ASC");
      $stmt->execute();
      $stmt->bind_result($id, $elementname);
      while ($stmt->fetch()) {
          $id = htmlentities($id);
          $elementname = htmlentities($elementname);
          echo "<option name=\"$elementname\" value=\"$elementname\">$elementname</option>";
      }
    ?>
  </select>
  <br>

  New Name:
  <input type="text" name="newName">
  <br>
  New Description:
  <input type="text" name="description">

  <input type="submit" value="Submit"><br><br>
</form>









</body>
