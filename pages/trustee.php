<?php include('../logic/class.php');?>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="../css/semantic.css" type="text/css" rel="stylesheet">
    <link href="../css/sweetalert.css" type="text/css" rel="stylesheet">

    <link href="../semantic/dist/components/dropdown.css" type="text/css" rel="stylesheet">
    <link href="../css/style.css" type="text/css" rel="stylesheet">

    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/sweetalert.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/semantic.js" type="text/javascript"></script>
    <script src="../semantic/dist/components/dropdown.js" type="text/javascript"></script>
    <title>Add New Members</title>

    <style>
        .star{
            color:red;
        }
    </style>

</head>
<body class="mine">
<div class="container">
    <div class="overlay"></div>
    <header>

        <div class="navBtn">+</div>

        <nav>
            <a href="../pages/addcon.php">Add</a>
            <a href="../pages/monthly.php">Tithe Payment</a>
            <a href="../pages/reports.php">Reports</a>
            <a href="../pages/admin.php">Administration</a>
            <a href="../pages/menu.php"><i class="fa fa-chevron-left" aria-hidden="true"></i>&emsp;Back to Menu</a>
        </nav>

    </header>
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
                            <strong>UserName</strong>
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
                                            <p class="text-left"><strong>UserName</strong></p>
                                            <p class="text-left small">examplesomeone@email.com</p>
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
    <div class="row">
        <div class="col col=lg-12 col-md-12 col-sm-12">

        </div>
    </div>
    <div class="row main">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card panel panel-default">
                <div class="panel-heading">Add new Trustee to the system</div>
                <?php
                if(strtolower($_SERVER['REQUEST_METHOD']) === 'post')
                {
                    $TrusteeDetails = $_POST;
                    if(
                        isset($TrusteeDetails['txtFirstName']) && $TrusteeDetails['txtFirstName']!==''
                        && isset($TrusteeDetails['txtSurname'])&& $TrusteeDetails['txtSurname']!==''
                        && isset($TrusteeDetails['email'])&& $TrusteeDetails['email']!==''
                        && isset($TrusteeDetails['password']) && $TrusteeDetails['password'] !==''
                        && isset($TrusteeDetails['ddAssembly'])&& $TrusteeDetails['ddAssembly']!==''

                    )
                    {
                        $response = $class->RegisterTrustee($TrusteeDetails['txtFirstName'], $TrusteeDetails['txtSurname'], $TrusteeDetails['email'],$TrusteeDetails['password'],$TrusteeDetails['ddAssembly']);
                        if($response['status'] == 'true')
                        {
                            echo "<div class='alert alert-success'>Welcome to the system, you are now in our database.</div>";
                        }
                        else
                        {
                            echo "<div class='alert alert-danger'>".$response['content']."</div>";
                        }
                    }




                }
                ?>
                <br/>
                <div class="row">
                    <form method="post" action="trustee.php" name="RegTrustee">
                        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="hidden" name="action" value="registerCommuter">
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="zip">First Name<span class="star">*</span></label>
                                <input type="text" class="form-control" placeholder="Name" name ="txtFirstName" id="txtFirstName" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="zip">Surname<span class="star">*</span></label>
                                <input type="text" class="form-control" placeholder="Surname" name="txtSurname" id="txtSurname" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="zip">Email<span class="star">*</span></label>
                                <input type="text" class="form-control" placeholder="email" name="email" id="email" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="zip">Assembly<span class="star"></span></label>
                                <select name="ddAssembly" id="ddAssembly" class="form-control ui dropdown" required>
                                    <option value="">Select a Assembly</option>
                                    <option value="Johannesburg">Johannesburg</option>
                                    <option value="Pretoria">Pretoria</option>
                                    <option value="Hebron">Hebron</option>
                                    <option value="Porch">Porch</option>
                                </select>
                            </div>
                            <br/>
                        </div>

                        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class='alert alert-danger' id="DivError"style="display:none">Your passwords do not match</div>
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="zip">Password<span class="star">*</span></label>
                                <input type="password" class="form-control" placeholder="password" name ="password" id="password" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="zip">Confirm Password<span class="star">*</span></label>
                                <input type="password" class="form-control" placeholder="confirm password" name="cpassword" id="cpassword" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <br/><br/><br/>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-sm-6">
                                <!--<a id="btnSaveRule" class="btn btn-success pull-right btn-block" type="button">Save</a>-->
                                <input id="btnSaveRule" type="submit" name="submit" value="Save" class="btn btn-success pull-right btn-block"/>
                            </div>
                            <div class="form-group col-sm-6">
                                <a id="btnCancelRule" class="btn btn-danger pull-right btn-block" type="button">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){
        $('#btnSaveRule').on('click', function(e)
        {
            var password = $('#password').val();
            var cpassword = $('#cpassword').val();

            if(password != cpassword)
            {
                $('#password').css('border-color', 'red');
                $('#cpassword').css('border-color', 'red');
                $('#DivError').show();
                return false;
            }
            else{return true;}
        });
        /*$('#btnSaveRule').on('click', function(){
         var Name = $('#txtFirstName').val();
         var Surname = $('#txtSurname').val();
         var Assembly = $('#ddAssembly').val();

         var res = true;

         if(Name.length <= 0 ) {
         $('#txtFirstName').css('border-color', 'red');
         res = false;
         }else {
         $('#txtFirstName').css('border-color', '#ccc');
         }
         if (Surname.length <= 0 ){
         $('#txtSurname').css('border-color', 'red');
         res = false;
         }else {
         $('#txtSurname').css('border-color', '#ccc');
         }
         if (Assembly == '') {
         $('#ddAssembly').parent().css('border-color', 'red');
         res = false;
         } else {
         $('#ddAssembly').css('border-color', '#ccc');
         }
         if(res){

         }else{

         swal(
         'Error!',
         'Please ensure all required fields are filled in!',
         'error'
         )
         return false;
         }

         })
         $('#ddAssembly').dropdown();*/
    });


</script>

<script src="../js/own.js" type="text/javascript"></script>

</body>
</html>