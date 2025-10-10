<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Management - CRUD Example</title>
  <style>
    body { font-family: Arial; background: #f5f5f5; margin: 40px; }
    h2 { color: #333; }
    table { border-collapse: collapse; width: 70%; margin-top: 20px; background: white; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background-color: #007bff; color: white; }
    tr:nth-child(even) { background-color: #f2f2f2; }
    form { margin-bottom: 20px; background: white; padding: 20px; border-radius: 8px; width: 40%; }
    input[type=text], input[type=email] { width: 90%; padding: 6px; margin: 4px 0; }
    input[type=submit] { background-color: #28a745; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; }
    input[type=submit]:hover { background-color: #218838; }
    .edit-btn, .delete-btn { padding: 5px 10px; color: white; border: none; border-radius: 4px; cursor: pointer; }
    .edit-btn { background-color: #ffc107; }
    .delete-btn { background-color: #dc3545; }
  </style>
</head>
<body>

<h2>🎓 Student Management System (PHP CRUD Demo)</h2>

<!-- Add Student Form -->
<form method="POST" action="">
  <h3>Add New Student</h3>
  <input type="text" name="name" placeholder="Enter Name" required><br>
  <input type="email" name="email" placeholder="Enter Email" required><br>
  <input type="text" name="course" placeholder="Enter Course" required><br>
  <input type="submit" name="add" value="Add Student">
</form>

<?php
// Add Record (CREATE)
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $insert = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";
    if (mysqli_query($conn, $insert)) {
        echo "<p style='color:green;'>✅ Student added successfully!</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
    }
}

// Delete Record (DELETE)
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM students WHERE id=$id");
    echo "<p style='color:red;'>🗑️ Record deleted successfully!</p>";
}

// Update Record (UPDATE)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    mysqli_query($conn, "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id");
    echo "<p style='color:orange;'>✏️ Record updated successfully!</p>";
}

// Edit Record (READ ONE)
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
    $data = mysqli_fetch_array($record);
?>
<form method="POST" action="">
  <h3>Edit Student</h3>
  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
  <input type="text" name="name" value="<?php echo $data['name']; ?>" required><br>
  <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br>
  <input type="text" name="course" value="<?php echo $data['course']; ?>" required><br>
  <input type="submit" name="update" value="Update Student">
</form>
<?php } ?>

<!-- Display All Students (READ) -->
<h3>📋 Student List</h3>
<table>
  <tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
  </tr>
  <?php
  $result = mysqli_query($conn, "SELECT * FROM students");
  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['course']}</td>
                  <td>
                    <a href='index.php?edit={$row['id']}'><button class='edit-btn'>Edit</button></a>
                    <a href='index.php?delete={$row['id']}' onclick='return confirm(\"Are you sure?\")'><button class='delete-btn'>Delete</button></a>
                  </td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='5'>No records found.</td></tr>";
  }
  ?>
</table>

</body>
</html>

<?php mysqli_close($conn); ?>
