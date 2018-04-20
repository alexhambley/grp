<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
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

    #nav_bar .active {
    color:            #F8F8F8;
    background-color: #4f81bd;
}

    /* li:active { 
        background-color: yellow;
    } */
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
                <a href="http://www.nottingham.ac.uk/"> <img id="image" src="img/UoN_Primary_Logo_RGB.png"> </a>        
                <a class="navbar-brand" href="index.php" style="color: #1c2c67; font-weight: bold">Competencies for Food Graduate Careers</a>
                <ul id='navbar' class="nav navbar-nav ">
                    <!-- <li id="navbar-index"></li> --> 
                    <li> <a href="index.php" style="color: #1a296b; font-weight: bold"> View All </a></li>

                        <script>
                        //  if (window.location.pathname == "index.php")
                        //  {
                        //      document.getElementById("navbar-index").innerHTML = "<a href="index.php"  style="color: #92918e; font-weight: bold"> View All </a>";
                        //  }
                        //  else
                        //  {
                        //      document.getElementById("navbar-index").innerHTML = "<a href="index.php"  style="color: #1a296b; font-weight: bold"> View All </a>";
                        //  }
                        </script>
                    
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
    $(function(){
        $('a').each(function(){
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass('active'); $(this).parents('li').addClass('active');
            }
        });
    });



// $(document).ready(function () {
//     var activePage = window.location;
//     $('li.nav navbar-nav a[href="'+ activePage +'"]').parent().addClass('active');
//     $('li.nav a').filter(function() {
//          return this.href == url;
//     }).parent().addClass('active');
// });

</script>
