<?php
// login.php
session_start();
include('db_connect.php');

// If already logged in, go direct to welcome
if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit();
}

$error = '';
$registered = isset($_GET['registered']) ? true : false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if ($username === '' || $password === '') {
        $error = 'Please enter username and password.';
    } else {
        // Prepared statement to avoid SQL injection
        $stmt = mysqli_prepare($conn, "SELECT id, username, password FROM users WHERE username = ?");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) === 1) {
                mysqli_stmt_bind_result($stmt, $id, $db_username, $db_password_hash);
                mysqli_stmt_fetch($stmt);

                if (password_verify($password, $db_password_hash)) {
                    // Successful login: regenerate id, set session and redirect
                    session_regenerate_id(true);
                    $_SESSION['username'] = $db_username;
                    $_SESSION['user_id']  = $id;

                    header("Location: welcome.php");
                    exit(); // Important: stop executing after redirect
                } else {
                    $error = 'Invalid password.';
                }
            } else {
                $error = 'User not found.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $error = 'Database error: ' . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<?php
if ($registered) echo "<p style='color:green;'>Registration successful. Please login.</p>";
if ($error) echo "<p style='color:red;'>$error</p>";
?>
<form method="POST" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
<p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>