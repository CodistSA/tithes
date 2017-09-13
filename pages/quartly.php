<html>
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="../css/semantic.css" type="text/css" rel="stylesheet">
    <link href="../css/sweetalert.css" type="text/css" rel="stylesheet">
    <link href="../css/responsive.jqueryui.css" type="text/css" rel="stylesheet">
    
    <link href="../semantic/dist/components/dropdown.css" type="text/css" rel="stylesheet">
	<link href="../semantic/dist/components/checkbox.css" type="text/css" rel="stylesheet">
	<link href="../css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
	
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css"/>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"/>

    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/sweetalert.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/semantic.js" type="text/javascript"></script>
    <script src="../semantic/dist/components/dropdown.js" type="text/javascript"></script>
	<script src="../semantic/dist/components/checkbox.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
	
    <title>Quartly Checks</title>
	
	<style>
	a.dt-button.green {
        color: green;
		background-color: #47a447 !important;
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
      <a href="../pages/monthly.php">Monthly</a>
      <a href="../pages/quartly.php">Quarterly</a>
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
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
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
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="#" class="btn btn-danger btn-block">Logout</a>
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
    <div class="row main">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card panel panel-default">
                <div class="panel-heading">Quartly Congregants Check</div><br/>
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                        <table id="monthly" class="table table-striped  dt-responsive display nowrap" cellspacing="0">
                            <thead>
                            <tr class="panel_shade">
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Paid</th>
                                <th>Not Paid</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Gavin Cortez</td>
                                <td>Team Leader</td>
                                <td><input type="checkbox" name="example" class="paid"></td>
                                <td><input type="checkbox" name="example"  class="notPaid"></td>
                            </tr>
                            <tr>
                                <td>Martena Mccray</td>
                                <td>Post-Sales support</td>
                                <td><input type="checkbox" name="example" class="paid"></td>
                                <td><input type="checkbox" name="example"  class="notPaid"></td>
                            </tr>
                            <tr>
                                <td>Unity Butler</td>
                                <td>Marketing Designer</td>
                                <td><input type="checkbox" name="example" class="paid"></td>
                                <td><input type="checkbox" name="example"  class="notPaid"></td>
                            </tr>
                            <tr>
                                <td>Howard Hatfield</td>
                                <td>Office Manager</td>
                                <td><input type="checkbox" name="example" class="paid"></td>
                                <td><input type="checkbox" name="example"  class="notPaid"></td>>
                            </tr>
                            <tr>
                                <td>Hope Fuentes</td>
                                <td>Secretary</td>
                                <td><input type="checkbox" name="example" class="paid"></td>
                                <td><input type="checkbox" name="example"  class="notPaid"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
	$(document).ready(function(){
		$('#monthly').DataTable({
				dom: 'Bfrtip',
        buttons: [
            {
                text: 'Save',
				className: 'green',
                action: function ( e, dt, node, config ) {
                    alert( 'Button activated' );
                }
            }
        ]
			
			})
		$('input.paid').on('change', function() {
    $('input.notPaid').not(this).prop('checked', false);  
});
		
		
		});
	  
	</script>
<script src="../js/own.js" type="text/javascript"></script>
</body>
</html>