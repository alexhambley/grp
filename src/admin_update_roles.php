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
      newAltName.innerHTML = "Name  " + (currNameNumber + 1) + "<br><input type='text' class='form-control' name='altName[]'>";
      document.getElementById(numOfNames).appendChild(newAltName);
      currNameNumber++;
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
                      onclick="window.location.href='admin_update_roles.php'"
                      disabled> 
                      &nbsp&nbspRoles&nbsp
              </button>
              <button type="button" 
                      class="btn btn-secondary"
                      onclick="window.location.href='admin_update_themes.php'">
                      &nbspThemes&nbsp
              </button>
              <button type="button" 
                      class="btn btn-secondary"
                      onclick="window.location.href='admin_update_elements.php'">
                      Elements
              </button>
            </div>
            </div>

    

    <!-- Update Role  -->
    <form action="_updateRole.php"  method="post">
      <div class="text-center">
        <h2> Update Role </h2>
      </div>
      <p> Please use this form to update the roles within the database. </p>
      <label for="roleentry"> Plesse select a role to update: </label>

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
      <br>
      <div class="form-group">
        <label for="themename"> Updated role name: </label>
          <input type="text" class="form-control" name="newEntry" placeholder="New role entry name">
      </div>
      <div class="form-group">
        <label for="roledesc"> Updated role description: </label>
        <textarea class="form-control" name="description" rows="2"></textarea>
      </div>
      <div class="form-group">
        <label for="rolealt"> Alternative Names: </label>
        <div id="numOfNames">
          Name 1
          <br>
          <input type="text" class="form-control" classname="altName[]">
        </div>
        <br>
        <button type=button class="btn btn-default" onclick="return myFunc('numOfNames')"> Add another name </button>
        <br>
      </div>
      <div class="form-group">
        <label for="roleelements"> Related Elements: </label>
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
      </div>
      <div class="form-group">
        <label for="rolethemes"> Related Themes: </label>
        <br>
        <?php
          $stmt = $conn->prepare("SELECT theme_id, themename FROM theme ORDER BY theme_id ASC");
          $stmt->execute();
          $stmt->bind_result($themeid, $themename);
          while ($stmt->fetch()) {
              $themeid = htmlentities($themeid);
              $themename = htmlentities($themename);
              echo "<input type=\"checkbox\" name=\"themes[]\" style=\"margin-right:10px; value=\"$themeid\">";
              echo $themename;
              echo "<br>";
          }
        ?>
      </div>
      <input type="submit" class="btn btn-success" style="background-color: #2a8c3e" value="Update the database">
    </form>

  <br>
</body>
