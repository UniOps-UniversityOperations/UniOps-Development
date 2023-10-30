<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel="stylesheet"href="<?php echo URLROOT;?>/css/adminHeaderStyles.css">
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
						<a href="<?php echo URLROOT;?>/Pages/administrator_dashboard/">
							<img src= "<?php echo URLROOT;?>/images/dashboard_icon.png" class="nav-img" alt="dashboard">
							<h3> Dashboard</h3>
						</a>
					</div>

					<div class="option2 nav-option">
						<a href="<?php echo URLROOT;?>/AdminPosts/viewRooms/">
							<img src="<?php echo URLROOT;?>/images/room.png" class="nav-img" alt="Rooms">
							<h3> Rooms</h3>
						</a>
					</div>

					<div class="nav-option option3">
						<a href="<?php echo URLROOT;?>/AdminPosts/viewSubjects/">
							<img src="<?php echo URLROOT;?>/images/subject.png" class="nav-img" alt="Subject">
							<h3> Subject</h3>
						</a>
					</div>

					<div class="nav-option option4">
						<a href="<?php echo URLROOT;?>/AdminPosts/viewLecturers/">
							<img src="<?php echo URLROOT;?>/images/lecturer.png" class="nav-img" alt="Lecturer">
							<h3> Lecturer</h3>
						</a>
					</div>

					<div class="nav-option option5">
						<a href="<?php echo URLROOT;?>/Users/login/">
							<img src="<?php echo URLROOT;?>/images/instructor.svg" Class="nav-img" alt="Instructor">
							<h3> Instructor</h3>
						</a>
					</div>

					<div class="nav-option option6">
					<a href="<?php echo URLROOT;?>/Users/login/">
						<img src="<?php echo URLROOT;?>/images/student.jpg" class="nav-img" alt="Student">
						<h3> Student</h3>
					</a>
					</div>

					<div class="nav-option option7">
						<a href="<?php echo URLROOT;?>/Users/login/">
							<img src="<?php echo URLROOT;?>/images/database.png" class="nav-img" alt="Database">
							<h3> Database</h3>
						</a>
					</div>

					<div class="nav-option logout">
						<a href="<?php echo URLROOT;?>/Users/login/">
							<img src="<?php echo URLROOT;?>/images/logout.png" class="nav-img" alt="logout">
							<h3> Logout</h3>
						</a>
					</div>

				</div>
			</nav>
		</div>

        
        <!-- Content starts here -->
		<div class="main">