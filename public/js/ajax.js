var xmlHttp;
var uri = "";
var callingFunc = "";
var sResponse = "";

function GetXmlHttpObject()
{

	xmlHttp=null;
	try
	{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{

	  // Internet Explorer
		try
		{
				//alert('jigishtry');
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				//alert('jigishtried');
		}
		catch (e)
		{
				//alert('jigishcatch');
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				//alert('jigishcatched');
		}
	}
//	alert(xmlHttp);
	return xmlHttp;
}


function remoteCall(sUrl, sQueryStr, sCalledBy)
{
	//alert(sUrl);
	//alert(sQueryStr);
	//alert(sCalledBy);
	//str = 'nick_name='+escape(document.createPF.nick_name.value)+'&sex='+escape(document.createPF.sex.value)+'&age='+escape(document.createPF.age.value);

/*	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
		req.onreadystatechange = stateHandler;
		req.open("POST", sUrl, true);
		req.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		req.send(sQueryStr);
		// branch for IE/Windows ActiveX version
	} else if (window.ActiveXObject) {
		req = new ActiveXObject("Microsoft.XMLHTTP");
		if (req) {
			req.onreadystatechange = stateHandler;
			req.open("POST", sUrl, true);
			req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			req.send(sQueryStr);
		}
	}
*/	//alert(sQueryStr);
	uri = sUrl;
	callingFunc = sCalledBy;
	
	xmlHttp=GetXmlHttpObject();
	
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	if (xmlHttp) 
	{
		xmlHttp.onreadystatechange = stateHandler;
		xmlHttp.open("POST", sUrl, true);
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlHttp.send(sQueryStr);
	}	
//	alert('jigish');
}

function stateHandler() 
{
	if (xmlHttp.readyState == 4)
	{
		/*if (xmlHttp.status == 200)
		{*/
			sResponse = xmlHttp.responseText;
			//alert(sResponse);
			eval(callingFunc+'()');
/*		}
		else 
		{
			//alert('Failed!');
		} */
	}
	return true;
}

function addslashes(str) 
{
	str=str.replace(/\\/g,'\\\\');
	str=str.replace(/\'/g,'\\\'');
	str=str.replace(/\"/g,'\\"');
	str=str.replace(/\0/g,'\\0');
	return str;
}

function stripslashes(str) 
{
	str=str.replace(/\\'/g,'\'');
	str=str.replace(/\\"/g,'"');
	str=str.replace(/\\0/g,'\0');
	str=str.replace(/\\\\/g,'\\');
	return str;
}

function LTrim( value )
{
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
}

function RTrim( value )
{
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");
}

function trim( value )
{
	return LTrim(RTrim(value));
}


function emptyDropdown1(otherDropD)
{
		var sagar = otherDropD.length;
		for(var i = 0;i<sagar;i++)
		{
			otherDropD.remove(otherDropD.i);
		}
}

function IsEmpty(fieldvalue, fieldformname)
{	
	var err = '';
	if(fieldvalue.length == 0)
	{
		err += fieldformname +" should not be empty  \n";
		return err;
	}	
	return err;
}

function fireEvent(obj,evt){
	
	var fireOnThis = obj;
	if( document.createEvent ) {
	  var evObj = document.createEvent('MouseEvents');
	  evObj.initEvent( evt, true, false );
	  fireOnThis.dispatchEvent(evObj);
	} else if( document.createEventObject ) {
	  fireOnThis.fireEvent('on'+evt);
	}
}