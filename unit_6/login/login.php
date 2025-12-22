<?php
session_start();
include "db_connect.php";

if (isset($_SESSION["email"])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["email"] = $email;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<p>Invalid email or password!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="post">
    <label for="email">Email</label>
    <input type="email" name="email" required><br><br>
    <label for="password">Password</label>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>

<p>New user? <a href="register.php">Register here</a></p>

</body>
</html>
