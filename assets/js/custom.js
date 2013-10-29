var full_name = $('#fname').val();
var email = $('#email').val();
var phone = $('#phone').val();
var host = $('#host').val();
var purpose = $('#purp').val();

var err = '';

function validate_full_name(){
	full_name = $('#fname').val();
	
	var userRegex = /^[\w\.\-\']{3,20} [\w \.@]{3,20}$/;
	
	if(full_name.length < 1) {
		err += 'Full name is required. ';
		$("#fname").focus();
		return false;
		}
	
	if(!full_name.match(userRegex)) {
		err += 'This full name is inappropriate. ';
		$("#fname").focus();
		return false;
		}
	
	return true;
}

function validate_host(){
	host = $('#host').val();
	
	var userRegex = /^[\w\.\-\']{3,20}[\w \.@]{3,20}$/;
	
	if(host.length < 1) {
		err += 'Host name is required. ';
		$("#host").focus();
		return false;
		}
	
	if(!host.match(userRegex)) {
		err += 'This host name is inappropriate. ';
		$("#host").focus();
		return false;
		}
	
	return true;
}

function validate_email(){
	var userRegex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	
	email = $('#email').val();
	
	if(email.length < 1) {
		err += 'Email address is required. ';
		$("#email").focus();
		return false;
		}
		
	if(!email.match(userRegex)) {
		err += 'This email address is incorrect. ';
		$("#email").focus();
		return false;
		}
		
	return true;
}

function validate_phone(){
	var userRegex = /^[+0 ][0-9 ]{9,25}$/;
	
	phone = $('#phone').val();
	
	if(phone.length < 1) {
		err += 'Phone number is required. ';
		$("#phone").focus();
		return false;
		}
		
	if(!phone.match(userRegex)) {
		err += 'This phone number is incorrect. ';
		$("#phone").focus();
		return false;
		}
		
	return true;
}

function validate_purpose(){
	purpose = $('#purp').val();
	
	var userRegex = /^[\w\.\-\']{1,20}[\w \.@]{3,150}$/;
	
	if(purpose.length < 1) {
		err += 'Purpose is required. ';
		$("#purp").focus();
		return false;
		}
	
	if(!purpose.match(userRegex)) {
		err += 'This purpose is inappropriate. ';
		$("#purp").focus();
		return false;
		}
	
	return true;
}

function validate_inputs(){
	if(validate_full_name() && validate_email() && validate_phone() && validate_purpose() && validate_host()) return true;
}

function clr_inputs(){
	$('.myinputs').val('');
}


function sub_inputs(){
	err = '';
	if(validate_inputs()){
		
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
		    document.getElementById('visitors_data').innerHTML=xmlhttp.responseText;
		    // response = xmlhttp.responseText;
		    }
		  }
		  
		  xmlhttp.open("GET","assets/php/submit_data.php?full_name="+full_name+"&email="+email+"&phone="+phone+"&host="+host+"&purpose="+purpose,true);
		  xmlhttp.send();
		  
		  $('#mainwrapper').html('<div id="brandname">'+
							    		'<div id="lg"></div>'+
							    		'<span>Meltwater Entrepreneurial School of Technology (MEST)</span>'+
							    	'</div>'+
							    	'<div id="thanks">'+
							    		'<span>Thanks for visiting us, <br />hosting you is our pleasure...</span>'+
							    	'</div>'+
							    	'<div id="links">'+
							    		'<a href="http://www.meltwater.org/"><span>You can visit our Web Site<br />http://www.meltwater.org/</span></a>'+
							    		'<a href="http://www.vislog.gopagoda.com/"><span>Back to Visitors Log</span></a>'+
							    	'</div>'+
							    	'<div id="ft1">'+
							    		'<span>Visitor\'s Log for MEST - East Legon Campus</span>'+
							    	'</div>');
	}
	
	else {
		$('#welcome span').html(err);
		$('#welcome span').css( "color", "red" );
	}
}