<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<head>
    <style type="text/css">
    .navbar-header img {
       display: block;
        /* max-width:150px; */
        /* max-height:auto; */
        /* width: auto; */
        /* height: auto; */
        width: 25%;
        height: auto;
        float:left;
        text-align: center; 
        padding: 4pt;
    }
    .nav { 
        line-height:20px;
        float: right;
        vertical-align: middle;
    }
    .btn {
        color: white;
    }
    .navbar-brand { 
        /* line-height: 80px; */
        padding-top: 14pt;
        /* padding-bottom: 2pt; */
        padding-left: 20pt;
        color: #1c2c67;
    }
    .navbar-nav {
        padding-top: 2pt;
        padding-bottom: 2pt;
    }

    .navbar {
      background-color: white;
    }

    #nav_bar .active {
    color:            #F8F8F8;
    background-color: #4f81bd;
}

@media (min-width: 450px) and (max-width: 1154px) {
    .navbar-header {
        float: none;
    }
    .navbar-left,.navbar-right {
        float: none !important;
    }
    .navbar-toggle {
        display: block;
    }
    .navbar-collapse {
        border-top: 1px solid transparent;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }
    .navbar-fixed-top {
        top: 0;
        border-width: 0 0 1px;
    }
    .navbar-collapse.collapse {
        display: none!important;
    }
    .navbar-nav {
        float: none!important;
        margin-top: 7.5px;
    }
    .navbar-nav>li {
        float: none;
        text-align: center; 

    }
    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .collapse.in{
        display:block !important;
    }
    .uon-image {
        display: none;
    }
    .navbar-brand { 
        /* line-height: 80px; */
        /* padding-top: 14pt; */
        padding-bottom: 2pt;
        padding-left: 20pt;
    }
}

@media (min-width: 350px) and (max-width: 449px) {
    .navbar-header {
        float: none;
    }
    .navbar-left,.navbar-right {
        float: none !important;
    }
    .navbar-toggle {
        display: block;
    }
    .navbar-collapse {
        border-top: 1px solid transparent;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }
    .navbar-fixed-top {
        top: 0;
        border-width: 0 0 1px;
    }
    .navbar-collapse.collapse {
        display: none!important;
    }
    .navbar-nav {
        float: none!important;
        margin-top: 7.5px;
    }
    .navbar-nav>li {
        float: none;
        text-align: center; 

    }
    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .collapse.in{
        display:block !important;
    }
    .uon-image {
        display: none;
    }
    .navbar-brand {
        font-size: 12px;
    }
}

@media (max-width: 349px) {
    .navbar-header {
        float: none;
    }
    .navbar-left,.navbar-right {
        float: none !important;
    }
    .navbar-toggle {
        display: block;
    }
    .navbar-collapse {
        border-top: 1px solid transparent;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }
    .navbar-fixed-top {
        top: 0;
        border-width: 0 0 1px;
    }
    .navbar-collapse.collapse {
        display: none!important;
    }
    .navbar-nav {
        float: none!important;
        margin-top: 7.5px;
    }
    .navbar-nav>li {
        float: none;
        text-align: center; 

    }
    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .collapse.in{
        display:block !important;
    }
    .uon-image {
        display: none;
    }
    .navbar-brand {
        font-size: 10px;
    }
}

    
    </style>
</head>
<body>
    <style>
    /* Otherwise the navbar will cover stuff in body */
    /* <a href="http://www.nottingham.ac.uk/" style="background-image: url(img/UoN_Primary_Logo_RGB.png); float: left; padding-left: 10px; padding-bottom: 5px"></a>*/

        body {
            padding-top: 50px;
        }
    </style>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <div class="uon-image"> 
                <a href="http://www.nottingham.ac.uk/"> <img id="image" src="img/UoN_Primary_Logo_RGB.png"> </a> 
            </div>
            <a class="navbar-brand" href="index.php" style="color: #1c2c67; font-weight: bold">Competencies for Food Graduate Careers</a> 

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav"> 
                <li> <a href="index.php" style="color: #1a296b; font-weight: bold"> View All </a></li>
                <li> <a href="view_students.php" style="color: #1a296b; font-weight: bold"> Find a Career </a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #1a296b; font-weight: bold"> More
                        <span class="caret"> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="https://www.nottingham.ac.uk/biosciences/subject-areas/Food/" target="_blank" style="color: #1a296b; font-weight: bold; background-color: white;">
                            UoN Food Science Courses
                        </a></li>
                        <li><a href="https://www.ifst.org/knowledge-centre-other-knowledge/competencies-food-graduate-careers" target="_blank" style="color: #1a296b; font-weight: bold; background-color: white;">
                            IFST Link to the Competencies
                        </a></li>
                    </ul>
                </li>
                <li> <a href="admin_login.php"  style="color: #1a296b; font-weight: bold"> Admin </a></li>
                <li>
                    <form id="searchform" class="navbar-form navbar-left form-inline my-2 my-lg-0" method="get" action="navbar_search.php">
                        <div class="input-group">
                            <input type="text" name="selection" id="search" class="form-control mr-sm-2" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default my-2 my-sm-0"type="submit" form="searchform" style="float:right">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </input>
                        </div>
                    </form>
                </li>
            </ul> 
        </div>
    </nav> 
</body>


<script>
    $(function(){
        $('a').each(function(){
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass('active'); $(this).parents('li').addClass('active');
            }
        });
    });
</script>
