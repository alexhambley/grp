<?php
    include "header.php";
    include "navbar.php";
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<head>
    <Title> View All </Title>
     <style>

       .bg-grey {
      background-color: #f6f6f6;
  }
       .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
     .thumbnail img {
        width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
    .thumbnail:hover {
        box-shadow: 5px 0px 40px rgba(0,0,0, .2);
    }
    .btn {
        background-color: #192A6C;
    }
  </style>
</head>

<body class="bg-grey">



<div class="container-fluid text-center">
<br>

<div>
    <h3>Welcome to the Competencies for Food Graduates Toolkit</h3>
    <h5>On this site, you can select your competencies, either as key themes, roles, or elements that you feel you are strong in, and learn more about the individual roles available to you as a food graduate.</h5>
    </div>

<div class="col-sm-4">
    <div class="thumbnail">
    <img src="img/roles.jpg" alt="Roles" style="width:500px;height:300px;">
<button type="button" class="btn btn-primary" onclick="showRoles()"> Show / Hide Roles </button>
<div id="Roles" style="display:none;">
<?php
    include "view_all_roles.php"
?>

</div>
<script>
    function showRoles() {
        var x = document.getElementById("Roles");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
</div>
</div>








    <div class="col-sm-0.5" style="background:blue">
    </div>
    <div class="col-sm-4">
        <div class="thumbnail">
        <img src="img/maxresdefault.jpg" alt = "Theme" style="width:500px;height:300px;">
    <button type="button" class="btn btn-primary" onclick="showThemes(this)"> Show / Hide Themes </button>
    <div id="Themes" style="display:none;">
        <?php
            include "view_all_themes.php"
        ?>

    </div>





    <script>
        function showThemes(myButton) {
            var x = document.getElementById("Themes");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    </div>
    </div>









    <div class="col-sm-4">
        <div class="thumbnail">
        <img src="img/4-elements-of-nature.jpg" style="width:500px;height:300px;">
    <button type="button" class="btn btn-primary" onclick="showElements()"> Show / Hide Elements </button>
    <div id="Elements" style="display:none;">
    <?php
        include "view_all_elements.php"
    ?>

    </div>
    <script>
        function showElements() {
            var x = document.getElementById("Elements");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    </div>
    </div>
    <div class="col-sm-0.5">
    </div>
</div>
</body>
