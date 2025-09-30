<!DOCTYPE html>
<html>
<head>
    <title>Form Handling Example</title>
</head>
<body>
<h2>User Information Form</h2>
<form action="form_handling/process.php" method="post">

    <!-- Radio Buttons -->
    <p><b>Gender:</b></p>
    <label><input type="radio" name="gender" value="Male"> Male</label>
    <label><input type="radio" name="gender" value="Female"> Female</label>
    <label><input type="radio" name="gender" value="Other"> Other</label>

    <br><br>

    <!-- Checkboxes -->
    <p><b>Hobbies:</b></p>
    <label><input type="checkbox" name="hobbies[]" value="Reading"> Reading</label>
    <label><input type="checkbox" name="hobbies[]" value="Sports"> Sports</label>
    <label><input type="checkbox" name="hobbies[]" value="Music"> Music</label>
    <label><input type="checkbox" name="hobbies[]" value="Traveling"> Traveling</label>

    <br><br>

    <!-- Dropdown List -->
    <p><b>Select Country:</b></p>
    <select name="country">
        <option value="">-- Select --</option>
        <option value="India">India</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
        <option value="Canada">Canada</option>
    </select>

    <br><br>

    <!-- Multi-Select Dropdown -->
    <p><b>Select Favorite Subjects (choose multiple):</b></p>
    <select name="subjects[]" multiple size="4">
        <option value="Math">Math</option>
        <option value="Science">Science</option>
        <option value="History">History</option>
        <option value="Computer Science">Computer Science</option>
        <option value="English">English</option>
    </select>

    <br><br>

    <!-- Submit Button -->
    <input type="submit" value="Submit Form">
</form>
</body>
</html>
