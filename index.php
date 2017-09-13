<?php
if(strtolower($_SERVER['REQUEST_METHOD'])==='post')
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    include('logic/class.php');
    $response = $class->LoginUsers($email, $password);
    if($response==='true')
    {
        header('Location: pages/menu.php');
    }
    else
    {
        echo "Wrong user name and password.";
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/semantic.css" type="text/css" rel="stylesheet">
	<link href="semantic/dist/components/icon.css" type="text/css" rel="stylesheet">
    <link href="css/sweetalert.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css"/>
    <link href="css/custom.css" type="text/css" rel="stylesheet">

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/semantic.js" type="text/javascript"></script>
    <script src="js/sweetalert.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <title>Tithing System</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui middle aligned center aligned grid">
                    <div class="column">
                        <h2 class="ui teal image header">
                            <div class="content">
                                Log-in to your account
                            </div>
                        </h2>
                        <form method="post" action="index.php" name="LoginForm" class="ui large form">
                            <div class="ui stacked segment">
                                <div class="field">
                                    <div class="ui left icon input">
                                        <i class="user icon"></i>
                                        <input type="text" name="email" placeholder="example@email.com" id="txtEmailAddress">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui left icon input">
                                        <i class="lock icon"></i>
                                        <input type="password" name="password" placeholder="Password" id="txtPassword">
                                    </div>
                                </div>
                                <!--<div class="ui fluid large teal submit button" id="btnLogin">Login</div>-->
                                <input type="submit" name="login" value="Login" id="login" class="ui fluid large teal submit button" />
                            </div>

                            <div class="ui error message"></div>
                            <div class="ui error message" id="divErrorMessage" style="display:none">
								<i class="close icon"></i>
								<div class="header">
									Invalid e-mail address
								</div>
								<p>Please input a correct e-mail address</p>
							</div>
                        </form>

                        
                    </div>
                </div>
				
            </div>
        </div>
    </div>
	<script>
	$(document).ready(function(){
		
		/*$('#btnLogin').on('click', function(e){
				e.preventDefault();
					<!-- var EmailAddress = $('').val(); -->
					$('#txtEmailAddress').filter(function(){
						var emil=$('#txtEmailAddress').val();
						var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
						if( !emailReg.test( emil ) ) {
							
							$('#txtEmailAddress').clear();
							$('#divErrorMessage').show();
							<!-- $('#divForgotPassword').show(); -->
							return false;
							} else if(emil == ""){
							$('#divErrorMessage').show();
							}else {
							window.location = '/tithes/pages/menu.php'

						}
					})
					
				})*/
		
		
		});
	</script>
</body>
</html>