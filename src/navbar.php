<!DOCTYPE html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<head>
    <style type="text/css">
    .navbar-header img {
        width: 15%;
        height: auto;
        float:left;
        text-align: center;
        vertical-align: middle;
        padding: 4pt;
    }
    .nav {
        line-height:30px;
        float: right;
        vertical-align: middle;
    }
    .btn {
        color: white;
    }
    .navbar-brand {
        padding-top: 23pt;
        padding-left: 20pt;
        color: #1c2c67;
    }
    .navbar-nav {
        padding: 12pt;
    }

    .navbar {
      background-color: white;

    }

    </style>
</head>
<body>
    <style>
    /* Otherwise the navbar will cover stuff in body */
    /* <a href="http://www.nottingham.ac.uk/" style="background-image: url(img/UoN_Primary_Logo_RGB.png); float: left; padding-left: 10px; padding-bottom: 5px"></a>*/
        body {
            padding-top: 70px;
        }
    </style>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <img id = "image" href="http://www.nottingham.ac.uk/" src="img/UoN_Primary_Logo_RGB.png">
                <a class="navbar-brand" href="index.php" style="color: #1c2c67;">Competencies for Food Graduate Careers</a>
                <ul id='navbar' class="nav navbar-nav ">
                    <li> <a href="index.php"  style="color: #1a296b; font-weight: bold"> View All </a></li>
                    <li> <a href="view_students.php" style="color: #1a296b; font-weight: bold"> Find a Career </a></li>
                    <li> <a href="admin_login.php"  style="color: #1a296b; font-weight: bold"> Admin </a></li>
                    <li>
                        <form id="searchform" class="navbar-form navbar-left" method="get" action="navbar_search.php">
                            <div class="input-group">
                                <input type="text" name="selection" id="search" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit" form="searchform" style="float:right">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </input>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <div id="display">
    </div> -->
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
                //    $("#display").html(html).show();
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
