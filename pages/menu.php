<?php
    //require_once('../logic/includes.php');
    //$DashBoard->checkSession();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="../css/semantic.css" type="text/css" rel="stylesheet">
    <link href="../css/sweetalert.css" type="text/css" rel="stylesheet">
    <link href="../css/style.css" type="text/css" rel="stylesheet">

    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/semantic.js" type="text/javascript"></script>
    <script src="../js/sweetalert.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <title>Menu</title>
</head>
<body class="mine">
<div class="container">
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container" style="overflow:visible"> 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a target="_blank" href="#" class="navbar-brand">Trustee Management Portal.</a>
        </div>
        <div class="collapse navbar-collapse">
            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?php //echo $_SESSION['user_session']['username'];?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="">
                                    <div class="col-md-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-left"><strong></strong></p>
                                        <!--<p class="text-left small">examplesomeone@email.com</p>-->
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
						<br/>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="">
                                    <div class="col-md-12">
                                        <p>
                                            <a href="../index.php" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<br/>
<br/>
    <div class="divMenu">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card panel panel-default">
                <div class="panel-heading">Management Section</div><br/><br/>
                  <div class="divMenu">
                      <div class="col-sm-6">
					  <a href="../pages/monthly.php">
					  <div class="tile red">
                              <i class="fa fa-align-left fa-4x"></i>
                              <h3 class="title">Tithe Payment</h3>
                              <p>Congregant monthly payment.</p>
                          </div>
						  </a>
                          
                      </div>
					  <div class="col-sm-6">
					<a href="../pages/reports.php">
					 <div class="tile blue">
                                <i class="fa fa-pie-chart fa-4x"></i>
                                <h3 class="title">Reports</h3>
                                <p>Check your monthly and quarterly reports</p>

                        </div>
					</a>
                       
                    </div>
					 
                  </div>
                <div class="row" style="margin-left: 0px !important; margin-right: 0px !important">
                     <div class="col-sm-4">
					  <a href="../pages/addcon.php"> <div class="tile purple">
                                      <i class="fa fa-plus-square-o fa-4x"></i>
                                      <h3 class="title">Add</h3>
                                        <p>Add Church Member.</p>

                          </div></a>
                         
                      </div>
					  <div class="col-sm-4">
                        <div class="tile grey">
                                <i class="fa fa-users fa-4x"></i>
                                <h3 class="title">Congregants</h3>
                                <p style="display:inline">The total Number</p>
								<h3 class="pull-right" style="margin:-2px;padding:0">1050</h3>
                        </div>
                    </div>
                    <div class="col-sm-4">
					<a href="../pages/admin.php">
						 <div class="tile orange">
                                <i class="glyphicon glyphicon-edit fa-4x"></i>
                                <h3 class="title">Administration</h3>
                                <p>System Settings</p>

                        </div>
						</a>
                       
                    </div>

                    
                </div>

            </div>
        </div>
    </div>
</div>
 <div class="footer-bottom">
     <div class="container">
         <p class="pull-left"></p>
         <div class="pull-right">
         </div>
     </div>
 </div>
</body>
</html>