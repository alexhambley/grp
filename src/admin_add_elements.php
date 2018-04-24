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
      <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
        <button type="button"
                class="btn btn-secondary"
                onclick="window.location.href='admin_add_roles.php'">
          &nbsp&nbspRoles&nbsp
        </button>
        <button type="button"
                class="btn btn-secondary"
                onclick="window.location.href='admin_add_themes.php'">
          &nbspThemes&nbsp
        </button>
        <button type="button"
                class="btn btn-secondary"
                onclick="window.location.href='admin_add_elements.php'"
                disabled>
          Elements
        </button>
      </div>
    </div>

    <form action="_insertElement.php" method="post">
      <div class="text-center">
        <h2> Add Elements </h2>
      </div>
      <p> Please use this form to insert new elements to the database. </p>
      
      <div class="form-group">
        <label for="elename"> New element name: </label>
        <input type="text" class="form-control" name="name" placeholder="New element name" required>
      </div>

      <div class="form-group">
        <label for="eledesc"> New element description: </label>
        <textarea class="form-control" name="description" rows="2" required></textarea>
      </div>

      <input type="submit" class="btn btn-success" style="background-color: #2a8c3e" value="Add to database">
    </form>
  </div>
</body>
