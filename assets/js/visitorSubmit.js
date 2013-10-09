function validateinput(){
	return true;
}

function visitorsubmit()
  {
  	  var fullname = $("#fullname").val();
	  var cfrom = $("#cfrom").val();
	  var email = $("#email").val();
	  var pnumber = $("#pnumber").val();
	  var hname = $("#hname").val();
	  var when = $("#when").val();
	  var account = $("#account").val();
	  var purpose = $("#purpose").val();
	  
  	if(validateinput()){
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
	      document.getElementById("mywidget").innerHTML=xmlhttp.responseText;
	      }
	    }
	  
	  
	  xmlhttp.open("GET","assets/php/logvisitsubmit.php?fullname="+fullname+"&cfrom="+cfrom+"&email="+email+"&pnumber="+pnumber+"&hname="+hname+"&when="+when+"&account="+account+"&purpose="+purpose,true);
	  
	  xmlhttp.send();
	  }
  }
