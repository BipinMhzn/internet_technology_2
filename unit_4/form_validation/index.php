<?php
// Initialize variables and error array
$name = '';
$email = '';
$password = '';
$gender = '';
$age = '';
$message = '';
$country = '';
$skills = [];
$errors = [];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- SANITIZE INPUT ---
    $name = htmlspecialchars(trim(isset($_POST['name']) ? $_POST['name'] : ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $age = filter_var($_POST['age'] ?? '', FILTER_SANITIZE_NUMBER_INT);
    $gender = $_POST['gender'] ?? '';
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));
    $country = $_POST['country'] ?? '';
    $skills = $_POST['skills'] ?? [];

    // --- VALIDATE INPUT ---
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required.";
    }

    if (empty($password) || strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }

    if (empty($age) || !is_numeric($age) || $age < 1) {
        $errors['age'] = "Please enter a valid age.";
    }

    if (empty($gender)) {
        $errors['gender'] = "Gender selection is required.";
    }

    if (empty($message)) {
        $errors['message'] = "Message cannot be empty.";
    }

    if (empty($country)) {
        $errors['country'] = "Please select a country.";
    }

    if (empty($skills)) {
        $errors['skills'] = "Select at least one skill.";
    }

    // --- IF NO ERRORS, DISPLAY SUCCESS ---
    if (empty($errors)) {
        echo "<h3>Form Submitted Successfully!</h3>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Password:</strong> " . str_repeat('*', strlen($password)) . "</p>";
        echo "<p><strong>Age:</strong> $age</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Message:</strong> $message</p>";
        echo "<p><strong>Country:</strong> $country</p>";
        echo "<p><strong>Skills:</strong> " . implode(', ', $skills) . "</p>";
        exit; // Stop the script so the form doesn't re-display
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Preserve & Validate Form</title>
</head>
<body>
<h2>PHP Form with Input Preservation, Validation & Sanitization</h2>

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

    <!-- Age -->
    Age: <input type="text" name="age" value="<?php echo $age; ?>">
    <span style="color:red;"><?php echo $errors['age'] ?? ''; ?></span><br><br>

    <!-- Gender (Radio) -->
    Gender:
    Male <input type="radio" name="gender" value="Male" <?php if($gender=='Male') echo 'checked'; ?>>
    Female <input type="radio" name="gender" value="Female" <?php if($gender=='Female') echo 'checked'; ?>>
    <span style="color:red;"><?php echo $errors['gender'] ?? ''; ?></span><br><br>

    <!-- Message (Textarea) -->
    Message: <br>
    <textarea name="message" rows="4" cols="50"><?php echo $message; ?></textarea>
    <span style="color:red;"><?php echo $errors['message'] ?? ''; ?></span><br><br>

    <!-- Country (Select) -->
    Country:
    <select name="country">
        <option value="">--Select--</option>
        <option value="USA" <?php if($country=='USA') echo 'selected'; ?>>USA</option>
        <option value="Canada" <?php if($country=='Canada') echo 'selected'; ?>>Canada</option>
        <option value="UK" <?php if($country=='UK') echo 'selected'; ?>>UK</option>
    </select>
    <span style="color:red;"><?php echo $errors['country'] ?? ''; ?></span><br><br>

    <!-- Skills (Checkbox) -->
    Skills:
    HTML <input type="checkbox" name="skills[]" value="HTML" <?php if(in_array('HTML', $skills)) echo 'checked'; ?>>
    CSS <input type="checkbox" name="skills[]" value="CSS" <?php if(in_array('CSS', $skills)) echo 'checked'; ?>>
    JS <input type="checkbox" name="skills[]" value="JS" <?php if(in_array('JS', $skills)) echo 'checked'; ?>>
    <span style="color:red;"><?php echo $errors['skills'] ?? ''; ?></span><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
