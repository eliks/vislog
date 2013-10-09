<?PHP 

	$con = mysql_connect('www.glovefoundation.com', 'elikem', 'james417');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  
	$full_name = mysql_real_escape_string($_GET['full_name']);
	$email = mysql_real_escape_string($_GET['email']);
	$phone = mysql_real_escape_string($_GET['phone']);
	$host = mysql_real_escape_string($_GET['host']);
	$purpose = mysql_real_escape_string($_GET['purpose']);
	

	mysql_select_db("guest", $con);
	$sql_visitor="INSERT INTO guest.visitor (ID, full_name, email, phone, host, purpose, created) VALUES (NULL, '$full_name', '$email', '$phone', '$host', '$purpose', CURRENT_TIMESTAMP);";
	mysql_query($sql_visitor) or die(mysql_error());
	
?>
