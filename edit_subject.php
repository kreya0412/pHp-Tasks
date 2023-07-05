<?php
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST["id"];
  $subject_name = $_POST["subject_name"];

  $sql = "UPDATE `subjects` SET `subject_name`='$subject_name' WHERE `id`='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Subject updated successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

if (isset($_GET["id"])) {
  $subject_id = $_GET["id"];

  $sql = "SELECT * FROM `subjects` WHERE `id`='$subject_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $subject_name = $row["subject_name"];
  } else {
    echo "Subject not found!";
  }
}
?>