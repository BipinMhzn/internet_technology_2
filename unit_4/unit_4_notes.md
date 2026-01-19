# Unit 4: Form Handling and Data Validation

**Duration:** 6 Hours

## Learning Objectives
- Gain proficiency in processing HTML forms to collect user input from web pages
- Understand the HTTP request methods and their usage in form submissions
- Learn to validate and sanitize user input to prevent security vulnerabilities
- Understand file upload handling and email sending in PHP

---

## 4.1 Processing HTML Forms with PHP

### What is a Form?
HTML forms allow users to input data on a webpage, which can be sent to a server for processing. PHP can process this form data, validate it, store it in a database, or perform other actions.

### Basic Form Structure

```html
<form action="process.php" method="post">
    <input type="text" name="username" placeholder="Enter username">
    <input type="password" name="password" placeholder="Enter password">
    <input type="submit" value="Submit">
</form>
```

**Form Attributes:**
- `action` - The PHP file that will process the form data
- `method` - How data is sent (GET or POST)
- `name` - Identifier for each input field (used to access data in PHP)

**See:** `form_handling/index.php` for form examples

---

## 4.2 Working with HTTP Request (GET, POST, SERVER)

### $_GET - Query String Parameters

`$_GET` is used to collect data sent via URL parameters (visible in the address bar).

**When to use GET:**
- Search forms
- Filtering data
- Pagination
- Shareable URLs

**Example:**

HTML Form:
```html
<form action="search.php" method="get">
    <input type="text" name="keyword">
    <input type="text" name="category">
    <button type="submit">Search</button>
</form>
```

PHP Processing:
```php
<?php
$keyword = $_GET['keyword'];    // Get keyword from URL
$category = $_GET['category'];  // Get category from URL
echo "Searching for: $keyword in $category";
?>
```

URL will look like: `search.php?keyword=laptop&category=electronics`

**See:** `get/index.php` and `get/search.php`

---

### $_POST - Form Data

`$_POST` is used to collect data sent via HTTP POST method (not visible in URL).

**When to use POST:**
- Login forms
- Registration forms
- Sensitive data (passwords)
- Large amounts of data
- File uploads

**Example:**

HTML Form:
```html
<form action="register.php" method="post">
    <input type="text" name="username">
    <input type="password" name="password">
    <button type="submit">Register</button>
</form>
```

PHP Processing:
```php
<?php
$username = $_POST['username'];
$password = $_POST['password'];
echo "Username: $username";
?>
```

**See:** `post/index.php` and `post/register.php`

---

### $_SERVER - Server Information

`$_SERVER` is a superglobal array containing server and request information.

**Common $_SERVER Variables:**

| Variable | Description | Example |
|----------|-------------|---------|
| `$_SERVER['REQUEST_METHOD']` | HTTP method used | GET, POST |
| `$_SERVER['SERVER_NAME']` | Server hostname | localhost |
| `$_SERVER['PHP_SELF']` | Current script path | /form.php |
| `$_SERVER['REMOTE_ADDR']` | User's IP address | 192.168.1.1 |
| `$_SERVER['HTTP_USER_AGENT']` | Browser information | Mozilla/5.0... |
| `$_SERVER['SCRIPT_FILENAME']` | Absolute path to script | /var/www/form.php |

**Example:**

```php
<?php
// Check request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process POST data
    $username = $_POST['username'];
} else {
    // Display form
    echo "Please submit the form";
}
?>
```

**See:** `form_validation/index.php:14` for usage

---

## 4.3 Preserving User Input

When a form has validation errors, you should preserve the user's input so they don't have to re-enter everything.

### Why Preserve Input?

**Bad UX (without preservation):**
1. User fills out a long form
2. One field has an error
3. Form reloads with all fields empty
4. User gets frustrated and leaves

**Good UX (with preservation):**
1. User fills out a long form
2. One field has an error
3. Form reloads with all correct data still filled in
4. User only needs to fix the error

### How to Preserve Input

**For Text Inputs:**
```php
<input type="text" name="name" value="<?php echo $name; ?>">
```

**For Radio Buttons:**
```php
<input type="radio" name="gender" value="Male"
    <?php if ($gender == 'Male') echo 'checked'; ?>>
```

**For Checkboxes:**
```php
<input type="checkbox" name="skills[]" value="HTML"
    <?php if (in_array('HTML', $skills)) echo 'checked'; ?>>
```

**For Select/Dropdown:**
```php
<select name="country">
    <option value="USA" <?php if ($country == 'USA') echo 'selected'; ?>>USA</option>
    <option value="UK" <?php if ($country == 'UK') echo 'selected'; ?>>UK</option>
</select>
```

**For Textarea:**
```php
<textarea name="message"><?php echo $message; ?></textarea>
```

**Complete Example:**

```php
<?php
// Initialize variables
$name = '';
$email = '';
$errors = [];

// Process form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validation
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }

    if (empty($errors)) {
        echo "Success!";
        exit;
    }
}
?>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red;"><?php echo $errors['name'] ?? ''; ?></span>

    Email: <input type="email" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $errors['email'] ?? ''; ?></span>

    <input type="submit" value="Submit">
</form>
```

**See:** `form_preserve/index.php` for complete example

---

## 4.4 Validating and Sanitizing User's Input

### Why Validate and Sanitize?

1. **Security** - Prevent SQL injection, XSS attacks, malicious code
2. **Data Integrity** - Ensure data is in correct format
3. **User Experience** - Help users fix mistakes

### Sanitization vs Validation

| Sanitization | Validation |
|-------------|-----------|
| **Cleans** the input | **Checks** if input is valid |
| Removes harmful characters | Returns true/false |
| `htmlspecialchars()` | `empty()`, `strlen()` |
| `filter_var(FILTER_SANITIZE_EMAIL)` | `filter_var(FILTER_VALIDATE_EMAIL)` |

---

### Common Sanitization Functions

#### 1. htmlspecialchars()
Converts special characters to HTML entities (prevents XSS attacks).

```php
$name = htmlspecialchars($_POST['name']);
// <script> becomes &lt;script&gt;
```

#### 2. trim()
Removes whitespace from beginning and end.

```php
$name = trim($_POST['name']);
// "  John  " becomes "John"
```

#### 3. filter_var() with Sanitization Filters

```php
// Sanitize email
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
// "user@<script>site.com" becomes "user@site.com"

// Sanitize number
$age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
// "25abc" becomes "25"

// Sanitize URL
$url = filter_var($_POST['website'], FILTER_SANITIZE_URL);
```

---

### Common Validation Techniques

#### 1. Check if Empty

```php
if (empty($name)) {
    $errors['name'] = "Name is required";
}
```

#### 2. Check String Length

```php
if (strlen($password) < 6) {
    $errors['password'] = "Password must be at least 6 characters";
}
```

#### 3. Validate Email

```php
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
}
```

#### 4. Validate Number

```php
if (!is_numeric($age) || $age < 1) {
    $errors['age'] = "Please enter a valid age";
}
```

#### 5. Validate against Allowed Values

```php
$allowedGenders = ['Male', 'Female', 'Other'];
if (!in_array($gender, $allowedGenders)) {
    $errors['gender'] = "Invalid gender selection";
}
```

---

### Complete Validation Example

```php
<?php
$name = '';
$email = '';
$password = '';
$age = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // SANITIZE
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $age = filter_var($_POST['age'] ?? '', FILTER_SANITIZE_NUMBER_INT);

    // VALIDATE
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required";
    }

    if (empty($password) || strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }

    if (empty($age) || !is_numeric($age) || $age < 1) {
        $errors['age'] = "Please enter a valid age";
    }

    // If no errors, process data
    if (empty($errors)) {
        echo "Form submitted successfully!";
        exit;
    }
}
?>
```

**See:** `form_validation/index.php` for complete example

---

## 4.5 Dealing with Checkbox, Radio Button, and List

### Radio Buttons

Radio buttons allow users to select ONE option from multiple choices.

**HTML:**
```html
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
```

**PHP Processing:**
```php
$gender = $_POST['gender'] ?? '';
if (empty($gender)) {
    $errors['gender'] = "Please select gender";
}
```

**Preserving Selection:**
```html
<input type="radio" name="gender" value="Male"
    <?php if ($gender == 'Male') echo 'checked'; ?>> Male
```

---

### Checkboxes

Checkboxes allow users to select MULTIPLE options.

**HTML (Note the `[]` in name):**
```html
<input type="checkbox" name="hobbies[]" value="Reading"> Reading
<input type="checkbox" name="hobbies[]" value="Sports"> Sports
<input type="checkbox" name="hobbies[]" value="Music"> Music
```

**PHP Processing:**
```php
$hobbies = $_POST['hobbies'] ?? [];

if (empty($hobbies)) {
    $errors['hobbies'] = "Please select at least one hobby";
}

// Display selected hobbies
echo implode(", ", $hobbies);
// Output: Reading, Sports
```

**Preserving Selection:**
```html
<input type="checkbox" name="hobbies[]" value="Reading"
    <?php if (in_array('Reading', $hobbies)) echo 'checked'; ?>> Reading
```

---

### Dropdown List (Select)

**Single Select:**
```html
<select name="country">
    <option value="">--Select--</option>
    <option value="USA">USA</option>
    <option value="UK">UK</option>
    <option value="Canada">Canada</option>
</select>
```

**PHP Processing:**
```php
$country = $_POST['country'] ?? '';
if (empty($country)) {
    $errors['country'] = "Please select a country";
}
```

**Preserving Selection:**
```html
<option value="USA" <?php if ($country == 'USA') echo 'selected'; ?>>USA</option>
```

---

**Multi-Select:**
```html
<select name="subjects[]" multiple size="4">
    <option value="Math">Math</option>
    <option value="Science">Science</option>
    <option value="History">History</option>
</select>
```

**PHP Processing:**
```php
$subjects = $_POST['subjects'] ?? [];
echo "Selected: " . implode(", ", $subjects);
```

**Preserving Selection:**
```html
<option value="Math"
    <?php if (in_array('Math', $subjects)) echo 'selected'; ?>>Math</option>
```

**See:** `form_handling/index.php` and `form_handling/process.php`

---

## 4.6 File Upload

### HTML Form for File Upload

**IMPORTANT:** The form MUST have `enctype="multipart/form-data"` attribute.

```html
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" required>
    <input type="submit" value="Upload">
</form>
```

---

### $_FILES Superglobal

When a file is uploaded, PHP stores its information in the `$_FILES` array.

**$_FILES Structure:**
```php
$_FILES['myfile']['name']      // Original filename
$_FILES['myfile']['type']      // MIME type (image/jpeg)
$_FILES['myfile']['size']      // File size in bytes
$_FILES['myfile']['tmp_name']  // Temporary location
$_FILES['myfile']['error']     // Error code (0 = success)
```

---

### Basic File Upload

```php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileName = $_FILES['myfile']['name'];
    $fileTmp = $_FILES['myfile']['tmp_name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileError = $_FILES['myfile']['error'];

    if ($fileError === 0) {
        $destination = "uploads/" . $fileName;

        if (move_uploaded_file($fileTmp, $destination)) {
            echo "File uploaded successfully!";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Upload failed with error code: $fileError";
    }
}
?>
```

---

### Secure File Upload with Validation

```php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get file info
    $fileName = $_FILES['myfile']['name'];
    $fileTmp = $_FILES['myfile']['tmp_name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileError = $_FILES['myfile']['error'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed file types
    $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

    // Validation
    if ($fileError !== 0) {
        echo "Error uploading file.";
        exit;
    }

    if ($fileSize > 2 * 1024 * 1024) {  // 2 MB limit
        echo "File too large! Maximum 2MB allowed.";
        exit;
    }

    if (!in_array($fileExt, $allowed)) {
        echo "Invalid file type. Only JPG, PNG, PDF allowed.";
        exit;
    }

    // Generate unique filename to avoid duplicates
    $newName = uniqid("upload_", true) . "." . $fileExt;

    // Create uploads directory if it doesn't exist
    if (!file_exists("uploads/")) {
        mkdir("uploads/", 0777, true);
    }

    // Move file to destination
    $destination = "uploads/" . $newName;

    if (move_uploaded_file($fileTmp, $destination)) {
        echo "File uploaded successfully!<br>";
        echo "Original Name: " . htmlspecialchars($fileName) . "<br>";
        echo "Stored As: " . htmlspecialchars($newName) . "<br>";
        echo "File Size: " . round($fileSize / 1024, 2) . " KB<br>";
    } else {
        echo "Error moving the uploaded file.";
    }
}
?>
```

---

### File Upload Security Checklist

1. **Validate file type** - Check extension AND MIME type
2. **Limit file size** - Prevent large files from filling server
3. **Rename files** - Use `uniqid()` to prevent overwrites and path traversal
4. **Check upload errors** - Always check `$_FILES['name']['error']`
5. **Sanitize filename** - Use `htmlspecialchars()` when displaying
6. **Restrict upload directory** - Don't allow uploads to root or executable folders
7. **Validate file content** - Extension can be faked, verify actual content

**See:** `file_upload/index.php` and `file_upload/upload.php`

---

## 4.7 Send Email

PHP provides the `mail()` function to send emails.

### Basic Email Syntax

```php
mail($to, $subject, $message, $headers);
```

**Parameters:**
- `$to` - Recipient email address
- `$subject` - Email subject
- `$message` - Email body/content
- `$headers` - Optional headers (From, CC, BCC, etc.)

---

### Simple Email Example

```php
<?php
$to = "recipient@example.com";
$subject = "Test Email";
$message = "This is a test email from PHP!";
$headers = "From: sender@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Email sending failed.";
}
?>
```

---

### Contact Form with Email

**HTML Form:**
```html
<form action="sendmail.php" method="post">
    <label>Your Name:</label>
    <input type="text" name="name" required><br>

    <label>Your Email:</label>
    <input type="email" name="email" required><br>

    <label>Message:</label>
    <textarea name="message" rows="5" required></textarea><br>

    <input type="submit" value="Send Email">
</form>
```

**PHP Processing:**
```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient email
    $to = "admin@example.com";

    // Email subject
    $subject = "New Message from Contact Form";

    // Email body
    $body = "You have received a new message:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you, $name. Your message has been sent!";
    } else {
        echo "Sorry, your message could not be sent.";
    }
}
?>
```

---

### Email with HTML Content

```php
<?php
$to = "recipient@example.com";
$subject = "HTML Email Test";

// HTML message
$message = "
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome to Our Website!</h1>
    <p>Thank you for registering.</p>
    <p><a href='https://example.com'>Visit our site</a></p>
</body>
</html>
";

// Headers for HTML email
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: noreply@example.com\r\n";

mail($to, $subject, $message, $headers);
?>
```

---

### Important Notes about mail()

1. **Server Configuration Required** - The `mail()` function requires a mail server (SMTP) to be configured
2. **Not Recommended for Production** - Use libraries like PHPMailer or SwiftMailer for production
3. **May End Up in Spam** - Emails sent with `mail()` often get flagged as spam
4. **No Error Details** - `mail()` only returns true/false, doesn't provide error details

**See:** `email/index.php` and `email/sendmail.php`

---

## Summary

### Key Takeaways

1. **Form Processing**
   - Use `$_GET` for search/filter (visible in URL)
   - Use `$_POST` for sensitive data (hidden)
   - Use `$_SERVER` for request information

2. **Input Preservation**
   - Save user input in variables
   - Echo values back into form fields
   - Use `checked`, `selected` for radio/checkbox/select

3. **Validation & Sanitization**
   - **Sanitize** - Clean the input (`htmlspecialchars()`, `trim()`)
   - **Validate** - Check if input is valid (`empty()`, `filter_var()`)
   - Always do BOTH for security

4. **Form Controls**
   - Radio buttons: single choice, name without `[]`
   - Checkboxes: multiple choices, name with `[]`
   - Select: dropdown list, add `multiple` for multi-select

5. **File Upload**
   - Use `enctype="multipart/form-data"` in form
   - Access via `$_FILES` superglobal
   - Validate: type, size, error
   - Use `move_uploaded_file()` to save

6. **Email**
   - Use `mail($to, $subject, $message, $headers)`
   - Sanitize all user inputs before sending
   - Consider using libraries for production

---

## Security Best Practices

1. **Always validate and sanitize user input**
2. **Never trust user data**
3. **Use `htmlspecialchars()` to prevent XSS**
4. **Validate file uploads thoroughly**
5. **Use POST for sensitive data**
6. **Check `$_SERVER['REQUEST_METHOD']` before processing**
7. **Display appropriate error messages**
8. **Don't expose sensitive error details to users**

---

## Practice Exercises

1. Create a registration form with validation for:
   - Name (required, min 3 characters)
   - Email (valid email format)
   - Password (min 8 characters)
   - Confirm Password (must match)
   - Age (must be 18+)

2. Build a survey form with:
   - Radio buttons for satisfaction level
   - Checkboxes for features used
   - Dropdown for user category
   - Preserve all inputs on validation errors

3. Create a file upload system that:
   - Only accepts images (jpg, png, gif)
   - Limits file size to 1MB
   - Renames files with unique names
   - Displays uploaded image after success

4. Build a contact form that:
   - Validates all fields
   - Sends email with form data
   - Shows success/error messages
   - Preserves input on error

---

## Code Examples Reference

- **get/** - GET request examples
- **post/** - POST request examples
- **form_handling/** - Radio, checkbox, select examples
- **form_preserve/** - Input preservation examples
- **form_validation/** - Complete validation example
- **file_upload/** - File upload with validation
- **email/** - Email sending examples
- **login/** - Login form example
