<?php
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST["id"];
  $subject_name = $_POST["subject_name"];

  $sql = "DELETE FROM `subjects` WHERE `id`='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Subject deleted successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}


?>
