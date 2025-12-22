<?php
// login.php
session_start();
include('db_connect.php');

// If already logged in, go direct to welcome
if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = $user["role"];

        if ($user["role"] == "admin") {
            header("Location: admin.php");
        } else {
            header("Location: student.php");
        }
        exit;
    } else {
        echo "<p>Invalid username or password!</p>";
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