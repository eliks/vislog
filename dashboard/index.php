<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/custom.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="assets/custom.js" id="mine"></script>
    </head>
    
    <body onload="get_visitors();">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><div id="lg"></div> Visitors' Log</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Admin <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="login">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul id="mainMenu" class="nav">
                            <li id="mmDash" class="active" onclick="mainMenuToggle('mmDash');">
                                <a href="#Dashboard">Dashboard</a>
                            </li>
                            <li id="mmConf" class="" onclick="mainMenuToggle('mmConf');">
                                <a href="#Configuration">Configuration</a>
                            </li>
                            <li id="mmCont" class="" onclick="mainMenuToggle('mmCont');">
                                <a href="#Contacts">Contacts List</a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div id="mmDashPage" class="tabPage container-fluid">
            
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4>
                        	The operation completed successfully</div>
                    	</div>
                    <div class="row-fluid">
                        <!-- block -->
                        <div id="dynamic" class="container block">
                            
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <div id="mmConfPage" class="tabPage container-fluid">
            	conf page
            	hosts crud 
            	form setup
            </div>
            <div id="mmContPage" class="tabPage container-fluid">
            	cont page
            </div>
            <hr />
            <footer>
                <p>&copy; Elisha Senoo 2013</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>
        <script>
        //required for proper functioning of menu tabs
        //hide all pages
		$('.tabPage').hide();
		//show dashboard page
		$('#mmDashPage').show();
		
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>