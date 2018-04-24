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
</script>

<!DOCTYPE html>
<head>
	<title> Add to Database </title>
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
          <h1> Add to Database </h1>
        </div>
      </div>
     </div>

    <div class="text-center">
      <div class="btn-group btn-group-lg" role="group">
        <button type="button"
                class="btn btn-secondary"
                onclick="window.location.href='admin_add_roles.php'"
                disabled>
          &nbsp&nbspRoles&nbsp
        </button>
        <button type="button"
                class="btn btn-secondary"
                onclick="window.location.href='admin_add_themes.php'">
          &nbspThemes&nbsp
        </button>
        <button type="button"
                class="btn btn-secondary"
                onclick="window.location.href='admin_add_elements.php'">
          Elements
        </button>
      </div>
    </div>

    <form name="rolesForm" action="_insertRole.php" method="post">
      <div class="text-center">
        <h2> Add Roles </h2>
      </div>
      <p> Please use this form to insert new roles to the database. </p>
      <div class="form-group">
        <label for="roleentry"> New role name: </label>
        <input type="text" class="form-control" name="entry" placeholder="New role name" required>
      </div>

      <div class="form-group">
        <label for="roledesc"> New role description: </label>
        <textarea class="form-control" name="description" rows="2" required></textarea>
      </div>

      <div class="form-group">
        <label for="rolealt"> Alternative Names: </label>
        <div id="numOfNames">
          Name 1
          <br>
          <input type="text" class="form-control" name="altName[]" required>
        </div>
        <br>
        <button type=button class="btn btn-default" onclick="return myFunc('numOfNames')"> Add another name </button>
        <br>
      </div>

      <div class="form-group">
        <label name="roleelements" for="roleelements"> Related Elements: </label>
        <br>
        <?php
          $stmt = $conn->prepare("SELECT id, elementname FROM element ORDER BY id ASC");
          $stmt->execute();
          $stmt->bind_result($id, $elementname);
          while ($stmt->fetch()) {
            $id = htmlentities($id);
            $elementname = htmlentities($elementname);
            echo "<input type=\"checkbox\" name=\"elements[]\" style=\"margin-right:10px\" value=\"$id\">";
            echo $elementname;
            echo "<br>";
          }
        ?>
        <small id="rehelp" class="form-text text-muted">Must select at least one</small>

      </div>

      <div class="form-group">
        <label for="rolethemes"> Related Themes: </label>
        <br>
        <?php
          $stmt = $conn->prepare("SELECT id, themename FROM theme ORDER BY id ASC");
          $stmt->execute();
          $stmt->bind_result($themeid, $themename);
          while ($stmt->fetch()) {
            $themeid = htmlentities($themeid);
            $themename = htmlentities($themename);
            echo "<input type=\"checkbox\" name=\"themes[]\" style=\"margin-right:10px\" value=\"$themeid\">";
            echo $themename;
            echo "<br>";
          }
        ?>
        <small id="rehelp" class="form-text text-muted">Must select at least one</small>

        <br>
        <br>

        <input type="submit" class="btn btn-success" value="Add to database">

        <br>
      </div>
    </form>
  </div>
</body>
