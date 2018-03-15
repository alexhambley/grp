<!DOCTYPE html>
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
            <ul id='navbar' class="nav navbar-nav">
                <li> <a href="view_students.php"> Students </a></li>
                <li> <a href="index.php"> Public (View All) </a></li>
                <li> <a href="admin_login.php"> Admin Login </a></li>
                <li>
                    <form id="searchform" method="get" action="navbar_search.php">
                        <input type="text" name="selection" id="search" class="form-control" placeholder="Search">
                        <button type="submit" form="searchform">Search</button>
                    </form>
                </li>
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

$(document).ready(function () {
    var activePage = window.location;
    $('ul.nav a[href="'+ activePage +'"]').parent().addClass('active');
    $('ul.nav a').filter(function() {
         return this.href == url;
    }).parent().addClass('active');
});

</script>
