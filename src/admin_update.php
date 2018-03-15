<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>

<script>
  var altNameLimit = 5;
  var currNameNumber = 1;
  function myFunc(numOfNames) {
    if (altNameLimit == currNameNumber) {
      alert ("You can't add any more alternative names")
    } else {
      var newAltName = document.createElement('div');
      var aN = 'altName' + (currNameNumber + 1);
      newAltName.innerHTML = "Name  " + (currNameNumber + 1) + "<br><input type='text' name='" + aN + "'>";
      document.getElementById(numOfNames).appendChild(newAltName);
      currNameNumber++;
      return false;
    }
}
</script>

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
    <select name="elementname">
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
  <br>
  New Name:
  <input type="text" name="newName">
  <br>
  New Description:
  <input type="text" name="description">
  <input type="submit" value="Submit"><br><br>
</form>

<!-- Update Role  -->
<form action="_updateRole.php" style="margin-top: 62px" method="post">
  <h4> Update Role </h4>
  Choose existing role to update:
  <select name="entry">
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
<br>
New entry name:
<input type="text" name="newEntry">
<br>

New Description:
<input type="text" name="description">
<br>

Alternative Names:
<br>
<div id="numOfNames">
  Name 1
  <br>
  <input type="text" name="altName1">
</div>
<button onclick="return myFunc('numOfNames')"> Add new alternative name </button>
<br>
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
Related Themes:
<br>
<?php
  $stmt = $conn->prepare("SELECT theme_id, themename FROM theme ORDER BY theme_id ASC");
  $stmt->execute();
  $stmt->bind_result($themeid, $themename);
  while ($stmt->fetch()) {
      $themeid = htmlentities($themeid);
      $themename = htmlentities($themename);
      echo "<input type=\"checkbox\" name=\"themes[]\" value=\"$themeid\">";
      echo $themename;
      echo "<br>";
  }
?>
<input type="submit" value="Submit"><br><br>


Associated Themes







</form>


</body>
