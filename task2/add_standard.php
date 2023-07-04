<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $standard_name = $_POST["standard_name"];

  // Insert the new subject into the subjects table
  $sql = "INSERT INTO standards (standard_name) VALUES ('$standard_name')";
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
  <title>Add Subject</title>
</head>
<body>
<h1>Add Standard</h1>
<form method="POST" action="">
  <label for="StandardName">Standard Name:</label>
  <input type="text" name="standard_name" required><br><br>
  <input type="submit" value="Add Standard"><br>
</form>
<br>
<h1>Edit Standard</h1>
<form method="POST" action="edit_standard.php">
  <label for="StandardName">Standard Id:</label>
  <input type="text" name="id" value="<?php echo $id; ?>"><br><br>
  <label for="StandardName">Standard Name:</label>
  <input type="text" name="standard_name" value="<?php echo $standard_name; ?>" required><br><br>
  <input type="submit" value="Update Standard">
</form>
<br>
<h1>Delete Standard</h1>
<form method="POST" action="delete_standard.php">
  <label for="StandardName">Standard Id:</label>
  <input type="text" name="id" value="<?php echo $id; ?>"><br><br>
  <label for="StandardName">Standard Name:</label>
  <input type="text" name="standard_name" value="<?php echo $standard_name; ?>" required><br><br>
  <input type="submit" value="Delete Standard">
</form>

</body>
</html>
