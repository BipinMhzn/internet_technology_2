<?php
if (isset($_POST['submit'])) {

    // Check if files were uploaded
    if (isset($_FILES['myfiles'])) {

        $files = $_FILES['myfiles'];
        $fileCount = count($files['name']);

        echo "Total files selected: " . $fileCount . "<br><br>";

        // Loop through each file
        for ($i = 0; $i < $fileCount; $i++) {

            $fileName = $files['name'][$i];
            $fileTmpName = $files['tmp_name'][$i];
            $fileSize = $files['size'][$i];
            $fileError = $files['error'][$i];

            echo "Processing file " . ($i + 1) . ": " . $fileName . "<br>";

            // Check for errors
            if ($fileError === 0) {

                // Validate (same as single file)
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                if (in_array($fileExt, $allowed) && $fileSize <= 2097152) {

                    // Generate unique name
                    $newFileName = uniqid('', true) . "." . $fileExt;
                    $destination = "uploads/" . $newFileName;

                    // Move file
                    if (move_uploaded_file($fileTmpName, $destination)) {
                        echo "✅ Uploaded successfully as: " . $newFileName . "<br>";
                    } else {
                        echo "❌ Failed to upload<br>";
                    }
                } else {
                    echo "❌ Invalid file type or size<br>";
                }
            } else {
                echo "❌ Error code: " . $fileError . "<br>";
            }

            echo "<br>";
        }
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <label>Select multiple files:</label>

    <!-- Add 'multiple' attribute -->
    <input type="file" name="myfiles[]" multiple>

    <button type="submit" name="submit">Upload Files</button>
</form>