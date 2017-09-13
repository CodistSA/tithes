<?php
//load the database configuration file
include 'dbConfig.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Congregant Information has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Import CSV File Data into the church database</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="../css/semantic.css" type="text/css" rel="stylesheet">
    <link href="../css/sweetalert.css" type="text/css" rel="stylesheet">
    <link href="../semantic/dist/components/dropdown.css" type="text/css" rel="stylesheet">
    <link href="../css/style.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css"/>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"/>
	
	 <script src="../js/semantic.js" type="text/javascript"></script>
    <script src="../semantic/dist/components/dropdown.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
 
  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
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
    
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
	<div class="row main">
	<div class="col col=lg-12 col-md-12 col-sm-12">
	<h2>Import CSV File information into the church Database</h2>
	<div class="card panel panel-default">
	<div class="panel-heading">
            Members list
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Members</a>
        </div>
	<div class="row">
	    <div class="ui message">
                            New Trustee? <a href="trustee.php">Sign Up</a>
                        </div>
	<form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
        <div class="col col-md-12">
            
            <table class="table table-striped  dt-responsive display nowrap"  cellspacing="0" id="congregations">
                <thead>
                    <tr >
                      <th>Name</th>
                      <th>Surname</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //get rows query
                    $query = $db->query("SELECT * FROM congregant");
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){
                        ?>
                    <tr>
                      <td><?php echo $row['firstname']; ?></td>
                      <td><?php echo $row['lastname']; ?></td>
                      <!--<td><input type="button" id="btnUpdate"name="btnUpdate" class="btn btn-success" value="Update" /></td>-->  
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No member(s) found.....</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
	</div>
        

</div>
	</div>
		</div>
    
    <div id="openModal" class="modalDialog">
        <div>
            <a href="#close" title="Close" class="close">X</a>
            <h2>
                Modal Box</h2>
            <p>
                Hello world</p>
        </div>
    </div>
</div>
<script src="../js/own.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#congregations').DataTable();

        $('#btnUpdate').on('click', function(){
            $('#openModal').modal('show');
        });
	});
</script>
</body>
</html>