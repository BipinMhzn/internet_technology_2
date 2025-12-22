<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Check if email already exists
    $checkQuery = "SELECT * FROM users WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<p>Email already registered!</p>";
    } else {
        $insertQuery = "INSERT INTO users (email, password)
                        VALUES ('$email', '$hashedPassword')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "<p>Registration successful!</p>";
        } else {
            echo "<p>Error during registration.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>

<h2>Register New User</h2>

<form method="post" action="">
    <label for="email">Email</label>
    <input type="email" name="email" required><br><br>

    <label for="password">Password</label>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Register">
</form>
<br>
Already user exists? <a href='login.php'>Login here</a>

</body>
</html>
