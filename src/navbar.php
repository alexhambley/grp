<!DOCTYPE html>
<?php include "js/footer.js"; ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<body>
    <style>
    /* Otherwise the navbar will cover stuff in body */
        body { padding-top: 70px; }
    </style>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Competencies for Food Graduates</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="view_students.php"> Students </a></li>
                <li><a href="view_all.php"> Public (View All) </a></li>
                <li><a href="admin_login.php"> Admin Login </a></li>
                <li><input type="text" id="search" class="form-control" placeholder="Search"></li>
                <div id="display"></div>
            </ul>
        </div>
    </nav>
</body>

<script>

//Getting value from "ajax.php".
function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search').val(Value);
   //Hiding "display" div in "search.php" file.
   $('#display').hide();
}

$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {

       //Assigning search box value to javascript variable named as "name".

       var name = $('#search').val();

       //Validating, if "name" is empty.

       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       }

       //If name is not empty.

       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "ajax.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();
                   console.console.log(search);
               }
           });
       }
   });
});
// $(document).ready(function() {
//     $('li.active').removeClass('active');
//     $('a[href="' + location.pathname + '"]').closest('li').addClass('active');
// });
</script>
