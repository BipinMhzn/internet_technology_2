<!DOCTYPE html>
<html>
<head>
    <title>Send Email Example</title>
</head>
<body>
<h2>Contact Form</h2>
<form action="email/sendmail.php" method="post">
    <label>Your Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Your Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Message:</label><br>
    <textarea name="message" rows="5" cols="40" required></textarea><br><br>

    <input type="submit" name="submit" value="Send Email">
</form>
</body>
</html>
