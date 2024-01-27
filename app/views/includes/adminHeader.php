<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel="stylesheet"href="<?php echo URLROOT;?>/css/administrator/adminHeaderStyles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/css/administrator/<?php echo $style ;?>.css">
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
			<!--User ID & User name-->
			<h5><?php echo $_SESSION['user_id'] . " - " .  $_SESSION['username']; ?></h5>
			<img src="<?php echo URLROOT;?>/images/bell.svg" class="icn" alt="bell">
			<div class="dp"><img src="<?php echo URLROOT;?>/images/profile_picture.svg" class="dpicn" alt="dp"></div>
		</div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">

					<div class="nav-option option1">
						<!-- <a href="<?php echo URLROOT;?>/Pages/administrator_dashboard/"> -->
						<a href="<?php echo URLROOT;?>/AdminPosts/showDashboard/">
							<img src= "<?php echo URLROOT;?>/images/dashboard_icon.svg" class="nav-img" alt="dashboard">
							<h3> Dashboard</h3>
						</a>
					</div>

					<div class="option2 nav-option">
						<a href="<?php echo URLROOT;?>/AdminPosts/viewRooms/">
							<img src="<?php echo URLROOT;?>/images/room.svg" class="nav-img" alt="Rooms">
							<h3> Rooms</h3>
						</a>
					</div>

					<div class="nav-option option3">
						<a href="<?php echo URLROOT;?>/AdminPosts/viewSubjects/">
							<img src="<?php echo URLROOT;?>/images/subject.svg" class="nav-img" alt="Subject">
							<h3> Subject</h3>
						</a>
					</div>

					<div class="nav-option timetable">
						<a href="">
							<img src="<?php echo URLROOT;?>/images/timetable.svg" class="nav-img" alt="Timetable">
							<h3> Timetable</h3>
						</a>
					</div>

					<div class="nav-option option4">
						<a href="<?php echo URLROOT;?>/AdminPosts/viewLecturers/">
							<img src="<?php echo URLROOT;?>/images/lecturer.svg" class="nav-img" alt="Lecturer">
							<h3> Lecturer</h3>
						</a>
					</div>

					<div class="nav-option option5">
						<a href="<?php echo URLROOT;?>/AdminPosts/viewInstructors/">
							<img src="<?php echo URLROOT;?>/images/instructor.svg" Class="nav-img" alt="Instructor">
							<h3> Instructor</h3>
						</a>
					</div>

					<div class="nav-option option6">
					<a href="<?php echo URLROOT;?>/Users/login/">
						<img src="<?php echo URLROOT;?>/images/student.svg" class="nav-img" alt="Student">
						<h3> Student</h3>
					</a>
					</div>

					<div class="nav-option option7">
					<a href="<?php echo URLROOT;?>/AdminPosts/viewAssets/">
							<img src="<?php echo URLROOT;?>/images/database.svg" class="nav-img" alt="Database">
							<h3>  Database</h3>
						</a>
					</div>

					<div class="nav-option option8">
					<a href="">
							<img class="bellw" src="<?php echo URLROOT;?>/images/bellw.svg" alt="Notifications & Requests">
							<h3> Notifications  & Requests</h3>
						</a>
					</div>


					<div class="nav-option logout">
						<a href="<?php echo URLROOT;?>/Users/login/">
							<img src="<?php echo URLROOT;?>/images/logout.svg" class="nav-img" alt="logout">
							<h3>    Logout</h3>
						</a>
					</div>

				</div>
			</nav>
		</div>

        
        <!-- Content starts here -->
		<div class="main">