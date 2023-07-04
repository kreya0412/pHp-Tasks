<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $chapter_name = $_POST["chapter_name"];

  // Insert the new subject into the subjects table
  $sql = "INSERT INTO chapters (chapter_name) VALUES ('$chapter_name')";
  if ($conn->query($sql) === TRUE) {
    echo "Standard added successfully!";
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
  <title>Add Chapter</title>
</head>
<body>
    <h1>Add Chapter</h1>
<form method="POST" action="">
  <label for="chapter_name">Chapter Name:</label>
  <input type="text" name="chapter_name" required><br><br>
  <input type="submit" value="Add Chapter"><br>
</form>
<br>
<h1>Edit Chapter</h1>
<form method="POST" action="edit_chapter.php">
  <label for="ChapterName">Chapter Id:</label>
  <input type="text" name="id" value="<?php echo $id; ?>"><br><br>
  <label for="ChapterName">Subject Name:</label>
  <input type="text" name="chapter_name" value="<?php echo $chapter_name; ?>" required><br><br>
  <input type="submit" value="Update chapter">
</form>
<br>
<h1>Delete Chapter</h1>
<form method="POST" action="delete_chapter.php">
  <label for="ChapterName">Chapter Id:</label>
  <input type="text" name="id" value="<?php echo $id; ?>"><br><br>
  <label for="ChapterName">Chapter Name:</label>
  <input type="text" name="chapter_name" value="<?php echo $chapter_name; ?>" required><br><br>
  <input type="submit" value="Delete chapter">
</form>

</body>
</html>
