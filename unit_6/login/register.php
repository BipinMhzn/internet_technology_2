<?php
// register.php
include('db_connect.php');

$error = '';
$success = '';

// Initialize form variables
$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retain input values
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $pass     = $_POST['password'];

    // --- Validation Section ---
    if ($username === '' || $email === '' || $pass === '') {
        $error = 'All fields are required.';
    } elseif (strlen($username) < 3 || strlen($username) > 50) {
        $error = 'Username must be between 3 and 50 characters.';
    } elseif (strlen($email) < 5 || strlen($email) > 100) {
        $error = 'Email must be between 5 and 100 characters.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // --- Check if user already exists ---
        $check_stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ? OR email = ?");
        mysqli_stmt_bind_param($check_stmt, "ss", $username, $email);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_store_result($check_stmt);

        if (mysqli_stmt_num_rows($check_stmt) > 0) {
            $error = 'Username or email already exists. Please try another.';
        } else {
            // --- Insert new user ---
            $password_hash = password_hash($pass, PASSWORD_DEFAULT);
            $insert_stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($insert_stmt, "sss", $username, $email, $password_hash);

            if (mysqli_stmt_execute($insert_stmt)) {
                // Redirect to login page on success
                header("Location: login.php?registered=1");
                exit();
            } else {
                $error = 'Database error: ' . mysqli_error($conn);
            }
            mysqli_stmt_close($insert_stmt);
        }

        mysqli_stmt_close($check_stmt);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
<h2>Register</h2>

<?php if ($error): ?>
    <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label>Username:</label><br>
    <input type="text" name="username" maxlength="50"
           value="<?php echo htmlspecialchars($username); ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" maxlength="100"
           value="<?php echo htmlspecialchars($email); ?>" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Register">
</form>

<p>Already registered? <a href="login.php">Login here</a></p>
</body>
</html>