<?php
// Step 1: Connect to database
$conn = mysqli_connect("localhost", "root", "", "studentdb");

// Step 2: Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<h3>Database Connected!</h3>";

// Step 3: INSERT Query
$insert = "INSERT INTO students (name, email, course) VALUES ('Alice', 'alice@example.com', 'BSc CS')";
if (mysqli_query($conn, $insert)) {
    echo "<p>Data inserted successfully.</p>";
} else {
    echo "<p>Error inserting record: " . mysqli_error($conn) . "</p>";
}

// Step 4: SELECT Query
echo "<h4>📋 Displaying Student Records:</h4>";
$result = mysqli_query($conn, "SELECT * FROM students");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: {$row['id']} | Name: {$row['name']} | Email: {$row['email']} | Course: {$row['course']} <br>";
    }
} else {
    echo "No records found.";
}

// Step 5: UPDATE Query
$update = "UPDATE students SET course='BSc IT' WHERE name='Alice'";
if (mysqli_query($conn, $update)) {
    echo "<p>✏Record updated successfully.</p>";
}

// Step 6: DELETE Query
$delete = "DELETE FROM students WHERE name='Alice'";
if (mysqli_query($conn, $delete)) {
    echo "<p>Record deleted successfully.</p>";
}

// Step 7: Close Connection
mysqli_close($conn);
?>
