<?php 

session_start();
	
	require_once('../DBConnection.php');

	//checking if a user is logged in
	$user_id	= $_SESSION['user_id'];
	
	
	if (!isset($user_id)) {
	header('location: Paction_login.php?patient=not_login');
	}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    
    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    
    <style>
    	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(../images/loading.gif) center no-repeat #fff;
	}
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Welcome</h4>
                <h5><?php echo $_SESSION['first_name']; ?></h5>

                <strong>We..</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="my_appointment.php">
                        <i class="fa fa-home"></i>
                        Home
                    </a>
                    
                <li>
                    <a href="make_appointment.php">
                        <i class="fa fa-hand-pointer-o"></i>
                        E-Channeling
                    </a>
                </li>
                <li>
                    <a href="my_appointment.php">
                        <i class="fa fa-list"></i>
                        My Appointment
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" style="overflow:scroll;">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="patient_update.php?user_find=<?=$user_id?>" >Edit My Personal Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
<div style="margin:10px;" id="maincontent">
