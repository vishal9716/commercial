// JavaScript Document
var image = "<img src='public/images/ajax-loader_red.gif'>";
function getdetails()
{

    var user_type_id=document.getElementById('user_type_id').value;
	
	remoteCall(myheader+"/formaccess/det/"+user_type_id,'',"display_det");
        
}

function display_det()
{
	//alert(sResponse);
	document.getElementById('main_result').innerHTML='';
	document.getElementById('main_result').innerHTML=sResponse;
}

function update_access(mod,pag)
{
	//alert(mod+'hiii'+pag);
	document.getElementById("err"+mod).innerHTML="<center>" + image + "<b> Please Wait While Updating Access</b></center>";
	var str='';
	var modcnt=document.getElementById(mod+'pgcount').value;
	var user_type_id=document.getElementById('user_type_id').value;
	for(var i=0;i<modcnt;i++)
	{
		//alert(i);
		var faccessid=document.getElementById(mod+'faccess'+i).value;
		if(faccessid=="0")
		{
			//alert("no");
			str=str+faccessid+'#';
		}
		else
		{
			//alert("yes");
			str=str+faccessid+'#';
		}
		//var faccessid=document.getElementById(mod+'access'+i).value;
		if(document.getElementById(mod+'access'+i).checked==true)
		{
			//alert("true");
			str=str+'1#';
		}
		else
		{
			str=str+'0#';
			//alert("false");
		}
		if(document.getElementById(mod+'ins'+i).checked==true)
		{
			//alert("true");
			str=str+'1#';
		}
		else
		{
			str=str+'0#';
			//alert("false");
		}
		if(document.getElementById(mod+'upd'+i).checked==true)
		{
			//alert("true");
			str=str+'1#';
		}
		else
		{
			str=str+'0#';
			//alert("false");
		}
		if(document.getElementById(mod+'del'+i).checked==true)
		{
			//alert("true");
			str=str+'1#';
		}
		else
		{
			str=str+'0#';
			//alert("false");
		}
		if(document.getElementById(mod+'view'+i).checked==true)
		{
			//alert("true");
			str=str+'1#';
		}
		else
		{
			str=str+'0#';
			//alert("false");
		}
		var pgid=document.getElementById(mod+'page_id'+i).value;
		str=str+user_type_id+'#';
		str=str+mod+'#';
		str=str+pgid+'#';
		str=str+'@';
	}
	
	remoteCall(myheader+"/formaccess/update","acc="+trim(str)+"&user_type_id="+user_type_id+"&mod="+mod,"display_change");
}
function display_change()
{
	//alert(trim(sResponse));
	var s=new Array();
	s=trim(sResponse).split("@");
	//alert(s[1]);
	document.getElementById('main_result').innerHTML='';
	document.getElementById('main_result').innerHTML=trim(s[0]);
	document.getElementById('mod'+s[1]).style.display='block';
	document.getElementById('modstat'+s[1]).value='1';
}

function open_down(modid)
{
	//alert("hi");
	var stat=document.getElementById('modstat'+modid).value;
	if(stat=="0")
	{
		document.getElementById('mod'+modid).style.display='block';
		document.getElementById('my'+modid).src='public/images/minus.gif';
		document.getElementById('show'+modid).title='Click Here To Collapse';
		//document.getElementById('modimg'+modid).innerHTML='';
		//document.getElementById('modimg'+modid).innerHTML='<img src="../images/minus.gif" />';
		document.getElementById('modstat'+modid).value='1';
	}
	else
	{
		document.getElementById('mod'+modid).style.display='none';
		document.getElementById('my'+modid).src='public/images/plus.gif';
		document.getElementById('show'+modid).title='Click Here To Expand';
		//document.getElementById('modimg'+modid).innerHTML='';
		//document.getElementById('modimg'+modid).innerHTML='<img src="../images/plus.gif" />';
		document.getElementById('modstat'+modid).value='0';
	}
}
function close_up(modid)
{
	document.getElementById('mod'+modid).style.display='none';
	document.getElementById('modimg'+modid).innerHTML='';
	document.getElementById('modimg'+modid).innerHTML='<img src="public/images/plus.gif" onclick="open_down('+modid+');" />';
}
function check_access(mod,inc)
{
	if(document.getElementById(mod+'access'+inc).checked==true)
	{
		//alert("yes");
		document.getElementById(mod+'all'+inc).disabled=false;
		document.getElementById(mod+'ins'+inc).disabled=false;
		document.getElementById(mod+'upd'+inc).disabled=false;
		document.getElementById(mod+'del'+inc).disabled=false;
		document.getElementById(mod+'view'+inc).disabled=false;
	}
	else
	{
		//alert("no");
		document.getElementById(mod+'all'+inc).disabled=true;
		document.getElementById(mod+'ins'+inc).disabled=true;
		document.getElementById(mod+'upd'+inc).disabled=true;
		document.getElementById(mod+'del'+inc).disabled=true;
		document.getElementById(mod+'view'+inc).disabled=true;
	}
}

function check_all(mod,inc)
{
	if(document.getElementById(mod+'all'+inc).checked==false)
	{
		//alert("yes");
		
		document.getElementById(mod+'ins'+inc).checked=false;
		document.getElementById(mod+'upd'+inc).checked=false;
		document.getElementById(mod+'del'+inc).checked=false;
		document.getElementById(mod+'view'+inc).checked=false;
	}
	else
	{
		//alert("no");
		
		document.getElementById(mod+'ins'+inc).checked=true;
		document.getElementById(mod+'upd'+inc).checked=true;
		document.getElementById(mod+'del'+inc).checked=true;
		document.getElementById(mod+'view'+inc).checked=true;
	}
}

function open_window()
	{
		//alert("hi in pop");
		FileName = window.open('../main/search_all_user.php', 'sdfsdf', 'toolbar=0,scrollbars=yes,location=0,statusbar=1,menubar=0,resizable=no,width=600,height=300,left = 1050,top = 254');
	}
	
function dept_change(uid)
{
	//alert(uid);
	//getdetails();
}