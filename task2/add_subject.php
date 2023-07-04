<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $subject_name = $_POST["subject_name"];

  // Insert the new subject into the subjects table
  $sql = "INSERT INTO subjects (subject_name) VALUES ('$subject_name')";
  if ($conn->query($sql) === TRUE) {
    echo "Subject added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Subject</title>
</head>
<body>
<h1>Add Subject</h1>
<form method="POST" action="">
  <label for="subject_name">Subject Name:</label>
  <input type="text" name="subject_name" required><br><br>
  <input type="submit" value="Add Subject"><br>
</form>
<br>
<h1>Edit Subject</h1>
<form method="POST" action="edit_subject.php">
  <label for="subjectName">Subject Id:</label>
  <input type="text" name="id" value="<?php echo $id; ?>"><br><br>
  <label for="subjectName">Subject Name:</label>
  <input type="text" name="subject_name" value="<?php echo $subject_name; ?>" required><br><br>
  <input type="submit" value="Update Subject">
</form>
<br>
<h1>Delete Subject</h1>
<form method="POST" action="delete_subject.php">
  <label for="subjectName">Subject Id:</label>
  <input type="text" name="id" value="<?php echo $id; ?>"><br><br>
  <label for="subjectName">Subject Name:</label>
  <input type="text" name="subject_name" value="<?php echo $subject_name; ?>" required><br><br>
  <input type="submit" value="Delete Subject">
</form>

</body>
</html>
