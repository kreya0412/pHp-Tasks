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
  $standard_name = $_POST["standard_name"];

  // Update the subject in the subjects table
  $sql = "UPDATE `standards` SET `standard_name`='$standard_name' WHERE `id`='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Standard updated successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}

// Retrieve the subject data for editing
if (isset($_GET["id"])) {
  $standard_name = $_GET["id"];

  // Retrieve the subject from the subjects table
  $sql = "SELECT * FROM `standards` WHERE `id`='$standard_name'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $subject_name = $row["standard_name"];
  } else {
    echo "Standard not found!";
  }
}
?>