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
function fill(Value) {
   $('#search').val(Value);
   $('#display').hide();
}

$(document).ready(function() {
   $("#search").keyup(function() {
       var name = $('#search').val();
       if (name == "") {
           $("#display").html("");
       } else {
           $.ajax({
               type: "POST",
               url: "ajax.php",
               data: {
                   search: name
               },
               success: function(html) {
                   $("#display").html(html).show();
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
