<?PHP 

	$con = mysql_connect('tunnel.pagodabox.com', 'michelina', 'YOtMFQ0p');
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
	
	
	$to = "elisha.senoo@meltwater.org";
	$subject = "A user on VisLog";
	$message = "A user just logged in on Vislog with the following details:\n
				Full Name: ".$full_name.
				"\nEmail: ".$email.
				"\nPhone: ".$phone.
				"\nHost's Name: ".$host.
				"\nPurpose: ".$purpose.
				"\n\nTime: ".date("l jS \of F Y h:i:s A");
	$from = "client@vislog.com";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	
?>
