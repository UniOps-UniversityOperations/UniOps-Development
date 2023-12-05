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
						<a href="<?php echo URLROOT;?>/AdminPosts/viewRooms/">
							<img src= "<?php echo URLROOT;?>/images/room.png" class="nav-img" alt="Check Availability of Lecture Rooms">
							<h3> Check Availability of Lecture Rooms</h3>
						</a>
					</div>

					<div class="option2 nav-option">
						<a href="<?php echo URLROOT;?>/AdminPosts/viewRooms/">
							<img src="<?php echo URLROOT;?>/images/room.png" class="nav-img" alt="Check Availability of Laboratories">
							<h3>Check Availability of Laboratories</h3>
						</a>
					</div>

					<div class="nav-option option3">
						<a href="<?php echo URLROOT;?>/AdminPosts/viewRooms/">
							<img src="<?php echo URLROOT;?>/images/lecturer.png" class="nav-img" alt="Check Availability of Meeting Rooms">
							<h3>Check Availability of Meeting Rooms</h3>
						</a>
					</div>

					<div class="nav-option option4">
						<a href="<?php echo URLROOT;?>/Users/login/">
							<img src="<?php echo URLROOT;?>/images/TimeTable.png" Class="nav-img" alt="View Time Table">
							<h3>View Time Table</h3>

						</a>
					</div>

					<div class="nav-option option5">
					<a href="<?php echo URLROOT;?>/Users/viewprofile/">
						<img src="<?php echo URLROOT;?>/images/student.jpg" class="nav-img" alt="View Profile">
						<h3>View Profile</h3>
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