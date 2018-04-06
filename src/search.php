<!DOCTYPE html>
<?php
include "header.php";
include "navbar.php";

?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CFGC Role Search</title>
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

            table {
                border-collapse: separate; border-spacing: 5px; width: 100%;
            }
            td {
                width: 50%; padding: 10px; font-size: 13px; vertical-align: top; background-color: aliceblue;
            }

            input[type="button"] {
                height:45px; font-size:15px; font-weight: bold; border-radius:0px; padding-left:15px; padding-right:15px; line-height: 40px; -webkit-appearance:none;  -moz-appearance:none;  -ms-appearance:none; appearance:none; margin: 5px; width:200px; border-radius: 5px; box-shadow: 0px 1px 2px #666;
                text-transform: uppercase;
            }
            .btnBlue { color: #fff; background-color: cornflowerblue; border: none; }
            .btnGrey { color: #fff; background-color: grey; border: none; }


            #loading { position: absolute; width: 100%; height: 50px; margin-top: -25px; top: 50%; }
        </style>



    </head>

    <body onload="init()">

        <div id="loading">Loading themes and elements for searching, please wait...</div>

        <div class="mainlayer" id="mainlayer" style="display: none">
            <h1>Competencies for Food Graduate Careers</h1>

            <h2>Search roles by themes and elements</h2>

            <p style="color: mediumvioletred; text-align: center;">Tip: clicking the name of each theme or element, you will see the related explanations</p>
            <div id="searchTables" style="display: none;">
                <h3>Themes</h3>
                <div id="themes">
                    <table>
                        <tr>
                            <td id="themeTop" colspan="2"></td>
                        </tr>
                        <tr>
                            <td id="themeLeft"></td>
                            <td id="themeRight"></td>
                        </tr>
                    </table>
                </div>

                <h3>Elements</h3>
                <div id="elements">
                    <table>
                        <tr>
                            <td id="elementLeft"></td>
                            <td id="elementRight"></td>
                        </tr>
                    </table>
                </div>
                <p>
                    <input type="button" class="btnBlue" value="Search Roles" onclick="searchRole()" />
                </p>
            </div>
        </div>

        <p aligh="center">
            <input type="button" class="btnGrey" value="Go Back" onclick="window.history.back()" />
        </p>



        <script src="js/search.js"></script>
    </body>
</html>
