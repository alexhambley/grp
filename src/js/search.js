var xmlHttp;

function GetXmlHttpObject() {
	var xmlHttpObj = null;
	try	{
		// Firefox, Opera 8.0+, Safari
		xmlHttpObj = new XMLHttpRequest();
	} catch (e)	{
		//Internet Explorer
		try	{
			xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e)	{
            xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttpObj;
}

/*--- End xmlHttp object used to load remote data ---*/













var jsonData;
var domThemeLeft = document.getElementById("themeLeft");
var domThemeRight = document.getElementById("themeRight");
var domThemeTop = document.getElementById("themeTop");
var domElementLeft = document.getElementById("elementLeft");
var domElementRight = document.getElementById("elementRight");

var searchTables = document.getElementById("searchTables");
var mainlayer = document.getElementById("mainlayer");
var loading = document.getElementById("loading");



function init() {
    xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert ("Browser does not support HTTP Request");
		return;
	}
	
	var url = "_loadThemesElements.php";
	
    xmlHttp.onreadystatechange = onLoadData;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

















function onLoadData() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        if (xmlHttp.status == 200) {	
			jsonData = JSON.parse(xmlHttp.responseText);
			console.log(jsonData);
            
            if (jsonData['server_message'] == "Search criteria") {
                initSearchPanel(jsonData);
            }
            
            
        } else {
            alert("There was a problem retrieving the data:\n" + xmlHttp.statusText);
        }
    }
}





function initSearchPanel(json) {
    var htmlStrLeft = "";
    var htmlStrRight = "";
    var htmlStrTop = "";
    var themeObj = json['themes'];
    var elementObj = json['elements'];
    
    for (i = 1; i < themeObj.length; i++) {
        if (i % 2 == 1) {
            htmlStrLeft += '<p><input type="checkbox" name="qThemes" value="'+themeObj[i].theme_id+'"  onclick="changeTheme(this.value)" />';
            htmlStrLeft += '<span style="margin-left:15px;"><b  style="cursor:pointer;" onclick="showDetails(\'theme_'+themeObj[i].theme_id+'\')">'+themeObj[i].theme_id+" - "+themeObj[i].name+'</b><br><em id="theme_'+themeObj[i].theme_id+'" style="display:none;">'+themeObj[i].explanation+'</em></span></p>';
        } else {
            htmlStrRight += '<p><input type="checkbox" name="qThemes" value="'+themeObj[i].theme_id+'" onclick="changeTheme(this.value)" />';
            htmlStrRight += '<span style="margin-left:15px;"><b  style="cursor:pointer;" onclick="showDetails(\'theme_'+themeObj[i].theme_id+'\')">'+themeObj[i].theme_id+" - "+themeObj[i].name+'</b><br><em id="theme_'+themeObj[i].theme_id+'" style="display:none;">'+themeObj[i].explanation+'</em></span></p>';
        }
    }
    
    htmlStrTop += '<input type="checkbox" name="qThemes" value="'+themeObj[0].theme_id+'" onclick="changeTheme(this.value)" />';
    htmlStrTop += '<span style="margin-left:15px;"><b  style="cursor:pointer;" onclick="showDetails(\'theme_'+themeObj[0].theme_id+'\')">'+themeObj[0].theme_id+" - "+themeObj[0].name+'</b><br><em id="theme_'+themeObj[0].theme_id+'" style="display:none;">'+themeObj[0].explanation+'</em></span>';
    
    domThemeLeft.innerHTML = htmlStrLeft;
    domThemeRight.innerHTML = htmlStrRight;
    domThemeTop.innerHTML = htmlStrTop;
    
    
    
    htmlStrLeft = "";
    htmlStrRight = "";
    for (i = 0; i < elementObj.length; i++) {
        if (i % 2 == 0) {
            htmlStrLeft += '<p><input type="checkbox" name="qElements" value="ele_'+elementObj[i].id+'" />';
            htmlStrLeft += '<span style="margin-left:15px;"><b  style="cursor:pointer;" onclick="showDetails(\'ele_'+elementObj[i].id+'\')">'+elementObj[i].name+'</b><br><em id="ele_'+elementObj[i].id+'" style="display:none;">'+elementObj[i].description+'</em></span></p>';
        } else {
            htmlStrRight += '<p><input type="checkbox" name="qElements" value="ele_'+elementObj[i].id+'" />';
            htmlStrRight += '<span style="margin-left:15px;"><b  style="cursor:pointer;" onclick="showDetails(\'ele_'+elementObj[i].id+'\')">'+elementObj[i].name+'</b><br><em id="ele_'+elementObj[i].id+'" style="display:none;">'+elementObj[i].description+'</em></span></p>';
        }
    }
    
    
    domElementLeft.innerHTML = htmlStrLeft;
    domElementRight.innerHTML = htmlStrRight;

    searchTables.style.display = "inline";
    
    loading.style.display = "none";
    mainlayer.style.display = "inline-block";
}








function showDetails(dom_id) {
    
    var select_em = document.getElementById(dom_id);
    var isVisible = (select_em.style.display == "inline") ? true : false;
    
    var emObj = document.getElementsByTagName("em");
    for (i = 0; i < emObj.length; i++) {
        emObj[i].style.display = "none";
    }
    
    select_em.style.display = (isVisible) ? "none" : "inline";
}


function changeTheme(q) {
//    var themeCheckBoxes = document.getElementsByName("qThemes");
//    
//    if (q == "D0") {
//        for (i = 0; i < themeCheckBoxes.length; i++) {
//            if (themeCheckBoxes[i].value != "D0") {
//                themeCheckBoxes[i].checked = false;
//            }
//        }
//    } else {
//        for (i = 0; i < themeCheckBoxes.length; i++) {
//            if (themeCheckBoxes[i].value == "D0") {
//                themeCheckBoxes[i].checked = false;
//            }
//        }
//    }
}










function searchRole() {
    var themeCheckBoxes = document.getElementsByName("qThemes");
    var themeIdArray = [];
    var themeIdStr = "";
    var elementCheckBoxes = document.getElementsByName("qElements");
    var elementIdArray = [];
    var elementIdStr = "";
    
    for (i = 0; i < themeCheckBoxes.length; i++) {
        if (themeCheckBoxes[i].checked == true) {
            themeIdArray.push(themeCheckBoxes[i].value);
        }
    }
    themeIdStr = themeIdArray.join(",");
    
    for (i = 0; i < elementCheckBoxes.length; i++) {
        if (elementCheckBoxes[i].checked == true) {
            var e_id = elementCheckBoxes[i].value.split("ele_")[1];
            elementIdArray.push(e_id);
        }
    }
    elementIdStr = elementIdArray.join(",");
    
    console.log("themeIdStr: "+themeIdStr);
    console.log("elementIdStr: "+elementIdStr);
    window.location = "result.php?tid="+themeIdStr+"&eid="+elementIdStr;
}



