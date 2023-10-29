<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Navigation Bar -->
    <header>
        <nav>
            <h1>Admin Dashboard ( <?php echo $_SESSION['username']; ?> )</h1>
            <ul>
                <li><a href="<?php echo URLROOT;?>/AdminPosts/viewRooms/">viewRooms</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sidebar -->
    <aside>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Posts</a></li>
            <li><a href="#">Statistics</a></li>
            <!-- Add more sidebar items as needed -->
        </ul>
    </aside>

    <!-- Main Content -->
    <main>
        <h2>Welcome to the Admin Dashboard</h2>
        <!-- Add your dashboard content here -->
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2023 Admin Dashboard
    </footer>
</body>
</html>
