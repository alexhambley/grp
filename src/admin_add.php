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
	<title> Admin Login </title>
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


    <!-- INSERT THEME -->

    <form action="_insertTheme.php" style="margin-top: 62px" method="post">
      <h4> Insert Themes </h4>
      Name:
      <input type="text" name="name">
      <br>
      Explanation:
      <input type="text" name="explanation">
      <br>
      <input type="submit" value="Submit"><br><br>
    </form>

    <!-- INSERT ROLE -->

    <form action="_insertRole.php" style="margin-top: 62px" method="post">
      <h4> Insert Roles </h4>
      Entry Name:
      <input type="text" name="entry">
      <br>
      Description:
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
      Related Elements:
      <br>
      <?php
        $stmt = $conn->prepare("SELECT id, elementname FROM element ORDER BY id ASC");
        $stmt->execute();
        $stmt->bind_result($id, $elementname);
        while ($stmt->fetch()) {
            $id = htmlentities($id);
            $elementname = htmlentities($elementname);
            echo "<input type=\"checkbox\" name=\"$elementname\" value=\"$id\">";
            echo $elementname;
            echo "<br>";
        }
      ?>
      <br>
      Related Themes:
      <br>
      <?php
        $stmt = $conn->prepare("SELECT id, themename FROM theme ORDER BY id ASC");
        $stmt->execute();
        $stmt->bind_result($themeid, $themename);
        while ($stmt->fetch()) {
            $themeid = htmlentities($themeid);
            $themename = htmlentities($themename);
            echo "<input type=\"checkbox\" name=\"$themename\" value=\"$themeid\">";
            echo $themename;
            echo "<br>";
        }
      ?>
      <input type="submit" value="Submit"><br><br>
    </form>

    <!-- INSERT ELEMENT -->

    <form action="_insertElement.php" style="margin-top: 62px" method="post">
      <h4> Insert Elements </h4>

      Element Name:
      <input type="text" name="name">
      <br>
      Element Description:
      <input type="text" name="description">
      <br>
    <input type="submit" value="Submit"><br><br>
    </form>


    <!-- <form action="/action_page.php" style="margin-top: 62px">
  		<fieldset>
    		<legend>Add:</legend>
    		Themes:<br>
    		<input type="text" name="firstname">
    		<input type="submit" value="Submit"><br><br>
    		Role:<br>
    		<input type="text" name="lastname" >
    		<input type="submit" value="Submit"><br><br>
    		Elements:<br>
    		<input type="text" name="lastname" >
    		<input type="submit" value="Submit"><br><br>
  			</fieldset>
	</form> -->

</body>
