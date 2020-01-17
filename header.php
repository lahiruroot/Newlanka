<?php 

session_start();
	
	require_once('../DBConnection.php');

	//checking if a user is logged in
	$user_id	= $_SESSION['user_id'];
	
	if (!isset($user_id)) {
	header('location: Doctor_login.php?admin=not_login');
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
    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Welcome</h4>
                <h3><?php echo $_SESSION['first_name'] ?></h3>
                <strong>We..</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="doctor_home.php">
                        <i class="fa fa-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="add_schedule.php">
                        <i class="fa fa-plus"></i>
                        Add Schedule
                    </a>
                </li>
                <li>
                </li>
                <li>
                    <a href="my_appointment.php">
                        <i class="fa fa-list"></i>
                        Appointment List
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">



                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="doctor_update.php?user_find=<?=$user_id?>">Edit My Personal Data</a>
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

            <div style="margin:10px;">