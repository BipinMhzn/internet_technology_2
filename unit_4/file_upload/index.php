<!DOCTYPE html>
<html>
<head>
    <title>File Upload Example</title>
</head>
<body>
<h2>Upload a File</h2>
<form action="file_upload/upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Choose a file:</label>
    <input type="file" name="myfile" id="file" required>
    <br><br>
    <input type="submit" name="submit" value="Upload File">
</form>
</body>
</html>
