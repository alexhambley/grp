<?php
    include 'header.php';
    include 'navbar.php';
 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CFGC Data Update</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="css/shared.css">
        <style type="text/css">
            h1 { line-height: 35px; color: cornflowerblue; font-weight: 400; text-transform: uppercase; }
            h2 { background-color: cornflowerblue; color: white; text-transform:uppercase; text-align: center; padding: 10px; margin: 0px;}
            h3 { color:royalblue; text-indent: 5px;}

            input[type="button"] {
                height:45px; font-size:15px; font-weight: bold; border-radius:0px; padding-left:15px; padding-right:15px; line-height: 40px; -webkit-appearance:none;  -moz-appearance:none;  -ms-appearance:none; appearance:none; margin: 5px; width:200px; border-radius: 5px; box-shadow: 0px 1px 2px #666;
                text-transform: uppercase;
            }
            .btnBlue { color: #fff; background-color: cornflowerblue; border: none; }
            .btnGrey { color: #fff; background-color: grey; border: none; }
        </style>
    </head>

    <body onload="loadAllRoles()">
        <div class="mainlayer">
            <h1>Competencies for Food Graduate Careers</h1>

            <h2>Roles Update</h2>
            <br>
            <p>
            <select id="role_list"></select>
            </p>
            <div id="role_descr"></div>

            <hr>
            <h3>Desirable themes</h3>
            <div id="themes">n/a</div>

            <hr>
            <h3>Desirable elements</h3>
            <div id="elements">n/a</div>
            <p>
                <input type="button" class="btnBlue" value="Update" id="btnUpdate" onclick="updateRoleElements()" disabled />
                <input type="button" class="btnGrey" value="Back" onclick="window.history.back()" />
            </p>
        </div>    
        <script src="js/dataUpdate.js"></script>
    </body>
</html>
