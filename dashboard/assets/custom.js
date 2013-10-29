
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function get_visitors(sort_by){
	var page_num = $('#select1').val();
	var num_of_rows = $('#rows1').val();
	if(!isNumber(page_num)){
		page_num = 1;
	}
	
	if( !isNumber(num_of_rows) || parseFloat(num_of_rows) < 0 ){
		num_of_rows = 30;
	}
	
	if(!sort_by){
		sort_by = 1;
	}
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById('dynamic').innerHTML=xmlhttp.responseText;
	    // response = xmlhttp.responseText;
	    }
	  }
	  
	  xmlhttp.open("GET","../assets/php/get_visitors.php?page_num="+page_num+"&num_of_rows="+num_of_rows+"&sort_by="+sort_by,true);
	  xmlhttp.send();
}


function mainMenuToggle(tab){

	//deactivate all tabs
	$('#mainMenu.nav li').attr('class', '');
	
	//hide all pages
	$('.tabPage').hide();
	
	//show selected page
	$('#'+tab+'Page').show();
	
	//activate clicked tab
	$('#mainMenu.nav li#'+tab).attr('class','active');
	
}
