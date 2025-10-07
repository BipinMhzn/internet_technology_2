<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hardcoded user credentials (for demo only)
    $users = [
        "admin" => ["password" => "admin123", "role" => "admin"],
        "student" => ["password" => "student123", "role" => "student"]
    ];

    // Check if username exists and password matches
    if (isset($users[$username]) && $users[$username]["password"] === $password) {
        // Store user details in session
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $users[$username]["role"];

        // Redirect based on role
        if ($_SESSION["role"] == "admin") {
            header("Location: admin.php");
        } else {
            header("Location: student.php");
        }
        exit;
    } else {
        echo "<p style='color:red;'>Invalid username or password!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
<h2>Login Form</h2>
<form method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
</body>
</html>
