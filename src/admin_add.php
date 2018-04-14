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
	<title> Add to Database </title>
  <link rel="stylesheet" href="css/view_students.css" />
</head>
<body class="bg-grey">
  <div class="container">

    <div class="text-center">
      <h1> Add to Database </h1>
    </div>

    <form action="_insertRole.php" method="post">
      <div class="text-center">
        <h2> Add Roles </h2>
      </div>

      <p> Please use this form to insert new roles to the database. </p>
      <div class="form-group">
        <label for="roleentry"> New role name: </label>
        <input type="text" class="form-control" name="entry" placeholder="New role name">
      </div>

      <div class="form-group">
        <label for="roledesc"> New role description: </label>
        <textarea class="form-control" name="description" rows="2"></textarea>
      </div>

      <div class="form-group">
        <label for="rolealt"> Alternative Names: </label>
      <!-- <br> -->
        <div id="numOfNames">
          Name 1
          <br>
          <input type="text" class="form-control" name="altName[]">
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
          $stmt->bind_result($id, $elementname);
          while ($stmt->fetch()) {
              $id = htmlentities($id);
              $elementname = htmlentities($elementname);
              echo "<input type=\"checkbox\" name=\"elements[]\" style=\"margin-right:10px\" value=\"$id\">";
              echo $elementname;
              echo "<br>";
          }
        ?>
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
        <br>
        <input type="submit" class="btn btn-success" value="Add to database">    
        <br>
        <br>
        </form>


    <form action="_insertTheme.php" method="post">
      <div class="text-center">
        <h2> Add Themes </h2>
      </div>
      <p> Please use this form to insert new themes to the database. </p>

      <div class="form-group">
        <label for="themename"> New theme name: </label>
        <input type="text" class="form-control" name="name" placeholder="New theme name">
      </div>

      <div class="form-group">
        <label for="themedesc"> New theme explanation: </label>
        <textarea class="form-control" name="explanation" rows="1"></textarea>
      </div>

      <div class="form-group">
        <label for="themeelements"> Related Elements: </label>
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
      </div>
      <input type="submit" class="btn btn-success" style="background-color: #2a8c3e" value="Add to database">    
    </form>

    <form action="_insertElement.php" method="post">
      <div class="text-center">
        <h2> Add Elements </h2>
      </div>
      <p> Please use this form to insert new elements to the database. </p>


      <div class="form-group">
        <label for="elename"> New element name: </label>
        <input type="text" class="form-control" name="name" placeholder="New element name">
      </div>

      <div class="form-group">
        <label for="eledesc"> New element description: </label>
        <textarea class="form-control" name="description" rows="2"></textarea>
      </div>

      <input type="submit" class="btn btn-success" style="background-color: #2a8c3e" value="Add to database">
    </form>
  </div>
</body>
