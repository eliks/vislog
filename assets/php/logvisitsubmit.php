<?php
  $fullname = $_GET["fullname"];
  $cfrom = $_GET["cfrom"];
  $email = $_GET["email"];
  $pnumber = $_GET["pnumber"];
  $hname = $_GET["hname"];
  $when = $_GET["when"];
  $account = $_GET["account"];
  $purpose = $_GET["purpose"];
  
$con = mysql_connect('localhost', 'elikem', 'james417');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("visitorslog", $con);

$sql = "INSERT INTO `visitorslog`.`visitlog` 
		(`visitorID`, `hostID`, `schedule`, `purpose`) VALUES ('1', '1', '".$when."', '".$purpose."');";

// $result = mysql_query($sql) or die('Query failure: ' . mysql_error());;

if(!mysql_query($sql)){
$_POST["message"];
$to1 = "elisha.senoo@meltwater.org";
$to2 = "elishasenoo@gmail.com";
$subject = "We have receive your visit schedule";
$message = "This is to prompt you of this subscriber at glovefoundation.com\nDetails are as follows:\nName:".$_POST["contact_name"]."\nEmail: ".$_POST["email"]."\nPhone Number: ".$_POST["phone_number"]."\nMessage:".$_POST["message"]."\n\n";
if($_POST["volunteer"]){$message .= "\nThis Subscriber wants to volunteer";}
if($_POST["donate"]){$message .= "\nThis Subscriber wants to donate";}
if($_POST["partner"]){$message .= "\nThis Subscriber wants to partner as a co-NGO";}
$from = "eliskobah17@yahoo.com";
$headers = "From:" . $from;
mail($to1,$subject,$message,$headers) or die('Mailer1 failure: ' . mysql_error());
mail($to2,$subject,$message,$headers) or die('Mailer2 failure: ' . mysql_error());
//header("Location: http://glovefoundation.com/thanks.php");

	echo "<div class='alert alert-success' style='margin:0 0 0 30px;'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <h4>Info.</h4>
  Not successful.
</div>";
}

else {
	echo "<div class='alert alert-success' style='margin:0 0 0 30px;'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <h4>Info.</h4>
  Success.
</div>";
}

mysql_close($con);
?> 