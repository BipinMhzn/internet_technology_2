<?php
if (isset($_POST['submit'])) {
    // File info from $_FILES
    $fileName = $_FILES['myfile']['name'];
    $fileTmp  = $_FILES['myfile']['tmp_name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileError= $_FILES['myfile']['error'];

    // Extract file extension
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed file types
    $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

    // Validation
    if ($fileError === 0) {
        if ($fileSize <= 2000000) { // 2 MB limit
            if (in_array($fileExt, $allowed)) {

                // Rename file to avoid duplicates
                $newName = uniqid("upload_", true) . "." . $fileExt;

                // Destination folder (make sure "uploads/" exists)
                $destination = "uploads/" . $newName;

                if (move_uploaded_file($fileTmp, $destination)) {
                    echo "<h3>File uploaded successfully!</h3>";
                    echo "Original Name: " . htmlspecialchars($fileName) . "<br>";
                    echo "Stored As: " . htmlspecialchars($newName) . "<br>";
                    echo "File Type: " . htmlspecialchars($fileExt) . "<br>";
                    echo "File Size: " . round($fileSize / 1024, 2) . " KB<br>";
                } else {
                    echo "Error moving the uploaded file.";
                }
            } else {
                echo "Invalid file type. Only JPG, PNG, PDF allowed.";
            }
        } else {
            echo "File too large! Maximum 2MB allowed.";
        }
    } else {
        echo "Upload failed with error code: $fileError";
    }
}

