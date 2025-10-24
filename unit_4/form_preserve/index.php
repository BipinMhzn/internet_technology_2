<?php
// Initialize variables and errors
$name = '';
$email = '';
$password = '';
$gender = '';
$message = '';
$country = '';
$skills = [];
$errors = [];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate name
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }

    // Sanitize and validate email
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required.";
    }

    // Sanitize and validate password
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    // Preserve gender selection
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    if (empty($gender)) {
        $errors['gender'] = "Gender selection is required.";
    }

    // Preserve textarea input
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));
    if (empty($message)) {
        $errors['message'] = "Message cannot be empty.";
    }

    // Preserve select input
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    if (empty($country)) {
        $errors['country'] = "Please select a country.";
    }

    // Preserve checkbox selections
    $skills = isset($_POST['skills']) ? $_POST['skills'] : [];
    if (empty($skills)) {
        $errors['skills'] = "Select at least one skill.";
    }

    // If no errors, display success message
    if (empty($errors)) {
        echo "<h3>Form submitted successfully!</h3>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Password: " . str_repeat('*', strlen($password)) . "</p>";
        echo "<p>Gender: $gender</p>";
        echo "<p>Message: $message</p>";
        echo "<p>Country: $country</p>";
        echo "<p>Skills: " . implode(', ', $skills) . "</p>";
        // Stop script so form doesn't re-display
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Preserve Form Inputs Example</title>
</head>
<body>
<h2>PHP Form with Input Preservation</h2>
<form method="post" action="">
    <!-- Name -->
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red;"><?php echo $errors['name'] ?? ''; ?></span><br><br>

    <!-- Email -->
    Email: <input type="email" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $errors['email'] ?? ''; ?></span><br><br>

    <!-- Password -->
    Password: <input type="password" name="password" value="<?php echo $password; ?>">
    <span style="color:red;"><?php echo $errors['password'] ?? ''; ?></span><br><br>

    <!-- Gender (Radio) -->
    Gender:
    Male <input type="radio" name="gender" value="Male" <?php if ($gender=='Male') echo 'checked'; ?>>
    Female <input type="radio" name="gender" value="Female" <?php if ($gender=='Female') echo 'checked'; ?>>
    <span style="color:red;"><?php echo $errors['gender'] ?? ''; ?></span><br><br>

    <!-- Message (Textarea) -->
    Message: <br>
    <textarea name="message" rows="4" cols="50"><?php echo $message; ?></textarea>
    <span style="color:red;"><?php echo $errors['message'] ?? ''; ?></span><br><br>

    <!-- Country (Select) -->
    Country:
    <select name="country">
        <option value="">--Select--</option>
        <option value="USA" <?php if ($country=='USA') echo 'selected'; ?>>USA</option>
        <option value="Canada" <?php if ($country=='Canada') echo 'selected'; ?>>Canada</option>
        <option value="UK" <?php if ($country=='UK') echo 'selected'; ?>>UK</option>
    </select>
    <span style="color:red;"><?php echo $errors['country'] ?? ''; ?></span><br><br>

    <!-- Skills (Checkbox) -->
    Skills:
    HTML <input type="checkbox" name="skills[]" value="HTML" <?php if (in_array('HTML', $skills)) echo 'checked'; ?>>
    CSS <input type="checkbox" name="skills[]" value="CSS" <?php if (in_array('CSS', $skills)) echo 'checked'; ?>>
    JS <input type="checkbox" name="skills[]" value="JS" <?php if (in_array('JS', $skills)) echo 'checked'; ?>>
    <span style="color:red;"><?php echo $errors['skills'] ?? ''; ?></span><br><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>
