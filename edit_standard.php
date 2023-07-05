<?php
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST["id"];
  $standard_name = $_POST["standard_name"];

  $sql = "UPDATE `standards` SET `standard_name`='$standard_name' WHERE `id`='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Standard updated successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

if (isset($_GET["id"])) {
  $standard_name = $_GET["id"];

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