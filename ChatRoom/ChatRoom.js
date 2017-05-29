var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
var xmlHttp;

if(window.ActiveXObject){ 
    try{
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }catch(e){
        xmlHttp = false;
    }
}else{ 
    try{
        xmlHttp = new XMLHttpRequest();
    }catch(e){
        xmlHttp = false;
    }
}

if(!xmlHttp)
    alert("Cant create that object !")
else
    return xmlHttp;
}

function process(){
if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
    //text = encodeURIComponent(document.getElementById("TextInput").value);
    xmlHttp.open("GET", "ChatXML.php",true);
    xmlHttp.onreadystatechange = handleServerResponse;
    xmlHttp.send(null);
}else{
    setTimeout('process()',1000);
}
}

function handleServerResponse(){
if(xmlHttp.readyState==4){
	if(xmlHttp.status==200){	
        xmlResponse = xmlHttp.responseXML; 
        xmlDocumentElement = xmlResponse.documentElement;
        message = xmlDocumentElement.firstChild.data;
		message = message.replace(/ /g,"<br/>");
        document.getElementById("ShowPanel").innerHTML = message;
        setTimeout('process()', 1000);
	}
    else{
        alert('Someting went wrong !');
    }
}
}

function sendprocess(){
if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
    text = encodeURIComponent(document.getElementById("TextInput").value);
    xmlHttp.open("GET", "ChatXML.php?TextInput="+text,true);
    xmlHttp.onreadystatechange = sendhandleServerResponse;
    xmlHttp.send(null);
}else{
    setTimeout('sendprocess()',1000);
}
}

function sendhandleServerResponse(){
if(xmlHttp.readyState==4){
	if(xmlHttp.status==200){	
        xmlResponse = xmlHttp.responseXML; 
        xmlDocumentElement = xmlResponse.documentElement;
        message = xmlDocumentElement.firstChild.data;
		message = message.replace(/ /g,"<br/>");
        document.getElementById("ShowPanel").innerHTML = message;
        //setTimeout('process()', 1000);
	}
    else{
        alert('Someting went wrong !');
    }
}
}