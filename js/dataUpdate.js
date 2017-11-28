
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












var roleData, themeData, elementData;

var role_list = document.getElementById("role_list");
var role_descr = document.getElementById("role_descr");
var themes = document.getElementById("themes");
var elements = document.getElementById("elements");
var btnUpdate = document.getElementById("btnUpdate");








//--- Start loading
function loadAllRoles () {
    xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert ("Browser does not support HTTP Request");
		return;
	}
	
	var url = "_loadAllRole.php";
	
    xmlHttp.onreadystatechange = onLoadAllRoles;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function onLoadAllRoles() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        if (xmlHttp.status == 200) {	
			roleData = JSON.parse(xmlHttp.responseText);
			console.log(roleData);
            doRoleList();
        } else {
            alert("There was a problem retrieving the data:\n" + xmlHttp.statusText);
        }
    }
}

function doRoleList() {
    var optObj = document.createElement("option");
    optObj.value = "0";
    optObj.text = "Please select a role...";
    role_list.add(optObj);
    
    for (i = 0; i < roleData.length; i++) {
        var optObj = document.createElement("option");
        optObj.value = roleData[i].themes;
        optObj.text = roleData[i].entry;
        role_list.add(optObj);
    }
    
    role_list.setAttribute("onchange","getRoleInfo(this)");
    
}


function getRoleInfo(obj) {
    var role_info_index = obj.selectedIndex-1;
    
    if (role_info_index >= 0) {
        role_descr.innerHTML = "<p><b>Description</b><br>"+roleData[role_info_index].description+"</p>";
    
        var role_names = roleData[role_info_index].names.split(",").join(", ");
        role_descr.innerHTML += "<p><b>Typical role names</b><br>"+role_names+"</p>";
    } else {
        role_descr.innerHTML = "";
        themes.innerHTML = "";
        elements.innerHTML = "";
        btnUpdate.disabled = true;
    }
    
    loadThemeInfo(roleData[role_info_index].themes);
}

function loadThemeInfo(q) {
    xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert ("Browser does not support HTTP Request");
		return;
	}
	
	var url = "_loadThemesByRole.php?q="+q;
	
    xmlHttp.onreadystatechange = onLoadThemes;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function onLoadThemes() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        if (xmlHttp.status == 200) {	
			themeData = JSON.parse(xmlHttp.responseText);
			console.log(themeData);
            doThemesDisplay();
            loadElementsInfo();
        } else {
            alert("There was a problem retrieving the data:\n" + xmlHttp.statusText);
        }
    }
}


function doThemesDisplay() {
    themes.innerHTML = "";
    
    var role_info_index = role_list.selectedIndex-1;
    var role_theme_array = roleData[role_info_index].themes.split(",");
    
    
    for (j = 0; j < role_theme_array.length; j++) {
        for (i = 0; i < themeData.length; i++) {
            if (role_theme_array[j] == themeData[i].theme_id) {
                var htmlStr = "<li><p><b>"+themeData[i].theme_id+" - "+themeData[i].name+"</b><br>";
                htmlStr += themeData[i].explanation+"</p></li>";
                themes.innerHTML += htmlStr;
            } 
        }
    }
    themes.innerHTML = "<ul>"+themes.innerHTML+"</ul>";
}

function loadElementsInfo() {
    xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert ("Browser does not support HTTP Request");
		return;
	}
	
	var url = "_loadAllElement.php";
	
    xmlHttp.onreadystatechange = onLoadElements;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function onLoadElements() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        if (xmlHttp.status == 200) {	
			elementData = JSON.parse(xmlHttp.responseText);
			//console.log(elementData);
            doElementDisplay();
            
        } else {
            alert("There was a problem retrieving the data:\n" + xmlHttp.statusText);
        }
    }
}

function doElementDisplay() {
    var htmlStr = "";
    
    var role_info_index = role_list.selectedIndex-1;
    var role_elements_array = [];
    if (roleData[role_info_index].elements != null) {
        role_elements_array = roleData[role_info_index].elements.split(",")
    }
    console.log(role_elements_array);
    
    for (i = 0; i < elementData.length; i++) {
        htmlStr += '<input type="checkbox" name="role_elements" value="'+elementData[i].id+'" ';
        
        if (role_elements_array.indexOf(elementData[i].id) != -1) {
            htmlStr += "checked";
        }
        htmlStr += ' /><span style="margin-left:15px;"><b  style="cursor:pointer;" onclick="showElementDetails('+elementData[i].id+')">'+elementData[i].name+'</b><em id="ele_'+elementData[i].id+'" style="display:none;"> - '+elementData[i].description+'</em></span><br>';
    }    
    elements.innerHTML = htmlStr;
    
    btnUpdate.disabled = false;
}

function showElementDetails(ele_id) {
    
    var select_em = document.getElementById("ele_"+ele_id);
    var isVisible = (select_em.style.display == "inline") ? true : false;
    
    var emObj = document.getElementsByTagName("em");
    for (i = 0; i < emObj.length; i++) {
        emObj[i].style.display = "none";
    }
    
    var select_em = document.getElementById("ele_"+ele_id);
    select_em.style.display = (isVisible) ? "none" : "inline";
}




function updateRoleElements() {
    var role_info_index = role_list.selectedIndex-1;
    
    var check_id = [];
    var checkObj = document.getElementsByName("role_elements");
    for (i = 0; i < checkObj.length; i++) {
        if (checkObj[i].checked == true) {
            check_id.push(checkObj[i].value);
        }
    }
    console.log("check_id:");
    //console.log(check_id);
    
    var updateData = "roleId="+roleData[role_info_index].id+"&elementId="+check_id.join(",");
    //update local roleData
    roleData[role_info_index].elements = check_id.join(",");
    
    
    
    xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert ("Browser does not support HTTP Request");
		return;
	}
	
	var url = "_updateRoleElements.php?"+updateData;
	
    xmlHttp.onreadystatechange = onDataUpdated;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}


function onDataUpdated() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        if (xmlHttp.status == 200) {	
			alert(xmlHttp.responseText);
            
        } else {
            alert("There was a problem retrieving the data:\n" + xmlHttp.statusText);
        }
    }
}








