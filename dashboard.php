<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | UniPortal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="logo">UniPortal</div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="courses.html">Courses</a></li>
            <li><a href="departments.html">Departments</a></li>
            <li><a href="dashboard.php" class="active">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <h1>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
        <p>This is your dashboard. Here you can manage your courses, view announcements, and more.</p>
    </main>
    <footer>
        &copy; 2024 UniPortal. All rights reserved.
    </footer>
</body>
</html>