<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"content="width=device-width, initial-scale=1.0">
	<title>Lecturer Dashboard</title>
	<link rel="stylesheet"href="<?php echo URLROOT;?>/css/LecturerHeaderStyles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/css/<?php echo $style ;?>.css">
</head>

<body>

	<!-- for header part -->
	<header>

		<div class="logosec">
			<div class="logo">
                <img width="110px" src="<?php echo URLROOT;?>/images/UniOps_logo.png" alt="logo">
            </div>
			<img src= "<?php echo URLROOT;?>/images/menu.png" class="icn menuicn" id="menuicn" alt="menu-icon">
		</div>

		<div class="message">
			<h5><?php echo $_SESSION['user_id'] . " - " .  $_SESSION['username']; ?></h5>
			<div class="circle"></div>
			<img src="<?php echo URLROOT;?>/images/bell.svg" class="icn" alt="bell">
			<div class="dp"><img src="<?php echo URLROOT;?>/images/profile_picture.svg" class="dpicn" alt="dp"></div>
		</div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">

					<div class="nav-option option1">
						<a href="<?php echo URLROOT;?>/Pages/Lecturer_dashboard/">
							<img src= "<?php echo URLROOT;?>/images/dashboard_icon.svg" class="nav-img" alt="dashboard">
							<h3> Dashboard</h3>
						</a>
					</div>

					<div class="option2 nav-option">
						<a href="<?php echo URLROOT;?>/Lecturer/viewRooms/">
							<img src="<?php echo URLROOT;?>/images/room.svg" class="nav-img" alt="Rooms">
							<h3> Rooms</h3>
						</a>
					</div>

					<div class="nav-option option3">
						<a href="<?php echo URLROOT;?>/Lecturer/reports/">
							<img src="<?php echo URLROOT;?>/images/reports.svg" class="nav-img" alt="Subject">
							<h3> Reports</h3>
						</a>
					</div>

					<div class="nav-option option4">
						<a href="<?php echo URLROOT;?>/Lecturer/ViewProfile/">
							<img src="<?php echo URLROOT;?>/images/viewprofile.svg" class="nav-img" alt="Lecturer">
							<h3> View Profile</h3>
						</a>
					</div>

					<div class="nav-option logout">
						<a href="<?php echo URLROOT;?>/Users/login/">
							<img src="<?php echo URLROOT;?>/images/logout.svg" class="nav-img" alt="logout">
							<h3> Logout</h3>
						</a>
					</div>

				</div>
			</nav>
		</div>

        
        <!-- Content starts here -->
		<div class="main">