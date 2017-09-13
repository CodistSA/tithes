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
	  <a href="..pages/menu.php"><i class="fa fa-chevron-left" aria-hidden="true"></i>&emsp;Back to Menu</a>
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
                <div class="panel-heading">Add new congregant</div>
                <?php
                if(strtolower($_SERVER['REQUEST_METHOD']) === 'post')
                {
                    $CongregantDetails = $_POST;
                    if(isset($CongregantDetails['txtFirstName']) && $CongregantDetails['txtFirstName']!=='' && isset($CongregantDetails['txtSurname'])&& $CongregantDetails['txtSurname']!=='' && isset($CongregantDetails['ddAssembly'])&& $CongregantDetails['ddAssembly']!=='')
                    {
                        $response = $class->RegisterCongregant($CongregantDetails['txtFirstName'], $CongregantDetails['txtSurname'], $CongregantDetails['ddAssembly']);
                        if($response['status'] == 'true')
                        {
                            echo "<div class='alert alert-success'>Thanks for adding a new congregant, they are now in our database.</div>";
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
                    <form method="post" action="addcon.php" name="RegCongregant">
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
                                <label class="col-md-4 control-label" for="zip">Assembly<span class="star">*</span></label>
                                <select name="ddAssembly" id="ddAssembly" class="form-control ui dropdown" required>
                                    <option value="">Select a Assembly</option>
                                    <option value="Johannesburg">Johannesburg</option>
                                    <option value="Pretoria">Pretoria</option>
                                    <option value="Hebron">Hebron</option>
                                    <option value="Porch">Porch</option>
                                </select>
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


                    <!--<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group col col-lg-6 col-md-6 ">
                                <label class="col-md-4 control-label" for="email">Email Address</label>
                                <input type="text" class="form-control" placeholder="Email Address" aria-describedby="basic-addon1">
                        </div>
                        <div class="col col-lg-6 col-md-6">
                            <label class="col-md-4 control-label" for="zip">Cellphone Number</label>
                            <input type="text" name="phone[1][number]" class="form-control" placeholder=" (078) 999 9999" />
                        </div>
                    </div>
                        <br/><br/>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="province">Province</label>
                                    <select id="province" name="province" class="form-control">
                                        <option value="">Province</option>
                                        <option value="gauteng">Gauteng</option>
                                        <option value="cpt">Cape Town</option>
                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="city">City/Town</label>
                                <div class="">
                                    <input id="city" name="city" type="text" placeholder="city or town" class="form-control input-md" required="">
                                </div>
                            </div>
                            </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="address1">Address Line1</label>
                                <div class="">
                                    <input id="address1" name="address1" type="text" placeholder="Street address, P.O. box, company name, c/o" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="Address2">Address Line2</label>
                                    <input id="Address2" name="Address2" type="text" placeholder="Apartment, suite , unit, building, floor, etc." class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="zip">Zip/Postal code</label>
                                    <input id="zip" name="zip" type="text" placeholder="zip or postal code" class="form-control input-md" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-4 control-label" for="zip">Employment Status</label>
                                    <select name="" id="ddEmploymentStatus" class="form-control">
                                        <option value="">Employment Status</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                            </div>
                        </div> -->


                    </div>
                </div>
            </div>
        </div>
    </div>

	<script>
	
	$(document).ready(function(){
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