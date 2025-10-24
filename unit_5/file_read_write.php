<?php
// Step 1: Create a file and write some notes
$file = fopen("notes.txt", "w"); // open file for writing
fwrite($file, "Hello Students!\n");
fwrite($file, "This file stores your notes.\n");
fwrite($file, "We are learning file handling in PHP.");
fclose($file); // close after writing
echo "✅ Notes have been written to the file.<br><br>";

// Step 2: Read the notes back
$file = fopen("notes.txt", "r"); // open file for reading
$content = fread($file, filesize("notes.txt")); // read all data
fclose($file); // close after reading

echo "📖 Reading Notes:<br>";
echo nl2br($content); // show notes with line breaks
echo "<br><br>";

// Step 3: Delete the notes file
if (unlink("notes.txt")) {
    echo "🗑️ Notes file deleted successfully.";
} else {
    echo "❌ Unable to delete the file.";
}
?>
