<!DOCTYPE html>
<?php include "js/footer.js"; ?>
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
            </ul>
        </div>
    </nav>
</body>

<script>
// $(document).ready(function() {
//     $('li.active').removeClass('active');
//     $('a[href="' + location.pathname + '"]').closest('li').addClass('active'); 
// });
</script>
