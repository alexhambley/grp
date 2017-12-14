
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












var roleData;

var role_list = document.getElementById("role_list");









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
    optObj.text = "Please select a role below ...";
    role_list.add(optObj);
    
    for (i = 0; i < roleData.length; i++) {
        var optObj = document.createElement("option");
        optObj.value = roleData[i].id;
        optObj.text = roleData[i].entry;
        role_list.add(optObj);
    }
    role_list.size = role_list.options.length;
}



function viewRoleProfile() {
    var roleID = role_list.options[role_list.selectedIndex].value;
    
    if (roleID > 0) {
        window.location = "roleProfile.php?id="+roleID;
    }
}





