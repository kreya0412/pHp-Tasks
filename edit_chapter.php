<?php
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST["id"];
  $chapter_name = $_POST["chapter_name"];

  $sql = "UPDATE `chapters` SET `chapter_name`='$chapter_name' WHERE `id`='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Chapter updated successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

if (isset($_GET["id"])) {
  $chapter_name = $_GET["id"];

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