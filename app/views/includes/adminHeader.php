<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel="stylesheet"href="<?php echo URLROOT;?>/css/adminHeaderStyles.css">
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
			<div class="circle"></div>
			<img src="<?php echo URLROOT;?>/images/bell.png" class="icn" alt="bell">
			<div class="dp"><img src="<?php echo URLROOT;?>/images/profile_picture.png" class="dpicn" alt="dp"></div>
		</div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">

					<div class="nav-option option1">
						<img src= "<?php echo URLROOT;?>/images/dashboard_icon.png" class="nav-img" alt="dashboard">
						<h3> Dashboard</h3>
					</div>

					<div class="option2 nav-option">
						<img src="<?php echo URLROOT;?>/images/room.png" class="nav-img" alt="Rooms">
						<h3> Rooms</h3>
					</div>

					<div class="nav-option option3">
						<img src="<?php echo URLROOT;?>/images/lecturer.png" class="nav-img" alt="Lecturers">
						<h3> Lecturers</h3>
					</div>

					<div class="nav-option option4">
						<img src="<?php echo URLROOT;?>/images/instructor.svg" Class="nav-img" alt="Instructor">
						<h3> Instructor</h3>
					</div>

					<div class="nav-option option5">
						<img src="<?php echo URLROOT;?>/images/student.jpg" class="nav-img" alt="Student">
						<h3> Student</h3>
					</div>

					<div class="nav-option option6">
						<img src="<?php echo URLROOT;?>/images/database.png" class="nav-img" alt="Database">
						<h3> Database</h3>
					</div>

					<div class="nav-option logout">
						<img src="<?php echo URLROOT;?>/images/logout.png" class="nav-img" alt="logout">
						<h3> Logout</h3>
					</div>

				</div>
			</nav>
		</div>

        
        <!-- Content starts here -->
		<div class="main">