<?php
    session_start();

    include "header.php";
    include "navbar.php";
    include "db.php";
?>
<script>
  var altNameLimit = 5;
  var currNameNumber = 1;
  function myFunc(numOfNames) {
    if (altNameLimit == currNameNumber) {
      alert ("You can't add any more alternative names")
    } else {
      var newAltName = document.createElement('div');
      newAltName.innerHTML = "Name  " + (currNameNumber + 1) + "<br><input type='text' class='form-control' name='altName[]'>";
      document.getElementById(numOfNames).appendChild(newAltName);
      currNameNumber++;
      return false;
    }
  }

  function validate() {
    var checkElements = document.querySelectorAll('input[name="elements[]"]');
    var checkedOneElements = Array.prototype.slice.call(checkElements).some(x => x.checked);

    if (checkedOneElements) {
      return true;
    }
    else {
      alert("Select at least one checkbox.");
      return false;
    }
  } 
</script>

<!DOCTYPE html>
<head>
  <title> Update Database </title>
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
            <h1> Update Database </h1>
          </div>
        </div>
     </div>
     <div class="text-center">

      <div class="btn-group btn-group-lg" role="group">
        <button type="button"
                class="btn btn-secondary"
                onclick="window.location.href='admin_update_roles.php'">
                &nbsp&nbspRoles&nbsp
        </button>
        <button type="button"
                class="btn btn-secondary"
                onclick="window.location.href='admin_update_themes.php'"
                disabled>
                &nbspThemes&nbsp
        </button>
        <button type="button"
                class="btn btn-secondary"
                onclick="window.location.href='admin_update_elements.php'">
                Elements
        </button>
      </div>
    </div>
    <form action="_updateTheme.php" onsubmit="return validate()" method="post">
      <div class="text-center">
        <h2> Update Themes </h2>
      </div>

      <p> Please use this form to update the themes within the database. </p>
      <div class="form-group">
        <label for="roleentry"> Plesse select a theme to update: </label>
        <div class="select">
          <select name="themeName" onchange="themeNameSelectionChanged()" class="custom-select">
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

      <div class="form-group">
        <label for="themename"> Updated theme name: </label>
          <input type="text" class="form-control" name="newName" placeholder="New theme name" required>
      </div>

      <div class="form-group">
        <label for="themedesc"> New theme explanation: </label>
        <textarea class="form-control" name="explanation" rows="1" required></textarea>
      </div>

      <div class="form-group">
        <label for="themeelements"> Related Elements: </label>
        <br>
        <?php
          $stmt = $conn->prepare("SELECT id, elementname FROM element ORDER BY id ASC");
          $stmt->execute();
          $stmt->bind_result($id, $elements);
          while ($stmt->fetch()) {
              $id = htmlentities($id);
              $elements = htmlentities($elements);
              echo "<input type=\"checkbox\" name=\"elements[]\" style=\"margin-right:10px; value=\"$id\">";
              echo $elements;
              echo "<br>";
          }
        ?>
        <small id="rehelp" class="form-text text-muted">Must select at least one</small>
      </div>
      <input type="submit" class="btn btn-success" style="background-color: #2a8c3e" value="Update the database">
    </form>
</body>
