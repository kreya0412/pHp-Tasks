<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $id = $_POST["id"];
  $subject_name = $_POST["subject_name"];

  // Update the subject in the subjects table
  $sql = "DELETE FROM `subjects` WHERE `id`='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Subject deleted successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}


?>
