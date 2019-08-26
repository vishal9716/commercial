function getmachineinfo()
{
	var totalplants='';
	var i=0;
	$('input:checkbox[name=plants]').each(function() 
	{    
		if($(this).is(':checked'))
		{
			if(i!=0)
			{
				totalplants+=',';	
			}
			i++;
			totalplants+=$(this).val();
		}
	});
	document.getElementById('planthidden').value=totalplants;
	
	remoteCall("index.php?c=schedulereport&m=getplantnames&plants="+totalplants,"","loadmachineinfo");
}

function loadmachineinfo()
{
	document.getElementById('macinfo').innerHTML=sResponse;
	
	$('.checkbox-custom > input[type=checkbox]').each(function () {
		var $this = $(this);
		if ($this.data('checkbox')) return;
		$this.checkbox($this.data());
	});
}

function getTheresult()
{
	var totalplants='';
	var i=0;
	$('input:checkbox[name=plants]').each(function() 
	{    
		if($(this).is(':checked'))
		{
			if(i!=0)
			{
				totalplants+=',';	
			}
			i++;
			totalplants+=$(this).val();
		}
	});
	
	var totalmacines='';
	var i=0;
	$('input:checkbox[name=machines]').each(function() 
	{    
		if($(this).is(':checked'))
		{
			if(i!=0)
			{
				totalmacines+=',';	
			}
			i++;
			totalmacines+=$(this).val();
		}
	});

	var from = document.getElementById('from').value
	var to = document.getElementById('to').value
	
	remoteCall("index.php?c=schedulereport&m=gettotalresult&plants="+totalplants+"&machines="+totalmacines+"&from="+from+"&to="+to,"","loadtotalResult");

}

function loadtotalResult()
{
	document.getElementById('maindisplaydiv').innerHTML=sResponse;
	getThedetailedinfo();
}



function getThedetailedinfo()
{
	var totalplants='';
	var i=0;
	$('input:checkbox[name=plants]').each(function() 
	{    
		if($(this).is(':checked'))
		{
			if(i!=0)
			{
				totalplants+=',';	
			}
			i++;
			totalplants+=$(this).val();
		}
	});
	
	var totalmacines='';
	var i=0;
	$('input:checkbox[name=machines]').each(function() 
	{    
		if($(this).is(':checked'))
		{
			if(i!=0)
			{
				totalmacines+=',';	
			}
			i++;
			totalmacines+=$(this).val();
		}
	});

	var from = document.getElementById('from').value
	var to = document.getElementById('to').value
	
	remoteCall("index.php?c=schedulereport&m=gettotalresultindetail&plants="+totalplants+"&machines="+totalmacines+"&from="+from+"&to="+to,"","loadjsoneResult");
}


function loadjsoneResult()
{
	var response = sResponse;
	var jsonData = JSON.parse(response);
	for(var i in jsonData.datamain) {
   		var data = jsonData.datamain[i];
    	//alert(data.ProductDesc);
		alert(data.idappend);
		
		var infoshow="";
		
		document.getElementById(data.idappend).innerHTML="<div class='progress-bar progress-bar-success "+data.class+"' data-toggle='tooltip' data-original-title='40%' style='width: "+data.width+"px;'> "+data.ProductDesc+" </div></div>";
	}
	
	 $("[data-toggle=tooltip]").tooltip();
}


function dump(arr,level) {
	var dumped_text = "";
	if(!level) level = 0;
	
	//The padding given at the beginning of the line.
	var level_padding = "";
	for(var j=0;j<level+1;j++) level_padding += "    ";
	
	if(typeof(arr) == 'object') { //Array/Hashes/Objects 
		for(var item in arr) {
			var value = arr[item];
			
			if(typeof(value) == 'object') { //If it is an array,
				dumped_text += level_padding + "'" + item + "' ...\n";
				dumped_text += dump(value,level+1);
			} else {
				dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
			}
		}
	} else { //Stings/Chars/Numbers etc.
		dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
	}
	return dumped_text;
}
