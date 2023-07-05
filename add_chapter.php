<?php
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $chapter_name = $_POST["chapter_name"];

  $sql = "INSERT INTO chapters (chapter_name) VALUES ('$chapter_name')";
  if ($conn->query($sql) === TRUE) {
    echo "Standard added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

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
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }
    
    h1 {
      color: #333;
      margin-bottom: 20px;
    }
    
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    label {
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"] {
      padding: 10px;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
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
