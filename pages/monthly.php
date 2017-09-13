<?php require_once('../logic/includes.php'); ?>
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

	<link href="../semantic/dist/components/checkbox.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
	
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css"/>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"/>
	
	<link href="../semantic/dist/components/dropdown.css" type="text/css" rel="stylesheet">
	<link href="../css/style.css" type="text/css" rel="stylesheet">
	<link href="../css/datepicker.css" type="text/css" rel="stylesheet">

  <script src="../js/jquery.js" type="text/javascript"></script>
  <script src="../js/sweetalert.min.js" type="text/javascript"></script>
  <script src="../js/bootstrap.js" type="text/javascript"></script>
  <script src="../js/semantic.js" type="text/javascript"></script>
  <script src="../semantic/dist/components/dropdown.js" type="text/javascript"></script>
  <script src="../semantic/dist/components/checkbox.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
  <title>Tithe Payment</title>
</head>
<body class="mine" >
<div class="container" style="width:95%">
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
                                            <a href="../logout.php" class="btn btn-danger btn-block">Logout</a>
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

                <div class="panel-heading text-center"><h3>Tithe Payment</h3></div>
                <br/>
                <form method="post" action="monthly.php" name="TithePaying">
                    <div class="row">
                      <div class="col col-md-12">
                        <?php
                        if(strtolower($_SERVER['REQUEST_METHOD']) === 'post')
                        {
                          $bValid=false;
                          if(isset($_POST))
                          {
                            foreach($_POST as $name =>$value)
                            {
                              $CongregantID = $name;
                              $CongregantID = substr($CongregantID,8);
                              $inputType = substr($name,0,8);

                              if(strtolower($inputType)=='checkbox' && isset($_POST['datepaid']) && $_POST['datepaid'] != '')
                              {
                                $datePaid=$_POST['datepaid'];
                                $response = $class->TithesPayment(strtolower($CongregantID),$datePaid);
                                if($response['status'] === 'true')
                                {
                                  echo "<div class='alert alert-success'>Captured!</div>";
                                }
                                else
                                {
                                  echo "<div class='alert alert-danger'>".$response['content']."</div>";
                                }
                              }
                              if(strtolower($inputType)=='checkbox')
                              {
                                $bValid=true;
                              }
                            }
                            if(!$bValid)
                            {
                              echo "<div class='alert alert-danger'>Please Select alteast one congregant before submitting form</div>";
                            }
                          }
                        }
                        ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-4">
                        <label form="datepaid">Date Paid:</label>

                        <div class="form-group">
                          <div class="date input-group" id="datepicker1">
						  <i class="input-group-addon glyphicon glyphicon-calendar">
                            </i>
                            <input type="text" id="datepicker2" name="datepaid" class="col-sm-12" placeholder="yy-mm-dd" required />
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="row">

                        <div class="col col-md-12" id="gvTithePayment">
                            <table id="monthly" class="table table-striped  dt-responsive display nowrap"  cellspacing="0">
                                <thead>
                                <tr class="panel_shade">
<!--                                    <th>Id</th>-->
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Paid</th>
                                </tr>
                                </thead>
                                <tbody >
                                <?php echo $DashBoard->ListCongregants();?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <input id="btnSave" name="submit" class="btn btn-success pull-right btn-block" value="Save" type="submit" />
                            </div>
                            <div class="form-group col-md-6">
                                <button id="btnCancel" class="btn btn-danger pull-right btn-block"  type="button">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../js/own.js" type="text/javascript"></script>
<script src="../js/Moment.js" type="text/javascript"></script>
<script src="../js/datepicker.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        
        $('#datepicker2').datetimepicker({
          format:"Y-MM-DD"
          /*defaultDate: "11/1/2013",
          disabledDates: [
            moment("12/25/2013"),
            new Date(2013, 11 - 1, 21),
            "11/22/2013 00:53"
          ]*/
        });
      $('div[id^=datepicker]').datetimepicker({
          format:"Y-MM-DD"
          /*defaultDate: "11/1/2013",
          disabledDates: [
            moment("12/25/2013"),
            new Date(2013, 11 - 1, 21),
            "11/22/2013 00:53"
          ]*/
        });
        $('#monthly').DataTable();

        $('#ddPaymentPeriod').dropdown({
            onChange: function (val) {
                var period = val;
                if (period == 'Monthly'){
                    $('.divMonth').show();
                    $('.divWeek').hide();
                    //$('#gvTithePayment').show();
                } else if (period == 'Weekly') {
                    $('.divWeek').show();
                    $('.divMonth').hide();
                    //$('#gvTithePayment').show();
                }

            }

        });
        $('#ddMonthly').dropdown({
            onChange: function(val){
                var Month = val
                if (Month.length <= 0){

                }else{

                    $('#gvTithePayment').show();
                    $('#btnSave').show();
                    $('#btnCancel').show();
                }

            }
        });
        $('#ddWeekly').dropdown({
            onChange: function(val){
                var week = val
                if(week.length <= 0){

                }else {
                    $('#gvTithePayment').show();
                    $('#btnSave').show();
                    $('#btnCancel').show();
                }
            }
        });

        $('#btnSave').on('click', function(){
            var paid = '';
            var ids=[];
            var fields = $( ":input").serializeArray();
            //$( "#monthly" ).empty();
            $(fields).each(function(event) {
                ids.push($(this))
            });
            console.log(ids);
            console.log(paid);

        });

        $('#ddPaymentPeriod').dropdown();
        $('#ddMonthly').dropdown();
        $('#ddWeekly').dropdown();



    });
	</script>

</body>
</html>