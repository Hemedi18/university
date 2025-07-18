<?php
require_once 'db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        $message = "Registration successful! <a href='login.php'>Login here</a>.";
    } else {
        $message = "Registration failed. Try a different username.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | UniPortal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="logo">UniPortal</div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="courses.html">Courses</a></li>
            <li><a href="departments.html">Departments</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php" class="active">Register</a></li>
        </ul>
    </nav>
    <main>
        <h1>Register</h1>
        <form method="POST" class="form-card">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Register</button>
        </form>
        <div class="message"><?= $message ?></div>
    </main>
    <footer>
        &copy; 2024 UniPortal. All rights reserved.
    </footer>
</body>
</html>