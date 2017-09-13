<?php
//require_once('../logic/includes.php');
include('../logic/class.php');
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
    <link href="../css/responsive.jqueryui.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../css/BootSideMenu.css">

    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>
	<link href="../semantic/dist/components/dropdown.css" type="text/css" rel="stylesheet">
    <link href="../css/style.css" type="text/css" rel="stylesheet">



    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/sweetalert.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/semantic.js" type="text/javascript"></script>
    <script src="../semantic/dist/components/dropdown.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
    
	<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
	
    <title>Reporting</title>


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
<!--THIS IS THE CODE FOR THE LEFT MENU-->

<!--THIS IS WHERE THE CODE FOR THE LEFT MENU ENDS-->

    <div class="row main">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card panel panel-default">
                <div class="panel-heading">Reports</div><br/>
                <div class="row">
				<div class="test">
				<div>
				<div class="form-group col-md-12">
				<div class="form-group col-md-6">
					<select id="ddChurchMember" class="form-control ui dropdown">
					<option value="">Please Select</option>
					</select>
					
				</div>
				<div class="form-group col-md-6">
					<button id="btnGo" class="form-control ui dropdown btn btn-success" style="text-align:center">Go</button>
				</div>
				</div>
                    <div id="container" style="width:100%; height:400px;">

                    </div>
                    <?php
                    $response = $class->CongregantReports();
						//while ($row = ($response)) {
							$data = $response;
//}
                    //echo json_encode($response);
					echo("<script>console.log('PHP: ".json_encode($response)."');</script>");
					//echo("<script>console.log('PHP: ".$response."');</script>");
                    ?>
                    </div>

            </div>
        </div>
    </div>

</div>
        </div>
        </div>
    <script >
        $(document).ready(function(){
		
            var data = [] 
            data = <?=($data);?>
			
			var Dropdown = []
			Dropdown = <?=($data);?>,
			console.log(Dropdown);
	
			$(Dropdown).each(function(){
				$('#ddChurchMember').append($("<option>").attr('value', $(this)[0].id).text($(this)[0].Fullname));
				});

					
					
				$('#btnGo').on('click',function(){
					var selectedID = $('#ddChurchMember').val()
					console.log(selectedID)
					
					 var test = _.filter(data,{'id': selectedID });
            console.log(test);
			
			var Name = test[0].Fullname;
			var dates = []
			var churchMember = []
			$(test).each(function(){
				var current = $(this)[0]
				var datePaid = current.dtpaid;
                
				
					 dates.push({'x' : datePaid, 'y' : 10 });
					churchMember.push({Name});
				})
				
				//console.log(churchMember)

len = dates.length,
i = 0,
outData = [];

for (i = 0; i < len; i++) {
    outData[i] = {
        x: Date.parse(dates[i].x),
        y: dates[i].y
    }
}

//$(function () {
    Highcharts.chart('container', {
	chart: {
            type: "bar",
            zoomType: "x"
        },
		title: {
        text: 'Church Member Tithe Payments'
    },
        xAxis: {
             startOnTick: true,
			 type: 'datetime',
			 dateTimeLabelFormats: {
			    month: '%b %e, %Y'
            }
        },
        series: [{
            data: outData,
			name: Name
        }]

    });
					
					
					});	
			
		
		
		
           

        });
//$('#ddChurchMember').dropdown();

    </script>
    <script src="../js/own.js" type="text/javascript"></script>
</body>
</html>