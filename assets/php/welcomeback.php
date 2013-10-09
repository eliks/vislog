<?php
mysql_connect('localhost', 'elikem', 'james417');  
mysql_select_db('visitorslog');

require("oauth/twitteroauthmaster/twitteroauth/twitteroauth.php"); 
 
session_start();

//check for these three values
if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){  
    // We've got everything we need  
} else {  
    // Something's missing, go back to square 1  
    header('Location: welcome.php');  
}  

// TwitterOAuth instance, with two new parameters we got in twitter_login.php  
$twitteroauth = new TwitterOAuth('l1AVnX1DzlMFIYRABzQgQ', 'byBQeiOsFzSwReOofUqPjBNn50nNe7zhanu1qqhyzs', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);  
// Let's request the access token  
$access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']); 
// Save it in a session var 
$_SESSION['access_token'] = $access_token; 
// Let's get the user's info 
$user_info = $twitteroauth->get('account/verify_credentials'); 

if(isset($user_info->error)){  
    // Something's wrong, go back to square 1  
    header('Location: welcome.php'); 
} else { 
    // Let's find the user by its ID  
    $query = mysql_query("SELECT * FROM users WHERE oauth_provider = 'twitter' AND oauth_uid = '". $user_info->id."'");  
    $result = mysql_fetch_array($query);  
  
  	$userid = $user_info->id;
	$username = $user_info->screen_name;
	$user_oauth_token = $access_token['oauth_token'];
	$user_oauth_token_secret = $access_token['oauth_token_secret']; 
  
    // If not, let's add it to the database  
    if(empty($result)){
        $query = mysql_query("INSERT INTO users (oauth_provider, oauth_uid, username, oauth_token, oauth_secret) VALUES ('twitter', '".$user_info->id."', '".$user_info->screen_name."', '".$access_token['oauth_token']."', '".$access_token['oauth_token_secret']."')") 
        or die('Could not run query: ' . mysql_error());; 
        $query1 = mysql_query("SELECT * FROM users WHERE id = " . mysql_insert_id());  
        $result = mysql_fetch_array($query1);  
    } else {  
        // Update the tokens  
        $query = mysql_query("UPDATE users SET oauth_token = '{$access_token['oauth_token']}', oauth_secret = '{$access_token['oauth_token_secret']}' WHERE oauth_provider = 'twitter' AND oauth_uid = {$user_info->id}");  
    }  
   
    echo "<br /><br />".$result['username'];
  
    $_SESSION['id'] = $result['id']; 
    $_SESSION['username'] = $result['username']; 
    $_SESSION['oauth_uid'] = $result['oauth_uid']; 
    $_SESSION['oauth_provider'] = $result['oauth_provider']; 
    $_SESSION['oauth_token'] = $result['oauth_token']; 
    $_SESSION['oauth_secret'] = $result['oauth_secret']; 
    
    echo "<br /><br />".$user_info->id;
    echo "<br />".$user_info->name;
    echo "<br />".$user_info->profile_image_url_https;
	echo "<br />".$user_info->url; 
	echo "<br />".$user_info->location; 
    echo "<br />".$user_oauth_token; 
    echo "<br />".$_SESSION['oauth_uid']; 
    echo "<br />".$_SESSION['oauth_provider']; 
    echo "<br />".$_SESSION['oauth_token']; 
    echo "<br />".$_SESSION['oauth_secret']; 
 
    //header('Location: ../../myapp.php');  
}  

// Print user's info  
print_r($user_info);  

?>