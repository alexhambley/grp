<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>


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

    <!-- <form action="_insertRole.php" style="margin-top: 62px" method="post">
      <h4> Insert Roles </h4>
      Entry Name:
      <input type="text" name="name">
      <br>
      Description:

      Alternative Names:


      Related Elements:


      Related Themes:




      <input type="submit" value="Submit"><br><br>
    </form>

    <form action="_insertElement.php" style="margin-top: 62px" method="post">
      Insert Elements
      <input type="text" name="element">
      <input type="submit" value="Submit"><br><br>
    </form> -->


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
