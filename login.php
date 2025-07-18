<?php
require_once 'db.php';
session_start();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        $message = "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | UniPortal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="logo">UniPortal</div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="courses.html">Courses</a></li>
            <li><a href="departments.html">Departments</a></li>
            <li><a href="login.php" class="active">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>
    <main>
        <h1>Login</h1>
        <form method="POST" class="form-card">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="message"><?= $message ?></div>
    </main>
    <footer>
        &copy; 2024 UniPortal. All rights reserved.
    </footer>
</body>
</html>