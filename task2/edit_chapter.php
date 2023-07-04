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
  $chapter_name = $_POST["chapter_name"];

  // Update the subject in the subjects table
  $sql = "UPDATE `chapters` SET `chapter_name`='$chapter_name' WHERE `id`='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Chapter updated successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}

// Retrieve the subject data for editing
if (isset($_GET["id"])) {
  $chapter_name = $_GET["id"];

  // Retrieve the subject from the subjects table
  $sql = "SELECT * FROM `chapters` WHERE `id`='$chapter_name'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $chapter_name = $row["chapter_name"];
  } else {
    echo "chapter not found!";
  }
}
?>