<?php
/*
 * login_with_linkedin.php
 *
 * @(#) $Id: login_with_linkedin.php,v 1.2 2013/07/31 11:48:04 mlemos Exp $
 *
 */

	/*
	 *  Get the http.php file from http://www.phpclasses.org/httpclient
	 */
	require('http.php');
	require('oauth_client.php');

	$client = new oauth_client_class;
	$client->debug = 1;
	$client->debug_http = 1;
	$client->server = 'LinkedIn';
	$client->redirect_uri = 'http://54.201.19.221/assets/php/oauth/login_with_linkedin.php';

	$client->client_id = '77ljoiby69vmrr'; $application_line = __LINE__;
	$client->client_secret = 'rSOdB6UIgSj2wAVl';

	/*  API permission scopes
	 *  Separate scopes with a space, not with +
	 */
	$client->scope = 'r_fullprofile r_emailaddress rw_nus';
	
	echo 'yes';

	if(strlen($client->client_id) == 0
	|| strlen($client->client_secret) == 0)
		die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , '.
			'create an application, and in the line '.$application_line.
			' set the client_id to Consumer key and client_secret with Consumer secret. '.
			'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
			'necessary permissions to execute the API calls your application needs.';

	if(($success = $client->Initialize()))
	{
		if(($success = $client->Process()))
		{
			if(strlen($client->access_token))
			{
				$success = $client->CallAPI(
					'http://api.linkedin.com/v1/people/~', 
					'GET', array(
						'format'=>'json'
					), array('FailOnAccessError'=>true), $user);
			}
		}
		$success = $client->Finalize($success);
	}
	if($client->exit)
		exit;
	if(strlen($client->authorization_error))
	{
		$client->error = $client->authorization_error;
		$success = false;
	}
	if($success)
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>LinkedIn OAuth client results</title>
</head>
<body>
<?php
		echo '<h1>Wow ', HtmlSpecialChars($user->firstName), 
			' you have logged in successfully with LinkedIn!</h1>';
		echo '<ul>';
		echo '<li>'.HtmlSpecialChars($user->firstName).'</li>';
		echo '<li>'.HtmlSpecialChars($user->lastName).'</li>';
		echo '<li>'.HtmlSpecialChars($user->location->name).'</li>';
		echo '<li>'.HtmlSpecialChars($user->location->country->code).'</li>';
		echo '<li>'.HtmlSpecialChars($user->headline).'</li>';
		echo '<li>'.HtmlSpecialChars($user->summary).'</li>';
		echo '<li>'.HtmlSpecialChars($user->email).'</li>';
		echo '</ul>';
		echo '<pre>', HtmlSpecialChars(print_r($user, 1)), '</pre>';
?>
</body>
</html>
<?php
	}
	else
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>OAuth client error</title>
</head>
<body>
<h1>OAuth client error</h1>
<p>Error: <?php echo HtmlSpecialChars($client->error); ?></p>
</body>
</html>
<?php
	}

?>