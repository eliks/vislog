<!DOCTYPE html>
<!-- saved from url=(0045)http://cleancanvas.herokuapp.com/sign-in.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Vistors' Log for MEST</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="http://cleancanvas.herokuapp.com/css/bootstrap-overrides.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link href="assets/css/css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/animate.css" media="screen, projection">
    <link rel="stylesheet" href="assets/css/index.css" type="text/css" media="screen">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div id="mainwrapper">
    	<div id="brandname">
    		<div id="lg"></div>
    		<span>Meltwater Entrepreneurial School of Technology (MEST)</span>
    	</div>
    	<div id="welcome">
    		<span>You are welcome</span>
    	</div>
    	<div id="about_you">
    		<span>Tell us about yourself...</span>
    		<div class="field_short">
    			<input type="text" id="fname" class="myinputs_short" placeholder="Your full name" />
    			<input type="text" id="email" class="myinputs_short" placeholder="Your email address" />
    			<input type="text" id="phone" class="myinputs_short" placeholder="Your phone number" />
    		</div>
    		<div id="or">
    			<div id="mybar"></div>
    			<div id="or_text">OR</div>
    			<div id="mybar"></div>
    		</div>
    		<div id="social">
    			<a href="assets/php/oauth/login_with_linkedin.php">
	    			<div id="soc_icon_linkedin" class="soc_icon" onclick="">
	    				<i class="fa fa-linkedin-square"></i>
	    			</div>
    			</a>
    			<div id="soc_icon_twitter" class="soc_icon" onclick="">
    				<i class="fa fa-twitter-square"></i>
    			</div>
    			<div id="soc_icon_google" class="soc_icon" onclick="">
    				<i class="fa fa-google-plus-square"></i>
    			</div>
    			<div id="soc_icon_facebook" class="soc_icon" onclick="">
    				<i class="fa fa-facebook-square"></i>
    			</div>
    		</div>
    	</div>
    	<div id="about_visit">
    		<span>Tell us about your visit...</span>
    		<div class="field">
    			<input type="text" id="host" class="myinputs" placeholder="Name of the person you are visiting" />
    			<input type="text" id="purp" class="myinputs" placeholder="Purpose of visit" />
    		</div>
    	</div>
    	<div id="submitter">
    		<input type="submit" id="sub" value="Submit" onclick="sub_inputs()" />
    		<input type="reset" id="clr" value="Clear"  onclick="clr_inputs()" />
    	</div>
    	<div id="ft">
    		<span>Visitor's Log for MEST - East Legon Campus</span>
    	</div>
    </div>

    <script src="assets/js/jquery-latest.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/custom.js"></script>

</body></html>